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

//функция получения двоичного числа
function divide(i){
let original=document.getElementsByClassName('valueDecimal')[i].value;
let result_value=document.getElementsByClassName('forResult')[i].innerHTML;
let RegExp=/^[\-]?[\d]+$/;//проверка на только цифры с начала и до конца
if(RegExp.test(original)==false){//если не число
result_value="Введено некорректное значение";
}
else{
var sign;//знак вводимого числа
if(original<0){//если число отрицательное
  sign=1;
  original = original.substr(1);//убираем символ знака числа
}
  else {//если число положительное или равно 0
    sign=0;
}
var answer=[];     // массив для помещения в него перевернутого ответа
var q=0;
do{
//получить остаток от деления
var ostatok=original%2;
answer[q]=ostatok;             //добавить остаток в переменную вывода
q++; //увеличить номер элемента массива
original/=2;                 //разделить исходное значение на 2 и сделать ответ исходным значением
var qwerty=original;         //целый или дробный результат поместить в переменную
original=Math.floor(qwerty);       //округляем до меньшего целого значения
}while(original!=0)
let len=answer.length;
let addzero;
if(len<=8){
  addzero=8-len;
}
else if (len>8&&len<=16) {
  addzero=16-len;
}
else if (len>16&&len<=32) {
  addzero=32-len;
}
else if (len>32) {
  addzero=64-len;
}
for(let i=1;i<=addzero;i++){//добавить символы 0 в массив
  answer.push("0");
  }
  //замена нулей на единицы и наоборот для отрицательных значений
  if(sign==1){
    for(let i=0;i<answer.length;i++){
      if(answer[i]==1){
        answer[i]=0;
      }
      else if(answer[i]==0){
        answer[i]=1;
      }
      }
      //увеличение на 1
      var b=1;
      var j=0;
do{
  answer[j]+=b;
  //alert(answer[j]);
   if(answer[j]==2){
      b=1;
      answer[j]=0;
      j++;
    }
    else {
      b=0;
    }
}while(b==1);
  }
let rev=''; //строка, в который добавляются символы
let aa=answer.length; //номер последнего символа в обрабатываемой строке/переменной
aa--;

//вывод элементов массива
for(xx=aa;xx>=0;xx--){
rev+=answer[xx];
}
document.getElementsByClassName('forResult')[i].innerHTML=rev;
}
}
