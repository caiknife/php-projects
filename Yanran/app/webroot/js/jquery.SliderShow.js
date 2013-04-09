$(document).ready(function(){
	show_sidebar();
})
function show_sidebar(){
	var pauseTime = 10000;
	var bgs = $('.idSlider>li');
	var bgs_point_str = '.idNum';
	var bgs_point_class = 'on';
	
	$(bgs).hide().eq(0).show();
	$(bgs_point_str).html('');
	for (var i=0; i<bgs.length; i++) {
		$(bgs_point_str).append('<span idx="'+i+'"></span>');
	}
	var bgs_point = $(bgs_point_str+'>span');


	var isHover = false;
	var srcTime;
	$(bgs_point).hover(function() {
		if ($(this).attr('class') == bgs_point_class) {
			return;
		}
		isHover = true;
		clearInterval(srcTime);
		setContent($(this).attr('idx'));
	},
	function(){
		isHover = false;
		clearInterval(srcTime);
		var _this = this;
		srcTime = setTimeout(function(){
			setContent(getIdx($(_this).attr('idx')));
		},pauseTime);
	});
	function getIdx(n){
		if(n == bgs.length-1){
			n=-1;
		}
		n++;
		return n;
	}
	function setContent(n){
		$(bgs).filter(":visible").stop(true,true).fadeOut(500).parent().children().eq(n).stop(true,true).fadeIn(500);
		$(bgs_point).each(function(k,v){
			$(this).removeClass(bgs_point_class);
			if (k==n) {
				$(this).addClass(bgs_point_class);
			}
		});
		if (!isHover) {
			srcTime = setTimeout(function(){
				setContent(getIdx(n));
			},pauseTime);
		}
	};
	setContent(0);
}