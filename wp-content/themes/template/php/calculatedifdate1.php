<?php
//echo "php ajax работает!!!";

//получение переменной из JS файла
//$param1=$_GET['param1'];
//echo $param1;

/*foreach ($param1 as &$value) {
  echo $value;
}*/

/*
//дата в формате 2009-10-13
$origin = date_create($param1);
$target = date_create($param2);
$interval = date_diff($origin, $target);*/


//$interval->y годы
//$interval->m месяцы
//$interval->d д

//echo $interval->format('%a');//Вывод количества дней
//echo $interval->y.'-'.$interval->m.'-'.$interval->d;//Вывод количества лет, месяцев, дней


//////////////////////////////////////////////////////////////////
$arr = $_POST['array2'];

$lenarr=count($arr);//длина массива
$dd=0;
$mm=0;
$yy=0;


for($i=0;$i<$lenarr;$i++){
  //разделить строку по разделителю '-'
  $arr1 = explode('-', $arr[$i]);

  // в элементах $arr1[0] и $arr1[1] содержатся две даты
  $arr11 = explode('.', $arr1[0]);
  $arr12 = explode('.', $arr1[1]);

  //убираем пробелы из чисел
  $arr21=trim($arr11[2]).'-'.trim($arr11[1]).'-'.trim($arr11[0]);
  $arr22=trim($arr12[2]).'-'.trim($arr12[1]).'-'.trim($arr12[0]);


  //дата в формате 2009-10-13
  $origin = date_create($arr21);
  $target = date_create($arr22);
  $interval = date_diff($origin, $target);


  $dd=$interval->d+$dd;
  $mm=$interval->m+$mm;
  $yy=$interval->y+$yy;

if($dd>=30){
  $dd=$dd-30;
  $mm=$mm+1;
}
if($mm>=12){
  $mm=$mm-12;
  $yy=$yy+1;
}


}

echo $yy.'-'.$mm.'-'.$dd;//Вывод количества лет, месяцев, дней

//$interval->y годы
//$interval->m месяцы
//$interval->d д

//echo $interval->format('%a');//Вывод количества дней
//echo $interval->y.'-'.$interval->m.'-'.$interval->d;//Вывод количества лет, месяцев, дней
//echo $arr21.'+'.$arr22;



//////////////////////////////////////////////////////////////////////////////////






?>
