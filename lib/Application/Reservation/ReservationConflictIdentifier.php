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
		#var_dump($reservations);
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

			$existingItems = $this->strategy->GetItemsBetween($startDate, $endDate, null);

			#probably put here, $instance['start_date'] = $instance_start_date-1

			#var_dump($reservation->StartDate());


			/** @var IReservedItemView $existingItem */
			foreach ($existingItems as $existingItem)
			{
				if (
						
						($bufferTime == null || $reservationSeries->BookedBy()->IsAdmin) &&
						($existingItem->GetStartDate()->Equals($reservation->EndDate()) || $existingItem->GetEndDate()->Equals($reservation->StartDate()))
				)
				{
					#var_dump("heyo");
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

	
	protected function IsInConflict(Reservation $instance, ReservationSeries $series, IReservedItemView $existingItem=null, $keyedResources=null)
	{
		error_reporting(E_ERROR);
		#var_dump("IsInConflict");
		
		$link = mysqli_connect("192.168.160.2", $user="root", $password="Hi");
	
		#$instance = ["id"=>1,"start_date"=>'2021-08-06 12:00:00',"end_date"=> '2021-08-06 12:40:01',"ref"=> '610c5dd321baa684688475',"series_id"=>1,"CPU"=>4,"spin"=>50,"HDD"=>200,"RAM"=>1000];
		$relevant = ["CPU"=>0,"RAM"=>0,"HDD"=>0];
	
		$query = "SELECT * FROM bookedscheduler.server_resources";
		$server_resource = mysqli_query($link, $query);
	
	
		$server_resources = [];
		while ($result = $server_resource->fetch_assoc()) {
			$server_resources[] = $result;
		}
	///////////////////////////////////////////////////////////////////////////////////////
		$resources = "SELECT * FROM bookedscheduler.reservation_instances";
		$category = mysqli_query($link, $resources);
		$reservation_instances = [];
	
		while ($result = $category->fetch_assoc()) {
			$reservation_instances[] = $result;
		}
	
		#var_dump($reservation_instances);
	
	///////////////////////////////////////////////////////////////////////////////////////////
		#var_dump($series);
		$series_id = $series->resourceID();
		#var_dump($series_id);
		
		$reservation_module = "SELECT * FROM bookedscheduler.resources where resource_id='$series_id'";
		$server_resource = mysqli_query($link, $reservation_module);
	
	
		$instance_rows = [];
		while ($result = $server_resource->fetch_assoc()) {
			$instance_rows[] = $result;
		}
	
	/////////////////////////////////////////////////////////////////////////////////////////
		#$item = ($instance->endDate());
		#vsubstr($item.'timestring',0,19));
	
	
		//if instance between result.start_time and result.end_time or result between instance.start_time and instance.end_time
		foreach ($reservation_instances as $item) {

			$start = ($instance->startDate());
			$start = (substr($start.'timestring',0,19));

			$end = ($instance->endDate());
			$end = (substr($end.'timestring',0,19));

			#var_dump($end);
			#var_dump($start);

			

			$end_item = strtotime($item['end_date']);
			$end_instance = strtotime($end);

			$start = strtotime($start)-(60*60);
			$start_item = strtotime($item['start_date'])-(60*60);

			#var_dump($end_instance);
			#var_dump($end_item);

			#var_dump($end_item);
			#var_dump($item['end_date']);


		
			if (((($start >= $start_item) && ($start < $end_item)) ||  $end_instance  >= $start_item && ($end_instance  < $end_item ))
		|| (($start_item >= $start && ($start_item < $end_instance))   || (($end_item >= $start) && ($end_item < $end_instance )))) {
	

			var_dump($end_instance);
			var_dump($end);

			var_dump($item['start_date']);
			var_dump($item['end_date']);


			var_dump(strtotime($start) >= strtotime($item['start_date']));
			var_dump(strtotime($start) < $end_item);
			var_dump($end_instance  >= strtotime($item['start_date']) && ($end_instance  < $end_item ));
			var_dump(((strtotime($item['start_date']) >= strtotime($start) && (strtotime($item['start_date']) < $end_instance))));
			var_dump((($end_item >= strtotime($start)) && ($end_item < $end_instance )));

			var_dump($item['start_date']);
			var_dump($item['end_date']);
	
			$series_id = $item['series_id'];
			
			$item_intermediate = "SELECT resource_id FROM bookedscheduler.reservation_resources where series_id='$series_id'";
			$item_resource = mysqli_query($link, $item_intermediate);
	
	
			$item_rows = [];
			while ($result = $item_resource->fetch_assoc()) {
				$item_rows[] = $result;
			}
	
			$resource_id = $item_rows[0]['resource_id'];
			$item_module = "SELECT * FROM bookedscheduler.resources where resource_id='$resource_id'";
			$item_resource = mysqli_query($link, $item_module);

			
	
	
			$server_rows2 = [];
			while ($result = $item_resource->fetch_assoc()) {
				$server_rows2[] = $result;
			}
			#var_dump($server_rows2[0]['name']);
	
				$relevant['CPU'] += $server_rows2[0]['CPU'];
				$relevant['RAM'] += $server_rows2[0]['RAM'];
				$relevant['HDD'] += $server_rows2[0]['HDD'];

				
			}
		}
	
		var_dump($relevant);
		#var_dump($instance_rows);
		#var_dump($server_resources);
		#var_dump(debug_backtrace());
	
		if (($relevant['HDD']+$instance_rows[0]['HDD']<= $server_resources[0]['MAX_HDD']) && ($relevant['RAM']+$instance_rows[0]['RAM']<= $server_resources[0]['MAX_RAM']) && ($relevant['CPU']+$instance_rows[0]['CPU']<= $server_resources[0]['MAX_CPU'])) {
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

		
		*/
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
