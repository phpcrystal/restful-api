<?php
namespace PHPCrystal\RESTful\Facade;

return Extension::create()
	->setDirectory(__DIR__)
	->setRouter('PHPCrystal\\RESTful\\Service\\Router\\Restful')
;
