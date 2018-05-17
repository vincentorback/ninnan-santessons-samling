<!doctype html>
<html class="Site no-js" lang="sv">
<head prefix="og: http://ogp.me/ns#">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ninnan Santessons Samling</title>
  <meta name="description" content="Ninnan Santessons är min gammelmormor, min pappas mormor, och under min uppväxt har jag fått fragmentariska glimtar av hennes liv. Det här projektet är mitt försök att lära känna henne — och hennes tid — lite bättre.">
  <?php $theme_url = get_template_directory_uri(); ?>
  <link href="<?php echo $theme_url ?>/assets/css/style-min.css" rel="stylesheet">
  <?php wp_head(); ?>
  <meta property="og:title" content="Ninnan Santessons Samling">
  <meta property="og:description" content="Ninnan Santessons är min gammelmormor, min pappas mormor, och under min uppväxt har jag fått fragmentariska glimtar av hennes liv. Det här projektet är mitt försök att lära känna henne — och hennes tid — lite bättre.">
  <meta property="og:url" content="http://ninnan-santessons-samling.se">
  <meta property="og:site_name" content="Ninnan Santessons Ninnan Santesson">
  <meta property="og:locale" content="sv_SE">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?php echo $theme_url; ?>/assets/images/share.jpg">
  <meta name="theme-color" content="#111">
</head>

<body class="Site-body">

  <header class="Section Section--intro Section--gray" role="banner">
    <div class="Site-container">
      <div class="Intro">
        <h1 class="Intro-title">Ninnan Santesson</h1>
        <p class="Intro-date">1891-1969</p>
      </div>
    </div>
    <a class="Section-scrollDown js-scrollButton" href="#forord" data-target="forord">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20">
        <path fill="currentColor" d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25 L17.418,6.109z"></path>
      </svg>
    </a>
  </header>

  <?php
  $about_page = getCustomPage('Om projektet');
  if ($about_page) {
    $presskit = get_field('presskit', $about_page->ID);
  }
  ?>

  <nav class="Navigation js-nav" id="navigation" aria-expanded="false" role="navigation">
    <ul class="Navigation-list">
      <li class="Navigation-item">
        <a class="Navigation-link" href="#index">
          <span class="Navigation-linkInner">Index</span>
        </a>
      </li>
      <?php if ($about_page) { ?>
      <li class="Navigation-item">
        <a class="Navigation-link" href="#<?php echo $about_page->post_name; ?>">
          <span class="Navigation-linkInner"><?php echo $about_page->post_title; ?></span>
        </a>
      </li>
      <?php } ?>
      <?php if ($presskit) { ?>
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
