

/*===========================================================*/
/*	Stick Navigation & Separators
/*===========================================================*/

$(document).ready(function(){
		$("#navigation").sticky({topSpacing:0});
		
		$("ul#menu").click(function(){
			if( $("ul#menu li").css('display') != 'inline' ){
				if($("ul#menu").hasClass('showmenu')) {
        			$("ul#menu").removeClass('showmenu');
					$("ul#menu li").css('display','none');
    			} else {
					$("ul#menu").addClass('showmenu');
        			$("ul#menu li").css('display','block');
    			}
			}
		});
		
		$(window).resize(function() {
			if( $(window).width() >= 960 ){
				if( ($("ul#menu li").css('display' ) == 'none') || ($("ul#menu li").css('display' ) == 'block') )
					$("ul#menu li").css('display','inline');
			}
			else{
				$("ul#menu li").css('display','none');
			}
		});
		
	});
	
	
$(document).ready(function(){
		
		//.parallax(xPosition, speedFactor, outerHeight) options:
		//xPosition - Horizontal position of the element
		//inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
		//outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
		$('.separator1-bg').parallax("50%", 0);
		$('.separator2-bg').parallax("50%", 0.2);
		$('.separator3-bg').parallax("50%", 0.2);
		$('.separator4-bg').parallax("100%", 0.5);
		
		
		$('#navigation ul').localScroll(1000);
	});
	
	


/*===========================================================*/
/*	Full screen slider
/*===========================================================*/	
	
 $(function(){
            $('#maximage').maximage({
                cycleOptions: {
                    fx: 'fade',
                    speed: 1000, // Has to match the speed for CSS transitions in jQuery.maximage.css (lines 30 - 33)
                    timeout: 4000,
                    prev: '#arrow_left',
                    next: '#arrow_right',
                    pause: 1,
                    
                },
                onFirstImageLoaded: function(){
                    jQuery('#cycle-loader').hide();
                    jQuery('#maximage').fadeIn('slow');
                }
				
				
            });
    
            // Helper function to Fill and Center the HTML5 Video
            jQuery('video,object').maximage('maxcover');
    
            // To show it is dynamic html text
            jQuery('.in-slide-content').delay(1200).fadeIn();
        });	
	
	
	
/*===========================================================*/
/*	Colorbox
/*===========================================================*/	
	
$(document).ready(function(){
	//Examples of how to assign the ColorBox event to elements
	$(".group1").colorbox({rel:'group1',
		transition:"fade",
		speed: 1700, 
		onComplete:function(){
			$('.flexslider').flexslider({
			animation: "slide",
			controlNav: false,
			directionNav: true,

		  });
		}
	});		
});
			
			
			
/*===========================================================*/
/*	Portfolio Isotope
/*===========================================================*/				



jQuery(document).ready(function($){     
// Portfolio Isotope
	var container = $('.portfolio');	
	

	container.isotope({
		animationEngine : 'best-available',
	  	animationOptions: {
	     	duration: 200,
	     	queue: false
	   	},
		layoutMode: 'fitRows'
	});	

	$('#filters a').click(function(){
		$('#filters a').removeClass('active');
		$(this).addClass('active');
		var selector = $(this).attr('data-filter');
	  	container.isotope({ filter: selector });
        setProjects();		
	  	return false;
	});
		
		
		function splitColumns() { 
			var winWidth = $(window).width(), 
				columnNumb = 1;
			
			
			if (winWidth > 1600) {
				columnNumb = 6;
			} else if (winWidth > 1024) {
				columnNumb = 4;
			} else if (winWidth > 900) {
				columnNumb = 2;	
			} else if (winWidth > 479) {
				columnNumb = 2;
			} else if (winWidth < 479) {
				columnNumb = 1;
			}
			
			return columnNumb;
		}		
		
		function setColumns() { 
			var winWidth = $(window).width(), 
				columnNumb = splitColumns(), 
				postWidth = Math.floor(winWidth / columnNumb);
			
			container.find('.view').each(function () { 
				$(this).css( { 
					width : postWidth + 'px' 
				});
			});
		}		
		
		function setProjects() { 
			setColumns();
			container.isotope('reLayout');
		}		
		
		container.imagesLoaded(function () { 
			setColumns();
		});
		
	
		$(window).bind('resize', function () { 
			setProjects();			
		});

});


$(window).load(function() { 
	 if( jQuery("#filters").length > 0 ){
        jQuery("a[data-filter='*']").click();
   }
});	
	
/*===========================================================*/
/*	Google Map
/*===========================================================*/		
function initialize() {

            var latlng = new google.maps.LatLng(38.7076062,-9.1584239);
            var settings = {
                zoom: 19,
                center: latlng,
                mapTypeControl: false,
				scrollwheel: false,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                navigationControl: false,
                navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                mapTypeId: google.maps.MapTypeId.ROADMAP};
            var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
			
            var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h2 id="firstHeading" class="firstHeading">MIMAME by Ana Garcia</h2>'+
                '<div id="bodyContent">'+
                '<p>Estamos aqui, venha visitar-nos</p>'+
                '</div>'+
                '</div>';
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            
           /* var companyImage = new google.maps.MarkerImage('images/marker.png',
                new google.maps.Size(58,63),
                new google.maps.Point(0,0),
                new google.maps.Point(35,20)
            );*/
    
            
    
            var companyPos = new google.maps.LatLng(38.7076062,-9.1584239);
    
            var companyMarker = new google.maps.Marker({
                position: companyPos,
                map: map,
                // icon: companyImage,
                title:"MIMAME by Ana Garcia",
                zIndex: 3});
            
            
            
            google.maps.event.addListener(companyMarker, 'click', function() {
                infowindow.open(map,companyMarker);
            });
        }					
		
/*===========================================================*/
/*	Automatically Highlights Navigation Item
/*===========================================================*/

function calculateScroll() {

	var topRange = 400;
	var contentTop		=	[];
	var contentBottom	=	[];
	var winTop		=	$(window).scrollTop();

		//rangeTop is used for changing the class a little sooner that reaching the top of the page
		//rangeBottom is similar but used for when scrolling bottom to top
		var rangeTop	=	200;
		var rangeBottom	=	500;

		$('#navigation').find('a.intern').each(function(){
			contentTop.push( $( $(this).attr('href') ).offset().top );
			contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
		})

		$.each( contentTop, function(i){

			if ( winTop > contentTop[i] - rangeTop && winTop < contentBottom[i] - rangeBottom ){
				$('#navigation li')
				.removeClass('current')
				.eq(i).addClass('current');
			}

		})
	}

	$(document).ready(function() {

		calculateScroll()

		$(window).scroll(function(event) {

			calculateScroll();

		});

	});
	
	
	
/*===========================================================*/
/*	Carousel
/*===========================================================*/
$(function() {

            

            //	Scrolled by user interaction
            $('#news-carousel').carouFredSel({
                auto: false,
				width: '100%',
				prev : {
	       			button      : "#prev2",
	        		key         : "left",
	        		items       : 1,
	        		duration    : 750
	    			},
				next : {
					button      : "#next2",
					key         : "right",
					items       : 1,
					duration    : 750
				},				
                mousewheel: false,
                swipe: {
                    onMouse: false,
                    onTouch: true
                }
            });
			
			
			$('#testimonials-carousel').carouFredSel({
                auto: true,
				prev : {
	       			button      : "#prev",
	        		key         : "left",
	        		items       : 1,
	        		duration    : 750
	    			},
				next : {
					button      : "#next",
					key         : "right",
					items       : 1,
					duration    : 750
				},
				
                mousewheel: false,
                swipe: {
                    onMouse: false,
                    onTouch: true
                }
            });
        });
	




