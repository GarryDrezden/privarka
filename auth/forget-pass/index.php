<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Забыли пароль");
?>
<div class="content_wrapper">
	<div class="caption">
        <h1>
            <?$APPLICATION->ShowTitle(true);?> </h1>
        </div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:system.auth.forgotpasswd",
        "flat",
        Array(
            "PERSONAL" => "/personal/",
            "SEF_FOLDER" => "/auth/",
            "SEF_MODE" => "Y",
            "SEF_URL_TEMPLATES" => array()
        )
    );?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>