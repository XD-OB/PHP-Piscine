<?php

class Tyrion extends Lannister {

	public function sleepWith($pers) {	
		if (get_class($pers) == 'Jaime')
			print(self::NO);
		if (get_class($pers) == 'Sansa')
			print(self::LET);
		if (get_class($pers) == 'Cersei')
			print(self::NO);
	}
}

?>
