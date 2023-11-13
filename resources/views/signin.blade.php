<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Shadai Login</title>
    <link rel="stylesheet" href="{{ asset( 'style.css' )}}">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
  <body>
    <div class="container">
      <div class="cover">
        <div class="front">
          <img src="{{ asset( 'img/2942004.jpg' )}}" alt="">
          <div class="text">
            <span class="text-1">Welcome Back to<br> Shadai Home Health Services</span>
            
          </div>
        </div>
        <div class="back">
          <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
          <div class="text">
            <span class="text-1">Complete miles of journey <br> with one step</span>
            <span class="text-2">Let's get started</span>
          </div>
        </div>
      </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login</div>
        <form method="post" action="">
         @csrf
          <div class="input-boxes">
            <div class="input-box">
              <i class="fas fa-user"></i>
              <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="button input-box">
              <input type="submit" value="Submit">
            </div>
            <div class="text sign-up-text">Don't have an account? <a href="signup">Sigup now</a></div>
          </div>
      </form>
    </div>
    </div>
    </div>
    </div>
  </body>
</html>