<?php
//include ('contact2.php');

//Declare variables
//$errName="junk";
if(isset($_POST['submit'])){
   $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $human=intval($_POST['human']);

   

    if(!$_POST['name']){
        $errName="Please enter your name";
    }
    
    if(!$_POST['email']){
        $errEmail="Please enter your email";
    }
    
    if(!$_POST['message']){
        $errMessage="Please enter your message";
    }
    
    if($_POST['human'] != 18){
        $errHuman="Please enter your answer for 9 + 9";
    }



    if(!$errName && !$errEmail && !$errMessage && !$errHuman){
        $from = "Demo Contact Form";
        $to = "gmj1@pct.edu";
        $subject = "Message from Demo Contact Form";
        $body = "From: $name\n
             Email: $email\n
             Message: $message";
        mail($to, $subject, $body, $from);
        $result = '<div class="alert alert-success">Thank you!  I will be in touch.</div>';
    }
    else {
        $result = '<div class="alert alert-danger">Sorry, there was an error sending your message.  Please try again later.</div>';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/stylesheet.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container-nav">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="products.html">Products</a></li>
            <li><a href="details.html">Details</a></li>
            <li class="active"><a href="contact.php">Contact</a></li>
            <li><a href="login.php" data-toggle="modal" data-target="#login-modal">Login</a></li>
          </ul>
          <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form>
					<input type="text" name="user" placeholder="Username">
					<input type="password" name="pass" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				  </form>
					
				  <div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
</div>  <!--/.container close -->
<section>
      <div class="container">
        <form class="form-horizontal" role="form" method="post" action="contact.php">
          <div class="form-group">
              <h1>Contact Us</h1>
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" id="name"
                     
                     value="<?php if(isset($_POST['name'])){echo htmlspecialchars($_POST['name']);} ?>"   
                     
                     > 
              <?php if(isset($errName)){echo "<p class='text-danger'>$errName</p>";}?>
                
            </div>
            </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" id="email" 
                     value="<?php if(isset($_POST['email'])){echo htmlspecialchars($_POST['email']);} ?>   ">
                
                <?php if(isset($errEmail)){echo "<p class='text-danger'>$errEmail</p>";}?>
            </div>
          </div>
          <div class="form-group">
            <label for="message" class="col-sm-2 control-label">Message</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="message" rows="4"></textarea>
                <?php if(isset($errMessage)){echo "<p class='text-danger'>$errMessage</p>";} ?>
            </div>
          </div>
          <div class="form-group">
            <label for="human" class="col-sm-2 control-label" value="<?php if(isset($_POST['human'])){echo htmlspecialchars($_POST['human']);} ?>   ">9 + 9 = ?</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="human" id="human" placeholder="Your Answer" value="<?php if(isset($_POST['email'])){ echo htmlspecialchars($_POST['human']);} ?>   ">
                <?php if(isset($errHuman)){echo "<p class='text-danger'>$errHuman</p>";} ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="input" name="submit" class="btn btn-default">Send</button>
            </div>
          </div>
          <div class="form-group">    
            <div class="col-sm-offset-2 col-sm-10">
               <!-- Will be used to display an alert to the user -->  
                <?php if(isset($result)){echo "$result";} ?>
            </div>
          </div>  
        </form>
      </div>
    </section>
      
      <div class="row">
          <div class="social-contact">
          <div class="col-xs-4"><h2>Personal Contact Info</h2>
          <ul class="contact-list">
              <li class="glyphicon glyphicon-phone"> Cell Phone: (717) 556-2078</li>
              <li class="glyphicon glyphicon-home"> Home Phone: (717) 693-4092</li>
              <li class="glyphicon glyphicon-envelope"> Email: gmj1@pct.edu</li>
              </ul>
            </div>
      </div>
    </div>
            <br>
      <div class="container-footer">
          <div class="footer"> 
              <div class="row">
                  <div class="col-xs-12 col-md-8"><p>COPYRIGHT © 2015 - 2015 GARRETTMICHAELJOHNSON - ALL RIGHTS RESERVED.</p></div>
                  <div class="col-xs-6 col-md-4"><p>Social Media</p></div>
               </div>
         </div>  
      </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>