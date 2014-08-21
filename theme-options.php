<?php
// create custome plugin setting menu
add_action('admin_menu', 'portfolio_create_menu');

function portfolio_create_menu(){

	//create new submenu
	add_submenu_page(
		'themes.php', //parent page
		'Portfolio Theme Options', // page title
		'Portfolio Options', // menu title
		'administrator', // permision
		'theme-options.php', // menu slug (using the file name)
		'portfolio_settings_page' // function to build page
		);

	// call register settings function
	add_action('admin_init', 'portfolio_register_settings');
}

function portfolio_register_settings(){

	register_setting('portfolio-settings-group', 'portfolio_googleplus');
	register_setting('portfolio-settings-group', 'portfolio_twitter');
	register_setting('portfolio-settings-group', 'portfolio_linkedin');
	register_setting('portfolio-settings-group', 'portfolio_github');
	register_setting('portfolio-settings-group', 'portfolio_dribbble');
	register_setting('portfolio-settings-group', 'portfolio_logo');
	register_setting('portfolio-settings-group', 'portfolio_analytics');
}

function portfolio_settings_page(){ ?>

<div class="wrap">
	<h2>Portfolio Theme Settings</h2>

	<form id="landingOptions" method="post" action="options.php">
	<?php settings_fields( 'portfolio-settings-group' ); ?>		
	<table class="form-table">
		<tr valign="top">
		<th scope="row">Logo:</th>
		<td>
			<input type="text" name="portfolio_logo" value="<?php print get_option('portfolio_logo'); ?>" />
			<br/>
			*upload using the Media Uploader and paste the URL here.
		</td>
		</tr>

		<tr valign="top">
		<th scope="row">Twitter Link:</th>
		<td>
			<input type="text" name="portfolio_twitter" value="<?php print get_option('portfolio_twitter'); ?>" />
			<br/>
		</td>
		</tr>

		<tr valign="top">
		<th scope="row">Google+ Link:</th>
		<td>
			<input type="text" name="portfolio_googleplus" value="<?php print get_option('portfolio_googleplus'); ?>" />
			<br/>
		</td>
		</tr>

		<tr valign="top">
		<th scope="row">Linked In Link:</th>
		<td>
			<input type="text" name="portfolio_linkedin" value="<?php print get_option('portfolio_linkedin'); ?>" />
			<br/>
		</td>
		</tr>

		<tr valign="top">
		<th scope="row">Github Link:</th>
		<td>
			<input type="text" name="portfolio_github" value="<?php print get_option('portfolio_github'); ?>" />
			<br/>
		</td>
		</tr>

		<tr valign="top">
		<th scope="row">Dribble Link:</th>
		<td>
			<input type="text" name="portfolio_dribbble" value="<?php print get_option('portfolio_dribbble'); ?>" />
			<br/>
		</td>
		</tr>

		<tr valign="top">
		<th scope="row">Analytics Code:</th>
		<td>
			<textarea name="portfolio_analytics"><?php print get_option('portfolio_analytics'); ?></textarea>
		</td>
		</tr>

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>

	</form>
</div>


<?php }




?>