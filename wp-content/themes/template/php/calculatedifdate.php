<?php
//echo "php ajax работает!!!";

//получение переменной из JS файла
$param1=$_GET['param1'];
$param2=$_GET['param2'];

//дата в формате 2009-10-13
$origin = date_create($param1);
$target = date_create($param2);
$interval = date_diff($origin, $target);


//$interval->y годы
//$interval->m месяцы
//$interval->d д

//echo $interval->format('%a');//Вывод количества дней
echo $interval->y.'-'.$interval->m.'-'.$interval->d;//Вывод количества лет, месяцев, дней
?>
