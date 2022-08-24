<?php
/**
 * @subpackage template
 */
get_header(); ?>
</div><!--закрытие тега container of  header-->

<div class="container">
  <div class="row height_basis_part_content">
    <div class="col-md-9 bg-light">
      <div class="row">
        <div class="col-md-12">
<p>Что-то пошло не так!</p> <p>Пожалуйста, <a href='/'>пройдите на главную страницу</a></p>
          <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

          	<div><!--В этот <div> помещается сайдбар, class и id можно установить по желанию-->
          		<?php dynamic_sidebar( 'sidebar-1' ); ?><!--В скобки помещается id сайдбара из functions.php-->
          	</div>

          <?php endif; ?>

        </div>
      </div>

    </div>

      <?php get_sidebar();  ?>

  </div>
</div>

<?php get_footer();  ?>
