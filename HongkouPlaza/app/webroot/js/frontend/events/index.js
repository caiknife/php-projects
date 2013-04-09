$(function(){

function show_calendar() {
    $('div.alogo').each(function(){
        var alogo = $(this);
        $('a', alogo).hide().eq(0).show();
        $('span', $(this).siblings('div.alogoBtn')).hover(function(){
            if ($(this).hasClass('curr')) {
                return;
            }
            $(this).addClass('curr').siblings().removeClass('curr');
            $('a', alogo).filter(':visible').stop(true, true).fadeOut(500).parent().children().eq($(this).index()).stop(true,true).fadeIn(500);
        }, function(){
            
        });
    });
    $(".activitiesList a").colorbox({iframe:true, width:'722', height:'510'});
    $(".alogo a").colorbox({iframe:true, width:'722', height:'510'});
}

show_calendar();

$('.maySwitch a').click(function(){
    $(this).addClass('curr').siblings('a').removeClass('curr');
    var url = $(this).attr('href');
    $.get(url, function(data){
        $('ul.tbody').html($('ul.tbody', data));
        show_calendar();
        $('.alogo a').tooltip({
            track:true,
            delay:0,
            showURL:false,
            showBody:" -/ ",
            fade:90
        });
    }, 'html');
    return false;
});

$('.alogo a').tooltip({
    track:true,
    delay:0,
    showURL:false,
    showBody:" -/ ",
    fade:90
});

});