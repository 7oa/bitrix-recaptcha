<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
//prnt($arResult);
?>
    <div class="connect-us">
        <div class="connect-us__head">
            <div class="connect-us__ttl">Отправить заявку</div>
        </div>
        <?
        if(strlen($arResult["OK_MESSAGE"]) > 0)
        {
            ?><div class="mf-ok-text" style="margin-bottom: 100px; padding: 0 50px;"><?=$arResult["OK_MESSAGE"]?></div><?
        }
        else{

        if(!empty($arResult["ERROR_MESSAGE"]))
        {
            echo "<div style='line-height: 24px; font-size: 16px;  margin-bottom: 20px; color: darkred; padding: 0 50px;'>";
            foreach($arResult["ERROR_MESSAGE"] as $v)
                ShowError($v);
            echo "</div>";
        }
        ?>
        <form class="form" action="<?=POST_FORM_ACTION_URI?>" method="POST">
            <?=bitrix_sessid_post()?>
            <div class="form__row">
                <div class="form__col">
                    <div class="form__label">Имя<span>*</span></div>
                    <input class="form__input form__input_name" type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>">
                </div>
                <div class="form__col">
                    <div class="form__label">Телефон<span>*</span></div>
                    <input class="form__input form__input_tel" type="tel" id="phone" type="tel" name="user_tell" value="<?=$arResult["AUTHOR_TELL"]?>">
                </div>
            </div>
            <div class="form__row">
                <div class="form__col-w">
                    <div class="form__label">Комментарий</div>
                    <textarea class="form__textarea" placeholder="Напишите здесь немного, чтобы сразу вас поняли" name="MESSAGE" ><?=$arResult["MESSAGE"]?></textarea>
                </div>
            </div>
            <div class="form__row">
                <div class="form__disclamer">
                    <div class="form__disclamer-star">*</div>
                    <div class="form__disclamer-txt">— обязательно заполнить</div>
                </div>
            </div>
            <div class="connect-us__footer">
                <div class="connect-us__captcha">
                    <div class="g-recaptcha" id="f-callback" data-sitekey="<?=RE_SITE_KEY?>"></div>
                </div>
                <input class="form__submit btn btn-blue" type="submit" name="submit" value="Отправить заявку">
            </div>
        </form>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        var onloadCallback = function() {
            var widgetId = grecaptcha.render("f-callback");
            grecaptcha.reset(widgetId);
        }
    </script>
<?}?>