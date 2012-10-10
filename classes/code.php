<html xmlns="http://www.w3.org/1999/xhtml"
  xmlns:fb="https://www.facebook.com/2008/fbml">
  <head>
    <title>My Feed Dialog Page</title>
  </head>
  <body>
    <div id='fb-root'></div>
    <script src='http://connect.facebook.net/en_US/all.js'></script>
    <p><a onclick='postToFeed(); return false;'>Post to Feed</a></p>
    <p id='msg'></p>

    <script> 
      FB.init({appId: "455694454474255", status: true, cookie: true});

      function postToFeed() {

        // calling the API ...
        var obj = {
          method: 'feed',
          link: 'http://www.fashionswizard.com/shoe-1/',
          picture: 'http://www.fashionswizard.com/wp-content/uploads/2012/09/a-testoni-n-400x250.jpg',
          name: 'Shoe Model',
          caption: 'This is a show',
          description: 'Using Dialogs to interact with users.'
        };

        function callback(response) {
          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }

        FB.ui(obj, callback);
      }
      
       </script>
       
      <?php
		$fql = 'SELECT url, share_count, like_count, comment_count, total_count
        FROM link_stat WHERE url="http://www.fashionswizard.com/shoe-1/"';
		$json = file_get_contents('https://api.facebook.com/method/fql.query?format=json&query=' . urlencode($fql));
		
		var_dump($json);
      ?>
    
   
  </body>
</html>
