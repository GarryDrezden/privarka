<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><div class="smartSearch js-smartSearch">
	<div class="smartSearch-form">
		<input type="hidden" class="js-smartSearch-search" />
		<input type="text" 
			class="js-smartSearch-input" 
			placeholder="<?=GetMessage('FORM_PLACEHOLDER')?>" 
			value="<?=htmlspecialchars($_GET["q"])?>" 
			onkeyup="smartsearch_<?=$arParams['ID']?>.keyup(this,event)"
			onclick="smartsearch_<?=$arParams['ID']?>.click(this,event)"
		/>
		<button class="js-smartSearch-clear" onclick="smartsearch_<?=$arParams['ID']?>.clear(this,event)"></button>
		<button class="js-smartSearch-submit" onclick="smartsearch_<?=$arParams['ID']?>.submit(this,event)">
			<?//=GetMessage("ATUM_SMARTSEARCH_POISK")?>
			<img src="/local/templates/privarka2023/components/atum/smartsearch/template2/img/head_menu_search.svg"/>
		</button>
	</div>
	<div class="js-smartSearch-result"></div>
</div>
<script>
	var smartsearch_<?=$arParams['ID']?> = new JsSmartSearch('<?echo CUtil::JSEscape($templateFolder)?>/template_ajax.php','<?echo CUtil::JSEscape($componentPath)?>/ajax.php',<?=CUtil::PhpToJSObject($arParams)?>);
</script>