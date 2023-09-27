<?php
/**
Template Name:страница для расчета разницы дней между датами
* @subpackage template
 */
get_header();

?>
</div><!--закрытие тега container-->


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>



  /* Локализация datepicker */
  $.datepicker.regional['ru'] = {
  	closeText: 'Закрыть',
  	prevText: 'Предыдущий',
  	nextText: 'Следующий',
  	currentText: 'Сегодня',
  	monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
  	monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
  	dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
  	dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
  	dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
  	weekHeader: 'Не',
  	dateFormat: 'dd.mm.yy',
  	firstDay: 1,
  	isRTL: false,
  	showMonthAfterYear: false,
  	yearSuffix: ''
  };
  $.datepicker.setDefaults($.datepicker.regional['ru']);
  </script>

<div class="container"><!--начало основного container of body-->
<div class="d-none d-xl-block"><!--начало блока для больших экранов,это экран ноутбука или компьютера-->
  <div class="row"><!--начало основного row of body-->
    <div class="col-xl-9 bg-light"><!--начало основной части без сайдбара-->
     <div class="row"><!--начало основной части row-->
      <div class="col-xl-12"><!--начало основной части div col--12-->


          <?php if ( have_posts() ) while ( have_posts() ) : the_post();  ?>
          <h1 class="text-center"><?php the_title(); ?></h1>
          <p>
            <?php
             the_content(); ?>
          </p>
          <?php
          //здесь и далее можно прописать свой код на php
          //можно дописать код на javascript
          ?>



          <!-- Сюда можно включить свой код -->
          <h3>Расчет разницы между датами в днях</h3>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">Дата1</span>
              </div>
              <input type='text' placeholder="dd.mm.yyyy" class='day1 form-control' id='datepicker1'>
          </div>

          <div class="input-group mb-2">
      <div class="input-group-prepend">
      <span class="input-group-text">Дата2</span>
      </div>
      <input type='text'  placeholder="dd.mm.yyyy" class='day2 form-control'  id='datepicker2'>
      </div>




          <script>
          $(function(){
          	$("#datepicker1").datepicker();
          });

          $(function(){
            $("#datepicker2").datepicker();
          });
          </script>




          <div class="input-group mb-2">
            <div class="input-group-prepend">
            <span class="input-group-text">Рассчитанное значение</span>
            </div>
            <div class="yyear alert alert-success form-control" role="alert"><!-- вывод сообщения --></div>
            <span class="input-group-text">г.</span>
            <div class="mmonth alert alert-success form-control" role="alert"><!-- вывод сообщения --></div>
            <span class="input-group-text">м.</span>
            <div class="dday alert alert-success form-control" role="alert"><!-- вывод сообщения --></div>
            <span class="input-group-text">д.</span>
          </div>


          <ul class="list-group">
          </ul>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
            <span class="input-group-text">Сумма всех рассчитанных значений</span>
            </div>
            <div class="yearsum alert alert-success form-control" role="alert"><!-- вывод сообщения --></div>
            <span class="input-group-text">г.</span>
            <div class="monthsum alert alert-success form-control" role="alert"><!-- вывод сообщения --></div>
            <span class="input-group-text">м.</span>
            <div class="daysum alert alert-success form-control" role="alert"><!-- вывод сообщения --></div>
            <span class="input-group-text">д.</span>
          </div>

          <script>
var rez;//для деления

var dd=0;//для подсчета дней
var mm=0;//для подсчета месяцев
var yy=0;//для подсчета лет
dd=Number(dd);
mm=Number(mm);
yy=Number(yy);

        //  function funcajax(){
            jQuery( function( $ ){ // есть разные варианты этой строчки, но такая мне нравится больше всего, т.к. всегда работает
  	$( '#idajax' ).click( function(){ // при клике на элемент с id="idajax"
  		//alert( 'JQuery у меня вроде работает!!!' ); // выводим сообщение просто для проверки работает ли jquery

      var x=document.getElementsByClassName('day1')[0].value;
      var y=document.getElementsByClassName('day2')[0].value;

     var adress="<?php
     echo get_template_directory_uri().'/php/calculatedifdate.php';//URL папки шаблона WordPress, например http://test/wp-content/themes/template
       ?>";
  //  alert(adress);
//ajax запрос
    $.ajax({
	url: adress, //'/index.php',         /* Куда пойдет запрос */
	method: 'get',             /* Метод передачи (post или get) */
	dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
	//data: {param1: x},     /* Параметры передаваемые в запросе. */
	data: 'param1='+x+'&param2='+y,     /* Параметры передаваемые в запросе. */
  //req.open('GET', 'example.php?var='+varjs, true);

	success: function(data){   /* функция которая будет выполнена после успешного запроса.  */

    data = data.split('-', 3); //разбить строку на подстроки по


		document.getElementsByClassName('dday')[0].innerHTML=data[2];            /* В переменной data содержится ответ от ajax c сервера/файла php. */
    document.getElementsByClassName('mmonth')[0].innerHTML=data[1];            /* В переменной data содержится ответ от ajax c сервера/файла php. */
    document.getElementsByClassName('yyear')[0].innerHTML=data[0];            /* В переменной data содержится ответ от ajax c сервера/файла php. */


data[0]=Number(data[0]); // становится числом
data[1]=Number(data[1]); // становится числом
data[2]=Number(data[2]); // становится числом

    dd=dd+data[2];
    mm=mm+data[1];
    yy=yy+data[0];

//если дней >31 , идет деление на 30, результат прибавляется к месяцам, а остаток идет в дни
//если месяцев >12 , идет деление на 12, результат прибавляется к годам, а остаток идет в месяцы

if(dd>31){
  rez=Math.floor(dd/31); //целое
  dd=dd%31;//остаток
  rez=Number(rez); // становится числом
  mm=mm+rez;//добавить к месяцам
}


if(mm>12){
  rez=Math.floor(mm/12); //целое
  mm=mm%12;//остаток
  rez=Number(rez); // становится числом
  yy=yy+rez;//добавить к месяцам
}



    document.getElementsByClassName('daysum')[0].innerHTML=dd;            /* В переменной data содержится ответ от ajax c сервера/файла php. */
    document.getElementsByClassName('monthsum')[0].innerHTML=mm;            /* В переменной data содержится ответ от ajax c сервера/файла php. */
    document.getElementsByClassName('yearsum')[0].innerHTML=yy;            /* В переменной data содержится ответ от ajax c сервера/файла php. */



dd=Number(dd); // становится числом
mm=Number(mm); // становится числом
yy=Number(yy); // становится числом

//добавить HTML-элемент
if(dd!=0){  //если число=0
$(".list-group").append("<li class='list-group-item'>"+x+" - "+y+"</li>" );
}

  }
});

//alert(999);
  //   url: "get_template_directory_uri().'/php/calculatedifdate.php'",
      		//	type: 'POST',
      	//		data: 'param1=2&param2=3', // можно также передать в виде объекта
      			/*beforeSend: function( xhr ) {
      				$('#idajax').text('Загрузка, 5 сек...');
      		},
      			success: function( data ) {
      			$('#idajax').text('Отправить');
      			alert( data );
          }*/



  	});
  });
      //    }
////////////////

//  function funcajax(){
    jQuery( function( $ ){ // есть разные варианты этой строчки, но такая мне нравится больше всего, т.к. всегда работает
$( '#idclear' ).click( function(){ // при клике на элемент с id="idajax"
//alert( 'JQuery у меня вроде работает!!!' ); // выводим сообщение просто для проверки работает ли jquery

document.getElementsByClassName('day1')[0].value='';
document.getElementsByClassName('day2')[0].value='';
rez=0;
dd=0;
mm=0;
yy=0;
document.getElementsByClassName('daysum')[0].innerHTML='';            /* В переменной data содержится ответ от ajax c сервера/файла php. */
document.getElementsByClassName('monthsum')[0].innerHTML='';            /* В переменной data содержится ответ от ajax c сервера/файла php. */
document.getElementsByClassName('yearsum')[0].innerHTML='';

document.getElementsByClassName('dday')[0].innerHTML='';            /* В переменной data содержится ответ от ajax c сервера/файла php. */
document.getElementsByClassName('mmonth')[0].innerHTML='';            /* В переменной data содержится ответ от ajax c сервера/файла php. */
document.getElementsByClassName('yyear')[0].innerHTML='';


$('.list-group').empty();//удалить все элементы внутри класса list-group

});
});
///////////////////
          </script>
          <?php
          //расчет даты
          /*$origin = new DateTimeImmutable('2009-10-11');
          $target = new DateTimeImmutable('2009-10-13');
          $interval = $origin->diff($target);
          echo $interval->format('%R%a дней');
          */
                    ?>

        <input type="button" class="btn btn-outline-info" value="нажать для расчета разницы между датами" id="idajax" onclick="funcajax()"/>


        <input type="button" class="btn btn-outline-info" value="сбросить" id="idclear" onclick="clear()"/>

            <!-- Конец своего кода -->
          <?php endwhile; ?>
        </div>
      </div>
    </div>
    <?php /*get_sidebar(); */ /*убрали стандартный сайдбар справа*/?>
    <!-- Нестандартный сайдбар с меню для формул -->
    <div class="col-xl-3  bg-light border-left">
    <?php if ( is_active_sidebar( 'right_side' ) ) : ?>
      <div id="" class="p-1 text-danger"><!--В этот <div> помещается сайдбар, class и id можно установить по желанию-->
        <?php dynamic_sidebar( 'right_side' ); ?><!--В скобки помещается id сайдбара из functions.php-->
      </div>
    <?php endif; ?>

    <?php
    //меню для сайдбара страниц-калькуляторов
    include "menustyleforcalculatepagessidebar.php";
    ?>

    <div class="fixed-bottom position-relative border-top">
    <!--	<h4 class="text-center text-secondary"></h4>-->
    </div>
    </div>
    <!-- Конец нестандартного сайдбара с меню для формул -->
  </div>




</div><!--конец блока для средних и больших экранов-->



<div class="d-block d-xl-none"><!--начало блока для маленьких экранов,это экран мобильника или планшета-->
     <div class="row">
       <div class="dropdown mx-auto mb-2">
         <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Меню для выбора калькулятора
         </button>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
           <?php
           //меню для сайдбара страниц-калькуляторов
           include "menustyleforcalculatepagessidebar.php";
           ?>
         </div>
       </div>
  </div>
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-light justify-content-center">
       <?php if ( have_posts() ) while ( have_posts() ) : the_post();  ?>
       <p class="">
         <?php the_content(); ?>
       </p>
       <!-- Сюда можно включить свой код -->
  <!-- Конец своего кода -->
       <?php endwhile; ?>

  </div>
  </div>


  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <!-- Сюда можно включить свой код -->

  <h3>Расчет разницы между датами</h3>
  <div class="input-group mb-2">
  <div class="input-group-prepend">
      <span class="input-group-text">Дата 1</span>
    </div>
    <input type='text' placeholder="" class='date1s form-control' inputmode='numeric'>
  </div>

  <div class="input-group mb-2">
  <div class="input-group-prepend">
      <span class="input-group-text">Дата 2</span>
    </div>
    <input type='text' placeholder="" class='date2s form-control' inputmode='numeric'>
  </div>


  <div class="input-group mb-2">
  <div class="Payment1  alert alert-success" role="alert">Здесь будет результат расчета<!-- вывод сообщения --></div>
  </div>

    </div>
  </div>
<!-- Конец своего кода -->

</div>


</div>

<?php get_footer();  ?>
