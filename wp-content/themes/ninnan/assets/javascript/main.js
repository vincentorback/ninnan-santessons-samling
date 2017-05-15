/* global Blazy, Macy, Dragend */

(function (window) {
  function init () {
    var doc = window.document
    var viewportWidth = Math.max(doc.documentElement.clientWidth, window.innerWidth || 0)
    var viewportHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0)

    /* Navigaiton */
    var navEl = doc.querySelector('.js-nav')
    var navLinks = navEl.querySelectorAll('a')
    var navToggleButton = doc.querySelector('.js-navToggle')
    var navCloseButton = doc.querySelector('.js-navClose')
    var activeClass = 'is-active'

    function toggleNav (state) {
      state = state || !navEl.classList.contains(activeClass)

      navEl.classList.toggle(activeClass, state)
      navEl.setAttribute('aria-expanded', !state)
    }

    if (navEl) {
      navToggleButton.addEventListener('click', function (e) {
        toggleNav()
      })

      navCloseButton.addEventListener('click', function (e) {
        toggleNav(false)
      })

      Array.from(navLinks, function (navLink) {
        navLink.addEventListener('click', function (e) {
          toggleNav(false)
        })
      })
    }

    /* Lazy images */

    var slideshows = []

    var bLazy = new Blazy({
      offset: viewportHeight,
      selector: '.js-lazy',
      successClass: 'is-loaded',
      errorClass: 'is-error',
      success: function (imageEl) {
        var slideshow = imageEl.getAttribute('data-slideshow')
        if (slideshow) {
          var slideshowEl = document.getElementById(imageEl.getAttribute('data-slideshow'))
          var slides = parseInt(slideshowEl.getAttribute('data-slides'))
          var loaded = parseInt(slideshowEl.getAttribute('data-loaded'))
          slideshowEl.setAttribute('data-loaded', (loaded + 1))

          if (loaded > 0 && (slides === (loaded + 1))) {
            slideshows.push(new Dragend(slideshowEl))
          }
        }
      }
    })

    bLazy.load()

    /* Masonry */
    var macyEl = doc.querySelector('.js-masonry')
    if (macyEl) {
      Macy({
        columns: 3,
        container: macyEl.getAttribute('data-container'),
        trueOrder: false,
        margin: Math.round(viewportWidth * 0.05),
        waitForImages: true,
        breakAt: {
          1000: 2,
          600: 1
        }
      })
    }
  }

  init()
}(this))
