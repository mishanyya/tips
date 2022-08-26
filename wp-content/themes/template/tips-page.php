<?php
/**
Template Name:страница подсказок
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
            <?php the_content(); ?>
          </p>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
      <?php get_sidebar();  ?>
  </div>
</div><!--конец блока для средних и больших экранов-->
<div class="d-block d-xl-none"><!--начало блока для маленьких экранов,это экран мобильника или планшета-->
     <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-light d-flex justify-content-center">
          <?php if ( have_posts() ) while ( have_posts() ) : the_post();  ?>
          <p class="">
            <?php the_content(); ?>
          </p>
          <?php endwhile; ?>
    </div>
  </div>
</div>
</div>
<?php get_footer();  ?>
