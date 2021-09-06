
<?php 
	require_once __DIR__ . '/vendor/autoload.php';
	$fb = new \Facebook\Facebook([
	  'app_id' => '582782562878919',
	  'app_secret' => '6dda38f70a2f15f8a985f8bd53f8f4b7',
	  'default_graph_version' => 'v2.10',
  //'default_access_token' => '{access-token}', // optional
	]);
	$helper = $fb->getRedirectLoginHelper();

	$login_url = $helper->getLoginUrl("http://localhost/web/webfoto/user.php");
	
	try{
		$accesstoken = $helper->getAccessToken();
		if(isset($accesstoken)){
			$_SESSION['access_token'] = (string)$accesstoken;
			header('location:user.php');
		}
	}catch(Exception $exc){
		echo $exc->getTraceAsString();
	}
 ?>