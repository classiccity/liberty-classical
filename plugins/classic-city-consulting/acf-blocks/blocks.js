// jQuery accordion
;(function($){
    $( ".accordion" ).accordion({
      collapsible: true,
      active : 'none',
      header: ".acc_title",
      heightStyle: "content",
      activate: function( event, ui ) {
        if(!$.isEmptyObject(ui.newHeader.offset())) {
          if ($(window).width() > 767) {
            $('html:not(:animated), body:not(:animated)').animate({ scrollTop: ui.newHeader.offset().top -180 }, 'slow');
          }
          else {
            $('html:not(:animated), body:not(:animated)').animate({ scrollTop: ui.newHeader.offset().top -50 }, 'slow');
          }
        }
      }
    });
})(jQuery);