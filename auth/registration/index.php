<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?>
<style>
	#backcall_message_fiz{
		padding: 10px 20px 20px 20px;
	}
</style>
<div class="content_wrapper">
    <div class="caption">
        <h1>
            <?$APPLICATION->ShowTitle(true);?>
        </h1>
    </div>
    <!-- <ul class="nav nav-tabs" id="RegisterTabs" role="tablist">
        <li class="nav-item" role="presentation"> <button class="nav-link active" id="fiz-face-tab" data-bs-toggle="tab"
                data-bs-target="#fiz-face" type="button" role="tab" aria-controls="fiz-face"
                aria-selected="true">Физическое лицо</button> </li>
        <li class="nav-item" role="presentation"> <button class="nav-link" id="ur-face-tab" data-bs-toggle="tab"
                data-bs-target="#ur-face" type="button" role="tab" aria-controls="ur-face"
                aria-selected="false">Юридическое лицо</button> </li>
    </ul> -->
    <div class="tab-content" id="RegisterTabsContent">
        <div class="tab-pane fade show active" id="fiz-face" role="tabpanel" aria-labelledby="fiz-face-tab">
            <div class="bx-auth-reg">
                <form method="post" action="/auth/registration/" name="regform" enctype="multipart/form-data">
                    <div class="register">
                        <b></b>
                        <div class="">
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Логин (минимум 3 символа):<span class="starrequired">*</span> </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="text" name="login" id="login_fiz" value="">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Email:<span class="starrequired">*</span> </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="text" name="email" id="email_fiz" value="">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Пароль (минимум 6 символов):<span class="starrequired">*</span>
								</div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="password" name="password" id="password_fiz" value=""
                                        autocomplete="off" class="bx-auth-input">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Подтверждение пароля:<span class="starrequired">*</span> </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="password" name="confirm_password" id="confirm_password_fiz" value=""
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Имя:<span class="starrequired">*</span> </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="text" name="name" id="name_fiz" value="">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Отчество: </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="text" name="second_name" id="second_name_fiz" value="">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Фамилия:<span class="starrequired">*</span> </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="text" name="last_name" id="last_name_fiz" value="">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Телефон:<span class="starrequired">*</span> </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="text" name="phone" id="phone_fiz" value="">
                                </div>
                            </div>

                            <script src="https://js.hcaptcha.com/1/api.js" async="" defer=""></script>
                            <div class="bx-authform-formgroup-container">
								<div class="bx-authform-label-container">
									<div class="h-captcha" data-sitekey="3f0a9944-422d-4c9f-a65c-11201913dd7c" style="width:61%"></div>
								</div>
							</div>
                        </div>
						<div id="backcall_message_fiz"></div>
                        <div class="bx-authform-formgroup-container">
                            <input type="submit" class="btn_main" name="register_submit_button" onclick="registerForm(event)" value="Регистрация">
                        </div>
                    </div>
                </form>
                <div class="bx-authform-formgroup-container">
                    <label
                        data-bx-user-consent="{&quot;id&quot;:1,&quot;sec&quot;:&quot;6tyvd4&quot;,&quot;autoSave&quot;:false,&quot;actionUrl&quot;:&quot;\/bitrix\/components\/bitrix\/main.userconsent.request\/ajax.php&quot;,&quot;replace&quot;:{&quot;button_caption&quot;:&quot;\u0420\u0435\u0433\u0438\u0441\u0442\u0440\u0430\u0446\u0438\u044f&quot;,&quot;fields&quot;:[&quot;IP-\u0430\u0434\u0440\u0435\u0441&quot;]},&quot;url&quot;:null,&quot;text&quot;:&quot;\u0421\u043e\u0433\u043b\u0430\u0441\u0438\u0435 \u043d\u0430 \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0443 \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445\u003Cbr\u003E\n\u003Cbr\u003E\n\u041d\u0430\u0441\u0442\u043e\u044f\u0449\u0438\u043c \u0432 \u0441\u043e\u043e\u0442\u0432\u0435\u0442\u0441\u0442\u0432\u0438\u0438 \u0441 \u0424\u0435\u0434\u0435\u0440\u0430\u043b\u044c\u043d\u044b\u043c \u0437\u0430\u043a\u043e\u043d\u043e\u043c \u2116 152-\u0424\u0417 \u00ab\u041e \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445\u00bb \u043e\u0442 27.07.2006 \u0433\u043e\u0434\u0430 \u0441\u0432\u043e\u0431\u043e\u0434\u043d\u043e, \u0441\u0432\u043e\u0435\u0439 \u0432\u043e\u043b\u0435\u0439 \u0438 \u0432 \u0441\u0432\u043e\u0435\u043c \u0438\u043d\u0442\u0435\u0440\u0435\u0441\u0435 \u0432\u044b\u0440\u0430\u0436\u0430\u044e \u0441\u0432\u043e\u0435 \u0431\u0435\u0437\u0443\u0441\u043b\u043e\u0432\u043d\u043e\u0435 \u0441\u043e\u0433\u043b\u0430\u0441\u0438\u0435 \u043d\u0430 \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0443 \u043c\u043e\u0438\u0445 \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445 \u041e\u041e\u041e \u041a\u043e\u043d\u0442\u0443\u0440, \u0437\u0430\u0440\u0435\u0433\u0438\u0441\u0442\u0440\u0438\u0440\u043e\u0432\u0430\u043d\u043d\u044b\u043c \u0432 \u0441\u043e\u043e\u0442\u0432\u0435\u0442\u0441\u0442\u0432\u0438\u0438 \u0441 \u0437\u0430\u043a\u043e\u043d\u043e\u0434\u0430\u0442\u0435\u043b\u044c\u0441\u0442\u0432\u043e\u043c \u0420\u0424 \u043f\u043e \u0430\u0434\u0440\u0435\u0441\u0443: \u003Cbr\u003E\n\u0433. \u041c\u043e\u0441\u043a\u0432\u0430, 5-\u044f \u041c\u0430\u0433\u0438\u0441\u0442\u0440\u0430\u043b\u044c\u043d\u0430\u044f \u0443\u043b., \u0434. 8\u0410\u0411 (\u0434\u0430\u043b\u0435\u0435 \u043f\u043e \u0442\u0435\u043a\u0441\u0442\u0443 - \u041e\u043f\u0435\u0440\u0430\u0442\u043e\u0440).\u003Cbr\u003E\n1. \u0421\u043e\u0433\u043b\u0430\u0441\u0438\u0435 \u0434\u0430\u0435\u0442\u0441\u044f \u043d\u0430 \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0443 \u043e\u0434\u043d\u043e\u0439, \u043d\u0435\u0441\u043a\u043e\u043b\u044c\u043a\u0438\u0445 \u0438\u043b\u0438 \u0432\u0441\u0435\u0445 \u043a\u0430\u0442\u0435\u0433\u043e\u0440\u0438\u0439 \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445, \u043d\u0435 \u044f\u0432\u043b\u044f\u044e\u0449\u0438\u0445\u0441\u044f \u0441\u043f\u0435\u0446\u0438\u0430\u043b\u044c\u043d\u044b\u043c\u0438 \u0438\u043b\u0438 \u0431\u0438\u043e\u043c\u0435\u0442\u0440\u0438\u0447\u0435\u0441\u043a\u0438\u043c\u0438, \u043f\u0440\u0435\u0434\u043e\u0441\u0442\u0430\u0432\u043b\u044f\u0435\u043c\u044b\u0445 \u043c\u043d\u043e\u044e, \u043a\u043e\u0442\u043e\u0440\u044b\u0435 \u043c\u043e\u0433\u0443\u0442 \u0432\u043a\u043b\u044e\u0447\u0430\u0442\u044c:\u003Cbr\u003E\n\u003Cbr\u003E\n- ;\u003Cbr\u003E\n- ;\u003Cbr\u003E\n- ;\u003Cbr\u003E\n- ;\u003Cbr\u003E\n- .\u003Cbr\u003E\n\u003Cbr\u003E\n2. \u041e\u043f\u0435\u0440\u0430\u0442\u043e\u0440 \u043c\u043e\u0436\u0435\u0442 \u0441\u043e\u0432\u0435\u0440\u0448\u0430\u0442\u044c \u0441\u043b\u0435\u0434\u0443\u044e\u0449\u0438\u0435 \u0434\u0435\u0439\u0441\u0442\u0432\u0438\u044f: \u0441\u0431\u043e\u0440; \u0437\u0430\u043f\u0438\u0441\u044c; \u0441\u0438\u0441\u0442\u0435\u043c\u0430\u0442\u0438\u0437\u0430\u0446\u0438\u044f; \u043d\u0430\u043a\u043e\u043f\u043b\u0435\u043d\u0438\u0435; \u0445\u0440\u0430\u043d\u0435\u043d\u0438\u0435; \u0443\u0442\u043e\u0447\u043d\u0435\u043d\u0438\u0435 (\u043e\u0431\u043d\u043e\u0432\u043b\u0435\u043d\u0438\u0435, \u0438\u0437\u043c\u0435\u043d\u0435\u043d\u0438\u0435); \u0438\u0437\u0432\u043b\u0435\u0447\u0435\u043d\u0438\u0435; \u0438\u0441\u043f\u043e\u043b\u044c\u0437\u043e\u0432\u0430\u043d\u0438\u0435; \u0431\u043b\u043e\u043a\u0438\u0440\u043e\u0432\u0430\u043d\u0438\u0435; \u0443\u0434\u0430\u043b\u0435\u043d\u0438\u0435; \u0443\u043d\u0438\u0447\u0442\u043e\u0436\u0435\u043d\u0438\u0435. \u003Cbr\u003E\n\u003Cbr\u003E\n3. \u0421\u043f\u043e\u0441\u043e\u0431\u044b \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0438: \u043a\u0430\u043a \u0441 \u0438\u0441\u043f\u043e\u043b\u044c\u0437\u043e\u0432\u0430\u043d\u0438\u0435\u043c \u0441\u0440\u0435\u0434\u0441\u0442\u0432 \u0430\u0432\u0442\u043e\u043c\u0430\u0442\u0438\u0437\u0430\u0446\u0438\u0438, \u0442\u0430\u043a \u0438 \u0431\u0435\u0437 \u0438\u0445 \u0438\u0441\u043f\u043e\u043b\u044c\u0437\u043e\u0432\u0430\u043d\u0438\u044f.\u003Cbr\u003E\n\u003Cbr\u003E\n4. \u0426\u0435\u043b\u044c \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0438: \u043f\u0440\u0435\u0434\u043e\u0441\u0442\u0430\u0432\u043b\u0435\u043d\u0438\u0435 \u043c\u043d\u0435 \u0443\u0441\u043b\u0443\u0433\/\u0440\u0430\u0431\u043e\u0442, \u0432\u043a\u043b\u044e\u0447\u0430\u044f, \u043d\u0430\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u0435 \u0432 \u043c\u043e\u0439 \u0430\u0434\u0440\u0435\u0441 \u0443\u0432\u0435\u0434\u043e\u043c\u043b\u0435\u043d\u0438\u0439, \u043a\u0430\u0441\u0430\u044e\u0449\u0438\u0445\u0441\u044f \u043f\u0440\u0435\u0434\u043e\u0441\u0442\u0430\u0432\u043b\u044f\u0435\u043c\u044b\u0445 \u0443\u0441\u043b\u0443\u0433\/\u0440\u0430\u0431\u043e\u0442, \u043f\u043e\u0434\u0433\u043e\u0442\u043e\u0432\u043a\u0430 \u0438 \u043d\u0430\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u0435 \u043e\u0442\u0432\u0435\u0442\u043e\u0432 \u043d\u0430 \u043c\u043e\u0438 \u0437\u0430\u043f\u0440\u043e\u0441\u044b, \u043d\u0430\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u0435 \u0432 \u043c\u043e\u0439 \u0430\u0434\u0440\u0435\u0441 \u0438\u043d\u0444\u043e\u0440\u043c\u0430\u0446\u0438\u0438 \u043e \u043c\u0435\u0440\u043e\u043f\u0440\u0438\u044f\u0442\u0438\u044f\u0445\/\u0442\u043e\u0432\u0430\u0440\u0430\u0445\/\u0443\u0441\u043b\u0443\u0433\u0430\u0445\/\u0440\u0430\u0431\u043e\u0442\u0430\u0445 \u041e\u043f\u0435\u0440\u0430\u0442\u043e\u0440\u0430.\u003Cbr\u003E\n\u003Cbr\u003E\n5. \u0412 \u0441\u0432\u044f\u0437\u0438 \u0441 \u0442\u0435\u043c, \u0447\u0442\u043e \u041e\u043f\u0435\u0440\u0430\u0442\u043e\u0440 \u043c\u043e\u0436\u0435\u0442 \u043e\u0441\u0443\u0449\u0435\u0441\u0442\u0432\u043b\u044f\u0442\u044c \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0443 \u043c\u043e\u0438\u0445 \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445 \u043f\u043e\u0441\u0440\u0435\u0434\u0441\u0442\u0432\u043e\u043c \u043f\u0440\u043e\u0433\u0440\u0430\u043c\u043c\u044b \u0434\u043b\u044f \u042d\u0412\u041c \u00ab1\u0421-\u0411\u0438\u0442\u0440\u0438\u043a\u044124\u00bb, \u044f \u0434\u0430\u044e \u0441\u0432\u043e\u0435 \u0441\u043e\u0433\u043b\u0430\u0441\u0438\u0435 \u041e\u043f\u0435\u0440\u0430\u0442\u043e\u0440\u0443  \u043d\u0430 \u043e\u0441\u0443\u0449\u0435\u0441\u0442\u0432\u043b\u0435\u043d\u0438\u0435 \u0441\u043e\u043e\u0442\u0432\u0435\u0442\u0441\u0442\u0432\u0443\u044e\u0449\u0435\u0433\u043e \u043f\u043e\u0440\u0443\u0447\u0435\u043d\u0438\u044f \u041e\u041e\u041e \u00ab1\u0421-\u0411\u0438\u0442\u0440\u0438\u043a\u0441\u00bb, (\u041e\u0413\u0420\u041d 5077746476209), \u0437\u0430\u0440\u0435\u0433\u0438\u0441\u0442\u0440\u0438\u0440\u043e\u0432\u0430\u043d\u043d\u043e\u043c\u0443 \u043f\u043e \u0430\u0434\u0440\u0435\u0441\u0443: 109544, \u0433. \u041c\u043e\u0441\u043a\u0432\u0430, \u0431-\u0440 \u042d\u043d\u0442\u0443\u0437\u0438\u0430\u0441\u0442\u043e\u0432, \u0434. 2, \u044d\u0442.13, \u043f\u043e\u043c. 8-19.\u003Cbr\u003E\n\u003Cbr\u003E\n6. \u041d\u0430\u0441\u0442\u043e\u044f\u0449\u0435\u0435 \u0441\u043e\u0433\u043b\u0430\u0441\u0438\u0435 \u0434\u0435\u0439\u0441\u0442\u0432\u0443\u0435\u0442 \u0434\u043e \u043c\u043e\u043c\u0435\u043d\u0442\u0430 \u0435\u0433\u043e \u043e\u0442\u0437\u044b\u0432\u0430 \u043f\u0443\u0442\u0435\u043c \u043d\u0430\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u044f \u0441\u043e\u043e\u0442\u0432\u0435\u0442\u0441\u0442\u0432\u0443\u044e\u0449\u0435\u0433\u043e \u0443\u0432\u0435\u0434\u043e\u043c\u043b\u0435\u043d\u0438\u044f \u043d\u0430 \u044d\u043b\u0435\u043a\u0442\u0440\u043e\u043d\u043d\u044b\u0439 \u0430\u0434\u0440\u0435\u0441 v.polyakov.art@gmail.com \u0438\u043b\u0438 \u043d\u0430\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u044f \u043f\u043e \u0430\u0434\u0440\u0435\u0441\u0443 \u0433. \u041c\u043e\u0441\u043a\u0432\u0430, 5-\u044f \u041c\u0430\u0433\u0438\u0441\u0442\u0440\u0430\u043b\u044c\u043d\u0430\u044f \u0443\u043b., \u0434. 8\u0410\u0411.\u003Cbr\u003E\n\u003Cbr\u003E\n7. \u0412 \u0441\u043b\u0443\u0447\u0430\u0435 \u043e\u0442\u0437\u044b\u0432\u0430 \u043c\u043d\u043e\u044e \u0441\u043e\u0433\u043b\u0430\u0441\u0438\u044f \u043d\u0430 \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0443 \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445 \u041e\u043f\u0435\u0440\u0430\u0442\u043e\u0440 \u0432\u043f\u0440\u0430\u0432\u0435 \u043f\u0440\u043e\u0434\u043e\u043b\u0436\u0438\u0442\u044c \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0443 \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445 \u0431\u0435\u0437 \u043c\u043e\u0435\u0433\u043e \u0441\u043e\u0433\u043b\u0430\u0441\u0438\u044f \u043f\u0440\u0438 \u043d\u0430\u043b\u0438\u0447\u0438\u0438 \u043e\u0441\u043d\u043e\u0432\u0430\u043d\u0438\u0439, \u043f\u0440\u0435\u0434\u0443\u0441\u043c\u043e\u0442\u0440\u0435\u043d\u043d\u044b\u0445 \u0424\u0435\u0434\u0435\u0440\u0430\u043b\u044c\u043d\u044b\u043c \u0437\u0430\u043a\u043e\u043d\u043e\u043c \u2116152-\u0424\u0417 \u00ab\u041e \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445\u00bb \u043e\u0442\u00a027.07.2006\u00a0\u0433.&quot;}"
                        class="main-user-consent-request">
                        <input type="checkbox" value="Y" checked="" name="">
                        <span class="main-user-consent-request-announce-link">Нажимая кнопку «Регистрация», я даю свое
                            согласие на обработку моих персональных данных, в соответствии с Федеральным законом от
                            27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в
                            Согласии на обработку персональных данных</span>
                    </label>
                    <div data-bx-template="main-user-consent-request-loader" style="display: none;">
                        <div class="main-user-consent-request-popup">
                            <div class="main-user-consent-request-popup-cont">
                                <div data-bx-head="" class="main-user-consent-request-popup-header"></div>
                                <div class="main-user-consent-request-popup-body">
                                    <div data-bx-loader="" class="main-user-consent-request-loader">
                                        <svg class="main-user-consent-request-circular" viewBox="25 25 50 50">
                                            <circle class="main-user-consent-request-path" cx="50" cy="50" r="20"
                                                fill="none" stroke-width="1" stroke-miterlimit="10"></circle>
                                        </svg>
                                    </div>
                                    <div data-bx-content="" class="main-user-consent-request-popup-content">
                                        <div class="main-user-consent-request-popup-textarea-block">
                                            <div data-bx-textarea="" class="main-user-consent-request-popup-text"></div>
                                            <div data-bx-link="" style="display: none;"
                                                class="main-user-consent-request-popup-link">
                                                <div>Ознакомьтесь с текстом по ссылке</div>
                                                <div><a target="_blank"></a></div>
                                            </div>
                                        </div>
                                        <div class="main-user-consent-request-popup-buttons">
                                            <span data-bx-btn-accept=""
                                                class="main-user-consent-request-popup-button main-user-consent-request-popup-button-acc">Y</span>
                                            <span data-bx-btn-reject=""
                                                class="main-user-consent-request-popup-button main-user-consent-request-popup-button-rej">N</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            </div>
        </div>
        <!-- <div class="tab-pane fade" id="ur-face" role="tabpanel" aria-labelledby="ur-face-tab">
            <div class="bx-auth-reg">
                <form method="post" action="/auth/registration/" name="regform" enctype="multipart/form-data">
                    <div class="register">
                        <b></b>
                        <div class="">
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Тип ЮР лица:
                                </div>
                                <div class="bx-authform-input-container">
                                    <span class="fields enumeration field-wrap" data-has-input="no">
                                        <input type="hidden" value="" id="UF_TYPE_UR_FACE_default_XgfDB9">
                                        <span id="UF_TYPE_UR_FACE_value_XgfDB9" style="display: none">
                                            <input type="hidden" name="UF_TYPE_UR_FACE" value="3">
                                        </span>
                                        <span id="UF_TYPE_UR_FACE_control_XgfDB9">
                                            <div data-name="UF_TYPE_UR_FACE"
                                                data-params="{&quot;isMulti&quot;:false,&quot;fieldName&quot;:&quot;UF_TYPE_UR_FACE&quot;}"
                                                data-items="[{&quot;NAME&quot;:&quot;не выбрано&quot;,&quot;VALUE&quot;:&quot;&quot;,&quot;IS_SELECTED&quot;:false},{&quot;NAME&quot;:&quot;Юридическое лицо&quot;,&quot;VALUE&quot;:&quot;3&quot;,&quot;IS_SELECTED&quot;:true},{&quot;NAME&quot;:&quot;ИП&quot;,&quot;VALUE&quot;:&quot;4&quot;,&quot;IS_SELECTED&quot;:false}]"
                                                data-value="{&quot;NAME&quot;:&quot;Юридическое лицо&quot;,&quot;VALUE&quot;:&quot;3&quot;,&quot;IS_SELECTED&quot;:true}"
                                                class="main-ui-control main-ui-select"><span
                                                    class="main-ui-select-name">Юридическое лицо</span><span
                                                    class="main-ui-square-search"><input type="text"
                                                        tabindex="undefined" class="main-ui-square-search-item"></span>
                                            </div>
                                        </span>
                                        <script>
                                        BX.ready(function() {
                                            new BX.Desktop.Field.Enum.Ui({
                                                'defaultFieldName': 'UF_TYPE_UR_FACE_default_XgfDB9',
                                                'fieldName': 'UF_TYPE_UR_FACE',
                                                'container': 'UF_TYPE_UR_FACE_control_XgfDB9',
                                                'valueContainerId': 'UF_TYPE_UR_FACE_value_XgfDB9',
                                                'block': 'main-ui-select',
                                                'items': [{
                                                    'NAME': 'не выбрано',
                                                    'VALUE': '',
                                                    'IS_SELECTED': false
                                                }, {
                                                    'NAME': 'Юридическое лицо',
                                                    'VALUE': '3',
                                                    'IS_SELECTED': true
                                                }, {
                                                    'NAME': 'ИП',
                                                    'VALUE': '4',
                                                    'IS_SELECTED': false
                                                }],
                                                'value': {
                                                    'NAME': 'Юридическое лицо',
                                                    'VALUE': '3',
                                                    'IS_SELECTED': true
                                                },
                                                'params': {
                                                    'isMulti': false,
                                                    'fieldName': 'UF_TYPE_UR_FACE'
                                                }
                                            });
                                        });
                                        </script>
                                    </span>
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    ИНН:
                                </div>
                                <div class="bx-authform-input-container">

                                    <span class="field-wrap">
                                        <span class="field-item">
                                            <input maxlength="12" size="20" class="fields string " name="UF_INN"
                                                tabindex="0" type="text" value="">
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    КПП:
                                </div>
                                <div class="bx-authform-input-container">

                                    <span class="field-wrap">
                                        <span class="field-item">
                                            <input maxlength="9" size="20" class="fields string " name="UF_KPP"
                                                tabindex="0" type="text" value="">
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Название организации :
                                </div>
                                <div class="bx-authform-input-container">

                                    <span class="field-wrap">
                                        <span class="field-item">
                                            <input size="20" class="fields string " name="UF_COMP_NAME" tabindex="0"
                                                type="text" value="">
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Юридический адрес :
                                </div>
                                <div class="bx-authform-input-container">

                                    <span class="field-wrap">
                                        <span class="field-item">
                                            <input size="20" class="fields string " name="UF_UR_ADDRESS" tabindex="0"
                                                type="text" value="">
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Сайт компании:
                                </div>
                                <div class="bx-authform-input-container">

                                    <span class="field-wrap">
                                        <span class="field-item">
                                            <input size="20" class="fields string " name="UF_COMP_SITE" tabindex="0"
                                                type="text" value="">
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Контактное лицо:
                                </div>
                                <div class="bx-authform-input-container">

                                    <span class="field-wrap">
                                        <span class="field-item">
                                            <input size="20" class="fields string " name="UF_CONTACT_FACE" tabindex="0"
                                                type="text" value="">
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Логин (мин. 3 символа):<span class="starrequired">*</span> </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="text" name="login" value="">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Email:<span class="starrequired">*</span> </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="text" name="email" value="">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Пароль:<span class="starrequired">*</span> </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="password" name="password" value=""
                                        autocomplete="off" class="bx-auth-input">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Подтверждение пароля:<span class="starrequired">*</span> </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="password" name="confirm_password" value=""
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Имя:<span class="starrequired">*</span> </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="text" name="name" value="">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Отчество: </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="text" name="second_name" value="">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Фамилия:<span class="starrequired">*</span> </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="text" name="last_name" value="">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Телефон:<span class="starrequired">*</span> </div>
                                <div class="bx-authform-input-container">
                                    <input size="30" type="text" name="phone" value="">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    <input type="hidden" name="captcha_sid" value="0fe32555fc61e966704fe7ee4a52909e">
                                </div>
                                <div class="bx-authform-input-container">
                                    <img src="/bitrix/tools/captcha.php?captcha_sid=0fe32555fc61e966704fe7ee4a52909e"
                                        width="180" height="40" alt="CAPTCHA">
                                </div>
                            </div>
                            <div class="bx-authform-formgroup-container">
                                <div class="bx-authform-label-container">
                                    Введите слово на картинке:<span class="starrequired">*</span>
                                </div>
                                <div class="bx-authform-input-container">
                                    <input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off">
                                </div>
                            </div>

                        </div>
                        <div class="bx-authform-formgroup-container">
                            <input type="submit" class="btn_main" name="register_submit_button" value="Регистрация">
                        </div>
                    </div>
                </form>
                <div class="bx-authform-formgroup-container">
                    <label
                        data-bx-user-consent="{&quot;id&quot;:1,&quot;sec&quot;:&quot;6tyvd4&quot;,&quot;autoSave&quot;:false,&quot;actionUrl&quot;:&quot;\/bitrix\/components\/bitrix\/main.userconsent.request\/ajax.php&quot;,&quot;replace&quot;:{&quot;button_caption&quot;:&quot;\u0420\u0435\u0433\u0438\u0441\u0442\u0440\u0430\u0446\u0438\u044f&quot;,&quot;fields&quot;:[&quot;IP-\u0430\u0434\u0440\u0435\u0441&quot;]},&quot;url&quot;:null,&quot;text&quot;:&quot;\u0421\u043e\u0433\u043b\u0430\u0441\u0438\u0435 \u043d\u0430 \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0443 \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445\u003Cbr\u003E\n\u003Cbr\u003E\n\u041d\u0430\u0441\u0442\u043e\u044f\u0449\u0438\u043c \u0432 \u0441\u043e\u043e\u0442\u0432\u0435\u0442\u0441\u0442\u0432\u0438\u0438 \u0441 \u0424\u0435\u0434\u0435\u0440\u0430\u043b\u044c\u043d\u044b\u043c \u0437\u0430\u043a\u043e\u043d\u043e\u043c \u2116 152-\u0424\u0417 \u00ab\u041e \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445\u00bb \u043e\u0442 27.07.2006 \u0433\u043e\u0434\u0430 \u0441\u0432\u043e\u0431\u043e\u0434\u043d\u043e, \u0441\u0432\u043e\u0435\u0439 \u0432\u043e\u043b\u0435\u0439 \u0438 \u0432 \u0441\u0432\u043e\u0435\u043c \u0438\u043d\u0442\u0435\u0440\u0435\u0441\u0435 \u0432\u044b\u0440\u0430\u0436\u0430\u044e \u0441\u0432\u043e\u0435 \u0431\u0435\u0437\u0443\u0441\u043b\u043e\u0432\u043d\u043e\u0435 \u0441\u043e\u0433\u043b\u0430\u0441\u0438\u0435 \u043d\u0430 \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0443 \u043c\u043e\u0438\u0445 \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445 \u041e\u041e\u041e \u041a\u043e\u043d\u0442\u0443\u0440, \u0437\u0430\u0440\u0435\u0433\u0438\u0441\u0442\u0440\u0438\u0440\u043e\u0432\u0430\u043d\u043d\u044b\u043c \u0432 \u0441\u043e\u043e\u0442\u0432\u0435\u0442\u0441\u0442\u0432\u0438\u0438 \u0441 \u0437\u0430\u043a\u043e\u043d\u043e\u0434\u0430\u0442\u0435\u043b\u044c\u0441\u0442\u0432\u043e\u043c \u0420\u0424 \u043f\u043e \u0430\u0434\u0440\u0435\u0441\u0443: \u003Cbr\u003E\n\u0433. \u041c\u043e\u0441\u043a\u0432\u0430, 5-\u044f \u041c\u0430\u0433\u0438\u0441\u0442\u0440\u0430\u043b\u044c\u043d\u0430\u044f \u0443\u043b., \u0434. 8\u0410\u0411 (\u0434\u0430\u043b\u0435\u0435 \u043f\u043e \u0442\u0435\u043a\u0441\u0442\u0443 - \u041e\u043f\u0435\u0440\u0430\u0442\u043e\u0440).\u003Cbr\u003E\n1. \u0421\u043e\u0433\u043b\u0430\u0441\u0438\u0435 \u0434\u0430\u0435\u0442\u0441\u044f \u043d\u0430 \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0443 \u043e\u0434\u043d\u043e\u0439, \u043d\u0435\u0441\u043a\u043e\u043b\u044c\u043a\u0438\u0445 \u0438\u043b\u0438 \u0432\u0441\u0435\u0445 \u043a\u0430\u0442\u0435\u0433\u043e\u0440\u0438\u0439 \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445, \u043d\u0435 \u044f\u0432\u043b\u044f\u044e\u0449\u0438\u0445\u0441\u044f \u0441\u043f\u0435\u0446\u0438\u0430\u043b\u044c\u043d\u044b\u043c\u0438 \u0438\u043b\u0438 \u0431\u0438\u043e\u043c\u0435\u0442\u0440\u0438\u0447\u0435\u0441\u043a\u0438\u043c\u0438, \u043f\u0440\u0435\u0434\u043e\u0441\u0442\u0430\u0432\u043b\u044f\u0435\u043c\u044b\u0445 \u043c\u043d\u043e\u044e, \u043a\u043e\u0442\u043e\u0440\u044b\u0435 \u043c\u043e\u0433\u0443\u0442 \u0432\u043a\u043b\u044e\u0447\u0430\u0442\u044c:\u003Cbr\u003E\n\u003Cbr\u003E\n- ;\u003Cbr\u003E\n- ;\u003Cbr\u003E\n- ;\u003Cbr\u003E\n- ;\u003Cbr\u003E\n- .\u003Cbr\u003E\n\u003Cbr\u003E\n2. \u041e\u043f\u0435\u0440\u0430\u0442\u043e\u0440 \u043c\u043e\u0436\u0435\u0442 \u0441\u043e\u0432\u0435\u0440\u0448\u0430\u0442\u044c \u0441\u043b\u0435\u0434\u0443\u044e\u0449\u0438\u0435 \u0434\u0435\u0439\u0441\u0442\u0432\u0438\u044f: \u0441\u0431\u043e\u0440; \u0437\u0430\u043f\u0438\u0441\u044c; \u0441\u0438\u0441\u0442\u0435\u043c\u0430\u0442\u0438\u0437\u0430\u0446\u0438\u044f; \u043d\u0430\u043a\u043e\u043f\u043b\u0435\u043d\u0438\u0435; \u0445\u0440\u0430\u043d\u0435\u043d\u0438\u0435; \u0443\u0442\u043e\u0447\u043d\u0435\u043d\u0438\u0435 (\u043e\u0431\u043d\u043e\u0432\u043b\u0435\u043d\u0438\u0435, \u0438\u0437\u043c\u0435\u043d\u0435\u043d\u0438\u0435); \u0438\u0437\u0432\u043b\u0435\u0447\u0435\u043d\u0438\u0435; \u0438\u0441\u043f\u043e\u043b\u044c\u0437\u043e\u0432\u0430\u043d\u0438\u0435; \u0431\u043b\u043e\u043a\u0438\u0440\u043e\u0432\u0430\u043d\u0438\u0435; \u0443\u0434\u0430\u043b\u0435\u043d\u0438\u0435; \u0443\u043d\u0438\u0447\u0442\u043e\u0436\u0435\u043d\u0438\u0435. \u003Cbr\u003E\n\u003Cbr\u003E\n3. \u0421\u043f\u043e\u0441\u043e\u0431\u044b \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0438: \u043a\u0430\u043a \u0441 \u0438\u0441\u043f\u043e\u043b\u044c\u0437\u043e\u0432\u0430\u043d\u0438\u0435\u043c \u0441\u0440\u0435\u0434\u0441\u0442\u0432 \u0430\u0432\u0442\u043e\u043c\u0430\u0442\u0438\u0437\u0430\u0446\u0438\u0438, \u0442\u0430\u043a \u0438 \u0431\u0435\u0437 \u0438\u0445 \u0438\u0441\u043f\u043e\u043b\u044c\u0437\u043e\u0432\u0430\u043d\u0438\u044f.\u003Cbr\u003E\n\u003Cbr\u003E\n4. \u0426\u0435\u043b\u044c \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0438: \u043f\u0440\u0435\u0434\u043e\u0441\u0442\u0430\u0432\u043b\u0435\u043d\u0438\u0435 \u043c\u043d\u0435 \u0443\u0441\u043b\u0443\u0433\/\u0440\u0430\u0431\u043e\u0442, \u0432\u043a\u043b\u044e\u0447\u0430\u044f, \u043d\u0430\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u0435 \u0432 \u043c\u043e\u0439 \u0430\u0434\u0440\u0435\u0441 \u0443\u0432\u0435\u0434\u043e\u043c\u043b\u0435\u043d\u0438\u0439, \u043a\u0430\u0441\u0430\u044e\u0449\u0438\u0445\u0441\u044f \u043f\u0440\u0435\u0434\u043e\u0441\u0442\u0430\u0432\u043b\u044f\u0435\u043c\u044b\u0445 \u0443\u0441\u043b\u0443\u0433\/\u0440\u0430\u0431\u043e\u0442, \u043f\u043e\u0434\u0433\u043e\u0442\u043e\u0432\u043a\u0430 \u0438 \u043d\u0430\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u0435 \u043e\u0442\u0432\u0435\u0442\u043e\u0432 \u043d\u0430 \u043c\u043e\u0438 \u0437\u0430\u043f\u0440\u043e\u0441\u044b, \u043d\u0430\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u0435 \u0432 \u043c\u043e\u0439 \u0430\u0434\u0440\u0435\u0441 \u0438\u043d\u0444\u043e\u0440\u043c\u0430\u0446\u0438\u0438 \u043e \u043c\u0435\u0440\u043e\u043f\u0440\u0438\u044f\u0442\u0438\u044f\u0445\/\u0442\u043e\u0432\u0430\u0440\u0430\u0445\/\u0443\u0441\u043b\u0443\u0433\u0430\u0445\/\u0440\u0430\u0431\u043e\u0442\u0430\u0445 \u041e\u043f\u0435\u0440\u0430\u0442\u043e\u0440\u0430.\u003Cbr\u003E\n\u003Cbr\u003E\n5. \u0412 \u0441\u0432\u044f\u0437\u0438 \u0441 \u0442\u0435\u043c, \u0447\u0442\u043e \u041e\u043f\u0435\u0440\u0430\u0442\u043e\u0440 \u043c\u043e\u0436\u0435\u0442 \u043e\u0441\u0443\u0449\u0435\u0441\u0442\u0432\u043b\u044f\u0442\u044c \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0443 \u043c\u043e\u0438\u0445 \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445 \u043f\u043e\u0441\u0440\u0435\u0434\u0441\u0442\u0432\u043e\u043c \u043f\u0440\u043e\u0433\u0440\u0430\u043c\u043c\u044b \u0434\u043b\u044f \u042d\u0412\u041c \u00ab1\u0421-\u0411\u0438\u0442\u0440\u0438\u043a\u044124\u00bb, \u044f \u0434\u0430\u044e \u0441\u0432\u043e\u0435 \u0441\u043e\u0433\u043b\u0430\u0441\u0438\u0435 \u041e\u043f\u0435\u0440\u0430\u0442\u043e\u0440\u0443  \u043d\u0430 \u043e\u0441\u0443\u0449\u0435\u0441\u0442\u0432\u043b\u0435\u043d\u0438\u0435 \u0441\u043e\u043e\u0442\u0432\u0435\u0442\u0441\u0442\u0432\u0443\u044e\u0449\u0435\u0433\u043e \u043f\u043e\u0440\u0443\u0447\u0435\u043d\u0438\u044f \u041e\u041e\u041e \u00ab1\u0421-\u0411\u0438\u0442\u0440\u0438\u043a\u0441\u00bb, (\u041e\u0413\u0420\u041d 5077746476209), \u0437\u0430\u0440\u0435\u0433\u0438\u0441\u0442\u0440\u0438\u0440\u043e\u0432\u0430\u043d\u043d\u043e\u043c\u0443 \u043f\u043e \u0430\u0434\u0440\u0435\u0441\u0443: 109544, \u0433. \u041c\u043e\u0441\u043a\u0432\u0430, \u0431-\u0440 \u042d\u043d\u0442\u0443\u0437\u0438\u0430\u0441\u0442\u043e\u0432, \u0434. 2, \u044d\u0442.13, \u043f\u043e\u043c. 8-19.\u003Cbr\u003E\n\u003Cbr\u003E\n6. \u041d\u0430\u0441\u0442\u043e\u044f\u0449\u0435\u0435 \u0441\u043e\u0433\u043b\u0430\u0441\u0438\u0435 \u0434\u0435\u0439\u0441\u0442\u0432\u0443\u0435\u0442 \u0434\u043e \u043c\u043e\u043c\u0435\u043d\u0442\u0430 \u0435\u0433\u043e \u043e\u0442\u0437\u044b\u0432\u0430 \u043f\u0443\u0442\u0435\u043c \u043d\u0430\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u044f \u0441\u043e\u043e\u0442\u0432\u0435\u0442\u0441\u0442\u0432\u0443\u044e\u0449\u0435\u0433\u043e \u0443\u0432\u0435\u0434\u043e\u043c\u043b\u0435\u043d\u0438\u044f \u043d\u0430 \u044d\u043b\u0435\u043a\u0442\u0440\u043e\u043d\u043d\u044b\u0439 \u0430\u0434\u0440\u0435\u0441 v.polyakov.art@gmail.com \u0438\u043b\u0438 \u043d\u0430\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u044f \u043f\u043e \u0430\u0434\u0440\u0435\u0441\u0443 \u0433. \u041c\u043e\u0441\u043a\u0432\u0430, 5-\u044f \u041c\u0430\u0433\u0438\u0441\u0442\u0440\u0430\u043b\u044c\u043d\u0430\u044f \u0443\u043b., \u0434. 8\u0410\u0411.\u003Cbr\u003E\n\u003Cbr\u003E\n7. \u0412 \u0441\u043b\u0443\u0447\u0430\u0435 \u043e\u0442\u0437\u044b\u0432\u0430 \u043c\u043d\u043e\u044e \u0441\u043e\u0433\u043b\u0430\u0441\u0438\u044f \u043d\u0430 \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0443 \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445 \u041e\u043f\u0435\u0440\u0430\u0442\u043e\u0440 \u0432\u043f\u0440\u0430\u0432\u0435 \u043f\u0440\u043e\u0434\u043e\u043b\u0436\u0438\u0442\u044c \u043e\u0431\u0440\u0430\u0431\u043e\u0442\u043a\u0443 \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445 \u0431\u0435\u0437 \u043c\u043e\u0435\u0433\u043e \u0441\u043e\u0433\u043b\u0430\u0441\u0438\u044f \u043f\u0440\u0438 \u043d\u0430\u043b\u0438\u0447\u0438\u0438 \u043e\u0441\u043d\u043e\u0432\u0430\u043d\u0438\u0439, \u043f\u0440\u0435\u0434\u0443\u0441\u043c\u043e\u0442\u0440\u0435\u043d\u043d\u044b\u0445 \u0424\u0435\u0434\u0435\u0440\u0430\u043b\u044c\u043d\u044b\u043c \u0437\u0430\u043a\u043e\u043d\u043e\u043c \u2116152-\u0424\u0417 \u00ab\u041e \u043f\u0435\u0440\u0441\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u0445 \u0434\u0430\u043d\u043d\u044b\u0445\u00bb \u043e\u0442\u00a027.07.2006\u00a0\u0433.&quot;}"
                        class="main-user-consent-request">
                        <input type="checkbox" value="Y" checked="" name="">
                        <span class="main-user-consent-request-announce-link">Нажимая кнопку «Регистрация», я даю свое
                            согласие на обработку моих персональных данных, в соответствии с Федеральным законом от
                            27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в
                            Согласии на обработку персональных данных</span>
                    </label>
                    <div data-bx-template="main-user-consent-request-loader" style="display: none;">
                        <div class="main-user-consent-request-popup">
                            <div class="main-user-consent-request-popup-cont">
                                <div data-bx-head="" class="main-user-consent-request-popup-header"></div>
                                <div class="main-user-consent-request-popup-body">
                                    <div data-bx-loader="" class="main-user-consent-request-loader">
                                        <svg class="main-user-consent-request-circular" viewBox="25 25 50 50">
                                            <circle class="main-user-consent-request-path" cx="50" cy="50" r="20"
                                                fill="none" stroke-width="1" stroke-miterlimit="10"></circle>
                                        </svg>
                                    </div>
                                    <div data-bx-content="" class="main-user-consent-request-popup-content">
                                        <div class="main-user-consent-request-popup-textarea-block">
                                            <div data-bx-textarea="" class="main-user-consent-request-popup-text"></div>
                                            <div data-bx-link="" style="display: none;"
                                                class="main-user-consent-request-popup-link">
                                                <div>Ознакомьтесь с текстом по ссылке</div>
                                                <div><a target="_blank"></a></div>
                                            </div>
                                        </div>
                                        <div class="main-user-consent-request-popup-buttons">
                                            <span data-bx-btn-accept=""
                                                class="main-user-consent-request-popup-button main-user-consent-request-popup-button-acc">Y</span>
                                            <span data-bx-btn-reject=""
                                                class="main-user-consent-request-popup-button main-user-consent-request-popup-button-rej">N</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    Пароль должен быть не менее 6 символов длиной. </div>
                <div class="alert alert-warning">
                    На указанный в форме email придет запрос на подтверждение регистрации. </div>
                <div class="alert alert-warning">
                    <span class="starrequired">*</span>Поля, обязательные для заполнения.
                </div>
            </div>
        </div> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</div>
       
<script>
//Регистрация физ. лица
	function registerForm(event){
		event.preventDefault();
		let captcha_data = document.querySelector('[data-hcaptcha-response]');
    	let captcha = captcha_data.getAttribute('data-hcaptcha-response');
		let name = document.getElementById('name_fiz').value;
		let second_name = document.getElementById('second_name_fiz').value;
		let last_name = document.getElementById('last_name_fiz').value;
		let login = document.getElementById('login_fiz').value;
		let email = document.getElementById('email_fiz').value;
		let password = document.getElementById('password_fiz').value;
		let confirm_password = document.getElementById('confirm_password_fiz').value;
		let phone = document.getElementById('phone_fiz').value;
		if(name == '' || 
			phone == '' || 
			login == '' || 
			email == '' || 
			password == '' || 
			confirm_password == '' || 
			last_name == ''){
			alert("Пожалуйста заполните все обязательные поля");
		}else{
			// console.log(captcha);
			$.ajax({
				type: 'POST',
				url: '/ajax/forms/register.php',
				data: {
					captcha: captcha,
					name: name,
					second_name: second_name,
					last_name: last_name,
					login: login,
					email: email,
					password: password,
					confirm_password: confirm_password,
					phone: phone,
				},
				dataType: "html",
				success: function(data){
					$('#backcall_message_fiz').html(data);
				}
			});
		}
	};
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>