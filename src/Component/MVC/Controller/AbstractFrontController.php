<?php
namespace PHPCrystal\RESTful\Component\MVC\Controller;

use PHPCrystal\Core\Component\MVC\Controller as Controller;

abstract class AbstractFrontController extends Controller\AbstractFrontController
{
	private $parser;
	
	public function init()
	{
		parent::init();		
		$context = $this->getApplication()
			->getContext();
		$this->parser = $context->get('phpcrystal.RESTful.parser');
	}
	
	/**
	 * @return PHPCrystal\RESTful\Component\Parser\AbstractParser
	 */
	final public function getParser()
	{
		return $this->parser;
	}
	
	/**
	 * @return \PHPCrystal\Core\Component\MVC\Controller\Input\Input
	 */
	protected function onBeforeExecution($event)
	{
		$this->parser->parse(file_get_contents('php://input'));
		
		return $this->getParser()->getData();
	}
}
