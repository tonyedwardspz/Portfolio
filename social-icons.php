<div class="FAageSocialIcons">
<?php
// get the social links entered via the theme options page
$googleplus = get_option('portfolio_googleplus');
$twitter = get_option('portfolio_twitter');
$linkedin = get_option('portfolio_linkedin');
$github = get_option('portfolio_github');
$dribbble = get_option('portfolio_dribbble');
?>
<ul>
    <?php if($twitter): ?>
    <li class="twitter">
        <a href="<?php print $twitter; ?>" title="Find me on Twitter" target="_blank">
            <i class="social_icon fa fa-twitter"></i>
        </a>
    </li>
    <?php endif; if($github): ?>
    <li  class="github">
        <a href="<?php print $github; ?>" title="Find me on Github" target="_blank">
            <i class="social_icon fa fa-github"></i>
        </a>
    </li>
    <?php endif; if($googleplus): ?>
    <li  class="googlePlus">
        <a href="<?php print $googleplus; ?>" title="Find me on Google Plus" target="_blank">
            <i class="social_icon fa fa-google-plus"></i>
        </a>
    </li>
    <?php endif; if($linkedin): ?>
    <li  class="linkedIn">
        <a href="<?php print $linkedin; ?>" title="Find me on LinkedIn" target="_blank">
            <i class="social_icon fa fa-linkedin"></i>
        </a>
    </li>
    <?php endif; ?>
<ul>
</div>