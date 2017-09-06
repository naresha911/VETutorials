<?php

/**
 * @package WebGL
 * @version 1.0
 */
/*
  Plugin Name: WebGL Tutorial
  Plugin URI: http://wordpress.org/plugins/webgl/
  Description: Learning WebGl
  Author: Naresh
  Version: 1.0
  Author URI: http://nar/
 */

function canvas() {
    ob_start();
    ?>
    <canvas id="lesson01-canvas" style="border: none;" width="500" height="500"></canvas>
    <br/>
    <br/>
    <div>
        <span>Perpective Field Of View:  </span>
        <input style="width:100px" type="number" min="10" max="360" id="fieldOfView">
    </div>
    <?php
    $temp_content = ob_get_contents();
    ob_end_clean();

    return $temp_content;
}

function ava_test_init() {
    wp_enqueue_script('glMatrix-0.9.5.min.js', plugins_url('/js/glMatrix-0.9.5.min.js', __FILE__));
    wp_enqueue_script('webgl.js', plugins_url('/js/webgl.js', __FILE__));
}

function footerEvent() {
    ?>
    <script type='text/javascript'>
        document.body.onload = webGLStart();
    </script>
    <?php
}

add_action('wp_enqueue_scripts', 'ava_test_init');
add_action('wp_footer', footerEvent);
add_shortcode('sp_stub', 'Canvas');
?>