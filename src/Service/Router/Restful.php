<?php
namespace PHPCrystal\RESTful\Service\Router;

use PHPCrystal\PHPCrystal\Service\Event as Event;
use PHPCrystal\PHPCrystal\Service\Router\AbstractRouter;
use PHPCrystal\RESTful\Component\MVC\Controller\Action\AbstractAction;

class Restful extends AbstractRouter
{
	/**
	 * @return void
	 */
	public function init()
	{
		parent::init();
		
		$context = $this->getApplication()
			->getContext();
		
		$this->hostname = $context->get('phpcrystal.RESTful.router.hostname');
		$this->uriPathPrefix = $context->get('phpcrystal.RESTful.router.uriPath');		
	}
	
	/**
	 * @return void
	 */
	protected function invalidateActions()
	{
		foreach ($this->getApplication()->getValidActions() as $action) {
			if ($action instanceof AbstractAction) {
				$action->setValidityFlag(false);
			}
		}
	}
	
	/**
	 * @return boolean
	 */
	public function handle(Event\Type\Http\Request $event)
	{
		if ( ! parent::matchRequest($event->getRequest())) {
			$this->invalidateActions();
			return false;
		}
		
		foreach ($this->getApplication()->getValidActions() as $action) {
			// Skip actions which do not belong to the package
			if ( ! $action instanceof AbstractAction) {
				continue;
			}
			
			if ( $action->matchRequest($event->getRequest())) {
				$this->action = $action;
				
				$this->controller = $this->getFactory()
					->createControllerByAction($action);				
				
				$this->frontController = $this->getFactory()
					->createFrontControllerByAction($action);				
				
				return true;
			}
		}
		
		$this->triggerResponse404($event, Event\Type\Http\Response404::create());
	}
}