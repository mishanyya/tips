<?php
/**
 * @subpackage template

 */


 //добавить класс в ссылку a при показе ссылки на следующий или предыдущий по дате пост | запись
add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output) {
    $code = 'class="nav-link"';//присвоение класса тегу a
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}

register_nav_menus( array( // здесь регистрируем все меню сайта(через запятую)
	'top' => 'Верхнее меню',
	'right'=>'Меню сайдбара',
  'footer'=>'Меню подвала',
	'top-mini'=>'Верхнее меню для маленьких экранов',
	'right-mini'=>'Меню сайдбара для маленьких экранов',
  'pages'=>'Боковое меню для страниц',
	) );

	//add_filter('nav_menu_css_class', '__return_false');//удаляем все классы li в меню( можно  в принципе, не удалять)

	//добавляем нужные классы пунктам меню li
	add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
	function special_nav_class($classes, $item) {
			$classes[] = 'nav-item py-1';//название класса
	       return $classes;
	}


	// Добавляем классы ссылкам a в пунктах li каждого меню
	add_filter( 'nav_menu_link_attributes', 'nav_menu_link_attributes', 10, 4 );
	function nav_menu_link_attributes( $atts, $item, $args, $depth ) {
		$atts['class']='nav-link border-success';
		if ( $item->current ) {
			$atts['class'] .= ' active';//добавляем класс текущей активной ссылке, нужен пробел впереди!!!
		}

		if( $args->theme_location === 'top' ){
			$atts['class'] .= ' mx-1 btn btn-outline-primary';//добавляем класс ссылке для меню с указанным theme_location!!!
		}

		if( $args->theme_location === 'top-mini' ){
			$atts['class'] .= ' mx-1 btn btn-outline-primary';//добавляем класс ссылке для меню с указанным theme_location!!!
		}

		if( $args->theme_location === 'right' ){
			$atts['class'] .= ' btn btn-outline-primary';//добавляем класс ссылке для меню с указанным theme_location!!!
		}

		if( $args->theme_location === 'right-mini' ){
			$atts['class'] .= ' col-xs-11 col-sm-10 offset-md-1 col-md-9 offset-lg-1 col-lg-8 btn btn-outline-primary';//добавляем класс ссылке для меню с указанным theme_location!!!
		}
		return $atts;
	}

	 	//Добавляем класс элементу ul меню во вложенном подменю, при этом все классы элементов li одни и те же

	add_filter( 'nav_menu_submenu_css_class', 'change_wp_nav_menu', 10, 3 );
function change_wp_nav_menu( $classes, $args, $depth ) {
	$classes[] = '';
	return $classes;
}

// Добавляем классы пунктам li конкретного меню по его theme_location, в пункты подменю - li
	add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );
	function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
		if( $args->theme_location === 'right' ){
			$classes[] = ' bg-white rounded';
		}

		return $classes;
	}


//Регистрация нескольких сайдбаров

function true_register_wp_sidebars() {

	// В боковой колонке - первый сайдбар
	register_sidebar(
		array(
			//для админки
			'id' => 'right_side',//id каждого сайдбара, нужен только для вывода в коде, например: dynamic_sidebar('true_side');
			'name' => 'Правая колонка', //название сайдбара в админке
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в правую колонку.', //описание сайдбара в админке
			'class' => '',//в принципе не нужен, в выводе кода не используется
			//для редактирования кода
			'before_widget' => '<li id="%1$s" class="widget %2$s my-3">',//можно добавлять или удалять свой class, НО НЕ УБИРАТЬ %1$s и %2$s !!!
			'after_widget' => '</li>',//Каждый виджет сайдбара помещается по умолчанию в <li>, можно в <div>
			'before_title' => '<h4 class="text-center">',//заголовок виджета,не везде показан, class и тег можно менять
			'after_title' => '</h4>'//по умолчанию <h2>
		),

	array(
		//для админки
		'id' => 'right-side-mini',//id каждого сайдбара, нужен только для вывода в коде, например: dynamic_sidebar('sidebar-for-header');
		'name' => 'Правая колонка-мини', //название сайдбара в админке
		'description' => 'Перетащите сюда виджеты, чтобы добавить их в блок справа для мини.', //описание сайдбара в админке
		'class' => '',//в принципе не нужен, в выводе кода не используется
		//для редактирования кода
		'before_widget' => '<li id="%1$s" class="widget %2$s my-3">',//можно добавлять или удалять свой class, НО НЕ УБИРАТЬ %1$s и %2$s !!!
		'after_widget' => '</li>',//Каждый виджет сайдбара помещается по умолчанию в <li>, можно в <div>
		'before_title' => '<h2 class="widgettitle">',//заголовок виджета,не везде показан, class и тег можно менять
		'after_title' => '</h2>'//по умолчанию <h2>
	)



	);
}
add_action( 'widgets_init', 'true_register_wp_sidebars' );



add_theme_support('post-thumbnails'); // Включаем поддержку миниатюр
set_post_thumbnail_size(254, 190); // Задаем размеры миниатюре

if ( function_exists('register_sidebar') )
register_sidebar(); // Регистрируем сайдбар


/*

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

*/


function load_bootstrap(){//подключение общих файлов скриптов JS и стилей CSS
wp_enqueue_script('jquery-js', get_template_directory_uri().'/js/jquery.min.js');//подключение JQuery библиотеки для JS
wp_enqueue_script('classes-js', get_template_directory_uri().'/js/calculateclasses.js');//подключение файлов JS к WP
wp_enqueue_script('bootstrap-bundle-js', get_template_directory_uri().'/js/bootstrap.bundle.min.js');//подключение библиотеки Bundle Bootstrap JS
wp_enqueue_script('popper-js', get_template_directory_uri().'/js/popper.min.js');//подключение Popper библиотеки для JS
wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css');//подключение стилей Bootstrap CSS
wp_enqueue_style('style', get_template_directory_uri().'/style.css');//подключение стилей CSS
}
add_action('wp_enqueue_scripts', 'load_bootstrap');
//подключение всех скриптов, собранных в функцию load_bootstrap через крючок (hook) wp_enqueue_scripts


//подключение тега title
add_theme_support( 'title-tag' );

//удаление из title названия сайта
add_filter( 'document_title_parts', function( $parts ){
	if( isset($parts['site']) )
		unset($parts['site']);
	return $parts;
});

//значение тега description
function for_description(){
if (is_front_page()){//если главная страница
  echo "Подсказки на компьютерную тематику";
}
else if(is_category()){//если выбрана одна из категорий
  echo wp_get_document_title();
}
else single_post_title("");  //если открыт какой-нибудь пост
}

?>
