<!DOCTYPE html>
<html>
<head>

	<title><?php wp_title(); ?> | <?php bloginfo('name'); ?></title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <!--[if lt IE 9]>
        <script src="script/html5shiv.js"></script>
    <![endif]-->
    
    

    <?php wp_head(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/script/script.js" /></script>
</head>

<body>

    <div class="container">
        <div class="grid">
            
            <header class="unit full-width">  
                
                <?php $logo= get_option('portfolio_logo', IMAGES.'/tony_edwards.png'); ?>
                <span><a href="index.html"><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" /></a></span>
                
<!--
                <nav>
                    <ul id="toggle-menu">
                        <li><a href="#" id="pull"><img src="images/nav-icon.png" /></a></li>
                    </ul>
                    
                    <ul class="menu force-darkgrey">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
-->
                
                <?php wp_nav_menu( array('menu' => 'Main', 'container' => 'nav' )); ?>

            </header>
            
            <div class="content">