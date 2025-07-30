</div>
<div class="footer">
    <div class="footer_bg">
        <div class="footer_content">
            <div class="footer_menu footer_address">
                <img src="/img/footer_logo.png" alt="" title="" />
                <p class="pt-10">
                    <?=$region_address;?>
                </p>
                <p>
                    <?=$region_time;?>
                </p>
                <p>
                    <a href="tel:+<?=$region_phone_link;?>" style="text-decoration:underline"><?=$region_phone;?></a>
                </p>
                <p>
                    <a href="mailto:<?=$region_email;?>" style="text-decoration:underline"><?=$region_email;?></a>
                </p>
            </div>
            <div class="footer_menu">
                <h2>Компания</h2>
                <p>
                    <a href="about.php">О компании</a>
                </p>
                <p>
                    <a href="/">Продукция</a>
                </p>
                <p>
                    <a href="service.php">Услуги</a>
                </p>
                <p>
                    <a href="delivery.php">Оплата и доставка</a>
                </p>
                <p>
                    <a href="promo.php">Акции</a>
                </p>
                <p>
                    <a href="reviews.php">Отзывы</a>
                </p>
            </div>
            <div class="footer_catalog">
                <h2>Продукция</h2>
                <p>
                    <a href="/">Крепёж</a>
                </p>
                <p>
                    <a href="/">Оборудование</a>
                </p>
            </div>
            <div class="footer_catalog">
                <h2><a href="/">Услуги</a></h2>
                <h2><a href="/">Оплата и доставка</a></h2>
            </div>
            <div class="footer_catalog pay_system_mobile">
                <h2>Принимаем к оплате</h2>
                <img src="/img/pay_sys.png" alt="pay system" style="width: 150px;"/>
            </div>
            <div class="footer_catalog footer_social">
                <div class="footer_catalog_block">
                    <h2>Наши соц сети</h2>
                    <a href="https://vk.com/kontur97" target="_blank">
                        <img src="/upload/icons/vk.svg" title="VK" style="width: 44px;"/>
                    </a>
                    <a href="https://dzen.ru/kontur" target="_blank" style="padding: 0 10px;">
                        <img src="/upload/icons/yandex-zen.svg" title="Dzen" style="width: 36px;"/>
                    </a>
                    <a href="https://www.youtube.com/channel/UCFZ5TMrd8RaHqRwSeAyts-g" target="_blank">
                        <img src="/upload/icons/youtube-play.svg" title="Youtube" style="width: 48px;"/>
                    </a>
                    <div style="padding-top: 10px">
                        <a href="" style="text-decoration:underline;font-size: 12px;">Политика конфеденциальности</a><br>
                        <a href="" style="text-decoration:underline;font-size: 12px;">Пользовательское соглашение</a><br><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_content_oferta">
            <div class="oferta_block">
                <p style="font-size: 12px;">Все права защищены и охраняются законом. Перепечатка материалов и использование фотографий допускается только с письменного разрешения владельцев сайта и при наличии активной ссылки на сайт  privarka-k97.ru. Информация на сайте носит ознакомительный характер и ни при каких условиях не является публичной офертой, определяемой положениями Статьи 437 Гражданского кодекса РФ. © Группа компаний «Контур», 2005 - 2023</p>
            </div>
        </div>
    </div>
</div>
<script>
    /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
    function myFunctionMenu() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                // if (openDropdown.classList.contains('show')) {
                //     openDropdown.classList.remove('show');
                // }
            }
        }
    }
</script>

<script>
    // Модальное окно для выбора региона
    var myModal = document.getElementById('regionModal');
    // Модальное окно для формы Заказать звонок
    var myModalBackCall = document.getElementById('backCallModal');
</script>
<!-- Модальное окно регионы -->
<div class="modal fade" id="regionModal" tabindex="-1" aria-labelledby="regionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="regionModalLabel">Выберете ваш город</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <div class="region_list">
                    <a href="#" id="5518" class="region_item" >Москва</a>
                    <a href="#" id="5521" class="region_item" >Санкт-Петербург</a>
                </div>
                <div class="region_list">
                    <a href="#" id="5520" class="region_item" >Екатеринбург</a>
                    <a href="#" id="5519" class="region_item" >Новосибирск</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Модальное окно обратный звонок -->
<div class="modal fade" id="backCallModal" tabindex="-1" aria-labelledby="backCallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="backCallModalLabel">Введите Ваши данные</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <p>И наш менеджер свяжется с Вами в ближайшее время</p>
            <form id="backcall_form" action="">
                <div class="modal-body back_call_list">
                    <div class="input-group">
                        <span class="input-group-text">Имя</span>
                        <input type="text" name="name" class="form-control" value=""/>
                    </div>     
                    <div class="input-group">
                        <span class="input-group-text">Телефон</span>
                        <input type="text" name="phone" class="form-control form_phone" value=""/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="but_small backcall_button">Отправить</button>
                </div>
            </form>
            <div id="backcall_message"></div>
        </div>
    </div>
</div>
<!-- Обратный звонок -->
<script>
    $('#backcall_form').submit(function(e) {
        e.preventDefault();
        var $data = {};
        $('#backcall_form').find ('input').each(function() {
            $data[this.name] = $(this).val();
        });
        $.ajax({
            type: 'POST',
            url: '/ajax/forms/backcall.php',
            data: $data,
            dataType: "html",
            success: function(data){
                $('#backcall_message').html(data);
            }
        });
    });
</script>

<!-- Регионы -->
<script>
    window.onload = function(){
        var elem = document.getElementsByClassName('region_item'), i = elem.length;
        while(i--){
            elem[i].onclick = function(i){
                return function(){
                    region_id = this.id;
                    document.cookie = "region="+region_id;
                    location.reload();
                };
            }(i);
        }
    };
</script>

<!-- Телефонная маска -->
<script>
    $(function(){
        $(".form_phone").mask("+7(999) 999-9999");
    });
</script>
<script>
function myMobileMenu() {
  var x = document.getElementById("menu_mobile_links");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
</body>
</html>