<?php
include ('connection.php');	
include ('head.php'); 
?>          
            <h1 class="article">Лабораторная работа №5</h1>
            <hr class="line">
            <p class="article">	Программа составляет бинарную матрицу достижимости для такой же смежной матрицы, вводимой в текстовое поле.Ввод элемнетов строки осуществляется через пробел, переход на следующую строки - через обычный перенос windows (клавиша enter)</p>
            <div id="lab">
                <form action="" method="get">	
                <form method="get">	
                    Введите матрицу nxn:<br><textarea rows="20" cols="50" name="matrix"><?=htmlspecialchars($_GET['matrix'])?></textarea><br>
	                <input type="submit" value="Проверить">
                    <br>
                </form>
                <?php
                function validation($elem) { 
                    $res = 1; 
                    for ($i = 0; $i < count($elem); $i++) { 
                        if (count($elem) != count($elem[$i])) {
                            $res = '<p>Матрица не квадратная</p>'; 
                            return $res;

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
                function dost ($a) { //ищем матрицу достижимости: возводиим исходную смежности в степень пока степень не будет равна количеству ребер и проводим между полученными матрциами операцию дизъюнкции
                    $diz;
                    $step;
                    $t = false;
                    $tmp;
                    for($n=0;$n<count($a);$n++){	
                        for ($i=0;$i<count($a);$i++) {
                            if($a[$n][$i]==1) {
                                $diz[$n][$i]=1;
                            }
                            else {
                                $diz[$n][$i]=0;
                            }
                        }
                    }



                    for($n=0; $n<count($a);$n++){	
                        for($i=0; $i<count($a); $i++) { //возведение в булеву степень
                            for($j=0; $j<count($a); $j++) {
                                if($a[$i][$j] == 1 && $a[$j][$n] == 1) {
                                    $t = true;
                                }
                            }
                            if($t == true) {
                                $step[$i][$n] = 1;
                                $diz[$i][$n] = 1;
                            }
                            else {
                                $step[$i][$n] = 0;

                            }
                            $t = false;
                        }



                        for($i=0; $i<count($a); $i++) { 
                            for($j=0; $j<count($a); $j++) {
                                if($step[$i][$j] == 1 && $step[$j][$n] == 1) {
                                    $t = true;
                                }
                            }
                            if($t == true) {
                                $tmp[$i][$n] = 1;
                                $diz[$i][$n] = 1;

                            }
                            else {
                                $tmp[$i][$n] = 0;
                            }
                            $t = false;



                        }



                    }	

                    return $diz;
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
                        echo "<p>Матрица достижимости</p>";
                        $res = dost($elem); 
                        $t="";
                        for ($i = 0; $i < count($elem); $i++){ 
                            for($j=0; $j < count($elem[$i]); $j++) { 
                                $t.=$res[$i][$j]." ";
                            }
                            $t.= "<br>";
                        }
                        echo "<p>".$t."</p>";
                    }

                    else if ($res1 != 1) {
                        echo "<p>Ошибка введенных данных: ".$res1."</p><br>"; 
                        echo " ";
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