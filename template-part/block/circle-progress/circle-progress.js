



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
            //Custom Script goes here
           
           
           
          
          
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.c-circle-progress').each(function(){
            

            var myValue = $(this).data('value');
            var counter = $(this);
           
            function progress() {
                console.log(counter);
                console.log(myValue);
                jQuery(counter).children('.progress').circleProgress({
          
                value: myValue,
                textFormat: 'percent',
                max: 100
            });
            }
            jQuery(function($) {
                ScrollTrigger.create({
              trigger: '.progress',
              onEnter: progress,
            //   onLeave: myLeaveFunc,
            //    onEnterBack: progress,
            //   onLeaveBack: myLeaveFunc
            });
              });

            initializeBlock( $(this) );
            
        });
     
       
        
      


    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        
        window.acf.addAction( 'render_block_preview/type=circle-progress', initializeBlock );
    }

})(jQuery);