<div class="container my-3">
	<div class="row">
		<div class="col-md-9">

		<?php if ( is_active_sidebar( 'bottom_side' ) ) : ?>
			<div id="bottom-side-1" class="bg-success"><!--В этот <div> помещается сайдбар, class и id можно установить по желанию-->
						<?php dynamic_sidebar( 'bottom_side' ); ?><!--В скобки помещается id сайдбара из functions.php-->
						</div>
		<?php endif; ?>


<?php
/**
 * @subpackage template
 */
	wp_footer();//не трогать вообще!!!


wp_nav_menu( array(
'theme_location'  => 'footer',// Расположение меню. Default: empty
'menu'            => '',//id, slug или название меню. Default: empty
'container'       => 'nav', // Контейнер меню, в который помещаются контейнеры ul. Бывает или div, или nav. Default: div, если он не нужен, то убираем его так: container => false
'container_class' => 'navbar navbar-expand-md  float-right',// class основного контейнера. Можно указать классы Bootstrap. Default: menu-{menu slug}-container
'container_id'    => '',// id основного контейнера. Default: empty
'menu_class'      => 'nav nav-pills nav-fill',// class контейнера ul в этом меню. Default: menu
'menu_id'         => '', // id контейнера ul этого меню. Default: menu-{menu slug}
'depth'           => 0, //Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
'echo'            => true,//Выводить на экран (true) или возвратить для обработки (false). Default: true
'fallback_cb'     => 'wp_page_menu',//Функция, срабатывающая, если никакое меню не найдено. Если меню нет, установить '', Default: wp_page_menu
'before'          => '',//Текст перед тегом a в меню. Default: empty
'after'           => '',//Текст после тега/a в меню. Default: empty
'link_before'     => '',//Вставить текст после тега a в меню. Default: empty
'link_after'      => '',//Добавить текст перед тегом /a в меню. Default: empty
'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',//Если нужен контейнер ul- указывается этот шаблон. Если не нужно, указать '%3$s', но не оставлять пустым !!!Default: '<ul id="%1$s" class="%2$s">%3$s</ul>'
'walker'          => '', // (object) Класс собирающий меню. Default: new Walker_Nav_Menu
) );

?>


		</div>
	</div>

	<div class="row mt-4">
	<p class="text-muted text-left">Сайт не собирает данных о посетителях!<br>
По всем вопросам просьба писать на эл.почту <em>mishanyakashin@mail.ru</em></p>
</div>


</div>

</body>
</html>
