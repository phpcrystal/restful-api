<?php
namespace PHPCrystal\RESTful\Component\Parser;

use PHPCrystal\Core\Component\MVC\Controller\Input\Input;
use PHPCrystal\Core\Component\Exception as Exception;

class Json extends AbstractParser
{
	public function parse($inputStr)
	{
		if (empty($inputStr)) {
			$dataArray = [];
		} else {
			$dataArray = json_decode($inputStr, true);
			$error = json_last_error();		

			if ($error != JSON_ERROR_NONE) {
				Exception\System\FunctionInvocation::create()
					->addFuncName('json_decode')
					->addFuncArgs([$inputStr, true])
					->_throw();
			}
		}

		$this->data = Input::create('RESTfulData', $dataArray);
	}
}
