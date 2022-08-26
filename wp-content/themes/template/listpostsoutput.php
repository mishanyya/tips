<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
<h3 class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><!--Заголовок постов-->
<?php /*the_time('F j, Y');*/ ?><!--показывает дату постов-->
<?php /*if ( has_post_thumbnail() ) { the_post_thumbnail(); }*/?><!--Миниатюра поста-->
<?php /*the_content('');*/ ?><!--Содержание постов-->
<?php endwhile;
/*else: echo '<h2>Извините, ничего не найдено...</h2>';*/ endif;  ?><!--Если нет постов-->
