jQuery(document).ready(function($){
    $('.thumbnail-frame').each(function(){
        $('a',this).attr({
            'href' : $('a img',this).attr('src').replace(/thumb/i,'full'),
            'rel' : 'prettyPhoto[gallery]',
            'title' : $('.thumbnail-caption',this).text()
        });
    });
    $('a[rel^=prettyPhoto]').prettyPhoto({
        theme : 'dark_square', /* pp_default / light_rounded / dark_rounded / light_square / dark_square / facebook */
        opacity: 0.75,   /* Value between 0 and 1 */
        show_title : false, /* true/false */            
        overlay_gallery: false,/* true/false - If set to true, a gallery will overlay the fullscreen image on mouse over */
        social_tools: false /* html or false to disable - original code below */ 
        /* '<div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="http://www.facebook.com/plugins/like.php?locale=en_US&href={location_href}&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div>' */
      });
});
