function sendingThisForm (ob)
{
      //e.preventDefault();    
    //------------------
    var $that = $(ob),
        formData = new FormData($that.get(0));
    var progressBar = $('#progressbar');
    if($that.find('input[type=file]') && $that.find('input[type=file]').val()) {
        $.ajax({
            url: $that.attr('action'),
            type: $that.attr('method'),
            contentType: false,
            processData: false,
            data: formData,
            dataType: 'json',
            xhr: function () {
                var xhr = $.ajaxSettings.xhr(); // получаем объект XMLHttpRequest

                progressBar.show();
                xhr.upload.addEventListener('progress', function (evt) { // добавляем обработчик события progress (onprogress)
                    if (evt.lengthComputable) { // если известно количество байт
                        // высчитываем процент загруженного
                        var percentComplete = Math.ceil(evt.loaded / evt.total * 100);
                        // устанавливаем значение в атрибут value тега <progress>
                        // и это же значение альтернативным текстом для браузеров, не поддерживающих <progress>
                        progressBar.val(percentComplete).text('Загружено ' + percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            success: function (data) {
                if (data.status=='success') {
                    $('input[name=filepath]').val(data.data);
                    $ = window.jQuery;
                    $.ajax({
                        url: '/local/ajax/Form.php',
                        data: $that.serialize(),
                        method: 'post',
                        dataType: 'json',
                        success: function (data) {
                            console.log (data);
                            if (data.success) {
                                $('.form_info').html('');
                                $('.js-sending-form').hide();
                                $('.js-sending-form').parent().prepend(
                                    '<div class="form-success">' +
                                    '<div class="form-success__msg">' + data.msg + '</div>' +
                                    '<div class="form-success__return" onclick="sucucessFormReturm(this); return false;">Вернуться к форме</div>' +
                                    '</div>'
                                );
                                progressBar.val(0).text('Загружено ' + 0 + '%');
                                progressBar.hide();
                                $('input[name=filepath]').val('');
                            }
                            else {
                                $('.form_info').html(data.msg);
                            }
                        }
                    });
                }
                else{
                    $('.form_info').html(data.data);
                }
            }
        });

    }else {
        //------------------
        $.ajax({
            url: '/local/ajax/Form.php',
            data: $that.serialize(),
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log (data);
                if (data.success) {
                    $('.form_info').html('');
                    $('.js-sending-form').hide();
                    $('.js-sending-form').parent().prepend(
                        '<div class="form-success">' +
                        '<div class="form-success__msg">' + data.msg + '</div>' +
                        '<div class="form-success__return" onclick="sucucessFormReturm(this); return false;">Вернуться к форме</div>' +
                        '</div>'
                    );
                }
                else {
                    $('.form_info').html(data.msg);
                }
            }
        });
    }
}

/*   
$('body').on('submit', '.js-sending-form', function (e) {
    e.preventDefault();


    //------------------
    var $that = $(this),
        formData = new FormData($that.get(0));
    var progressBar = $('#progressbar');
    if($that.find('input[type=file]') && $that.find('input[type=file]').val()) {
        $.ajax({
            url: $that.attr('action'),
            type: $that.attr('method'),
            contentType: false,
            processData: false,
            data: formData,
            dataType: 'json',
            xhr: function () {
                var xhr = $.ajaxSettings.xhr(); // получаем объект XMLHttpRequest

                progressBar.show();
                xhr.upload.addEventListener('progress', function (evt) { // добавляем обработчик события progress (onprogress)
                    if (evt.lengthComputable) { // если известно количество байт
                        // высчитываем процент загруженного
                        var percentComplete = Math.ceil(evt.loaded / evt.total * 100);
                        // устанавливаем значение в атрибут value тега <progress>
                        // и это же значение альтернативным текстом для браузеров, не поддерживающих <progress>
                        progressBar.val(percentComplete).text('Загружено ' + percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            success: function (data) {
                if (data.status=='success') {
                    $('input[name=filepath]').val(data.data);
                    $ = window.jQuery;
                    $.ajax({
                        url: '/local/ajax/Form.php',
                        data: $('.js-sending-form').serialize(),
                        method: 'post',
                        dataType: 'json',
                        success: function (data) {
                            if (data.success) {
                                $('.form_info').html('');
                                $('.js-sending-form').hide();
                                $('.js-sending-form').parent().prepend(
                                    '<div class="form-success">' +
                                    '<div class="form-success__msg">' + data.msg + '</div>' +
                                    '<div class="form-success__return">Вернуться к форме</div>' +
                                    '</div>'
                                );
                                progressBar.val(0).text('Загружено ' + 0 + '%');
                                progressBar.hide();
                                $('input[name=filepath]').val('');
                            }
                            else {
                                $('.form_info').html(data.msg);
                            }
                        }
                    });
                }
                else{
                    $('.form_info').html(data.data);
                }
            }
        });

    }else {
        //------------------
        $.ajax({
            url: '/local/ajax/Form.php',
            data: $(this).serialize(),
            method: 'post',
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $('.form_info').html('');
                    $('.js-sending-form').hide();
                    $('.js-sending-form').parent().prepend(
                        '<div class="form-success">' +
                        '<div class="form-success__msg">' + data.msg + '</div>' +
                        '<div class="form-success__return">Вернуться к форме</div>' +
                        '</div>'
                    );
                }
                else {
                    $('.form_info').html(data.msg);
                }
            }
        });
    }
});

*/
function sucucessFormReturm (ob)
{
    $('.js-sending-form').get(0).reset();
    $('.js-sending-form').show();
    $(ob).parent().remove();  
}
/*$('body').on('click', '.form-success__return', function (e) {
    $('.js-sending-form').get(0).reset();
    $('.js-sending-form').show();
    $(this).parent().remove();
}); */
$(document).ready(function() {

    $('input[name=phone]').mask('+7 (999) 999-99-99');
    $('input[id=smallinput]').mask('+7 (999) 999-99-99');

    $("#rekvis").click(function(){
        $("#rekvisiteCopanu").slideToggle("slow");
    });

    $("a.thickbox_resized").fancybox();
    $("a.thickbox_resized").fancybox({
        'overlayShow'            : false,
        'zoomSpeedIn'            : 200,
        'zoomSpeedOut'            : 200
    });
    $("a.single_4").fancybox({
        'autoDimensions':false,
        'width':1000,
        'height':1000,
        'overlayShow'            : false,
    });

    //for catalog
    $(".fancy a.single_3").fancybox();
    $("a.single_3").fancybox({
        'autoDimensions':false,
        'width':1000,
        'height':1000,
        'overlayShow'            : false,
    });


    //captcha
    $('.update-captcha').on('click', function(){
        $.ajax({
            url: '/local/ajax/captcha.php',
            type: 'post',
            data: 'captcha=yes',
            success: function(data){
                $('.captcha_pic').attr('src', '/bitrix/tools/captcha.php?captcha_sid=' + data);
                $('input[name="captcha_sid"]').val(data);
            }
        });

        return false;
    });

    $('.form-submit').on('click', function(){
        $.ajax({
            url: '/local/ajax/captcha.php',
            type: 'post',
            data: 'captcha=yes',
            success: function(data){
                $('.captcha_pic').attr('src', '/bitrix/tools/captcha.php?captcha_sid=' + data);
                $('input[name="captcha_sid"]').val(data);
            }
        });
    });

});