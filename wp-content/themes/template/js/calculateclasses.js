//для подсчета шанса на выигрыш на JS
class Game {
calculatechance(min,max){
let answermin=1;//начальное значение факториала
let answermax=max;//начальное значение факториала
let x;//промежуточная величина для расчета факториала
let count=1;//счетчик операций
let rez,rez1;//результаты
//минимальный факториал
for(x=1;x<=min;x++){
answermin=answermin*x;
}
//часть максимального факториала
for(answermax=max,--max;count<min;count++,max--){
answermax=answermax*(max);
}
rez=answermax/answermin;
rez1=answermin/answermax;
//ответ
return rez;
}

// метод класса
oneChance(a,b) {
//a - сколько значений выбрать
//b - общее количество значений
let rez,rez1;//результаты
a=Number(a);
b=Number(b);
rez=this.calculatechance(a,b);
if ((rez <= Number.MIN_VALUE)|(rez >= Number.MAX_VALUE)) {
 return ("К сожалению, расчет с такими значениями невозможен!")
}
rez1=1/rez;
let RegExp=/^[\d]+$/;//проверка на только цифры с начала и до конца
if((RegExp.test(a)==false)|(RegExp.test(b)==false)|(a>b)|(a<1)){
 return('Введены некорректные значения!');
}//45 из 900 покажет NAN
else {
   return("Вероятность выбрать "+a+" предмета(-ов) из "+b+" составляет 1 к "+rez+" или "+rez1);
}}

// метод класса
 doubleChance(a,b,a1,b1) {
//a,a1 - сколько значений выбрать - при выборе значений в двух массивах данных
//b,b1 - общее количество значений - при выборе значений в двух массивах данных
let rez,rez1,rez2,rez3;
a=Number(a);
b=Number(b);
a1=Number(a1);
b1=Number(b1);
rez=this.calculatechance(a,b);
rez1=this.calculatechance(a1,b1);

if ((rez <= Number.MIN_VALUE)|(rez >= Number.MAX_VALUE)) {
 return ("К сожалению, расчет с такими значениями невозможен!")
}
if ((rez1 <= Number.MIN_VALUE)|(rez1 >= Number.MAX_VALUE)) {
 return ("К сожалению, расчет с такими значениями невозможен!")
}
rez2=rez*rez1;
rez3=1/rez2;
let RegExp=/^[\d]+$/;//проверка на только цифры с начала и до конца
if((RegExp.test(a)==false)|(RegExp.test(b)==false)|(a>b)|(a<1)){
 return('Введены некорректные значения!');
}
else if((RegExp.test(a1)==false)|(RegExp.test(b1)==false)|(a1>b1)|(a1<1)){
 return('Введены некорректные значения!');
}
else {
return("Вероятность совпадения значений в двух полях 1 из "+rez2+" или "+rez3);
}
}
}
