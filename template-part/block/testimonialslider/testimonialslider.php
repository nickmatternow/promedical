<!-- <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script> -->
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
$id = 'testimonialslider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-testimonialslider wp-block';
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
<div class="c-testimonial-wrap">
    <img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22158%22%20height%3D%22158%22%20viewBox%3D%220%200%20158%20158%22%3E%3Cdefs%3E%3CclipPath%20id%3D%22zi4ua%22%3E%3Cpath%20d%3D%22M0%200h158v158H0z%22%2F%3E%3C%2FclipPath%3E%3C%2Fdefs%3E%3Cg%3E%3Cg%3E%3Cg%2F%3E%3Cg%20clip-path%3D%22url%28%23zi4ua%29%22%3E%3Cpath%20fill%3D%22%23fefefe%22%20d%3D%22M79%200c43.561%200%2079%2035.44%2079%2079s-35.439%2079-79%2079c-43.56%200-79-35.44-79-79S35.44%200%2079%200zm0%20156.208c42.572%200%2077.207-34.636%2077.207-77.208%200-42.572-34.635-77.207-77.207-77.207C36.428%201.793%201.793%2036.428%201.793%2079c0%2042.572%2034.635%2077.208%2077.207%2077.208zm0-144.525c37.12%200%2067.318%2030.198%2067.318%2067.317%200%2037.12-30.199%2067.317-67.318%2067.317-37.12%200-67.317-30.197-67.317-67.317%200-37.119%2030.198-67.317%2067.317-67.317zm0%20132.841c36.13%200%2065.525-29.394%2065.525-65.524S115.131%2013.476%2079%2013.476C42.87%2013.476%2013.476%2042.87%2013.476%2079S42.87%20144.524%2079%20144.524zm26.807-95.176c3.529%200%205.32.77%205.32%204.979v1.362c0%204.21-1.791%204.98-5.32%204.98h-6.93v43.004c0%203.91-1.07%204.98-4.982%204.98h-2.04c-3.91%200-4.982-1.07-4.982-4.98V56.71c0-5.229%202.127-7.362%207.363-7.362zm3.528%204.979c0-2.77-.462-3.187-3.528-3.187H94.236c-4.236%200-5.57%201.302-5.57%205.57v46.963c0%202.92.268%203.187%203.188%203.187h2.041c2.92%200%203.189-.268%203.189-3.187V58.877h8.723c3.066%200%203.528-.417%203.528-3.188zm-39.601-4.98c3.91%200%204.98%201.071%204.98%204.98v1.362c0%203.91-1.07%204.98-4.98%204.98h-6.93v43.004c0%204.21-1.804%204.98-5.322%204.98h-2.041c-3.91%200-4.98-1.07-4.98-4.98V56.71c0-5.229%202.133-7.362%207.361-7.362zm3.187%204.98c0-2.919-.268-3.187-3.187-3.187H57.822c-4.267%200-5.569%201.302-5.569%205.57v46.963c0%202.92.268%203.187%203.188%203.187h2.041c3.067%200%203.518-.416%203.518-3.187V58.877h8.734c2.919%200%203.187-.268%203.187-3.188z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="">
    <div class="c-testimonialslider-slide splide">
        <div class="splide__track">
                <div class="splide__list">
        <?php if( have_rows('slides') ): ?>
            <?php while( have_rows('slides') ): the_row(); ?>
           <div class="splide__slide">
           <span><?php echo get_sub_field('citation'); ?></span>
           <p><?php echo get_sub_field('quote'); ?></p>
        
           </div>
           <?php endwhile; ?>
        
           <?php endif; ?>
        </div>
        </div>
    </div>
</div>
</div>
