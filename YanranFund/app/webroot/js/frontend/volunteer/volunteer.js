$(function(){
    
$('.subVolunteer a').click(function(){
    var type = $(this).attr('type');
    $(this).addClass('curr').siblings('a').removeClass('curr');
    $('.volunteerList[type='+type+']').show().siblings('ul').hide();
    return false;
}).first().click();    
    
});
