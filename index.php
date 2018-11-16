<?php
session_start();

$mailTo = '';
$sid = session_id();

function dieJson($json) {
    header('Content-Type: application/json; charset=UTF-8');
    die(@json_encode($json));
}

if (isset($mailTo) && isset($_POST['sid']) && $_POST['sid'] == $sid) {

    $message = $_POST['email'] . "\n" . $_POST['phone'] . "\n" . $_POST['name'];

    if (mail($mailTo, $_POST['subject'], $message)) {
        dieJson(array(
            'status' => 'ok',
            'message' => 'Ваш запрос принят в обработку'
        ));
    } else dieJson(array(
        'status' => 'error',
        'message' => 'Что-то пошло не так, попробуйте еще раз позднее'
    ));

    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <script src="/js/jquery-1.11.0.min.js"></script>
    <script src="scripts.js"></script>
</head>
<body>
    <div class="lp-page__wrapper js-page-wrapper">
        <div class="lp-page">
            <a class="lp-page__logo" href="/"></a>
            <div class="lp-top-info">
                <div class="lp-top-info__block lp-top-info__block--first">
                    <div class="lp-top-info__title">ПН-ВС</div>
                    <div class="lp-top-info__text">с 9:00 до 18:00</div>
                </div>
                <div class="lp-top-info__block">
                    <div class="lp-top-info__title">Звонок бесплатный</div>
                    <div class="lp-top-info__text">8 (800) 511-86-89</div>
                </div>
                <button class="lp-top-info__button js-open-form">Заказать консультацию</button>
            </div>
            <div class="lp-page__body">
                <h1 class="lp-page__title">ГИРЛЯНДЫ ОПТОМ<br/>ОТ <b>60 РУБЛЕЙ</b></h1>
                <h2 class="lp-page__subject">Доставка по всей России!</h2>
                <ul class="lp-page__list">
                    <li class="lp-page__list-item lp-page__list-item--01">Скидка до 30%</li>
                    <li class="lp-page__list-item lp-page__list-item--02">Огромный выбор</li>
                    <li class="lp-page__list-item lp-page__list-item--03">Маржинальность до 250%</li>
                    <li class="lp-page__list-item lp-page__list-item--04">Подборка товара</li>
                    <li class="lp-page__list-item lp-page__list-item--05">Свой склад</li>
                    <li class="lp-page__list-item lp-page__list-item--06">Резерв товара</li>
                    <li class="lp-page__list-item lp-page__list-item--07">Товар всегда в наличии</li>
                </ul>
            </div>
            <form class="lp-page__form lp-form js-page-form">
                <div class="lp-form__inner">
                    <h2 class="lp-form__title">Получите оптовый<br/>прайс-лист прямо сейчас!</h2>
                    <input name="sid" type="hidden" value="<?=$sid?>"/>
                    <input name="subject" type="hidden" value="Запрос прайса"/>
                    <input
                        class="lp-form__input"
                        type="text" name="email"
                        autocomplete="off"
                        placeholder="Ваш e-mail" />
                    <input
                        class="lp-form__input"
                        type="text"
                        name="phone"
                        autocomplete="off"
                        placeholder="Ваш телефон"/>
                    <input
                        class="lp-form__input"
                        type="text"
                        name="name"
                        autocomplete="off"
                        placeholder="Ваше имя"/>
                    <button class="lp-form__submit" type="submit">Отправить</button>
                </div>
            </form>
            <div class="lp-page__footer"></div>
        </div>
        <div class="lp-page__muzik"></div>
    </div>
    <div class="lp-popup hidden js-popup-form">
        <div class="lp-popup__overlay"></div>
        <form class="lp-popup__form lp-popup-form js-page-form">
            <button class="lp-popup-form__close js-close-form"></button>
            <div class="lp-popup-form__inner">
                <h2 class="lp-popup-form__title">Оставьте заявку и менеджер<br/>свяжется с Вами в самое<br/>ближайшее время</h2>
                <input name="sid" type="hidden" value="<?=$sid?>"/>
                <input name="subject" type="hidden" value="Запрос  связи с менеджером"/>
                <input
                    class="lp-form__input"
                    type="text" name="email"
                    autocomplete="off"
                    placeholder="Ваш e-mail" />
                <input
                    class="lp-form__input"
                    type="text"
                    name="phone"
                    autocomplete="off"
                    placeholder="Ваш телефон"/>
                <input
                    class="lp-form__input"
                    type="text"
                    name="name"
                    autocomplete="off"
                    placeholder="Ваше имя"/>
                <button class="lp-popup-form__submit" type="submit">Отправить</button>
            </div>
        </form>
    </div>
<!— Yandex.Metrika counter —> 
<script type="text/javascript" > 
(function (d, w, c) { 
(w[c] = w[c] || []).push(function() { 
try { 
w.yaCounter51102935 = new Ya.Metrika2({ 
id:51102935, 
clickmap:true, 
trackLinks:true, 
accurateTrackBounce:true, 
webvisor:true 
}); 
} catch(e) { } 
}); 

var n = d.getElementsByTagName("script")[0], 
s = d.createElement("script"), 
f = function () { n.parentNode.insertBefore(s, n); }; 
s.type = "text/javascript"; 
s.async = true; 
s.src = "https://mc.yandex.ru/metrika/tag.js"; 

if (w.opera == "[object Opera]") { 
d.addEventListener("DOMContentLoaded", f, false); 
} else { f(); } 
})(document, window, "yandex_metrika_callbacks2"); 
</script> 
<noscript><div><img src="https://mc.yandex.ru/watch/51102935" style="position:absolute; left:-9999px;" alt="" /></div></noscript> 
<!— /Yandex.Metrika counter —>
</body>
</html>