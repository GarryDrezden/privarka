<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы");
?>
<div class="content_wrapper">
    <div class="caption">
        <h1>
            <? $APPLICATION->ShowTitle(true); ?>
        </h1>
    </div>
    <? $APPLICATION->IncludeComponent(
        "bitrix:breadcrumb",
        "new_template",
        array(
            "PATH" => "",
            "SITE_ID" => "s1",
            "START_FROM" => "0"
        )
    ); ?>
    <style>
        .top_block_sert2 img {
            width: 150px;
            height: auto;
        }

        .top_block_sert2 a {
            padding-top: 15px;
            text-align: center;
        }

        .top_block_sert2 .col-6 {
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="sertificat">
        <div class="row top_block_sert" style="display: flex;flex-flow: wrap;justify-content: space-between;">
            <div style="width: 48%">
                <div class="row top_block_sert2">
                    <div class="main_reviews_card" style="height: 100%;">
                        <div class="main_reviews_card_item1">
                            <img src="/img/reviews5.png" alt="" title="">
                            <div class="main_reviews_card_title">
                                <p>Заяц А.В.</p>
                                <span>Директор<br>ООО "БАЛТСВАРКА ГРУПП".</span>
                            </div>
                        </div>
                        <div class="main_reviews_card_item2">
                            <div class="main_reviews_card_rating">
                                <img src="/local/templates/privarka2023/images/5stars.svg" alt="" title="">
                                <p>01.03.2024</p>
                            </div>
                        </div>
                        <div class="main_reviews_card_item3" style="height: 100%;">
                            <p>ООО "БАЛТСВАРКА ГРУПП" выражает свою благодарность и признательность ООО «Контур» за качественную и своевременную поставку специализированного крепежа, за внимательный подход и клиентоориентированность.</p>
                            <p>За продолжительное время сотрудничества компания «Контур» зарекомендовала себя стабильным и надежным партнером, добросовестно выполняющим принятые на себя обязательства.</p>
                            <p>Выражаем уверенность в сохранении сложившихся партнерских отношений и надеемся на дальнейшее взаимовыгодное и плодотворное сотрудничество.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 48%">
                <div class="row top_block_sert2">
                    <div class="main_reviews_card" style="height: 100%;">
                        <div class="main_reviews_card_item1">
                            <img src="/img/reviews3.jpeg" alt="" title="">
                            <div class="main_reviews_card_title">
                                <p>Карпов М.Ю.</p>
                                <span>Начальник снабжения<br>Шатурский завод металлоконструкций (ООО «НИЦ ТЛ ЛТД»).</span>
                            </div>
                        </div>
                        <div class="main_reviews_card_item2">
                            <div class="main_reviews_card_rating">
                                <img src="/local/templates/privarka2023/images/5stars.svg" alt="" title="">
                                <p>05.01.2024</p>
                            </div>
                        </div>
                        <div class="main_reviews_card_item3" style="height: 100%;">
                            <p>Хотим выразить слова благодарности работникам отдела специального крепежа и кладовщикам компании «Контур» за быстрое оформление документов и отгрузку крепежа. Несколько лет работаю в снабжении, бываю во многих организациях…, короче – есть с кем сравнить. Скажу, что в компании «Контур» работают доброжелательные и отзывчивые работники, профессионалы своего дела.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
            </div>
        </div>
        <div class="row top_block_sert" style="display: flex;flex-flow: wrap;justify-content: space-between;">
            <div style="width: 48%">
                <div class="row top_block_sert2">
                    <div class="main_reviews_card" style="height: 100%;">
                        <div class="main_reviews_card_item1">
                            <img src="/img/reviews2.png" alt="" title="">
                            <div class="main_reviews_card_title">
                                <p>Проскурин М.П.</p>
                                <span>Руководитель ОМТС<br>ООО «Стройкомплекс».</span>
                            </div>
                        </div>
                        <div class="main_reviews_card_item2">
                            <div class="main_reviews_card_rating">
                                <img src="/local/templates/privarka2023/images/5stars.svg" alt="" title="">
                                <p>12.02.2024</p>
                            </div>
                        </div>
                        <div class="main_reviews_card_item3" style="height: 100%;">
                            <p>ООО «Стройкомплекс» выражает признательность своему давнему многолетнему партнеру – ООО «Контур» за решение проблем со снабжением нашего производственного комплекса.</p>
                            <p>Благодарим сотрудников ООО «Контур» за высокий профессионализм, ответственное отношение к работе, квалифицированные консультации и всегда оперативную поставку дефицитных позиций крепежа.<br>Будем рады дальнейшему плодотворному сотрудничеству!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 48%">
                <div class="row top_block_sert2">
                    <div class="main_reviews_card" style="height: 100%;">
                        <div class="main_reviews_card_item1">
                            <img src="/img/logo_rew.jpeg" alt="" title="">
                            <div class="main_reviews_card_title">
                                <p>Кашин А.В.</p>
                                <span>Директор<br>ООО “«Несущие Системы”.</span>
                            </div>
                        </div>
                        <div class="main_reviews_card_item2">
                            <div class="main_reviews_card_rating">
                                <img src="/local/templates/privarka2023/images/5stars.svg" alt="" title="" style="height: 20px;">
                                <p>23.10.2023</p>
                            </div>
                        </div>
                        <div class="main_reviews_card_item3" style="height: 100%;">
                            <p>ООО «Несущие системы» выражает благодарность компании «Контур» за многолетнее плодотворное сотрудничество.</p>
                            <p>Отличительными преимуществами деятельности нашей компании являются прочность возводимых конструкций и скорость их производства и монтажа. Благодаря своевременным поставкам и высокому качеству крепежа от ООО «Контур» нашей компании удается сохранять свое преимущество и позиции на рынке. Хотим отметить высокую квалификацию персонала ООО «Контур»», оперативность в принятии решений и гарантированное выполнение всех взятых на себя обязательств. </p>
                            <p>Мы ценим сложившиеся между нашими компаниями прочные партнерские взаимоотношения и надеемся на дальнейшее плодотворное сотрудничество.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>