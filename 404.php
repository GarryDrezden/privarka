<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница не найдена");
?>
<div class="contacts_page">
    <style>
        .other_all_form{
            display: flex;
            flex-flow: column;
        }
        .other_all_form p{
            font-size: 15px;
            padding-top: 10px;
        }
        .other_all_form h5,
        .other_all_form input{
            font-size: 15px;
        }
    </style>
    <div class="other_all_form">
        <h2>Страница не найдена, но Вы можете связаться с коммерческим<br>отделом для уточнения любого вопроса по продукции:</h2>
        <div id="" class="" style="display: block;min-width:470px; width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Введите Ваши данные</h5>
            </div>
            <div style="text-align:left;padding:0 20px;">
                <p>Наш менеджер свяжется с Вами в ближайшее время</p>
            </div>
            <form id="other_form" action="" method="post">
                <div class="modal-body back_call_list">
                    <div class="input-group">
                        <span class="input-group-text">Имя*</span>
                        <input type="text" name="backcall_name" id="backcall_name" class="form-control" value="" required="">
                    </div>     
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Телефон*</span>
                        <input type="text" name="backcall_phone" id="backcall_phone" class="form-control form_phone" value="" required="">
                    </div> 
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Продукт*</span>
                        <input type="text" name="backcall_product" id="backcall_product" class="form-control form_product" value="" required="">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Количество</span>
                        <input type="text" name="backcall_count" id="backcall_count" class="form-control form_count" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="backAllForm(event)" class="but_small backcall_button">Отправить</button>
                </div>
                <label class="politika-konfidentsialnosti">
                    <input type="checkbox" value="N" checked="" name="">
                    <span class="main-user-consent-request-announce-link">Нажимая кнопку «Отправить», я даю свое согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в <a href="/politika-konfidentsialnosti/" target="_blank">Согласии на обработку персональных данных</a></span>
                </label>
            </form>
            <div id="other_message" style="display:none;">
                <h5 style="color:#333333;margin: 0;padding: 20px" class="alert alert-success" role="alert">Форма отправлена, спасибо за обращение</h5>
            </div>
        </div>
        </div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>