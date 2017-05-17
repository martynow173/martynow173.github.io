<?php
include ('connection.php');	
include ('head.php'); 
?>          
            <h1 class="article">Лабораторная работа №4</h1>
            <hr class="line">
            <p class="article">	Программа осуществляет поиск длины и порядка следования вершин кратчайшего пути в графе от заданной точки отправления к конечной. Ввод графа осуществляется в виде матрицы весов. После нажатия кнопки пользователь получит реультат.</p>
            <div id="lab">
                <form action="" method="get">	
                <form method="get">	
                    Введите матрицу nxn:<br><textarea rows="20" cols="50" name="matrix"><?=htmlspecialchars($_GET['matrix'])?></textarea><br><br>
	                Точка отправления: <input type="text" name="u" value="<?=htmlspecialchars($_GET['u'])?>"><br>
	                Конечная точка маршрута: <input type="text" name="v" value="<?=htmlspecialchars($_GET['v'])?>"><br>
                    <br>
	                <input type="submit" value="Проверить">	               
                </form>
                <?php
                function sim ($a) { //симметричность (сим. относительно г. диаг.)
                    $res = 1;
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
                                    $res = 0;
                                    return $res;
                            }
                        }
                    }


                    return $res;
                }

                function validation($elem) { 
                    $res = 1; 
                    for ($i = 0; $i < count($elem); $i++) { 
                        if (count($elem) != count($elem[$i])) {
                            $res = 'Матрица не квадратная'; 
                            return $res;
                        }
                    } 

                    if (count($elem) == 1 && $elem[0][0] == NULL){
                        $res = 'Поле пустое'; 
                        return $res;
                    }
                    $res = sim($elem);
                    for($i=0;$i<count($elem);$i++) {
                        for($j=0;$j<count($elem);$j++) {
                            if (is_numeric($elem[$i][$j]) == false){
                                $res = 'Расстояние указывается в числах!';
                                return $res;
                            }
                        }
                    }
                    $j = 0;
                    for ($i = 0; $i<count($elem); $i++) {
                        if ($elem[$i][$j] != 0) {
                            $res = "На главной диагонали обнаружено значение, отличное от 0";
                            return $res;
                        }
                        $j++;
                    }


                    return $res; 
                }





                if (isset($_GET['matrix'])) { 
                    $matrix = htmlspecialchars (trim($_GET['matrix'])); 
                    $matrix = preg_replace('# {2,}#', ' ', $matrix); 
                    $matrix = preg_replace('#(?:\r?\n){2,}#', "\r\n", $matrix); 
                    $mas = explode("\r\n", $matrix); 
                    $start = $_GET['u'];
                    $end = $_GET['v'];
                    for ($i = 0; $i < count($mas); $i++) { 
                        $mas[$i] = trim($mas[$i]); 
                        $elem[$i] = explode (" ",$mas[$i]); 
                    } 
                    $d;
                    $next;
                    $res;
                    $h;
                    $res = validation($elem); 
                    if ($res != 1) {
                        echo "<p>Ошибка введенных данных </p><br>"; 
                    }
                    elseif($start==$end){
                        $res = "<p>Нельзя проложить маршрут из одной вершины в нее же!</p>";
                        echo $res;
                    }
                    else { 
                        $res = "<p>Данные введены верно</p><br>"; 

                        echo($res); 

                        for ($i=0; $i<count($elem); $i++) {
                            for ($j=0; $j<count($elem[$i]); $j++) {
                                $d[$i][$j] = $elem[$i][$j];			
                            }
                        }
                        for ($i = 0; $i<count($d);$i++) { //заполняем матрицу истории путей
                            for ($j = 0; $j<count($d);$j++) { 		
                                if ($d[$i][$j] != 0) {
                                    $h[$i][$j] = $j; 
                                }
                                else {
                                    $h[$i][$j] = 0; 
                                }
                            }
                        }


                        for ($i=0; $i<count($d); $i++) {//0 означает, что пути нет - по алгоритму ф.у. заменяем 0-ли большими числами
                            for ($j=0; $j<count($d); $j++) {
                                if ($d[$i][$j] == 0) {
                                    $d[$i][$j] = 9999;
                                }

                            }
                        }


                        for ($i = 0; $i<count($d);$i++) {
                            for ($u = 0; $u<count($d);$u++) {  //алгоритм флойда-уоршэлла
                                for ($v = 0;$v<count($d);$v++) { 
                                    if (($d[$u][$i] + $d[$i][$v]) < $d[$u][$v]) {
                                        $d[$u][$v] = $d[$u][$i] + $d[$i][$v];
                                        $h[$u][$v] = $h[$u][$i];
                                    }
                                }
                            }
                        }

                        echo "<p>Кратчайший путь из вершины " .$start. " в вершину " .$end. " равен: " .$d[$start-1][$end-1]. "</p><br>";
                        echo "<p>Порядок прохождения вершин при следовании оптимальному (самому короткому) маршруту:<br></p>";
                        $res = "";
                        echo "<p>".$start;
                        echo "->";
                        for ($j=1;$j<$end;$j++) {
                            if($start != $j){
                                $start = $h[$start][$j];
                                $res.= $start . "->";
                            }
                        }		
                        echo $res."".$end."</p><br>";
                     
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