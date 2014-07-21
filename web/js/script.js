
function showSplash(){
	  
};
function hideSplash(){   
	 $(".block1").stop(true).animate({marginLeft:-470},800,'easeOutExpo'); 
	 setTimeout(function () {					
  		$('.extra').css({display:'block'}).stop(true).animate({width:712},800,'easeOutExpo');
	}, 300);
	  
};
function hideSplashQ(){
	$(".block1").css({marginLeft:-470});
	$('.extra').css({display:'block',width:712});
};

///////////////////

$(document).ready(function() {
	////// sound control	
	$("#jquery_jplayer").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				mp3:"music.mp3"
			});
			//$(this).jPlayer("play");
			var click = document.ontouchstart === undefined ? 'click' : 'touchstart';
          	var kickoff = function () {
            $("#jquery_jplayer").jPlayer("play");
            document.documentElement.removeEventListener(click, kickoff, true);
         	};
          	document.documentElement.addEventListener(click, kickoff, true);
		},
		
		repeat: function(event) { // Override the default jPlayer repeat event handler				
				$(this).bind($.jPlayer.event.ended + ".jPlayer.jPlayerRepeat", function() {
					$(this).jPlayer("play");
				});			
		},
		swfPath: "js",
		cssSelectorAncestor: "#jp_container",
		supplied: "mp3",
		wmode: "window"
	});
	
	////// submenu
	$('ul#menu').superfish({
      delay:       600,
      animation:   {height:'show'},
      speed:       600,
      autoArrows:  false,
      dropShadows: false
    });
	
	//// submenu
	$('.submenu').find('b').css({opacity:0});	
	$('.submenu a').hover(function(){
		$(this).find('b').stop().animate({opacity:1},400);
	}, function(){		
		$(this).find('b').stop().animate({opacity:0},400);		
	});
	
	/////// icons
	$(".icons li").find("a").css({opacity:0.7});
	$(".icons li a").hover(function() {
		$(this).stop().animate({opacity:1 }, 400, 'easeOutBack');		    
	},function(){
	    $(this).stop().animate({opacity:0.7 }, 400, 'easeOutBack' );		   
	});
	
	//////// read more
	$('.button1 b').css({opacity:'0'});	
	$('.button1').hover(function(){
		$(this).find('b').stop().animate({opacity:'1'});							 
	}, function(){
		$(this).find('b').stop().animate({opacity:'0'});							 
	});
	
	///////// gallery	
	$('.photo1').find('span').css({opacity:0});	
	$('.photo1 > a').hover(function(){
		$(this).find('span').stop().animate({opacity:0.5},400);							
	}, function(){
		$(this).find('span').stop().animate({opacity:0},400);								
	});	
	
	///////// video	
	$('.video1').find('span').css({opacity:0});	
	$('.video1 > a').hover(function(){
		$(this).find('span').stop().animate({opacity:0.5},400);							
	}, function(){
		$(this).find('span').stop().animate({opacity:0},400);								
	});	
	
	
	
	
	
	
	

	
	
	
	
	
	
	// for lightbox
	 $("a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'dark_square',social_tools:false,allow_resize: true,default_width: 500,default_height: 344});
		
 });  ////////




$(window).load(function() {	
						

	
	//content switch	
	
	var content = $('#content');
	var h_cont_min=670;
	var h_cont=0;
	
	//$('#content>ul>li').eq(0).css({height:h_cont_min});	
	
	$(' > ul > li', content).each(function(){
			$(this).data({height:$(this).height()})								   
	})
	
	content.tabs({
        show:1,
        preFu:function(_){
    	   _.li.css({display:'none',opacity:0});
		   $('.extra').css({display:'none',width:100});
        },
        actFu:function(_){            
            if(_.curr){
				_.curr.css({display:'block',opacity:0}).stop().delay(800).animate({opacity:1},800, 'swing');               
                h_cont=_.curr.data('height');				
				if(h_cont > h_cont_min){
					$('#content').stop().animate({height:h_cont},800)
				}
				else {$('#content').stop().animate({height:h_cont_min},800)}	
            }   
    		if(_.prev){
				_.prev.stop().animate({opacity:0},800, 'swing', function(){ _.prev.css({display:'none',opacity:0}); });
            }			
			//console.log(_.pren, _.n);			
            if (_.n == 0){
                showSplash();
				h_cont=h_cont_min;
            }
            if ((_.pren == 0) && (_.n>0)){
                hideSplash();  
            }
			if ( (_.pren == undefined) && (_.n >= 1) ){  //if at start loading subpage (_.n >= 0)
                _.pren = -1;
                hideSplashQ();
            }
  		}
    });
	//content switch navs
	var nav = $('.menu');	
    nav.navs({
		useHash:true,
        defHash: '#!/page_SPLASH',
        hoverIn:function(li){            
			$('> a span',li).stop().animate({color:'#3b4248'},400,'swing');
			$('> a b',li).stop().animate({opacity:1},400,'swing');
        },
        hoverOut:function(li){            
            $('> a span',li).stop().animate({color:'#8c9396'},400,'swing');            
			$('> a b',li).stop().animate({opacity:0},400,'swing');            
        }
    })    
    .navs(function(n){	
   	    content.tabs(n);
   	});	
	//////////////////////////
	
	
}); /// load

////////////////

$(window).load(function() {	
	setTimeout(function () {					
  		$('.spinner').fadeOut();
		$('body').css({overflow:'inherit'});

	}, 0);	
	var qwe = setTimeout(function () {$("#jquery_jplayer").jPlayer("play");}, 2000);	
	
});