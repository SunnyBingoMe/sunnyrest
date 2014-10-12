/**
 * Author: BinSunSunny@gmail.com
 */
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
}

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
}

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
}

function date_slashMmDdYyyy_2_dashYyyyMmDd (oldDate){ // "09/20/2011" => "2011-09-20"
	var dateSplited = oldDate.split("/");
	var newDateString = "" + dateSplited[2] + "-" + dateSplited[0] + "-" + dateSplited[1];
	return newDateString;
}

function dateTime_slashMmDdYyyy_2_dashYyyyMmDd (oldDateTime){ // "09/20/2011 17:06:04" => "2011-09-20 17:06:04"
	var dateTimeSplited = oldDateTime.split(" ");
	dateTimeSplited[0] = date_slashMmDdYyyy_2_dashYyyyMmDd (dateTimeSplited[0]);
	var newDateTimeString = "" + dateTimeSplited[0] + " " + dateTimeSplited[1];
	return newDateTimeString;
}