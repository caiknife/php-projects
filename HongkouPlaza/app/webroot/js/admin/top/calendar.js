$(function(){

$(".index_calendar_list").sortable({
    stop: function(event, ui){
        var sort = {};
        $('li.item').each(function(i){
            sort[i] = $(this).attr('id');
        });
        $.post('/admin/top/sortevent', {'sort':sort});
    }
});

//delete home banner
$('.index_calendar_list > li > a.delete').click(function(){
    var $this = $(this);
    if (confirm('确认删除吗？')) {
        $.get($this.attr('href'), function(text){
            if (text) {
                $this.parent('li').remove();
                if ($('li.item').size() < 3) {
                    $('li[class=disn]').show('fast');
                }
            }
        }, 'text');
    }
    return false;
});

});
