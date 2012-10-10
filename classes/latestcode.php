<html xmlns="http://www.w3.org/1999/xhtml"
  xmlns:fb="https://www.facebook.com/2008/fbml">
  <head>
    <title>My Feed Dialog Page</title>
  </head>
  <body>
    
    <div id="fb-root"></div>
<script>
    var isLoaded = false; // Our flag
    window.fbAsyncInit = function() {
        FB.init({
          appId      : '455694454474255', // App ID
          channelUrl : 'http://fashionswizard.com/fb/app/index.php', // Channel File
          status     : true, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          oauth      : true, // enable OAuth 2.0
          xfbml      : true  // parse XFBML
        });
 
        // Additional initialization code here
        isLoaded = true;
    };
    // A function that requires calling Facebook
    function postToFeed() {
        // your tasks here
 
        // Facebook call
        if(isLoaded) {
             FB.ui(
               { method: 'feed',
				  link: 'http://www.fashionswizard.com/shoe-1/',
				  picture: 'http://www.fashionswizard.com/wp-content/uploads/2012/09/a-testoni-n-400x250.jpg',
				  name: 'Shoe Model',
				  caption: 'This is a show',
				  description: 'Using Dialogs to interact with users.'
               },
               function(response) {
                 if (response && response.post_id) {
                   alert('Post was published.');
                 } else {
                   alert('Post was not published.');
                 }
               }
             );
        }
    }
 
    // Load the SDK Asynchronously
    (function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     d.getElementsByTagName('head')[0].appendChild(js);
    }(document));
</script>


    
    <p><a id="aweful" onclick='postToFeed(); return false;'>Post to Feed</a></p>
    <p id='msg'></p>
    
    

       
       
       
 
       
       
      <?php
		$fql = 'SELECT url, share_count, like_count, comment_count, total_count
        FROM link_stat WHERE url="http://www.fashionswizard.com/shoe-1/"';
		$json = file_get_contents('https://api.facebook.com/method/fql.query?format=json&query=' . urlencode($fql));
		
		var_dump($json);
      ?>
    
   
  </body>
</html>
