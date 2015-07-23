<?php

use Zend\EventManager\EventManager;

class Personalizacao {

	protected $em;
	
	protected $phase = 1;
	
	public function __construct() {
	}
	
	public function setEventManager($eventManager ) {
		$eventManager->setIdentifiers(array(__CLASS__, get_class($this) ) );
		$this->em = $eventManager;
	}
	
	public function getEventManager() {
		if(null  === $this->em ){
			$this->em = new EventManager;
		}
		return $this->em;
	}
	
	public function inicializar() {
		echo "processo inicializado com sucesso\n";
		$this->getEventManager()->trigger("p.start", $this, array($this->phase));
	}
	
	public function finalizar() {
		echo "processo finalizado com successo!\n";
		$this->getEventManager()->trigger("p.end", $this, array());
	}
}

