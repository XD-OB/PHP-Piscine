<?php

abstract class Fighter {
	
	static $countFs = 0;
	static $countAr = 0;
	static $countAs = 0;
	public $f;

	abstract public function fight($target);
	protected function __construct($val) {
		if($val == 'foot soldier') {
			if (self::$countFs == 0) {
				print('(Factory absorbed a fighter of type ');
				print($val.')'.PHP_EOL);
				self::$countFs += 1;
			} else {
				print('(Factory already absorbed a fighter of type ');
				print($val.')'.PHP_EOL);
			}
		}
		if($val == 'archer') {
                        if (self::$countAr == 0) {
                                print('(Factory absorbed a fighter of type ');
                                print($val.')'.PHP_EOL);
                                self::$countAr += 1;
                        } else {
                                print('(Factory already absorbed a fighter of type ');
                                print($val.')'.PHP_EOL);
                        }
		}
		if($val == 'assassin') {
                        if (self::$countAs == 0) {
                                print('(Factory absorbed a fighter of type ');
                                print($val.')'.PHP_EOL);
                                self::$countAs += 1;
                        } else {
                                print('(Factory already absorbed a fighter of type ');
                                print($val.')'.PHP_EOL);
                        }
                }
	}
	

}

?>
