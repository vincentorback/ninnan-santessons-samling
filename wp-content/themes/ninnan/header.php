<!doctype html>
<?php $theme_url = get_template_directory_uri(); ?>
<html class="Site no-js" lang="sv">
<head prefix="og: http://ogp.me/ns#">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Ninnan Santessons Samling</title>

  <link href="<?php echo $theme_url; ?>/assets/css/style-min.css" rel="stylesheet">
  <?php wp_head(); ?>

  <script>
  if (!(window.doNotTrack === '1' || window.doNotTrack === 'yes' || navigator.doNotTrack === 'yes' || navigator.doNotTrack === '1' || navigator.msDoNotTrack === '1')) {
    // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    // })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    // ga('create', 'UA-XXXXXX-1', 'auto');
    // ga('send', 'pageview');
  }
  </script>
</head>

<body <?php body_class('Site-body'); ?>>

  <?php if (!is_user_logged_in() && !is_404()) { ?>
    <div class="Soon">
      <p>Coming soon...</p>
    </div>
  <?php } else if (!is_404()) { ?>

  <header class="Section Section--intro Section--gray" role="banner">
    <div class="Site-container">
      <div class="Intro">
        <h1 class="Intro-title">Ninnan Santesson</h1>
        <p class="Intro-date">1891-1969</p>
      </div>
    </div>
    <a class="Section-scrollDown js-scrollButton" href="#forord" data-target="forord">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20">
        <path fill="currentColor" d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
      	c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
      	L17.418,6.109z"></path>
      </svg>
    </a>
  </header>

  <nav class="Navigation js-nav" id="navigation" aria-expanded="false" role="navigation">
    <ul class="Navigation-list">
      <li class="Navigation-item">
        <a class="Navigation-link" href="#index">
          <span class="Navigation-linkInner">Index</span>
        </a>
      </li>
      <li class="Navigation-item">
        <a class="Navigation-link" href="#about">
          <span class="Navigation-linkInner">Om projektet</span>
        </a>
      </li>
      <?php
      $about_page = get_page_by_title('Om projektet');
      if ($about_page) {
        $presskit = get_field('presskit', $about_page->ID)
      ?>
      <li class="Navigation-item">
        <a class="Navigation-link" href="<?php echo $presskit; ?>" download>
          <span class="Navigation-linkInner">Presskit</span>
        </a>
      </li>
      <?php } ?>
    </ul>

    <button class="Navigation-close js-navToggle" type="button" aria-controls="navigation">
      <span class="Navigation-closeText">&#10005;</span>
    </button>

    <button class="Navigation-open js-navToggle" type="button" aria-controls="navigation">
      <span class="Navigation-openText">Meny</span>
    </button>
  </nav>

  <?php } ?>
