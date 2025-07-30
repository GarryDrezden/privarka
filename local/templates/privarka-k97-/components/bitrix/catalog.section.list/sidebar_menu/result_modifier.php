<?php

$arSort = array();

foreach($arResult['SECTIONS'] as $key=>$section){
	if($section['DEPTH_LEVEL'] == 1){
		if($section['UF_SORTMENU'] && !empty($section['UF_SORTMENU'])){
			$arSort[$key] = $section['UF_SORTMENU'];
		}else{
			$arSort[$key] = 99999;
		}
	}
}

asort($arSort);
$arResultSort = array();

foreach($arSort as $key=>$sort){
	$arResultSort['SECTIONS'][] = $arResult['SECTIONS'][$key];
	foreach($arResult['SECTIONS'] as $key2=>$section){
		if($section['LEFT_MARGIN'] > $arResult['SECTIONS'][$key]['LEFT_MARGIN'] && $section['RIGHT_MARGIN'] < $arResult['SECTIONS'][$key]['RIGHT_MARGIN']){
			$arResultSort['SECTIONS'][] = $section;
		}
	}
}

$arResult['SECTIONS'] = $arResultSort['SECTIONS'];

unset($arResultSort['SECTIONS']);
if($_SERVER['REMOTE_ADDR'] == '81.1.252.98'){
	//echo '<pre>';print_r($arResult['SECTIONS'][0]);echo '</pre>';
}