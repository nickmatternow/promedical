
(function($){
 
  // new Splide( '.splide' ).mount();
    /**
     * initializeBlock
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */
    var initializeBlock = function( $block ) {
            //Custom Script goes here
            // var splide = new Splide( '.c-testimonialslider', {
            //     // direction: 'ttb',
            //     // height   : '100px',
              
            //     arrows   : false
            //   } );
              
              // let updateHeight = newIndex => {
              //   let slide = slider.Components.Slides.getAt( typeof( newIndex ) == 'number' ? newIndex : slider.index ).slide;
              //   slide.parentElement.parentElement.style.height = slide.offsetHeight + 'px';
              // };

              let slider = new Splide( '.c-testimonialslider-slide', {
                //  type: 'fade', //or slide
                arrows: false,
                speed: 1000,
                // rewind: true,
                // direction: 'ttb',
                // height: '200px',

              } )

              .mount()
              // .mount().on( 'move resize', updateHeight );
              // updateHeight();
              
              
           
    }

    // Initialize each block on page load (front end).
    // $(document).ready(function(){
    //     $('.c-testimonialslider').each(function(){
    //         initializeBlock( $(this) );
    //     });
    //     setTimeout(
    //       function() {
    //         ScrollTrigger.refresh(true);
    //       },
    //       500); 
    // });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=testimonialslider', initializeBlock );
    }

})(jQuery);