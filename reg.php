<?php

include ('connection.php');
include ('head.php');
if (isset($_POST['submit'])) 
{
    $login = trim ($_POST['login']);
    $pass = md5($_POST['pass']);
    $mail = trim($_POST['mail']);
    $brief = trim($_POST['brief']);
    $povt = "SELECT id, login  FROM  users WHERE login = '$login'";
    $res = mysql_query($povt);
    
    if(mysql_num_rows($res) == 0) {
        $query = "INSERT INTO users (login, pass, email, brief) VALUES ('$login', '$pass', '$mail', '$brief')";  //вставяем необходимые данные в таблицу
        $result = mysql_query($query);//результат запроса присваиваем переменной

        if($result)
        {
            $message = "Вы успешно зарегистрировались!<br><p>Для входа на сайт жмите <a href='login.php'>сюда</a></p>";
        }
        else 
        {
            $message = "Ошибка: зарегистрироваться не удалось!";
        }
    }
    else 
    {
        $message = "Пользователем с таким же именем уже существует";

        
    }
    
}

?>


				<h1 class="article">Регистрация</h1>
				<hr class="line">
				<div>
					<?php 
                        if (!empty($message)) {
                            echo "<p class='alarm'>".$message."</p>"; //если message не пустая, то выводится сообщение
                        }
                    ?>
                    <form method="POST"  action="reg.php">
						<table class="reg">
                            <tr>
                                <td>Придуймайте себе логин:</td>
                                <td><input name="login"></td>
                            </tr>
                            <tr>
                                <td>Придумайте пароль:</td>
                                <td><input type="password" name="pass"></td>
                            </tr>
                            <tr>
                                <td>Ваша электронная почта:</td>
                                <td><input type="email" name="mail"></td>
                            </tr>
                            <tr>
                                <td>Коротко расскажите о себе:</td>
                                <td><textarea rows="10" cols="50" name="brief" placeholder="не более 255 символов"></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" value="Зарегистрироваться"></td>
                            </tr>
                        </table>
					</form>
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