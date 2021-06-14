<?php

define('SITE_URL','http://localhost/p30/cms/');
define('BLOG_URL','http://localhost/p30/cms/blogger/');

define('BASE_PATH','C:/xampp/htdocs/p30/cms/');

define('MESSAGE','<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>');



function site_url($uri = ''){
    return SITE_URL . $uri;
}
function blog_url($uri = ''){
    return BLOG_URL . $uri;
}
