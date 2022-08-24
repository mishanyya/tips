<?php
/**
Template Name:страница для расчета факториала
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
function factorial1(){
let max=document.getElementsByClassName('forOutputData')[0].value;
let answer=1;//начальное значение факториала
let x;//промежуточная величина для расчета факториала
max=Number(max);
for(x=1;x<=max;x++){
answer=answer*x;
}
let RegExp=/^[\d]+$/;//проверка на только цифры с начала и до конца

if((RegExp.test(max)==false)|(max<0)){
  answer="Введено некорректное значение";
}
else {
  if ((answer <= Number.MIN_VALUE)|(answer >= Number.MAX_VALUE)) {
    answer="К сожалению, расчет с таким значением невозможен!";
  }
else {
  answer="Факториал числа "+max+" равен "+answer;
}
}
document.getElementsByClassName('forOutputData')[1].textContent=answer;
}
</script>
<h3>Расчет факториала для целого положительного числа</h3>
<div class="input-group mb-2">
  <div class="input-group-prepend">
      <span class="input-group-text">Целое положительное начальное значение</span>
    </div>
    <input type='text' placeholder="" class='forOutputData form-control'>
</div>

<div class="input-group mb-2">
  <div class="forOutputData  alert alert-success" role="alert">Здесь будет результат расчета<!-- вывод сообщения --></div>
</div>

<input type="button" class="btn btn-outline-info" value="нажать для расчета факториала" onclick="factorial1()"/>


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
wp_nav_menu( array(
'theme_location'  => 'pages',// Расположение меню. Default: ''
'menu'            => '',//id, slug или название меню. Default: ''
'container'       => 'nav', // Основной контейнер меню, в него помещается <ul>. Either <div> or <nav>. Default: <div>
//Если он не нужен, то ставим так: container => false
'container_class' => '',// class основного контейнера. Default: menu-{menu slug}-container
'container_id'    => '',// id основного контейнера. Default: ''
'menu_class'      => 'nav flex-column  nav-pills ',// class <ul> этого меню. Default: menu
'menu_id'         => '', // id <ul> этого меню. Default: menu-{menu slug}
'depth'           => 0,     //Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
'echo'            => true,//Выводить на экран (true) или возвратить для обработки (false). Default: true
'fallback_cb'     => 'wp_page_menu',//Функция, срабатывающая, если никакое меню не найдено.если меню нет, установить '', Default: wp_page_menu
'before'          => '',//Текст перед <a> в меню. Default: ''
'after'           => '',//Текст после </a> в меню. Default: ''
'link_before'     => '',//Вставить текст после <a> в меню. Default: ''
'link_after'      => '',//Добавить текст перед </a> в меню. Default: ''
'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',//Если нужно <ul>, указывается шаблон. Если не нужно, указать '%3$s', но не оставлять пустым ''!!!
//Default: '<ul id="%1$s" class="%2$s">%3$s</ul>'
) );
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
           <?php //вывод меню на экран
           wp_nav_menu( array(
           'theme_location'  => 'pages',// Расположение меню. Default: ''
           'menu'            => '',//id, slug или название меню. Default: ''
           'container'       => 'nav', // Основной контейнер меню, в него помещается <ul>. Either <div> or <nav>. Default: <div>
           //Если он не нужен, то ставим так: container => false
           'container_class' => '',// class основного контейнера. Default: menu-{menu slug}-container
           'container_id'    => '',// id основного контейнера. Default: ''
           'menu_class'      => 'nav flex-column nav-pills',// class <ul> этого меню. Default: menu
           'menu_id'         => '', // id <ul> этого меню. Default: menu-{menu slug}
           'depth'           => 0,     //Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
           'echo'            => true,//Выводить на экран (true) или возвратить для обработки (false). Default: true
           'fallback_cb'     => 'wp_page_menu',//Функция, срабатывающая, если никакое меню не найдено.если меню нет, установить '', Default: wp_page_menu
           'before'          => '',//Текст перед <a> в меню. Default: ''
           'after'           => '',//Текст после </a> в меню. Default: ''
           'link_before'     => '',//Вставить текст после <a> в меню. Default: ''
           'link_after'      => '',//Добавить текст перед </a> в меню. Default: ''
           'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',//Если нужно <ul>, указывается шаблон. Если не нужно, указать '%3$s', но не оставлять пустым ''!!!
           //Default: '<ul id="%1$s" class="%2$s">%3$s</ul>'
           ) );
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



    <h3>Расчет факториала для целого положительного числа</h3>
    <div class="input-group mb-2">
      <div class="input-group-prepend">
          <span class="input-group-text">Целое положительное начальное значение</span>
        </div>
        <input type='text' placeholder="" class='forOutputDataForSmallScreen form-control'  inputmode='numeric'>
    </div>

    <div class="input-group mb-2">
      <div class="forOutputDataForSmallScreen  alert alert-success" role="alert">Здесь будет результат расчета<!-- вывод сообщения --></div>
    </div>


    <script>
    function factorialforsmallscreen(){
    let max=document.getElementsByClassName('forOutputDataForSmallScreen')[0].value;
    let answer=1;//начальное значение факториала
    let x;//промежуточная величина для расчета факториала
    max=Number(max);
    for(x=1;x<=max;x++){
    answer=answer*x;
    }
    let RegExp=/^[\d]+$/;//проверка на только цифры с начала и до конца

    if((RegExp.test(max)==false)|(max<0)){
      answer="Введено некорректное значение";
    }
    else {
      if ((answer <= Number.MIN_VALUE)|(answer >= Number.MAX_VALUE)) {
        answer="К сожалению, расчет с таким значением невозможен!";
      }
    else {
      answer="Факториал числа "+max+" равен "+answer;
    }
    }
    document.getElementsByClassName('forOutputDataForSmallScreen')[1].textContent=answer;
    }
    </script>

  <input type="button" class="btn btn-outline-info" value="нажать для расчета факториала" onclick="factorialforsmallscreen()"/>

    </div>
</div>


  <!-- Конец своего кода -->
</div>

</div>
<?php get_footer();  ?>
