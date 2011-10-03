<?php
class Sunny_Escape {
	function doEnhancedEscape($string) {
		$stringToEscape = $string;
		
		//clean
		$stringToEscape = strip_tags($stringToEscape);
		$stringToEscape = htmlentities($stringToEscape, ENT_QUOTES, "UTF-8");
		
		return $stringToEscape;
	}
}
