<?php
/**
Template Name:страница для расчета по теории вероятности
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

// Создание объектов класса с параметрами для конструктора
var game = new Game();
function gameplay(){
  let a=document.getElementsByClassName('forOutputData')[0].value;
  let b=document.getElementsByClassName('forOutputData')[1].value;
  document.getElementsByClassName('forOutputData')[2].textContent=game.oneChance(a,b);
  //game.oneChance(a,b);
}

// Создание объектов класса с параметрами для конструктора
var game1 = new Game();
function gameplay1(){
 let a=document.getElementsByClassName('forOutputData')[3].value;
  let b=document.getElementsByClassName('forOutputData')[4].value;
  let a1=document.getElementsByClassName('forOutputData')[5].value;
  let b1=document.getElementsByClassName('forOutputData')[6].value;
  document.getElementsByClassName('forOutputData')[7].textContent=game1.doubleChance(a,b,a1,b1);
}
</script>

<h3>Расчет шанса выбора требуемой комбинации в одном объекте</h3>
<div class="input-group mb-2">
  <div class="input-group-prepend">
      <span class="input-group-text">Количество выбираемых объектов</span>
    </div>
    <input type='text' placeholder="" class='forOutputData form-control'>
</div>

<div class="input-group mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text">Общее количество объектов</span>
  </div>
  <input type='text' placeholder="" class='forOutputData form-control'>
</div>

<div class="input-group mb-2">
  <div class="forOutputData  alert alert-success" role="alert">Здесь будет результат расчета<!-- вывод сообщения --></div>
</div>


<input type="button" class="btn btn-outline-info" value="нажать для расчета шанса" onclick="gameplay()"/>

<hr/>
<h3>Расчет шанса выбора требуемых комбинаций в двух объектах</h3>
<label>Поле 1</label>

<div class="input-group mb-2">
  <div class="input-group-prepend">
      <span class="input-group-text">Количество выбираемых объектов в поле 1</span>
    </div>
    <input type='text' placeholder="" class='forOutputData form-control'>
</div>


<div class="input-group mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text">Общее количество объектов в поле 1</span>
  </div>
  <input type='text' placeholder="" class='forOutputData form-control'>
</div>

<label>Поле 2</label>

<div class="input-group mb-2">
  <div class="input-group-prepend">
      <span class="input-group-text">Количество выбираемых объектов в поле 2</span>
    </div>
    <input type='text' placeholder="" class='forOutputData form-control'>
</div>


<div class="input-group mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text">Общее количество объектов в поле 2</span>
  </div>
  <input type='text' placeholder="" class='forOutputData form-control'>
</div>

<div class="input-group mb-2">
  <div class="forOutputData  alert alert-success" role="alert">Здесь будет результат расчета<!-- вывод сообщения --></div>
</div>

<input type="button" class="btn btn-outline-info" value="нажать для расчета шанса" onclick="gameplay1()"/>







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
<h3>Расчет шанса выбора требуемой комбинации в одном объекте</h3>

<div class="input-group mb-2">
  <div class="input-group-prepend">
      <span class="input-group-text">Количество выбираемых объектов</span>
    </div>
    <input type='text' placeholder="" class='forDataForSmallScreen form-control' inputmode='numeric'>
</div>

<div class="input-group mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text">Общее количество объектов</span>
  </div>
  <input type='text' placeholder="" class='forDataForSmallScreen form-control' inputmode='numeric'>
</div>

<div class="input-group mb-2">
  <div class="forDataForSmallScreen  alert alert-success" role="alert">Здесь будет результат расчета<!-- вывод сообщения --></div>
</div>

          <script>
          // Создание объектов класса с параметрами для конструктора
          var game = new Game();
          function gameplayforsmallscreen(){
            let a=document.getElementsByClassName('forDataForSmallScreen')[0].value;
            let b=document.getElementsByClassName('forDataForSmallScreen')[1].value;
            document.getElementsByClassName('forDataForSmallScreen')[2].textContent=game.oneChance(a,b);
            //game.oneChance(a,b);
          }

          // Создание объектов класса с параметрами для конструктора
          var game1 = new Game();
          function gameplayforsmallscreen1(){
           let a=document.getElementsByClassName('forDataForSmallScreen')[3].value;
            let b=document.getElementsByClassName('forDataForSmallScreen')[4].value;
            let a1=document.getElementsByClassName('forDataForSmallScreen')[5].value;
            let b1=document.getElementsByClassName('forDataForSmallScreen')[6].value;
            document.getElementsByClassName('forDataForSmallScreen')[7].textContent=game1.doubleChance(a,b,a1,b1);
          //  game1.doubleChance(a,b,a1,b1);
          }</script>


    <input type="button" class="btn btn-outline-info" value="нажать для расчета шанса" onclick="gameplayforsmallscreen()"/>

  </div>
  </div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
<!-- Сюда можно включить свой код -->
<hr/>
<h3>Расчет шанса выбора требуемых комбинаций в двух объектах</h3>

<label>Поле 1</label>

<div class="input-group mb-2">
  <div class="input-group-prepend">
      <span class="input-group-text">Количество выбираемых объектов в поле 1</span>
    </div>
    <input type='text' placeholder="" class='forDataForSmallScreen form-control' inputmode='numeric'>
</div>


<div class="input-group mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text">Общее количество объектов в поле 1</span>
  </div>
  <input type='text' placeholder="" class='forDataForSmallScreen form-control' inputmode='numeric'>
</div>

<label>Поле 2</label>

<div class="input-group mb-2">
  <div class="input-group-prepend">
      <span class="input-group-text">Количество выбираемых объектов в поле 2</span>
    </div>
    <input type='text' placeholder="" class='forDataForSmallScreen form-control' inputmode='numeric'>
</div>


<div class="input-group mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text">Общее количество объектов в поле 2</span>
  </div>
  <input type='text' placeholder="" class='forDataForSmallScreen form-control' inputmode='numeric'>
</div>

<div class="input-group mb-2">
  <div class="forDataForSmallScreen  alert alert-success" role="alert">Здесь будет результат расчета<!-- вывод сообщения --></div>
</div>


          <script>
          // Создание объектов класса с параметрами для конструктора
          var game = new Game();
          function gameplayforsmallscreen(){
            let a=document.getElementsByClassName('forDataForSmallScreen')[0].value;
            let b=document.getElementsByClassName('forDataForSmallScreen')[1].value;
            document.getElementsByClassName('forDataForSmallScreen')[2].textContent=game.oneChance(a,b);
            //game.oneChance(a,b);
          }

          // Создание объектов класса с параметрами для конструктора
          var game1 = new Game();
          function gameplayforsmallscreen1(){
           let a=document.getElementsByClassName('forDataForSmallScreen')[3].value;
            let b=document.getElementsByClassName('forDataForSmallScreen')[4].value;
            let a1=document.getElementsByClassName('forDataForSmallScreen')[5].value;
            let b1=document.getElementsByClassName('forDataForSmallScreen')[6].value;
            document.getElementsByClassName('forDataForSmallScreen')[7].textContent=game1.doubleChance(a,b,a1,b1);
          //  game1.doubleChance(a,b,a1,b1);
          }</script>


    <input type="button" class="btn btn-outline-info" value="нажать для расчета шанса" onclick="gameplayforsmallscreen1()"/>

  </div>
  </div>


  <!-- Конец своего кода -->



  </div>

  </div>
  <?php get_footer();  ?>
