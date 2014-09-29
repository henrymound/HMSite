<?php
	// Start session.
	session_start();
	
	// Set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if ( ! isset($_SESSION['formMessage'])) {
		$_SESSION['formMessage'] = 'Fill in the form below to send me an email.';	
	}
	
	if ( ! isset($_SESSION['formFooter'])) {
		$_SESSION['formFooter'] = '';
	}
	
	if ( ! isset($_SESSION['form'])) {
		$_SESSION['form'] = array();
	}
	
	function check($field, $type = '', $value = '') {
		$string = "";
		if (isset($_SESSION['form'][$field])) {
			switch($type) {
				case 'checkbox':
					$string = 'checked="checked"';
					break;
				case 'radio':
					if($_SESSION['form'][$field] === $value) {
						$string = 'checked="checked"';
					}
					break;
				case 'select':
					if($_SESSION['form'][$field] === $value) {
						$string = 'selected="selected"';
					}
					break;
				default:
					$string = $_SESSION['form'][$field];
			}
		}
		return $string;
	}
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
<!-- test -->
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="generator" content="RapidWeaver" />
		
     <meta name="viewport" content="initial-scale=1 maximum-scale=1 width=device-width user-scalable=yes"/> 
     
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/styles.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/colourtag-hotmugg-theme.css"/>

    <!-- This loads Google AJAX Libraries from Google CDN - jQuery 1.7.1 at 2011-12-10 -->
    <script src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("jquery", "1.7.1");
    </script>
    <!-- 
        Let's check if the jQuery function is defined, if not, since we are
        trying to load the library from Google CDN it means we are off line so we
        are going to load it locally 
    -->
    <script type="text/javascript">
        !window.jQuery && document.write(unescape('%3Cscript type="text/javascript" src="../rw_common/themes/multiflexband/js/jquery-1.7.1.min.js"%3E%3C/script%3E'))
    </script>

    <script type="text/javascript" src="../rw_common/themes/multiflexband/javascript.js"></script>
    
    <script type="text/javascript" src="../rw_common/themes/multiflexband/js/theme.js"></script>
    
    <!-- box-->    
    <script type="text/javascript" src="../rw_common/themes/multiflexband/js/box.js"></script>
    <!-- box end--> 
    
   <!-- Prettyphoto-->
    <script type="text/javascript" src="../rw_common/themes/multiflexband/js/jquery.prettyPhoto.js"></script> 
    <!-- Prettyphoto End-->
    
    <!-- Tipsy -->
    <script type="text/javascript" src="../rw_common/themes/multiflexband/js/tipsy/jquery.tipsy.js"></script>    
    <!-- Tipsy End-->     
    
    <!-- Extracontent-->                       
    <script type="text/javascript" src="../rw_common/themes/multiflexband/js/extracontent.jq.js"></script>
    <!-- Extracontent end -->
    
    <!-- hoverIntent -->
    <script type="text/javascript" src="../rw_common/themes/multiflexband/js/jquery.hoverIntent.js"></script>
    <!-- hoverIntent end -->
   
    <!-- IE8 responsive-->
      <script type="text/javascript" src="../rw_common/themes/multiflexband/js/css3-mediaqueries.js"></script>
    <!-- IE8 responsive end -->
    
      
    <link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/page_1.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/background_grid_off.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="%pathto(css/background_image_off.css)%" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/width_6.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/font3.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/webfonts/perspective-sans/style.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/tooltip_on_2.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/social3.css" />
		<script type="text/javascript" src="../rw_common/themes/multiflexband/js/prettyphoto_styles/jquery.prettyPhoto_facebook.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/extracontent_defualt.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/extracontent_4.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/option_extra/back_to_top_1.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/option_extra/uppercase.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/option_extra/uppercase_nav.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/option_extra/shadow_title.css" />
		<script type="text/javascript" src="../rw_common/themes/multiflexband/js/right_click_images.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/responsive_webfont_toolbat_off.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/multiflexband/css/responsive_toolbar_submenu.css" />
		
      
    
    
    <!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>  <!-- better IE -->		 
    <![endif]-->       
    
    <!--[if lte IE 9]>
    <link title="default" rel="Stylesheet" type="text/css" href="../rw_common/themes/multiflexband/js/ie9.css">
    <![endif]-->
    <!--[if lte IE 8]>
    <link title="default" rel="Stylesheet" type="text/css" href="../rw_common/themes/multiflexband/js/ie8.css">
    <![endif]-->

</head>
<body>

<div class="body_overlay_box"></div><!-- Body Image: background overlay-->
 
 <!--extra box trigger-->  <div id="drop" class="togglebox">  <!--<i class="fa fa-circle"></i>-->  </div>   <div class="clearer"></div>   <!--extra box trigger-->    
 
  <!--extra box --> 
    <div id="extraContainer4box"><!-- BOX-->	  
      <div id="extraContainer4"></div> <!-- extracontainer2 END-->		   
    <div class="clearer"></div>	     
  </div><!-- BOX END-->
  <div class="clearer"></div>		
 <!--extra box -->  
 
 
 

<div class="bodyimage"></div><!-- Body Image -->
<div class="bodyimage2"></div><!-- Body Image_ -->
<div class="bodyimage3"></div><!-- Body Image_ -->
<div class="bodyimage4"></div><!-- Body Image_ -->
<div class="bodyimage5"></div><!-- Body Image_ -->
<div class="bodyigrid"></div><!-- Body Image -->

     <div id="navcontainer2menu" class="toggleMenu">
     </div><!-- Button Resp. Navigation -->
     <div class="clearer"></div>
     
     <div id="navcontainer2"> <ul><li><a href="../index.html" rel="self">Home</a></li><li><a href="index.php" rel="self" id="current">Contact Us</a></li><li><a href="../styled/index.html" rel="self">About Us</a></li></ul> </div>
     <div class="clearer"></div>

	
     <div id="container">
<div id="logo"><a href="http://www.HotMugg.com/"></a><!-- link to home page-->	</div>
	<div id="pageHeader">
	<div class="pageHeader_titles"><h1>HotMugg</h1>	<h2>Find Nearby Independent Coffee Shops</h2></div>
	
	</div>
	
	  <!-- extracontainer1box-->
	<div id="extraContainer1box">
    <!-- extracontainer1-->
    <div id="extraContainer1"></div>	<!-- ExtraContent gets rendered here -->		
    </div><!-- extracontainer1box END-->	   
    <div class="clearer"></div><!-- extracontainer1 END-->	   
    
	
	<!-- extracontainer2-->
	<div id="extraContainer2"></div>	<!-- ExtraContent gets rendered here -->		
	<div class="clearer"></div><!-- extracontainer2 END-->	   


<div id="topnav">
<div id="navcontainer"><ul><li><a href="../index.html" rel="self">Home</a></li><li><a href="index.php" rel="self" id="current">Contact Us</a></li><li><a href="../styled/index.html" rel="self">About Us</a></li></ul>        
</div><!-- End navigation --> 
</div><!-- End topnav --> 

<div class="clearer"></div>

		<div id="contentBand"><!-- Start BAND wrapper -->
	<div id="contentContainer"><!-- Start main content wrapper -->
		<div id="content"><!-- Start content -->
		
		<div class="blog_top"></div> <!-- sidebar content such as the blog archive links -->
		<div class="clearer"></div>
	   
<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

<form action="./files/mailer.php" method="post" enctype="multipart/form-data">
	 <div>
		<label>Your Name:</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element0'); ?>" name="form[element0]" size="40"/><br /><br />

		<label>Your Email:</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element1'); ?>" name="form[element1]" size="40"/><br /><br />

		<label>Subject:</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element2'); ?>" name="form[element2]" size="40"/><br /><br />

		<label>Message:</label> *<br />
		<textarea class="form-input-field" name="form[element3]" rows="8" cols="38"><?php echo check('element3'); ?></textarea><br /><br />

		<div style="display: none;">
			<label>Spam Protection: Please don't fill this in:</label>
			<textarea name="comment" rows="1" cols="1"></textarea>
		</div>
		<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
		<input class="form-input-button" type="reset" name="resetButton" value="Reset" />
		<input class="form-input-button" type="submit" name="submitButton" value="Submit" />
	</div>
</form>

<br />
<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

<?php unset($_SESSION['form']); ?>			
		<div class="blog_bottom"></div> 
					
		</div><!-- End content -->
		</div><!-- End main content wrapper -->		
     </div><!-- End BAND wrapper -->
     
	<div id="sidebarContainer"><!-- Start Sidebar wrapper -->
	
	<!-- extracontainer3-->
	<div id="extraContainer3"></div>	<!-- ExtraContent gets rendered here -->		
	<div class="clearer"></div><!-- extracontainer3 END-->	    

	<div id="sidebar"><!-- Start sidebar content -->				
				<div class="sideHeader"></div><!-- Sidebar header -->
			<!-- sidebar content you enter in the page inspector -->		
		</div><!-- End sidebar content -->

	<div class="clearer"></div>
	
	
	<div id="breadcrumbcontainer"><!-- Start the breadcrumb wrapper -->
		
	</div><!-- End breadcrumb -->
	
	<div id="footer"><!-- Start Footer -->		
		<p>&copy; 2014 HotMugg <a href="#" id="rw_email_contact">Contact Us</a><script type="text/javascript">var _rwObsfuscatedHref0 = "mai";var _rwObsfuscatedHref1 = "lto";var _rwObsfuscatedHref2 = ":co";var _rwObsfuscatedHref3 = "nta";var _rwObsfuscatedHref4 = "ct@";var _rwObsfuscatedHref5 = "hot";var _rwObsfuscatedHref6 = "mug";var _rwObsfuscatedHref7 = "g.c";var _rwObsfuscatedHref8 = "om";var _rwObsfuscatedHref = _rwObsfuscatedHref0+_rwObsfuscatedHref1+_rwObsfuscatedHref2+_rwObsfuscatedHref3+_rwObsfuscatedHref4+_rwObsfuscatedHref5+_rwObsfuscatedHref6+_rwObsfuscatedHref7+_rwObsfuscatedHref8; document.getElementById('rw_email_contact').href = _rwObsfuscatedHref;</script></p>
	</div><!-- End Footer -->
	</div><!-- End Sidebar wrapper -->


</div><!-- End container -->
<!-- back to top icon -->
<div id="up"><a href="#up"><span></span></a></div>
<!-- end back to top icon -->

<!-- theme options -->
<div id="menuOpened" class="settings"></div>
<div id="tooltip_visibility" class="settings"></div>
<div id="fade1" class="settings"></div>
<!-- theme.js -->
<!--<script type="text/javascript" src="../rw_common/themes/multiflexband/js/theme.js"></script>-->
</body>
</html><!--MultiThemes -->
