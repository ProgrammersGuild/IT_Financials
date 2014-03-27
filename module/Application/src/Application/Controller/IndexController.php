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
    
    public function indexAction()
    {
        
        return new ViewModel(array(
             'plans' => $this->getPlanTable()->fetchAll(),
         ));
    }
    
    public function getPlanTable()
    {
    	if (!$this->planTable) {
    		$sm = $this->getServiceLocator();
    		$this->planTable = $sm->get('Application\Model\PlanTable');
    	}
    	return $this->planTable;
    }
}
