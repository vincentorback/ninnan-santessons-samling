/* global Blazy, Dragend, Waypoint, MoveTo */

(function (window) {
  'use strict'

  var doc = window.document
  var viewportHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0)
  var activeClass = 'is-active'
  var loadedClass = 'is-loaded'
  var errorClass = 'is-error'

  var ninnan = {
    init: function () {
      ninnan.navigation()
      ninnan.images()
      ninnan.scrollButtons()
      ninnan.chapters()
      ninnan.linkJump()

      window.addEventListener('resize', function () {
        viewportHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0)
      })
    },

    linkJump: function () {
      var hashLinks = doc.querySelectorAll('a[href^="#"]:not(.js-scrollButton)')

      Array.from(hashLinks, function (linkEl) {
        linkEl.addEventListener('click', function (e) {
          var targetEl = doc.querySelector(linkEl.href.substring(linkEl.href.indexOf('#')))
          window.setTimeout(function () {
            targetEl.scrollIntoView()
          }, 100)
        })
      })
    },

    navigation: function () {
      var navEl = doc.querySelector('.js-nav')

      function toggleNav (state) {
        state = state || !navEl.classList.contains(activeClass)

        navEl.classList.toggle(activeClass, state)
        navEl.setAttribute('aria-expanded', state)
      }

      if (navEl) {
        var navLinks = navEl.querySelectorAll('a')
        var toggleButtons = doc.querySelectorAll('.js-navToggle')

        Array.from(toggleButtons, function (buttonEl) {
          buttonEl.addEventListener('click', function (e) {
            toggleNav()

            e.preventDefault()
          })
        })

        Array.from(navLinks, function (navLink) {
          navLink.addEventListener('click', function () {
            toggleNav(false)
          })
        })
      }
    },

    images: function () {
      var slideshows = []
      var lazySelector = '.js-lazy'
      var paginationSelector = '.js-slideshowPagination'
      var captionSelector = '.js-slideshowCaption'
      var itemSelector = '.js-slideshowItem'
      var sliderSelector = '.js-slideshowSlider'
      var captionText = ''

      return new Blazy({
        offset: viewportHeight,
        selector: lazySelector,
        successClass: loadedClass,
        errorClass: errorClass,
        success: function (imageEl) {
          var slideshowId = imageEl.getAttribute('data-slideshow')

          if (slideshowId) {
            var slideshowEl = document.getElementById(slideshowId)
            var sliderEl = slideshowEl.querySelector(sliderSelector)
            var slides = parseInt(slideshowEl.getAttribute('data-slides'))
            var loaded = parseInt(slideshowEl.getAttribute('data-loaded'))
            slideshowEl.setAttribute('data-loaded', (loaded + 1))

            var paginationEl = slideshowEl.querySelector(paginationSelector)
            if (paginationEl) {
              paginationEl.innerText = '1/' + slides
            }

            var captionEl = slideshowEl.querySelector(captionSelector)
            if (captionEl) {
              captionEl.innerText = sliderEl.querySelector(itemSelector).getAttribute('data-caption') || ''
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
    },

    scrollButtons: function () {
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
    },

    chapters: function () {
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
  }

  window.addEventListener('load', ninnan.init, false)
}(window))
