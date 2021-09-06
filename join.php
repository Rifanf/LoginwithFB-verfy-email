<?php
	namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Models\ForgetModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


		require 'vendor\PHPMailer\PHPMailer\src\PHPMailer.php';
		require 'vendor\PHPMailer\PHPMailer\src\SMTP.php';
		require 'vendor\PHPMailer\PHPMailer\src\POP3.php';
		require 'vendor\PHPMailer\PHPMailer\src\OAuth.php';
		require 'vendor\PHPMailer\PHPMailer\src\Exception.php';

	// Load composer's autoloader
	require 'vendor/autoload.php';

	if(isset($_POST['register'])){
		$name1 = $_POST['nama1'];
		$name2 = $_POST['nama2'];
		$names = $name1." ".$name2;
		$email = $_POST['email'];
		$password = $_POST['psw'];

	// instatiaton and passing `true` enables exception
		$mail = new PHPMailer(true);
		// $mail = new PHPMailerOAuth();

		try{
			// Enable verbose debug output
			$mail->SMTPDebug = 2; //SMTP::DEBUG_SERVER;
			// Send using SMTP
			$mail->isSMTP();
			$mail->CharSet = 'UTF-8';
			// Set the SMTP server to send through
			$mail->Host = 'smtp.gmail.com';
			// Enable SMTP authentication
			$mail->SMTPAuth = true;
// $mail->SMTPAutoTLS = false;
			// SMTP Username
			$mail->Username = $email;
			// SMTP Password
			$mail->Password = $password;
			// Enable TLS encryptioin
			// $mail->SMTPSecure = false;
			$mail->SMTPSecure = 'tls';//PHPMailer::ENCRYPTION_SMTPS;
			$mail->SMTPOptions = array(
            'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
            )
          );

			// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above;
			$mail->Port = 587;
			// Recipients
			$mail->setFrom('email@gmail.com','adnan-tech.com');
			// Add a recipent
			$mail->addAddress($email, $names);
			// set email format to html
			$mail->isHTML(true);
			if (version_compare(PHP_VERSION, '5.6.0') >= 0){ 
			$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 
				'verify_peer_name' => false, 'allow_self_signed' => true, ), );
			 }
			$verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
			$mail->Subject = 'Email verification';
			$mail->Body = "<p>Your verification code is : 
			<b>$verification_code</b</p>";
			$mail->send();
			// echo `message has been sent`
			$encrypted_password = password_hash($password, PASSWORD_DEFAULT);
			// Connect with database
			$conn = mysqli_connect('localhost','root','','foto');
			$sql = "INSERT INTO user VALUES('','$names','$email','$encrypted_password','$verification_code','NULL')";
			$result = mysqli_query($conn,$sql);
			// mysqli_fetch_assoc($result);
			echo "<script>alert('data berhasil disimpan')</script>";
			header("location:user.php?email=".$email);
			exit();
		} catch(Exception $e){
			echo "<script>alert('gmail tidak terkirim. gmail error : {$mail->ErrorInfo}')</script>";
		}



	}
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
	      	overflow: hidden;
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
        <div style="width: 100%; height: 44px; background: #3C5A99; border-radius: 5px; text-align: center;">
        	<img src="img/fb2.png" width="45px" height="35px" style="float: left;margin: 6px ;"><label style="font-weight: 600; margin-left: -40px; color: white; line-height: 2.5">Login with facebook</label>

        </div>
      </div>
        	<p style="text-align: center;">OR</p>
        	<div class="container">
	        	<form>
	        		<input type="" name="" class="form-control" placeholder="Email">
	        		<input type="" name="" class="form-control mt-3" placeholder="Password">
	        		<button type="submit" class="btn btn-primary mt-3" style="width:100%;
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