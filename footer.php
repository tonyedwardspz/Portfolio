            </div>
        </div>
    </div>

    <footer>
        <div class="container">

            <div id="footer-text">Made with love and coffee by
                <div itemscope itemtype="http://data-vocabulary.org/Person">
                    <a href="<?php echo home_url(); ?>" title="Plymouth Web Developer" itemprop="url">
                        <span itemprop="name">Tony Edwards</span></a>
                </div>
            </div>

            <?php include 'social-icons.php'; ?>

        </div>
    </footer>

    <?php
    wp_footer();

    //insert the analytics code if set via the admin interface
    $analyticsCode = get_option('portfolio_analytics');
    if ($analyticsCode) {
        print $analyticsCode;
    }
    ?>

    <script type="application/ld+json">
    { "@context" : "http://schema.org",
      "@type" : "Person",
      "name" : "Tony Edwards",
      "url" : "http://www.purelywebdesign.co.uk",
      "jobTitle" : "Software Developer",
      "worksFor" : "Plymouth Software",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Plymouth",
        "addressRegion": "Devon"
      },
      "colleague": [
        "http://blog.chrisblunt.com/"
      ],
      "sameAs" : [
        "http://uk.linkedin.com/in/tonyedwardspz",
        "https://plus.google.com/109731755368109204853",
        "https://github.com/tonyedwardspz",
        "https://twitter.com/tonyedwardspz"]
    }
    </script>

</body>
</html>
