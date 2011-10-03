<?php 
/////////////////////////////////////Modified by: BinSun@mail.com 20110929/////////////////////////////////////
$sOk = 0;
$dbug = 1;
$dbugOk = 0;
$dDbug = 1;
$dDbugOk = 0;
function say($say) {
	if (is_array ( $say )) {
		print_r ( $say );
		brn ();
	} else {
		echo $say . "<br/>\n";
	}
}
function sayOk($say) {
	global $sOk;
	if ($sOk) {
		say ( $say );
	}
}
function debug($say) {
	global $dbug;
	if ($dbug) {
		say ( $say );
	}
}
function debugOk($say) {
	global $dbugOk;
	if ($dbugOk) {
		say ( $say );
	}
}
function dDebug($say) {
	global $dDbug;
	if ($dDbug) {
		say ( $say );
	}
}
function dDebugOk($say) {
	global $dDbugOk;
	if ($dDbugOk) {
		say ( $say );
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////// (web source) display
function brn($number = 1) {
	for(; $number > 0; $number --) {
		$tStringNbsp .= "<br />\n";
	}
	echo $tStringNbsp;
}
function returnBrn($number = 1) {
	for(; $number > 0; $number --) {
		$tStringNbsp .= "<br />\n";
	}
	return $tStringNbsp;
}
function n($number = 1) {
	for(; $number > 0; $number --) {
		$tStringNbsp .= "\n";
	}
	echo $tStringNbsp;
}
function returnN($number = 1) {
	for(; $number > 0; $number --) {
		$tStringNbsp .= "\n";
	}
	return $tStringNbsp;
}
function nbsp($number = 1) {
	for(; $number > 0; $number --) {
		$tStringNbsp .= "&nbsp;";
	}
	echo $tStringNbsp;
}
function returnNbsp($number = 1) {
	for(; $number > 0; $number --) {
		$tStringNbsp .= "&nbsp;";
	}
	return $tStringNbsp;
}
?>
<?php

function timetostr($time) {
	return date ( "Y-m-d H:i:s", $time );
}

?>
<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////// check something modify something 
// check email address 
function isEmailAddress($string){
	if (! preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/i", $string)) {
		return FALSE;
	}else {
		return TRUE;
	}
}

// be sure not empty
function itemEmpty($array) {
	foreach ( $array as $tItemEmpty ) {
		if ($tItemEmpty == '') {
			return TRUE;
		}
	}
	return FALSE;
}

// trim all spaces, tabs etc. in a string
function trimAnyWhere($string) {
	$string = str_replace ( array (" ", "\t", "\n", "\r", "\0", "\x0B" ), "", $string );
	return $string;
}

// replace all NON-alphabat ' " \ /  etc. in a string to space
function replaceNonAlphabetWithSpace($string) {
	$string = preg_replace ( "/\W+/", " ", $string );
	return $string;
}

// replace all NON-alphabat ' " \ /  etc. in a string to _
function replaceNonAlphabetWithUnderline($string) {
	$string = preg_replace ( "/\W+/", "_", $string );
	return $string;
}

?>
<?php

function inputText2VariableName($inputText) { // no spaces , only lower, captical and _
	$inputText = trim ( $inputText );
	if (strstr ( $inputText, ' ' )) {
		$inputText = ucwords ( strtolower ( $inputText ) );
		$inputText = str_replace ( array (' ' ), '', $inputText );
		$initialCharacter_inputText2VariableName = strtolower ( substr ( $inputText, 0, 1 ) );
		$inputText = preg_replace ( '/^(\w)(\w+)/', $initialCharacter_inputText2VariableName . '$2', $inputText );
	}
	$inputText = replaceNonAlphabetWithUnderline ( $inputText );
	return $inputText;
}

function inputText2UserName($inputText) { // no spaces, only lower cases 
	$inputText = trim ( $inputText );
	$inputText = strtolower ( $inputText );
	$inputText = replaceNonAlphabetWithUnderline ( trimAnyWhere ( $inputText ) );
	return $inputText;
}
?>
<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// file 
function make_csv_line($array) {
    // If a value contains a comma, a quote, a space, a 
    // tab (\t), a newline (\n), or a linefeed (\r),
    // then surround it with quotes and replace any quotes inside
    // it with two quotes
    foreach($array as $i => $value) {
        if ((strpos($value, ',')  !== false) ||
            (strpos($value, '"')  !== false) ||
            (strpos($value, ' ')  !== false) ||
            (strpos($value, "\t") !== false) ||
            (strpos($value, "\n") !== false) ||
            (strpos($value, "\r") !== false)) {
            $array[$i] = '"' . str_replace('"', '""', $value) . '"';
        }
    }
    // Join together each value with a comma and tack on a newline
    return implode(',', $array) . "\n";
}
?>
<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// array

// trim every item and del emptys
function trimArray(array $tArray) {
	foreach ( $tArray as $key => $value ) {
		$tArray [$key] = trim ( $tArray [$key] );
		$tArray [$key] = str_replace ( array (' ' ), '', $tArray [$key] );
		if ($tArray [$key] == '') {
			unset ( $tArray [$key] );
		}
	}
	return $tArray;
}

function resizeArrayByProbability($array, $probabilityOfInUse) {
	$array = trimArray ( $array );
	if (($probabilityOfInUse == 0) || sizeof ( $array ) == 0) {
		return array ();
	}
	if ($probabilityOfInUse >= 1) {
		return $array;
	}
	$eachRepresentNumber = 1 / $probabilityOfInUse;
	$i = 1;
	$oldFloored = $newFloored = 0;
	foreach ( $array as $key => $value ) {
		$newFloored = floor ( $i / $eachRepresentNumber );
		if ($newFloored > $oldFloored) {
			$oldFloored = $newFloored;
		} else {
			unset ( $array [$key] );
		}
		$i ++;
	}
	return $array;
}
?>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// http header
function sendHttpHeaderCsvFile() {
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="dishes.csv"');
}
?>
<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// web js
function getSelfUrl() {
	if (! isset ( $_SERVER ['REQUEST_URI'] )) {
		$serverrequri = $_SERVER ['PHP_SELF'];
	} else {
		$serverrequri = $_SERVER ['REQUEST_URI'];
	}
	$s = empty ( $_SERVER ["HTTPS"] ) ? '' : ($_SERVER ["HTTPS"] == "on") ? "s" : "";
	$protocol = strleft ( strtolower ( $_SERVER ["SERVER_PROTOCOL"] ), "/" ) . $s;
	$port = ($_SERVER ["SERVER_PORT"] == "80") ? "" : (":" . $_SERVER ["SERVER_PORT"]);
	return $protocol . "://" . $_SERVER ['SERVER_NAME'] . $port . $serverrequri;
}

// select all or none of all checkboxes
function create_function_setAllCheckbox() {
	echo <<<create_function_setAllCheckBox
	function SetAllCheckbox(FormName, FieldName, CheckValue)
	{
		if(!document.forms[FormName])
			return;
		var objCheckBoxes = document.forms[FormName].elements[FieldName];
		if(!objCheckBoxes)
			return;
		var countCheckBoxes = objCheckBoxes.length;
		if(!countCheckBoxes)
			objCheckBoxes.checked = CheckValue;
		else
			// set the check value for all check boxes
			for(var i = 0; i < countCheckBoxes; i++)
				objCheckBoxes[i].checked = CheckValue;
	}\n
create_function_setAllCheckBox;
}

function create_function_changeVisibility() {
	echo <<<create_function_changeVisibility
	function changeVisibility(commaDelimitedIdList,commaDelimitedVisibilityList){
		var idList = commaDelimitedIdList.split(",");
		var visibilityList = commaDelimitedVisibilityList.split(",");
		for (i = 0; i < idList.length; i++){
			if (visibilityList[i] == "Y"){
				visibilityList[i] = "visible";
			}else if(visibilityList[i] == "N"){
				visibilityList[i] = "hidden";
			}
			document.getElementById(idList[i]).style.visibility=visibilityList[i];
		}
	}\n
create_function_changeVisibility;
}

function create_function_changeDisplay() {
	echo <<<create_function_changeDisplay
	function changeDisplay(commaDelimitedIdList,commaDelimitedDisplayList){
		var idList = commaDelimitedIdList.split(",");
		var displayList = commaDelimitedDisplayList.split(",");
		for (i = 0; i < idList.length; i++){
			if (displayList[i] == "Y"){
				displayList[i] = "block";
			}else if(displayList[i] == "N"){
				displayList[i] = "none";
			}
			document.getElementById(idList[i]).style.display=displayList[i];
		}
	}\n
create_function_changeDisplay;
}

function input_button_setAllCheckboxSelected($formname, $checkboxName) {
	echo <<<input_button_setAllCheckboxSelected
	<input type="button" onclick="SetAllCheckbox('$formname', '$checkboxName', true);" value="&nbsp;&nbsp;All&nbsp;&nbsp;">
input_button_setAllCheckboxSelected;
}
function input_button_setAllCheckboxUnselected($formname, $checkboxName) {
	echo <<<input_button_setAllCheckboxUnselected
	<input type="button" onclick="SetAllCheckbox('$formname', '$checkboxName', false);" value="None">
input_button_setAllCheckboxUnselected;
}
?>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// form

// hidden 
function input_hidden($element_name, $aElementValuePairList) {
	print '<input type="hidden" name="' . $element_name . '" value="';
	print htmlentities ( $aElementValuePairList [$element_name] ) . '">';
}

// password box
function input_password($element_name, $aElementValuePairList = array(), $maxlength = 45) {
	print '<input type="password" maxlength="' . $maxlength . '" name="' . $element_name . '" value="';
	print htmlentities ( $aElementValuePairList [$element_name] ) . '">';
}

// text box
function input_text($element_name, $aElementValuePairList = array(), $maxlength = 45) {
	print '<input type="text" maxlength="' . $maxlength . '" name="' . $element_name . '" value="';
	print htmlentities ( $aElementValuePairList [$element_name] ) . '">';
}

// submit button
function input_submit($element_name = "submit", $aElementValuePairList = array("submit"=>" OK ")) {
	print '<input type="submit" name="' . $element_name . '" value="';
	print htmlentities ( $aElementValuePairList [$element_name] ) . '"/>';
}

// textarea
function input_textarea($element_name, $aElementValuePairList = array(), $maxlength = 495) {
	print '<textarea maxlength="' . $maxlength . '" name="' . $element_name . '">';
	print htmlentities ( $aElementValuePairList [$element_name] ) . '</textarea>';
}

// radio button or checkbox
function input_radiocheck($type, $element_name, $aElementValuePairList, $element_value, $lable) {
	print '<input type="' . $type . '" name="' . $element_name . '" value="' . $element_value . '" ';
	if ($element_value == $aElementValuePairList [$element_name]) {
		print ' checked="checked"';
	}
	print '/>';
	print htmlentities ( $lable );
}

// radio button  
function input_radio($element_name, $aElementValuePairList, $element_value, $lable = "") {
	print '<input type="radio" name="' . $element_name . '" value="' . $element_value . '" ';
	if ($element_value == $aElementValuePairList [$element_name]) {
		print ' checked="checked"';
	}
	print '/>';
	print htmlentities ( $lable );
}

// checkbox button 
function input_checkbox($element_name, $aElementValuePairList, $element_value, $lable = "") {
	print '<input type="checkbox" name="' . $element_name . '" value="' . $element_value . '" ';
	if ($element_value == $aElementValuePairList [$element_name]) {
		print ' checked="checked"';
	}
	print '/>';
	print htmlentities ( $lable );
}

// <select> menu
function input_select($element_name, $aElementValuePairList, $aOptionLabelPairList, $multiple = false, $id = '') {
	// print out the <select> tag
	print '<select id="'.$id.'" name="' . $element_name;
	// if multiple choices are permitted, add the multiple attribute
	// and add a [] to the end of the tag name
	if ($multiple) {
		print '[]" multiple="multiple';
	}
	print '">';
	
	// set up the list of things to be selected
	$selected_options = array ();
	if ($multiple) {
		foreach ( $aElementValuePairList [$element_name] as $val ) {
			$selected_options [$val] = true;
		}
	} else {
		$selected_options [$aElementValuePairList [$element_name]] = true;
	}
	
	// print out the <option> tags
	foreach ( $aOptionLabelPairList as $option => $label ) {
		print '<option value="' . htmlentities ( $option ) . '"';
		if ($selected_options [$option]) {
			print ' selected="selected"';
		}
		print '>' . htmlentities ( $label ) . '</option>';
	}
	print '</select>';
}
?>