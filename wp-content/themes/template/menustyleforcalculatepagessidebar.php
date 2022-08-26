
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
