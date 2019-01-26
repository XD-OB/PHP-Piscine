<?php

require_once '../ex00/Color.class.php';

Class Vertex {

	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 0;
	private $_color = 0;
	public static $verbose = false;

	public static function doc() {
		return (file_get_contents('Vertex.doc.txt'));
	}

	public function __toString() {
		$str = 'Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f';
		if (self::$verbose)
			$str .= (', '.$this->_color);
		return (sprintf($str, $this->_x, $this->_y, $this->_z, $this->_w).' )');
	}

	public function __construct($kwargs) {
		$this->_x = $kwargs['x'];
		$this->_y = $kwargs['y'];
		$this->_z = $kwargs['z'];
		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		else
			$this->_w = 1;
		if (array_key_exists('color', $kwargs))
			$this->_color = $kwargs['color'];
		else
			$this->_color = new Color(['rgb' => 0xffffff]);
		if (self::$verbose)
			print($this." constructed\n");
	}

	public function __destruct() {
		if (self::$verbose)
			print($this." destructed\n");
	}

	public function getX() {return $this->_x;}
	public function getY() {return $this->_y;}
	public function getZ() {return $this->_z;}
	public function getW() {return $this->_w;}
	public function getColor() {return $this->_color;}

	public function setX($x) {$this->_x = $x;} 
	public function setY($y) {$this->_y = $y;} 
	public function setZ($z) {$this->_z = $z;} 
	public function setW($w) {$this->_w = $w;} 
	public function setColor($color) {$this->_color = $color;} 

}

?>