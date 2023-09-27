<?php
/**
 * @subpackage template
 */
?>
<!DOCTYPE html>
<html lang="ru">
<?php
// создать куку с названием Summ и значением 0
if(!isset($_COOKIE['Summ'])){
	SetCookie('Summ',0);
}
?>
<head>

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
	   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	   var z = null;m[i].l=1*new Date();
	   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
	   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

	   ym(90128157, "init", {
	        clickmap:true,
	        trackLinks:true,
	        accurateTrackBounce:true
	   });
	</script>

	<?php
		wp_head();
	?>

<meta name="description" content="<?php for_description(); ?>">
<meta name="keywords" content="Linux,Ubuntu,программирование,сервер,C++,PHP,NASM,CSS,Javascript"/>
<meta charset="text/html;utf-8"/>
<meta http-equiv="content-language" content="ru"/>
<meta name="robots" content="all"/>
<meta name="document-state" content="Dynamic"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<!-- Для настройки поисковиков начало, остальные через плагин и хостинг TXT -->
<meta name='wmail-verification' content='c6d123c690d9279a9b2036e8210b8a65' />
<!-- Конец блока для настройки поисковиков -->


</head>

<body class="">
<!--заголовки сайта, не стоит использовать теги h1,h2 и другие, иначе нарушится иерархия тегов!!!-->
	<div class="h1 bg-white text-center text-danger d-block"><?php bloginfo( 'name' );?></div>
	<div class="h3 bg-white text-center text-info d-block"><?php	bloginfo( 'description' );?></div>

<div class="container bg-light border-bottom my-3">


<div class="d-none d-xl-block"><!--начало блока для больших экранов,это экран ноутбука или компьютера-->
<div class="col-xl-4">
<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
</div><!--конец блока для средних и больших экранов-->

<div class="d-block d-xl-none "><!--начало блока для маленьких экранов,это экран мобильника или планшета-->
<nav class="navbar d-flex justify-content-center">
<?php dynamic_sidebar( 'sidebar-1' ); ?>
</nav>
</div><!--конец блока для маленьких экранов-->




<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

<div class="d-none d-xl-block"><!--начало блока для больших экранов,это экран ноутбука или компьютера-->
	<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
	<form role="search" method="get" class="search-form mt-3 col-xl-5 float-right " action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="form-control border-success col-xl-12 " id="<?php echo $unique_id; ?>" placeholder="Поиск на сайте..." value="<?php echo get_search_query(); ?>" name="s">
	</form>

	<?php
		wp_nav_menu( array(
	'theme_location'  => 'top',// Расположение меню в шаблоне. (указано в функции register_nav_menus)
	'container'       => 'nav', // Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию - div)
	'container_class' => 'navbar justify-content-left ',// class контейнера (div тега),если не указано, то ставится стиль WP
	'container_id'    => '',// id контейнера (div тега), если не указано, то отсутствует
	'menu_class'      => 'nav nav-pills nav-fill ',// class тега ul этого меню, если не указано, то отсутствует
	'menu_id'         => '', // id ul тега этого меню, если не указано, то ставится id WP
	'depth'           => 0,     //Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
) );
?>
</div><!--конец для больших экранов-->

<div class="d-block d-sm-block d-xl-none"><!--начало блока для всех! маленьких экранов, т.е планшета и телефона-->
<?php
		wp_nav_menu( array(
	'theme_location'  => 'top-mini',// Расположение меню в шаблоне. (указано в функции register_nav_menus)
	'container'       => 'nav', // Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию - div)
	'container_class' => 'navbar justify-content-left',// class контейнера (div тега),если не указано, то ставится стиль WP
	'container_id'    => '',// id контейнера (div тега), если не указано, то отсутствует
	'menu_class'      => 'nav nav-pills nav-fill',// class тега ul этого меню, если не указано, то отсутствует
	'menu_id'         => '', // id ul тега этого меню, если не указано, то ставится id WP
	'depth'           => 0,     //Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
) );
?>
</div><!--конец для маленьких экранов-->


</div>
	</div>
