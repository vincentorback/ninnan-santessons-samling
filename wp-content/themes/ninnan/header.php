<!doctype html>
<?php $theme_url = get_template_directory_uri(); ?>
<!--[if lte IE 9]><html class="Site no-js lte-ie9" lang="sv"><![endif]-->
<!--[if gt IE 9]><!--><html class="Site no-js" lang="sv"><!--<![endif]-->
<head prefix="og: http://ogp.me/ns#">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Ninnan Santessons Samling</title>

  <link href="<?php echo $theme_url; ?>/assets/css/style-min.css" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class('Site-body'); ?>>

  <?php if (!is_user_logged_in()) { ?>
    <div class="Soon">
      <p>Coming soon...</p>
    </div>
  <?php } else { ?>

  <nav class="Navigation js-nav" id="navigaiton" aria-expanded="false">
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
      <li class="Navigation-item">
        <a class="Navigation-link" href="mailto:linnea.carlson@beckmans.se" target="_blank">
          <span class="Navigation-linkInner">Kontakt</span>
        </a>
      </li>
      <li class="Navigation-item">
        <a class="Navigation-link" href="#/" onClick="alert('vad ska det va här?')">
          <span class="Navigation-linkInner">Presskit</span>
        </a>
      </li>
    </ul>

    <button class="Navigation-close js-navClose" type="button" aria-controlls="navigation">
      &#10005;
    </button>

    <button class="Navigation-open js-navToggle" type="button" aria-controlls="navigation">
      <span class="Navigation-openText">Meny</span>
    </button>
  </nav>

  <header class="Section Section--intro Section--gray">
    <div class="Site-container">
      <div class="Intro">
        <h1 class="Intro-title">Ninnan Santesson</h1>
        <p class="Intro-date">1891-1969</p>
      </div>
    </div>
    <a class="Section-scrollDown js-scrollButton" href="#forord" data-target="forord">&darr;</a>
  </header>

  <?php } ?>
