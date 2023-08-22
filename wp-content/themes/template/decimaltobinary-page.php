<?php
/**
Template Name:страница для перевода числа из десятичной в двоиную форму
 * @subpackage template
 */
get_header(); ?>
</div><!--закрытие тега container-->

<div class="container"><!--начало основного container of body-->
<div class="d-none d-xl-block"><!--начало блока для больших экранов,это экран ноутбука или компьютера-->
  <div class="row"><!--начало основного row of body-->
    <div class="col-xl-9 bg-light"><!--начало основной части без сайдбара-->
     <div class="row"><!--начало основной части row-->
      <div class="col-xl-12"><!--начало основной части div col--12-->


          <?php if ( have_posts() ) while ( have_posts() ) : the_post();  ?>
          <h1 class="text-center"><?php the_title(); ?></h1>
          <p>
            <?php

             the_content(); ?>
          </p>

          <?php
          //здесь и далее можно прописать свой код на php
          //можно дописать код на javascript
          ?>
<!-- Сюда можно включить свой код -->
<script>
//функция добавить нули к массиву


function divide(){
var original=document.getElementById('value10').value;
let RegExp=/^[\-]?[\d]+$/;//проверка на только цифры с начала и до конца

if(RegExp.test(original)==false){//если не число
document.getElementById('value11').innerHTML="Введено некорректное значение";
}
else{

var sign;//знак вводимого числа
if(original<0){//если число отрицательное
  sign=1;
  original = original.substr(1);//убираем символ знака числа
}
  else {//если число положительное или равно 0
    sign=0;
}

var answer=[];     // массив для помещения в него перевернутого ответа

var q=0;
do{
//получить остаток от деления
var ostatok=original%2;
answer[q]=ostatok;             //добавить остаток в переменную вывода
q++; //увеличить номер элемента массива

original/=2;                 //разделить исходное значение на 2 и сделать ответ исходным значением
var qwerty=original;         //целый или дробный результат поместить в переменную
original=Math.floor(qwerty);       //округляем до меньшего целого значения
}while(original!=0)


let len=answer.length;
let addzero;
if(len<=8){
  addzero=8-len;
}
else if (len>8&&len<=16) {
  addzero=16-len;
}
else if (len>16&&len<=32) {
  addzero=32-len;
}
else if (len>32) {
  addzero=64-len;
}

for(let i=1;i<=addzero;i++){//добавить символы 0 в массив
  answer.push("0");
  }

  //замена нулей на единицы и наоборот для отрицательных значений
  if(sign==1){
    for(let i=0;i<answer.length;i++){

      if(answer[i]==1){
        answer[i]=0;
      }
      else if(answer[i]==0){
        answer[i]=1;
      }
      }
      //увеличение на 1
      var b=1;
      var j=0;
do{
  answer[j]+=b;
  //alert(answer[j]);
   if(answer[j]==2){
      b=1;
      answer[j]=0;
      j++;
    }
    else {
      b=0;
    }
}while(b==1);
  }

let rev=''; //строка, в который добавляются символы

let aa=answer.length; //номер последнего символа в обрабатываемой строке/переменной
aa--;

//вывод элементов массива
for(xx=aa;xx>=0;xx--){
rev+=answer[xx];
}
document.getElementById('value11').innerHTML=rev;
}
}
</script>

<h3>Калькулятор перевода положительного числа в двоичную форму</h3>
<div class="input-group mb-2">
           <div class="input-group-prepend">
               <span class="input-group-text">Десятичное обычное число</span>
             </div>
             <input type="text" placeholder="" id="value10" class="Debt form-control">
</div>

<div class="input-group mb-2">
  <div  id="value11" class="forOutputData  alert alert-success" role="alert">Здесь будет результат расчета<!-- вывод сообщения --></div>
</div>

<input type="button" class="btn btn-outline-info" value="нажать для перевода в двоичную форму" onclick="divide()"/>

  <!-- Конец своего кода -->
<?php endwhile; ?>
</div>
</div>
</div>
<?php /*get_sidebar(); */ /*убрали стандартный сайдбар справа*/?>
<!-- Нестандартный сайдбар с меню для формул -->
<div class="col-xl-3  bg-light border-left">
<?php if ( is_active_sidebar( 'right_side' ) ) : ?>
	<div id="" class="p-1 text-danger"><!--В этот <div> помещается сайдбар, class и id можно установить по желанию-->
		<?php dynamic_sidebar( 'right_side' ); ?><!--В скобки помещается id сайдбара из functions.php-->
	</div>
<?php endif; ?>

<?php
//меню для сайдбара страниц-калькуляторов
include "menustyleforcalculatepagessidebar.php";
?>


<div class="fixed-bottom position-relative border-top">
<!--	<h4 class="text-center text-secondary"></h4>-->
</div>
</div>
<!-- Конец нестандартного сайдбара с меню для формул -->
</div>
</div><!--конец блока для средних и больших экранов-->






<div class="d-block d-xl-none"><!--начало блока для маленьких экранов,это экран мобильника или планшета-->
     <div class="row">
       <div class="dropdown mx-auto mb-2">
         <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Меню для выбора калькулятора
         </button>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
           <?php
           //меню для сайдбара страниц-калькуляторов
           include "menustyleforcalculatepagessidebar.php";
           ?>
         </div>
       </div>
  </div>

  <div class="row">


  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-light justify-content-center">
       <?php if ( have_posts() ) while ( have_posts() ) : the_post();  ?>
       <p class="">
         <?php the_content(); ?>
       </p>
       <!-- Сюда можно включить свой код -->
  <!-- Конец своего кода -->
       <?php endwhile; ?>

  </div>
  </div>





  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <!-- Сюда можно включить свой код -->



  <h3>Калькулятор перевода числа в двоичную форму</h3>
    <div class="input-group mb-2">
      <div class="input-group-prepend">
          <span class="input-group-text">Десятичное обычное число</span>
        </div>
        <input type='text' placeholder="" id="value10s" class='forOutputDataForSmallScreen form-control'  inputmode='numeric'>
    </div>

    <div class="input-group mb-2">
      <div  id="value11s" class="forOutputDataForSmallScreen  alert alert-success" role="alert">Здесь будет результат расчета<!-- вывод сообщения --></div>
    </div>

    <script>
    function divideforsmallscreen(){
    var original=document.getElementById('value10s').value;

    let RegExp=/^[\-]?[\d]+$/;//проверка на только цифры с начала и до конца

    if(RegExp.test(original)==false){//если не число
    document.getElementById('value11s').innerHTML="Введено некорректное значение";
    }
    else if(original<0){//если число отрицательное
      document.getElementById('value11s').innerHTML="Введено отрицательное число!";
    }
    else {
    var answer='';     // ='' показывает, что переменная - просто строка, а не число!

    do{
    var ostatok=original%2;      //получить остаток от деления
    answer+=ostatok;             //добавить остаток в переменную вывода
    original/=2;                 //разделить исходное значение на 2 и сделать ответ исходным значением
    var qwerty=original;         //целый или дробный результат поместить в переменную
    original=Math.floor(qwerty)       //округляем до меньшего целого значения
    }while(original!=0)
    //document.getElementById('value11').innerHTML=answer;




    //переворот:
    let rev=''; //строка, в который добавляются символы
    let arr=[];              //создание массива для перевернутого значения

    let x=answer.length; //номер последнего символа в обрабатываемой строке/переменной
    x--;
    let y=0;

    for(x;x>=0;x--){
    arr[y]=answer[x];
    y++;
    rev+=answer[x];
    }

    document.getElementById('value11s').innerHTML=rev;
    }}
    </script>


  <input type="button" class="btn btn-outline-info" value="нажать для перевода в двоичную форму" onclick="divideforsmallscreen()"/>

    </div>
</div>


  <!-- Конец своего кода -->
</div>

</div>
<?php get_footer();  ?>
