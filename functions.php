<?php

//require_once( WP_CONTENT_DIR . '/doctor/test_include.php');
load_template(TEMPLATEPATH . '/model/wp_database.php');
load_template(TEMPLATEPATH . '/model/DoctorDB.php');

function bootstrapstarter_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    $dependencies = array('bootstrap');
    wp_enqueue_style( 'bootstrapstarter-style', get_stylesheet_uri(), $dependencies ); 
}

function bootstrapstarter_enqueue_scripts() {
	//wp_enqueue_script('jquery_js','https://code.jquery.com/jquery-3.2.1.slim.min.js');
	
	wp_enqueue_script( 'pooper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js');
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '3.3.6', true );
	
	wp_enqueue_script('bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js');
	

}

add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_scripts' );
function agmd_files(){

  wp_register_style('agmd-style', get_template_directory_uri() . '/css/agmd-style.css' );
  wp_enqueue_script('agmd-js',get_theme_file_uri('/js/agmd-scripts.js',array('jquery')),
  NULL,      //js has dependecy on other js
  microtime(),     //version: uing php function so it doesn't cache
  true);     //load before closing body tag


  wp_enqueue_style('university_main_style', 
    get_stylesheet_uri(),
    NULL,    //NO DEP
    microtime()   //Avoid caching
  );
}
add_action('wp_enqueue_scripts','agmd_files');

function agmd_features(){
  // This will display the menu option in the wordpress admin dashboard
  // register_nav_menu('headerMenuLocation', 'Header Menu Location');
  // register_nav_menu('footerLocationOne', 'Footer Location One');
  // register_nav_menu('footerLocationTwo', 'Footer Location Two');

  // Add feature for theme
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'agmd_features');


function get_doctor() {

//echo "get_doctor: Hello From functions.php";
$doctorDB = new DoctorDB();
$state = $_POST['state'];


// if(!$conn){	
//   $conn = get_connection();	
// }  


$results = $doctorDB->get_wp_DoctorByState($state);
echo $results;



// $results = doctor_state_list ();
// echo $results;



//$state = $_POST['state'];
//echo "<h2>" . $state ."</h2>";


die(); 
}

add_action('wp_ajax_get_doctor', 'get_doctor');
add_action('wp_ajax_nopriv_get_doctor', 'get_doctor');

function php_function() {
    echo 'Hello World';
    // Some interesting server side stuff
	die();

}

add_action('wp_ajax_nopriv_test_response_php', 'php_function');
add_action('wp_ajax_test_response_php', 'php_function');

add_action('wp_head', 'myplugin_ajaxurl');

function myplugin_ajaxurl() {
    echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}

wp_enqueue_script('jquery');

//test
// The Javascript
?>
<?php function get_state_data(){ ?>
 
<script>
jQuery(document).ready(function($) {
   var data = {
	type:   'post',
    'action': 'get_doctor', 'state': 'AZ'
  };
  $.post( ajaxurl, data, function( response ) {
      //alert( 'Got this from the server: ' + response );
	  //alert($(response).val());
	  $('div#table_ak').append(response);
  });
   
              
});
</script>
<?php } ?>
 
 <?php
//add_action('in_admin_footer', 'get_state_data');
add_action('wp_ajax_get_state_data', 'get_state_data');
add_action('wp_ajax_nopriv_get_state_data', 'get_state_data');

?>