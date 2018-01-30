<?php

// スタイルシート読み込み
function ssc_enqueue_style()
{
  wp_enqueue_style('slick-css', plugins_url('/simple-slick-carousel/styles/slick.css', ''));
  wp_enqueue_style('slick-custom', plugins_url('/simple-slick-carousel/styles/slick-custom.css', ''));
}
add_action('wp_enqueue_scripts', 'ssc_enqueue_style');
