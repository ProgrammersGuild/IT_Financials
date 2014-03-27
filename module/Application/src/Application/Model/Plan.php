<?php
 
namespace Application\Model;
 
class Plan
{
       public $PLAN_ID;
       public $PLAN_NAME;
       public $PLAN_YEAR;
       public $PLAN_VERSION;
 
       /**
       * Getter method of parameter 'PLAN_ID'
       */
       public function getPlanID() {
              return $this->PLAN_ID;
       }
      
       /**
       * Setter method of parameter 'PLAN_ID'
       * @param unknown $plan_id
       */
       public function setPlanID($plan_id) {
              $this->PLAN_ID = $plan_id;
       }
      
       /**
       * Getter method of parameter 'PLAN_NAME'
       */
       public function getPlanName() {
              return $this->PLAN_NAME;
       }
      
       /**
       * Setter method of parameter 'PLAN_NAME'
       * @param unknown $plan_name
       */
       public function setPlanName($plan_name) {
              $this->PLAN_NAME = $plan_name;
       }
      
       /**
       * Getter method of parameter 'PLAN_YEAR'
       */
       public function getPlanYear() {
              return $this->PLAN_YEAR;
       }
      
       /**
       * Setter method of parameter 'PLAN_YEAR'
       * @param unknown $plan_year
       */
       public function setPlanYear($plan_year) {
              $this->PLAN_YEAR = $plan_year;
       }
      
       /**
       * Getter method of parameter 'PLAN_VERSION'
       */
       public function getPlanVersion() {
              return $this->PLAN_VERSION;
       }
      
       /**
       * Setter method of parameter '$PLAN_NAME'
       * @param unknown $plan_version
       */
       public function setPlanVersion($plan_version) {
              $this->PLAN_VERSION = $plan_version;
       }
}