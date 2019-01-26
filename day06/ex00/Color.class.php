<?php

Class Color {

	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = false;

	public static function doc() {
		return (file_get_contents('Color.doc.txt'));
	}

	public function __toString() {
		$str = 'Color( red: %3d, green: %3d, blue: %3d )';
		return (sprintf($str, $this->red, $this->green, $this->blue));
	}

	public function __construct($kwargs) {
		if (array_key_exists('rgb', $kwargs)) {
			$rgb = intval($kwargs['rgb']);
			$this->red = ($rgb >> 16) & 255;
			$this->green = ($rgb >> 8) & 255;
			$this->blue = $rgb & 255;
		}
		else {
			$this->red = intval($kwargs['red']);
			$this->green = intval($kwargs['green']);
			$this->blue = intval($kwargs['blue']);
		}
		if (self::$verbose)
			print($this." constructed.\n");
	}

	public function __destruct() {
		if (self::$verbose)
			print($this." destructed.\n");
	}

	public function add(Color $color) {
		$red = $this->red + $color->red <= 255 ? $this->red + $color->red : 255;
		$green = $this->green + $color->green <= 255 ? $this->green + $color->green : 255;
		$blue = $this->blue + $color->blue <= 255 ? $this->blue + $color->blue : 255;
		return (new self(['red' => $red, 'green' => $green, 'blue' => $blue]));
	}

	public function sub(Color $color) {
		$red = $this->red - $color->red >= 0 ? $this->red - $color->red : 0;
		$green = $this->green - $color->green >= 0 ? $this->green - $color->green : 0;
		$blue = $this->blue - $color->blue >= 0 ? $this->blue - $color->blue : 0;
		return (new self(['red' => $red, 'green' => $green, 'blue' => $blue]));
	}

	public function mult($f) {
		$red = $this->red * $f <= 255 ? $this->red * $f : 255;
		$green = $this->green * $f <= 255 ? $this->green * $f : 255;
		$blue = $this->blue * $f <= 255 ? $this->blue * $f : 255;
		return (new self(['red' => $red, 'green' => $green, 'blue' => $blue]));
	}
}

?>