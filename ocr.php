<?php

error_reporting(E_ALL);
require 'chars.php';

class OCR {
	/**
	 * Chars object
	 * @var object
	 */
	private $chars;
	/**
	 * Store binary data
	 * @var string
	 */
	private $matriz;

	/**
	 * Image filename to recognition
	 * @var string
	 */
	private $img_filename;

	/**
	 * Chars finded
	 * @var string
	 */
	private $chars_finded = "";

	/**
	 * Debug On/Off
	 * @var boolean
	 */
	private $debug = false;

	/**
	 * Autorun
	 * @var boolean
	 */
	private $autorun = true;

	private $started_time;
	private $finish_time;

	public function setDebug($debug) {
		$this->debug = $debug;
	}

	public function __construct($img_filename, $autorun = false) {
		$this->started_time = time();

		$this->chars = new Chars();
		$this->img_filename = $img_filename;
		$this->autorun = $autorun;

		if ($this->autorun) {
			$this->run();
		}
	}

	/**
	 * Execute algorithm:
	 * Take image file, search by white spaces and black start point to define a character until new white space block (row).
	 * Once character finded, so create temporary images files to store each char finded
	 * @param none
	 * @return void
	 */
	public function run() {
		if (!$this->img_filename) {
	        throw new Exception('No image filename given');
		}

		$img = imagecreatefrompng($this->img_filename);

		// Get the width and height.
		$width = imagesx($img);
		$height = imagesy($img);

		// Remove transparency
		// Create a white background, the same size as the original.
		$bg = imagecreatetruecolor($width, $height);
		$white = imagecolorallocate($bg, 255, 255, 255);
		imagefill($bg, 0, 0, $white);

		// Merge the two images.
		imagecopyresampled(
		    $bg, $img,
		    0, 0, 0, 0,
		    $width, $height,
		    $width, $height
		);

		$img = $bg;

		$width = imagesx($img)-1;
		$height = imagesy($img)-1;

		//unlink('./temps');
		//mkdir('./temps');

		$intConY = 0;
		$isAllWhite = false;
		$arrChars = array();
		$booNextIndex = false;
		$booEndIndex = false;
		$IndexPixel = array();

		$lookForStartChar = false;
		$xStartChar;
		$xEndChar;
		$arrCharsPositions = [];

		while ($intConY <= $height) {	
			$intConX = 0;
			while ($intConX <= $width) {
				$rgb = imagecolorsforindex($img, imagecolorat($img, $intConX, $intConY));

				$isWhite = ($rgb['red'] == 255 && $rgb['green'] == 255 && $rgb['blue'] == 255);

				$intConY001 = 0;
				
				// Check if row block is all white
				$isAllWhite = false;
				while ($intConY001 <= $height) {
					$rgb = imagecolorsforindex($img, imagecolorat ($img, $intConX, $intConY001));

					if (($rgb['red'] == 255 && $rgb['green'] == 255 && $rgb['blue'] == 255)) {
						$isAllWhite = true;
					}
					else {
						$isAllWhite = false;
						break;
					}
					$intConY001++;
				}

				// WhiteSpace
				if ($isAllWhite && !$xStartWhiteSpace) {
					$xStartWhiteSpace = $intConX;
				}
				if (!$isAllWhite && !$xEndWhiteSpace) {
					$xEndWhiteSpace = $intConX;
				}

				if (!$lookForStartChar && !$isAllWhite) {
					$lookForStartChar = true;
					$xStartChar = $intConX;
				}

				if ($lookForStartChar && $isAllWhite) {
					$strBlockChar = "";
					$xEndChar = $intConX;

					$diffEndCharSrc = ($xEndChar - $xStartChar) + 3;

					$whiteSpache = ($xEndWhiteSpace - $xStartWhiteSpace);

					//var_dump(($xEndChar + $diffEndCharSrc + $whiteSpache + $diffEndCharSrc), $width);

					if (!in_array($xStartChar, $arrCharsPositions)) {
						// Save char X position to avoid re-run
						$arrCharsPositions[] = $xStartChar;
						
						$intConY002 = 0;
						while ($intConY002 <= $height) {	
							$intConX001 = $xStartChar-2;
							$intCounter = 0;
							while ($intCounter <= $diffEndCharSrc) {
								$rgb = imagecolorsforindex($img, imagecolorat ($img, $intConX001, $intConY002));
								$isWhiteChar = ($rgb['red'] == 255 && $rgb['green'] == 255 && $rgb['blue'] == 255);

								$strBlockChar .= $isWhiteChar ? "0" : "1";

								$intConX001++;
								$intCounter++;
							}

							// Fill with 0 spaces
							/*
							while ($intConX001 <= $width) {
								$strBlockChar .= "0";
								$intConX001++;
							}
							*/
							$strBlockChar .= PHP_EOL;	
							
							$intConY002++;
						}

						if ($this->debug) {
							echo str_replace(PHP_EOL, '<BR>', $strBlockChar);
						}
						
						$lookForStartChar = false;

						$ch_finded = $this->recognition($strBlockChar);
						
						if ($this->debug) {
							echo "Char finded: " . $ch_finded . "<br>";
						}

						$this->chars_finded .= $ch_finded;

						if ($this->debug) {
							echo '<BR>';
							echo '<BR>';
						}
					}
				}

				$this->matriz .= ($isWhite ? '0' : 1);

				/*
				if (!$lookForChar) {

					
				}
				*/

				/*
				if (isset($indexLetter) && $isAllWhiteLast && !$isAllWhite && $intConX > $IndexX) {
					$booNextIndex = true;
				}
				else {
					$booNextIndex = false;
				}

				if (isset($indexLetter) && !$isAllWhiteLast && $isAllWhite) {
					$booEndIndex = true;
				}
				else {
					$booEndIndex = false;
				}
				*/

				

				/*
				if (!$isWhite && !(isset($indexLetter))) {
					$indexLetter = 0;
					$IndexPixel = array($intConX, $intConY);
				}
				else if ($booNextIndex) {
					$indexLetter = ++$indexLetter;
					$booNextIndex = false;
					$IndexX = $intConX;
					$IndexPixel[$indexLetter] = $intConX;
				}

				// Sepate each char
				if (isset($indexLetter)) {
					// Search for correct index
					$intKey = false;
					foreach ($IndexPixel as $key => $x) {
						if ($intConX >= $x ) {
							$g = (isset($IndexPixel[$key+1]) ? $intConX < $IndexPixel[$key+1] : true);
							if ($g) {
								$intKey = $key;
								break;
							}
						}
					}
					
					if (is_numeric($intKey))
					$arrChars[$intKey][] = array($intConX, $intConY, $isWhite);
				}
				$indexLetterLast = $indexLetter;
				$isAllWhiteLast = $isAllWhite;
				*/

				$intConX++;
				
			}	

			$this->matriz .= PHP_EOL;
			
			$intConY++;
		}

		/*

		// Re-organize images separated
		// Put all on left
		$arrCharsNew = array();
		foreach ($arrChars as $key => $arrChar) {
			foreach ($arrChar as $key001 => $pixel) {
				$arrCharsNew[$key][$key001] = array($pixel[0]-$IndexPixel[$key], $pixel[1], $pixel[2]);		
			}
		}

		$arrChars = $arrCharsNew;

		// Sort array
		ksort($arrChars);

		// Create separated images		
		foreach ($arrChars as $key => $arrChar) {
			$im = imagecreatetruecolor($width+1, $height+1);

			imagecolorallocate($im, 255, 255, 255);

			// Set All Pixels to white
			imagefill($im, 0, 0, imagecolorallocate($im, 255, 255, 255));

			// Define char block if is white
			$charBlockWhite = false;
			$startCheckBlock = false;

			foreach ($arrChar as $pixel) {
				if ($pixel[2]) {
					// White pixel
					$bg = imagecolorallocate($im, 255, 255, 255);

					if ($startCheckBlock) {
						$charBlockWhite = true;
					}
				}
				else {
					// Black pixel
					$bg = imagecolorallocate($im, 0, 0, 0);
					$startCheckBlock = true;
					$charBlockWhite = false;
				}

				imagesetpixel($im, $pixel[0], $pixel[1] , $bg);
			}

			$charBlock = "";
			
			// Remove white spaces
			$img_char_width = imagesx($im)-1;
			$img_char_height = imagesy($im)-1;
			$intConCharY = 0;

			while ($intConCharY <= $img_char_height) {
				$intConCharX = 0;
				while ($intConCharX <= $img_char_width) {
					$rgb = imagecolorsforindex($im, imagecolorat($im, $intConCharX, $intConCharY));

					$isCharWhite = ($rgb['red'] == 255 && $rgb['green'] == 255 && $rgb['blue'] == 255);

					$charBlock .= $isCharWhite ? "0" : "1";

					$intConCharX++;
				}
				$charBlock .= PHP_EOL;
				$intConCharY++;
			}

			$ch_finded =  $this->recognition($charBlock);
			if ($this->debug) {
				echo "<br>";
				echo "<br>";
				echo "<br>";
				ECHO $charBlock;

				echo "<br>";
				echo "<br>";
				echo "<br>";	

				echo $ch_finded;

				echo "<br>";
				echo "<br>";
				echo "<br>";
			}

			$this->chars_finded .= $ch_finded;

			imagepng($im, './temps/' . $key . '.png');

			unset($im);
		}

		*/

		if ($this->debug) {
			echo $this->matriz;
		}

		//echo time() - $this->started_time . " seconds<br>";

		return $this->chars_finded;
	}

	public function recognition($charBlock) {
		foreach (get_object_vars($this->chars) as $char_pattern) {
			if ($find = preg_match($char_pattern['pattern'], $charBlock, $matches)) {
				if ($this->debug) {
					echo "<br>";
					echo "RegEx matches : ";
					var_dump($matches);
					echo "<br>";
				}
				return $char_pattern['char'];
			}			
		}
	}
}