<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	// require 'PHPMailer\PHPMailerAutoload.php';

		require 'vendor\PHPMailer\PHPMailer\src\PHPMailer.php';
		require 'vendor\PHPMailer\PHPMailer\src\SMTP.php';
		require 'vendor\PHPMailer\PHPMailer\src\POP3.php';
		require 'vendor\PHPMailer\PHPMailer\src\OAuth.php';
		require 'vendor\PHPMailer\PHPMailer\src\Exception.php';
	// use PHPMailer\PHPMailer\Exception;
	require 'vendor/autoload.php';
session_start();
	if(isset($_POST['register'])){

		$email = $_POST['email'];
		$password = $_POST['psw'];
		$name1 = $_POST['nama1'];
		$name2 = $_POST['nama2'];
		$name = $name1." ".$name2;
		$id = $_POST['id'];



		$hash = password_hash($password, PASSWORD_DEFAULT);

		$code = md5($email);


	$mail = new PHPMailer();

	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	$mail->SMTPDebug = 0;
	$mail->Host = 'smtp.gmail.com';	
	$mail->Port = 587;
	$mail->SMTPSecure = 'stl';
	$mail->SMTPAuth = true;
	$mail->Username = 'fauzirifan060@gmail.com';
	$mail->Password = 'rifanfauzi16';
	$mail->From = 'user@domain.com';
	$mail->setFrom('Photograp@web.com', 'Web Verification');
	$mail->addAddress($email, $name);
	$mail->Subject = 'Verification account - Photograp';
	$mail->AltBody = 'Verification account';
	$verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
	//send the message, check for errors
	   
	    $conn = mysqli_connect('localhost','root','','foto');
	    $x = "SELECT * FROM user where email = '$email'";
	   	$rss = mysqli_query($conn, $x);
	    // $rows = mysqli_num_rows($rss);
	   	// $fetch = mysqli_fetch_assoc($rss);
	$body = "Hi,".$name."<br>
		Please Verification your email before acces our website : <br> http://localhost/web/webfoto/user.php?id=".$email;
	$mail->Body = $body;
	    if(mysqli_num_rows($rss)>0){
	    	echo "<script>alert('gmail sudah terdaftar')</script>";
	    	// return false; 
	    	// header('location:join2.php');
	    }else{
	    echo '<script>alert("Check your email")</script>';
	    $query = "INSERT INTO user VALUES('','$name','$email','$hash','$verification_code','')";
	    $rss = mysqli_query($conn,$query);
	    }
	    //Section 2: IMAP

	if (!$mail->send()) {
	    echo "<script>alert('Mailer Error: . $mail->ErrorInfo;')</script>"; 
	} else {
	    //Uncomment these to save your message in the 'Sent Mail' folder.
	    #if (save_mail($mail)) {
	    #    echo "Message saved!";
	    #}
	}
}
	
	if(isset($_POST['sb'])){
		$ema = $_POST['eml'];
		$pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
		$query = "SELECT * FROM user WHERE email = $ema AND password = $pw";
		$res =mysqli_query($conn, $query);
		
	}

	// } tutup if(isset)
  require 'config.php';
  if(isset($_SESSION['access_token'])){
    echo "<script>alert('berhasil login lewat FB')</script>";
  }
  $conn = mysqli_connect('localhost','root','','foto');
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
    	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
	      *{
	        font-family: Poppins;
	        font-weight: 200;
	      }
		  .main{
	        position: relative;
	        height: 100%;
	        width: 100%;
	      }
	      .main .gallery{
	        position: relative;
	        height: auto;
	        width: 100%;
	        margin: auto;
	        padding: 45px 0;
	        display: grid;
	        grid-template-columns: auto auto auto;
	        grid-gap: 2vh;
	        grid-auto-flow: dense;
	      }
	      .main .gallery .img{
	        position: relative;
	        height: 100%;
	        width: 100%;
	        overflow: hidden;
	      }
	      .main .gallery .img:first-child{
	        grid-column-start: span 2;
	        grid-row-start: span 2;
	      }
	      .main .gallery .img:nth-child(2n+3){
	        grid-row-start: span 2;
	      }
	       .main .gallery .img:nth-child(4n+5){
	        grid-column-start: span 2;
	        grid-row-start: span 2;
	      }
	       .main .gallery .img:nth-child(6n+7){
	        grid-row-start: span 1;
	      }
	       }
	       .main .gallery .img:nth-child(8n+9){
	        grid-column-start: span 1;
	        grid-row-start: span 1;
	      }
	      .main .gallery .img img{
	        height: 100%;
	        width: 100%;
	        object-fit: cover;
	      }
	      img{
	      	border-radius: 10px;
	      }
	      body{
	      	overflow: auto;
	      }
    </style>
    <title>Join</title>
  </head>
  <body>
	<nav class="navbar navbar-light bg-light" style="border-bottom: 1px solid rgba(100,100,100,.1); position: fixed; width: 100%; z-index: 2;">
  		<div class="container-fluid">
	  		<div class="row" style="width: 100%">
	  			<div class="col-md-6">
	  				<a href="index.php">
	  					<img src="img/arrow.svg" width="20px" height="20px" style="float: left; margin-left: 10px; margin-top: 10px">
	  					
	  				</a>
				    <a class="navbar-brand" href="#" style="float:right;"> 
			  			Brand
				    </a>
	  			</div>
	  			<div class="col-md-6">
				    <div style="float:right;">
					   <label style="opacity: .6">have account ? </label>
					    <button class="btn btn-outline-primary" style="margin-left: 7px" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign in</button>
				    </div>
	  			</div>
	  		</div>
  		</div>
	</nav>
	<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h2 class="modal-title" id="exampleModalLabel" style="text-align: center; margin-top: 30px">Welcome Back To Photograp</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<a href="<?=$login_url; ?>">
	        <div style="width: 100%; height: 44px; background: #3C5A99; border-radius: 5px; text-align: center;">
	        	<img src="img/fb2.png" width="45px" height="35px" style="float: left;margin: 6px ;"><label style="font-weight: 600; margin-left: -40px; color: white; line-height: 2.5">Login with facebook</label>

	        </div>
      	</a>
      </div>
        	<p style="text-align: center;">OR</p>
        	<div class="container">
	        	<form action="" method="">
	        		<input type="text" name="eml" class="form-control" placeholder="Email">
	        		<input type="password" name="pw" class="form-control mt-3" placeholder="Password">
	        		<button type="submit" name="sb" class="btn btn-primary mt-3" style="width:100%;
	        		height: 43px;">Login</button>
	        		<br>
	        	</form>
        	</div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>


	<br>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5" style="overflow: auto; ; height: 100%;">
				<h1 style="text-align: center; margin-top: 100px">Join the Photograp <br> community</h1>
				<p style="text-align: center; opacity: .8">Take your photography to the next level. Get <br> it seen by millions.</p>
				
				 <a href="<?=$login_url; ?>">
					<div class="fb" style="width: 440px; height: 50px; background:#3C5A99;
						 border-radius: 6px; text-align: center; font-weight: 400; color: 
						white; line-height: 3.3; margin: 0 auto">
						<img src="img/fb.png" width="50px" height="40px"; style="float: left; margin-left: 10px; margin-top: 5px">
						<b style="margin-left: -50px">Join with Facebook</b>
					</div> 
				 </a>

				
					<br>
					<p style="opacity: .6; text-align: center;">OR</p>
					
					<div class="container" style="">
						<div class="row">
							<div class="col-md-6">
								<form action="" method="post">
									<input type="hidden" name="id">

									<input type="text" class="form-control" name="nama1" placeholder="First name"></input>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nama2" placeholder="Last name (optional)"></input>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input class="form-control mt-4" type="text" name="email" placeholder="Email">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input class="form-control mt-4" type="password" name="psw" placeholder="Password">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-primary mt-4" style="width: 100%" name="register">Create new account</button>
								</form> <br><br>
							</div>
						</div>

					</div>
			</div>
			<div class="col-md-7" style="">
				<div class="main">
					<div class="gallery">
	                <div class="img">  
	                  <img src="img/1.jpg" id="gambars" data-bs-toggle="modal" data-bs-target="#exampleModal">
	                </div>

	                <div class="img">  
	                  <img src="img/2.png">
	                </div>
	                
	                <div class="img">  
	                  <img src="img/3.jpg">
	                </div>
	                
	                <div class="img">  
	                  <img src="img/4.jpg">
	                </div>
	                
	                <div class="img">  
	                  <img src="img/5.jpg">
	                </div>
	                
	                <div class="img">  
	                  <img src="img/6.jpg">
	                </div>
	                
	                <div class="img">  
	                  <img src="img/7.jpg">
	                </div>
	                
	                <div class="img">  
	                  <img src="img/8.jpg">
	                </div>
	                
	                <div class="img">  
	                  <img src="img/9.jpg">
	                </div>
	              </div>
				</div>
					
				</div>

		</div>
	</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  </body>
</html>