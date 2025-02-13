<?php
include "portfolio_db.php";
$contacts = getContacts();
$workplaces = getWorkplaces();
$images = getImages();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя визитка</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="navbar">

        <a href="#bio">Биография</a>
        <a href="#music">Любимая музыка</a>
        <a href="#skills">Навыки</a>
        <a href="#experience">Опыт работы</a>
        <a href="#contact">Контакты</a>
    </div>

    <div class="section photo-section">
        <div class="photo-container">
            <img src="<?php echo $images[0]['src'] ?>" alt="Мое фото">
            <div class="photo-caption">Elinskas Diana</div>
        </div>
    </div>

    <div id="bio" class="section bio-section">
        <h2>Биография</h2>
        <div class="bio-content">
            <div class="bio-photo">
                <img src="<?php echo $images[1]['src'] ?>" alt="Мое фото">
            </div>
            <div class="bio-text">
                <p>Студентка первого курса Академии управления, менеджер по работе с клиентами Промсвязьбанк. Родилась 3
                    июня 2004 года в Макеевке. Увлекаюсь изучением языков, особенно Турецкого и Английского. В детстве
                    занималась восточными танцами и пением, что развило во мне любовь к искусству и музыке. В колледже
                    участвовала в официальных мероприятиях и волонтёрских проектах. После окончания, - поступила на
                    факультет управления и государственной службы ФГБОУ ВО "ДОНАУиГС, где продолжаю активно учиться и
                    развиваться. В свободное время увлекается чтением фентези литературы и путешествиями.</p>
            </div>
        </div>
    </div>

    <div id="music" class="section music-section">
        <h2>Любимая музыка</h2>
        <p>Wide Awake</p>
        <p>Eric Saade, Aug 30, 2016</p>
        <audio preload="auto" controls>
            <source src="https://ds.cdn13.deliciouspeaches.com/get/music/20160718/Eric_Saade_-_Wide_Awake_36249206.mp3">
        </audio>

        <p>Я, Ты И Море</p>
        <p>GAYAZOV$ BROTHER, Jul 27, 2020</p>
        <audio preload="auto" controls>
            <source
                src="https://cdn15.deliciouspeaches.com/get/cuts/4f/f9/4ff99e36f18242c17821bb6345672ccb/69827131/GAYAZOV_BROTHER_-_YA_TY_i_MORE_b128f0d208.mp3">
        </audio>

        <p>Efsane Sensin</p>
        <p>Edis, 15 May 2019</p>
        <audio preload="auto" controls>
            <source
                src="https://s2.deliciouspeaches.com/get/cuts/98/17/9817da803bc2905debc6729e37b44011/64777479/Edis_-_Efsane_Sensin_b128f0d186.mp3">
        </audio>
    </div>

    <div id="skills" class="section skills-section">
        <h2>Навыки</h2>
        <div class="skills-content">
            <img src="<?php echo $images[2]['src'] ?>">
            <img src="<?php echo $images[3]['src'] ?>">
            <img src="<?php echo $images[4]['src'] ?>">
            <img src="<?php echo $images[5]['src'] ?>">
            <img src="<?php echo $images[6]['src'] ?>">
        </div>
    </div>

    <div id="experience" class="section experience-section">
        <h2>Опыт работы</h2>
        <table class="experience-table">
            <?php
            for ($i = 0; $i < count($workplaces); $i++) {
                echo "<tr><td>" . $workplaces[$i]['place'] . "</td><td>" . $workplaces[$i]['post'] . "</td></tr>";
            }
            ?>
        </table>
    </div>

    <div id="contact" class="section contact-section">
        <h2>Контакты</h2>
        <p><?php echo $contacts[0]['workplace_address'] ?></p>
        <p><?php echo $contacts[0]['phone_number'] ?></p>
        <p><?php echo $contacts[0]['email'] ?></p>
        <div style="position:relative;overflow:hidden;"><a
                href="https://yandex.ru/maps/org/tsentralny_respublikanskiy_bank/27250057028/?utm_medium=mapframe&utm_source=maps"
                style="color:#eee;font-size:12px;position:absolute;top:0px;">Центральный республиканский банк</a><a
                href="https://yandex.ru/maps/24876/makiivka/category/bank/184105398/?utm_medium=mapframe&utm_source=maps"
                style="color:#eee;font-size:12px;position:absolute;top:14px;">Банк в Макеевке</a><iframe
                src="https://yandex.ru/map-widget/v1/?ll=37.963722%2C48.040829&mode=poi&poi%5Bpoint%5D=37.963643%2C48.042064&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D27250057028&z=16.66"
                width="1100" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
        </div>
    </div>
    </div>

    <div class="back-to-top" onclick="scrollToTop()">Наверх</div>

    <script>
        window.onscroll = function () { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.querySelector('.back-to-top').style.display = "block";
            } else {
                document.querySelector('.back-to-top').style.display = "none";
            }
        }

        function scrollToTop() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>

</body>

</html>