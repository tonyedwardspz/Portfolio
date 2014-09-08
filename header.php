<!DOCTYPE html>
<html>
<head>

	<title><?php wp_title(); ?> | <?php bloginfo('name'); ?></title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>
        <script src="<?php echo SCRIPT; ?>/html5shiv.js"></script>
    <![endif]-->
    
    <!--[if lt IE 7]>
        <link rel="stylesheet" type="text/css" href="<?php echo STYLE.'/ie.css'; ?>" />
    <![endif]-->
    
    

    <?php wp_head(); ?>
</head>

<body>

    <div class="container containerBackground">
        <div class="grid">
            
            <header class="unit full-width">  
                
                <?php $logo= get_option('portfolio_logo', IMAGES.'/tony_edwards.png'); ?>
                <span><a href="<?php echo home_url(); ?>"><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" /></a></span>
                
                <ul id="toggle-menu">
                        <li><a href="#" id="pull"><img src="<?php echo IMAGES ?>/nav-icon.png" /></a></li>
                    </ul>
                <?php wp_nav_menu( array('menu' => 'Main', 'container' => 'nav' )); ?>

            </header>
            
            <div class="content">