jQuery.noConflict();

jQuery(function(MT$) {

	// Options
	// var $tooltip_visibility = parseInt(MT$('#tooltip_visibility').css("top"));
//	var $navigation_position = parseInt(MT$('#navigation_position').css("top"));
    var $fade1 = parseInt(MT$('#fade1').css("top"));
	var $tooltip_visibility = parseInt(MT$('#tooltip_visibility').css("top"));
	var $menuOpened = parseInt(MT$('#menuOpened').css('top'));

//----------------
        if ($fade1) {  // variable FADE_1 START	
                      
        // FADE_IN Main page
            MT$(document).ready(function (){
          MT$('body').css('display', 'none').hide().fadeIn(1300);
        });  // FADE_1      
  };   // variable FADE_1 END
  
//----------------

	// Fluid images
	MT$('img[alt~="image"]').not('.lt-ie9 .image-left img, .lt-ie9 .image-right img').css({
		'max-width': '100%',
		'height': 'auto',
		'width': '100%'
	}).each(function() {
		this.alt = this.alt.replace(/(^image\s*)(.*)?/, "$2");
	});

	// Responsive menu
	if ($menuOpened) {
		MT$('#navcontainer2menu, ').toggleClass('opened');
	};

	/*******Animated top*********/
	// #up ID
	MT$("#up").hide();
	// #up animation
	MT$(function() {
		MT$(window).scroll(function() {
			if (MT$(this).scrollTop() > 350) {
				MT$('#up').slideDown(480);
				//MT$('#up').fadeIn(350);  /*you can choose SLIDE or FADE, COMMENT / UN-COMMENT */    			    				
			} else {
				MT$('#up').slideUp(180);
				//MT$('#up').fadeOut(350);  /*you can choose SLIDE or FADE, COMMENT / UN-COMMENT */				
			}
		});
		// scroll body to 0px on click
		MT$('#up a').click(function() {
			MT$('body,html').animate({
				scrollTop: 0,
			},
			240);
			return false;
		});
	});
	/*******Animated top*********/

	/*******accordion Animation*********/
	// Added a .parent class to let the designer style it
	MT$("#navcontainer2 li").has("ul").addClass("parent");

	MT$('#navcontainer2menu, #navcontainer2close').click(function toggleResponsiveMenu() {
		if ($menuOpened) {
			MT$(this).toggleClass('opened');
			MT$('#navcontainer2').stop(true, true).slideUp(400);
			MT$('#navcontainer2 > ul').stop(true, true).animate({
				opacity: 0
			},
			400);
			//                    MT$('#navcontainer2').stop(true, true).animate({
			//                        'padding-top': '0px'
			//                    });
			$menuOpened = 0;
		} else {
			MT$(this).toggleClass('opened');
			MT$('#navcontainer2').stop(true, true).slideDown(400);
			MT$('#navcontainer2 > ul').stop(true, true).animate({
				opacity: 1
			},
			400);
			//                    MT$('#navcontainer2').stop(true, true).animate({
			//                        'padding-top': '33px'
			//                    });
			$menuOpened = 1;
		}
	});
	/*******accordion Animation end*********/

	/*******Tooltip*********/
	if ($tooltip_visibility) {
		/*
     * to the following function we are passing to kind of arguments, in the form of CSS selectors
     * MT$('string_1, string_2, sting_n') and .not('string_a, string_b, string_x')
     * 'string_1, string_2, sting_n' are selectors to which apply the tooltip
     * 'string_a, string_b, string_x' are selectors to which "not" to apply the tooltip
     */
		MT$('#contentContainer a, #sidebar a, #extraContainer1 a, #extraContainer2 a, #extraContainer3 a, #extraContainer4 a').not('.blog-entry-tags a, .blog-tag-cloud a, .rw-sitemap ul a, .thumbnail-frame a, .social a').tipsy({
			fade: true,
			// fade tooltips in/out?
			gravity: 'n',
			// gravity: nw | n | ne | w | e | sw | s | se
			opacity: 0.90 // opacity of tooltip
		});
	}
	/*******Tooltip********* END/

	/**************************/
	/* Start of Animated Menu */
	/**************************/
	MT$('#navcontainer ul ul').css('display', 'none'); //was none
	// Let's first check for the option set
	/* We now declare the function we'll use in the hoverIntent function later */
	function animateMenu() {
		MT$(this)
		// Added an .open class to let the designer style it 
		.toggleClass("open").find(">ul").stop(true, true).animate({
			opacity: 'toggle',
			//                    height: 'toggle',
			//                    width: 'toggle',
			'padding-top': 'toggle',
			'padding-bottom': 'toggle'
			//                    padding: 'toggle'
		},
		75, 'linear');
	}

	// Added a .parent class to let the designer style it
	MT$("#navcontainer li").has("ul").addClass("parent").hoverIntent(animateMenu, animateMenu);
	//   MT$("#navcontainer3 li").has("ul").addClass("parent").hoverIntent(animateMenu,animateMenu);
	/************************/
	/* End of Animated Menu */
	/************************/
	
	/* * Function to generate "open in new window" link as W3C compliant  by  seydoggy.com */ 
	
//	function externalLinks() { if (!document.getElementsByTagName) 
//	return; var anchors = document.getElementsByTagName("a"); for (var i=0; i<anchors.length; i++)
//	 { var anchor = anchors[i]; 
//	 if (anchor.getAttribute("href") && anchor.getAttribute("rel") == "external")
//	  anchor.target = "_blank"; } } window.onload = externalLinks; 

		/* * Function to generate "open in new window" link as W3C compliant END */ 
	
});