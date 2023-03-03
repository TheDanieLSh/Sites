<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles.css" type="text/css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Корво Бьянко</title>
</head>

<body>
    <section class="panel">
        <div class="menu_button">
            <div id="upDown"></div>
            <div id="downUp" class="unclicked"></div>
        </div>
        <div class="menu show_menu">
            <div class="menu_container text">
                <div class="menu_item mainPage">Главная</div>
                <div class="menu_item historyPage">История</div>
            </div>
        </div>
    </section>
    <section class="header">
        <video src="public/footage.mp4" loop autoplay muted preload="auto"></video>
        <div class="header_title">Корво Бьянко</div>
        <div class="text">
            <div class="subheader1">Прекрасная резиденция в Туссенте</div>
            <div class="subheader2">Непревзойдённый вид на красоты здешнего края,</div>
            <div class="subheader2_two">а также лучший на свете виноград</div>
        </div>
    </section>
    <section class="basis">
        <div class="info text"></div>
    </section>
    <section class="footer">
        <div class="footer_text text">
            Княжество Туссент.
            <br>
            Все права защищены
        </div>
    </section>
</body>
<script>
    uricheck();
    $(document).on('click', function(event) {
        if (event.target.closest('.menu_button')) {
            $('#upDown').toggleClass('clickedUp');
            $('#downUp').toggleClass('clickedDown unclicked');
            $('.menu').toggleClass('show_menu');
        }
        if (!event.target.closest('.menu_button, .menu')) {
            $('#upDown').removeClass('clickedUp');
            $('#downUp').removeClass('clickedDown');
            $('#downUp').addClass('unclicked');
            $('.menu').addClass('show_menu');
        }
    })

    const changingText = require('/public/changing-text.json');
    let infos = JSON.parse(changingText);

    function uricheck() {
        if (document.location.pathname == "/corvo/history") {
            $('.info').html('Корво Бьянко имеет богатую историю, начало которой скрывается во мраке веков. По легенде, винодельню основал один из сыновей владельца виноградника Помероль, который был лишён наследства и отправился в изгнание с саженцами винограда карванере. Сначала винодельня была имуществом некого господина Болюса герба Палачей, яркого человека родом из Каэдвена. Прапрапрапрадед Болюса действительно был палачом, получившим должность при дворе в Боклере. За усердную и преданную службу князь тех времён пожаловал ему винодельню с прилежащими землями. На старости лет Болюс утратил обоняние и слух, а затем лекари запретили ему употреблять алкоголь. Тем не менее хозяин виноградников не отчаялся и не прекратил заниматься своим делом, а наоборот, стал выпускать ещё больше вина. Болюс созывал друзей со всей округи и устраивал шумные празднества, угощая их собственным вином, радуясь, что хоть их оно делает счастливым. В то же время из-за достаточно расточительного образа жизни Болюса имение начало приходить в упадок. Следующим хозяином Корво Бьянко был барон Россель, которому не удалось восстановить величие винодельни в том числе и из-за пагубного пристрастия к картам. Ситуация усугубилась, поскольку осенью 1274 года грибок убил всю виноградную лозу. В конце концов, имение было продано с аукциона и стало собственностью королевской казны.');
        } else if (document.location.pathname == "/corvo/") {
            $('.info').html('Построенная на эльфских руинах, одна из самых старых виноделен в княжестве, называвшаяся в Старшей Речи "Гвин Кербин". Именно здесь рождается чрезвычайно оригинальноевино Сепременто.');
        }
    }

    $(window).on('popstate', uricheck);

    $('.mainPage').on('click', function() {
        history.pushState(null, null, '/corvo/');
        uricheck();
    })
    $('.historyPage').on('click', function() {
        history.pushState(null, null, '/corvo/history');
        uricheck();
    })
    
    let scrolledPevious;
    $(document).on('scroll', function() {
        let scrolled = $(window).scrollTop();
        if (scrolled > scrolledPevious) {
            $('.panel').css({ transform: 'translateY(-50px)' });
        } else if (scrolled < scrolledPevious) {
            $('.panel').css({ transform: 'translateY(0px)' });
        }
        scrolledPevious = $(window).scrollTop();
    })
</script>

</html>