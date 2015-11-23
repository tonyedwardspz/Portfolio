<div class="FAageSocialIcons">
<?php
// get the social links entered via the theme options page
$googleplus = get_option('portfolio_googleplus');
$twitter = get_option('portfolio_twitter');
$linkedin = get_option('portfolio_linkedin');
$github = get_option('portfolio_github');
?>
<ul>
    <?php if($twitter): ?>
    <li class="twitter">
        <a href="<?php print $twitter; ?>" title="Find me on Twitter" target="_blank" class="social-icon social-twitter"></a>
    </li>
    <?php endif; if($github): ?>
    <li  class="github">
        <a href="<?php print $github; ?>" title="Find me on Github" target="_blank" class="social-icon social-github"></a>
    </li>
    <?php endif; if($googleplus): ?>
    <li  class="googlePlus">
        <a href="<?php print $googleplus; ?>" title="Find me on Google Plus" target="_blank" class="social-icon social-google"></a>
    </li>
    <?php endif; if($linkedin): ?>
    <li  class="linkedIn">
        <a href="<?php print $linkedin; ?>" title="Find me on LinkedIn" target="_blank" class="social-icon social-linkedin"></a>
    </li>
    <?php endif; ?>
</ul>
</div>
