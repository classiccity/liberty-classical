(function( $ ) {
    'use strict';

    var prefix = '{{CLIENT_PREFIX}}',
        ns     = prefix+'-';


    $(document).ready(function(){


        /**
         * Accessibility code
         * @type {jQuery}
         */

        // Adding NAV to submenus
        $('ul.sub-menu').each(function(){
            $(this).attr('role','menu');
        });

        // Look through each menu
        $('[role="menu"] li').each(function(){
            $(this).attr('role','menuitem');
        });

        // Hyperlinks that have submenus to display
        $('.menu-item-has-children a').each(function(){
            $(this).attr('aria-haspopup',"true");
            $(this).attr('aria-expanded',"false");
        });

        // On hover of an element that has a popup, toggle the Expanded attribute to true when the mouse ENTERS
        $('[aria-haspopup="true"]').mouseover(function(){
            $(this).attr('aria-expanded',"true");
        });

        // On hover of an element that has a popup, toggle the Expanded attribute to FALSE when the mouse leaves
        $('[aria-haspopup="true"]').mouseout(function(){
            $(this).attr('aria-expanded',"false");
        });

        // Look at FIGURES that have direct images
        $('figure.wp-block-image').each(function(){
            $(this).attr('role','none');
        });

        // Adding accessible hyperlink information
        $("a").each(function(){

            // Variablitize the link
            var a = $(this);

            // Get the attribute value
            var label_value = a.attr('aria-label');

            // Get the role
            var aria_role = a.attr('aria-role');

            // Get the href value
            var href = a.attr('href');

            // Get the link's target
            var target = a.attr('target');

            if(label_value === undefined || target === "_blank") {

                // Get the link text
                var link_text = a.html().replace(/(<([^>]+)>)/gi, "").trim();

                // Does it open in a new window?
                if(target === "_blank") {
                    link_text += " (new window)";
                }

                // Set the attribute
                a.attr('aria-label',link_text);

            }

            // Check for current role
            if(aria_role === undefined) {

                // Check for href and hashtag
                if(href === undefined || href === "#" || href === "javascript:void(0);") {
                    a.attr('role','button');
                }

            }

        });




        // Add padding to the body for the fixed position navbar
        let root = document.documentElement;
        var navbar_height = $('nav').outerHeight();
        root.style.setProperty('--navbar-height', navbar_height + "px");

    });

    // Toggle CSS class on navbar based on scroll position
    $(window).scroll(function (event) {

        // Get the scroll position
        var scroll_position = $(window).scrollTop();

        // If the scroll_position is greater than 50
        if(scroll_position > 50) {
            $('[data-nav-bar]').attr('data-nav-bar','middle');
        } else {
            $('[data-nav-bar]').attr('data-nav-bar','top');
        }

    });

    // Toggling the menu
    $('[data-toggle]').click(function ( e ) {

        // Make sure links don't activate
        e.preventDefault();

        // Get the element to toggle
        let element_to_toggle = $(this).attr('data-target');
        console.log(element_to_toggle);

        // Toggle this class
        let class_to_toggle = $(this).attr('data-toggle');
        console.log(class_to_toggle);

        // Toggle the CSS class
        $(element_to_toggle).toggleClass(class_to_toggle);

    });

    // Toggling submenu on mobile devices
    $('[data-submenu-selector] > a').on('touchstart', function (e) {

        // Make sure the link doesn't go through
        e.preventDefault();

        // Get the parent LI tag
        let parent_menu_item = $(this).parent();

        // Get the selector for the submenu
        let submenu_selector = parent_menu_item.attr('data-submenu-selector');

        // Get the class to toggle on the submenu
        let submenu_toggle_css_class = parent_menu_item.attr('data-submenu-class-toggle');

        // Toggle the CSS class
        parent_menu_item.find(submenu_selector).toggleClass(submenu_toggle_css_class);

    });

    
  
  // Swapping out Image for Video Embed
  // Toggling a video placeholder
  $('[data-bg-video-url]').on('click',function(){

      // Set attribute name
      var atttribute_name = "data-bg-video-url";

      // Set "this"
      var current_block = $(this);

      // Get the URL
      var video_url = $(this).attr(atttribute_name);

      console.log("Video URL: "+video_url);

      // Is it Youtube?
      if(video_url.includes('youtube') || video_url.includes('you')) {

          console.log("Youtube");

          $.ajax({
              method: "GET",
              url: "https://www.youtube.com/oembed",
              data: {
                  url: video_url,
                  autoplay: 1
              }
          }).done(function(output) {

              // Make sure we have an iframe
              if(output.html) {
                  current_block.append(output.html);
                  current_block.removeAttr(atttribute_name);
              }

          });

      }

      // If it's a Vimeo video
      else if(video_url.includes('vimeo')) {

          console.log("Vimeo");

          $.ajax({
              method: "GET",
              url: "https://vimeo.com/api/oembed.json",
              data: {
                  url: video_url,
                  autoplay: true
              }
          }).done(function(output) {

              // Make sure we have an iframe
              if(output.html) {
                  current_block.append(output.html);
                  current_block.removeAttr(atttribute_name);
              }

          });

      }

      else {

          console.log("No video");

      }

  });


})( jQuery );
