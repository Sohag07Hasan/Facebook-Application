<?php

/*
 * Handles the share button
 * */

class FB_Share_With_JSSDK{
	
	static $post = null;
	
	//contains all the hooks
	static function init(){
		add_action('the_content', array(get_class(), 'include_the_button'));
		add_action('wp_footer', array(get_class(), 'include_fb_sdk'));
		add_action('wp_enqueue_scripts', array(get_class(), 'add_css'));
	}
	
	
	/*
	 * creates the facebook share button
	 * */
	static function include_the_button($content){
		if(is_single()){
			global $post;
			
			//var_dump($post); die();
			
			self::$post = $post;
			$fb_icon = self::get_fb_button();
			$fb_count = self::get_fb_share_count($post->ID);
			
			if(empty($fb_count)) $fb_count = 10;
			
			$string = '<div class="fb-share-button"> 
				
				<div class="fb-share-counter"> ' . $fb_count . ' </div>
				<div class="fb-share-button"> ' . $fb_icon . ' </div>
					
			</div>';
			
			$content .= $string;
		}
		
		return $content;
	}
	
	
	/*
	 * 
	 * */
	static function get_fb_button(){
		$fb_button = FBShare_JSSDK_URL . 'images/button.png';
		$link = "<a href='' onclick='postToFeed(); return false;' > <img src='$fb_button' alt='share' /> </a>";
		return $link;
	}
	
	
	/*
	 *load the facebook sdk asynchronisely 
	 **/
	static function include_fb_sdk(){
		if(self::$post) :
			
			$feed = array(
				'url' => get_permalink(self::$post->ID),
				'image' => wp_get_attachment_url(get_post_thumbnail_id(self::$post->ID)),
				'title' => self::$post->post_title,
				'content' => self::$post->post_content,
				'appid' => FB_Share_Options_Page::get_facebook_app_id()
			);
			
			//var_dump($feed);
		?>
		
		<script>
			var facebook_apId = "<?php echo $feed['appid'];?>";
			var feed_image = "<?php echo $feed['image']?>";				
			var feed_url = "<?php echo $feed['url']?>";
			var feed_title = "<?php echo $feed['title']?>";	
			var feed_content = "<?php echo $feed['content']?>";					
		</script>
			
		<?php 
			
			
			include FBShare_JSSDK_DIR . '/includes/jsSdk.php';
		endif;
	}
	
	
	/*
	 * returns the facebook share counts
	 * */
	static function get_fb_share_count($post_id){
		$link = get_permalink($post_id);
		
		$fql = 'SELECT url, share_count, like_count, comment_count, total_count
        FROM link_stat WHERE url=" ' . $link . ' "';
		
		$json = file_get_contents('https://api.facebook.com/method/fql.query?format=json&query=' . urlencode($fql));
		
		$a = json_decode($json);
		
		return $a[0]->share_count;
	}
	
	
	/*
	 * add the css file
	 * */
	static function add_css(){
		wp_register_style('fb-share-button-counter', FBShare_JSSDK_URL . 'css/style.css');
		wp_enqueue_style('fb-share-button-counter');
	}
}