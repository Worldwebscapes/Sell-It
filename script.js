!function ($) {

  /** Set up initial load and load on option updates (.pl-trigger will fire this) */
  $( '.pl-sn-sell-it' ).on('template_ready', function(){

    $.plFlip.init( $(this) )

  })

  /** A JS object to encapsulate functions related to the section */
  $.plFlip = {

    init: function( section ){

      var that       = this

      $(".flip-card").flip({
       trigger: 'hover',

        
      });


    }
  }

/** end of jQuery wrapper */
}(window.jQuery);
