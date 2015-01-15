<!DOCTYPE html>
<html lang="en">
<head>

    <?php if(!is_front_page()){ ?>
	<title><?php wp_title(); print " | "; bloginfo('name'); ?></title>
    <meta name="description" content="Tony is a Student Web Application Developer and pixel pusher based in Plymouth, South West England">
    <?php } ?>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>
        <script src="<?php echo SCRIPT; ?>/html5shiv.js"></script>
    <![endif]-->
    
    <!--[if lt IE 7]>
        <link rel="stylesheet" type="text/css" href="<?php echo STYLE.'/ie.css'; ?>" />
    <![endif]-->

    <?php wp_head(); ?>
</head>

<body <?php body_class( $class ); ?>>

    <div class="container containerBackground">
        <div class="grid">
            
            <header class="unit full-width">  
                
                <?php $logo= get_option('portfolio_logo', IMAGES.'/tony_edwards.png'); ?>
                <span>
                    <a href="<?php echo home_url(); ?>" title=""><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" id="logoImage" /></a>
                </span>
                
                <ul id="toggle-menu">
                    <li class="pullDown"><a href="#" id="pull"><i class="fa fa-bars fa-3x"></i></a></li>
                </ul>

                <?php wp_nav_menu( array('menu' => 'Main', 'container' => 'nav' )); ?>

            </header>
            
            <div class="content">