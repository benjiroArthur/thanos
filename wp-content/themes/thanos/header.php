<!DOCTYPE html>
<html>
<head>
    <title>
        <?php
            wp_title('|', 'true', 'right');
            bloginfo('name');
        ?>
    </title>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/fontawesome.min.css">
        <?php wp_head(); ?>
</head>
<body>
<div class="container-fluid">
<!--    <div class="container">-->
    <header>
        <nav class="navbar navbar-expand-md bg-amalitech shadow-sm">
            <div class="navbar-brand">
                <a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.jpg" title="<?php bloginfo('title'); ?>"></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="fa fa-bars"></span>
            </button>

<!--            <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
                <?php
                wp_nav_menu( array('container_class'=>'collapse navbar-collapse', 'container'=>'div', 'container_id'=>'navbarSupportedContent',
                    'menu_class'=>'navbar-nav mr-auto'));

                ?>

        </nav>
    </header>
<!--    </div>-->

</div>

<script src="<?php bloginfo('template_url'); ?>/jquery/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>
</body>
</html>
