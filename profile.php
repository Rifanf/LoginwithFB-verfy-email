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
      body{
        overflow: hidden;
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
          grid-template-columns: auto auto auto 
          ;
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
      *{
        font-family: Poppins;
        font-weight: 200;
      }
      li{
        padding: 10px;
        margin-left: 20px;
      }
      a{
       padding: 20px;
        margin-left: 10px; 
      }
      .carii{
        width: 100%; height: 45px; padding-left: 14px; height: 60px; border-radius: 10px; border: none;
      }
      .texts{
        color: white; font-size:40px; text-align: left; margin-top: 23%;  font-family: poppins
      }
      .input{
        height: 50px; font-size: 20px; width: 230%; float: left; padding: 0; margin: 0; padding-left: 20px;
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
      .user_text{
        text-align: center;
        font-size: 19px;
        font-weight: 400;
        color: white;
      }
    </style>
  </head>
  <body>
    <nav id="navbar" class="navbar sticky-top navbar-expand-lg navbar-dark" style="background: #232a34; position: fixed; width: 100%; font-size: 20px; font-weight: 700; padding-top: 7px;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" style="">Brand</a>
      
        <form>
          <input id="cario" class="input" type="text" class="form-control" name="" placeholder="Search for free photos" style="border-radius: 6px">
        </form>
    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="user.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="kategori.php">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Profile</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link btn btn-outline-primary" href="upload.php" style="width: 80px;margin-top: 6px;">Upload</a>
            </li>
             <li class="nav-item">
              <a class="nav-link " href="profile.php">
                <img src="img/btn.svg" width="35px" height="35px">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid" style="position: absolute; z-index: -2;
     background: black; width: 100%; height: auto; filter: blur(4px); " >
        <div class="main">
          <div class="gallery">
                

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
                  
                </div>
        </div>
        
    </div>


      <div class="container-fluid" style="width: 100%">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4" style=" height: 280px; margin-top:100px; background:radial-gradient(circle,royalblue,#3C5A99);">
            <div class="profile" 
             >
                <center>
                  <img src="img/6.jpg" width="100px" height="100px" style="border-radius: 100%; margin-top: 40px; ">
                </center>
                <p style="color: white; font-weight: 300; text-align: center; margin-top: 10px; font-size: 19px">Rifan fauzi
                </p>
                
                <div class="row">
                  <div class="col-md-6">
                    <p style="text-align: center; font-size: 19px; font-weight: 400; color: white;" >
                      233 <br>follows
                    </p>
                  </div>
                  
                  <div class="col-md-6">
                    <p style="text-align: center; font-size: 19px; font-weight: 400; color: white;">
                      523 <br>following
                    </p>
                  </div>
                </div>
              </div>
            </div>
          <div class="col-md-4"></div>
        </div>
          <div class="row" style=" ">
          <div class="col-md-4"></div>
          <div class="col-md-4" style="height: auto; background: white">
              <br>
          <table style="width: 100%" cellpadding="15px" >
            <tr style="border-bottom: 1px solid rgba(200,200,200,.5); ">
              <td style="width: 40px;">
                <img src="img/user.svg" width="20px" height="20px"  style="opacity: .4"></td>
              <td style="float: left; margin-left: 10px">Edit Biodata</td>
              <td></td>
              <td><img src="img/arrow.svg" style="opacity:.4;float: right
              ;transform: rotateY(180deg); width: 20px; height: 20px"></td>
            </tr>

            <tr style="border-bottom: 1px solid rgba(200,200,200,.5);">
              <td style="width: 40px; padding-bottom: 17px;">
                <img src="img/gall.svg" width="20px" height="20px" style="opacity: .4"></td>
              <td style="float: left; margin-left: 10px">Shots</td>
              <td><p style="float: right;">43</p></td>
              <td style="width: 25px"><img src="img/arrow.svg" style="opacity:.4;float: right
              ;transform: rotateY(180deg); width: 20px; height: 20px"></td>
            </tr>

             <tr style="border-bottom: 1px solid rgba(200,200,200,.5);">
              <td style="width: 40px; padding-bottom: 17px;">
                <img src="img/padlock.svg" width="20px" height="20px" style="opacity: .4"></td>
              <td style="float: left; margin-left: 10px">Change password</td>
              <td><p style="float: right;"></p></td>
              <td style="width: 25px"><img src="img/arrow.svg" style="opacity:.4;float: right
              ;transform: rotateY(180deg); width: 20px; height: 20px"></td>
            </tr>

             <tr style="border-bottom: 1px solid rgba(200,200,200,.5);">
              <td style="width: 40px; padding-bottom: 17px;">
                <img src="img/power.svg" width="20px" height="20px" style="opacity: .4"></td>
              <td style="float: left; margin-left: 10px">Logout</td>
              <td><p style="float: right;"></p></td>
              <td style="width: 25px"><img src="img/arrow.svg" style="opacity:.4;float: right
              ;transform: rotateY(180deg); width: 20px; height: 20px"></td>
            </tr>
          </table>
          </div>
          <div class="col-md-4"></div>
      </div>
    </div>
    
  
  <script type="text/javascript">
    
  </script>

<!-- Bootsrtap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  </body>
</html>