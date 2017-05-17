<?php
include ('connection.php');	
include ('head.php'); 
?>          
            <h1 class="article">Лабораторная работа №3</h1>
            <hr class="line">
            <p class="article">Программа определяет, является ли бинарное отношение, заданное в виде матрицы, функцией. В текстовое поле осуществляется ввод матрицы размером nxn(sic!). Ввод элементов строки осуществляется строго через пробел (перечисление через  "," , ";" или иные символы не допускается).Переход на следующую строку массива осуществляется нажатием клавиши "enter".<br>После ввода матрицы нажмит кнопку "Проверить", ниже отобразится результат.</p>
            <div id="lab">
                <form action="" method="get">	
                <form method="get">	
                    <p>Введите матрицу nxn:</p><br><textarea rows="20" cols="50" name="matrix"><?=htmlspecialchars($_GET['matrix'])?></textarea><br>
	               <input type="submit" value="Проверить">	               
                </form>
            <?php
            function validation($elem) { 
                $res = 1; 
                for ($i = 0; $i < count($elem); $i++) { 
                    if (count($elem) != count($elem[$i])) {
                    $res = '<p>Матрица не квадратная</p>'; 
                    }
                } 

                if (count($elem) == 1 && $elem[0][0] == NULL){
                    $res = '<p>Поле пустое</p>'; 
                }

                for ($i = 0; $i < count($elem); $i++) { 
                    for ($j = 0; $j < count($elem); $j++){ 
                        if ($elem[$i][$j] == '0' || $elem[$i][$j] == '1')   {
                        }
                        else
                        {
                            $res = '<p>Матрица не соотвествует бинарному виду</p>'; 
                            return $res;
                        }
                    } 
                } 

                return $res; 
            }


                function checkf($a) {
                    $n = 0;
                    for($i = 0; $i < count($a); $i++){
                        for($j = 0; $j <count($a);$j++) {
                            if($a[$i][$j]==1){
                                $n++;
                            }
                        }
                        if ($n!=1) {
                            $res ="<p>Бинарное отношение не является функцией!</p><br>";
                            return $res;
                        }			
                        $n=0;
                    }

                    $res = "<p>Отношение является функцией!</p><br>";
                    return $res;
                }

            if (isset($_GET['matrix'])) { 
                $matrix = htmlspecialchars (trim($_GET['matrix'])); 
                $matrix = preg_replace('# {2,}#', ' ', $matrix); 
                $matrix = preg_replace('#(?:\r?\n){2,}#', "\r\n", $matrix); 
                $mas = explode("\r\n", $matrix); 

                for ($i = 0; $i < count($mas); $i++) { 
                    $mas[$i] = trim($mas[$i]); 
                    $elem[$i] = explode (" ",$mas[$i]); 
                } 

                $res = validation($elem); 
                if ($res != 1) {
                    echo "<p>Ошибка введенных данных: ".$res."</p><br>"; 
                }
                else { 
                    $res = "<p>Данные введены верно</p><br>"; 
                   
                    echo($res); 
                    $res = checkf($elem); 
                    echo($res); 

                } 

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
