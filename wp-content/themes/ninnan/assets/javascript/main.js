/* global Blazy, Dragend, Waypoint, MoveTo */

(function (window) {
  function init () {
    var doc = window.document
    var viewportHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0)
    var activeClass = 'is-active'
    var loadedClass = 'is-loaded'

    /* Navigaiton */
    var navEl = doc.querySelector('.js-nav')

    function toggleNav (state) {
      state = state || !navEl.classList.contains(activeClass)

      navEl.classList.toggle(activeClass, state)
      navEl.setAttribute('aria-expanded', !state)
    }

    if (navEl) {
      var navLinks = navEl.querySelectorAll('a')
      var navToggleButton = doc.querySelector('.js-navToggle')
      var navCloseButton = doc.querySelector('.js-navClose')

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

    /* Lazy images + Slideshows */
    var slideshows = []
    var slideshowPaginationSelector = '.js-slideshowPagination'
    var slideshowCaptionSelector = '.js-slideshowCaption'
    var captionText = ''

    var bLazy = new Blazy({
      offset: viewportHeight,
      selector: '.js-lazy',
      successClass: loadedClass,
      errorClass: 'is-error',
      success: function (imageEl) {
        var slideshow = imageEl.getAttribute('data-slideshow')

        if (slideshow) {
          var slideshowEl = document.getElementById(imageEl.getAttribute('data-slideshow'))
          var sliderEl = slideshowEl.querySelector('.js-slideshowSlider')
          var slides = parseInt(slideshowEl.getAttribute('data-slides'))
          var loaded = parseInt(slideshowEl.getAttribute('data-loaded'))
          var captionEl = slideshowEl.querySelector(slideshowCaptionSelector)
          slideshowEl.setAttribute('data-loaded', (loaded + 1))

          var paginationEl = slideshowEl.querySelector(slideshowPaginationSelector)
          if (paginationEl) {
            paginationEl.innerText = '1/' + slides
          }

          if (captionEl) {
            captionEl.innerText = sliderEl.querySelector('.js-slideshowItem').getAttribute('data-caption') || ''
          }

          var slideshowNavButtons = slideshowEl.querySelectorAll('.js-slideshowNavItem')

          if (loaded > 0 && (slides === (loaded + 1))) {
            slideshows.push(new Dragend(sliderEl, {
              pageClass: 'js-slideshowItem',
              afterInitialize: function () {
                slideshowEl.classList.add(activeClass)
                var slideshow = this

                // TODO: Set up arrow keys clicks

                if (slideshowNavButtons) {
                  if (slideshowNavButtons[slideshow.page]) {
                    slideshowNavButtons[slideshow.page].classList.add(activeClass)
                  }

                  Array.from(slideshowNavButtons, function (buttonEl) {
                    buttonEl.addEventListener('click', function (e) {
                      slideshow.scrollToPage(parseInt(buttonEl.getAttribute('data-index')))
                      buttonEl.classList.add(activeClass)
                      e.preventDefault()
                    })
                  })
                }

                Waypoint.refreshAll()
              },
              onSwipeEnd: function (slider, slide) {
                var slideshow = this

                if (paginationEl) {
                  paginationEl.innerText = (slideshow.page + 1) + '/' + slideshow.pagesCount
                }

                captionText = slide.getAttribute('data-caption') || ''

                if (captionEl) {
                  captionEl.innerText = captionText
                }

                if (slideshowNavButtons) {
                  slideshowNavButtons = Array.from(slideshowNavButtons)

                  slideshowNavButtons.forEach(function (buttonEl) {
                    buttonEl.classList.remove(activeClass)
                  })

                  if (slideshowNavButtons[slideshow.page]) {
                    slideshowNavButtons[slideshow.page].classList.add(activeClass)
                  }
                }
              }
            }))
          }
        }

        Waypoint.refreshAll()
      }
    })

    /* scrollButtons */
    var scrollButtons = doc.querySelectorAll('.js-scrollButton')
    var moveTo = new MoveTo({
      duration: 800
    })

    Array.from(scrollButtons, function (buttonEl) {
      buttonEl.addEventListener('click', function (e) {
        var targetEl = doc.getElementById(buttonEl.getAttribute('data-target'))
        if (targetEl) {
          moveTo.move(targetEl)
        }
        e.preventDefault()
      })
    })

    /* Chapters */
    var chapterSections = doc.querySelectorAll('.js-chapterSection')
    var chapterPagination = doc.querySelector('.js-chapterPagination')

    Array.from(chapterSections, function (chapterSection) {
      return new Waypoint({
        element: chapterSection,
        handler: function (direction) {
          var paginationTitle = ''

          if (direction === 'down') {
            paginationTitle = this.element.getAttribute('data-pagination')
          } else {
            var previousWaypoint = this.previous()
            if (previousWaypoint) {
              paginationTitle = previousWaypoint.element.getAttribute('data-pagination')
            }
          }

          chapterPagination.innerText = paginationTitle
        }
      })
    })
  }

  init()
}(this))
