<?php
namespace Application\Model;
 
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Exception\RuntimeException;
 
class PlanTable
{
       protected $tableGateway;
 
       /**
       * Constructor of class 'PlanTable'
       * @param TableGateway $tableGateway
       */
       public function __construct(TableGateway $tableGateway)
       {
              $this->tableGateway = $tableGateway;
       }
      
       /**
       * Fetches all rows of table 'fintool.PLAN'
       * @return Ambigous <\Zend\Db\ResultSet\ResultSet, NULL, \Zend\Db\ResultSet\ResultSetInterface>
       */
       public function getAllPlans()
       {
              $resultSet = $this->tableGateway->select();
              return $resultSet;
       }
 
       /**
       * Retrieves one row of table 'fintool.PLAN'
       * @param int $id defines the unique identifier
       * @throws \Exception in case plan does not exist
       * @return mixed
       */
       public function getPlanByID($id)
       {
              $id  = (int) $id;
              $rowset = $this->tableGateway->select(array('PLAN_ID' => $id));
              $row = $rowset->current();
              if (!$row) {
                     throw new \Exception("Could not find row $id");
              }
              return $row;
       }
      
       /**
       * Removes one row in table 'fintool.PLAN'
       * @param int $id defines the unique identifier
       * @throws \Exception in case plan does not exist
       */
       public function deletePlanByID($id)
       {
           $id  = (int) $id;
        try
        {
              $this->tableGateway->delete(array('PLAN_ID' => $id));
        }
        catch (RuntimeException $e)
        {
            throw new \Exception($e->getMessage());
        }
       }
      
       /**
       * Retrieves one row of table 'fintool.PLAN'
       * @param string $name defines the name of the plan
       * @throws \Exception in case plan does not exist
       * @return mixed
       */
       public function getPlanByName($name)
       {
              $rowset = $this->tableGateway->select(array('PLAN_NAME' => $name));
              $row = $rowset->current();
              if (!$row) {
                     throw new \Exception("Could not find row $name");
              }
              return $row;
       }
      
       /**
       * Adds a new plan row to the existing table 'fintool.PLAN'
       * @param int $year defines the respective year
       * @param string $plan_name defines the name of the plan
       * @param int $version defines the specific version
       * @throws \Exception in case the row already exists
       */
       public function addNewPlan($year, $plan, $version)
       {
        try
        {
            $this->tableGateway->insert(array('PLAN_YEAR' => $year, 'PLAN_NAME' => $plan, 'PLAN_VERSION' => $version));
        }
        catch (RuntimeException $e)
        {
            throw new \Exception($e->getMessage());
        }
             
       }
      
       /**
       * Updates an existing row by replacing all values in table 'fintool.PLAN'
       * @param int $id defines the unique identifier of a specific row
       * @param int $year defines the respective year
       * @param string $plan_name defines the name of the plan
       * @param int $version defines the specific version
       * @throws \Exception in case the row does not exist
       */
       public function updatePlan($id, $year, $plan, $version) {
           $id  = (int) $id;
           try
        {
            $this->tableGateway->update(array('PLAN_YEAR' => $year, 'PLAN_NAME' => $plan, 'PLAN_VERSION' => $version), array('PLAN_ID' => $id));
        }
        catch (RuntimeException $e)
        {
            throw new \Exception($e->getMessage());
        }
       }
      
       /**
       * Fetches a specific row in table 'fintool.PLAN' by using all attributes as parameters
       * @param int $year defines the respective year
       * @param string $plan_name defines the name of the plan
       * @param int $version defines the specific version
       * @throws \Exception in case the row does not exist
       * @return Ambigous <multitype:, ArrayObject, NULL, \ArrayObject, \Zend\Db\ResultSet\mixed, unknown>
       */
       public function getPlanByNameYearVersion($year, $plan, $version) {
              $rowset = $this->tableGateway->select(array('PLAN_YEAR' => $year, 'PLAN_NAME' => $plan, 'PLAN_VERSION' => $version));
              $row = $rowset->current();
      
              if (!$row) {
                     throw new \Exception("Could not find any entry with year $year, plan $plan and version $version");
              }
              return $row;
       }
}