<?php
namespace PHPCrystal\RESTful\Facade;

return Extension::create()
	->setDirectory(__DIR__)
	->setComposerName('phpcrystal/restful-api')
	->setRouter('PHPCrystal\\RESTful\\Service\\Router\\Restful')
;
