<?php

require_once '../ex01/Vertex.class.php';

Class Vector {

	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 0;
	public static $verbose = false;

	public static function doc() {
		return (file_get_contents('Vector.doc.txt'));
	}

	public function __toString() {
		$str = 'Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )';
		return (sprintf($str, $this->_x, $this->_y, $this->_z, $this->_w));
	}

	public function __construct($kwargs) {
		if (array_key_exists('orig', $kwargs))
			$orig = $kwargs['orig'];
		else
			$orig = new Vertex([
									'x' => 0, 
									'y' => 0, 
									'z' => 0
								]);
		if (array_key_exists('dest', $kwargs))
		$dest = $kwargs['dest'];
		else
		$dest = new Vertex([
								'x' => $kwargs['x'],
								'y' => $kwargs['y'],
								'z' => $kwargs['z']
							]);
		$this->_x = $dest->getX() - $orig->getX();
		$this->_y = $dest->getY() - $orig->getY();
		$this->_z = $dest->getZ() - $orig->getZ();
		$this->_w = array_key_exists('w', $kwargs) ? $kwargs['w'] : 0;
		if (self::$verbose)
			print($this." constructed\n");
	}

	public function __destruct() {
		if (self::$verbose)
			print($this." destructed\n");
	}

	public function magnitude() {
		return (sqrt($this->_x * $this->_x +$this->_y * $this->_y + $this->_z * $this->_z));
	}

	public function add(Vector $v) {
		return (new self([
							'x' => $this->_x + $v->getX(),
							'y' => $this->_y + $v->getY(),
							'z' => $this->_z + $v->getZ()
						]));
	}

	public function sub(Vector $v) {
		return (new self([
							'x' => $this->_x - $v->getX(),
							'y' => $this->_y - $v->getY(),
							'z' => $this->_z - $v->getZ()
						]));
	}

	public function div($d) {
		if ($d)
			return (new self([
								'x' => $this->_x / $d,
								'y' => $this->_y / $d,
								'z' => $this->_z / $d
							]));
	}

	public function scalarProduct($v) {
		return (new self([
							'x' => $this->_x * $v,
							'y' => $this->_y * $v,
							'z' => $this->_z * $v
						]));
	}

	public function crossProduct(Vector $v) {
		return (new self([
							'x' => $this->_y * $v->getZ() - $v->getY() * $this->_z,
							'y' => $this->_z * $v->getX() - $v->getZ() * $this->_x,
							'z' => $this->_x * $v->getY() - $v->getX() * $this->_y
						]));
	}

	public function opposite() {
		return (new self([
							'x' => -$this->_x,
							'y' => -$this->_y,
							'z' => -$this->_z
						]));
	}

	public function dotProduct(Vector $p) {
		return ($this->_x * $p->getX() + $this->_y * $p->getY() + $this->_z * $p->getZ());
	}

	public function cos(Vector $v) {
		return ($this->dotProduct($v) / ($this->magnitude() * $v->magnitude()));
	}

	public function normalize() {
		return ($this->div($this->magnitude()));
	}

	public function getX() {return $this->_x;}
	public function getY() {return $this->_y;}
	public function getZ() {return $this->_z;}
	public function getW() {return $this->_w;}

}

?>