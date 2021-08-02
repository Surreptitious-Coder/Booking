<?php

require_once(ROOT_DIR . 'lib/Application/Schedule/namespace.php');

class FakeResourceService implements IResourceService
{
	/**
	 * @var ResourceDto[]
	 */
	public $_AllResources = array();

    /**
	 * @var ResourceDto[]
	 */
	public $_ScheduleResources = array();

    /**
     * @var ScheduleResourceFilter|null
     */
    public $_LastFilter;

    /**
	 * Gets resource list for a schedule
	 * @param int $scheduleId
	 * @param bool $includeInaccessibleResources
	 * @param UserSession $user
	 * @param ScheduleResourceFilter|null $filter
	 * @return array|ResourceDto[]
	 */
	public function GetScheduleResources($scheduleId, $includeInaccessibleResources, UserSession $user, $filter = null)
	{
		return $this->_ScheduleResources;
	}

	public function GetAllResources($includeInaccessibleResources, UserSession $user, $filter = null, $pageNumber = null, $pageSize = null)
	{
	    $this->_LastFilter = $filter;
		return $this->_AllResources;
	}

	/**
	 * @return array|AccessoryDto[]
	 */
	public function GetAccessories()
	{
		// TODO: Implement GetAccessories() method.
	}

	/**
	 * @param int $scheduleId
	 * @param UserSession $user
	 * @return ResourceGroupTree
	 */
	public function GetResourceGroups($scheduleId, UserSession $user)
	{
		// TODO: Implement GetResourceGroups() method.
	}

	/**
	 * @return ResourceType[]
	 */
	public function GetResourceTypes()
	{
		// TODO: Implement GetResourceTypes() method.
	}

	/**
	 * @return Attribute[]
	 */
	public function GetResourceAttributes()
	{
		// TODO: Implement GetResourceAttributes() method.
	}

	/**
	 * @return Attribute[]
	 */
	public function GetResourceTypeAttributes()
	{
		// TODO: Implement GetResourceTypeAttributes() method.
	}

    /**
     * @param int $resourceId
     * @return BookableResource
     */
    public function GetResource($resourceId)
    {
        // TODO: Implement GetResource() method.
    }
}
