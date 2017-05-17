<?php
include ('connection.php');	
include ('head.php'); 
?>          
            <h1 class="article">Лабораторная работа №2</h1>
            <hr class="line">
            <p class="article">Программа определяет свойства матрицы, задающей бинарное отношение. <br>В текстовое поле осуществляется ввод матрицы размером nxn(sic!). Ввод элементов строки осуществляется строго через пробел (перечисление через  двойные пробелы, "," , ";" или иные символы не допускается). Переход на следующую строку массива осуществляется нажатием клавиши "enter".<br>После ввода матрицы нажмит кнопку "Проверить", ниже отобразится результат.</p>
            <div id="lab">
                <form action="" method="get">	
                <form method="get">	
                    Введите матрицу nxn:<br><textarea rows="20" cols="50" name="matrix"><?=htmlspecialchars($_GET['matrix'])?></textarea><br>
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
                function reflex ($a) { //на г. диаг. - 1
                    $j=0;
                    $res="<p>Отношение рефлексивно!</p><br>";
                    for ($i=0;$i<count($a[$i]);$i++){
                        if ($a[$i][$j] != 1) {
                            $res="<p>Отношение не рефлексивно!</p><br>";
                        }
                        $j++;
                    }
                    return $res;

                }
                function sim ($a) { //симметричность (сим. относительно г. диаг.)
                    $res = "<p>Отношение симметрично!</p><br>";
                    $j = 0;
                    $length = count($a) - 1;
                    for ($i=0; $i<count($a); $i++) {  //удаляем из массива г. диаг.
                        for ($j=$z;$j<$length;$j++) {
                            $a[$i][$z] = $a[$i][$j+1];  
                        }
                        $z++;
                    }
                    for ($i = 0; $i<count($a);$i++) {  //проверяем равенство a[i][j] == a[j][i]
                        for ($j=0;$j<$length;$j++){
                            if($a[$i][$j] != $a[$j][$i]) {
                                    $res = "<p>Отношение не симметрично</p><br>";
                                    return $res;
                            }
                        }
                    }


                    return $res;
                }
                function cossim ($a) { //кососимметричность (вне г. диаг. - 0)
                    $res = "<p>Отношение кососимметирчно!</p><br>";
                    $z = 0;
                    $length = count($a) - 1;
                    for ($i=0; $i<count($a); $i++) {  //удаляем из массива г. диаг.
                        for ($j=$z;$j<$length;$j++) {
                            $a[$i][$z] = $a[$i][$j+1];  
                        }
                        $z++;
                    }

                    for($i = 0; $i < count($a); $i++) {
                        for ($j=0; $j<$length;$j++) {
                            if($a[$i][$j] != 0) { //проверяем полученный массив на наличие "ненулей"
                                $res = "<p>Отношение не кососимметирчно!</p><br>";
                                return $res;
                            }
                        }
                    }


                    return $res;
                }
                function tranz ($a) { //транизитвиность: матрица, полученная после возведения в квадрат исходной матрицы, должна быть равна последней
                    $res = "<p>Отношение транзитивно!<p><br>";
                    $b;
                    for($i = 0; $i<count($a); $i++) {
                        for($j=0; $j<count($a); $j++) {
                            $b[$i][$j]=$a[$i][$j]*$a[$j][$i];
                        }
                    }
                    for($i = 0; $i<count($a); $i++) {
                        for($j=0; $j<count($a); $j++) {
                            if($b[$i][$j] != $a[$i][$j]) {
                                $res="<p>Отношение не транзитивно!</p><br>";
                                return $res;
                            }
                        }
                    }
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

                    $res1 = validation($elem); 
                    if ($res1 == 1) {
                        $res = "<p>Данные введены верно</p><br>"; 
                      
                        echo($res); 
                        $res = reflex($elem); 
                        echo($res); 
                        $res = sim($elem); 
                        echo ($res); 
                        $res = cossim ($elem); 
                        echo ($res); 
                        $res = tranz($elem); 
                        echo ($res); 
                    }
                    else if ($res1 != 1) {
                        echo "<p>Ошибка введенных данных: ".$res1."<br><p>"; 
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
