<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

\Bitrix\Main\UI\Extension::load('ui.fonts.opensans');

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';
?>
<style>
	.catalog_all{
		display: flex;
		flex-flow: column;
	}	
	.card_sections_block{
		display: flex;
		flex-flow: wrap;
    	height: auto;
    	padding-bottom: 30px;
		border-bottom: 1px solid #ddd;
	}
	.card_section{
		width: 200px;
		height:100px;
		display: flex;
		align-items: center;
		background-color: #fff;
		box-shadow: 0 1px 4px 0 #bfbfbf;
		box-sizing: border-box;
		margin-left: 10px;
    	margin-top: 10px;
		border-radius: 5px;
	}
	.card_section_img{
		width: 80px;
		height: 80px;
	}
	.card_section_body{
		padding-left: 5px;
	}
	.card_section_title a{
		color: #000;
		text-decoration: none;
		font-weight: 600;
		font-size: 12px;
	}
</style>
<div class="news-list<?=$themeClass?>">
	<div class="col-sale">
		<?if($arParams["DISPLAY_TOP_PAGER"]):?>
			<?=$arResult["NAV_STRING"]?><br />
		<?endif;?>

		<div class="row catalog_all">
			<div class="card_sections_block">
				<?foreach($arResult["ITEMS"] as $arItem):
						$catalog_link = $arItem['PROPERTIES']['LINK']['VALUE'];
					if(empty($arItem['PROPERTIES']['ANCHOR_PAGE']['VALUE'])){
						$res = CIBlockSection::GetByID($arItem['PROPERTIES']['CATALOG_PAGE']['VALUE']);
						$ar_res = $res->GetNext();
						$catalog_page = $ar_res['SECTION_PAGE_URL'];
						$chars = ['krepezh/','oborudovanie/'];
						$catalog_page = str_replace($chars, '', $catalog_page);
						$url_request = $_SERVER['REQUEST_URI'];
					}else{
						$catalog_page = rawurldecode($arItem['PROPERTIES']['ANCHOR_PAGE']['VALUE']);
						$url_request = rawurldecode($_SERVER['REQUEST_URI']);
					}
						//echo $catalog_page.'<br>';
						//echo $url_request.'<br>';
						//echo $_SERVER['REQUEST_URI'];
						if($catalog_page == $url_request){
				?>
				<div class="card_section">
					<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"] ?>" class="card_section_img" alt="...">
					<div class="card_section_body">
						<p class="card_section_title">
							<a href="<?=$catalog_link?>">
								<?echo $arItem["NAME"]?>
							</a>
						</p>
					</div>
				</div>
				<?}else{}?>
					<style>
						/*.card_sections_block{display:none;}*/
					</style>
				<? endforeach;?>
			</div>
		</div>
	</div>
</div>