<?php
session_start();
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оконный завод</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="logo.png" alt="Логотип оконного завода">
            <h1>Оконный завод</h1>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="#about">О нас</a></li>
                <li><a href="#why-us">Почему мы</a></li>
                <li><a href="#services">Услуги</a></li>
                <li><a href="#certificates">Сертификаты</a></li>
                <li><a href="#contact">Контакты</a></li>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <li><a href="#" id="login-link">Войти</a></li>
                    <li><a href="#" id="register-link">Регистрация</a></li>
                <?php else: ?>
                    <li><a href="logout.php">Выйти</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <!-- Форма авторизации (изначально скрыта) -->
    <div id="login-form" class="auth-form" style="display: none;">
        <form action="login.php" method="POST">
            <h2>Авторизация</h2>
            <input type="text" name="username" placeholder="Имя пользователя" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Войти</button>
        </form>
    </div>

    <!-- Форма регистрации (изначально скрыта) -->
    <div id="register-form" class="auth-form" style="display: none;">
        <form action="register.php" method="POST">
            <h2>Регистрация</h2>
            <input type="text" name="username" placeholder="Имя пользователя" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <input type="password" name="confirm_password" placeholder="Подтвердите пароль" required>
            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
    <section class="hero">
        <h1>Качественные окна для вашего дома</h1>
        <p>Мы производим и устанавливаем окна любой сложности</p>
        <a href="#contact" class="cta-button">Заказать замер</a>
    </section>

    <section id="about" class="about">
        <h2>О нас</h2>
        <p>Мы - ведущий производитель окон с многолетним опытом работы. Наша цель - обеспечить наших клиентов качественными окнами, которые прослужат долгие годы.</p>
    </section>

    <section id="why-us" class="why-us">
        <h2>Почему выбирают нас</h2>
        <div class="features">
            <div class="feature">
                <h3>Качество</h3>
                <p>Мы используем только высококачественные материалы и современное оборудование.</p>
            </div>
            <div class="feature">
                <h3>Опыт</h3>
                <p>Наша команда состоит из опытных профессионалов с многолетним стажем работы.</p>
            </div>
            <div class="feature">
                <h3>Гарантия</h3>
                <p>Мы предоставляем гарантию на все наши изделия и услуги.</p>
            </div>
        </div>
    </section>

    <section id="services" class="services">
        <h2>Наши услуги</h2>
        <ul class="service-list">
            <li class="service-item">
                <h3>Производство окон</h3>
                <p>Изготовление окон любых размеров и конфигураций.</p>
            </li>
            <li class="service-item">
                <h3>Установка окон</h3>
                <p>Профессиональная установка окон с гарантией качества.</p>
            </li>
            <li class="service-item">
                <h3>Ремонт окон</h3>
                <p>Ремонт и обслуживание окон любой сложности.</p>
            </li>
        </ul>
    </section>

    <section id="certificates" class="certificates">
        <h2>Наши сертификаты</h2>
        <div class="certificate-gallery">
            <img src="certificate1.png" alt="Сертификат 1">
            <img src="certificate2.png" alt="Сертификат 2">
            <img src="certificate3.jpg" alt="Сертификат 3">
        </div>
    </section>
    <section class="free-measurement">
        <h2>Бесплатный замер</h2>
        <form id="measurement-form" action="submit.php" method="POST">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required>

            <label for="phone">Телефон:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="date">Дата замера:</label>
            <input type="date" id="date" name="date" required>

            <button type="submit">Отправить заявку</button>
        </form>
    </section>

    <section id="contact" class="contact">
        <h2>Контакты</h2>
        <p>Адрес: г. Москва, ул. Оконная, д. 1</p>
        <p>Телефон: +7 (123) 456-78-90</p>
        <p>Email: info@okna.ru</p>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2245.5887638669837!2d37.61844231590789!3d55.75197998055643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a50b315e573%3A0xa886bf5a3d9b2e68!2sThe%20Moscow%20Kremlin!5e0!3m2!1sen!2sru!4v1619524992264!5m2!1sen!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2023 Оконный завод. Все права защищены.</p>
    </footer>

    <?php
    if (isset($_SESSION['form_message'])) {
        echo "<script>alert('" . $_SESSION['form_message'] . "');</script>";
        unset($_SESSION['form_message']);
    }
    ?>

    <script>
        // Скрипт для отображения/скрытия форм авторизации и регистрации
        document.getElementById('login-link').addEventListener('click', function(e) {
            e.preventDefault();
            toggleForm('login-form');
        });

        document.getElementById('register-link').addEventListener('click', function(e) {
            e.preventDefault();
            toggleForm('register-form');
        });

        function toggleForm(formId) {
            var form = document.getElementById(formId);
            var otherFormId = formId === 'login-form' ? 'register-form' : 'login-form';
            var otherForm = document.getElementById(otherFormId);

            if (form.style.display === 'none') {
                form.style.display = 'block';
                otherForm.style.display = 'none';
            } else {
                form.style.display = 'none';
            }
        }
    </script>

</body>
</html>


