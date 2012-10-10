<div id="fb-root"></div>
<script>

var feed_image = "<?php echo $feed['image']?>";	

    var isLoaded = false; // Our flag
    window.fbAsyncInit = function() {
        FB.init({
          appId      : facebook_apId, // App ID
          channelUrl : feed_url, //echo $url; ?>', // Channel File
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
        
 //	alert(feed_image);
        // Facebook call
        if(isLoaded) {
           
            
             FB.ui(
               { method: 'feed',
				  link: feed_url,
				  picture: feed_image,
				  name: feed_title,
				  caption: feed_url,
				  description: feed_content
               },
               function(response) {
                 if (response && response.post_id) {
                   alert('Post was published.');
                   var count = parseInt(document.getElementsByClassName("fb-share-counter")[0].innerHTML);
                   new_count = count + 1;
                   document.getElementsByClassName("fb-share-counter")[0].innerHTML = new_count;
                   
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
