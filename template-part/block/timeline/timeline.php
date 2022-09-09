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
$id = 'timeline-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-timeline';
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

<section class="timeline">
  <ol>

  <?php if( have_rows('timeline_item') ): ?>
     <?php while( have_rows('timeline_item') ): the_row(); ?>
    <li>
    <span class="date"><span>'<?php echo get_sub_field('date_shorthand'); ?></span></span>
    <div>
    <span class="timeline-pointer"></span>
    <time><?php echo get_sub_field('date'); ?></time><?php echo get_sub_field('content'); ?>
    </div>
    </li>
    <?php endwhile; ?>
    <?php endif; ?>
    <!-- empty li for spacing -->
<li></li>
  </ol>
  
  <div class="arrows">
    <button class="arrow arrow__prev disabled" >
    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="currentColor" d="m10.44 2l.56.413v11.194l-.54.393L5 8.373v-.827L10.44 2z"/></svg>
    </button>
    <button class="arrow arrow__next">
    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="currentColor" d="M5.56 14L5 13.587V2.393L5.54 2L11 7.627v.827L5.56 14z"/></svg>
    </button>
  </div>
</section>
</div>
