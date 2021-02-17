<?php

use App\Models\Setting;

function getConfigValueFromSettingTable($config_key){
	$settings = Setting::where('config_key',$config_key) -> first();

	if(!empty($settings))
	{
		return $settings -> config_value;
	}
	return null;
}