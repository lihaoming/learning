<?php
session_start();

include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
$c = new SaeTClientV2(WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
$obj =  $c->home_timeline()[0];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新浪微博PHP SDK V2版 Demo - Powered by Sina App Engine</title>
</head>

<body>
<form action="/post" method='post'>
	<input type="text" name="text" style="width:300px" />
	
		<input type="submit" />
</form>
<br>

</body>
</html>
