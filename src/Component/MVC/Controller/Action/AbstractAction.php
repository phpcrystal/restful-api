<?php
namespace PHPCrystal\RESTful\Component\MVC\Controller\Action;

use PHPCrystal\PHPCrystal\Component\MVC\Controller\Action as Action;

abstract class AbstractAction extends Action\AbstractAction
{
	//
	// Event hooks
	//

	protected function onGet($event) {  }
	
	protected function onPost($event) {  }
	
	protected function onPut($event) {  }
	
	protected function onPatch($event) {  }
	
	protected function onDelete($event) {  }
}
