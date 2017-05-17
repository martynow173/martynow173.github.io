<?php

include ('connection.php');

if (isset($_POST['submit'])){
    $login = trim($_POST['login']);
    $pass = md5($_POST['pass']);   
    $query = "SELECT id, login, email, brief, access FROM  users WHERE login = '$login' AND pass = '$pass' LIMIT 1";//выбираем нужные id и login, лимит стоит для ускоерния: если находится такой пользователь, то поиск прекращается и мы останавливаемся на строке
    $result = mysql_query($query); //результат запроса присваиваем переменной
    if (mysql_num_rows($result) == 1) { //если запрос вернул количество строк = 1, то заносим в переменную массив значений из запроса
        $found_user = mysql_fetch_array($result);//т.е. если нашлось корректное совпадение пары логин+пароль в 1 строке условие выполнится 
        $_SESSION['user_id'] = $found_user['id'];

        header ('Location: index.php');//перенаправляем на главную
        exit;
            
    }
    else 
    {
        $message = "Неверная пара логин/пароль!";
    }
}
else//выходим из сети
{
    if(isset($_GET['logout']) && $_GET['logout'] == 1) {
        $_SESSION['user_id'] = false; //обнуляем массив с переменными сессии
        
        if(isset($_COOKIE[session_name()])) {//если есть куки с именем сессии, то уничтожаем
            setcookie(session_name(), '', time()-42000);
        }
        session_destroy();
        $msg = "Вы вышли из системы!";
        header("location: index.php");
        exit;
    }
    
}
include ('head.php');
?>

       
				
                <h1 class="article">Вход</h1>
				<hr class="line">
				<div id="divlogin">
                    <form method="POST" action="login.php">
                        <div id="login">
							Логин<br>
							<input type="text" name="login">
						</div>	
						<div id="password">
                            Пароль<br>
							<input type="password" name="pass">
						</div>
						<div id="button">
							<input type="submit" name="submit" value="Войти">
						</div>
						<div id="reg">
							<a href="reg.php">Регистрация</a>
						</div>
					</form>
                    <?php 
                        if (!empty($message)) {
                            echo "<p id='alarm'>".$message."<br>Чтобы зарегистрироваться, нажмите <a href='reg.php'>сюда</a></p>"; //если message не пустая, то выводится сообщение
                        }                       
                    ?>
				</div>
			</div>
            
			<div class="underground">
                <h2 id="underarticle">Авторские права</h2>
				<p>Copyright © 2017. Официальный сайт Мартынова Егора.</p>
				<address>
                Связаться со мной вы всегда можете по e-mail: e.martinow@yandex.ru, 
                либо на сайте vk.com: https://vk.com/martinow111
                </address>
            </div>
		</div>
	</body>
</html>