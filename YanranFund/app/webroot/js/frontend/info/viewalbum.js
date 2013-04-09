$(function(){
    
$('.galleryList a').fancybox({
    padding : 0,
    closeBtn  : false,
    arrows    : false,
    nextClick : true,
    helpers : {             
        overlay : {
                speedIn : 500,
                opacity : 0.7
        },
        thumbs : {
            width  : 50,
            height : 50
        }
    }
});    
    
});
