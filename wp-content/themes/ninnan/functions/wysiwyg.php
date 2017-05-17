<?php

/**
 * Change default TinyMCE WYSIWYG settings.
 * @link https://codex.wordpress.org/TinyMCE
 *
 * @param $settings Object Array of TinyMCE settings
 */
add_filter('tiny_mce_before_init', function ($settings) {
  $settings['toolbar1'] = 'formatselect,styleselect,bold,italic,blockquote,link,unlink,underline';
  $settings['toolbar2'] = '';

  $settings['block_formats'] = "Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3;";

  $settings['content_css'] = get_template_directory_uri() . '/assets/css/wysiwyg-min.css';

  $settings['style_formats'] = json_encode(array(
    array(
      'title' => 'Ta bort indrag',
      'block' => 'p',
      'classes' => 'u-noIndent',
      'wrapper' => false
    )
  ));

  return $settings;
});
