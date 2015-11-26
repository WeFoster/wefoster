/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
(function($) {


  /////
  ///// Stylekits
  /////

  //Add Image Effect Class to Cover Photos
  wp.customize('wf_plus_bp_cover_photo_effect', function(value) {
    value.bind(function(to) {
      var iframe = $('.wp-full-overlay-main iframe').contents();

      iframe.find('.bp-cover-photo').attr('class', 'bp-cover-photo');
      iframe.find('.bp-cover-photo').addClass('postthumb');
      iframe.find('.bp-cover-photo').addClass(to);

    });
  });


  /////
  ///// LAYOUT
  /////
  wp.customize('wf_plus_header_style', function(value) {
    value.bind(function(to) {
      var iframe = $('.wp-full-overlay-main iframe').contents();

      iframe.find('header.navbar').removeClass('navbar-default');
      iframe.find('header.navbar').removeClass('navbar-inverse');
      iframe.find('header.navbar').addClass(to);
    });
  });

  wp.customize('wf_plus_footer_style', function(value) {
    value.bind(function(to) {
      var iframe = $('.wp-full-overlay-main iframe').contents();

      iframe.find('.content-info').removeClass('footer-default');
      iframe.find('.content-info').removeClass('footer-inverse');
      iframe.find('.content-info').addClass(to);
    });
  });


  /////
  ///// APPEARANCE
  /////

  //Add Image Effect Class to Body
  wp.customize('wf_body_background_image_color', function(value) {
    value.bind(function(to) {
      var iframe = $('.wp-full-overlay-main iframe').contents();

      iframe.find('.wefoster-plus-body-overlay').attr('class', 'wefoster-plus-body-overlay');
      iframe.find('.wefoster-plus-body-overlay').addClass(to);
    });
  });

  //Add Image Effect Class to Header
  wp.customize('wf_header_background_image_color', function(value) {
    value.bind(function(to) {
      var iframe = $('.wp-full-overlay-main iframe').contents();

      iframe.find('.wefoster-plus-header-overlay').attr('class', 'wefoster-plus-header-overlay');
      iframe.find('.wefoster-plus-header-overlay').addClass(to);
    });
  });

  //Add Image Effect Class to Featured Images
  wp.customize('wf_plus_featured_image_effect', function(value) {
    value.bind(function(to) {
      var iframe = $('.wp-full-overlay-main iframe').contents();

      iframe.find('.postthumb').attr('class', 'postthumb');
      iframe.find('.postthumb').addClass(to);

      iframe.find('.buddypress .postthumb').attr('class', 'directory-image');
      iframe.find('.directory-image').addClass('postthumb');
      iframe.find('.directory-image').addClass(to);

    });
  });

  //Add Image Effect Class to Cover Photos
  wp.customize('wf_plus_bp_cover_photo_effect', function(value) {
    value.bind(function(to) {
      var iframe = $('.wp-full-overlay-main iframe').contents();

      iframe.find('.bp-cover-photo').attr('class', 'bp-cover-photo');
      iframe.find('.bp-cover-photo').addClass('postthumb');
      iframe.find('.bp-cover-photo').addClass(to);

    });
  });

  //Swap an image with live preview.
  wp.customize('wf_body_background_picture', function(value) {
    value.bind(function(to) {
      var iframe = $('.wp-full-overlay-main iframe').contents();
      iframe.find('.wefoster-plus-background-overlay img').attr('src', to);

    });
  });

  //Swap a texture with live preview
  wp.customize('wf_body_background_texture', function(value) {
    value.bind(function(to) {
      var iframe = $('.wp-full-overlay-main iframe').contents();
      0 === $.trim(to).length ?
        iframe.find('.wefoster-plus-background-overlay').css('background', '') :
        iframe.find('.wefoster-plus-background-overlay').css('background', 'url( ' + to + ')');
      iframe.find('.wefoster-plus-background-overlay').css('background-repeat', 'repeat');
      iframe.find('.wefoster-plus-background-overlay').css('background-size', 'initial');
    });
  });



  //Swap a header image with live preview.
  wp.customize('wf_header_background_picture', function(value) {
    value.bind(function(to) {
      var iframe = $('.wp-full-overlay-main iframe').contents();
      0 === $.trim(to).length ?
        iframe.find('.wefoster-framework .wefoster-plus-header-overlay').css('background-image', '') :
        iframe.find('.wefoster-framework .wefoster-plus-header-overlay').css('background-image', 'url( ' + to + ')');

      $(iframe.find('.wefoster-framework .wefoster-plus-header-overlay').each(function() {
        this.style.setProperty('background-size', 'cover', 'important');
      }));

    });
  });

  //Add CSS Opacity
  wp.customize('wf_body_background_image_opacity', function(value) {
    value.bind(function(to) {
      var iframe = $('.wp-full-overlay-main iframe').contents();
      iframe.find('.wefoster-plus-background-overlay').css('opacity', to);
    });
  });

  //Add CSS Opacity
  wp.customize('wf_header_background_image_opacity', function(value) {
    value.bind(function(to) {
      var iframe = $('.wp-full-overlay-main iframe').contents();
      iframe.find('.wefoster-plus-header-overlay').css('opacity', to);
    });
  });

  //Add CSS Blur
  wp.customize('wf_body_background_image_blur', function(value) {
    value.bind(function(to) {
      var iframe = $('.wp-full-overlay-main iframe').contents();
      iframe.find('.wefoster-plus-background-overlay').css({
        'filter': 'blur(' + to + 'px)',
        '-webkit-filter': 'blur(' + to + 'px)',
        '-moz-filter': 'blur(' + to + ')px',
        '-o-filter': 'blur(' + to + ')px',
        '-ms-filter': 'blur(' + to + ')px'
      });
    });
  });




  /////
  ///// Customizer Messages
  /////


  // Add Upgrade Message
  if ('undefined' !== typeof prefixL10n) {
    upsell = $('<a class="prefix-upsell-link"></a>')
      .attr('href', prefixL10n.prefixURL)
      .attr('target', '_blank')
      .text(prefixL10n.prefixLabel);

    //Add Stylekit Message
    setTimeout(function() {
      $('#customize-control-wf_stylekit').append(stylekit);
    }, 200);

    stylekit = $('<a class="stylekit-info-link feature-description tooltip hint--left"></a>')
      .attr('href', prefixL10n.prefixURL)
      .attr('target', '_blank')
      .attr('data-hint', 'Need more stylekits? WeFoster Plus comes with dozens of carefully designed StyleKits and we are adding new ones all the time! As a WeFoster Plus member you can even import, export and share your Stylekit designs with the rest of our community.')
      .text('WeFoster Plus Features')

    //Show a notice for settings that need a refresh.
    setTimeout(function() {
      var ids = [
        '#customize-control-wf_plus_header_menu_position',
        '#customize-control-wf_plus_default_member_avatar',
        '#customize-control-wf_plus_featured_image_default_sizes',
        '#customize-control-wf_plus_groups_title',
        '#customize-control-wf_plus_members_title',
        '#customize-control-wf_plus_activity_title'
      ];
      $(ids.join(',')).append(needssave);
    }, 200);


    needssave = $('<a class="needs_save_text"></a>')
      .text('Note: Only after you press "Save & Publish" this setting will be applied.')


    //Add Typography Message
    setTimeout(function() {
      $('#accordion-section-wf_plus_typography_body_section').append(typography);
    }, 200);

    typography = $('<a class="stylekit-info-link feature-description tooltip hint--left"></a>')
      .attr('href', prefixL10n.prefixURL)
      .attr('target', '_blank')
      .attr('data-hint', 'Create thousands of font combinations by setting different fonts for your Header, Navigation and Body text. Not a font expert? Choose from a range of Font Presets that have proven their worth.')
      .text('WeFoster Plus Features')


    //Add BuddyPress Message
    //Add Typography Message
    setTimeout(function() {
      $('#accordion-section-wf_plus_activity_section').append(buddypress);
    }, 200);

    buddypress = $('<a class="stylekit-info-link feature-description tooltip hint--left"></a>')
      .attr('href', prefixL10n.prefixURL)
      .attr('target', '_blank')
      .attr('data-hint', 'Want to show your Members or Groups in a beautiful animated image grid instead of a simple listing? Choose from different page layouts on your Member & Group pages. Add introduction texts and images to your BuddyPress directories or even make your community private with the click of a button.')
      .text('WeFoster Plus Features')


    //Add Image Effect Message
    setTimeout(function() {
      var ids = [
        '#customize-control-wf_header_background_image_color',
        '#customize-control-wf_body_background_image_color',
        '#customize-control-wf_plus_featured_image_effect'
      ];
      $(ids.join(',')).append(image_effects);
    }, 200);

    image_effects = $('<a class="stylekit-info-link feature-description tooltip hint--left"></a>')
      .attr('href', prefixL10n.prefixURL)
      .attr('target', '_blank')
      .attr('data-hint', 'Add Instagram like effects that add tons of character to your images. Choose from over 15 effects that can be applied to your post thumbnails, header images or even BuddyPress avatars.')
      .text('WeFoster Plus Features')

    //Add Background Photo Message
    setTimeout(function() {
      var ids = [
        '#customize-control-wf_header_background_picture',
        '#customize-control-wf_body_background_picture'
      ];
      $(ids.join(',')).append(background_picture);
    }, 200);

    background_picture = $('<a class="stylekit-info-link feature-description tooltip hint--left"></a>')
      .attr('href', prefixL10n.prefixURL)
      .attr('target', '_blank')
      .attr('data-hint', 'Choose from over 60 carefully selected photos in different categories that are free to use for personal and commercial use. Perfect for your community pages or for the bloggers in your Multisite network.')
      .text('WeFoster Plus Features')




    setTimeout(function() {
      $('#accordion-section-themes h3').append(upsell);
    }, 200);

    // Remove accordion click event
    $('.prefix-upsell-link').on('click', function(e) {
      e.stopPropagation();
    });
  }

})(jQuery);



//# sourceMappingURL=custom.js.map