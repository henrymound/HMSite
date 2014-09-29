jQuery.noConflict();

jQuery(function (MT$) {   
        var $boxOpened = parseInt(MT$('#boxOpened').css('top'));
        
//box accordion Animation


MT$('#drop').click(
    function toggleBox () {
        if ($boxOpened) {
            MT$(this).toggleClass('boxopened');

             MT$('#extraContainer4box').stop(true, true).delay(50).slideUp(650);   

//             MT$('#extraContainer4box').css("z-index", 102);
//             MT$('.body_overlay_box').css("z-index", 101); 

             MT$('.body_overlay_box').stop(true, true).animate({ 'height': '0%'}, 500); 
             
             MT$('body,html').animate({ scrollTop: 0, }, 700);
                                
            $boxOpened = 0;
            
        } else {
        
            MT$(this).toggleClass('boxopened');

            MT$('#extraContainer4box').stop(true, true).delay(300).slideDown(400);
           
//            MT$('#extraContainer4box').css("z-index", 102); 
//            MT$('.body_overlay_box').css("z-index", 101); 
            
            MT$('.body_overlay_box').stop(true, true).animate({ 'height': '100%'}, 700);   
            

 
                                             
            $boxOpened = 1;
        }
    }
);

          
          
          });