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
$id = 'c-home-hero' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-home-hero';
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
    <?php
        $image = get_field('hero_image');
        $size = 'full';
        if($image){
        echo wp_get_attachment_image($image, $size);
        }
    ?>

<div class="c-youtube-wrap">
<div id="yt-player" class="yt-player" data-video="1VwdKgYrE3s" ></div>
</div>

    <div class="o-wrapper">
    <div class="c-home-hero-content"  data-speed="1.2">
      <?php if( get_field('hero_title') ) { echo '<h1>' . get_field('hero_title') . '</h1>'; }?>
      <?php if( get_field('hero_description') ) { echo '<p class="mb-8 c-home-hero-content-intro">' . get_field('hero_description') . '</p>'; }?>
      <?php if( get_field('hero_content') ) { echo '<p>' . get_field('hero_content') . '</p>'; }?>
      <?php 
        $link = get_field('button');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="c-btn-primary"><a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></div>
        <?php endif; ?>
   </div>
    </div>
   
</div>

<script>

      // YouTube Player API for header BG video

// Insert the <script> tag targeting the iframe API
const tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
const firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// Get the video ID passed to the data-video attribute
const bgVideoID = document.querySelector('.yt-player').getAttribute('data-video');

// Set the player options
const playerOptions = {
  // Autoplay + mute has to be activated (value = 1) if you want to autoplay it everywhere 
  // Chrome/Safari/Mobile
  autoplay: 1,
  mute: 1,
  autohide: 1, 
  modestbranding: 1, 
  rel: 0, 
  showinfo: 0, 
  controls: 0, 
  disablekb: 1, 
  enablejsapi: 1, 
  iv_load_policy: 3,
  // For looping video you have to have loop to 1
  // And playlist value equal to your currently playing video
  loop: 1,
  playlist: bgVideoID,
  
}

// Get the video overlay, to mask it when the video is loaded
const videoOverlay = document.querySelector('.js-video-overlay');

// This function creates an <iframe> (and YouTube player)
// after the API code downloads.
let ytPlayer;
function onYouTubeIframeAPIReady() {
  ytPlayer = new YT.Player('yt-player', {
    width: '1280',
    height: '720',
    videoId: bgVideoID,
    playerVars: playerOptions,
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });
}

// The API will call this function when the video player is ready.
function onPlayerReady(event) {
  event.target.playVideo();

  // Get the duration of the currently playing video
  const videoDuration = event.target.getDuration();
  
  // When the video is playing, compare the total duration
  // To the current passed time if it's below 2 and above 0,
  // Return to the first frame (0) of the video
  // This is needed to avoid the buffering at the end of the video
  // Which displays a black screen + the YouTube loader
  setInterval(function (){
    const videoCurrentTime = event.target.getCurrentTime();
    const timeDifference = videoDuration - videoCurrentTime;
    
    if (2 > timeDifference > 0) {
      event.target.seekTo(0); 
    }
  }, 1000);
}

// When the player is ready and when the video starts playing
// The state changes to PLAYING and we can remove our overlay
// This is needed to mask the preloading
function onPlayerStateChange(event) {
  if (event.data == YT.PlayerState.PLAYING) {
    videoOverlay.classList.add('header__video-overlay--fadeOut');
  }
}
</script>