<nav class='mx-auto'>
<ul class='mt-3 pagination'>
    <?php		//если посты не помещаются на одной странице, пагинация
    $links=paginate_links( array(
'prev_text'    => __('&#9668;	Предыдущая'),//ссылка для перехода на предыдущую страницу (Default:'__('« Previous')')
'next_text'    => __('Следующая &#9658;'),//ссылка для перехода на следующую страницу (Default:'__('Next »')')
'type'         => 'array',//plain - <a></a>; list - <ul> <li><a> </a></li> <ul> ;array - массив c <a>;(Default:'plain')
));
foreach($links as $link){//$links- это массив, а $link- каждое значение массива, чтобы не писать $links[$i] и т.д.
$link=str_replace( "page-numbers", "page-link", $link);
$i=strripos($link, 'current');//поиск подстроки в строке
if($i==true) {
echo "<li class='page-item disabled'>".$link."</li>";
}
else{
echo "<li class='page-item'>".$link."</li>";
}}
  ?>
</ul>
</nav>
