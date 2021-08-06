<?php


interface IReservationConflictIdentifier
{
	/**
	 * @param $reservationSeries ReservationSeries
	 * @return ReservationConflictResult
	 */
	public function GetConflicts($reservationSeries);
}

class IdentifiedConflict
{
	/**
	 * @var Reservation
	 */
	public $Reservation;
	/**
	 * @var IReservedItemView
	 */
	public $Conflict;

	/**
	 * @param Reservation $reservation
	 * @param IReservedItemView $conflict
	 */
	public function __construct(Reservation $reservation, IReservedItemView $conflict)
	{
		$this->Reservation = $reservation;
		$this->Conflict = $conflict;
	}
}

class ReservationConflictIdentifier implements IReservationConflictIdentifier
{
	/**
	 * @var IResourceAvailabilityStrategy
	 */
	private $strategy;

	public function __construct(IResourceAvailabilityStrategy $strategy)
	{
		$this->strategy = $strategy;
	}

	/**
	 * @param $reservationSeries ReservationSeries
	 * @return ReservationConflictResult
	 */
	public function GetConflicts($reservationSeries)
	{
		/** @var IdentifiedConflict[] $conflicts */
		$conflicts = array();

		$reservations = $reservationSeries->Instances();

		$bufferTime = $reservationSeries->MaxBufferTime();

		$keyedResources = array();
		$maxConcurrentReservations = 1;
		$maxConcurrentConflicts = 0;
		$anyConflictsAreBlackouts = false;

		foreach ($reservationSeries->AllResources() as $resource)
		{
			$keyedResources[$resource->GetId()] = $resource;
			if ($resource->GetMaxConcurrentReservations() > $maxConcurrentReservations)
			{
				$maxConcurrentReservations = $resource->GetMaxConcurrentReservations();
			}
		}

		/** @var Reservation $reservation */
		foreach ($reservations as $reservation)
		{
			$instanceConflicts = array();
			Log::Debug("Checking for reservation conflicts, reference number %s on %s", $reservation->ReferenceNumber(), $reservation->StartDate());

			$startDate = $reservation->StartDate();
			$endDate = $reservation->EndDate();

			if ($bufferTime != null && !$reservationSeries->BookedBy()->IsAdmin)
			{
				$startDate = $startDate->SubtractInterval($bufferTime);
				$endDate = $endDate->AddInterval($bufferTime);
			}

			$existingItems = $this->strategy->GetItemsBetween($startDate, $endDate, array_keys($keyedResources));

			/** @var IReservedItemView $existingItem */
			foreach ($existingItems as $existingItem)
			{
				if (
						($bufferTime == null || $reservationSeries->BookedBy()->IsAdmin) &&
						($existingItem->GetStartDate()->Equals($reservation->EndDate()) || $existingItem->GetEndDate()->Equals($reservation->StartDate()))
				)
				{
					continue;
				}

				if ($this->IsInConflict($reservation, $reservationSeries, $existingItem, $keyedResources))
				{
					Log::Debug("Reference number %s conflicts with existing %s with id %s, referenceNumber %s on %s",
							   $reservation->ReferenceNumber(), get_class($existingItem), $existingItem->GetId(), $existingItem->GetReferenceNumber(),
							   $reservation->StartDate());

					$instanceConflicts[] = new IdentifiedConflict($reservation, $existingItem);
				}
				$anyConflictsAreBlackouts = $anyConflictsAreBlackouts || $existingItem->GetReferenceNumber() == "";
			}

			$totalConflicts = $this->GetMaxConcurrentConflicts($instanceConflicts);
			if ($totalConflicts > $maxConcurrentConflicts)
			{
				$maxConcurrentConflicts = $totalConflicts;
			}

			$conflicts = array_merge($conflicts, $instanceConflicts);
		}

		return new ReservationConflictResult($conflicts, $maxConcurrentConflicts, $anyConflictsAreBlackouts, $maxConcurrentReservations);
	}

	protected function IsInConflict(Reservation $instance, ReservationSeries $series, IReservedItemView $existingItem, $keyedResources)
	{

		error_reporting(E_ERROR);
		$link = mysqli_connect("192.168.48.2", $user="root",$password="Hi");

		#$instance = array("id"=>1,"start_date"=>'2021-08-06 12:00:00',"end_date"=> '2021-08-06 13:00:00',"ref"=> '610c5dd321baa684688475',"id2"=>1,"CPU"=>4,"spin"=>50,"HDD"=>100,"RAM"=>100);
		$relevant = array("CPU"=>0,"RAM"=>0,"HDD"=>0);


		$resources = "SELECT * FROM bookedscheduler.reservation_instances";
		$resource = mysqli_query($link,$resources);


		$query = "SELECT * FROM bookedscheduler.server_resources";
		$server_resource = mysqli_query($link,$query);


		$server_rows = [];
		while($result = $server_resource->fetch_assoc())
		{
  			  $server_rows[] = $result;
		}

		$category = mysqli_query($link,$resources);
		$rows = [];
		while($result = $category->fetch_assoc())
		{
		    $rows[] = $result;
		}
		$result = $rows;



//if instance between result.start_time and result.end_time or result between instance.start_time and instance.end_time
		foreach($result as $item) {
   			 if (((strtotime($instance['start_date']) >= strtotime($item['start_date'])) && ($instance['start_date']) < strtotime($item['end_date'])) ||  ($instance['end_date']) >= strtotime($item['start_date']) && (strtotime($instance['end_date']) < strtotime($item['end_date']))
   			 || ((strtotime($item['start_date']) >= strtotime($instance['start_date']) && strtotime($item['start_date']) < strtotime($instance['end_date']))   || (strtotime($item['end_date']) >= strtotime($instance['start_date'])) && (strtotime($item['end_date']) < strtotime($instance['end_date']))))
    
    			{
       				$relevant['CPU'] += $item['CPU'];
        			$relevant['RAM'] += $item['RAM'];
        			$relevant['HDD'] += $item['HDD'];
        #printf("\n Collision \n");
    			}
			}

		if (($relevant['HDD']+$instance['HDD']<= $server_rows['HDD']) && ($relevant['RAM']+$instance['RAM']<= $server_rows['RAM']) && ($relevant['CPU']+$instance['CPU']<= $server_rows['CPU'])){
    		return false;
		}
		else{
			return true;
		}
		/** 
		
		if ($existingItem->GetId() == $instance->ReservationId() ||
				$series->IsMarkedForDelete($existingItem->GetId()) ||
				$series->IsMarkedForUpdate($existingItem->GetId())
		)
		{
			return false;
		}

		
		**/
		if (array_key_exists($existingItem->GetResourceId(), $keyedResources))
		{
			return $existingItem->BufferedTimes()->Overlaps($instance->Duration());
		}

		return false;
	}

	/**
	 * @param IdentifiedConflict[] $instanceConflicts
	 * @return int
	 */
	private function GetMaxConcurrentConflicts($instanceConflicts)
	{
		if (count($instanceConflicts) <= 1)
		{
			return count($instanceConflicts);
		}

		if (count($instanceConflicts) == 2) {
			$c1 = $instanceConflicts[0];
			$c2 = $instanceConflicts[1];
			if ($c1->Conflict->GetReferenceNumber() != $c2->Conflict->GetReferenceNumber() && ($c1->Conflict->BufferedTimes()->Overlaps($c2->Conflict->BufferedTimes()))) {
				return 2;
			}
			return 1;
		}

		$conflicts = 0;

        $conflictsReference = array();
		foreach ($instanceConflicts as $c1)
		{
            $conflictsReference[$c1->Conflict->GetReferenceNumber()] = [$c1->Conflict->GetReferenceNumber()];
			foreach ($instanceConflicts as $c2)
			{
				if ($c1->Conflict->GetReferenceNumber() == $c2->Conflict->GetReferenceNumber()) {
				    continue;
                }
				if ($c1->Conflict->BufferedTimes()->Overlaps($c2->Conflict->BufferedTimes()))
				{
                    $conflictsReference[$c1->Conflict->GetReferenceNumber()][] = $c2->Conflict->GetReferenceNumber();
				}
			}
		}

        foreach ($conflictsReference as $ref => $conflictList) {
            $maxConflicts = 0;
            foreach ($conflictList as $otherRef) {
                $maxConflicts = count(array_intersect($conflictsReference[$ref], $conflictsReference[$otherRef]));
            }

            if ($maxConflicts > $conflicts) {
                $conflicts = $maxConflicts;
            }
        }

		return $conflicts;
	}
}

class ReservationConflictResult
{
	/**
	 * @var IdentifiedConflict[]
	 */
	private $conflicts;
	/**
	 * @var int
	 */
	private $maxConcurrentConflicts;
	/**
	 * @var bool
	 */
	private $areAnyConflictsBlackouts;
	/**
	 * @var int
	 */
	private $maxConcurrentReservations;

	/**
	 * @param IdentifiedConflict[] $conflicts
	 * @param int $maxConcurrentConflicts
	 * @param bool $areAnyConflictsBlackouts
	 * @param int $maxConcurrentReservations
	 */
	public function __construct($conflicts, $maxConcurrentConflicts, $areAnyConflictsBlackouts, $maxConcurrentReservations)
	{

		$this->conflicts = $conflicts;
		$this->maxConcurrentConflicts = $maxConcurrentConflicts;
		$this->areAnyConflictsBlackouts = $areAnyConflictsBlackouts;
		$this->maxConcurrentReservations = $maxConcurrentReservations;
	}

	/**
	 * @return IdentifiedConflict[]
	 */
	public function Conflicts()
	{
		return $this->conflicts;
	}

	/**
	 * @return int
	 */
	public function MaxConcurrentConflicts()
	{
		return $this->maxConcurrentConflicts;
	}

	/**
	 * @return bool
	 */
	public function AreAnyConflictsBlackouts()
	{
		return $this->areAnyConflictsBlackouts;
	}

	/**
	 * @return bool
	 */
	public function AllowReservation($numberOfConflictsSkipped = 0)
	{
		return !$this->areAnyConflictsBlackouts && (($this->maxConcurrentConflicts-$numberOfConflictsSkipped) < $this->maxConcurrentReservations);
	}
}
