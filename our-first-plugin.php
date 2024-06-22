<?php


/*
 * Plugin Name:       Our First Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       We just created our first plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mustafizur Munna
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       ofp
 * Domain Path:       /languages
 * Requires Plugins:  
 */


class Ofp_first_plugin{
   public function __construct(){
      add_action('init', array($this, 'ofp_initialize'));
   }

   public function ofp_initialize(){
      add_filter('the_title', array($this, 'ofp_change_title'));
      add_filter('the_content', array($this, 'ofp_change_content'));
   }

   public function ofp_change_title($post_title){
      return "OFP_".strtoupper($post_title);
   }

   public function ofp_change_content($post_content){
      $content = strip_tags($post_content);
      $word_count = str_word_count($content);
      $read_time = ceil($word_count / 200);
      return $post_content."<p>The post is about <b>$word_count words</b> and approximate reading time is <b>$read_time minutes.</b></p>";
   }
}


new Ofp_first_plugin();