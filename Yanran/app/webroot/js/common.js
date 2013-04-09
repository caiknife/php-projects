$('document').ready(function(){
	$('#header .menu li').hover(function() {
		$(this).children('dl.sub-meun').animate({"opacity":"show"},"fast");
	},
	function(){
		$(this).children('dl.sub-meun').animate({"opacity":"hide"},"fast");
	});
});

