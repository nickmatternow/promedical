<?php

/**
 * blockname Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'c-stackslider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-stackslider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">



   <div id="slider"> 
  <div class="dp-wrap"> 
    <div id="dp-slider">

      <div class="dp_item" data-class="1" data-position="1">
        <div class="dp-content">
        <div class="dp-img">
          <img class="img-fluid" src="https://picsum.photos/300/470" alt="investing">
        </div>
          <div class="dp-content-inner">
              <h2>Vladimir Livschutz, M.D.</h2>
              <p>A board-certified anesthesiologist with over 30 years of clinical experience, Dr. Livschutz completed his training at Chicago’s Rush-Presbyterian-St. Luke’s Medical Center, where he specialized in anesthesia for cardiac and transplant surgery. Since then, he has served as Chief of Anesthesia at a major metropolitan hospital in North Florida; pioneered new techniques in outpatient anesthesia; and founded Ambulatory Medical Anesthesia Consultants, Inc., a network of board-certified anesthesiologists specializing in ambulatory surgery. Dr. Livschutz is also recognized for his role in promoting outpatient safety and quality standards.</p>
          </div>
         
        </div>
      </div>

      <div class="dp_item" data-class="2" data-position="2">
      <div class="dp-content">
        <div class="dp-img">
          <img class="img-fluid" src="https://picsum.photos/300/470" alt="investing">
        </div>
        <div class="dp-content-inner">
              <h2>Vladimir Livschutz, M.D.</h2>
              <p>A board-certified anesthesiologist with over 30 years of clinical experience, Dr. Livschutz completed his training at Chicago’s Rush-Presbyterian-St. Luke’s Medical Center, where he specialized in anesthesia for cardiac and transplant surgery. Since then, he has served as Chief of Anesthesia at a major metropolitan hospital in North Florida; pioneered new techniques in outpatient anesthesia; and founded Ambulatory Medical Anesthesia Consultants, Inc., a network of board-certified anesthesiologists specializing in ambulatory surgery. Dr. Livschutz is also recognized for his role in promoting outpatient safety and quality standards.</p>
          </div>
         
        </div>
      </div>

      <div class="dp_item" data-class="3" data-position="3">
      <div class="dp-content">
        <div class="dp-img">
          <img class="img-fluid" src="https://picsum.photos/300/470" alt="investing">
        </div>
          <div class="dp-content-inner">
              <h2>Slide 3</h2>
              <p> This is Slide 1 </p>
          </div>
         
        </div>
      </div>

      <div class="dp_item" data-class="4" data-position="4">
      <div class="dp-content">
        <div class="dp-img">
          <img class="img-fluid" src="https://picsum.photos/300/470" alt="investing">
        </div>
          <div class="dp-content-inner">
              <h2>Slide 4</h2>
              <p> This is Slide 1 </p>
          </div>
         
        </div>
      </div>

      <div class="dp_item" data-class="5" data-position="5">
      <div class="dp-content">
        <div class="dp-img">
          <img class="img-fluid" src="https://picsum.photos/300/470" alt="investing">
        </div>
          <div class="dp-content-inner">
              <h2>Slide 5</h2>
              <p> This is Slide 1 </p>
          </div>
         
        </div>
      </div>

      <div class="dp_item" data-class="6" data-position="6">
      <div class="dp-content">
        <div class="dp-img">
          <img class="img-fluid" src="https://picsum.photos/300/470" alt="investing">
        </div>
          <div class="dp-content-inner">
              <h2>Slide 6</h2>
              <p> This is Slide 1 </p>
          </div>
         
        </div>
      </div>
    </div>
    
    <span id="dp-next">
    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg>
    </span>

    <span id="dp-prev">
    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg>
    </span>

    

    <ul id="dp-dots">
      <li data-class="1" class="active"></li>
      <li data-class="2"></li>
      <li data-class="3"></li>
      <li data-class="4"></li>
      <li data-class="5"></li>
      <li data-class="6"></li>

    </ul>
  </div>
</div>







</div>

