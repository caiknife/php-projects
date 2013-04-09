$(function(){
    
$('form').jqTransform({imgPath:'/css/frontend/img/'});

// date picker
$('#ReservationBirthday').datepicker({
    //showOn : 'both',
    showButtonPanel: true,
    numberOfMonths: 3,
    buttonImage: '/images/time.png',
    buttonImageOnly: true
});

// date picker
$('#ReservationReservedDate').datepicker({
    //showOn : 'both',
    showButtonPanel: true,
    numberOfMonths: 3,
    buttonImage: '/images/time.png',
    buttonImageOnly: true
});    

$(':submit').click(function(){
    var errorCheck = false;
    var errorMessage = '';
    var lang = $('form').attr('lang');
    var message = {'cn':'请填写', 'en':'please write '}
    $(':input[require=1]').each(function(){
        if (!$.trim($(this).val())) {
            errorCheck = true;            
            errorMessage = $('strong', $(this).parents('div.input')).text();
            return false;
        }
    });
    if (errorCheck) {
        alert(message[lang]+'['+errorMessage+']');
        return false;
    }
});
    
});
