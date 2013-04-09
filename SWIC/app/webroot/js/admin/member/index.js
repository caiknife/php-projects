$(function(){

//sort
$('.memberList').each(function(){    
    var $this = $(this);
    $('ul', $(this)).sortable({ 
        revert: true,
        update: function(event, ui){
            var ids = new Array();
            $('li[data]', $this).each(function(){
                ids.push($(this).attr('data'));
            });
            $.post('/admin/member/sort', {'sort': ids});
        }
    });
});

//change type
$('#type').change(function(){
    $('form').submit();
});

//delete
$('a.delete').live('click', function(){
    var $this = $(this);
    if (confirm('确认删除吗？')) {
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                $this.parents('li').remove();
            }
        }, 'text');
    }
    return false;
});

// add
$('a.add').live('click', function(){
    var $this = $(this);
    var title = $.trim($(this).prev('input').val());
    if (!title) {
        alert('请输入会员名称！');
        return false;
    }
    $.post('/admin/member/add', {'title': title, 'type_id': $this.attr('data')}, function(html){
        $this.parents('ul').prepend(html);
        $this.prevAll('input').val('');
    }, 'html');
    return false;
});

//edit
$('a.save').live('click', function(){
    var $this = $(this);
    var title = $.trim($(this).prevAll('input').val());
    if (!title) {
        alert('请输入会员名称！');
        return false;
    }
    $.post($this.attr('href'), {'title': title}, function(html){
        $this.parents('li').html($(html).html());
    }, 'html');
    return false;
});

// edit
$('a.edit').live('click', function(){
    var $this = $(this);
    $.get($this.attr('href'), function(text){
        if (text) {
            $this.parents('li').after('<li class="disn">'+$this.parents('li').html()+'</li>');
            $this.parents('li').html(text);
        }
    }, 'text');
    return false;
});

// cancel
$('a.cancel').live('click', function(){
    var $this = $(this);
    $this.parents('li').html($this.parents('li').next('li.disn').html());
    return false;
});

});