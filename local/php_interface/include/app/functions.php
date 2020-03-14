<?php

/** 
 * get custom module settings
 * @param string $optionName
 * @return string
*/
public static function getOption(string $optionName)
{
	$value = \Bitrix\Main\Config\Option::get("some_project.administration", $optionName);
	return $value;
}

/** 
 * set custom module settings
 * @param string $optionName
 * @param string $value
*/
public static function setOption(string $optionName, string $value)
{
	\Bitrix\Main\Config\Option::set("some_project.administration", $optionName, $value);
}

/** 
 * get data from user field value by ID or XML_ID
 * $USER_FIELD_ID must be isset as some constant in project
 *
 * @param int $USER_FIELD_ID
 * @param int $ID
 * @param string $xmlID
 * @return array
 */
public static function getCustomUserField(int $USER_FIELD_ID, int $ID=0, $xmlID='')
{
	$arFilter = array(
		"USER_FIELD_ID" => $USER_FIELD_ID,			
	);
	$xmlID = intVal($xmlID);
	$ID = intVal($ID);
	if($ID > 0)
		$arFilter["ID"] = $ID;
	else if($xmlID > 0)
		$arFilter["XML_ID"] = $xmlID;
	if($ID == 0 && $xmlID == 0)
		return array();

	$rsEnum = \CUserFieldEnum::GetList(array(), $arFilter);
	if($arEnum = $rsEnum->Fetch())
	{
		return $arEnum;
	}
	return array();
}
