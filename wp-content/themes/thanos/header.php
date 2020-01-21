<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
            wp_title('|', 'true', 'right');
            bloginfo('name');
        ?>
    </title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/themify-icons/themify-icons.css">
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/fontawesome.min.css">
        <?php wp_head(); ?>
</head>
<body>
<div class="container-fluid">
<!--    <div class="container">-->
    <header style="height: 50px;">
        <nav class="navbar navbar-expand-md shadow-sm fixed-top" style="line-height: 50px;  background-color: white;">
                <a class="navbar-brand py-0" href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" width="150px" title="<?php bloginfo('title'); ?>"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="ti ti-menu"></span>
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


