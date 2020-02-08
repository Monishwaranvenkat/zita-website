var countDownDate = new Date("feb 20, 2020 15:37:25").getTime();
var c=0;
setInterval(function() {
	
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  time=days +"d  "+hours + "h "+minutes + "m "+seconds + "s ";
  document.getElementById("timer").innerText = time;
   document.getElementById("timer1").innerText = time;
    document.getElementById("timer2").innerText = time;
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "EXPIRED";
     document.getElementById("timer1").innerHTML = "EXPIRED";
      document.getElementById("timer2").innerHTML = "EXPIRED";
  }
}, 1000);
