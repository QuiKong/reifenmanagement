var h3 = document.getElementsByTagName("h3");
var ttxt= "nächste Temperaturemessung in:";
var elem = document.getElementById("show_the_timer").innerHTML = ttxt;

h3[0].innerHTML = "";
h3[0].innerHTML = "";

var sec         = 1800,
    countDiv    = document.getElementById("timer"),
    secpass,
    countDown   = setInterval(function () {
        'use strict';
        secpass();
    }, 1000);

function secpass() {
    'use strict';

    var min     = Math.floor(sec / 60),
        remSec  = sec % 60;

    if (remSec < 10) {

        remSec = '0' + remSec;

    }
    if (min < 10) {

        min = '0' + min;

    }
    countDiv.innerHTML = min + ":" + remSec;

    if (sec > 0) {

        sec = sec - 1;

    } else {

        clearInterval(countDown);

        //countDiv.innerHTML = 'countdown done';
        countDiv.innerHTML = '';

    }
}


var timer_input_link=document.getElementById('timer_input_link');
var timer_input=document.getElementById('time_input_1');
timer_input_link.addEventListener('click',function (){
    document.getElementById('time_input_1').classList.remove('d-none');
    document.getElementById('timer_options').classList.remove('d-none');
    if (document.getElementById('time_input_1').value!=''){
        document.getElementById('time_input_1').value;
        console.log(   document.getElementById('time_input_1').value);
    }

})




debugger
let isRunning     = false;
let interval;
let timerTime     = 0;
const timerDisplay = document.querySelector('.time_left');
const endTime = document.querySelector('.end_time');
const buttons = document.querySelectorAll('[data-time]');

let countdown;
var test;

function timer(seconds) {

    clearInterval(countdown);

    var now = Date.now();

    var then = now + seconds * 1000;
    var then = now + seconds * 1000;
    test=then;
    displayTimeLeft(seconds);

    displayEndTime(then);


    countdown = setInterval(() => {
        const secondsLeft = Math.round((then - Date.now()) / 1000);
        console.log(secondsLeft);
        if(secondsLeft < 0) {
            clearInterval(countdown);
            return;
        }
        displayTimeLeft(secondsLeft);
    }, 1000);
}

function displayTimeLeft(seconds) {
    const minute = Math.floor(seconds / 60);
    const remainderSeconds = seconds % 60;
    const display = `${minute}:${remainderSeconds < 10 ? '0' : ''}${Math.floor(remainderSeconds)}`;
    timerDisplay.textContent = display;
}

function displayEndTime(timestamp) {
    const end = new Date(timestamp);
    const hour = end.getHours();
    const adjustedHour = hour > 12 ? hour - 12 : hour;
    const minutes = end.getMinutes();
    endTime.textContent = ``;
}

function startTimer() {
    isRunning=true;
    const seconds = parseInt(this.dataset.time);
    timer(seconds);
}

buttons.forEach(button => button.addEventListener('click', startTimer));

/*document.customForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const mins = this.minutes.value;
    console.log(mins);
    timer(mins * 60);
    this.reset();

});*/
let timer_stop=document.getElementById('timer_options_stop');
let timer_reset=document.getElementById('timer_options_reset');
let timer_foreword=document.getElementById('timer_options_foreword');
timer_stop.addEventListener('click',function (){



    //todo

    if (!isRunning) return;
    isRunning = false;
    clearInterval(countdown);
})
timer_reset.addEventListener('click',function (){
    timer(0);
    timerDisplay.innerHTML='0:00';

})
timer_foreword.addEventListener('click',function (){
    const seconds = 122;
    timer(seconds);
})
window.addEventListener('load', function() {
    //todo if you need to change the time,you have to change --1800000-- to your time
    setTimeout(myFunction, 1800000)
})
function myFunction() {
    confirm("Erinnerung zum Messen der Strecken und Lufttemperaturen!!\n");
}

