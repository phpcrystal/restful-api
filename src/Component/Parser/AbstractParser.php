<?php
namespace PHPCrystal\RESTful\Component\Parser;

abstract class AbstractParser
{
	protected $data;

	/**
	 * @return 
	 */
	public function getData()
	{
		return $this->data;
	}
	
	abstract public function parse($inputStr);
}

