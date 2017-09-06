<?php
// preheader
function sp_stub_preheader() 
{
	if( !is_admin() ) 
	{
		global $post, $current_user;
	
		if( !empty($post->post_content) && strpos ($post->post_content, '[sp_stub]') !== false )
		{
			echo ' Put your preheader code here';
		}

	}
}

// add_action( 'wp', 'sp_stub_preheader', 1);

// shortcode [sp_stub]
function sp_stub_shortcode() 
{
	ob_start();
	?>
	<p>Hello this is sp_stub_shortcode</p>
	<?php
	$temp_content = ob_get_contents();
	ob_end_clean();

	return $temp_content;
}

function initWebGL($canvas)
{
    $gl = NULL;
    $msg = 'Your browser does not support WebGL or it is enabled by default.';
    
    try {
    //    gl = $canvas.getContext
        
    } catch (Exception $ex) {
        
    }
            

}

add_shortcode('sp_stub', 'printmsg');

?>
