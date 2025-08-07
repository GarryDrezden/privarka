<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use  \Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta name='viewport' content='width=device-width' />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <? $APPLICATION->ShowHead(); ?>
        <title><?$APPLICATION->ShowTitle()?></title>
        <? $APPLICATION->ShowPanel() ?>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous" defer></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js" crossorigin="anonymous" defer></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
        <!-- <link href="<?//=SITE_TEMPLATE_PATH;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?//=SITE_TEMPLATE_PATH;?>/bootstrap/js/bootstrap.bundle.min.js"></script> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
        <link rel='stylesheet' href='/local/templates/privarka2023/styles.css'>
        <link href="/local/templates/privarka2023/css/main-style.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript" defer></script>
        <script src="//code.jivo.ru/widget/mBVraQjrue" async></script>
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

            global $USER;
        ?>
    </head>
    <body>
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(66558274, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true,
                ecommerce:"dataLayer"
        });
        </script>
        <noscript><div><img loading="lazy" src="https://mc.yandex.ru/watch/66558274" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
        <div class="wrapper">
            <div class="header">
                <div class="mobile">
                    <div class="head_mobile">
                        <div class="burger-menu">
                            <input id="menu-toggle" type="checkbox" />
                            <label class="menu-btn" for="menu-toggle">
                            <span></span>
                            </label>
                            <div class="menubox">
                                <div>
                                    <a class="mobile_menu_catalog menu-item" href="#">Каталог</a>
                                    <div class="content_block_catalog" style="display: none;">
                                        <li>
                                            <a class="menu-item" href="/krepezh/">
                                            <img loading="lazy" src="/local/templates/privarka2023/images/menu_krep.png" title="Крепеж" alt="Крепеж"/>
                                            Крепеж</a>
                                        </li>
                                        <li>
                                            <a class="menu-item" href="/oborudovanie/">
                                            <img loading="lazy" src="/local/templates/privarka2023/images/menu_equip.png" title="Оборудование" alt="Оборудование"/>
                                            Оборудование</a>
                                        </li>
                                    </div>
                                </div>
                                <div>
                                    <a class="mobile_menu_company menu-item" href="#">Компания</a>
                                    <div class="content_block_company" style="display: none;">
                                        <li>
                                            <a class="menu-item" href="/company/about/">О нас</a>
                                        </li>
                                        <li>
                                            <a class="menu-item" href="/company/news/">Новости</a>
                                        </li>  
                                        <!-- <li>
                                            <a class="menu-item" href="/company/nashi-partnery/">Наши партнеры</a>
                                        </li> -->
                                        <!-- <li>
                                            <a class="menu-item" href="/company/nashi-sotrudniki/">Наши сотрудники</a>
                                        </li> -->
                                        <!-- <li>
                                            <a class="menu-item" href="/company/vystavki-i-meropriyatiya/">Выставки и<br> меропрятия</a>
                                        </li> -->
                                        <li>
                                            <a class="menu-item" href="/company/sertifikati/">Сертификаты</a>
                                        </li>
                                        <li>
                                            <a class="menu-item" href="/company/rekvizity/">Реквизиты</a>
                                        </li>
                                        <!-- <li>
                                            <a class="menu-item" href="/company/feedback/">Отзывы</a>
                                        </li>-->
                                    </div>
                                </div>
                                <div>
                                    <a class="menu-item" href="/service/">Услуги</a>
                                </div>
                                <div>
                                    <a class="menu-item" href="/oplata_i_dostavka/">Оплата и доставка</a>
                                </div>
                                <div>
                                    <a class="menu-item" href="/actions/">Акции</a>
                                </div>
                                <div>
                                    <a class="menu-item" href="/contacts/">Контакты</a>
                                </div>
                                <hr>
                                <div>
                                    <a class="menu-item mob_menu_personal" href="/personal/">Личный кабинет</a>
                                </div>
                                <div>
                                    <a class="menu-item mob_menu_basket" href="/basket/">Корзина</a>
                                </div>
                                <div>
                                    <div class="menu-item mob_menu_region" id="ModalRegionMobBtn">Ваш регион <span><?=$region_name;?></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="logo">
                            <a href="/">
                                <img class="logo_img" loading="lazy" src="/local/templates/privarka2023/images/logo.png"/>
                            </a>
                        </div>
                        <div class="mob_call_back_search">
                            <div id="MobBackCallBtn">
                                <img loading="lazy" src="/local/templates/privarka2023/images/mob_call_back.svg" title=""/>
                            </div>
                            <!-- Модальном окно -->
                            <div id="ModalMobBackCall" class="modalMobBackCall">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="backCallModalLabel">Введите Ваши данные</h5>
                                        <button type="button" id="CloseMobBackCall" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                    </div>
                                    <form id="backcall_form" action="">
                                        <div class="modal-body back_call_list">
                                            <div class="input-group">
                                                <span class="input-group-text">Имя</span>
                                                <input type="text" name="name" id="backcall_name_mob" class="form-control" value=""/>
                                            </div>     
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-text">Телефон</span>
                                                <input type="text" name="phone" id="backcall_phone_mob" class="form-control form_phone" value=""/>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" onclick="backCallMobForm(event)" class="but_small backcall_button">Отправить</button>
                                        </div>
                                        <label class="politika-konfidentsialnosti">
                                            <input type="checkbox" value="N" checked="" name="">
                                            <span class="main-user-consent-request-announce-link">Нажимая кнопку «Подтвердить заказ», я даю свое согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в <a href="/politika-konfidentsialnosti/" target="_blank">Согласии на обработку персональных данных</a></span>
                                        </label>
                                    </form>
                                    <div id="backcall_message" style="display:none;">
                                        <h5 style="color:#333333;margin: 0;padding: 20px" class="alert alert-success" role="alert">Форма отправлена, спасибо за обращение</h5>
                                    </div>
                                </div>
                            </div>
                        <div id="SearchBtn">
                            <img loading="lazy" src="/local/templates/privarka2023/images/mob_search.svg" title=""/>
                        </div>
                            <!-- Модальном окно -->
                            <div id="ModalSearch" class="modal">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <?$APPLICATION->IncludeComponent(
                                        "atum:smartsearch", 
                                        "mobile", 
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
                                    );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="head">
                    <div class="logo">
                        <a href="/">
                                <img class="logo_img" loading="lazy" src="/local/templates/privarka2023/images/logo.png"/>
                        </a>
                    </div>
                    <div class="head_contacts_and_call_back">
                        <div class="head_contacts">
                            <a href="tel:+<?=$region_phone_link;?>" class="head_phone"><?=$region_phone;?></a>
                        </div>
                        <div class="head_call_back" id="BackCallBtn">
                            <div>Заказать звонок</div>
                        </div>
                    </div>
                    <div class="head_region" id="ModalRegionBtn">
                        <div>Ваш регион:</div>
                        <div> <span><?=$region_name;?></span></div>
                    </div>
                    <div class="head_user_and_basket">
                        <div class="head_user">
                            <?if($USER->IsAuthorized()){?>
                                <a href="/personal/"><img loading="lazy" src="/local/templates/privarka2023/images/head_user.svg" alt="" title=""/></a>
                            <?}else{?>
                                <a href="/auth/"><img loading="lazy" src="/local/templates/privarka2023/images/head_user.svg" alt="" title=""/></a>
                            <?}?>
                        </div>
                        <div class="head_vertical_line">
                            <img loading="lazy" src="/local/templates/privarka2023/images/head_line.svg" alt="" title=""/>
                        </div>
                        <div class="head_basket">
                            <a href="/basket/"><img loading="lazy" src="/local/templates/privarka2023/images/head_basket.svg" alt="" title=""/></a>
                        </div>
                    </div>
                </div>
                <div style="padding: 10px 0 0 0;font-size: 15px;text-align: center;">
                        <a href="https://old.privarka-k97.ru/" target="_blank" style="font-size:16px;color:#000;font-family: Montserrat;">Перейти на старый сайт</a>
                </div>
                <div class="menu">
                    <div class="head_menu">
                        <div class="menu_item arrow_mark dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                Каталог
                            </button>
                            <ul class="dropdown-menu head_menu_ul dropdown-menu-lg-star">
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item" href="/krepezh/">
                                    <img loading="lazy" src="/local/templates/privarka2023/images/menu_krep.png" title="Крепеж" alt="Крепеж"/>
                                    Крепеж</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/krepezh/zapressovochnyy_krepyezh/">Запрессовочный крепёж</a></li>
                                        <li><a href="/krepezh/privarnoy_krepyezh/">Приварной крепёж</a></li>
                                        <li><a href="/krepezh/nerzhaveyushchiy-krepezh/">Нержавеющий крепёж</a></li>
                                        <li><a href="/krepezh/zakladnye-gayki/">Закладные гайки</a></li>
                                        <li><a href="/krepezh/zaklepki/">Заклепки</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item" href="/oborudovanie/">
                                    <img loading="lazy" src="/local/templates/privarka2023/images/menu_equip.png" title="Оборудование" alt="Оборудование"/>
                                    Оборудование</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/oborudovanie/oborudovanie_dlya_privarki_krepezha/">Оборудование для приварки крепежа</a></li>
                                        <li><a href="/oborudovanie/oborudovanie-dlya-zapressovki-krepezha/">Оборудование для запрессовки крепежа</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="menu_item arrow_mark dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                Компания
                            </button>
                            <ul class="dropdown-menu dropdown-item-comp head_menu_ul dropdown-menu-lg-star">
                                <li><a href="/company/about/">О нас</a></li>
                                <li><a href="/company/news/">Новости</a></li>  
                                <!-- <li><a href="/company/nashi-partnery/">Наши партнеры</a></li> -->
                                <!-- <li><a href="/company/nashi-sotrudniki/">Наши сотрудники</a></li> -->
                                <!-- <li><a href="/company/vystavki-i-meropriyatiya/">Выставки и<br> меропрятия</a></li> -->
                                <li><a href="/company/sertifikati/">Сертификаты</a></li>
                                <li><a href="/company/rekvizity/">Реквизиты</a></li>
                                <!-- <li><a href="/company/feedback/">Отзывы</a></li>-->
                            </ul>
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
                            <a href="/contacts/">Контакты</a>
                        </div>
                    </div>
                    <div class="head_search">
                        <?$APPLICATION->IncludeComponent(
                            "atum:smartsearch", 
                            "template2", 
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
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
            <div class="">