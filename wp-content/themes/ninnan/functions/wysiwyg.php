<?php

/**
 * Change default TinyMCE WYSIWYG settings.
 * @link https://codex.wordpress.org/TinyMCE
 *
 * @param $settings Object Array of TinyMCE settings
 */
add_filter('tiny_mce_before_init', function ($settings) {
  $toolbarButtons = array('formatselect','styleselect','bold','italic','blockquote','link','unlink','underline');

  $settings['toolbar1'] = implode($toolbarButtons, ',');
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


/* ACF */
add_filter('acf/fields/wysiwyg/toolbars', function ($toolbars) {
  $toolbarButtons = array('formatselect','styleselect','bold','italic','blockquote','link','unlink','underline');

  $toolbars['Full'][1] = $toolbarButtons;
  $toolbars['Full'][2] = array();

	return $toolbars;
});
