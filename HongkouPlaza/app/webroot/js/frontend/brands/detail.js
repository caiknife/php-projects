$(function(){
    
$(".relatedActivities a").colorbox({iframe:true, width:'722', height:'510'});
show_sidebar();
    
});

function show_sidebar(){
    var bgs = $('ul.BigImg li');
    $(bgs).hide().eq(0).show();
    $('div.thumbnail a').click(function(){
        $('div.thumbnail a').attr('class','');
        $(this).attr('class','curr');
        $(bgs).filter(":visible").stop(true,true).fadeOut(500).parent().children().eq($(this).index()).stop(true,true).fadeIn(500);
    })
}