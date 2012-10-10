<?php

/*
 * plugin name: Facebook Share Button
 * description: It uses latest Javasscript sdk to create a share button
 * author: Mahibul Hasan
 * */

define('FBShare_JSSDK_DIR', dirname(__FILE__));
define('FBShare_JSSDK_URL', plugins_url('/', __FILE__));

include FBShare_JSSDK_DIR . '/classes/fb-share.php';
FB_Share_With_JSSDK::init();

include FBShare_JSSDK_DIR . '/classes/options-page.php';
FB_Share_Options_Page::init();