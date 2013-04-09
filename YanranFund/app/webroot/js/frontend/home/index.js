$(function(){
   
var count = 0;

var timer = setInterval(function(){
    count++;
    if (count > 2) {
        count = 0;
    }
    $('.wrap img:eq('+count+')').fadeIn(2000).siblings('img').fadeOut(2000);
}, 7000);
    
})