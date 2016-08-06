/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {

        // Headroom
        $("#menu-container").headroom({
          "offset": 205,
          "tolerance": 5,
          "classes": {
            "initial": "headroom",
            "pinned": "header--visible",
            "unpinned": "header--hidden"
          }
        });
        // End Headroom

        // Mobile Menu
        (function(window) {

          'use strict';

          var support = { transitions: Modernizr.csstransitions },
          // transition end event name
          transEndEventNames = { 'WebkitTransition': 'webkitTransitionEnd', 'MozTransition': 'transitionend', 'OTransition': 'oTransitionEnd', 'msTransition': 'MSTransitionEnd', 'transition': 'transitionend' },
          transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
          onEndTransition = function( el, callback ) {
            var onEndCallbackFn = function( ev ) {
              if( support.transitions ) {
                if( ev.target !== this ) {return;}
                this.removeEventListener( transEndEventName, onEndCallbackFn );
              }
              if( callback && typeof callback === 'function' ) { callback.call(this); }
            };
            if( support.transitions ) {
              el[0].addEventListener( transEndEventName, onEndCallbackFn );
            }
            else {
              onEndCallbackFn();
            }
          },
          wrapper = $('.wrap'),
          page = $('.content'),
          menuButton = $('.menu-button'),
          nav = $('.menu-container'),
          header = $('.header'),
          body = $('body'),
          isMenuOpen = false,
          scrollPosition = 0;

          function openMenu() {
            scrollPosition = $(document).scrollTop();
            menuButton.addClass('menu-button--open');
            body.addClass('menu--open');
            nav.addClass('menu-container--open');
            wrapper.addClass('wrap--open');
            // allow changes to render:
            // http://stackoverflow.com/questions/15875128/how-to-tell-when-a-dynamically-created-element-has-rendered
            setTimeout(function(){
              page.addClass('content--transition');
            }, 0);
          }

          function openPage() {
            menuButton.removeClass('menu-button--open');
            page.removeClass('content--transition');
            nav.removeClass('menu-container--open');
            onEndTransition(page, function() {
              // wait till transistion has finished...
              body.removeClass('menu--open');
              wrapper.removeClass('wrap--open');
              isMenuOpen = false;
              if (scrollPosition > 0) {
                $('html, body').scrollTop(scrollPosition);
              }
            });
          }

          function closeMenu() {
            // same as opening the page again
            openPage();
          }

          function toggleMenu() {
            if( isMenuOpen ) {
              closeMenu();
            }
            else {
              openMenu();
              isMenuOpen = true;
            }
          }

          function initEvents() {
            menuButton[0].addEventListener('click', toggleMenu);
            page[0].addEventListener('click', function(ev) {
              if(isMenuOpen) {
                ev.preventDefault();
                openPage();
              }
            });
          }

          initEvents();

        })(window);
        // End Mobile Menu

        // Page Header Images Loaded
        $('#page-header').imagesLoaded( function() {
          $('#page-header').addClass('images-loaded');
        });
        // End Page Header Images Loaded

        // Social Sharing Buttons
        $('.social-share a').on('click', function(e) {
          e.preventDefault();
          var link = jQuery(this).attr('href');
          var width = 840;
          var height = 464;
          var popupName = 'popup_' + width + 'x' + height;
          var left = (screen.width-width) / 2;
          var top = 100;
          var params = 'width=' + width + ',height=' + height + ',location=no,menubar=no,scrollbars=yes,status=no,toolbar=no,left=' + left + ',top=' + top;
          window[popupName] = window.open(link, popupName, params);
          if (window.focus) {
            window[popupName].focus();
          }
          return true;
        });
        // End Social Sharing Buttons

        // Generic Input States
        var inputs = $('input, textarea');
        console.log(inputs);
        function checkInputHasVal(input) {
          if(input.val()){
            input.addClass('has-value');
          } else {
            input.removeClass('has-value');
          }
        }

        inputs.keyup(function(){
          checkInputHasVal($(this));
        });

        inputs.focusout(function(){
          $(this).addClass('touched');
        });

      }
    },

    // Single Work
    'single_work': {
      init: function() {
        $('.alignright, .alignleft').viewportChecker({});
      }
    },

    // Single Work
    'post_type_archive_work': {
      init: function() {
        $('.featured-iframe-wrap, .wp-post-image').viewportChecker({});
      }
    },

    // Contact page
    'contact': {
      init: function() {

        var contact_form = $('#contact-form');
        var inputs = $('#contact-form input, #contact-form textarea');
        var submit_btn = $('#contact-submit');
        var form_overlay = $('#form-overlay');
        var overlay_icon = $('#overlay-icon');
        var overlay_message = $('#overlay-message');

        var state_valid = 'state-valid';
        var state_invalid = 'state-invalid';
        var state_loading = 'state-loading';
        var state_error = 'state-error';
        var state_success = 'state-success';
        var state_disabled = 'state-disabled';

        function checkFormValid() {
          var inputs_count = inputs.length;
          var valid_inputs_count = $('#contact-form input:valid, #contact-form textarea:valid').length + 1;
          var invalid_touched_inputs_count = $('#contact-form .touched:invalid, #contact-form .touched:invalid').length;
          if (valid_inputs_count === inputs_count) {
            contact_form.addClass(state_valid);
          } else {
            contact_form.removeClass(state_valid);
          }
          if (invalid_touched_inputs_count > 0) {
            contact_form.addClass(state_invalid);
          } else {
            contact_form.removeClass(state_invalid);
          }
        }

        inputs.keyup(function(){
          checkFormValid();
        });

        inputs.focusout(function(){
          checkFormValid();
        });

        function loading() {
          contact_form.removeClass(state_valid);
          contact_form.addClass(state_loading);
        }

        function response(data, state) {
          $('#loading, #overlay-message').fadeOut('slow', function() {
            contact_form.removeClass(state_loading);
            contact_form.addClass(state);
            overlay_icon.empty();
            overlay_message.text(data.message);
            overlay_icon.append(data.icon);
            overlay_message.fadeIn();
            if (state === state_success) {
              inputs.fadeOut('slow', function() {
                contact_form.addClass(state_disabled);
                inputs.prop('disabled', true);
                submit_btn.prop('disabled', true);
              });
            }
          });
        }

        contact_form.on('submit',function(e) {
          e.preventDefault();
          loading();
          $.ajax({
            type     : 'POST',
            cache    : false,
            url      : window.Sage.adminPostUrl,
            data     : $(this).serialize(),
            success  : function(data) {
              data = JSON.parse(data);
              if(data.status === 'success') {
                response(data, state_success);
              } else {
                // TODO Better error handling
                response(data, state_error);
                console.error(data.mailgun.message);
              }
            },
            error  : function(data) {
              // TODO Better AJAX error handling
              $('#loading, #overlay-message').fadeOut('slow', function() {
                contact_form.removeClass(state_loading);
                contact_form.addClass(state_error);
                overlay_message.text("Sorry, something went wrong...");
                overlay_message.fadeIn();
              });
              console.error('AJAX Error...');
            }
          });

          return false;

        });

      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
