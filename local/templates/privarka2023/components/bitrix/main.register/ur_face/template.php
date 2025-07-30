<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>
<div class="bx-auth-reg">

<?if($USER->IsAuthorized()):?>
	<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>
<?else:?>
<?if (count($arResult["ERRORS"]) > 0):
	foreach ($arResult["ERRORS"] as $key => $error)
		if (intval($key) == 0 && $key !== 0) 
			$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

	ShowError(implode("<br />", $arResult["ERRORS"]));

elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
?>
<?endif?>

<?if($arResult["SHOW_SMS_FIELD"] == true):?>

<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform">
	<input type="hidden" name="UF_USER_TYPE" value="1" />
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;
?>
<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
<table>
	<tbody>
		<tr>
			<td><?echo GetMessage("main_register_sms")?><span class="starrequired">*</span></td>
			<td><input size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" /></td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td></td>
			<td><input type="submit" name="code_submit_button" value="<?echo GetMessage("main_register_sms_send")?>" /></td>
		</tr>
	</tfoot>
</table>
</form>

<script>
new BX.PhoneAuth({
	containerId: 'bx_register_resend',
	errorContainerId: 'bx_register_error',
	interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
	data:
		<?=CUtil::PhpToJSObject([
			'signedData' => $arResult["SIGNED_DATA"],
		])?>,
	onError:
		function(response)
		{
			var errorDiv = BX('bx_register_error');
			var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
			errorNode.innerHTML = '';
			for(var i = 0; i < response.errors.length; i++)
			{
				errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
			}
			errorDiv.style.display = '';
		}
});
</script>

<div id="bx_register_error" style="display:none"><?ShowError("error")?></div>

<div id="bx_register_resend"></div>

<?else:?>

<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;
?>

<?
//Создаем массив из свойств обязательных к заполнению
$requred_user_propertys = array();
$i=0;
foreach ($arResult["REQUIRED_FIELDS"] as $FIELD):
	$i++;
	$requred_user_propertys[$i] = $FIELD;
endforeach;
?>

<div class="register">
	<td colspan="2"><b><?//=GetMessage("AUTH_REGISTER")?></b>
	<div class="">
	<?// ********************* User properties ***************************************************?>
		<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"){?>
			<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField){?>
				<div class="bx-authform-formgroup-container">
					<div class="bx-authform-label-container">
						<?=$arUserField["EDIT_FORM_LABEL"]?>:
							<?if (in_array($arUserField["FIELD_NAME"], $requred_user_propertys)):?>
								<span class="starrequired">*</span>
							<?endif;?>
					</div>
					<div class="bx-authform-input-container">
						<?$APPLICATION->IncludeComponent(
							"bitrix:system.field.edit",
							$arUserField["USER_TYPE"]["USER_TYPE_ID"],
							array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "regform"), null, array("HIDE_ICONS"=>"Y"));
						?>
					</div>
				</div>
			<?}?>
		<?}?>
<?foreach ($arResult["SHOW_FIELDS"] as $FIELD):?>
	<?if($FIELD == "AUTO_TIME_ZONE" && $arResult["TIME_ZONE_ENABLED"] == true):?>

		<div class="bx-authform-formgroup-container">
			<div class="bx-authform-label-container">
				<?echo GetMessage("main_profile_time_zones_auto")?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?>
			</div>
			<div class="bx-authform-input-container">
				
			</div>
		</div>
		<tr>
			<td><?echo GetMessage("main_profile_time_zones_auto")?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?></td>
			<td>
				<select name="REGISTER[AUTO_TIME_ZONE]" onchange="this.form.elements['REGISTER[TIME_ZONE]'].disabled=(this.value != 'N')">
					<option value=""><?echo GetMessage("main_profile_time_zones_auto_def")?></option>
					<option value="Y"<?=$arResult["VALUES"][$FIELD] == "Y" ? " selected=\"selected\"" : ""?>><?echo GetMessage("main_profile_time_zones_auto_yes")?></option>
					<option value="N"<?=$arResult["VALUES"][$FIELD] == "N" ? " selected=\"selected\"" : ""?>><?echo GetMessage("main_profile_time_zones_auto_no")?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?echo GetMessage("main_profile_time_zones_zones")?></td>
			<td>
				<select name="REGISTER[TIME_ZONE]"<?if(!isset($_REQUEST["REGISTER"]["TIME_ZONE"])) echo 'disabled="disabled"'?>>
		<?foreach($arResult["TIME_ZONE_LIST"] as $tz=>$tz_name):?>
					<option value="<?=htmlspecialcharsbx($tz)?>"<?=$arResult["VALUES"]["TIME_ZONE"] == $tz ? " selected=\"selected\"" : ""?>><?=htmlspecialcharsbx($tz_name)?></option>
		<?endforeach?>
				</select>
			</td>
		</tr>
	<?else:?>
		<div class="bx-authform-formgroup-container">
			<div class="bx-authform-label-container">
				<?=GetMessage("REGISTER_FIELD_".$FIELD)?>:<?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?>
			</div>
			<div class="bx-authform-input-container">
				<?switch ($FIELD){
					case "PASSWORD":?>
					<input size="30" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" class="bx-auth-input" />
					<?if($arResult["SECURE_AUTH"]):?>
						<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
							<div class="bx-auth-secure-icon"></div>
						</span>
						<noscript>
							<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
								<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
							</span>
						</noscript>
						<script type="text/javascript">
							document.getElementById('bx_auth_secure').style.display = 'inline-block';
						</script>
					<?endif?>
					<?
					break;
					case "CONFIRM_PASSWORD":?>
						<input size="30" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" />
					<?
					break;
					case "PERSONAL_GENDER":?>
						<select name="REGISTER[<?=$FIELD?>]">
							<option value=""><?=GetMessage("USER_DONT_KNOW")?></option>
							<option value="M"<?=$arResult["VALUES"][$FIELD] == "M" ? " selected=\"selected\"" : ""?>><?=GetMessage("USER_MALE")?></option>
							<option value="F"<?=$arResult["VALUES"][$FIELD] == "F" ? " selected=\"selected\"" : ""?>><?=GetMessage("USER_FEMALE")?></option>
						</select>
					<?
					break;
					case "PERSONAL_COUNTRY":
					case "WORK_COUNTRY":?>
						<select name="REGISTER[<?=$FIELD?>]">
						<?foreach ($arResult["COUNTRIES"]["reference_id"] as $key => $value){?>
							<option value="<?=$value?>"<?if ($value == $arResult["VALUES"][$FIELD]):?> selected="selected"<?endif?>>
								<?=$arResult["COUNTRIES"]["reference"][$key]?>
							</option>
						<?}?>
						</select>
					<?
					break;
					case "PERSONAL_PHOTO":
					case "WORK_LOGO":?>
						<input size="30" type="file" name="REGISTER_FILES_<?=$FIELD?>" />
					<?
					break;
					case "PERSONAL_NOTES":
					case "WORK_NOTES":?>
						<textarea cols="30" rows="5" name="REGISTER[<?=$FIELD?>]"><?=$arResult["VALUES"][$FIELD]?></textarea>
					<?
					break;
					default:
						if ($FIELD == "PERSONAL_BIRTHDAY"):?>
							<small><?=$arResult["DATE_FORMAT"]?></small><br />
						<?endif;?>
						<input size="30" type="text" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" />
					<?
					if ($FIELD == "PERSONAL_BIRTHDAY")
						$APPLICATION->IncludeComponent(
							'bitrix:main.calendar',
							'',
							array(
								'SHOW_INPUT' => 'N',
								'FORM_NAME' => 'regform',
								'INPUT_NAME' => 'REGISTER[PERSONAL_BIRTHDAY]',
								'SHOW_TIME' => 'N'
							),
							null,
							array("HIDE_ICONS"=>"Y")
						);
					?>
				<?}?>
			</div>
		</div>
	<?endif?>
<?endforeach?>
						<?// ******************** /User properties ***************************************************?>
						<?
						/* CAPTCHA */
						if ($arResult["USE_CAPTCHA"] == "Y"){
							?>
								<div class="bx-authform-formgroup-container">
									<div class="bx-authform-label-container">
										<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
									</div>
									<div class="bx-authform-input-container">
										<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
									</div>
								</div>
								<div class="bx-authform-formgroup-container">
									<div class="bx-authform-label-container">
									<?=GetMessage("REGISTER_CAPTCHA_PROMT")?>:<span class="starrequired">*</span>
									</div>
									<div class="bx-authform-input-container">
										<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" />
									</div>
								</div>
								
							<?
						}
						/* !CAPTCHA */
						?>
					</div>
					<div class="bx-authform-formgroup-container">
						<input type="submit" class="btn_main" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>" />
					</div>
				</div>
			</form>
			<div class="bx-authform-formgroup-container">
				<?$APPLICATION->IncludeComponent("bitrix:main.userconsent.request", "",
					array(
						"ID" => COption::getOptionString("main", "new_user_agreement", ""),
						"IS_CHECKED" => "Y",
						"AUTO_SAVE" => "N",
						"IS_LOADED" => "Y",
						"ORIGINATOR_ID" => $arResult["AGREEMENT_ORIGINATOR_ID"],
						"ORIGIN_ID" => $arResult["AGREEMENT_ORIGIN_ID"],
						"INPUT_NAME" => $arResult["AGREEMENT_INPUT_NAME"],
						"REPLACE" => array(
							"button_caption" => GetMessage("AUTH_REGISTER"),
							"fields" => array(
								rtrim(GetMessage("AUTH_NAME"), ":"),
								rtrim(GetMessage("AUTH_LAST_NAME"), ":"),
								rtrim(GetMessage("AUTH_LOGIN_MIN"), ":"),
								rtrim(GetMessage("AUTH_PASSWORD_REQ"), ":"),
								rtrim(GetMessage("AUTH_EMAIL"), ":"),
							)
						),
					)
				);?>
			</div>
			<div class="bx-authform-formgroup-container">
				<div class="bx-authform-input-container">
					<span class="field-wrap fields boolean">
						<span class="field-item fields boolean">
							<input class="fields boolean" type="hidden" value="0" name="UF_NEWS_LETTER">
								<label>
									<input type="checkbox" value="1" name="UF_NEWS_LETTER" checked="">
									Я согласен получать новости с акциями и спецпредложениями от ООО «Контур»
								</label>
						</span>
					</span>
				</div>	
			</div>
			<div class="alert alert-warning">
				<?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?>
			</div>
			<div class="alert alert-warning">
				<?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?>
			</div>
		<? endif //$arResult["SHOW_SMS_FIELD"] == true 
		?>
		<div class="alert alert-warning">
			<span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?>
		</div>
	<? endif ?>
</div>