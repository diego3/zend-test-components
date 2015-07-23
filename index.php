<?php

require_once "vendor/autoload.php";
require_once "Personalizacao.php";
require_once "MailController.php";


use Zend\EventManager\SharedEventManager;
use Zend\EventManager\EventManager;


$manager = new EventManager;

$shared = new SharedEventManager();
$shared->attach("Personalizacao", "p.end", array("MailController", "sendmailAction"));//

//enviar email ao finalizar o processo
//$manager->attach("p.end", function($e) {
	//echo "email enviado com successo para atendimento\n";
//});

$process = new Personalizacao();
$process->setEventManager($manager);
$process->getEventManager()->setSharedManager($shared);

$process->inicializar();
$process->finalizar();







