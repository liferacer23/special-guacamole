<?php $cymolthemes_header_menuarea_height = cymolthemes_header_menuarea_height(); 

?>

.headerlogo,
.cmt-header-icon, 
.cmt-sboxheader-text-area,
.site-header .cymolthemes-fbar-btn{
    height: <?php echo esc_attr($header_height); ?>px;
    line-height: <?php echo esc_attr($header_height); ?>px !important;
}

.cmt-header-icon.cmt-sboxheader-social-box a.cmt-social-btn-link i,
.cmt-header-icons .cmt-sboxheader-search-link a, 
.cmt-header-icons .cmt-header-wc-cart-link a {
	color: rgba( <?php echo cymolthemes_hex2rgb($mainMenuFontColor); ?> , 1) ;
}

@keyframes menu_sticky {
	0%   {margin-top:-120px;opacity: 0;}
	50%  {margin-top: -64px;opacity: 0;}
	100% {margin-top: 0;opacity: 1;}
}


/**
* Responsive Menu
* ----------------------------------------------------------------------------
*/
@media (max-width: <?php echo esc_attr($breakpoint); ?>px){
	/* Responsive Header bg color */
	<?php if( !empty($responsive_header_bg_custom_color) ) : ?>
	#cmt-page-header #site-header.site-header.cmt-bgcolor-custom{
		background-color: <?php echo esc_attr($responsive_header_bg_custom_color); ?> !important;
	}
	<?php endif; ?>	
	
	/*** Header Section ***/
	.site-header-main.cmt-section-wrapper{
		margin: 0 25px 0 25px;
		width: auto;
		display: block;
	}	
	.site-header-main.cmt-section-wrapper .cmt-section-wrapper-cell {
		display: block;		
	}	
    .cmt-header-icon{
        padding-right: 0px;
        padding-left: 10px;
        position: relative;
    } 
	.cmt-header-icon.cmt-header-wc-cart-link{
    	float: right;
    }  
	.cmt-header-icon.cmt-sboxheader-social-box,
	.cmt-header-icon.cmt-sboxheader-search-link{
    	float: left;
    } 
	.cmt-header-icon.cmt-sboxheader-social-box{
    	display: none;
    } 
    .site-title{
        width: inherit;
        margin: 0 auto;
    }  
	div.cmt-title-wrapper {
	    background-attachment: scroll !important;	
	}
 	
    /*** Navigation ***/
    .main-navigation {
    	clear: both;
    }    
   	.site-branding,
    #site-header-menu #site-navigation li.mega-menu-megamenu > ul.mega-sub-menu,
    #site-header-menu #site-navigation div.mega-menu-wrap,
	.menu-cmt-main-menu-container,
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu,
	#site-header-menu {
		float: none;	
    }
	
    /*** Responsive Menu ***/    
    .righticon{
        position: absolute;
        right: 0px;
        z-index: 33;
        top: 15px;
        display: block;
    }    
	.righticon i{
		font-size:20px;
		cursor:pointer;
        display:block;
        line-height: 0px;
	} 
    /*** Default menu box ***/ 
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal,
    #site-header-menu #site-navigation div.nav-menu > ul{
    	position: absolute;
        padding: 10px 20px; 
        left: 0px;	
        box-shadow: rgba(0, 0, 0, 0.12) 3px 3px 15px;
        border-top: 3px solid <?php echo esc_attr($skincolor); ?>;	 
        background-color: #333;       
        z-index: 100;
        width: 100%;
        top: <?php echo esc_attr($header_height); ?>px;  
    }  
    
    <?php if($headerbg_color=='custom' && !empty($headerbg_customcolor['rgba']) ) : ?>
       	#site-header-menu #site-navigation div.nav-menu > ul,
        #site-header-menu #site-navigation .mega-menu-wrap .mega-menu{
            background-color: <?php  echo esc_attr($headerbg_customcolor['rgba']); ?>;
        } 
	<?php endif; ?>
      
    <?php if( !empty($dropmenu_background['color']) ): ?>
    	.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal, 
        #site-header-menu #site-navigation div.nav-menu > ul{
        	background-color: <?php echo esc_attr($dropmenu_background['color']); ?>;
        }    
    <?php endif; ?>      
 

    #site-header-menu #site-navigation div.nav-menu > ul,
    #site-header-menu #site-navigation div.nav-menu > ul ul {
        overflow: hidden;
        max-height: 0px;
    }
	#site-header-menu #site-navigation div.nav-menu > ul ul ul{
    	max-height: none;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul > li{
    	position: relative;
        text-align: left;
    }    
    #site-header-menu #site-navigation.toggled-on div.nav-menu > ul{       
        display: block;
        max-height: 10000px;       
    }
    #site-header-menu #site-navigation.toggled-on div.nav-menu > ul ul.open {
    	max-height: 10000px;
    }   
    #site-header-menu #site-navigation div.mega-menu-wrap{
    	  position: inherit;
    }   
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal, 
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu{
    	width: 100%;
    }   
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-toggle-on > a, 
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a {
    	background: none !important;
    }
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item{
    	float: none;
    }
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li{
    	width: 100% !important;
        padding-bottom: 0px;
    }
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu{
    	padding-left:15px;        
    }
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item ul.mega-sub-menu a {
    	padding-left: 0px;
    }
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu a,
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li ul.mega-sub-menu,
    #site-header-menu #site-navigation div.nav-menu > ul ul{
    	  background-color: transparent !important;
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li a,    
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li a{
        display: block;
        padding: 15px 0px;        
        text-decoration: none;
        line-height: 18px;
        height: auto;
        line-height: 18px !important;
    }     
    #site-header-menu #site-navigation div.nav-menu > ul ul a, 
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item a {
        margin: 0;
        display: block;
        padding: 15px 15px 15px 0px;
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li li a:before,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item li.mega-menu-item a:before{
        font-family: "FontAwesome";
        font-style: normal;
        font-weight: normal;
        display: inline-block;
        text-decoration: inherit;
        margin-right: .2em;
        text-align: center;
        opacity: .8;
        font-variant: normal;
        text-transform: none;
        font-size: 13px;
        content: "\f105";
        margin-right: 8px;
        display: none;
    }         
    .cmt-mmmenu-override-yes .mega-sub-menu {
     	display: none !important;
    }
    .mega-sub-menu.open, 
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li .mega-sub-menu .mega-sub-menu {
    	display: block !important;
    }
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li  {
        padding: 0px;
        padding-left: 0px;
    }  
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title{
    	margin-top:30px;
    }
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item:first-child > h4.mega-block-title{
    	margin-top: 0px;
    }      
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item{
   		position: relative;
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li a, 
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li a{
    	display: inline-block;
    } 
 	
    /*** Defaultmenu ***/
    .cmt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li > a:hover,   
    .cmt-mmenu-active-color-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:hover,
    
    .cmt-submenu-active-primary #site-header-menu #site-navigation div.nav-menu > ul  ul > li > a:hover, 
    .cmt-submenu-active-primary #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li > a:hover{
    	color: <?php echo esc_attr($skincolor); ?>;
    } 
	
   <?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>
    
    /* Dropdown Menu Active Link Color -------------------------------- */   
    .cmt-submenu-active-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a, 
            
    .cmt-submenu-active-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,    
    .cmt-submenu-active-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a {
        color: <?php echo esc_attr($skincolor); ?>;
    }
    <?php } ?>
	
    <?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
     /* Main Menu Active Link Color --------------------------------*/        
    .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li > a:hover,   
    .cmt-mmenu-active-color-custom .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:hover{
         color: <?php echo esc_attr($mainmenu_active_link_custom_color); ?>;
     }
    <?php } ?> 
    
	<?php if( $mainmenu_active_link_color=='custom' && ($mainmenu_active_link_custom_color == '#ffffff') ){ ?>
	.cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li > a:hover, .cmt-mmenu-active-color-custom .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:hover,
     .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a, .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_parent > a, .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, .cmt-mmenu-active-color-custom .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, .cmt-mmenu-active-color-custom .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a, .cmt-mmenu-active-color-custom .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a{
         color:<?php echo esc_attr($skincolor); ?>;
     }
    <?php } ?> 

	<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>      
    .cmt-submenu-active-custom #site-header-menu #site-navigation div.nav-menu > ul  ul > li > a:hover, 
    .cmt-submenu-active-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li > a:hover{
        color: <?php echo esc_attr($skincolor); ?>;
    }    
    <?php } ?>    
 
    
    <?php if( !empty($dropdownmenufont['color']) ): ?>
    #site-header-menu #site-navigation div.nav-menu > ul > li > a,     
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a,    
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget,
    .righticon i  {
    	color: rgba( <?php echo cymolthemes_hex2rgb($dropdownmenufont['color']); ?> , 1);
    } 
    #site-header-menu #site-navigation div.nav-menu > ul li,
  	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li {
    	border-bottom: 1px solid rgba( <?php echo cymolthemes_hex2rgb($dropdownmenufont['color']); ?> , 0.15);
    }  
    #site-header-menu #site-navigation div.nav-menu > ul li li:last-child,
  	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:last-child{
    	border-bottom: none;
    }     
    <?php endif; ?>    
    

	/* Dynamic main menu color applying to responsive menu link text */   

    #site-header-menu #site-navigation .mega-menu-toggle .mega-toggle-block-1 .mega-toggle-label-open,
    #site-header-menu #site-navigation .mega-menu-toggle .mega-toggle-block-1 .mega-toggle-label .mega-toggle-label-closed{
        display: none;
    }    


    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1{
        margin-top: 10px
    }

    #site-header-menu #site-navigation .mega-menu-toggle .mega-toggle-blocks-right{
        height: 30px;
    }


    .menu-toggle i,     
    .cmt-header-icons a{
		color: rgba( <?php echo cymolthemes_hex2rgb($mainMenuFontColor); ?> , 1) ;
	}            
    .menu-toggle span,
    .menu-toggle span:after,
    .menu-toggle span:before{
    	background-color: rgba( <?php echo cymolthemes_hex2rgb($mainMenuFontColor); ?> , 1) ;
    }	
    #site-header-menu #site-navigation div.nav-menu > ul{
        padding-right: 15px;
        padding-left: 15px;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul ul{
    	list-style: none;
    }	
    .cmt-header-icons{
        position: absolute;
        top: 0;
        float: none;
        right: 0px;
        margin-right: 0px;
    }   
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu.open, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul{       
        display: block !important;
        height: auto !important;  
    }    
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu{
        opacity: 1;   
    }    
	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu ul.mega-sub-menu,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul{
        background-image: none !important;      
    }   
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu{
    	margin-top: 0;
    }      
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a.mega-menu-link{
    	background: none;
        background-image: none;
    }    
    .headerstyle-two .cmt-title-wrapper .cmt-titlebar-inner-wrapper{
    	padding-top: 0px;
    }  

    #site-header-menu #site-navigation .menu-toggle,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle {
        top: <?php echo esc_attr(ceil($header_height/2)-20); ?>px;
        display: block;
        position: absolute; 
        left: 0;       
        width: 40px;       
        background: none;
        z-index: 1;
        outline: none;
        padding: 0;
        line-height: normal;
    }    
    .cmt-header-invert #site-header-menu #site-navigation .menu-toggle,
    .cmt-header-invert .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle {
        right: 0; 
        left: auto;
    }    
    .cmt-header-invert .cmt-header-icons {
        left: 0;
        right: auto;
    }    
    #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-right{
        float: none;
    }    
    #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1 {
        display: inline-block;
		width: 28px;
        height: 2px;
        background: #182333;
        border-radius: 3px;
        transition: 0.3s;
        position: relative;
    }
    #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:before,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before {
        top: 8px;
    }
    #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:after,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after {
        top: -8px;
    }    
    #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:before, 
    #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:after,
    
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after {
        display: inline-block;
		width: 28px;
		height: 2px;
        background: #033b4a;
        border-radius: 3px;
        transition: 0.3s;
        position: absolute;
        left: 0;
        content: '';
        -webkit-transform-origin: 0.28571rem center;
        transform-origin: 0.28571rem center;
        margin: 0;
    }
    #site-header-menu #site-navigation.toggled-on .menu-toggle .cmt-duplexo-icon-bars,     
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1 {
        background: transparent;
    }    
    #site-header-menu #site-navigation.toggled-on .menu-toggle .cmt-duplexo-icon-bars:before,
    #site-header-menu #site-navigation.toggled-on .menu-toggle .cmt-duplexo-icon-bars:after,
    
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1:before, 
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1:after {
        -webkit-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        top: 0;
        width: 28px;
    }    
    #site-header-menu #site-navigation.toggled-on .menu-toggle .cmt-duplexo-icon-bars:before,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1:before {
        -webkit-transform: rotate3d(0, 0, 1, 45deg);
        transform: rotate3d(0, 0, 1, 45deg);
    }
    #site-header-menu #site-navigation.toggled-on .menu-toggle .cmt-duplexo-icon-bars:after,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1:after {
        -webkit-transform: rotate3d(0, 0, 1, -45deg);
        transform: rotate3d(0, 0, 1, -45deg);
    }   
    
    /*** Responsive icon color( If custom header background color ) ***/      
    /* White color */ 
	
	.site-header.cmt-bgcolor-skincolor #site-header-menu #site-navigation:not(.toggled-on) .menu-toggle .cmt-duplexo-icon-bars,
	.site-header.cmt-bgcolor-skincolor #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:before,
	.site-header.cmt-bgcolor-skincolor #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:after,
	.site-header.cmt-bgcolor-darkgrey #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:before,
	.site-header.cmt-bgcolor-darkgrey #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:after,
	.site-header.cmt-bgcolor-darkgrey .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before,
	.site-header.cmt-bgcolor-darkgrey .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,
	.site-header.cmt-bgcolor-darkgrey #site-header-menu #site-navigation:not(.toggled-on) .menu-toggle .cmt-duplexo-icon-bars,
    .site-header.cmt-bgcolor-skincolor .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .site-header.cmt-bgcolor-skincolor .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .site-header.cmt-bgcolor-skincolor .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,  
     
    .site-header.cmt-bgcolor-darkgrey .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .site-header.cmt-bgcolor-darkgrey .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .site-header.cmt-bgcolor-darkgrey .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,      
	.cmt-sboxresponsive-icon-white.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .cmt-sboxresponsive-icon-white.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .cmt-sboxresponsive-icon-white.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,
    .cmt-sboxresponsive-icon-white #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars,
    .cmt-sboxresponsive-icon-white #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:before, 
    .cmt-sboxresponsive-icon-white #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:after{
         background-color: #fff;
    }

    .site-header.cmt-bgcolor-skincolor .menu-toggle i, 
    .site-header.cmt-bgcolor-skincolor .cmt-header-icons a,
    .site-header.cmt-bgcolor-darkgrey .menu-toggle i, 
    .site-header.cmt-bgcolor-darkgrey .cmt-header-icons a,     
    .cmt-sboxresponsive-icon-white .menu-toggle i, 
    .cmt-sboxresponsive-icon-white .cmt-header-icons a {
    	color: #fff;
    }      


    /* Dark color */  
    .site-header.cmt-bgcolor-white #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars,
    .site-header.cmt-bgcolor-white #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:before,
    .site-header.cmt-bgcolor-white #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:after,     
      
    .site-header.cmt-bgcolor-grey.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .site-header.cmt-bgcolor-grey.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .site-header.cmt-bgcolor-grey.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,         
      
    .cmt-bgcolor-white.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .cmt-bgcolor-white.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .cmt-bgcolor-white.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,        
    
	.cmt-sboxresponsive-icon-dark.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .cmt-sboxresponsive-icon-dark.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .cmt-sboxresponsive-icon-dark.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,

    .cmt-sboxresponsive-icon-dark #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars,
    .cmt-sboxresponsive-icon-dark #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:before, 
    .cmt-sboxresponsive-icon-dark #site-header-menu #site-navigation .menu-toggle .cmt-duplexo-icon-bars:after{
         background-color: #002c5b;
    }      
    
    .site-header.cmt-bgcolor-grey .menu-toggle i, 
    .site-header.cmt-bgcolor-grey .cmt-header-icons a,  
    .site-header.cmt-bgcolor-white .menu-toggle i, 
    .cmt-sboxresponsive-icon-dark .menu-toggle i, 
    .cmt-sboxresponsive-icon-dark .cmt-header-icons a {
    	color: #002c5b;
    }      
    
    .cmt-sboxresponsive-icon-white #site-header-menu #site-navigation.toggled-on .menu-toggle .cmt-duplexo-icon-bars,
    .cmt-sboxresponsive-icon-dark #site-header-menu #site-navigation.toggled-on .menu-toggle .cmt-duplexo-icon-bars,

    .site-header.cmt-bgcolor-white #site-header-menu #site-navigation.toggled-on .menu-toggle .cmt-duplexo-icon-bars,
    .site-header.cmt-bgcolor-darkgrey #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    .site-header.cmt-bgcolor-skincolor #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    
    .site-header.cmt-bgcolor-white.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    .site-header.cmt-bgcolor-grey.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    
    .cmt-sboxresponsive-icon-dark.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    .cmt-sboxresponsive-icon-white.cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1{
    	background-color: transparent;
    } 
    
    /* Display None */
	
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:after,
    #site-header-menu #site-navigation div.nav-menu > ul{
    	display: none;
    }
    .header-style-three .cmt-stickable-wrapper{
    	height: auto !important;
    }    
    
    /* header-style-four */     
    .header-style-four .cmt-header-icon.cmt-sboxheader-btn-w,
    .header-style-four .cmt-sboxheader-widgets-wrapper{
    	display: none;    
    }  
	.header-style-three .cmt-sboxheader-top-wrapper .col-sm-4.col-md-3.widget-left, 
	.header-style-three .cmt-sboxheader-top-wrapper .col-sm-4.col-md-3.widget-right {
		display: none;
	}
	body.cymolthemes-page-full-width.cmt-titlebar-bcrumb-bottom #content .site-main .entry-content > .wpb_row:first-child {
		margin-top: -82px;
	}

    .header-style-three .cmt-stickable-wrapper,
    .header-style-four.headerstyle-two .cmt-stickable-wrapper{        
        top: 0;
    }
    .header-style-four .cmt-sboxheader-top-wrapper .col-sm-4.col-md-3,
    .header-style-four .kw-phone{
        display: none;
    }
	.header-style-three.header-style-four .kw-phone {
		display: block;
	}
    .header-style-four .site-header-menu{
        display: block;
        position: absolute;
        top: 0;
        width: 100%;
    }
    .header-style-four .cmt-sboxheader-top-wrapper .col-sm-4.col-md-6{
        margin: 0 auto;
        float: none;
    }
	.header-style-four  .cmt-header-icon,
    .header-style-four .headerlogo{
        height: <?php echo esc_attr($header_height) - ($cymolthemes_header_menuarea_height/2); ?>px;
        line-height: <?php echo esc_attr($header_height) - ($cymolthemes_header_menuarea_height/2); ?>px !important;
    }
    .header-style-four #site-header-menu #site-navigation .menu-toggle,
    .header-style-four .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle {
       top: <?php echo (esc_attr($header_height/2) - ($cymolthemes_header_menuarea_height/2)+2); ?>px; 
    }

    .header-style-four .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal, 
    .header-style-four #site-header-menu #site-navigation div.nav-menu > ul {
        top: <?php echo esc_attr($header_height) - ($cymolthemes_header_menuarea_height/2); ?>px;
    }
	.header-style-four .site-header-menu {
		left: 0;
	}
	.header-style-four .cmt-stickable-wrapper,
	.header-style-four .cmt-sboxsite-header-menu {
		height: auto !important;
	}
    #site-header-menu #site-navigation .menu-toggle,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle {
        top: <?php echo esc_attr(ceil($header_height/2)-12); ?>px;
    }	
	.cmt-title-wrapper.cmt-breadcrumb-on-bottom .cmt-titlebar-main > .container .cmt-titlebar-main-inner .entry-title-wrapper,
	.header-style-four .cmt-title-wrapper.cmt-breadcrumb-on-bottom .cmt-titlebar-main > .container .cmt-titlebar-main-inner .entry-title-wrapper {
	    margin-top: -54px;	
	}

	/* sticky footer bottom margin */	
	body .site-content-wrapper {
		margin-bottom: 0px !important;
	}
	.cmt-titlebar-align-left .entry-title-wrapper .entry-title {
		padding-left: 0px;
	}
	.header-style-four .cmt-sboxtop-info-con {
		display:none;
	}
	<?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
		<?php if( !empty($dropmenu_background['color']) && $dropmenu_background['color']=='#ffffff' && $mainmenu_active_link_color=='custom' && $mainmenu_active_link_custom_color=='#ffffff' ): ?>
		/* Main Menu Active Link Color --------------------------------*/                
		.header-style-four .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
		.header-style-four .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
		.header-style-four .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a, 
		.header-style-four .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_parent > a,          
		.header-style-four .cmt-mmenu-active-color-custom  #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a,       
		.header-style-four .cmt-mmenu-active-color-custom  .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
		.header-style-four .cmt-mmenu-active-color-custom  .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
		.header-style-four .cmt-mmenu-active-color-custom  .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a {
			color: <?php echo esc_attr($skincolor); ?>;
		}
		.header-style-four .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li > a:hover,
		.header-style-four .cmt-mmenu-active-color-custom .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:hover {
			color: <?php echo esc_attr($skincolor); ?>;
		}
		<?php endif; ?> 
	<?php } ?>
	.header-style-four #site-header-menu .container {
       width: auto;
		display: block;
	}
	#mega-menu-wrap-cmt-sboxmain-menu #mega-menu-cmt-sboxmain-menu li.mega-menu-item-has-children.mega-toggle-on > a.mega-menu-link > span.mega-indicator {
		display: none;
	}
	.k_flying_searchform_wrapper {
		position: absolute;
		width: 100%;
		z-index: 33;
	}
	.header-style-four .cmt-sboxbox-wrapper .site-header>.container.cmt-container-for-header{
		width:unset;
		padding: 0;
	}
	.site-header .headerlogo img {
		max-height: <?php echo esc_attr($logoMaxHeightMobile); ?>px;
	}
	.cmt-sboxheader-text-area {
	    display: none;
	}
	.cmt-sticky-bgcolor-skincolor .cmt-search-overlay .w-search-form-row:before,
	.cmt-bgcolor-skincolor .cmt-search-overlay .w-search-form-row:before {
		border-bottom-color: <?php echo esc_attr($skincolor); ?>;
	}
}

@media (min-width: <?php echo esc_attr($breakpoint); ?>px) {
    header #site-header-menu #site-navigation{
        height: <?php echo esc_attr($header_height); ?>px;
        line-height: <?php echo esc_attr($header_height); ?>px !important;
    }

	/* Header full */
    .header-style-two .cmt-stickable-wrapper{
        position: absolute;
        z-index: 21;
        width: 100%;
        box-shadow: none;
        -khtml-box-shadow: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -ms-box-shadow: none;
        -o-box-shadow: none;
    } 
	.site-header-main.container-full {
		padding: 0 50px;
	}
	.cmt-sboxstickable-header.is_stuck{    	 
        box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.06);
    }
    .cmt-sboxstickable-header{
        z-index: 12;      
    }
	.cmt-header-icon, 
	.cmt-header-icons, 
	.cmt-sboxheader-overlay .cmt-header-icons:before,
    .cymolthemes-fbar-btn,
	.cmt-sboxheader-text-area,
   	.cmt-header-icons .cymolthemes-fbar-btn a i,
	.headerlogo,  
	#site-header-menu #site-navigation div.nav-menu > ul > li > a, 
	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a {
        transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -webkit-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
    }
    .cmt-header-icon{       
        position: relative;
    }
	.cmt-sboxheader-text-area, 
    #site-header-menu #site-navigation .nav-menu,  
    #site-header-menu, 
    .cmt-header-icons, 
    .cmt-header-icon,
    #site-header-menu #site-navigation .mega-menu-wrap, 
    .menu-cmt-main-menu-container{
    	float: right;
    }

	.navbar{
        vertical-align: top;
    }
    .menu-toggle {
        display: none;
        z-index: 10;	
    }
    .menu-toggle i{
        color:#fff;
        font-size:28px;
    }
    .toggled-on li, 
    .toggled-on .children {
        display: block;
    }		
    #site-header-menu #site-navigation div.mega-menu-wrap{
        clear: none;
        position: inherit;
    }
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal{
        position: static !important;       
    }
  
    #site-header-menu #site-navigation .nav-menu-wrapper > ul {
        margin: 0;
        padding: 0; 
    }
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a{
    	background: none;
    } 
	#site-header-menu #site-navigation div.nav-menu > ul{
    	margin: 0px;
		position: relative;
    }   
	.k_flying_searchform_wrapper {
        top: auto;
        position: absolute;
        width: 100%;
        left: 0;
        right: 0;
        z-index: 11;
    }
	.header-style-four .k_flying_searchform_wrapper {
		max-width: 1140px;
		left: 0;
		right: 0;
		margin-left: auto;
		margin-right: auto;
	}	
	.header-style-four .cmt-sboxstickable-header:not(.is_stuck) .k_flying_searchform_wrapper {
		top:<?php echo (cymolthemes_header_menuarea_height()); ?>px;	
	}
	.header-style-four .cmt-sboxstickable-header:not(.is_stuck) .k_flying_searchform_wrapper .container {
		width: 1140px;
	}
	
	.header-style-four .cmt-sboxstickable-header.is_stuck .k_flying_searchform_wrapper {
		width: 100%;
		max-width: 100%;
	}
	
    #site-header-menu #site-navigation div.nav-menu > ul > li,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item{
        height: <?php echo esc_attr($header_height); ?>px;
        line-height: <?php echo esc_attr($header_height); ?>px !important;
    }  
    #site-header-menu #site-navigation div.nav-menu > ul > li {
        margin: 0 0px 0 0;
        display: inline-block;
        position: relative;
		vertical-align: top;
    }   	

    #site-header-menu #site-navigation div.nav-menu > ul > li > a,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
    	display: block;	
        margin: 0px;
        padding:  0px 16px 0px 16px;
        text-decoration: none;
        position: relative;
        z-index: 1;       
        height: <?php echo esc_attr($header_height); ?>px;
        line-height: <?php echo esc_attr($header_height); ?>px !important;        
    } 
	.header-style-six #site-header-menu #site-navigation div.nav-menu > ul > li > a,
	.header-style-six .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a {
		padding:  0px 14px 0px 14px;
	}
	.header-style-one #site-header-menu #site-navigation div.nav-menu > ul > li > a,
	.header-style-one .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a {
		padding:  0px 13px 0px 13px;
	}
	#site-header-menu #site-navigation div.nav-menu > ul > li > a:before,
	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:before	{
		width: 0;
		height: 2px;
		display: block;
		opacity: 0;
		position: absolute;
		content: "";
		bottom: 18.5px;
		background-color: <?php echo esc_attr($skincolor); ?>;
		-webkit-transition: all .3s ease;
		-moz-transition: all .3s ease;
		-ms-transition: all .3s ease;
		-o-transition: all .3s ease;
		transition: all .3s ease;
	}	
    #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a:before, #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a:before,
    #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a:before,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a:before{
		opacity: 1;
		width: 15px;
    }
	.is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a:before,
	.is_stuck.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a:before {
		top: <?php echo ceil($header_height_sticky/2)+15; ?>px;
	} 
	.cmt-sboxheader-text-area {
		padding-left:24px;
		position: relative;
	}
	.cmt-sboxheader-text-area .header-info-widget {
		vertical-align: middle;
		display: inline-block;
		text-align: left;
	}
	.cmt-sboxheader-text-area .header-info-widget h2 {
		font-size:20px;
		line-height:28px;
		margin-bottom:3px;
		font-weight:500;
		color: <?php echo esc_attr($skincolor); ?>;
	}
	.cmt-sboxheader-text-area .header-info-widget h3 {
		font-size:14px;
		line-height:19px;
		color: #686e73;
		margin-bottom: 0px;
	}
	.cmt-bgcolor-skincolor .cmt-sboxheader-text-area .header-info-widget h2,
	.cmt-bgcolor-darkgrey .cmt-sboxheader-text-area .header-info-widget h3,
	.cmt-bgcolor-skincolor .cmt-sboxheader-text-area .header-info-widget h3 {
		color:#fff;
	}
	.cmt-sboxheader-text-area div.header-info-widget:nth-child(2){
		padding-left:62px;
	}
    /*** Defaultmenu ***/ 
	.cmt-submenu-active-skin #site-header-menu #site-navigation div.nav-menu > ul > li ul a:before,
	.cmt-submenu-active-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li ul a:before,
    .cmt-submenu-active-skin #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a,
    .cmt-submenu-active-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu li:hover > a,    
    .cmt-submenu-active-skin #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a,
    .cmt-mmenu-active-color-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item li:hover > a{
        color: <?php echo esc_attr($skincolor); ?> ;
    }
	
	.cmt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li ul a:before, .cmt-mmenu-active-color-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li ul a:before, .cmt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a, .cmt-mmenu-active-color-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu li:hover > a, .cmt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a, .cmt-mmenu-active-color-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item li:hover > a {
    color: <?php echo esc_attr($skincolor); ?> ;
    }
    
	#site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item, 
	#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item,
	#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item {
		border-bottom-color: <?php echo esc_attr($skincolor); ?>;		
	}
	.cmt-submenu-active-primary #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a, 
	.cmt-submenu-active-primary #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,
	.cmt-submenu-active-primary #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a {
		background-color: #fff;;	
	}	

	<?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
        .cmt-mmenu-active-color-custom .cmt-header-icons .cymolthemes-fbar-btn a:hover,
        .cmt-mmenu-active-color-custom .cmt-header-icons .cmt-sboxheader-search-link a:hover, 
        .cmt-mmenu-active-color-custom .cmt-header-icons .cmt-header-wc-cart-link a:hover,        
        .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a,
    	.cmt-mmenu-active-color-custom .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a{
        	color: <?php echo esc_attr($mainmenu_active_link_custom_color); ?> ;
        }        
		.cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li > a:before,
		.cmt-mmenu-active-color-custom .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:before{
			background-color: rgba( <?php echo cymolthemes_hex2rgb($mainMenuFontColor); ?> , 0.90) ;
			
        } 
		.cmt-mmenu-active-color-custom #site-header-menu #site-navigation  .sep-img {
		  background-color: <?php echo esc_attr($mainmenu_active_link_custom_color); ?>;
		}		
        
    <?php } ?>
    
	<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>        
    /* Dropdown Menu Active Link Color -------------------------------- */ 
	
	#site-header-menu #site-navigation div.nav-menu > ul > li ul a:before,
	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li ul a:before,
	
	cmt-submenu-active-custom #site-header-menu #site-navigation div.nav-menu > ul > li ul a:before,
	cmt-submenu-active-custom .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li ul a:before,	
    .cmt-submenu-active-custom #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a,  
    .cmt-submenu-active-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item:hover > a, 
    .cmt-submenu-active-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li:hover > a,
    .cmt-submenu-active-custom .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu li:hover > a, 				
    .cmt-mmenu-active-color-custom .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item li:hover > a{
        color: <?php echo esc_attr($dropmenu_active_link_custom_color); ?>;
    }
    <?php } ?>   
    

    .is_stuck .cmt-header-icons .cymolthemes-fbar-btn a,   	
    .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a,
    .is_stuck.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
    
	 #site-header-menu.is_stuck #site-navigation div.nav-menu > ul > li > a,
    .cmt-mmmenu-override-yes #site-header-menu .is_stuck #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
	
    #site-header-menu.is_stuck #site-navigation div.nav-menu > ul > li > a,
    .cmt-mmmenu-override-yes #site-header-menu.is_stuck #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
    	color: <?php echo esc_attr($stickymainmenufontcolor); ?>;
    }  
	
	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu li:hover > a,
	#site-header-menu #site-navigation div.nav-menu > ul ul li:hover > a,    
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item:hover > a{
        background: #f8f9fa;
    }
	
	 .cmt-submenu-active-primary .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu li:hover > a,
	.cmt-submenu-active-primary #site-header-menu #site-navigation div.nav-menu > ul ul li:hover > a,    
    .cmt-submenu-active-primary .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item:hover > a{
       background-color: #f8f9fa;
    }
	
    .site-header .social-icons li > a,
    .cmt-header-icons .cymolthemes-fbar-btn a{
    	color: rgba( <?php echo cymolthemes_hex2rgb($mainMenuFontColor); ?> , 1) ;
    }
	.header-style-four .cmt-sboxheader-menu-bg-color-skincolor .cmt-header-icons .cmt-sboxheader-search-link a,  
	.header-style-four .cmt-sboxheader-menu-bg-color-skincolor .cmt-header-icons .cmt-header-wc-cart-link a,
	.header-style-four .cmt-sboxheader-menu-bg-color-darkgrey .cmt-header-icons .cmt-sboxheader-search-link a,  
	.header-style-four .cmt-sboxheader-menu-bg-color-darkgrey .cmt-header-icons .cmt-header-wc-cart-link a{
		border-color: rgba( <?php echo cymolthemes_hex2rgb($mainMenuFontColor); ?> , 0.70);
		background-color: transparent;
	}
    .site-header .social-icons li > a:hover,
    .cmt-header-icons .cmt-header-wc-cart-link a:hover,
    .cmt-header-icons .cmt-sboxheader-search-link a:hover{
    	color: <?php echo esc_attr($skincolor); ?>;
    }
	.header-style-four .cmt-sboxheader-menu-bg-color-skincolor .cmt-header-icons .cmt-sboxheader-search-link a:hover,  
	.header-style-four .cmt-sboxheader-menu-bg-color-skincolor .cmt-header-icons .cmt-header-wc-cart-link a:hover,
	.header-style-four .cmt-sboxheader-menu-bg-color-darkgrey .cmt-header-icons .cmt-sboxheader-search-link a:hover,  
	.header-style-four .cmt-sboxheader-menu-bg-color-darkgrey .cmt-header-icons .cmt-header-wc-cart-link a:hover {
		border-color: rgba( <?php echo cymolthemes_hex2rgb($mainMenuFontColor); ?> , 1) ;
	}

	.header-style-four .cmt-sboxheader-menu-bg-color-skincolor .cmt-header-wc-cart-link a span.number-cart{
		background-color:#fff;
		color: <?php echo esc_attr($skincolor); ?> ;
	}
	.header-style-four .site-header .cmt-header-menu-bg-color-darkgrey .cmt-header-wc-cart-link a:hover span.number-cart,
	.header-style-four .site-header .cmt-sticky-bgcolor-darkgrey.is_stuck .cmt-header-wc-cart-link a:hover span.number-cart{
		color:#fff;
		background-color:<?php echo esc_attr($skincolor); ?> ;
	}
	.header-style-four .kw-phone{
		position: absolute;
		right:0px;
		top: 0;
		font-size: 14px;
		color: #081528;
		padding: 0px 0px 0px 8px;
		height: 60px;
		line-height: 60px;
	}	
	.header-style-four .kw-phone a:hover {
		color:#fff;
	}
    /*** Sub Navigation Section ***/
	
	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul{
		box-shadow: 0 3px 25px 0px rgba(43, 52, 59, 0.10), 0 0 0 rgba(43, 52, 59, 0.10) inset;
    }
	
    header#cmt-page-header #site-header-menu #site-navigation div.nav-menu > ul li.last ul.sub-menu,
    header#cmt-page-header #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.last ul.mega-sub-menu,
    header#cmt-page-header #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.mega-last ul.mega-sub-menu{
        left: auto;
        right: 0px !important;
    }
	header#cmt-page-header #site-header-menu #site-navigation div.nav-menu > ul li.last ul.sub-menu ul.sub-menu, 
	header#cmt-page-header #site-header-menu #site-navigation div.nav-menu > ul li.lastsecond ul.sub-menu ul.sub-menu,
	header#cmt-page-header #site-header-menu #site-navigation div.nav-menu > ul li.lastthird ul.sub-menu ul.sub-menu,
	header#cmt-page-header #site-header-menu #site-navigation div.nav-menu > ul li.lastfourth ul.sub-menu ul.sub-menu, 	 	
    
	header#cmt-page-header #site-header-menu #site-navigation div.nav-menu > ul li.last ul.children ul.children, 
	header#cmt-page-header #site-header-menu #site-navigation div.nav-menu > ul li.lastsecond ul.children ul.children,
	header#cmt-page-header #site-header-menu #site-navigation div.nav-menu > ul li.lastthird ul.children ul.children,
	header#cmt-page-header #site-header-menu #site-navigation div.nav-menu > ul li.lastfourth ul.children ul.children,
	
	header#cmt-page-header #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.lastsecond ul.mega-sub-menu ul.mega-sub-menu,
	header#cmt-page-header #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.last ul.mega-sub-menu ul.mega-sub-menu,
	header#cmt-page-header #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.mega-last ul.mega-sub-menu ul.mega-sub-menu{
    	left: -100%;
    }            
    #site-header-menu #site-navigation div.nav-menu > ul ul,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu {
        width: 250px;
        padding: 0px;
    }       
    #site-header-menu #site-navigation div.nav-menu > ul ul li > a,    
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item > a,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu .mega-sub-menu a {
        margin: 0;
        display: block;
        padding: 15px 15px;
        position: relative;         
    }
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title{
        padding: 16px 0px 16px 20px;
    }   
    #site-header-menu #site-navigation div.nav-menu > ul ul li > a,    
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li > a{
        -webkit-transition: all .2s ease-in-out;
		transition: all .2s ease-in-out;
    }
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item{
        padding: 0px;
    }
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item:last-child{
    	border-right: none;
    }          
    #site-header-menu #site-navigation div.nav-menu > ul li:hover > ul {
        opacity: 1;
        display: block;
        visibility: visible;
        height: auto;
    } 
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu ul.mega-sub-menu,
	#site-header-menu #site-navigation div.nav-menu > ul li > ul ul  {
        border-left: 0;
        left: 100%;
        top: 0px;        
    }
    #site-header-menu #site-navigation ul ul li {
    	position: relative;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul ul {
    	text-align: left;
        position: absolute;
        visibility: hidden;
        display: block;
        opacity: 0; 
        line-height: 14px;        
        margin: 0;
        list-style: none;
        left: 0;        
        border-radius: 0;
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
        background-clip: padding-box;
        transition: all .2s ease;
        z-index: 99;
    }
	#site-header-menu #site-navigation div.nav-menu > ul ul li:hover > a, 
	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item:hover > a, 
	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu .mega-sub-menu a:hover {
		padding-left: 20px;
		padding-right: 20px;
	}
	#site-header-menu #site-navigation div.nav-menu > ul > li ul a:before, 
	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li ul a:before {
		content: '';
		display: inline-block;
		height: 0;
		width: 4px;
		vertical-align: middle;
		margin-right: 0;
		opacity: 0;
		visibility: hidden;
		-webkit-transition: height .4s, opacity .4s ease, top .4s ease;
		-o-transition: height .4s, opacity .4s ease, top .4s ease;
		-moz-transition: height .4s, opacity .4s ease, top .4s ease;
		transition: height .4s, opacity .4s ease, top .4s ease;
		position: absolute;
		top: 50%;
		left: 0;
		background-color: <?php echo esc_attr($skincolor); ?>;
		-webkit-transform: translateX(0);
		-moz-transform: translateX(0);
		-ms-transform: translateX(0);
		-o-transform: translateX(0);
		transform: translateX(0);
		transition: .3s all;
	}
	#site-header-menu #site-navigation div.nav-menu > ul > li ul a:hover:before, 
	#site-header-menu #site-navigation div.nav-menu > ul > li ul li a:hover:before, 
	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu .mega-sub-menu a:hover:before, 
	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li ul a:hover:before {
		top: 0;
		height: -webkit-calc(100% + 1px);
		height: -moz-calc(100% + 1px);
		height: calc(100% + 1px);
		opacity: 1;
		visibility: visible;
	}

	
    /*** Sep Section ***/
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-item:after {
        content: ' ';
        display: block;
        width: 30px;
        height: 1000px;
        right: 0px;
        top: 0;
        position: absolute;
        border-right: 1px solid transparent;
    } 
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title,
    #site-header-menu #site-navigation div.nav-menu ul ul > li,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:not(.mega-menu-megamenu) ul.mega-sub-menu > li,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu ul.mega-sub-menu .mega-menu-item li {
    	border-bottom: 1px solid transparent;
    }
	 #site-header-menu #site-navigation div.nav-menu ul ul > li:last-child, 
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:not(.mega-menu-megamenu) ul.mega-sub-menu > li:last-child{
        border-bottom: none !important;
    }

    .cmt-submenu-sep-grey .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-item:after {
        border-right-color: rgba(0,0,0,0.10);
    } 
    .cmt-submenu-sep-grey .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title,
    .cmt-submenu-sep-grey #site-header-menu #site-navigation div.nav-menu ul ul > li,
    .cmt-submenu-sep-grey .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:not(.mega-menu-megamenu) ul.mega-sub-menu > li,
    .cmt-submenu-sep-grey .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu ul.mega-sub-menu .mega-menu-item li {
        border-bottom-color: rgba(0, 0, 0, 0.08);
    }
    .cmt-submenu-sep-white .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-item:after {
        border-right-color: rgba(255,255,255,0.10);
    } 
    .cmt-submenu-sep-white .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title,
    .cmt-submenu-sep-white #site-header-menu #site-navigation div.nav-menu ul ul > li,
    .cmt-submenu-sep-white .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:not(.mega-menu-megamenu) ul.mega-sub-menu > li,
    .cmt-submenu-sep-white .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu ul.mega-sub-menu .mega-menu-item li {
        border-bottom-color: rgba(255, 255, 255, 0.10);
    }
    
    /*** Sticky Header Height ***/ 
    header .cmt-sboxheader-highlight-logo .is_stuck #site-header-menu,
    header .is_stuck #site-header-menu #site-navigation,    
    .is_stuck .headerlogo,
    .is_stuck .cymolthemes-fbar-btn,  
    .is_stuck .cmt-header-icon,
    .is_stuck .cmt-sboxheader-text-area,
    .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li,
    .is_stuck.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li,    
    .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
    .is_stuck.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
        height: <?php echo esc_attr($header_height_sticky); ?>px ;
        line-height: <?php echo esc_attr($header_height_sticky); ?>px !important;
    }
    
    /*** Sub Navigation menu ***/ 

    #site-header-menu #site-navigation div.nav-menu > ul > li > ul,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu{
        top: auto;  
    }  
	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu{
        padding: 0px;
        margin: 0px;
        width: calc(100% - 0px);       
	}    
    .cmt-mmmenu-override-yes  #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu {
        overflow: hidden;
    }
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item:last-child:after {
    	border-right: none;
    }  
   
    /*** Sticky Sub Navigation menu ***/
    .is_stuck  #site-header-menu #site-navigation div.nav-menu > ul > li > ul, 
    .is_stuck.cmt-mmmenu-override-yes  #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu{
        top: <?php echo esc_attr($header_height_sticky); ?>px;
    } 
	
    /*** Header height ***/
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle + label{
        top: <?php echo esc_attr(ceil($header_height/2)); ?>px;
    }  
    .site-header-main.container-fullwide{
    	padding-left: 30px;
        padding-right: 0px;
    }    
    
	/*** Header Icon border ***/
	.cmt-header-icons{	
		position: relative;
        height: <?php echo esc_attr($header_height); ?>px;
    }       
	.is_stuck .cmt-header-icons{	
		border-left-color: rgba( <?php echo cymolthemes_hex2rgb($stickymainmenufontcolor); ?> , 0.15) ;
        height: <?php echo esc_attr($header_height_sticky); ?>px;
    }
	
	/*** Header Text Area ***/
    .header-style-one:not(.cmt-header-invert) .container-fullwide #site-header-menu{
        margin-right:20px;
    }

	/*** Mega menu widget calendar ***/
	#site-header-menu #site-navigation .mega-menu-item-type-widget.widget_calendar caption {
		padding: 0px;
	}
	#site-header-menu #site-navigation .mega-menu-item-type-widget.widget_calendar .calendar_wrap {
		padding-top:10px;
	} 
    
    
    /*** Header Style Two ***/ 
	
    .headerstyle-two .cmt-stickable-wrapper{
    	background-color: transparent;
    }
    .headerstyle-two .cmt-topbar-wrapper.cmt-bgcolor-darkgrey, 
	.headerstyle-two.site-header-menu.cmt-bgcolor-darkgrey, 
	.headerstyle-two .site-header.cmt-bgcolor-darkgrey {
		background-color:rgba(0, 44, 91, 0.93);
	}   
    .headerstyle-two .site-header-menu.cmt-bgcolor-grey, 
    .headerstyle-two .site-header.cmt-bgcolor-grey{
    	background-color: rgba(235, 235, 235, 0.38);
    }   
    .headerstyle-two .site-header-menu.cmt-bgcolor-white,
    .headerstyle-two .site-header.cmt-bgcolor-white{
    	background-color: rgba(255, 255, 255, 0.05);
    }
    .headerstyle-two .site-header-menu.cmt-bgcolor-skincolor,
    .headerstyle-two .site-header.cmt-bgcolor-skincolor{
    	background-color: rgba( <?php echo cymolthemes_hex2rgb($skincolor); ?> , 0.30);
    }    
    .headerstyle-two .site-header-menu.cmt-sticky-bgcolor-darkgrey.is_stuck{
    	background-color: #151515;
    }    
    .headerstyle-two .site-header-menu.cmt-sticky-bgcolor-grey.is_stuck{
    	background-color: #f5f5f5;
    }
    .headerstyle-two .site-header-menu.cmt-sticky-bgcolor-white.is_stuck{
    	background-color: #fff;
    }
    .headerstyle-two .site-header-menu.cmt-sticky-bgcolor-skincolor.is_stuck{
    	background-color: rgba( <?php echo cymolthemes_hex2rgb($skincolor); ?> , 1);
    } 
	.headerstyle-two .cmt-header-box .cmt-topbar-wrapper {
		height: 52px;
		border-bottom: 1px solid rgba(255,255,255,0.09);
	}
	.headerstyle-two .cymolthemes-topbar-inner {
		line-height: 42px;
	}  
	.header-style-four .cmt-header-icons:before,
	.header-style-three .cmt-header-icons:before {
		content:unset;
	}
	.is_stuck .cmt-header-icons:before {
		background-color: rgba( <?php echo cymolthemes_hex2rgb($stickymainmenufontcolor); ?> ,0.19);	
	}
    /*** CymolThemes Center Menu ***/ 	
	.cmt-sboxheader-menu-position-center #site-header-menu{
		float: none;
	}
	.cmt-sboxheader-menu-position-center #site-header-menu #site-navigation{
		text-align: center;
		width: 100%;
	}    
    .cmt-sboxheader-menu-position-center #site-header-menu  #site-navigation .nav-menu,
	.cmt-sboxheader-menu-position-center.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap {		
		float: none;
		right: 0;
		left: 0;
		text-align: center;      
	}	
	.cmt-sboxheader-menu-position-center.cmt-mmmenu-override-yes  #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal {
		position: static !important;
		display: inline-block;
	}
	.cmt-sboxheader-menu-position-center .site-header-menu.cmt-section-wrapper-cell{
		display: block;
	}
	.cmt-sboxheader-menu-position-center .headerlogo, 
	.cmt-sboxheader-menu-position-center .cmt-header-icon{
		position: relative;
		z-index: 2;
	}
	
	/*** CymolThemes Left Menu ***/ 	
	.cmt-sboxheader-menu-position-left #site-header-menu{
		float: none;
		display: block;
    }
    .cmt-sboxheader-menu-position-left #site-header-menu #site-navigation .nav-menu,
	.cmt-sboxheader-menu-position-left #site-header-menu #site-navigation div.mega-menu-wrap {
		float: left;
	}
	.cmt-sboxheader-menu-position-left .site-branding{	
		padding-right: 25px;
	}	
	
	/*** CymolThemes Dropdown widht narrow ***/ 	
	.site-header-main.container-full #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu{		
		max-width: 1200px;
		right: 0;
		left: -15px;
		margin: 0px auto;
	}
    	
	/* Header Social link */ 
    .site-header .cymolthemes-social-links-wrapper{
    	float: right;
    }
    .site-header .social-icons {
        padding-top: 0;
        padding-bottom: 0;
    }

    /***  Cmt Header Style Infostack ***/   
    .header-style-four:not(.cmt-header-invert) #site-header-menu #site-navigation .nav-menu{
    	float: left;
		margin-right: 50px;
	}   
    .header-style-four  #site-header-menu{
    	float: none;
    }
    .header-style-four #site-header-menu #site-navigation div.nav-menu > ul > li{
        vertical-align: top;
    }
    .header-style-four #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
    .header-style-four .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a { 
		padding: 0;
		margin: 0px 14px 0px 14px;
    } 
	.header-style-four #site-header-menu #site-navigation div.nav-menu > ul > li:first-child > a, .header-style-four .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:first-child > a {
		margin-left: 0px;
	}	
    .header-style-four #site-header-menu #site-navigation div.nav-menu > ul > li > a:before, 
    .header-style-four .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:before{
        bottom: <?php echo (cymolthemes_header_menuarea_height() / 2 - 14); ?>px; 
	    left:2%;
    }
	.header-style-four .cmt-sboxheader-top-wrapper .site-branding{
		float:left;
		text-align:left; 
		display:block;
		position: relative;
		z-index: 10;
	}
	.header-style-four .cmt-sboxheader-top-wrapper .headerlogo {
		position: relative;
	}
    .header-style-four #site-header-menu #site-navigation div.mega-menu-wrap{
    	float: none;
    }    
    .header-style-four .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu{
    	top: auto;
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
    }  
    .header-style-four .header-content-main .header-content,
    .header-style-four .header-content-main .header-icon{
        display: table-cell;
        vertical-align: middle;
    }
    .header-style-four .cmt-vc_icon_element {
        margin-bottom: 0px;
    }    
    .header-style-four .cmt-bgcolor-grey .header-content-main .header-content,
    .header-style-four .cmt-bgcolor-white .header-content-main .header-content{
    	color: rgba(0, 0, 0, 0.8);
    }       
    .header-style-four .cmt-bgcolor-skincolor .header-content-main .header-content,
    .header-style-four .cmt-bgcolor-darkgrey .header-content-main .header-content {
        color: rgba( 255,255,255,0.7);
    } 
    .header-style-four .cmt-bgcolor-skincolor .cmt-vc_icon_element.cmt-vc_icon_element-outer .cmt-vc_icon_element-inner,
    .header-style-four .cmt-bgcolor-darkgrey .cmt-vc_icon_element.cmt-vc_icon_element-outer .cmt-vc_icon_element-inner{	
    	color: #fff;
    }      
    header.header-style-four .site-header:after{
        display: none;       
	}
	.header-style-four .cmt-header-icons span:only-child:not(.cmt-duplexo-icon-search) {
		margin-right: -10px;
	}
	.header-style-four .cmt-bgcolor-skincolor .cmt-header-icons a,
	.header-style-four .cmt-bgcolor-darkgrey .cmt-header-icons a,
	.header-style-four .cmt-bgcolor-skincolor .cmt-header-icons,
	.header-style-four .cmt-bgcolor-darkgrey .cmt-header-icons,
	.cmt-header-icons .cymolthemes-fbar-btn a {
		color:#fff;
	}	
    .header-style-four .cymolthemes-fbar-btn.animated {
        -webkit-transform: translateX(0px);
        -ms-transform: translateX(0px);
        transform: translateX(0px);
    }   
    .header-style-four .cmt-header-icon.cmt-sboxheader-btn-w{
        padding-right: 0px;
        display: block;
        text-align: center;
        color: #fff;        
        width: auto;
    }
    .header-style-four #site-header-menu #site-navigation .cmt-header-icon.cmt-sboxheader-btn-w a{
        color: #fff; 
        font-size: 14px;
        padding: 0px 35px;
        display: block;
        letter-spacing: 1px;      
        background-color: rgba( <?php echo cymolthemes_hex2rgb($skincolor); ?> , 1);
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }    
    .header-style-four #site-header-menu.cmt-bgcolor-skincolor #site-navigation .cmt-header-icon.cmt-sboxheader-btn-w a{
    	background-color: rgba(0, 0, 0, 0.19);
    }
    .header-style-four #site-header-menu.cmt-bgcolor-skincolor #site-navigation .cmt-header-icon.cmt-sboxheader-btn-w a:hover{
    	background-color: rgba(0, 0, 0, 0.40);
    }    
    .header-style-four #site-header-menu #site-navigation .cmt-header-icon.cmt-sboxheader-btn-w a:hover{
        background-color: rgba( <?php echo cymolthemes_hex2rgb($skincolor); ?> , 0.80);
    }
    .header-style-four #site-header-menu #site-navigation div.nav-menu > ul > li, 
    .header-style-four .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item,      
    .header-style-four #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
    .header-style-four .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
    .header-style-four .kw-phone .cmt-header-icon, 
    .header-style-four .kw-phone .cmt-header-icons,	
     header.header-style-four #site-header-menu #site-navigation,
    .header-style-four .kw-phone .cymolthemes-fbar-btn{
        height: <?php echo esc_attr($cymolthemes_header_menuarea_height); ?>px;
        line-height: <?php echo esc_attr($cymolthemes_header_menuarea_height); ?>px !important;
    }
    .header-style-four #site-header-menu #site-navigation div.mega-menu-wrap{
        position: relative;
    }
    .header-style-four .cmt-stickable-wrapper{
        height: auto !important;
    }
	.cymolthemes-fullwide .header-style-four .cmt-stickable-wrapper{
        position: initial;
    }
    .header-style-four:not(.header-style-three) #site-header-menu {
        float: none;
    }    	
	.header-style-four .cmt-sboxtop-info-con,
    .header-style-four .cmt-sboxtop-info-con > ul:not(.social-icons),
    .header-style-four .headerlogo{
        height: <?php echo esc_attr($header_height) - ($cymolthemes_header_menuarea_height/2); ?>px;
    }
	
	.header-style-four .kw-phone{
		height: <?php echo esc_attr($cymolthemes_header_menuarea_height); ?>px;
		line-height: <?php echo esc_attr($cymolthemes_header_menuarea_height); ?>px;
		background-color: rgba( <?php echo cymolthemes_hex2rgb($skincolor); ?> , 1);
	}
	.header-style-four .headerlogo .site-title {
		text-align: left;
	}
    .header-style-four .site-branding{
        float: none;
    }
	.header-style-four.cmt-sboxheader-overlay .site-header ,.cmt-sboxstickable-header.cmt-sboxheader-menu-bg-color-custom:not(.is_stuck),
	.header-style-four .site-header .cmt-sboxstickable-header.cmt-sboxheader-menu-bg-color-white:not(.is_stuck) {	
		border-top: 1px solid rgba(0, 0, 0, 0.05);	
	}
    .header-style-four .site-header-menu-middle{
        margin: 0 15px;
        position: relative;        
        padding: 0px;
    }
    .header-style-four .is_stuck .site-header-menu-middle{
        padding: 0px;
		box-shadow: none;
    }
	.header-style-four #site-header-menu #site-navigation div.nav-menu > ul ul {
	    background-clip: unset;	
	}
	.header-style-four .is_stuck.cmt-sticky-bgcolor-custom .cmt-container-for-header .cmt-sticky-bgcolor-custom{
        background-color: transparent !important;
    }
    .header-style-four.headerstyle-two .site-header{
        position: absolute;
        width: 100%;        
    } 
	.header-style-four.headerstyle-two .site-header{ 
		z-index: 9;	
    }  	
    .header-style-four.headerstyle-two .site-branding,
    .header-style-four.headerstyle-two .cmt-sboxheader-widgets-wrapper{
        position: relative;     
        z-index: 1;
    }
    .header-style-four.headerstyle-two .cmt-title-wrapper{
        z-index: 0;
    }
	.header-style-four .kw-phone .tcmt-sboxcustombutton {
        padding: 0 0px 0 30px;
		display: table;
	}
	.header-style-four .kw-phone .tcmt-sboxcustombutton p {
		margin-bottom:5px;
		font-size: 13px;
		line-height: 1;
	}
	.header-style-four .kw-phone .tcmt-sboxcustombutton:after {
		content: "";
		width: 5000px;
		height: 100%;
		background-color: rgba( <?php echo cymolthemes_hex2rgb($skincolor); ?> , 1);
		left: 100%;
		top: 0px;
		position: absolute;
	}
	.header-style-four .cmt-sboxheader-menu-bg-color-skincolor .kw-phone .tcmt-sboxcustombutton a {
		margin-left:0px;
	}
    .header-style-four .kw-phone .tcmt-sboxcustombutton a {
        font-size: 17px;
        font-weight: 600;
		line-height: 1;
		color: #fff;
	}
	.header-style-four .tcmt-sboxcustombutton i {
		position: relative;
		top: 1px;
	}
	.header-style-four .tcmt-sboxcustombutton .cmt-custombutton {
		line-height: 1;
		vertical-align: middle;
		height: 66px;
		display: table-cell;
		color: #fff;
	}
	#site-header-menu #site-navigation div.mega-menu-wrap > ul > li:last-child:after,
    #site-header-menu #site-navigation div.nav-menu > ul > li:last-child:after{
        display: none;
    }
	.header-style-four .kw-phone .cmt-header-icons:last-child:after {
		content:none;
	}	
	#site-header-menu #site-navigation div.nav-menu > ul > li > a:before,
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:before {
        bottom: <?php echo ceil($header_height/2)-15; ?>px;
        right:auto;
    }
    .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a:before,
    .is_stuck.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:before {
        bottom: <?php echo ceil($header_height_sticky/2)-19; ?>px;
    }   
    .header-style-four #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a:before,
    .header-style-four .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a:before{
        width: 15px;
        opacity:1;
    }  
	.header-style-four .cmt-sboxtop-info-con > .header-widget:after {
		content: "";
		height: 40px;
		width: 1px;
		background-color: rgba(0, 0, 0, 0.06);
		display: block;
		position: absolute;
		right: 0px;
		top: 35px;
	}
	.header-style-four .cmt-sboxtop-info-con > .header-widget:last-child:after {
		content:none;
	}
	.header-style-four .cmt-title-wrapper.cmt-breadcrumb-on-bottom .cmt-titlebar-main > .container .cmt-titlebar-main-inner .entry-title-wrapper {
	    margin-top: -14px;	
	}
	.header-style-four .cmt-header-menu-bg-color-custom .cmt-header-icons .cmt-sboxheader-search-link a,
	.header-style-four .cmt-sticky-bgcolor-custom .cmt-header-icons .cmt-sboxheader-search-link a,
	.header-style-four .cmt-sticky-bgcolor-custom .cmt-header-icons .cmt-header-wc-cart-link a,
	.header-style-four .cmt-header-menu-bg-color-custom .cmt-header-icons .cmt-header-wc-cart-link a {
		color: rgba(2,13,38,1);
	}
	

    /* Right to Left Dropdown menu */          
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-align-bottom-right ul.mega-sub-menu li > a:before {
        content: '\E83A';    
        left: auto;
        right: -14px;   
        -webkit-transition: right .2s ease-in-out;
        -moz-transition: right .2s ease-in-out;
        transition: right .2s ease-in-out;
	}    
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-menu-megamenu.mega-align-bottom-right ul.mega-sub-menu li.menu-item > a{
    	text-align: right;
    }    
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-align-bottom-right > ul.mega-sub-menu li.mega-menu-item:after {
        right: auto;
        left: 12px;
        position: absolute;
        border-right: none;
        border-left: 1px solid rgba(255,255,255,0.08);
    }  
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-align-bottom-right > ul.mega-sub-menu > li.mega-menu-item > h4.mega-block-title {
        text-align: right;
    }    
   .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-align-bottom-right > ul.mega-sub-menu > li.mega-menu-item:first-child:after {
    	border-left: none;
	}    
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu:before {
        content: " ";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;		
        display:block;
    }
	.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu ul.mega-sub-menu{
        background-image: none !important;      
    }    
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-menu-megamenu.mega-align-bottom-right ul.mega-sub-menu li.menu-item:hover > a,    
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-align-bottom-right ul.mega-sub-menu li.mega-menu-item:hover > a {
    	padding-left: 0px;
        padding-right: 20px;
	}
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-align-bottom-right ul.mega-sub-menu li:hover > a:before {
        left: auto;
        right: 0px;
	}    
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-align-bottom-right ul.mega-sub-menu > li.mega-menu-item-type-widget div.textwidget{
        padding-left: 15px;
        text-align: right;
    }    
    /* Header sticky animation */  
	    
    .site-header.is_stuck {
        position: fixed;
        width:100%;
        top:0;    
        z-index: 999;
        margin:0;
        animation-name: menu_sticky;
        -webkit-box-shadow: 0px 13px 25px -12px rgba(0,0,0,0.25);
        -moz-box-shadow: 0px 13px 25px -12px rgba(0,0,0,0.25);
        box-shadow: 0px 13px 25px -12px rgba(0,0,0,0.25);
        padding: 0;
    }    
	.header-style-six .site-header.is_stuck {
		animation-duration: 0.70s;
        animation-timing-function: ease-in-out;;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul > li ul li.page_item_has_children > a:after, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul li.menu-item-has-children > a:after{
        font-family: "FontAwesome";
        font-style: normal;
        font-weight: normal;
        display: inline-block;
        text-decoration: inherit;
        text-align: center;
        opacity: .8;
        font-variant: normal;
        text-transform: none;
        font-size: 15px;
        content: "\f105";
        position: absolute;
        background-color: transparent;
        right: 12px;
        top: 16px;
        margin: 0;
    }    
    .cmt-header-icons .cymolthemes-fbar-btn,
    .cmt-header-icons .cmt-header-icon{
        margin-left: 7px;
    }
	.cmt-header-icons .cmt-header-icon.cmt-header-wc-cart-link {
		padding-right: 0px;
	}
	.header-style-one .cmt-header-icons .cmt-header-icon.cmt-header-wc-cart-link {
		padding-left: 4px;
	}
	.header-style-four:not(.header-style-three) .kw-phone .cmt-header-icons .cmt-header-wc-cart-link {
		margin-right: 0px;
		margin-left: 15px;
		padding-left: 10px;
		border-left: 1px solid rgba( <?php echo cymolthemes_hex2rgb($mainMenuFontColor); ?> , 0.07);
	}
	.header-style-four:not(.header-style-three) .is_stuck .kw-phone .cmt-header-icons .cmt-header-wc-cart-link {
		border-color: rgba( <?php echo cymolthemes_hex2rgb($stickymainmenufontcolor); ?> , 0.07);
	}
	
     /*** cmt-header-invert ***/ 
    .header-style-one.cmt-header-invert .container-fullwide #site-header-menu{
        margin-left:20px;
    }
    .cmt-header-invert .site-header-main.container-fullwide{
        padding-right: 30px;
        padding-left: 0px;
    }     
    .cmt-header-invert #site-header-menu{
        float: left;
    }
    .cmt-header-invert .site-branding{
        float:right;    
    } 
    .cmt-header-invert .cmt-header-icons {        
        float: left;
        border-left: none;
        padding-right: 0px;
        padding-left: 0px;
        margin-left: 0px;
        margin-right: 0px;
    }
    .cmt-header-invert .site-header .cymolthemes-social-links-wrapper{
        padding-right: 0;
        padding-left: 0px;
    } 
    .cmt-header-invert .cmt-sboxheader-search-link,
    .cmt-header-invert .cmt-header-wc-cart-link{
        float: left;
        padding-left: 0;        
    }
    .cmt-header-invert #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal {        
        text-align: right;
    }    
    .cmt-header-invert #site-header-menu #site-navigation div.nav-menu > ul > li, 
    .cmt-header-invert #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item {
        float: right;      
    }    
    .cmt-header-invert .cmt-sboxheader-top-wrapper.container-fullwide{
        padding-right: 15px;
    }
    .cmt-header-invert .cmt-header-icon, 
    .cmt-header-invert .cymolthemes-fbar-btn {
        margin-right: 20px;
        margin-left: 0px;
    }
    .header-style-four.cmt-header-invert .cmt-sboxheader-widgets-wrapper {
        float: left;
    }    
    .header-style-four.cmt-header-invert .cmt-sboxheader-widgets-wrapper .header-widget {
        padding-right: 24px;
        padding-left: 0;
    }    
    .header-style-four.cmt-header-invert .cymolthemes-fbar-btn{        
        border-left: 1px solid rgba( <?php echo cymolthemes_hex2rgb($mainMenuFontColor); ?> , 0.09) ;
        left: 0;
        float: left;
    }   
    .header-style-four.cmt-header-invert .cmt-header-icon, 
    .header-style-four.cmt-header-invert .cymolthemes-fbar-btn {
        margin-right: 0px;
        margin-left: 0px;
    }
    .header-style-four:not(.cmt-header-invert) .cmt-sboxheader-top-wrapper.container-fullwide{
        padding-left: 15px;
        padding-right: 15px;
    }       

    .header-style-one .cmt-sboxheader-highlight-logo .headerlogo{
        position: relative;
    }
    .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item-has-children > a.mega-menu-link:after{
        font-size: 10px;
		margin-left: 3px;
		margin-top: 3px;
		margin-top: 3px;
		opacity: 0.3;
    }
	.header-style-four .site-header.is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li, 
    .header-style-four .site-header.is_stuck .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap    ul.mega-menu.mega-menu-horizontal > li.mega-menu-item,      
    .header-style-four .site-header.is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
    .header-style-four .site-header.is_stuck .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
    .header-style-four .site-header.is_stuck .kw-phone .cmt-header-icon, 
    .header-style-four .site-header.is_stuck .kw-phone .cmt-header-icons,	
     header.header-style-four .site-header.is_stuck #site-header-menu #site-navigation,
    .header-style-four .site-header.is_stuck .kw-phone .cymolthemes-fbar-btn,
	.header-style-four .site-header.is_stuck .headerlogo {
		 height: <?php echo esc_attr($header_height_sticky); ?>px ;
        line-height: <?php echo esc_attr($header_height_sticky); ?>px !important;
	}
	.header-style-three .cmt-sboxheader-top-wrapper>div,
	.header-style-three .info-widget,
    .header-style-three .headerlogo{
        height: <?php echo esc_attr($header_height) - ($cymolthemes_header_menuarea_height/2); ?>px;
		margin-bottom: 0;
    }
	.header-style-three.header-style-four .cmt-sboxheader-top-wrapper .site-branding,
    .header-style-three .site-branding{
        float: none;
		display: inline-flex;
    }
	.header-style-three.header-style-four .headerlogo .site-title {
		text-align: center;
	}
	.header-style-three.header-style-four .site-header-menu-middle {
		box-shadow: unset;
	}
	.header-style-three .site-header-main .cmt-sboxheader-top-wrapper>div {
		display: block;
	}
	.header-style-four.header-style-three #site-header-menu #site-navigation div.nav-menu > ul > li > a, .header-style-four.header-style-three .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a {
		padding: 0;
		margin: 0px 18px 0px 18px;
	}
	.header-style-three .cmt-sboxheader-top-wrapper .col-sm-4.col-md-3 .widget-right,
	.header-style-three .cmt-sboxheader-top-wrapper .col-sm-4.col-md-3 .widget-left {
		display: block;
		width: 100%;
		float: left;
	}
	.header-style-three .cmt-sboxheader-top-wrapper .col-sm-4.col-md-3 .widget-right {
		border-left: 1px solid #efefef;
	}
	.header-style-three .cmt-sboxheader-top-wrapper .col-sm-4.col-md-3 .widget-left {
		border-right: 1px solid #efefef;
	}
	.header-style-four.header-style-three:not(.cmt-header-invert) #site-header-menu #site-navigation .nav-menu {
		float: none;
		text-align: center;
	}
	.header-style-four.header-style-three:not(.cmt-header-invert) #site-header-menu #site-navigation .nav-menu {
		margin-right: 0px;
	}	
	

	.cmt-title-wrapper.cmt-breadcrumb-on-bottom .cmt-titlebar .entry-title-wrapper {
		margin-top: -50px;
	}
	#site-header-menu #site-navigation .cmt-header-icon a.cmt-social-btn-link {
		font-size: 18px;
	}
	#site-header-menu #site-navigation .cmt-header-icon.cmt-sboxheader-social-box {
	    width: 50px;
		text-align: center;
	}

	.header-style-six .cmt-header-box .cmt-stickable-wrapper .site-branding {
		display: table-cell;
		vertical-align: middle;
		float: left;		
		position: absolute;
		top: -50px;
		z-index: 111;
		background-color: #fff;
		padding: 0 40px;
	}
	.header-style-six .cmt-header-box .cmt-stickable-wrapper .is_stuck .site-branding {
		top:0px;
	}
	.header-style-six .cmt-header-box .cmt-stickable-wrapper .site-branding,
	.header-style-six .cmt-header-box .cmt-stickable-wrapper .headerlogo {
		height: <?php echo esc_attr($header_height) +  75; ?>px;
		line-height: <?php echo esc_attr($header_height) + 75; ?>px;
	}
	.header-style-six .cmt-header-box .cmt-stickable-wrapper .is_stuck .site-branding,
	.header-style-six .cmt-header-box .cmt-stickable-wrapper .is_stuck .headerlogo {
		height: <?php echo esc_attr($header_height_sticky); ?>px;
		line-height: <?php echo esc_attr($header_height_sticky); ?>px;
	}
	.header-style-six .cmt-header-box .cmt-stickable-wrapper:first-child .site-branding {
		top:0px;
	}
	.cmt-mmenu-active-color-custom .site-header .social-icons li > a:hover {
		background-color: #fff;
	}
}

