<?php

require_once '../ex02/Vector.class.php';

Class Matrix {

	const	IDENTITY = 0;
	const	SCALE = 1;
	const	RX = 2;
	const	RY = 3;
	const	RZ = 4;
	const	TRANSLATION = 5;
	const	PROJECTION = 6;
	const	COPY = 7;
	private $_vtcX;
	private $_vtcY;
	private $_vtcZ;
	private $_vtx0;
	public static $verbose = false;

	public static function doc() {
		return (file_get_contents('Matrix.doc.txt'));
	}

	public function __toString() {
		$str = "M | vtcX | vtcY | vtcZ | vtxO\n-----------------------------\n";
		$str .= sprintf("x | %.2f | %.2f | %.2f | %.2f\n", $this->_vtcX->getX(), $this->_vtcY->getX(), $this->_vtcZ->getX(), $this->_vtx0->getX());
		$str .= sprintf("y | %.2f | %.2f | %.2f | %.2f\n", $this->_vtcX->getY(), $this->_vtcY->getY(), $this->_vtcZ->getY(), $this->_vtx0->getY());
		$str .= sprintf("z | %.2f | %.2f | %.2f | %.2f\n", $this->_vtcX->getZ(), $this->_vtcY->getZ(), $this->_vtcZ->getZ(), $this->_vtx0->getZ());
		$str .= sprintf("w | %.2f | %.2f | %.2f | %.2f", $this->_vtcX->getW(), $this->_vtcY->getW(), $this->_vtcZ->getW(), $this->_vtx0->getW());
		return ($str);
	}

	public function __construct($kwargs) {
		switch ($kwargs['preset']) {
			case self::IDENTITY:
				$this->_vtcX = new Vector([
											'x' => 1,
											'y' => 0,
											'z' => 0
										]);
				$this->_vtcY = new Vector([
											'x' => 0,
											'y' => 1,
											'z' => 0
										]);
				$this->_vtcZ = new Vector([
											'x' => 0,
											'y' => 0,
											'z' => 1
										]);
				$this->_vtx0 = new Vertex([
											'x' => 0,
											'y' => 0,
											'z' => 0,
											'w' => 1
										]);
				$str = 'IDENTITY';
				break;
			case self::TRANSLATION:
				$this->_vtcX = new Vector([
											'x' => 1,
											'y' => 0,
											'z' => 0
										]);
				$this->_vtcY = new Vector([
											'x' => 0,
											'y' => 1,
											'z' => 0
										]);
				$this->_vtcZ = new Vector([
											'x' => 0,
											'y' => 0,
											'z' => 1
										]);
				$this->_vtx0 = new Vertex([
											'x' => $kwargs['vtc']->getX(),
											'y' => $kwargs['vtc']->getY(),
											'z' => $kwargs['vtc']->getZ(),
											'w' => 1
										]);
				$str = 'TRANSLATION preset';
				break;
			case self::SCALE:
				$this->_vtcX = new Vector([
											'x' => $kwargs['scale'],
											'y' => 0,
											'z' => 0
										]);
				$this->_vtcY = new Vector([
											'x' => 0,
											'y' => $kwargs['scale'],
											'z' => 0
										]);
				$this->_vtcZ = new Vector([
											'x' => 0,
											'y' => 0,
											'z' => $kwargs['scale']
										]);
				$this->_vtx0 = new Vertex([
											'x' => 0,
											'y' => 0,
											'z' => 0,
											'w' => 1
										]);
				$str = 'SCALE preset';
				break;
			case self::RX:
				$this->_vtcX = new Vector([
											'x' => 1,
											'y' => 0,
											'z' => 0
										]);
				$this->_vtcY = new Vector([
											'x' => 0,
											'y' => cos($kwargs['angle']),
											'z' => sin($kwargs['angle'])
										]);
				$this->_vtcZ = new Vector([
											'x' => 0,
											'y' => -sin($kwargs['angle']),
											'z' => cos($kwargs['angle'])
										]);
				$this->_vtx0 = new Vertex([
											'x' => 0,
											'y' => 0,
											'z' => 0,
											'w' => 1
										]);
				$str = 'Ox ROTATION preset';
				break;
			case self::RY:
				$this->_vtcX = new Vector([
											'x' => cos($kwargs['angle']),
											'y' => 0,
											'z' => -sin($kwargs['angle'])
										]);
				$this->_vtcY = new Vector([
											'x' => 0,
											'y' => 1,
											'z' => 0
										]);
				$this->_vtcZ = new Vector([
											'x' => sin($kwargs['angle']),
											'y' => 0,
											'z' => cos($kwargs['angle'])
										]);
				$this->_vtx0 = new Vertex([
											'x' => 0,
											'y' => 0,
											'z' => 0,
											'w' => 1
										]);
				$str = 'Oy ROTATION preset';
				break;
			case self::RZ:
				$this->_vtcX = new Vector([
											'x' => cos($kwargs['angle']),
											'y' => sin($kwargs['angle']),
											'z' => 0
										]);
				$this->_vtcY = new Vector([
											'x' => -sin($kwargs['angle']),
											'y' => cos($kwargs['angle']),
											'z' => 0
										]);
				$this->_vtcZ = new Vector([
											'x' => 0,
											'y' => 0,
											'z' => 1
										]);
				$this->_vtx0 = new Vertex([
											'x' => 0,
											'y' => 0,
											'z' => 0,
											'w' => 1
										]);
				$str = 'Oz ROTATION preset';
				break;
			case self::PROJECTION:
				$scale = 1 / tan($kwargs['fov'] * 0.5 * pi() / 180);
				$this->_vtcX = new Vector([
											'x' => $scale / $kwargs['ratio'],
											'y' => 0,
											'z' => 0
										]);
				$this->_vtcY = new Vector([
											'x' => 0,
											'y' => $scale,
											'z' => 0
										]);
				$this->_vtcZ = new Vector([
											'x' => 0,
											'y' => 0,
											'z' => -(($kwargs['far'] + $kwargs['near']) / ($kwargs['far'] - $kwargs['near'])),
											'w' => -1
										]);
				$this->_vtx0 = new Vertex([
											'x' => 0,
											'y' => 0,
											'z' => -(2 * $kwargs['far'] * $kwargs['near'] / ($kwargs['far'] - $kwargs['near'])),
											'w' => 0
										]);
				$str = 'PROJECTION preset';
				break;
			case self::COPY:
				$this->_vtcX = $kwargs['vtcX'];
				$this->_vtcY = $kwargs['vtcY'];
				$this->_vtcZ = $kwargs['vtcZ'];
				$this->_vtx0 = $kwargs['vtx0'];
				$flag = TRUE;
				break;
		}
		if (self::$verbose && $kwargs['preset'] !== self::COPY)
			print('Matrix '.$str." instance constructed\n");
	}

	public function mult(Matrix $rhs) {
		return (new self([
							'preset' => self::COPY,
							'vtcX' => new Vector ([
													'x' => $this->_vtcX->getX() * $rhs->getVtcX()->getX() + $this->_vtcY->getX() * $rhs->getVtcX()->getY() + $this->_vtcZ->getX() * $rhs->getVtcX()->getZ() + $this->_vtx0->getX() * $rhs->getVtcX()->getW(),
													'y' => $this->_vtcX->getY() * $rhs->getVtcX()->getX() + $this->_vtcY->getY() * $rhs->getVtcX()->getY() + $this->_vtcZ->getY() * $rhs->getVtcX()->getZ() + $this->_vtx0->getY() * $rhs->getVtcX()->getW(),
													'z' => $this->_vtcX->getZ() * $rhs->getVtcX()->getX() + $this->_vtcY->getZ() * $rhs->getVtcX()->getY() + $this->_vtcZ->getZ() * $rhs->getVtcX()->getZ() + $this->_vtx0->getZ() * $rhs->getVtcX()->getW(),
													'w' => $this->_vtcX->getW() * $rhs->getVtcX()->getX() + $this->_vtcY->getW() * $rhs->getVtcX()->getY() + $this->_vtcZ->getW() * $rhs->getVtcX()->getZ() + $this->_vtx0->getW() * $rhs->getVtcX()->getW()
												]),
							'vtcY' => new Vector ([
													'x' => $this->_vtcX->getX() * $rhs->getVtcY()->getX() + $this->_vtcY->getX() * $rhs->getVtcY()->getY() + $this->_vtcZ->getX() * $rhs->getVtcY()->getZ() + $this->_vtx0->getX() * $rhs->getVtcY()->getW(),
													'y' => $this->_vtcX->getY() * $rhs->getVtcY()->getX() + $this->_vtcY->getY() * $rhs->getVtcY()->getY() + $this->_vtcZ->getY() * $rhs->getVtcY()->getZ() + $this->_vtx0->getY() * $rhs->getVtcY()->getW(),
													'z' => $this->_vtcX->getZ() * $rhs->getVtcY()->getX() + $this->_vtcY->getZ() * $rhs->getVtcY()->getY() + $this->_vtcZ->getZ() * $rhs->getVtcY()->getZ() + $this->_vtx0->getZ() * $rhs->getVtcY()->getW(),
													'w' => $this->_vtcX->getW() * $rhs->getVtcY()->getX() + $this->_vtcY->getW() * $rhs->getVtcY()->getY() + $this->_vtcZ->getW() * $rhs->getVtcY()->getZ() + $this->_vtx0->getW() * $rhs->getVtcY()->getW()
												]),
							'vtcZ' => new Vector ([
													'x' => $this->_vtcX->getX() * $rhs->getVtcZ()->getX() + $this->_vtcY->getX() * $rhs->getVtcZ()->getY() + $this->_vtcZ->getX() * $rhs->getVtcZ()->getZ() + $this->_vtx0->getX() * $rhs->getVtcZ()->getW(),
													'y' => $this->_vtcX->getY() * $rhs->getVtcZ()->getX() + $this->_vtcY->getY() * $rhs->getVtcZ()->getY() + $this->_vtcZ->getY() * $rhs->getVtcZ()->getZ() + $this->_vtx0->getY() * $rhs->getVtcZ()->getW(),
													'z' => $this->_vtcX->getZ() * $rhs->getVtcZ()->getX() + $this->_vtcY->getZ() * $rhs->getVtcZ()->getY() + $this->_vtcZ->getZ() * $rhs->getVtcZ()->getZ() + $this->_vtx0->getZ() * $rhs->getVtcZ()->getW(),
													'w' => $this->_vtcX->getW() * $rhs->getVtcZ()->getX() + $this->_vtcY->getW() * $rhs->getVtcZ()->getY() + $this->_vtcZ->getW() * $rhs->getVtcZ()->getZ() + $this->_vtx0->getW() * $rhs->getVtcZ()->getW()
												]),
							'vtx0' => new Vertex ([
													'x' => $this->_vtcX->getX() * $rhs->getVtx0()->getX() + $this->_vtcY->getX() * $rhs->getVtx0()->getY() + $this->_vtcZ->getX() * $rhs->getVtx0()->getZ() + $this->_vtx0->getX() * $rhs->getVtx0()->getW(),
													'y' => $this->_vtcX->getY() * $rhs->getVtx0()->getX() + $this->_vtcY->getY() * $rhs->getVtx0()->getY() + $this->_vtcZ->getY() * $rhs->getVtx0()->getZ() + $this->_vtx0->getY() * $rhs->getVtx0()->getW(),
													'z' => $this->_vtcX->getZ() * $rhs->getVtx0()->getX() + $this->_vtcY->getZ() * $rhs->getVtx0()->getY() + $this->_vtcZ->getZ() * $rhs->getVtx0()->getZ() + $this->_vtx0->getZ() * $rhs->getVtx0()->getW(),
													'w' => $this->_vtcX->getW() * $rhs->getVtx0()->getX() + $this->_vtcY->getW() * $rhs->getVtx0()->getY() + $this->_vtcZ->getW() * $rhs->getVtx0()->getZ() + $this->_vtx0->getW() * $rhs->getVtx0()->getW()
												])
						]));
	}

	public function transformVertex(Vertex $vtx) {
		return (new Vertex([
								'x' => $this->_vtcX->getX() * $vtx->getX() + $this->_vtcY->getX() * $vtx->getY() + $this->_vtcZ->getX() * $vtx->getZ() + $this->_vtx0->getX() * $vtx->getW(),
								'y' => $this->_vtcX->getY() * $vtx->getX() + $this->_vtcY->getY() * $vtx->getY() + $this->_vtcZ->getY() * $vtx->getZ() + $this->_vtx0->getY() * $vtx->getW(),
								'z' => $this->_vtcX->getZ() * $vtx->getX() + $this->_vtcY->getZ() * $vtx->getY() + $this->_vtcZ->getZ() * $vtx->getZ() + $this->_vtx0->getZ() * $vtx->getW(),
								'w' => $this->_vtcX->getW() * $vtx->getX() + $this->_vtcY->getW() * $vtx->getY() + $this->_vtcZ->getW() * $vtx->getZ() + $this->_vtx0->getW() * $vtx->getW()
							]));
	}

	public function __destruct() {
		if (self::$verbose)
			print("Matrix instance destructed\n");
	}

	public function getVtcX() {return $this->_vtcX;}
	public function getVtcY() {return $this->_vtcY;}
	public function getVtcZ() {return $this->_vtcZ;}
	public function getVtx0() {return $this->_vtx0;}

}

?>