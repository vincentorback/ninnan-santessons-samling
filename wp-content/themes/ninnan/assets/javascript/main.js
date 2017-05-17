/* global Modernizr, MoveTo, Blazy, Waypoint, Dragend  */

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
          targetEl.scrollIntoView()

          window.setTimeout(function () {
            targetEl.scrollIntoView()
          }, 100)

          e.preventDefault()
        })
      })
    },

    navigation: function () {
      var navEl = doc.querySelector('.js-nav')

      function toggleNav (state) {
        navEl.classList.toggle(activeClass, state)
        navEl.setAttribute('aria-expanded', !navEl.classList.contains(activeClass))
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
      var slideshows = {}
      var lazySelector = '.js-lazy'
      var paginationSelector = '.js-slideshowPagination'
      var captionSelector = '.js-slideshowCaption'
      var itemSelector = '.js-slideshowItem'
      var sliderSelector = '.js-slideshowSlider'
      var captionText = ''

      var lazyImages = new Blazy({
        offset: viewportHeight,
        selector: lazySelector,
        successClass: loadedClass,
        errorClass: errorClass,
        success: function (loadedImage) {
          var slideshowId = loadedImage.getAttribute('data-slideshow')

          if (slideshowId) {
            var slideshowEl = document.getElementById(slideshowId)

            if (!slideshowEl) {
              return
            }

            var slides = parseInt(slideshowEl.getAttribute('data-slides'))

            if (!slideshows[slideshowId]) {
              slideshows[slideshowId] = {
                el: slideshowEl,
                sliderEl: slideshowEl.querySelector(sliderSelector),
                slides: slides,
                loaded: 0,
                dragend: null
              }

              if (slides > 1) {
                window.setTimeout(function () {
                  // Force load
                  var notLoaded = Array.from(slideshowEl.querySelectorAll(lazySelector + ':not(.' + loadedClass + ')'))

                  notLoaded = notLoaded.filter(function (notLoadedImage) {
                    if (
                      (notLoadedImage.getAttribute('data-src') !== loadedImage.getAttribute('src')) &&
                      (notLoadedImage.classList.contains(loadedClass) === false)
                    ) {
                      return notLoadedImage
                    }
                  })

                  lazyImages.load(notLoaded, true)
                }, 500)
              }
            }

            slideshows[slideshowId].loaded += 1

            if (
              slideshows[slideshowId].slides > 1 &&
              slideshows[slideshowId].slides === slideshows[slideshowId].loaded
            ) {
              var slideshowNavButtons = slideshowEl.querySelectorAll('.js-slideshowNavItem')
              var slideshowLeftButton = slideshowEl.querySelector('.js-slideshowLeft')
              var slideshowRightButton = slideshowEl.querySelector('.js-slideshowRight')

              slideshows[slideshowId].dragend = new Dragend(slideshows[slideshowId].sliderEl, {
                pageClass: 'js-slideshowItem',
                afterInitialize: function () {
                  slideshowEl.classList.add(activeClass)
                  var slideshow = this

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

                  if (!Modernizr.touchevents && slideshowLeftButton && slideshowRightButton) {
                    slideshowLeftButton.addEventListener('click', function (e) {
                      if (slideshow.page !== 0) {
                        slideshow.scrollToPage(slideshow.page)
                      } else {
                        // Reverse
                        slideshow.scrollToPage(slideshow.page + 2)
                      }

                      e.preventDefault()
                    })

                    slideshowRightButton.addEventListener('click', function (e) {
                      if ((slideshow.page + 1) !== slideshow.pagesCount) {
                        slideshow.scrollToPage(slideshow.page + 2)
                      } else {
                        // Reverse
                        slideshow.scrollToPage(slideshow.page)
                      }

                      e.preventDefault()
                    })
                  }

                  Waypoint.refreshAll()
                },
                onSwipeEnd: function (slider, slide) {
                  var slideshow = this

                  slideshowLeftButton.classList.toggle('is-reversed', slideshow.page === 0)
                  slideshowRightButton.classList.toggle('is-reversed', (slideshow.page + 1) === slideshow.pagesCount)

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
              })
            }

            var paginationEl = slideshowEl.querySelector(paginationSelector)
            if (paginationEl) {
              paginationEl.innerText = '1/' + slideshows[slideshowId].slides
            }

            var captionEl = slideshowEl.querySelector(captionSelector)
            if (captionEl) {
              captionEl.innerText = slideshows[slideshowId].sliderEl.querySelector(itemSelector).getAttribute('data-caption') || ''
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
            var paginationTitle = chapterPagination.getAttribute('data-default')

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