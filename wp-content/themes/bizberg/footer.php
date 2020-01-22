<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bizberg
 */

do_action( 'bizberg_footer_top' );

bizberg_get_footer(); ?>

<!-- start Back To Top -->
<div id="back-to-top">
    <a href="javascript:void(0)"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end Back To Top -->

<?php wp_footer(); ?>
</body>
</html>
