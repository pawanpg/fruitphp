<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="./dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="./plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        function validateForm() 
        {
            var name = document.forms["myForm"]["name"].value;
            if (name == "") 
            {
              document.getElementById("nameerr").innerHTML="Name must be filled out";
              //document.getElementById("name").style.background="Red";
              return false;
            }
            var email = document.forms["myForm"]["email"].value;
            if (email == "") 
            {
              document.getElementById("emailerr").innerHTML="Email must be filled out";
              //document.getElementById("email").style.background="Red";
              return false;
            }


        }
    </script> 


  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="./index.php"><b>FRUIT</b>Bazar</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
      <?php  if(isset($_GET['msg']))
          {
            echo '<span style="color:red;">'.$_GET['msg']. '</span>';
          }

        $name=$email=$password= "";
        $nameerr=$emailerr=$passerr=$cpasserr="";
        if(isset($_GET['name']))
          $name=$_GET['name'];
        if(isset($_GET['email']))
          $email=$_GET['email'];
       // if(isset($_GET['password']))
       //   $gender=$_GET['password']; 
        if(isset($_GET['nameerr']))
          $nameerr=$_GET['nameerr'];
        if(isset($_GET['emailerr']))
          $emailerr=$_GET['emailerr'];
        if(isset($_GET['passerr']))
          $passerr=$_GET['passerr'];
        if(isset($_GET['cpasserr']))
          $cpasserr=$_GET['cpasserr'];
        ?>



        <form action="checkregister.php" name="myForm" id="myForm" method="post">
           <span id="nameerr" style="color:red;"><?php echo $nameerr; ?></span>
          <div class="form-group has-feedback" >
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $name;?>"   placeholder="Full name"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          

          <span id="emailerr"  style="color:red;"><?php echo $emailerr; ?></span>
          <div  class="form-group has-feedback">
            <input type="text" class="form-control" name="email" id="email" value="<?php echo $email;?>" placeholder="Email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <span style="color:red;"><?php echo $passerr; ?></span>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
            <span style="color:red;"><?php echo $cpasserr; ?></span>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password2" id="password2"  placeholder="Retype password"/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div> 
                </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" id="reg" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>    

      <!--  <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
        </div> -->

        <a href="login.php" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.3 -->
    <script src="./plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="./	bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="./plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>