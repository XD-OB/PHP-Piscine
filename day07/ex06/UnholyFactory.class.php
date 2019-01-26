<?php

class UnholyFactory {

	protected $fsold = array();
	protected $arch = array();
	protected $ass = array();
	public function absorb($ennemy) {
	
		if(!($ennemy instanceof Fighter))
			print('(Factory can\'t absorb this, it\'s not a fighter)'.PHP_EOL);
		else {
			if (get_class($ennemy) == 'Footsoldier')
				$this->fsold[] = $ennemy;
			if (get_class($ennemy) == 'Archer')
				$this->arch[] = $ennemy;
			if (get_class($ennemy) == 'Assassin')
				$this->ass[] = $ennemy;
		}	
	}

	public function fabricate($fighter) {
		if ($fighter == 'foot soldier') {
			print('(Factory fabricates a fighter of type foot soldier)'.PHP_EOL);
			return ($this->fsold[0]);
		}	
		if ($fighter == 'archer') {
			print('(Factory fabricates a fighter of type archer)'.PHP_EOL);
			return ($this->arch[0]);
		}
		if ($fighter == 'assassin') {
			print('(Factory fabricates a fighter of type assassin)'.PHP_EOL);
			return ($this->ass[0]);
		}
		if ($fighter != 'assassin' && $fighter != 'archer' && $fighter != 'foot soldier') {
			print('(Factory hasn\'t absorbed any fighter of type ');
			print($fighter.')'.PHP_EOL);
		}
	}
}

?>
