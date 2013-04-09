$(function(){

var dates = $("#EventStartDate, #EventEndDate").datepicker({
    showOn : 'both',
    showButtonPanel: true,
    buttonImage: '/img/admin/time.png',
    buttonImageOnly: true,
    numberOfMonths: 3,
    onSelect: function(selectedDate) {
        var option = this.id == "EventStartDate" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
    }
});

});