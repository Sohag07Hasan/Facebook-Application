<?php
/**
 * Controls the Options Page
 * */

class FB_Share_Options_Page{
	
	const fb_app_id = "facebook_application_id";
	
	//contais the hooks
	static function init(){
		add_action('admin_menu', array(get_class(), 'trigger_admin_menu'));
	}
	
	
	//admin menu hooks
	static function trigger_admin_menu(){
		add_options_page('Facebook Share Button', 'Facebook', 'manage_options', 'facebook-options-page', array(get_class(), 'option_page_content'));
	}
	
	
	/*
	 * options page
	 * */
	static function option_page_content(){
		if($_POST['fb-share-form-submitted'] == "Y"){
			update_option(self::fb_app_id, trim($_POST['fb-app-id']));
		}
		
		$appid = self::get_facebook_app_id();
		
		include FBShare_JSSDK_DIR . '/includes/options-page.php';
	}
	
	
	/*
	 * returns the app id
	 * */
	static function get_facebook_app_id(){
		return get_option(self::fb_app_id);
	}
	
}