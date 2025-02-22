function factorial_function(i){
let amount_value=document.getElementsByClassName('forSingleDataAmount')[i].value;
let common_value=document.getElementsByClassName('forSingleDataAllAmount')[i].value;
amount_value=Number(amount_value);
common_value=Number(common_value);
let answer=1;//для результата вычислений
let answerback=common_value;//для результата вычислений
let RegExp=/^[\d]+$/;//проверка на только цифры с начала и до конца
if((RegExp.test(amount_value)==false)||(RegExp.test(common_value)==false)||(amount_value>common_value)){
  alert("Введено некорректное значение"); // true);
}
else {//если введены нормальные значения
let x;//промежуточная величина для расчета факториала
let y=1;//промежуточная величинадля расчета факториала наоборот
let z;//счетчик
for(x=1;x<=amount_value;x++){
answer=answer*x;
}
for(z=amount_value;z>0;z--){
  y=answerback*y;
  answerback--;
  }
answerback=y;
if(amount_value==common_value){
answer=answerback=1;
}
document.getElementsByClassName('forSingleDataResult')[i].textContent='Вероятность выбора набора определенных значений составляет:1 из '+answerback/answer;
}
}

function factorial_function_double(i){
let amount_value=document.getElementsByClassName('forDoubleDataAmount')[i].value;
let common_value=document.getElementsByClassName('forDoubleDataAllAmount')[i].value;
amount_value=Number(amount_value);
common_value=Number(common_value);
let answer=1;//для результата вычислений
let answerback=common_value;//для результата вычислений
let RegExp=/^[\d]+$/;//проверка на только цифры с начала и до конца
if((RegExp.test(amount_value)==false)||(RegExp.test(common_value)==false)||(amount_value>common_value)){
  alert("Введено некорректное значение"); // true);
}
else {//если введены нормальные значения
let x;//промежуточная величина для расчета факториала
let y=1;//промежуточная величинадля расчета факториала наоборот
let z;//счетчик
for(x=1;x<=amount_value;x++){
answer=answer*x;
}
for(z=amount_value;z>0;z--){
  y=answerback*y;
  answerback--;
  }
answerback=y;
if(amount_value==common_value){
answer=answerback=1;
}
}
let ans=answerback/answer;
return ans;
}

function factorial_function_double_all(i){
let  ans1=factorial_function_double(i)*factorial_function_double(i+1);
document.getElementsByClassName('forDoubleDataResult')[i].textContent='Вероятность выбора набора определенных значений в двух полях составляет:1 из '+ans1;
}

function factorial_function_double_all_small(i){
let  ans1=factorial_function_double(i)*factorial_function_double(i+1);
document.getElementsByClassName('forDoubleDataResult')[i-1].textContent='Вероятность выбора набора определенных значений в двух полях составляет:1 из '+ans1;
}
