<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use  \Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width' />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <? 
    // start
    $APPLICATION->ShowHead(); 
    // end
    ?>
	<title><?$APPLICATION->ShowTitle()?></title>
    <? $APPLICATION->ShowPanel() ?>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link href="<?=SITE_TEMPLATE_PATH;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?=SITE_TEMPLATE_PATH;?>/bootstrap/js/bootstrap.bundle.min.js"></script>
	<link rel='stylesheet' href='/local/templates/privarka-k97/styles.css'>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>

    <?
        if(isset($_COOKIE['region'])){
            $arRegion = $_COOKIE['region'];
        }else{
            $arRegion = 5518;
        }
    
        $resRegion = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=> 5, "ID"=>$arRegion));
        if ($ob = $resRegion->GetNextElement()){
            $regionProps = $ob->GetProperties();
            $regionFields = $ob->GetFields();
            $region_name = $regionFields['NAME'];
            $region_phone = $regionProps['PHONE_HEAD']['VALUE'];
            $region_phone_link = preg_replace('![^0-9]+!', '', $regionProps['PHONE_HEAD']['VALUE']);
            $region_email = $regionProps['EMAIL_FOOTER']['VALUE'];
            $region_address = $regionProps['ADDRESS']['~VALUE']['TEXT'];
            $region_time = $regionProps['TIME_WORK']['~VALUE']['TEXT'];
            $contacts_achor =  $regionProps['ANCHOR']['VALUE'];
        }
    ?>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="head">
                <div class="logo">
                    <a href="/">
                        <div class="logo_img"></div>
                    </a>
                </div>
                <div class="search">
                    <div class="search_form">
                        <?$APPLICATION->IncludeComponent(
                            "atum:smartsearch", 
                            "template1", 
                            array(
                                "ELEMENT_SORT_FIELD" => "sort",
                                "ELEMENT_SORT_FIELD2" => "id",
                                "ELEMENT_SORT_ORDER" => "asc",
                                "ELEMENT_SORT_ORDER2" => "desc",
                                "IBLOCK_ID" => "1",
                                "IBLOCK_TYPE" => "catalog",
                                "INCLUDE_JQUERY" => "N",
                                "ITEMS_COUNT" => "8",
                                "ITEMS_COUNT_NAV" => "4",
                                "ITEMS_CURRENCY" => "",
                                "ITEMS_IMAGES" => "",
                                "ITEMS_PRICE_CODE" => "",
                                "SEARCH_ARTICLE_PROPERTY" => "ARTICLE",
                                "SEARCH_BY" => "1",
                                "SEARCH_BY_ARTICLE" => "Y",
                                "SEARCH_MIN_CHARS" => "3",
                                "SEARCH_ONLY_AVAILABLE" => "N",
                                "SEARCH_ONLY_WITH_PICTURE" => "N",
                                "SEARCH_ONLY_WITH_PRICE" => "N",
                                "SEARCH_PAGE" => "/search",
                                "SEARCH_SHOW_SECTIONS" => "N",
                                "COMPONENT_TEMPLATE" => "template1"
                            ),
                            false
                        );?>
                    </div>
                </div>
                <div class="button_block">
                    <div class="region">
                        <p>
                            Ваш регион
                        </p>
                        <a data-bs-toggle="modal" data-bs-target="#regionModal"><?=$region_name;?></a>
                    </div>
                    <div class="head_contacts">
                        <p>
                            <a href="tel:+<?=$region_phone_link;?>" class="head_phone"><?=$region_phone;?></a>
                        </p>
                        <p>
                            <a data-bs-toggle="modal" data-bs-target="#backCallModal" class="head_call_back but_small">Заказать звонок</a>
                        </p>
                    </div>
                    <div class="head_icon">
						<a href="/personal/"><img src="/img/lk.png" alt="" > </a>
						<a href="/basket/"><img src="/img/basket.png" alt="" style="margin-left: 30px;"> </a>
                    </div>
                </div>
            </div>            
            <div class="head_mobile">
                <div class="logo_mobile">
                    <a href="/">
                        <img src="/img/logo.gif" title="" alt=""/>
                    </a>
                </div>
                <div class="header_flex">
                    <div class="region_mobile">
                        <a data-bs-toggle="modal" data-bs-target="#regionModal"> Ваш регион:<br><b><?=$region_name;?></b></a>
                    </div>
                    <div class="head_contacts_mobile">
                        <p>
                            <a href="tel:+<?=$region_phone_link;?>" class="head_phone"><?=$region_phone;?></a>
                        </p>
                        <!-- <p>
                            <a data-bs-toggle="modal" data-bs-target="#backCallModal" class="head_call_back but_small">Заказать звонок</a>
                        </p> -->
                    </div>
                </div>
                <div class="search_mobile">
                    <div class="search_form_mobile">
                        <?$APPLICATION->IncludeComponent(
                            "atum:smartsearch", 
                            "template1", 
                            array(
                                "ELEMENT_SORT_FIELD" => "sort",
                                "ELEMENT_SORT_FIELD2" => "id",
                                "ELEMENT_SORT_ORDER" => "asc",
                                "ELEMENT_SORT_ORDER2" => "desc",
                                "IBLOCK_ID" => "1",
                                "IBLOCK_TYPE" => "catalog",
                                "INCLUDE_JQUERY" => "N",
                                "ITEMS_COUNT" => "8",
                                "ITEMS_COUNT_NAV" => "4",
                                "ITEMS_CURRENCY" => "",
                                "ITEMS_IMAGES" => "",
                                "ITEMS_PRICE_CODE" => "",
                                "SEARCH_ARTICLE_PROPERTY" => "ARTICLE",
                                "SEARCH_BY" => "1",
                                "SEARCH_BY_ARTICLE" => "Y",
                                "SEARCH_MIN_CHARS" => "3",
                                "SEARCH_ONLY_AVAILABLE" => "N",
                                "SEARCH_ONLY_WITH_PICTURE" => "N",
                                "SEARCH_ONLY_WITH_PRICE" => "N",
                                "SEARCH_PAGE" => "/search",
                                "SEARCH_SHOW_SECTIONS" => "N",
                                "COMPONENT_TEMPLATE" => "template1"
                            ),
                            false
                        );?>
                    </div>
                </div>
            </div>

            <div class="menu">
                <div class="dropdown menu_item">
                    <a onclick="myFunctionMenu()" class="dropbtn">
                        <img class="dropbtn" src="/img/gamburger.png" alt="" />
                    </a>
                    <a onclick="myFunctionMenu()" class="dropbtn" style="font-size: 25px;">Каталог</a>
                    <div id="myDropdown" class="dropdown-content">
                        <div class="list-group-menu">
                            <div class="list-group menu_left_block" id="list-tab" role="tablist">
                                <a class="list-group-item-action active" id="list-krep-list" data-bs-toggle="list" href="#list-krep" role="tab" aria-controls="list-krep">Крепеж</a>
                                <a class="list-group-item-action" id="list-equipment-list" data-bs-toggle="list" href="#list-equipment" role="tab" aria-controls="list-equipment">Оборудование</a>
                            </div>
                            <div class="menu_right_block">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="list-krep" role="tabpanel" aria-labelledby="list-krep-list">
                                        <div class="tab-pane-block1">
                                            <div class="menu_lvl2">
                                                <div class="menu_lvl2_item">
													<div class="menu_lvl2_item_link">
														<a href="/zapressovochnyy_krepyezh/" class="lvl2_item">
															<img src="/upload/iblock/bc7/0dbuob7m73n7flilakss2hpyfl6lpo5j.jpg" title="" />
														</a>
                                                    	<a href="/zapressovochnyy_krepyezh/" class="lvl2_item">Запрессовочный крепёж</a>
													</div>
													<div class="menu_lvl2_item_link">
														<a href="/zaklepki/" class="lvl2_item">
															<img src="/upload/iblock/81e/x0gmcogxfm8tj1abyo7wnrrymayu8fl0.png" title="" />
														</a>
                                                    	<a href="/zaklepki/" class="lvl2_item">Заклепки</a>
													</div>
                                                </div>
                                                <div class="menu_lvl2_item">
													<div class="menu_lvl2_item_link">
														<a href="/privarnoy_krepyezh/" class="lvl2_item">
															<img src="/upload/iblock/dcf/jgbab2lo0682661bna775vy5enwb815x.png" title="" />
														</a>
                                                    	<a href="/privarnoy_krepyezh/" class="lvl2_item">Приварной крепёж</a>
													</div>
													<div class="menu_lvl2_item_link">
														<a href="/zakladnye-gayki/" class="lvl2_item">
															<img src="/upload/iblock/299/qa3hc2lwes48r5626kvul14uxiw3drn7.png" title="" />
														</a>
                                                    	<a href="/zakladnye-gayki/" class="lvl2_item">Закладные гайки</a>
                                                	</div>
                                                </div>
                                            </div>
                                        	<a href="/krepezh/" class="all_catalog">Перейти в каталог</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="list-equipment" role="tabpanel" aria-labelledby="list-equipment-list">
                                        <div class="menu_lvl2">
                                            <div class="menu_lvl2_item_equipment">
												<div class="menu_lvl2_item_link">
													<a href="/catalog/oborudovanie_dlya_privarki_krepezha/" class="lvl2_item">
														<img src="/upload/iblock/fd7/6iev49ow3c094jmle715a1ltcxf7baxa.png" title="" />
													</a>
													<a href="/oborudovanie_dlya_privarki_krepezha/" class="lvl2_item">Оборудование для приварки крепежа</a>
												</div>
												<div class="menu_lvl2_item_link">
													<a href="/oborudovanie-dlya-zapressovki-krepezha/" class="lvl2_item">
														<img src="/upload/iblock/7b8/ebh0qwvwzv98sw93pi3da676sjp45ve4.png" title="" />
													</a>
													<a href="/oborudovanie-dlya-zapressovki-krepezha/" class="lvl2_item">Оборудование для запрессовки крепежа</a>
												</div>
                                            </div>
                                        </div>
                                        <a href="/oborudovanie/" class="all_catalog">Перейти в каталог</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu_item">
                    <!-- <a href="about.php">Компания</a> -->
                    <div class="dropdown">
                        <a class="dropbtn">Компания</a>
                        <div class="dropdown-content-comp">
							<a class="dropdown-item-comp" href="/company/about/">О нас</a>
							<a class="dropdown-item-comp" href="/company/news/">Новости</a>
							<a class="dropdown-item-comp" href="/company/nashi-partnery/">Наши партнеры</a>
							<a class="dropdown-item-comp" href="/company/nashi-sotrudniki/">Наши сотрудники</a>
							<a class="dropdown-item-comp" href="/company/vystavki-i-meropriyatiya/">Выставки и<br> меропрятия</a>
							<a class="dropdown-item-comp" href="/company/sertifikati/">Сертификаты</a>
							<a class="dropdown-item-comp" href="/company/rekvizity/">Реквизиты</a>
							<a class="dropdown-item-comp" style="border-bottom: none;" href="/company/feedback/">Отзывы</a>
                        </div>
                    </div>
                </div>
                <div class="menu_item">
					<a href="/service/">Услуги</a>
                </div>
                <div class="menu_item">
					<a href="/oplata_i_dostavka/">Оплата и доставка</a>
                </div>
                <div class="menu_item">
					<a href="/actions/">Акции</a>
                </div>
                <div class="menu_item">
					<a href="/contacts/#<?=$contacts_achor;?>">Контакты</a>
                </div>
            </div>
            <div class="head_menu_mobile">
                <div class="topnav">
                    <a href="javascript:void(0);" class="head_menu_link" onclick="myMobileMenu()">
                        <img src="/img/gamburger.png" alt="" />  Меню
                    </a>
                    <div id="menu_mobile_links">
                        <a href="/catalog/"><b style="font-size: 17px">Каталог</b></a>
                        <a href="/personal/">Личный кабинет</a>
                        <a href="/basket/">Корзина</a>
                        <a href="/actions/"><b style="color: red">Акции</b></a>
                        <hr>
                        <a href="/company/about/">О нас</a>
                        <a href="/company/news/">Новости</a>
                        <a href="/company/nashi-partnery/">Наши партнеры</a>
                        <a href="/company/nashi-sotrudniki/">Наши сотрудники</a>
                        <a href="/company/vystavki-i-meropriyatiya/">Выставки и<br> меропрятия</a>
                        <a href="/company/sertifikati/">Сертификаты</a>
                        <a href="/company/rekvizity/">Реквизиты</a>
                        <a href="/company/feedback/">Отзывы</a>
                        <hr>
                        <a href="/service/">Услуги</a>
                        <a href="/oplata_i_dostavka/">Оплата и доставка</a>
                        <a href="/contacts/#<?=$contacts_achor;?>">Контакты</a>
                    </div>
                </div>
            </div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "new_template",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0"
            )
        );?>
    <div class="caption">
        <h1>
            <?$APPLICATION->ShowTitle(true);?>
        </h1>
    </div>
</div>