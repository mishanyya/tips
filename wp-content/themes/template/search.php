<?php
/**
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


					<h1 class="text-center"><?php printf( __( 'Результаты поиска: %s', 'template' ), '' . get_search_query() . '' ); ?></h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php the_time('F j, Y'); ?>
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
					<?php /*the_content('');*/  ?>
					<?php endwhile;
					else: echo '<h2> ничего не найдено</h2>'; endif;?>
					<?php

					//создание пагинации для результатов поиска
					$links=paginate_links( array(
//'base' => '%_%',
//В конструкции: http://example.com/all_posts.php%_% %_% будет заменено значением format.(Default: "%_%")
//'format' => '?page=%#%',
//Значение, которое добавляется в URL ссылки.(Default: "?page=%#%")
//'add_args' => False,
//'total' => 4,
//показывает количество выводимых ссылок, может вывести дополнительные пустые ссылки;(Default:1)
//'current' => 0,
//'end_size' => 0,
//сколько показывать первых и последних страниц; (Default:1)
//'show_all' => false,
//true-выведет все ссылки, false- вывод номера текущей страницы и несколько предыдущих и следующих (Default:'false')
//'mid_size' => 1,
//сколько показывать предыдущих и следующих страниц; (Default:2)
//'prev_next' => true,
//подключает и отключает ссылки на предыдущую и следующую страницы, true или false соответственно, (Default:'true')
'prev_text'    => __('&#9668; Предыдущая'),//ссылка для перехода на предыдущую страницу (Default:'__('« Previous')')
'next_text'    => __('Следующая &#9658;'),//ссылка для перехода на следующую страницу (Default:'__('Next »')')
'type' => 'array',
//plain - <a></a>; list - <ul> <li><a>...</a></li> <ul>; array - массив c <a>; (Default:'plain')
//'add_fragment' => '',
//добавляется в URL адрес в ссылке каждого номера страницы (Default:empty)
//'before_page_number' => '',
//текст, который вставляется в начало каждого номера страницы (Default:empty)
//'after_page_number' => ''
//текст, который добавляется к каждому номеру страницы (Default:empty)
));

					//вывод пагинации
					echo "<nav><ul class='pagination d-flex justify-content-center'>";
//стили для bootstrap
foreach($links as $link){
//$links- это массив, а $link- каждое значение массива, чтобы не писать $links[$i] и т.д.
$link=str_replace( "page-numbers", "page-link", $link);
$i=strripos($link, 'current');
//поиск подстроки в строке
if($i==true) {
echo "<li class='page-item disabled'>".$link."</li>";
}
else{
echo "<li class='page-item'>".$link."</li>";
}
}
echo "</ul></nav>";
					?>
        </div>
      </div>
    </div>
      <?php get_sidebar();  ?>
  </div>
</div><!--конец блока для средних и больших экранов-->
<div class="d-block d-xl-none"><!--начало блока для маленьких экранов,это экран мобильника или планшета-->
     <div class="row">
    <div class="col-lg-12 bg-light">
					<h1 class="text-center"><?php printf( __( 'Результаты поиска: %s', 'template' ), '' . get_search_query() . '' ); ?></h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php the_time('F j, Y'); ?>
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
					<?php /*the_content('');*/  ?>
					<?php endwhile;
					else: echo '<h2> ничего не найдено</h2>'; endif;?>
					<?php
					//создание пагинации для результатов поиска
					$links=paginate_links( array(

'type' => 'array',
'prev_text'    => __(' « '),//ссылка для перехода на предыдущую страницу (Default:'__('« Previous')')
'next_text'    => __(' » '),//ссылка для перехода на следующую страницу (Default:'__('Next »')')

));
					//вывод пагинации
					echo "<nav><ul class='pagination d-inline-block'>";
//стили для bootstrap
foreach($links as $link){
//$links- это массив, а $link- каждое значение массива, чтобы не писать $links[$i] и т.д.
$link=str_replace( "page-numbers", "page-link", $link);
$i=strripos($link, 'current');
//поиск подстроки в строке
if($i==true) {
echo "<li class='page-item disabled d-inline-block'>".$link."</li>";
}
else{
echo "<li class='page-item d-inline-block'>".$link."</li>";
}
}
echo "</ul></nav>";
					?>
    </div>

  </div>
</div><!--конец блока для маленьких экранов-->
</div>
  <?php get_footer();  ?>
