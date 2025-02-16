<?php
/**
Template Name:страница для расчета банковского платежа
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
          <h3>Расчет суммы платежа по кредиту</h3>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">Сумма кредита</span>
              </div>
              <input type='text' placeholder="" class='Debt form-control'>
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">Процентная ставка в год</span>
              </div>
              <input type='text' placeholder="" class='InterestRate form-control'>
          </div>


          <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">Срок платежа в годах</span>
              </div>
              <input type='text' placeholder="" class='PaymentTermAYear form-control'>
          </div>

          <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">Срок платежа в месяцах</span>
              </div>
              <input type='text' placeholder="" class='PaymentTerm form-control'>
          </div>


          <div class="input-group mb-2">
            <div class="Payment  alert alert-success" role="alert">Здесь будет размер ежемесячного платежа<!-- вывод сообщения --></div>
            </div>

          <div class="input-group mb-2">
            <div class="Overpayment  alert alert-info" role="alert">Здесь будет общий размер переплаты по кредиту<!-- вывод сообщения --></div>
          </div>

          <div class="input-group mb-2">
            <div class="Allpayment  alert alert-warning" role="alert">Здесь будет стоимость кредита в процентах<!-- вывод сообщения --></div>
          </div>

          <script>

          function payment(i){
            let koeff,payment,interestrateamonth;
         let debt=document.getElementsByClassName('Debt')[i].value;

          let interestrate=document.getElementsByClassName('InterestRate')[i].value;
          let paymentterm=document.getElementsByClassName('PaymentTerm')[i].value;
          let paymenttermayear=document.getElementsByClassName('PaymentTermAYear')[i].value;
          let RegExpPoint=/\,/;//проверка на запятую, нужна точка
        let RegExp=/^[\d]+[\.\d*]*$/;//проверка на только цифры с начала и до конца - тип float с точкой

        let PointRegExp=/\,/;//замена знака запятой на знак точки
        interestrate=interestrate.replace(PointRegExp, '.');

        if(paymenttermayear.length==0){
        paymenttermayear=0;
        }
        if(paymentterm.length==0){
        paymentterm=0;
        }
         if((RegExp.test(debt)==false)|(RegExp.test(interestrate)==false)|(RegExp.test(paymentterm)==false)|(RegExp.test(paymenttermayear)==false)){
            payment="Расчет не удался из-за некорректных данных";
          }
          else {
            paymenttermayear=Number(paymenttermayear);
            paymentterm=Number(paymentterm);
            paymentterm=(paymenttermayear*12)+paymentterm;//срок кредита в месяцах
            interestrateamonth=interestrate/1200;//% делятся на 100 и на 12 месяцев
            koeff=(interestrateamonth*Math.pow((1+interestrateamonth),paymentterm))/(Math.pow((1+interestrateamonth),paymentterm)-1);
            payment=koeff*debt;//платеж в месяц
          }
          if(payment===Infinity){
            payment="Расчет не удался из-за некорректных данных";
          }
          document.getElementsByClassName('Payment')[i].textContent='Ежемесячный платеж: '+payment;
          document.getElementsByClassName('Overpayment')[i].textContent='Переплата по кредиту: '+(payment*paymentterm-debt);
          document.getElementsByClassName('Allpayment')[i].textContent='Переплата в процентах: '+(payment*paymentterm-debt)*100/debt+' %';

          }
          </script>
          <input type="button" class="btn btn-outline-info" value="нажать для расчета платежа по кредиту" onclick="payment(0)"/>

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

  <h3>Расчет суммы платежа по кредиту</h3>
  <div class="input-group mb-2">
  <div class="input-group-prepend">
      <span class="input-group-text">Сумма кредита</span>
    </div>
    <input type='text' placeholder="" class='Debt form-control' inputmode='numeric'>
  </div>

  <div class="input-group mb-2">
  <div class="input-group-prepend">
      <span class="input-group-text">Процентная ставка в год</span>
    </div>
    <input type='text' placeholder="" class='InterestRate form-control' inputmode='numeric'>
  </div>

  <div class="input-group mb-2">
  <div class="input-group-prepend">
      <span class="input-group-text">Срок платежа в годах</span>
    </div>
    <input type='text' placeholder="" class='PaymentTermAYear form-control' inputmode='numeric'>
  </div>

  <div class="input-group mb-2">
  <div class="input-group-prepend">
      <span class="input-group-text">Срок платежа в месяцах</span>
    </div>
    <input type='text' placeholder="" class='PaymentTerm form-control' inputmode='numeric'>
  </div>


  <div class="input-group mb-2">
    <div class="Payment  alert alert-success" role="alert">Здесь будет размер ежемесячного платежа<!-- вывод сообщения --></div>
    </div>

  <div class="input-group mb-2">
    <div class="Overpayment  alert alert-info" role="alert">Здесь будет общий размер переплаты по кредиту<!-- вывод сообщения --></div>
  </div>

  <div class="input-group mb-2">
    <div class="Allpayment  alert alert-warning" role="alert">Здесь будет стоимость кредита в процентах<!-- вывод сообщения --></div>
  </div>



  <input type="button" class="btn btn-outline-info" value="нажать для расчета платежа по кредиту" onclick="payment(1)"/>

    </div>
  </div>
<!-- Конец своего кода -->

</div>

</div>
<?php get_footer();  ?>
