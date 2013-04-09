eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(6($){$.1g.1w=6(o){o=$.1f({r:n,x:n,N:n,17:q,J:n,L:1a,16:n,y:q,u:12,H:3,B:0,k:1,K:n,I:n},o||{});8 G.R(6(){p b=q,A=o.y?"15":"w",P=o.y?"t":"s";p c=$(G),9=$("9",c),E=$("10",9),W=E.Y(),v=o.H;7(o.u){9.1h(E.D(W-v-1+1).V()).1d(E.D(0,v).V());o.B+=v}p f=$("10",9),l=f.Y(),4=o.B;c.5("1c","H");f.5({U:"T",1b:o.y?"S":"w"});9.5({19:"0",18:"0",Q:"13","1v-1s-1r":"S","z-14":"1"});c.5({U:"T",Q:"13","z-14":"2",w:"1q"});p g=o.y?t(f):s(f);p h=g*l;p j=g*v;f.5({s:f.s(),t:f.t()});9.5(P,h+"C").5(A,-(4*g));c.5(P,j+"C");7(o.r)$(o.r).O(6(){8 m(4-o.k)});7(o.x)$(o.x).O(6(){8 m(4+o.k)});7(o.N)$.R(o.N,6(i,a){$(a).O(6(){8 m(o.u?o.H+i:i)})});7(o.17&&c.11)c.11(6(e,d){8 d>0?m(4-o.k):m(4+o.k)});7(o.J)1p(6(){m(4+o.k)},o.J+o.L);6 M(){8 f.D(4).D(0,v)};6 m(a){7(!b){7(o.K)o.K.Z(G,M());7(o.u){7(a<=o.B-v-1){9.5(A,-((l-(v*2))*g)+"C");4=a==o.B-v-1?l-(v*2)-1:l-(v*2)-o.k}F 7(a>=l-v+1){9.5(A,-((v)*g)+"C");4=a==l-v+1?v+1:v+o.k}F 4=a}F{7(a<0||a>l-v)8;F 4=a}b=12;9.1o(A=="w"?{w:-(4*g)}:{15:-(4*g)},o.L,o.16,6(){7(o.I)o.I.Z(G,M());b=q});7(!o.u){$(o.r+","+o.x).1n("X");$((4-o.k<0&&o.r)||(4+o.k>l-v&&o.x)||[]).1m("X")}}8 q}})};6 5(a,b){8 1l($.5(a[0],b))||0};6 s(a){8 a[0].1k+5(a,\'1j\')+5(a,\'1i\')};6 t(a){8 a[0].1t+5(a,\'1u\')+5(a,\'1e\')}})(1x);',62,96,'||||curr|css|function|if|return|ul|||||||||||scroll|itemLength|go|null||var|false|btnPrev|width|height|circular||left|btnNext|vertical||animCss|start|px|slice|tLi|else|this|visible|afterEnd|auto|beforeStart|speed|vis|btnGo|click|sizeCss|position|each|none|hidden|overflow|clone|tl|disabled|size|call|li|mousewheel|true|relative|index|top|easing|mouseWheel|padding|margin|200|float|visibility|append|marginBottom|extend|fn|prepend|marginRight|marginLeft|offsetWidth|parseInt|addClass|removeClass|animate|setInterval|0px|type|style|offsetHeight|marginTop|list|jCarouselLite|jQuery'.split('|'),0,{}))

var slider_show = function(){
    var pauseTime = 10000;
    var bgs = $('#idSlider>li');
    var bgs_point_str = '#idNum';
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

var rotate_events = function() {
    $(".right > ul > li > a").colorbox({iframe:true, width:'722', height:'510'});
    var setEventsTimer = function() {
        var current = $(".right > ul > li.active");
		var first = $(".right > ul > li:first");
		if (current.next().length > 0) {
			$('a > img', current.next().siblings('li').removeClass('active').addClass('deactive')).stop(true, true).animate({marginTop: -100}, 500);
            $('a > img', current.next().removeClass('deactive').addClass('active')).stop(true, true).animate({marginTop: 0}, 500);
		} else {
			$('a > img', first.siblings('li').removeClass('active').addClass('deactive')).stop(true, true).animate({marginTop: -100}, 500);
            $('a > img', first.removeClass('deactive').addClass('active')).stop(true, true).animate({marginTop: 0}, 500);
		}
    };
    var eventsTimer = setInterval(setEventsTimer, 3000);
	$(".right > ul > li").hover(function(){
		clearInterval(eventsTimer);
		$('a > img', $(this).siblings('li').removeClass('active').addClass('deactive')).stop(true, true).animate({marginTop: -100}, 500);
		$('a > img', $(this).removeClass('deactive').addClass('active')).stop(true, true).animate({marginTop: 0}, 500);
	}, function(){
		eventsTimer = setInterval(setEventsTimer, 3000);
	});
}

var setBrandsTimer = function() {
    var current = $(".btnIbrandList > span.curr");
	var first = $(".btnIbrandList > span:first");
	if (current.next().length > 0) {
		current.mouseout();
		current.next().mouseover();
	} else {
		current.mouseout();
		first.mouseover();			
	}
};
var brandsTimer = setInterval(setBrandsTimer, 7000);

var rotate_brands = function(){
    $(".btnIbrandList span").each(function(i){
		$(this).hover(function(){
            if ($(this).hasClass('curr')) {
				return;
			}
			//clearInterval(brandsTimer);
            $(this).addClass('curr').siblings().removeClass('curr');
			$('.ibrandList li').each(function(n){
			    var position = (n-i) * 300;
				$(this).stop(true, true).animate({marginLeft:position}, 500);
			});
        }, function(){
            //brandsTimer = setInterval(setBrandsTimer, 7000);
        });
	});
}

$(function(){
    
slider_show();
rotate_events();
rotate_brands();

$('.switch ul li').click(function(){
	var klass = $(this).attr('class');
	if (/curr$/.test(klass)) {
		return false;
	}
	$(this).removeClass(klass).addClass(klass+'_curr').siblings('li').each(function(){
		var selfKlass = $(this).attr('class');
		var newKlass = /curr$/.test(selfKlass) ? selfKlass.substr(0, 4) : selfKlass ; 
		$(this).removeClass(selfKlass).addClass(newKlass);
	});
	var url = $(this).attr('name');
	$.get(url, function(data){
		$('ul.ibrandList').fadeOut('slow', function(){
			$(this).replaceWith($('ul.ibrandList', data).fadeIn('slow'));		
		});
		$('div.btnIbrandList').fadeOut('slow', function(){
			$(this).replaceWith($('div.btnIbrandList', data).fadeIn('slow', function(){
				rotate_brands();
			}));
		});
	}, 'html');
	return false;
});

$('.switch ul li:first').click();

var count = $('.switch ul li').length - 5;
var current = 5;
$('a.btnLeft').click(function(){
	if (current >= count) {
		return false;
	}
	$('.switch ul li:visible:last').hide('fast');
	$('.switch ul li:visible:first').prev().show('fast');
	current++;
	return false;
});

$('a.btnRight').click(function(){
	if (current <= 0) {
		return false;
	}
	$('.switch ul li:visible:first').hide('fast');
	$('.switch ul li:visible:last').next().show('fast');	
	current--;
	return false;
});

$(".weibo-jcarousellite").jCarouselLite({  
    vertical: true,  
    visible: 3,  
    auto:500,  
    speed:2000  
});  
      
});