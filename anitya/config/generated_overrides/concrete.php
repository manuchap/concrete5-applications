<?php

/**
 * -----------------------------------------------------------------------------
 * Generated 2015-10-15T15:31:50+02:00
 *
 * DO NOT EDIT THIS FILE DIRECTLY
 *
 * @item      misc.do_page_reindex_check
 * @group     concrete
 * @namespace null
 * -----------------------------------------------------------------------------
 */
return array(
    'version_installed' => '5.7.5.2',
    'cache' => array(
        'blocks' => false,
        'assets' => false,
        'theme_css' => false,
        'overrides' => false,
        'pages' => '0',
        'full_page_lifetime' => 'default',
        'full_page_lifetime_value' => null,
    ),
    'theme' => array(
        'compress_preprocessor_output' => false,
        'generate_less_sourcemap' => false,
    ),
    'misc' => array(
        'seen_introduction' => true,
        'do_page_reindex_check' => false,
        'latest_version' => '5.7.5.1',
        'default_anitya_preset_id' => 1,
    ),
    'seo' => array(
        'url_rewriting' => 1,
        'tracking' => array(
            'code' => '<script>
  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

  ga(\'create\', \'UA-17070622-7\', \'auto\');
  ga(\'send\', \'pageview\');

</script>',
            'code_position' => 'bottom',
        ),
    ),
    'debug' => array(
        'detail' => 'debug',
        'display_errors' => true,
    ),
    'editor' => array(
        'concrete' => array(
            'enable_filemanager' => '1',
            'enable_sitemap' => '1',
        ),
        'plugins' => array(
            'selected' => array(
                'undoredo',
                'concrete5lightbox',
                'specialcharacters',
                'table',
                'themefontcolor',
                'themeclips',
            ),
        ),
    ),
);
