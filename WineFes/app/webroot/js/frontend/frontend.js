$('document').ready(function(){
    $('#header .menu li').hover(function() {
        $(this).children('div.sub-meun').animate({"opacity": "show"},"fast");
    },
    function(){
        $(this).children('div.sub-meun').animate({"opacity": "hide"},"fast");
    });
});