<?php
namespace PHPCrystal\RESTful;

$this->openSection('phpcrystal.RESTful');
	
$this->set('router.hostname', null);
$this->set('router.uriPath', '/');
$this->set('parser', new Component\Parser\Json());

$this->closeSection();