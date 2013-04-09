$(function(){
    
$('button[type=submit]').click(function(){
    var pos = $('#PostBanner').val().lastIndexOf(".");
    var lastname = $('#PostBanner').val().substring(pos, $('#PostBanner').val().length); 
    if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
        alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
        return false;
    }
});    
    
});
