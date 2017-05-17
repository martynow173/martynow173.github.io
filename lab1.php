<?php
include ('connection.php');	
include ('head.php'); 
?>          

            <h1 class="article">Лабораторная работа №1</h1>
            <hr class="line">
            <p class="article">Программа производит действия над двумя множествами (А и В): объединение, пересечение, симметрическая разность и дополнение (А до В).             Ввод элементов осуществляется строго (sic!)<br>
            через пробел (перечисление элементов через "," или ";" не допускается). Формат каждого элемента - ccj(где c - цифра, j - нечетная цифра).<br> В случае неправильного ввода данных программа выдаст ошибку и алгоритм не выполнится. <br>Количество элементов не ограничено.</p>
            <div id="lab">
                <form action="" method="get">	
                <form method="get">	
                    Множество А: <input type="text" name="massA" value="<?=htmlspecialchars($_GET['massA'])?>"><br>
                    Множество В: <input type="text" name="massB" value="<?=htmlspecialchars($_GET['massB'])?>"><br>
                    <input type="submit" value="Произвести действия">
                </form>

                <?php 
                function validation($a, $b) { // Проверка
                    $a = trim($a);
                    $b = trim($b);

                    $a = preg_replace ("/(\s){2,}/",' ',$a);
                    $b = preg_replace ("/(\s){2,}/",' ',$b);
                    $multA = explode(" ", $a);
                    $multB = explode(" ", $b);
                    $res = true;
                    $resA = true;
                    $resB = true;
                    for ($i = 0; $i < count($multA); $i++) { // Проверка множества А
                        if (strlen($multA[$i]) != 3 || intval($multA[$i]/2) == $multA[$i]/2) { 
                            $resA = false;
                            break;
                        }
                    }

                    for ($i = 0; $i < count($multB); $i++) { // Проверка множества В
                        if (strlen($multB[$i]) != 3 || intval($multB[$i]/2) == $multB[$i]/2) {
                            $resB = false;
                            break;
                        }
                    }

                    if ($resA == false || $resB == false) $res = false;
                    return $res;
                }

                function massOb($a, $b) { // Объединение
                    $a = trim($a);
                    $b = trim($b);
                    $a = preg_replace ("/(\s){2,}/",' ',$a);
                    $b = preg_replace ("/(\s){2,}/",' ',$b);
                    $res1 = explode(" ", $a);
                    $multB = explode(" ", $b);
                    for ($i = 0; $i < count($multB); $i++) { // Добавление к массиву А массива В (Объединение)
                        $res1[] = $multB[$i];
                    }

                    //array_unique
                    for ($i = 0; $i < count($res1); $i++) { // Убираем повторяющиеся элементы
                        if ($res1[$i] != 'bad') { // Игнорирование помеченных элементов
                            for ($j = 0; $j < count($res1); $j++) {
                                if ($i != $j) {
                                    if ($res1[$i] == $res1[$j]) $res1[$j] = 'bad'; // Элементы которые совпадают помечаем и в дальнейшем игнорируем
                                }
                            }
                            $res2[] = $res1[$i]; 
                        }
                    }

                    $res = "";
                    for ($j = 0; $j < count($res2); $j++) {
                        $res = $res.$res2[$j]." ";
                    }
                    return $res;
                }

                function massPer($a, $b) { // Пересечение
                    $a = trim($a);
                    $b = trim($b);
                    $a = preg_replace ("/(\s){2,}/",' ',$a);
                    $b = preg_replace ("/(\s){2,}/",' ',$b);
                    $multA = explode(" ",$a);
                    $multB = explode(" ",$b);

                    for ($i = 0; $i < count($multA); $i++) { // Убираем повторяющиеся элементы в А
                        if ($multA[$i] != 'bad') {
                            for ($j = 0; $j < count($multA); $j++) {
                                if ($i != $j) {
                                    if ($multA[$i] == $multA[$j]) $multA[$j] = 'bad';
                                }
                            }
                            $multA_unique[] = $multA[$i];
                        }
                    }

                    for ($i = 0; $i < count($multB); $i++) { // Убираем повторяющиеся элементы в В
                        if ($multB[$i] != 'bad') {
                            for ($j = 0; $j < count($multB); $j++) {
                                if ($i != $j) {
                                    if ($multB[$i] == $multB[$j]) $multB[$j] = 'bad';
                                }
                            }
                            $multB_unique[] = $multB[$i];
                        }
                    }

                    for ($i = 0; $i < count($multA_unique); $i++) { // Ищем пересечения
                        $a = 0;
                        for ($j = 0; $j < count($multB_unique); $j++) {
                            if ($multA_unique[$i] == $multB_unique[$j]) $a = 1; // Находим и помечаем
                        }
                        if ($a == 1) $res1[] = $multA_unique[$i];
                    }

                    if ($res1[0]) {
                        $res = "";
                        for ($j = 0; $j < count($res1); $j++) {
                            $res = $res.$res1[$j]." ";
                        }
                    } else $res = "Пустое множество!";
                    return $res;
                }

                    function massRaz($a, $b) { // Разность
                        $a = trim($a);
                        $b = trim($b);
                        $a = preg_replace ("/(\s){2,}/",' ',$a);
                        $b = preg_replace ("/(\s){2,}/",' ',$b);
                        $multA = explode(" ",$a);
                        $res1 = $multA;
                        $multB = explode(" ",$b);

                        for ($i = 0; $i < count($multA); $i++) { // Убираем повторяющиеся элементы в А
                            if ($multA[$i] != 'bad') {
                                for ($j = 0; $j < count($multA); $j++) {
                                    if ($i != $j) {
                                        if ($multA[$i] == $multA[$j]) $multA[$j] = 'bad';
                                    }
                                }
                                $multA_unique[] = $multA[$i];
                            }
                        }

                        for ($i = 0; $i < count($multB); $i++) { // Убираем повторяющиеся элементы в В
                            if ($multB[$i] != 'bad') {
                                for ($j = 0; $j < count($multB); $j++) {
                                    if ($i != $j) {
                                        if ($multB[$i] == $multB[$j]) $multB[$j] = 'bad';
                                    }
                                }
                                $multB_unique[] = $multB[$i];
                            }
                        }

                        for ($i = 0; $i < count($multB_unique); $i++) { // Объединяем новые массивы
                            $res1[] = $multB_unique[$i];
                        }

                        for ($i = 0; $i < count($res1); $i++) { // Ищем разность
                            $err = 0;
                            for ($j = 0; $j < count($res1); $j++) {
                                if ($j != $i) {
                                    if ($res1[$i] == $res1[$j]) $err++; // То, что нам не нужно (пересечение)
                                }	
                            }
                            if ($err == 0) $raz[] = $res1[$i];	
                        }

                        if ($raz[0]) {
                            $res = "";
                            for ($j = 0; $j < count($raz); $j++) {
                                $res = $res.$raz[$j]." ";
                            }
                        } else $res = "Пустое множество!";
                        return $res;
                    }

                    function massDop($a, $b) { // Дополнение А до В
                        $a = trim($a);
                        $b = trim($b);
                        $a = preg_replace ("/(\s){2,}/",' ',$a);
                        $b = preg_replace ("/(\s){2,}/",' ',$b);
                        $multA = explode(" ",$a);
                        $multB = explode(" ",$b);

                        for ($i = 0; $i < count($multB); $i++) { // Ищем то, чего не хватает в А, чтобы получилось объединение А и В
                            $err = 0;
                            for ($j = 0; $j < count($multA); $j++) {
                                if ($multB[$i] == $multA[$j]) $err++; // То, что нам не нужно
                            }
                            if ($err == 0) $dop[] = $multB[$i];

                        }

                        for ($i = 0; $i < count($dop); $i++) { // Убираем повторения
                            if ($dop[$i] != 'bad') {
                                for ($j = 0; $j < count($dop); $j++) {
                                    if ($i != $j) {
                                        if ($dop[$i] == $dop[$j]) $dop[$j] = 'bad';
                                    }
                                }
                                $dop1[] = $dop[$i];
                            }
                        }


                        if ($dop1[0]) {
                            $res = "";
                            for ($j = 0; $j < count($dop1); $j++) {
                                $res = $res.$dop1[$j]." ";
                            }
                        } else $res = "Пустое множество!";
                        return $res;
                    }
                if (isset($_GET['massA']) && isset($_GET['massB'])) {
                    $massA = htmlspecialchars($_GET['massA']);
                    $massB = htmlspecialchars($_GET['massB']);
                    $res = validation ($massA, $massB);

                    if ($res == true) {
                        echo '<p>Элементы введены верно<br><br>
                        Множество A: '.$massA.'<br>
                        Множество B: ' .$massB.'<br><br>
                        Объединение двух множеств:<br>
                        '.massOb($massA,$massB).'<br><br>
                        Пересечение двух множеств:<br>
                        '.massPer($massA,$massB).'<br><br>
                        Симметрическая разность множества А и множества В:<br>
                        '.massRaz($massA,$massB).'<br><br>
                        Дополнение от A до B:<br>'.massDop($massA,$massB).'<br></p>';				
                    } else echo "<p style='color: red; font-size: 30px;'>Проверьте введенные данные!</p>";
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
