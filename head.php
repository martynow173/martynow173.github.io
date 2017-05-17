<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, width=device-width">
        <title>Вход</title>
        <link href="https://fonts.googleapis.com/css?family=PT+Serif+Caption" rel="stylesheet">
        <link rel="stylesheet" href="css\style.css">
    </head>
	<body>
        <header><!-- шапка -->
            <div id="banner">
            <img src="images/che.jpg" alt="баннер">
            </div>
            <input type="checkbox" id="menu-checkbox" />
            <nav role="navigation"><!-- навигация -->
                <label for="menu-checkbox" class="toggle-button" data-open="Menu" data-close="Close" onclick></label>
                <ul class="main-menu"><!-- список пунктов меню -->
                    <li><a href="index.php">Главная</a></li>
                    <?php    
                        if (!isset($user)) { echo '<li><a href="login.php#divlogin">Авторизация</a></li>'; }
                    ?>
                    <li><a href="interests.php">Интересы</a></li>
                    <li><a href="Galery.php">Галерея</a></li>
                    <li><a href="Contacts.php">Контакты</a></li>
                </ul>
            </nav>
		</header>
        <div class="page">
			<div class="mainfield">
            <div id="hello"> <?php    
                        if (isset($user)) {
                            echo "Привет, " .$user['login'];
                            echo " <a href='login.php?logout=1'>Выйти</a>";//ссылка для уничтожения сессии
                            if ($user['access'] == 1)  echo "<br><a href='admin.php'>Админ панель</a>";
                        }
                    ?>
                </div>