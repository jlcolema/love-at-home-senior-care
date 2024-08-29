<?php

/*

Plugin Name: WDW Custom Functionality 

Description: Add some custom header & footer content (styles, scripts, etc)

Author: Well Dressed Walrus

Version: 1.0

Author URI: http://welldressedwalrus.com

*/



function wdw_header_content() {

  ?>

  <style type="text/css" media="screen">

      /* = Style Customizations & Overrides ----------------------------------------------- */

	#top-menu {margin-top: 41px; margin-left: 215px; margin-bottom: 40px;}

	#home-section-news { background-color: #868a6c; }

	.blog-post a.learn-more { background: linear-gradient(to bottom, rgb(192, 197, 165) 0%,rgba(193, 197, 173, 1) 100%);}

	a.learn-more:hover, .blog-post a.learn-more:hover { 

		background: linear-gradient(to bottom, rgba(101, 104, 87, 1) 0%,rgba(101, 104, 87, 1) 100%);

		border: 1px solid #525a53; 

        }

	body { color:#333; }

	h1, h2 { font-weight: bold; }

	h1, h2, h3, h4, h5, h6 { padding-bottom: 5px; line-height: 1.5em;}

      /* = SHORTCODE STYLES   ----------------------------------------------- */

      .margin10 { margin-bottom: 10px; }

      .margin20 { margin-bottom: 20px; }

      .margin40 { margin-bottom: 40px; }

      .margin60 { margin-bottom: 60px; }

      .divider {

	 display: block;

 	 width: 90%;

 	 margin: 10px auto;

 	 height: 1px;

	 border-bottom: 1px solid #999;

	 clear: both;

	}



      /* = WORDPRESS STYLE OVERRIDES   ----------------------------------------------- */

      .aligncenter,

      img.aligncenter {

      	clear: both;

      	display: block;

      	margin-left: auto;

      	margin-right: auto;

      	text-align: center;

      }



      /* = CLEARFIX STYLEs  ----------------------------------------------- */

      /**

       * For modern browsers

       * 1. The space content is one way to avoid an Opera bug when the

       *    contenteditable attribute is included anywhere else in the document.

       *    Otherwise it causes space to appear at the top and bottom of elements

       *    that are clearfixed.

       * 2. The use of `table` rather than `block` is only necessary if using

       *    `:before` to contain the top-margins of child elements.

       */

      .clearfix:before,

      .clearfix:after,

      .cf:before,

      .cf:after {

          content: " "; /* 1 */

          display: table; /* 2 */

      }



      .clearfix:after,

      .cf:after {

          clear: both;

      }



      /**

       * For IE 6/7 only

       * Include this rule to trigger hasLayout and contain floats.

       */

      .clearfix,

      .cf {

          *zoom: 1;

      }



      



	#main-header #page-name { clear: both; }

  </style>

 <?php

}

add_action( 'wp_head', 'wdw_header_content' ); // 'my_header_content' here is the name of the function above





function wdw_footer_content() {

    ?>

    <!-- ADD CUSTOM FOOTER CONTENT HERE -->

    <?php

}

add_action( 'wp_footer', 'wdw_footer_content' ); // 'my_header_content' here is the name of the function above







/* shortcodes

**********************************************************************/

function wdw_margin10($atts, $content = null) {

  return '<div class="row-fluid margin10">' . do_shortcode($content) . '</div>';

}

add_shortcode('margin10', 'wdw_margin10');



function wdw_margin20($atts, $content = null) {

  return '<div class="row-fluid margin20">' . do_shortcode($content) . '</div>';

}

add_shortcode('margin20', 'wdw_margin20');



function wdw_margin40($atts, $content = null) {

  return '<div class="row-fluid margin40">' . do_shortcode($content) . '</div>';

}

add_shortcode('margin40', 'wdw_margin40');



function wdw_margin60($atts, $content = null) {

  return '<div class="row-fluid margin60">' . do_shortcode($content) . '</div>';

}

add_shortcode('margin60', 'wdw_margin60');



function wdw_hidden($atts, $content) {

  return '<div style="display: none;">'.$content.'</div>';

}

add_shortcode( 'hidden', 'wdw_hidden' );



function wdw_clearfix($atts, $content) {

  return '<div class="clearfix"></div>';

}

add_shortcode( 'clearfix', 'wdw_clearfix' );





function shortcode_insert_divider( ) {

 	return '<div class="divider"></div>';

}

add_shortcode( 'divider', 'shortcode_insert_divider' );

?>