<?php

class NightsWatch {

	private	$_newRecruit = array();

	public function recruit($pers) {
		if(isset(class_implements($pers)['IFighter']))
			$this->_newRecruit[] = $pers;
	}	
	public function fight() {
		foreach($this->_newRecruit as $warrior)
			$warrior->fight();
	}
}

?>
