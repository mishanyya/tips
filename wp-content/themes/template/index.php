<?php
/**
 * @subpackage template
 */

get_header(); ?>
</div><!--закрытие тега container раздела header-->
<div class="container"><!--начало основного container of body-->

<div class="d-none d-xl-block"><!--начало блока для больших экранов,это экран ноутбука или компьютера-->
  <div class="row"><!--начало основного row of body-->
    <div class="col-xl-9 bg-light"><!--начало основной части без сайдбара-->
     <div class="row"><!--начало основной части row-->
					<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
					<h3 class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><!--Заголовок постов-->
					<?php /*the_time('F j, Y');*/ ?><!--показывает дату постов-->
					<?php /*if ( has_post_thumbnail() ) { the_post_thumbnail(); }*/?><!--Миниатюра поста-->
					<?php /*the_content('');*/ ?><!--Содержание постов-->
					<?php endwhile;
				/*else: echo '<h2>Извините, ничего не найдено...</h2>';*/ endif;  ?><!--Если нет постов-->
       </div><!--окончание основной части row-->
    </div><!--окончание основной части без сайдбара-->

      <?php get_sidebar();  ?><!--подключение сайдбара-->
  </div><!--окончание основного row of body-->

  <div class="row bg-light border-top"><!--начало дополнительной части row для пагинации-->
	 <?php
include "pagination.php";
   ?>
		</div><!--окончание дополнительной части row для пагинации-->

</div><!--конец блока для средних и больших экранов-->




<div class="d-block d-sm-none"><!--начало блока для маленьких экранов,это экран мобильника-->
<div class="row"><!--начало основного row of body-->
    <div class="bg-light"><!--начало основной части без сайдбара-->
					<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
					<h3 class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><!--Заголовок постов-->
					<?php /*the_time('F j, Y');*/ ?><!--показывает дату постов-->
					<?php /*if ( has_post_thumbnail() ) { the_post_thumbnail(); }*/?><!--Миниатюра поста-->
					<?php /*the_content('');*/ ?><!--Содержание постов-->
					<?php endwhile;
				/*else: echo '<h2>Извините, ничего не найдено...</h2>';*/ endif;  ?><!--Если нет постов-->
    </div><!--окончание основной части без сайдбара-->
  </div><!--окончание основного row of body-->

  <div class="row bg-light border-top"><!--начало дополнительной части row для пагинации-->
    <?php
 include "pagination.php";
    ?>
		</div><!--окончание дополнительной части row для пагинации-->
</div><!--конец блока для маленьких экранов-->

<div class="d-none d-sm-block d-xl-none"><!--начало блока для маленьких экранов,это экран  планшета-->
<div class="row"><!--начало основного row of body-->
    <div class="bg-light"><!--начало основной части без сайдбара-->


					<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
					<h3 class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><!--Заголовок постов-->
					<?php /*the_time('F j, Y');*/ ?><!--показывает дату постов-->
					<?php /*if ( has_post_thumbnail() ) { the_post_thumbnail(); }*/?><!--Миниатюра поста-->
					<?php /*the_content('');*/ ?><!--Содержание постов-->
					<?php endwhile;
				/*else: echo '<h2>Извините, ничего не найдено...</h2>';*/ endif;  ?><!--Если нет постов-->


    </div><!--окончание основной части без сайдбара-->

  </div><!--окончание основного row of body-->

  <div class="row bg-light border-top"><!--начало дополнительной части row для пагинации-->
    <?php
  include "pagination.php";
    ?>   
		</div><!--окончание дополнительной части row для пагинации-->
</div><!--конец блока для маленьких экранов-->



</div><!--окончание основного container of body-->
<?php get_footer();  ?>
