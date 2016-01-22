<!DOCTYPE html>
<html lang="en">
<head>

	<title><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" type="text/css" href="<?php echo STYLE.'/print.css'; ?>" media="print"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 7]>
        <link rel="stylesheet" type="text/css" href="<?php echo STYLE.'/ie.css'; ?>" />
    <![endif]-->

    <?php wp_head(); ?>
	<?php
	$single = (is_single() ? TRUE : FALSE);
	if ($single){
		$prevPost = get_previous_post();
		if (!empty( $prevPost )){ ?>
			<link rel="prev" href="<?php echo get_permalink($prevPost->ID); ?>"/>
		<?php }
		$nextPost = get_next_post();
		if (!empty( $nextPost )) { ?>
			<link rel="next" href="<?php echo get_permalink($nextPost->ID); ?>"/>
		<?php }
    } ?>
</head>

<body <?php body_class(); ?>> 


    <div class="container containerBackground">
        <div class="row">

            <header class="column">

                <?php $logo= get_option('portfolio_logo', IMAGES.'/tony_edwards.png'); ?>
                <span>
                    <a href="<?php echo home_url(); ?>" title="Tony Edwards, Web App Developer">
                        <img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" id="logoImage" height="84" width="250"/>
                    </a>
                </span>

                <ul id="toggle-menu">
                    <li class="pullDown">
                        <a href="#" id="pull" title="Menu"></a>
                    </li>
                </ul>

                <?php wp_nav_menu( array('menu' => 'Main', 'container' => 'nav' )); ?>

            </header>

        </div>

        <div class="content">
