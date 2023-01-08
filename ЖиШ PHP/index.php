<?php

    $db = new PDO(dsn: "mysql:host=localhost;dbname=zhish", username: "root", password: "");
    $smn = [];
    $tlou = [];
    if ($query = $db -> query("SELECT * FROM Comics WHERE Series = 'Spider-Man Noire. Vol 2'")) {
        $smn = $query -> fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo $db -> errorInfo();
        }
    if ($query = $db -> query("SELECT * FROM Comics WHERE Series = 'TLoU: American Dreams'")) {
        $tlou = $query -> fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo $db -> errorInfo();
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link rel="icon" href="zhish.png" type="image/x-icon">
        <link rel="stylesheet" href="styles.css" type="text/css"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>ЖиШ</title>
    </head>
    <body>
        <div id="pelena"></div>
        <div id="cookies">
            <div>Accept the cookies.</div>
            <button class="accept knopka">Accept</button>
            <button class="decline knopka">Decline</button>
        </div>
        <div id="popup">
            <div>
                <img src="gru.jpg">
            </div>
            <div>
                <div>I said,</div>
                <div>ACCEPT THE COOKIES</div>                
                <button class="accept" id="popupaccept">Accept</button>
            </div>
        </div>       
        <nav>
            <ul>
                <li class="firstlevel"><a class="navig" href="#">Главная</a></li>
                <li id="spis" class="firstlevel"><a class="navig" href="#spisok">Список работ</a>
                            <ul id="submenu">
                                <li><a id="spidersub" class="navig" href ="#SMN">Человек-Паук</a></li>
                                <li><a id="tlousub" class="navig" href="#TLOU">Одни из Нас</a></li>
                            </ul>
                </li>
                <li class="firstlevel"><a class="navig" href="#kontakti">Контакты</a></li>
            </ul>
        </nav>
        <section id="glavnaya">    
            <div id="logo">
                <img src="zhish.png" id="zhishlogo">
            </div>
            <div id="header">ЖиШ</div>  
            <hr id="headerhr">
            <div id="pripiska">Мы переводим комиксы</div>            
        </section>
        <section id="spisok"> 
            <div id="spisokrabot">СПИСОК НАШИХ РАБОТ</div>
            <div id="SMN">Человек-Паук Нуар. Том 2</div>
        <?php foreach ($smn as $data): ?>
            <div class="issue">
                <a href=<?= $data['Link']; ?> target="_blank"><img src=<?= $data['Cover']; ?> class="oblozhki"></a>
                <p><?= $data['Series']; ?></p>
                <p><?= $data['Issue']; ?></p>
            </div>
        <?php endforeach; ?>
            <div id="TLOU">The Last of Us: Американские Мечты</div>
        <?php foreach ($tlou as $data): ?>
            <div class="issue">
                <a href=<?= $data['Link']; ?> target="_blank"><img src=<?= $data['Cover']; ?> class="oblozhki"></a>
                <p><?= $data['Series']; ?></p>
                <p><?= $data['Issue']; ?></p>
            </div>
        <?php endforeach; ?>
        </section>
        <section id="kontakti">
            <hr id="footerhr">
            <p class="info">Переводчик — Шуваев Данила</p>
            <p class="info">Художник-оформитель — Герасимов Павел</p>
            <p class="info">Редактор — Колесников Вячеслав</p>
            <p class="info"><a href="https://www.vk.com/zhiish">VK.com/zhiish</a></p>
            <br>
        </section>        
    </body>
    <script>
    $('#zhishlogo').animate({ top: '80px', opacity: '1' }, 900);
    $('#cookies').animate({ bottom: '5px' }, 500);

    let page = $('html, body');
    $('a[href*="#"]').click(function () {
        page.animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 1000)
        return false;
    })

    $('#popup').hide();

    $('.accept').click(function () {
        $('#cookies').hide();
        $('#popup').hide();
        $('#pelena').hide();
        $('body').removeClass('nooverflow');
    })
    $('.decline').click(function () {
        $('#cookies').hide();
        $('#popup').show();
        $('#pelena').show();
        $('body').addClass('nooverflow');
    }) 
</script>
</html>