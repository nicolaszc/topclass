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
?>

  <style>
    body{
      background-image: url(<?php echo get_post_meta($post->ID, 'body_bg', true) ?>); 
    }
    @media (max-width:576px){
      body{
          background-size: <?php echo get_post_meta($post->ID, 'body_bg_size', true) ?>;
          background-position: <?php echo get_post_meta($post->ID, 'body_bg_pos', true) ?>;
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
                <img src="<?php echo get_post_meta($post->ID, 'logo', true); ?>" alt="topclass-girls" />
                <p style="margin-top: 0;"><?php echo get_post_meta($post->ID, 'bajada', true); ?></p>
                <?php the_content(); ?>
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