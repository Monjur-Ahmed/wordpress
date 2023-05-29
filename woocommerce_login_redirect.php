<?php

add_action('check_admin_referer', 'logout_without_confirm', 10, 2);
   function logout_without_confirm($action, $result){
      if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
	  $redirect_to = home_url();  
      $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));;
      header("Location: $location");
      die();
    }}

add_filter('woocommerce_login_redirect', 'custom_woocommerce_login_redirect');
function custom_woocommerce_login_redirect($redirect) {
    $redirect = home_url('/user-dashboard/');
    return $redirect;
}

?>
