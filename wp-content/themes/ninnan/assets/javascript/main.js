/* global Modernizr, MoveTo, Blazy, Waypoint, Dragend  */

(function (window) {
  'use strict'

  var doc = window.document
  var activeClass = 'is-active'
  var loadedClass = 'is-loaded'
  var errorClass = 'is-error'

  var Ninnan = {
    init: function () {
      Ninnan.navigation()
      Ninnan.lazyImages()
      Ninnan.scrollButtons()
      Ninnan.chapters()
      Ninnan.linkJump()
      Ninnan.scrollToUrl()
    },

    scrollToUrl: function () {
      var pathname = window.location.pathname.replace(/\//g, '')
      pathname = pathname.replace('wp', '')
      var sectionEl = doc.getElementById(pathname)

      if (sectionEl) {
        window.setTimeout(function () {
          sectionEl.scrollIntoView()
        })
      }
    },

    linkJump: function () {
      var hashLinks = doc.querySelectorAll('a[href^="#"]:not(.js-scrollButton)')

      Array.from(hashLinks, function (linkEl) {
        linkEl.addEventListener('click', function (e) {
          if (e.metaKey || e.ctrlKey) {
            return
          }

          var href = linkEl.getAttribute('href')
          var targetEl = doc.querySelector(href.substring(href.indexOf('#')))

          if (targetEl) {
            targetEl.scrollIntoView()

            window.setTimeout(function () {
              targetEl.scrollIntoView()
            }, 200)
          }
        })
      })
    },

    navigation: function () {
      var navEl = doc.querySelector('.js-nav')

      function toggleNav () {
        navEl.classList.toggle(activeClass)
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
          navLink.addEventListener('click', function (e) {
            if (e.metaKey || e.ctrlKey) {
              return
            }

            toggleNav()
          })
        })
      }
    },

    lazyImages: function () {
      var slideshows = {}
      var lazySelector = '.js-lazy'
      var paginationSelector = '.js-slideshowPagination'
      var captionSelector = '.js-slideshowCaption'
      var itemSelector = '.js-slideshowItem'
      var sliderSelector = '.js-slideshowSlider'
      var navItemSelector = '.js-slideshowNavItem'
      var leftButtonSelector = '.js-slideshowLeft'
      var rightButtonSelector = '.js-slideshowRight'

      var captionText = ''
      var reversedClass = 'is-reversed'
      var viewportHeight = Math.max(doc.documentElement.clientHeight, window.innerHeight || 0)

      var lazyImages = new Blazy({
        offset: viewportHeight,
        selector: lazySelector,
        successClass: loadedClass,
        errorClass: errorClass,
        loadInvisible: true,
        success: function (loadedImage) {
          var slideshowId = loadedImage.getAttribute('data-slideshow')

          if (slideshowId) {
            var slideshowEl = doc.getElementById(slideshowId)

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

              slideshows[slideshowId].notLoadedInterval = window.setInterval(function () {
                if (slideshows[slideshowId].loaded >= slideshows[slideshowId].slides) {
                  window.clearInterval(slideshows[slideshowId].notLoadedInterval)
                } else {
                  loadNotLoaded(slideshowEl)
                }
              }, 1000)
            }

            slideshows[slideshowId].loaded += 1

            if (slideshows[slideshowId].loaded >= slideshows[slideshowId].slides) {
              loadSlideshow(slideshows[slideshowId])
            }
          }

          Waypoint.refreshAll()
        }
      })

      function loadSlideshow (slideshow) {
        if (
          slideshow.slides > 1 &&
          slideshow.slides === slideshow.loaded
        ) {
          var slideshowNavButtons = slideshow.el.querySelectorAll(navItemSelector)
          var slideshowLeftButton = slideshow.el.querySelector(leftButtonSelector)
          var slideshowRightButton = slideshow.el.querySelector(rightButtonSelector)

          slideshow.dragend = new Dragend(slideshow.sliderEl, {
            pageClass: 'js-slideshowItem',
            afterInitialize: function () {
              slideshow.el.classList.add(activeClass)

              var dragend = this

              if (!Modernizr.touchevents && slideshowNavButtons) {
                if (slideshowNavButtons[dragend.page]) {
                  slideshowNavButtons[dragend.page].classList.add(activeClass)
                }

                Array.from(slideshowNavButtons, function (buttonEl) {
                  buttonEl.addEventListener('click', function (e) {
                    dragend.scrollToPage(parseInt(buttonEl.getAttribute('data-index')))

                    buttonEl.classList.add(activeClass)

                    e.preventDefault()
                  })
                })
              }

              if (!Modernizr.touchevents && slideshowLeftButton && slideshowRightButton) {
                slideshowLeftButton.addEventListener('click', function (e) {
                  if (dragend.page !== 0) {
                    dragend.scrollToPage(dragend.page)
                  } else {
                    // Reverse
                    dragend.scrollToPage(dragend.page + 2)
                  }

                  e.preventDefault()
                })

                slideshowRightButton.addEventListener('click', function (e) {
                  if ((dragend.page + 1) !== dragend.pagesCount) {
                    dragend.scrollToPage(dragend.page + 2)
                  } else {
                    // Reverse
                    dragend.scrollToPage(dragend.page)
                  }

                  e.preventDefault()
                })
              }

              Waypoint.refreshAll()
            },
            onSwipeEnd: function (sliderEl, slideEl) {
              var dragend = this

              slideshowLeftButton.classList.toggle(reversedClass, dragend.page === 0)
              slideshowRightButton.classList.toggle(reversedClass, (dragend.page + 1) === dragend.pagesCount)

              if (paginationEl) {
                paginationEl.innerText = (dragend.page + 1) + '/' + dragend.pagesCount
              }

              captionText = slideEl.getAttribute('data-caption') || ''

              if (captionEl) {
                captionEl.innerText = captionText
              }

              if (slideshowNavButtons) {
                slideshowNavButtons = Array.from(slideshowNavButtons)

                slideshowNavButtons.forEach(function (buttonEl) {
                  buttonEl.classList.remove(activeClass)
                })

                if (slideshowNavButtons[dragend.page]) {
                  slideshowNavButtons[dragend.page].classList.add(activeClass)
                }
              }
            }
          })
        }

        var paginationEl = slideshow.el.querySelector(paginationSelector)

        if (paginationEl) {
          paginationEl.innerText = '1/' + slideshow.slides
        }

        var captionEl = slideshow.el.querySelector(captionSelector)

        if (captionEl) {
          captionEl.innerText = slideshow.sliderEl.querySelector(itemSelector).getAttribute('data-caption') || ''
        }
      }

      function loadNotLoaded (slideshowEl) {
        var notLoaded = Array.from(slideshowEl.querySelectorAll(lazySelector + ':not(.' + loadedClass + ')'))

        notLoaded = notLoaded.filter(function (notLoadedImage) {
          if (notLoadedImage.classList.contains(loadedClass) === false) {
            return notLoadedImage
          }
        })

        lazyImages.load(notLoaded, true)
      }

      window.addEventListener('resize', function () {
        viewportHeight = Math.max(doc.documentElement.clientHeight, window.innerHeight || 0)
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
      var paginationEl = doc.querySelector('.js-chapterPagination')
      var defaultTitle = paginationEl.getAttribute('data-default')

      Array.from(chapterSections, function (sectionEl) {
        return new Waypoint({
          element: sectionEl,
          handler: function (direction) {
            var paginationTitle = defaultTitle

            if (direction === 'down') {
              paginationTitle = this.element.getAttribute('data-pagination')
            } else {
              var previousWaypoint = this.previous()

              if (previousWaypoint) {
                paginationTitle = previousWaypoint.element.getAttribute('data-pagination')
              }
            }

            paginationEl.innerText = paginationTitle
          }
        })
      })
    }
  }

  window.addEventListener('load', Ninnan.init, false)
}(window))
