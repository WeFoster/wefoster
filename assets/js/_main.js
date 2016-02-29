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
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */
(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var wefoster = {
    // All pages
    common: {
      init: function() {

        $('.bp-suggestions').autogrow();

        $('[data-toggle="tooltip"]').tooltip();

        //Hide Unstyled Flash
        $('#quick-menu-wrap').removeClass('js-flash');
        $('#dropdown-filter').removeClass('js-flash');
        $('#whats-new-js-wrap').removeClass('js-flash');
        $('#whats-new-options').removeClass('js-flash');

        if ($("html").hasClass('touch')) {
          FastClick.attach(document.body);
        }

        //Hide header on down scroll
        $(".navbar-headroom").headroom({
          "tolerance": 5,
          "offset": 50
        });

        //See if a user has a filter enabled
        $('#activity-filter-by,#activity-filter-select').on('change', function() {
          if (this.value === '-1' || this.value === 0) {
            // Everything is selected
            $("#activity-filter-notice").removeClass('visible').hide();
          } else {
            // Filter is on
            $("#activity-filter-notice").addClass('visible');
            var text = $("#activity-filter-by option[value='" + $(this).val() + "']").html();
            $("#activity-filter-notice span").html(text);
          }
        }).trigger('change');

        // Reset value on click

        $('#reset').click(function() {
          $('#activity-filter-by').val('-1').trigger('change');
        });

        //Bootstrap tooltips
        jQuery(".wefoster-bootstrap-tooltips .navbar-nav > li > a, .wefoster-bootstrap-tooltips .navbar-brand").tooltip({
          container: "body",
          placement: "bottom",
          delay: {
            show: 300,
            hide: 100
          },
        });

        jQuery(".wefoster-bootstrap-tooltips.wefoster-sidebar-left #vertical-activity-tabs li a,.wefoster-bootstrap-tooltips .dropdown a").tooltip({
          container: "body",
          placement: "right",
          delay: {
            show: 300,
            hide: 100
          },
        });

        jQuery(".wefoster-bootstrap-tooltips.wefoster-sidebar-right #vertical-activity-tabs li a,.wefoster-bootstrap-tooltips .dropdown a").tooltip({
          container: "body",
          placement: "left",
          delay: {
            show: 300,
            hide: 100
          },
        });

        // Add Button Bootstrap Styles
        jQuery('.widget_bps_widget submit,.bbp-submit-wrapper button,.join-group').addClass('btn btn-success');
        jQuery('.create-blog .main submit').addClass('btn btn-lg btn-success');

        //Add Bootstrap Class to Registration Form.
        jQuery('.buddypress.registration .register-section').addClass('col-sm-6');
        jQuery('.buddypress.registration .profile-details-section').addClass('col-sm-6');

        //Add inverse dropdown class if navbar-inverse is used
        jQuery('.navbar-inverse .dropdown-menu').addClass('inverse-dropdown');

        // Add Form Styling
        jQuery('textarea').addClass('form-control');
        jQuery('.text-input input[type=text]').addClass('form-control');
        jQuery('.dropdown-input select').addClass('selectpicker');
        jQuery('input[type=text],input[type=password],textarea#comment').addClass('form-control');
        jQuery('#whats-new-textarea #whats-new, #invite-anyone-by-email input[type=text]').addClass('form-control');

        //Add Table Styling
        jQuery('table').addClass('table table-striped');

        //Turn Selectbox into pretty dropdown
        jQuery("wefoster-bootstrap-select.directory.activity #activity-filter-select select,.wefoster-bootstrap-select .last select, #profile-quick-menu select").selectpicker({
          style: 'btn-hg btn-default',
          menuStyle: 'dropdown',
          container: 'body'
        });


        jQuery(".wefoster-bootstrap-select #whats-new-post-in,.wefoster-bootstrap-select .filter select,.field-visibility select, .wefoster-bootstrap-select .messages-options-nav select,.bbp-form select").selectpicker({
          style: 'btn-hg btn-default',
          menuStyle: 'dropdown',
          container: 'body'
        });

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
          $('.directory.activity #activity-filter-select select,#whats-new-post-in, .filter select').selectpicker('mobile');
        }

        //Activity Fade
        jQuery('#whats-new').focusin(function() {
          jQuery('#aw-whats-new-submit').fadeIn();

        });

        //Responsive Embeds
        function setup_videos() {
          // For embed YouTube videos
          $('iframe:not(.embed-responsive-item)[src*="youtube.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
          $('iframe:not(.embed-responsive-item)[src*="youtube.com"]').addClass('embed-responsive-item');

          // For embed Vimeo videos
          $('iframe:not(.embed-responsive-item)[src*="vimeo.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
          $('iframe:not(.embed-responsive-item)[src*="vimeo.com"]').addClass('embed-responsive-item');

          // For SlideShare slides
          $('iframe:not(.embed-responsive-item)[src*="slideshare.net"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
          $('iframe:not(.embed-responsive-item)[src*="slideshare.net"]').addClass('embed-responsive-item');
        }
        setup_videos();

        //Add them to BuddyPress Stream
        $(document).ajaxSuccess(function(response) {

          setup_videos();
          setTimeout(setup_videos, 205);

        });

        //BuddyPress Cover Photo Dynamic Updating.
        if ('undefined' !== typeof window.bp) {
          if (window.bp.Avatar) {
            bp.Avatar.Attachment.on('change:url', function(data) {
              console.log(data.attributes);
            });
          }
          if (window.bp.CoverImage) {
            bp.CoverImage.Attachment.on('change:url', function(data) {
              console.log(data.attributes);
            });
          }
        }

      }
    },
    // Home page
    wefosterismobile: {
      init: function() {

        //Hide Unstyled Flash
        $('#mobile-primary-navigation').removeClass('js-flash');
        $('#buddypress-mobile-user-navigation').removeClass('js-flash');
        $('#buddypress-mobile-sidebar').removeClass('js-flash');

        //Our Navigation Menus
        $('#mobile-primary-navigation-menu-trigger').sidr({
          name: 'mobile-primary-navigation',
          side: 'right',
          timing: 'ease-in-out',
          speed: 300
        });

        $('#close-mobile-primary-navigation').click(function() {
          $.sidr('close', 'mobile-primary-navigation');
        });

        //Our BuddyPress Mobile Sidebar
        $('#buddypress-mobile-user-navigation-trigger').sidr({
          name: 'buddypress-mobile-user-navigation',
          timing: 'ease-in-out',
          speed: 300
        });

        $('#close-buddypress-mobile-user-navigation').click(function() {
          $.sidr('close', 'buddypress-mobile-user-navigation');
        });

        //Our BuddyPress Navigation
        $('#buddypress-mobile-sidebar-trigger').sidr({
          name: 'buddypress-mobile-sidebar',
          timing: 'ease-in-out',
          speed: 300,
          side: 'right'
        });

        $('#close-buddypress-mobile-sidebar').click(function() {
          $.sidr('close', 'buddypress-mobile-sidebar');
        });

        //
        //Show & Hide our Sidr with clicks.
        ///
        $(".navigation-trigger, .close-panel-button, #buddypress-mobile-sidebar-trigger").on("click", function() {
          $(this).toggleClass("closed");
          $('.sidr').toggleClass('sidr-active');
          $('.sidr').removeClass('sidr-no-transform');
          $('.layout-wrapper').toggleClass('sidr-active-body');
        });

        //Hide Menus on Resize
        $( window ).resize(function () {
          $.sidr('close', 'buddypress-mobile-user-navigation');
          $.sidr('close', 'mobile-primary-navigation');
          $.sidr('close', 'buddypress-mobile-sidebar');
          $('.layout-wrapper').removeClass('sidr-active-body');
          $('.sidr').addClass('sidr-no-transform');
        });
        //Smart Menu Tweaks
        $('.bp-sidebar-navigation').smartmenus({
          subIndicatorsText: '<i class="fa fa-chevron-down"></i>',
        });

        //Add a styelized scrollbar on mobile
        $('#buddypress-mobile-sidebar,#buddypress-mobile-user-navigation,#mobile-primary-navigation').perfectScrollbar(); // Initialize

      }
    },
    // About us page, note the change from about-us to activity.
    activity: {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var namespace = wefoster;
      funcname = (funcname === undefined) ? 'init' : funcname;
      if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      UTIL.fire('common');

      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
      });
    }
  };

  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
