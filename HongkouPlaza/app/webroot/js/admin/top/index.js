$(function(){

$(".index_posters_list").sortable({
    stop: function(event, ui){
        var sort = {};
        $('li.item').each(function(i){
            sort[i] = $(this).attr('id');
        });
        $.post('/admin/top/sortbanner', {'sort':sort});
    }
});

//delete home banner
$('.index_posters_list > li > a.delete').click(function(){
	var $this = $(this);
    if (confirm('确认删除吗？')) {
		$.get($this.attr('href'), function(text){
		    if (text) {
		        $this.parent('li').remove();
		        if ($('li.item').size() < 5) {
		            $('li[class=disn]').show('fast');
		        }
		    }
		}, 'text');
	}
    return false;
});

});
