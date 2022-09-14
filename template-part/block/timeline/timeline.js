(function($){

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
        
           
    }

    // Initialize each block on page load (front end).
    // $(document).ready(function(){
    //     $('.c-timeline').each(function(){
    //         initializeBlock( $(this) );
            
    //     });
    //     ScrollTrigger.refresh();
    // });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=timeline', initializeBlock ); 
    }

})(jQuery);