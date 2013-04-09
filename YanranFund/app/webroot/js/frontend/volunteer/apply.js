$(function(){

var count = 5;
var timer;

// fancybox    
$('.fancybox').fancybox({
    maxWidth: 940,
    minWidth: 910,
    padding: 5
});
$('.fancybox2').fancybox({
    beforeShow: function(){
        timer = setInterval(function(){
            $('.count').html(count);
            count--;
            if (count < 0) {
                self.location = $('a.home').attr('href');
            }
        }, 1000);
    },
    afterClose: function(){
        clearAll();
    }
});    

var clearAll = function(){
    count = 5;
    clearInterval(timer);
    $(':input').val('');
    $('input[type=checkbox]').attr('checked', false);
    $('#FormVolunteerHasSick无').click();
    $('#FormVolunteerHasVolunteer无').click();
    $('#FormVolunteerHasSickNo').click();
    $('#FormVolunteerHasVolunteerNo').click();
    $.fancybox.close();
};

var validation = function() {
    var success = true;
    $(':text:visible[require]').each(function(i){
        if (!$.trim($(this).val())) {
            success = false;
        }
    });
    $('textarea:visible[require]').each(function(i){
        if (!$.trim($(this).val())) {
            success = false;
        }
    });
    var types = ['service', 'term', 'time', 'via'];
    for (t in types) {
        var count = 0;
        $('input[id^='+types[t]+']').each(function(i){
            if ($(this).attr('checked')) {
                count++;
            }
        });
        if (count==0) {
            success = false;
        }
    }
    return success;  
};

//show    
$('a.fancybox2').click(function(){
    if (!validation()) {
        var lang = $('body').attr('lang');
        var alerts = {
            'cn': '所有项目都必须填写！',
            'en': 'Every item must be filled!'
        };
        alert(alerts[lang]);
        return false;
    }
    var result = $.ajax({
        async: false, 
        type: 'POST', 
        url: $('form').attr('action'), 
        data: $('form').serialize()}
    ).responseText;
    return true;
});  

//close
$('a.close').click(function(){
    clearAll();
    return false;
});

// put radio button inside its label
$('label[for]').each(function(i){
    $(this).prepend($(this).prev('input'));
    $(this).prev('input').remove();
});

// hehehe
$('#FormVolunteerHasSick无').click(function(){
    $('#FormVolunteerHasSickComment').hide();
}).click();

$('#FormVolunteerHasSick有').click(function(){
    $('#FormVolunteerHasSickComment').show();
});

$('#FormVolunteerHasVolunteer无').click(function(){
    $('#FormVolunteerHasVolunteerComment').hide();
}).click();

$('#FormVolunteerHasVolunteer有').click(function(){
    $('#FormVolunteerHasVolunteerComment').show();
});

$('#FormVolunteerHasSickNo').click(function(){
    $('#FormVolunteerHasSickComment').hide();
}).click();

$('#FormVolunteerHasSickYes').click(function(){
    $('#FormVolunteerHasSickComment').show();
});

$('#FormVolunteerHasVolunteerNo').click(function(){
    $('#FormVolunteerHasVolunteerComment').hide();
}).click();

$('#FormVolunteerHasVolunteerYes').click(function(){
    $('#FormVolunteerHasVolunteerComment').show();
});

});
