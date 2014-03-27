<?php
/**
* Zend Framework (http://framework.zend.com/)
*
* @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
* @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
* @license   http://framework.zend.com/license/new-bsd New BSD License
*/
 
namespace Application\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
 
class IndexController extends AbstractActionController
{
   
    protected $planTable;
   
    /**
     * Default actions when calling the corresponding page.
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        return new ViewModel(array(
             'plans' => $this->getPlanTable()->getAllPlans(),
         ));
    }
   
    /**
     * Returns an object that allows us to call related SQL statements for object 'Plan'
     * @return Ambigous <object, multitype:, \Application\Model\PlanTable>
     */
    public function getPlanTable()
    {
       if (!$this->planTable) {
              $sm = $this->getServiceLocator();
              $this->planTable = $sm->get('Application\Model\PlanTable');
       }
       return $this->planTable;
    }
}