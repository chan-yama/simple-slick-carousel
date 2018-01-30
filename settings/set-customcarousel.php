<?php

// ================================
//    カスタム投稿メニュー・画面の追加
// ================================

add_action('init', 'create_customcarousel_post_type');

function create_customcarousel_post_type()
{
  $customcarouselSupports = array(
    'title',
    'thumbnail',
    'revisions',
  );

  // add post type
  register_post_type('customcarousel',
    array(
      'label'         => 'スライダー画像',
      'public'        => true,
      'has_archive'   => true,
      'menu_position' => 5,
      'menu_icon'     => 'dashicons-images-alt2',
      'supports'      => $customcarouselSupports,
    )
  );

  // add taxonomy
  register_taxonomy(
    'customcarousel_taxonomy',
    'customcarousel',
    array(
      'label'        => 'カテゴリー',
      'labels'       => array(
        'all_items'    => 'すべて',
        'add_new_item' => '新規カテゴリーを追加',
      ),
      'hierarchical' => true,
    )
  );
}

// ================================
//        投稿フィールドの追加
// ================================

add_action('admin_menu', 'add_customcarousel_field');

function add_customcarousel_field()
{
  // add_meta_box(表示されるボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
  add_meta_box('customcarousel-img_url', '画像のリンク先', 'create_form_customcarousel_img_url', 'customcarousel', 'normal');
  add_meta_box('customcarousel-img_description', '画像の説明', 'create_form_customcarousel_img_description', 'customcarousel', 'normal');
}

function create_form_customcarousel_img_url()
{
  global $post;
  echo '<input name="img_url" style="width: 100%;" value="' . get_post_meta($post->ID, 'img_url', true) . '"/>';
}

function create_form_customcarousel_img_description()
{
  global $post;
  echo '<textarea name="img_description" style="width: 100%; height: 200px;">' . get_post_meta($post->ID, 'img_description', true) . '</textarea>';

  // WYSIWYGエディタを使うときは以下のコードを記述
  // wp_editor( get_post_meta($post->ID,'img_description',true), 'img_description-box', ['textarea_name' => 'img_description'] );
}

add_action('save_post', 'save_customcarousel_field');

function save_customcarousel_field($post_id)
{
  $my_fields = array('img_url', 'img_description');

  foreach ($my_fields as $my_field) {
    if (isset($_POST[$my_field])) {
      $value = $_POST[$my_field];
    } else {
      $value = '';
    }
    if (strcmp($value, get_post_meta($post_id, $my_field, true)) != 0) {
      update_post_meta($post_id, $my_field, $value);
    } elseif ($value == "") {
      delete_post_meta($post_id, $my_field, get_post_meta($post_id, $my_field, true));
    }
  }
}
