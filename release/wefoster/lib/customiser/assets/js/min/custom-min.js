!function($){wp.customize("wf_plus_header_style",function(e){e.bind(function(e){var t=$(".wp-full-overlay-main iframe").contents();t.find("header.navbar").removeClass("navbar-default"),t.find("header.navbar").removeClass("navbar-inverse"),t.find("header.navbar").addClass(e)})}),wp.customize("wf_plus_footer_style",function(e){e.bind(function(e){var t=$(".wp-full-overlay-main iframe").contents();t.find("header.navbar").removeClass("footer-default"),t.find("header.navbar").removeClass("footer-inverse"),t.find("header.navbar").addClass(e)})}),wp.customize("wf_body_background_image_color",function(e){e.bind(function(e){var t=$(".wp-full-overlay-main iframe").contents();t.find(".wefoster-plus-body-overlay").attr("class","wefoster-plus-body-overlay"),t.find(".wefoster-plus-body-overlay").addClass(e)})}),wp.customize("wf_header_background_image_color",function(e){e.bind(function(e){var t=$(".wp-full-overlay-main iframe").contents();t.find(".wefoster-plus-header-overlay").attr("class","wefoster-plus-header-overlay"),t.find(".wefoster-plus-header-overlay").addClass(e)})}),wp.customize("wf_body_background_picture",function(e){e.bind(function(e){var t=$(".wp-full-overlay-main iframe").contents();t.find(".wefoster-plus-background-overlay img").attr("src",e)})}),wp.customize("wf_body_background_texture",function(e){e.bind(function(e){var t=$(".wp-full-overlay-main iframe").contents();0===$.trim(e).length?t.find(".wefoster-plus-background-overlay").css("background",""):t.find(".wefoster-plus-background-overlay").css("background","url( "+e+")"),t.find(".wefoster-plus-background-overlay").css("background-repeat","repeat"),t.find(".wefoster-plus-background-overlay").css("background-size","initial")})}),wp.customize("wf_header_background_picture",function(e){e.bind(function(e){var t=$(".wp-full-overlay-main iframe").contents();0===$.trim(e).length?t.find(".wefoster-framework .wefoster-plus-header-overlay").css("background-image",""):t.find(".wefoster-framework .wefoster-plus-header-overlay").css("background-image","url( "+e+")"),$(t.find(".wefoster-framework .wefoster-plus-header-overlay").each(function(){this.style.setProperty("background-size","cover","important")}))})}),wp.customize("wf_body_background_image_opacity",function(e){e.bind(function(e){var t=$(".wp-full-overlay-main iframe").contents();t.find(".wefoster-plus-background-overlay").css("opacity",e)})}),wp.customize("wf_header_background_image_opacity",function(e){e.bind(function(e){var t=$(".wp-full-overlay-main iframe").contents();t.find(".wefoster-plus-header-overlay").css("opacity",e)})}),wp.customize("wf_body_background_image_blur",function(e){e.bind(function(e){var t=$(".wp-full-overlay-main iframe").contents();t.find(".wefoster-plus-background-overlay").css({filter:"blur("+e+"px)","-webkit-filter":"blur("+e+"px)","-moz-filter":"blur("+e+")px","-o-filter":"blur("+e+")px","-ms-filter":"blur("+e+")px"})})}),"undefined"!=typeof prefixL10n&&(upsell=$('<a class="prefix-upsell-link"></a>').attr("href",prefixL10n.prefixURL).attr("target","_blank").text(prefixL10n.prefixLabel),setTimeout(function(){$("#customize-control-wf_stylekit").append(stylekit)},200),stylekit=$('<a class="stylekit-info-link feature-description tooltip hint--left"></a>').attr("href",prefixL10n.prefixURL).attr("target","_blank").attr("data-hint","Need more stylekits? WeFoster Plus comes with dozens of carefully designed StyleKits and we are adding new ones all the time! As a WeFoster Plus member you can even import, export and share your Stylekit designs with the rest of our community.").text("WeFoster Plus Features"),setTimeout(function(){var e=["#customize-control-wf_plus_header_menu_position","#customize-control-wf_plus_default_member_avatar","#customize-control-wf_plus_featured_image_default_sizes","#customize-control-wf_plus_groups_title","#customize-control-wf_plus_members_title","#customize-control-wf_plus_activity_title"];$(e.join(",")).append(needssave)},200),needssave=$('<a class="needs_save_text"></a>').text('Note: Only after you press "Save & Publish" this setting will be applied.'),setTimeout(function(){$("#accordion-section-wf_plus_typography_body_section").append(typography)},200),typography=$('<a class="stylekit-info-link feature-description tooltip hint--left"></a>').attr("href",prefixL10n.prefixURL).attr("target","_blank").attr("data-hint","Create thousands of font combinations by setting different fonts for your Header, Navigation and Body text. Not a font expert? Choose from a range of Font Presets that have proven their worth.").text("WeFoster Plus Features"),setTimeout(function(){$("#accordion-section-wf_plus_activity_section").append(buddypress)},200),buddypress=$('<a class="stylekit-info-link feature-description tooltip hint--left"></a>').attr("href",prefixL10n.prefixURL).attr("target","_blank").attr("data-hint","Want to show your Members or Groups in a beautiful animated image grid instead of a simple listing? Choose from different page layouts on your Member & Group pages. Add introduction texts and images to your BuddyPress directories or even make your community private with the click of a button.").text("WeFoster Plus Features"),setTimeout(function(){var e=["#customize-control-wf_header_background_image_color","#customize-control-wf_body_background_image_color","#customize-control-wf_plus_featured_image_effect"];$(e.join(",")).append(image_effects)},200),image_effects=$('<a class="stylekit-info-link feature-description tooltip hint--left"></a>').attr("href",prefixL10n.prefixURL).attr("target","_blank").attr("data-hint","Add Instagram like effects that add tons of character to your images. Choose from over 15 effects that can be applied to your post thumbnails, header images or even BuddyPress avatars.").text("WeFoster Plus Features"),setTimeout(function(){var e=["#customize-control-wf_header_background_picture","#customize-control-wf_body_background_picture"];$(e.join(",")).append(background_picture)},200),background_picture=$('<a class="stylekit-info-link feature-description tooltip hint--left"></a>').attr("href",prefixL10n.prefixURL).attr("target","_blank").attr("data-hint","Choose from over 60 carefully selected photos in different categories that are free to use for personal and commercial use. Perfect for your community pages or for the bloggers in your Multisite network.").text("WeFoster Plus Features"),setTimeout(function(){$("#accordion-section-themes h3").append(upsell)},200),$(".prefix-upsell-link").on("click",function(e){e.stopPropagation()}))}(jQuery);