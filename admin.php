<?php
include ('connection.php'); 
    function delete() {
        mysql_query("DELETE FROM users WHERE id = '".$_GET['edit']."'");
        header("location: admin.php");
        exit;
        
    }


    if($user['access'] != 1) {
        header("location: index.php");
        exit;
    }
       
                
$u = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '".intval($_GET['edit'])."'")); 

if (isset($_GET['edit']) && mysql_num_rows(mysql_query("SELECT id FROM users WHERE id = '".intval($_GET['edit'])."'"))) { 
    $t = false; 
    if (isset($_GET['delete']) && $u['id'] != $user['id'] ) { 
        if (isset($_GET['true'])) { 
            mysql_query("DELETE FROM users WHERE id = '".$u['id']."'"); 
            header("location: admin.php"); 
            exit; 
        } 
        echo '<script type="text/javascript"> 
        if (confirm("Удалить пользователя?")) { 
            alert("Вы удалили пользователя!") 
            document.location.href="admin.php?edit='.$u['id'].'&delete&true"; 
        } else { 
            alert("Вы нажали кнопку отмена") 
            document.location.href="admin.php?edit='.$u['id'].'&delete&true"; 

        }</script> '; 

    } 

if (isset($_GET['delete']) && ($user['login'] == $u['login']))
{
    echo '<script type="text/javascript"> alert("Вы не можете удалить себя!");             
    document.location.href="admin.php?edit='.$u['id'].'";</script> ';
    exit;
}


if (isset($_POST['set'])) {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $brief = trim($_POST['brief']); 
    $access = trim($_POST['access']); 

    mysql_query("UPDATE users SET login = '".$login."', email = '".$email."', brief = '".$brief."', access = '".$access."' WHERE id = '".$_GET['edit']."'");
    header("location: admin.php?edit=".$_GET['edit']);
    exit;
}

include ('head.php'); 
echo '<form id="change" method="post">
<p>Логин:</p><br><input type="text" value="'.$u['login'].'" name="login" /><br>
<p>Электронная почта:</p> <br><input type="text" value="'.$u['email'].'" name="email" /><br>
<p>Статус:</p> <br><input type="text" value="'.$u['access'].'" name="access" /><br>
<p>Информация:</p> <br><textarea rows="10" cols="25" name="brief">'.$u['brief'].'</textarea><br><br>
<a href="admin.php?edit='.$_GET['edit'].'&delete">Удалить</a>';
echo ' <input type="submit" name="set" value="Сохранить" />
</form>
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
</html>';
                   
                
                exit;
                }
              include ('head.php');       
?>

                <h1 class="article">Редактирование пользователей</h1>
                <hr class="line">
                <table id="admtable">
                    <tr>
                        <td style="width: 5%">id</td>
                        <td style="width: 10%">Логин</td>
                        <td style="width: 20%">Электронная почта</td>
                        <td style="width: 5%">Статус</td>
                        <td style="width: 30%">Информация</td>
                        <td style="width: 10%"></td>
                    </tr>
                    <?php
                    $q = mysql_query("SELECT * FROM users");
                    while ($u = mysql_fetch_array($q)) {
                        echo '<tr>
                        <td>'.$u['id'].'</td>
                        <td>'.$u['login'].'</td>
                        <td>'.$u['email'].'</td>
                        <td>'.$u['access'].'</td>
                        <td>'.$u['brief'].'</td>
                        <td><a href="admin.php?edit='.$u['id'].'">Изменить</a></td>
                    </tr>';
                    }
                    
                    
                    ?>
                </table>

            
            
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