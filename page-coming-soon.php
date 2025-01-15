<?php

/**
 * Template Name: Coming soon
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
$host=$_SERVER['HTTP_HOST'];
if ($host == 'topclass-trans.com'){
  $bkg_img = get_field('body_bg');
  $bkg_size = get_field('body_bg_size');
  $bkg_position = get_field('body_bg_pos');
  $logo = get_field('logo');
  $bajada = get_field('bajada');
  $form = get_field('form');
}else{
  $bkg_img = get_post_meta($post->ID, 'body_bg', true);
  $bkg_size = get_post_meta($post->ID, 'body_bg_size', true);
  $bkg_position = get_post_meta($post->ID, 'body_bg_pos', true);
  $logo = get_post_meta($post->ID, 'logo', true);
  $bajada = get_post_meta($post->ID, 'bajada', true);
  $form = get_post_meta($post->ID, 'form', true);
}
?>

  <style>
    body{
      background-image: url(<?php echo $bkg_img ?>); 
    }
    @media (max-width:576px){
      body{
          background-size: <?php echo $bkg_sizebkg ?>;
          background-position: <?php echo $bkg_position ?>;
      }
    }
  </style>
  <div id="content" class="site-content">
    <div id="primary" class="content-area">

      <main id="main" class="site-main">

        <div class="entry-content">
          <div class="coming-soon">
            <div class="content">
              <div class="logo">
                <img src="<?php echo $logo; ?>" alt="topclass-girls" />
                <p style="margin-top: 0;"><?php echo $bajada; ?></p>
                <?php if ($_SERVER['HTTP_HOST'] == 'topclass.club') : 
                  the_content();
                else:
                  echo $form;
                endif;                 
                ?>
              </div>
              <small>© <?php echo $_SERVER['HTTP_HOST'] ?> - <a href="https://topclass.club" >Grupo TopclassClub 2025.</a></small> 
            </div>
          </div>
        </div>

      </main>

    </div>
  </div>

<?php
get_footer();