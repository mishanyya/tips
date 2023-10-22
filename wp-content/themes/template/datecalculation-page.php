<?php
/**
Template Name:страница для расчета разницы дней между датами
* @subpackage template
 */
get_header();

?>
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

          <div class="input-group mb-2">
            <div class="input-group-prepend">
            <span class="input-group-text double"></span>
            <input type="button" hidden id="deletebutton" value="удалить повторяющиеся записи">
            </div>

            <div class="input-group-prepend">
            <span class="input-group-text array"></span>
            </div>
            <div class="input-group-prepend">
            <span class="input-group-text forwarning"></span>
            </div>
        </div>
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

          <script>
            jQuery( function( $ ){ // добавить даты
  	$( '#idajax' ).click( function(){ // при клике на элемент с id="idajax"
  		//alert( 'JQuery у меня вроде работает!!!' ); // выводим сообщение просто для проверки работает ли jquery
      let x=document.getElementsByClassName('day1')[0].value;
      let y=document.getElementsByClassName('day2')[0].value;
      //сравнение дат, если идет большая, затем меньшая - они меняются местами
      let resdate1=x.split(".");
      let resdate2=y.split(".");
      let xy; //временная переменная
      let y1=resdate1[2];
      let m1=resdate1[1];
      let d1=resdate1[0];
      let y2=resdate2[2];
      let m2=resdate2[1];
      let d2=resdate2[0];
        let date1 = new Date(y1+'.'+m1+'.'+d1);
        let date2 = new Date(y2+'.'+m2+'.'+d2);

      if(date1.getTime() > date2.getTime()){ //сравнение дат
        xy=x;
        x=y;
        y=xy;
        }

     let adress="<?php
     echo get_template_directory_uri().'/php/calculatedifdate.php';//URL папки шаблона WordPress, например http://test/wp-content/themes/template
       ?>";

//ajax запрос
    $.ajax({
	url: adress,               /* Куда пойдет запрос */
	method: 'get',             /* Метод передачи (post или get) */
	dataType: 'html',          /* Тип данных в ответе */
	//data: {param1: x},       /* Параметры передаваемые в запросе. */
	data: 'param1='+x+'&param2='+y,     /* Параметры передаваемые в запросе. */

	success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
    data = data.split('-', 3); //разбить строку на подстроки по
		document.getElementsByClassName('dday')[0].innerHTML=data[2];            /* В переменной data содержится ответ от ajax c сервера/файла php. */
    document.getElementsByClassName('mmonth')[0].innerHTML=data[1];            /* В переменной data содержится ответ от ajax c сервера/файла php. */
    document.getElementsByClassName('yyear')[0].innerHTML=data[0];            /* В переменной data содержится ответ от ajax c сервера/файла php. */
//добавить HTML-элемент
if((x!=y)&&(x!='')&&(y!='')){  //если числа не равны
$(".list-group").append("<li class='list-group-item'>"+x+" - "+y+"</li>" );
}
  }
});
  	});
  });


  jQuery( function( $ ){ // сбросить
$( '#idclear' ).click( function(){ // при клике на элемент с id="idclear"

document.getElementsByClassName('day1')[0].value='';
document.getElementsByClassName('day2')[0].value='';
document.getElementsByClassName('daysum')[0].innerHTML='';            /* В переменной data содержится ответ от ajax c сервера/файла php. */
document.getElementsByClassName('monthsum')[0].innerHTML='';            /* В переменной data содержится ответ от ajax c сервера/файла php. */
document.getElementsByClassName('yearsum')[0].innerHTML='';
document.getElementsByClassName('dday')[0].innerHTML='';            /* В переменной data содержится ответ от ajax c сервера/файла php. */
document.getElementsByClassName('mmonth')[0].innerHTML='';            /* В переменной data содержится ответ от ajax c сервера/файла php. */
document.getElementsByClassName('yyear')[0].innerHTML='';
document.getElementsByClassName('array')[0].innerHTML='';
$('.list-group').empty();//удалить все элементы внутри класса list-group
});
});

jQuery( function($){ //рассчитать сумму разниц дат в таблице
$( '#idajax1' ).click( function(){ // при клике на элемент с id="idajax1"
  let adress1="<?php
  echo get_template_directory_uri().'/php/calculatedifdate1.php';//URL папки шаблона WordPress, например http://test/wp-content/themes/template
  ?>";
let array1=document.getElementsByClassName('list-group-item');//поместить все list-group-item в массив
  let lengtharray1=array1.length;  //кол-во элементов с классом list-group-item
  let array2=[];
let i;
for(i=0;i<lengtharray1;i++){
  //alert(array1[i].innerHTML);
  array2[i]=array1[i].innerHTML;
}
//ajax запрос
   $.ajax({
	url: adress1, //'/index.php',         /* Куда пойдет запрос */
	//method: 'get',             /* Метод передачи (post или get) */
	dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
	//data:'param1='+123,     /* Параметры передаваемые в запросе. */
  type: 'POST',
  //data: {arr: arr},
  data: {array2: array2},
	success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
    data = data.split('-', 3); //разбить строку на подстроки по
    document.getElementsByClassName('daysum')[0].innerHTML=data[2];            /* В переменной data содержится ответ от ajax c сервера/файла php. */
    document.getElementsByClassName('monthsum')[0].innerHTML=data[1];            /* В переменной data содержится ответ от ajax c сервера/файла php. */
    document.getElementsByClassName('yearsum')[0].innerHTML=data[0];
    }
});
});
});

/////////////////////////////////////////////////

    jQuery(function($){ // проверить список с датами
$( '#idsort' ).click( function(){ // при клике на элемент с id="idsort"
let ar=document.getElementsByClassName('list-group-item');//поместить все list-group-item в массив
let ll=ar.length;  //кол-во элементов с классом list-group-item

let data1;
let data2;
let d1,d11;
let d2,d22;
let el,el0;
let el1;
let el2=1;
let dd;
let answer=0;//наличие совпадений
let arr = []; //массив для всех дат

//сортировка записей по возрастанию
for(el0=0;el0<ll;el0++){  //0 цикл
for(el1=0;el1<ll;el1++,el2++){  //1 цикл для первой даты
  data1 = ar[el1].innerHTML.split('.', 3); //разбить строку на подстроки по знаку '.'
  data2=data1[2].split('-',1);                  //разбить строку на подстроки по знаку '.-'
  d1=data1[0]+'.'+data1[1]+'.'+data2[0];
  d11=data2[0]+'.'+data1[1]+'.'+data1[0];
for(el=el2;el<ll;el++){  //2 цикл для второй даты
  data1 = ar[el].innerHTML.split('.', 3); //разбить строку на подстроки по знаку '.'
  data2=data1[2].split('-',1);                  //разбить строку на подстроки по знаку '.-'
  d2=data1[0]+'.'+data1[1]+'.'+data2[0];
  d22=data2[0]+'.'+data1[1]+'.'+data1[0];
  if(d11>d22){
//ar[el1].after('after'); // вставить строку "after" ПОСЛЕ выбранного html элемента
//ar[el1].before('before'); // вставить строку "before" ПЕРЕД выбранным html элементом
ar[el1].before(ar[el]); // вставить строку "before" ПЕРЕД выбранным html элементом
}
}    //2 цикл
}    //1 цикл
}   //0 цикл



//поиск одинаковых записей
for(el=0;el<(ll-1);el++){
  //поиск совпадений дат
if(ar[el].innerHTML==ar[el+1].innerHTML){
  answer=1;
  // добавление элементу класс для удаления
ar[el].classList.add("doubleremove");
ar[el].classList.add("text-danger");
}
//поиск совмащенных дат
}//конец цикла
if(answer==1){
document.getElementsByClassName('double')[0].innerHTML="Найдены совпадения!";
document.getElementsByClassName('double')[0].classList.add("text-danger");
document.getElementById('iddoubleclear').classList.remove("invisible");
document.getElementById('iddoubleclear').classList.add("visible");
}

//поиск совмещенных дат
let ar1=document.getElementsByClassName('list-group-item');//поместить все list-group-item в массив
let ll1=ar1.length;  //кол-во элементов с классом list-group-item
let da1;
let da2;
let da11;
let da21;
let date1a;
let date2a;
let i;
let answer1=0;//наличие совмещенных дат
for(i=0;i<ll1;i++){
  da1=ar1[i].innerHTML.split("-");
  da2=ar1[i+1].innerHTML.split("-");
let da11=da1[1].split(".");
let da21=da2[0].split(".");
  date1a = new Date(da11[2],da11[1],da11[0]);
  date2a = new Date(da21[2],da21[1],da21[0]);
  if(date1a>date2a){
    ar1[i].classList.add("bg-warning");
    ar1[i+1].classList.add("bg-warning");
    answer1=1;
  }
if(answer1==1){
  document.getElementsByClassName('array')[0].innerHTML='Найдены совмещенные даты!';
  document.getElementsByClassName('array')[0].classList.add("bg-warning");
  document.getElementById('iddoublejoin').classList.remove("invisible");
  document.getElementById('iddoublejoin').classList.add("visible");
}
}
});//конец функции
});

    jQuery( function( $ ){ //удалить повторяющиеся записи/даты
$( '#iddoubleclear' ).click( function(){ // при клике на элемент с id="iddoubleclear"
//alert( 'JQuery у меня вроде работает!!!' ); // выводим сообщение просто для проверки работает ли jquery
let ar=document.getElementsByClassName('list-group-item');//поместить все list-group-item в массив
let ll=ar.length;  //кол-во элементов с классом list-group-item
let i;
for(i=0;i<ll;i++){
  if(ar[i].classList.contains("doubleremove")){  //проверка наличия класса в элементе
ar[i].remove(); //удалить элемент
 }
if(ar[i].classList.contains("bg-warning")){  //удалить обозначение совмещенных дат
  ar[i].classList.remove("bg-warning");
}
 document.getElementById('iddoubleclear').classList.remove("visible");
 document.getElementById('iddoubleclear').classList.add("invisible");
 document.getElementById('iddoublejoin').classList.remove("visible");
 document.getElementById('iddoublejoin').classList.add("invisible");
 document.getElementsByClassName('double')[0].innerHTML="";
 document.getElementsByClassName('array')[0].innerHTML='';
}
});
});


jQuery( function($){ //объединить совмещенные даты
$( '#iddoublejoin' ).click( function(){ // при клике на элемент с id="iddoublejoin"

let array1=document.getElementsByClassName('list-group-item');//поместить все list-group-item в массив
let lengtharray1=array1.length;  //кол-во элементов с классом list-group-item
let array2=[];
let i;
let j=0;
let data1;
let data2;
let answer2=0;
for(i=0;i<lengtharray1;i++){
  if(array1[i].classList.contains("bg-warning")){
    data1=array1[i].innerHTML.split('-'); //разбить строку на подстроки по знаку '.'
    data2=array1[i+1].innerHTML.split('-'); //разбить строку на подстроки по знаку '.'
  //  alert(data1[0]+'-'+data2[1]);
     $(".list-group-item").eq(i).html(data1[0]+'-'+data2[1]); // содержание первого элемента меняется на data1[0]+" - "+data2[1]
     array1[i].classList.remove("bg-warning");
     $(".list-group-item").eq(i+1).remove();// удалить элемент с №1
  //  $(".list-group-item").eq(i+1).html(0); // содержание первого элемента меняется на data1[0]+" - "+data2[1]
i++;
answer2=1;
  }
  if(answer2==1){
    document.getElementById('iddoublejoin').classList.remove("visible");
    document.getElementById('iddoublejoin').classList.add("invisible");
    document.getElementsByClassName('array')[0].remove("bg-warning");
    document.getElementsByClassName('array')[0].innerHTML='';
  }
}

});
});
          </script>

        <input type="button" class="btn btn-outline-info" value="добавить даты" id="idajax"/>
        <input type="button" class="btn btn-outline-info" value="проверить список на повторы" id="idsort"/>
        <input type="button" class="btn btn-outline-info" value="рассчитать сумму разниц дат в таблице" id="idajax1"/>
        <input type="button" class="btn btn-outline-info" value="сбросить" id="idclear"/>
        <input type="button" class="btn btn-outline-info text-danger invisible" value="удалить повторяющиеся записи/даты" id="iddoubleclear"/>
        <input type="button" class="btn btn-outline-info bg-warning invisible" value="объединить совмещенные даты" id="iddoublejoin"/>

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
