<?php

// js読み込み
function ssc_enqueue_script()
{
  wp_enqueue_script('slick-js', plugins_url('/simple-slick-carousel/javascripts/slick.min.js', ''), array('jquery'), null, true);
  wp_enqueue_script('set-carousel', plugins_url('/simple-slick-carousel/javascripts/set-carousel.js', ''), array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'ssc_enqueue_script');
