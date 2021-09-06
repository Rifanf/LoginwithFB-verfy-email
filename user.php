<?php 
 session_start();
 $conn = mysqli_connect('localhost','root','','foto');

 $email = (isset($_GET['email']) ? $_GET['email'] : null);
 // $query = ;
 $rss = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email'");


 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>User</title>
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
      *{
        font-family: Poppins;
        font-weight: 200;
      }

      .banner{
        position: relative;
        width: 100%;
        height:84vh;
        background: url(img/home_img/1.jpg);
        background-size: cover;
        filter: brightness(.5);
      }
      li{
        padding: 10px;
        margin-left: 20px;
      }
      a{
       padding: 20px;
        margin-left: 10px; 
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
        grid-template-columns: auto auto auto auto;
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
      .carii{
        width: 100%; height: 45px; padding-left: 14px; height: 60px; border-radius: 10px; border: none;
      }
      .texts{
        color: white; font-size:40px; text-align: left; margin-top: 23%;  font-family: poppins
      }
      .input{
        height: 50px; font-size: 20px; width: 230%; float: left; padding: 0; margin: 0; padding-left: 20px; opacity: 0;
        border: rgba(100,100,100,0.3) 1px solid;
      }

      .img{
        cursor: pointer;
      }
      @media only screen and (max-width:1333px){
          .input{
            width: 200%;
          }
        }
         @media only screen and (max-width:1234px){
          .input{
            width: 160%;
          }
        }
         @media only screen and (max-width:1124px){
          .input{
            width: 120%;
          }
        }
         @media only screen and (max-width:1063px){
          .input{
            width: 80%;
          }
        }
         @media only screen and (max-width:990px){
          .input{
            margin-left: -40px;
            float: left;
            width: 740px;
          }
          .navbar-toggler{
            margin-right: 20px;
          }
        }
        @media only screen and (max-width:905px){
          .input{
            margin-left: -40px;
            float: left;
            width: 600px;
          }
          .navbar-toggler{
            margin-right: 20px;
          }
        }
        @media only screen and (max-width:802px){
          .input{
            margin-left: -40px;
            float: left;
            width: 400px;
          }
          .navbar-toggler{
            margin-right: 20px;
          }
        }
        @media only screen and (max-width:617px){
          .input{
            margin-left: -40px;
            float: left;
            width: 300px;
          }
          .navbar-toggler{
            margin-right: 20px;
          }
        }
        @media only screen and (max-width:517px){
          .input{
            margin-left: -40px;
            float: left;
            width: 200px;
          }
          .navbar-toggler{
            margin-right: 20px;
          }
        }
        @media only screen and (max-width:399px){
          .input{
            margin-left: -40px;
            float: left;
            width: 100px;
          }
          .navbar-toggler{
            margin-right: 20px;
          }
        }
      @media only screen and (max-width:770px){
        .free{
          position: absolute;
        }
        .main .gallery{
          display: grid;
          grid-template-columns: auto auto auto;
        }
        .texts{
          font-size: 35px;
          margin-left: 7%;
        }
        .carii{
          width: 90%;
          align-items: center;
          margin-left: 7%;
        }
        .links{
          margin-left: 7%;
        }

      @media only screen and (max-width:430px){
        .main .gallery{
          display: block;
        }
        .main .gallery .img{
          display: block;
          width: 100%;
          height: 100%;
          margin: 3% 0;
        }
        .texts{
          font-size: 27px;
          margin-left: 2%;
          margin-top:40%;
        }
        .carii{
          width: 95%;
          align-items: center;
          margin-left: 2%;
        }
        .links{
          margin-left: 2%;
        }

      }
      .scrol{
        width: 100%;
        height: 40px;
        background: black;
      }
      .tags .kotak{
        width: 80px;
        height: 60px;
        border: 1px solid rgba(100,100,100,.6);
        display: inline-block;
        background: red;
      }
    </style>
  </head>
  <body>
    <nav id="navbar" class="navbar sticky-top navbar-expand-lg navbar-dark" style="background: none; position: fixed; width: 100%; font-size: 20px; font-weight: 700; padding-top: 7px;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" style="">Brand</a>
      
        <form>
          <input type="hidden" name="email">
          <input id="cario" class="input" type="text" class="form-control" name="" placeholder="Search for free photos" style="border-radius: 6px">
        </form>
    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <!-- <?php while($row = mysqli_fetch_assoc($rss)): ?> -->
             <li class="nav-item">
              <a class="nav-link" aria-current="page" href="kategori.php">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="profile.php?code=<?=$row['email']; ?>">Profile</a>
            </li>
          <!-- <?php endwhile; ?> -->
            <li class="nav-item active">
              <a class="nav-link btn btn-outline-primary" href="upload.php" style="width: 80px;margin-top: 6px;">Upload</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="logout.php" 
              onclick="return confirm('Are you sure you want a logout?')">
                <img src="img/btn.svg" width="35px" height="35px">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  
  <section class="banner" style="position: absolute; z-index: -1">
  </section>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-7">
      <center>
        <p>
          <h1 class="texts" style="">
            The best free stock photos & videos <br> shared by talented creators.
          </h1>
        </p>
      </center>
      
      <form>
        <input type="text" name="form-control" placeholder="Search for free photos and videos " class="carii">
      </form>
      
      <p class="links" style="color: white; font-weight: 2s00; margin-top: 5px;">Suggested : asds, ,asd ,asd</p>
    </div>
    <div class="col-md-2"></div>

  </div>



  <div class="container-fluid" style="margin-top: 200px; margin-bottom: 20px">
    <div class="main">
      <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-3">
          <h3 class="free">Free stock photo</h3>
        </div>
        <div class="col-md-9">
          <div class="dropdown" style="float: right; text-align: left" >
            <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              Trending

            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Trending</a></li>
              <li><a class="dropdown-item" href="#">New</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Popup -->
      <!-- Button trigger modal -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
                <div style="width: 60px; height: 60px; border-radius: 100%; background: lightgreen;"></div>
              <div class="wadah" style=" width: 100%">
                  <button class="btn btn-primary" style="float: right; margin-right: 25px">
                  Free Download <img src="img/download.svg" width="16px" height="16px" style="margin-left: 5px;">
                </button>
                  <button class="btn btn-outline-primary" style="float: right; margin-right: 15px;">
                    <img src="img/heart.svg" width="20px" height="20px" style="margin-right: 5px;"> 311 Likes
                  </button>
                  <b style="margin-left: 15px">Rifan fauzi</b>
                  <button style="margin-left: 15px" class="btn btn-outline-primary">Follow</button>
                  <p style="margin-left: 15px; ">467 Folowers</p>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right: -65px; margin-top: -100px;border:4px solid red; border-radius: 100%;"></button>
            </div>
            <div class="modal-body">
              <center>
                <img src="img/1.jpg" class="img">
                <p style="margin-top: 15px;">
                  <img src="img/vis.svg" width="20px" height="20px" style="opacity: .6">
                  <label style="margin-left: 5px; margin-right: 20px">233K views</label> 
                  <img src="img/download.svg" width="15px" height="15px" style="opacity: .6">
                  <label style="margin-left: 5px;">123k downloads</label></p>
              </center>
              <h3>Similiar Photos</h3> 
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
          <button style="width: 100%; margin-top: 15px; background: lightgray; box-shadow: -10px -10px -10px whitesmoke; " class="btn">Load more</button>
          
            </div>
            
          </div>
        </div>
      </div>

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
  <script type="text/javascript">
    window.addEventListener("scroll",function(){
      var nav = document.querySelector("nav");
      var z =  document.getElementById('navbar');
      var cari =  document.getElementById('cario');
      if(window.scrollY>320){
        z.style.background="#232a34";
        z.style.transition=".3s";
        z.style.height="80px";
        z.style.border="none";
        z.style.paddingTop="7px";
        z.style.dropShadow="none";
        cari.style.opacity="1";
      }else if(window.scrollY<=320){
        cari.style.opacity="0";
        z.style.paddingTop="7px";
        z.style.transition=".3s";
        z.style.background="none";
        z.style.height="60px";

      }
    });
  
  </script>

<!-- Bootsrtap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  </body>
</html>