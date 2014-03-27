<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class PlanTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

	public function getPlan($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}
	
	public function getPlanByNameYearVersion($year, $plan, $version) {
		$rowset = $this->tableGateway->select(array('PLAN_YEAR' => $year, 'PLAN_NAME' => $plan, 'PLAN_VERSION' => $version));
		$row = $rowset->current();
	
		if (!$row) {
			throw new \Exception("Could not find any entry with year $year, plan $plan and version $version");
		}
		return $row;
	}
}