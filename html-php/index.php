<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/signUpLogIn.css" />
    <title>Sign Up/Log In</title>
  </head>
  <body>
    <div class="form">
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active">
          <a class="linkActive" href="#login">Log In</a>
        </li>
      </ul>

      <div class="tab-content">
        <div class="signup">
          <h1>Sign Up for Free</h1>

          <form action="#" enctype="multipart/form-data">
            <div class="top-row">
              <div class="field-wrap">
                <label> First Name<span class="req">*</span> </label>
                <input type="text" name="fname"autocomplete="off" />
              </div>

              <div class="field-wrap">
                <label> Last Name<span class="req">*</span> </label>
                <input type="text"  name="lname"   autocomplete="off"/>
              </div>
            </div>

            <div class="field-wrap">
              <label> Email Address<span class="req">*</span> </label>
              <input type="email" name="email" autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label> Set A Password<span class="req">*</span> </label>
              <input type="password" name="password"  autocomplete="off"/>
            </div>
             
            <div class="field-wrap file">
              <label style="display: none;"></label>
              <input type="file" name="image" />
            </div>

            <button type="submit" name="submit" class="button button-sign-up">
              Get Started
            </button>
          </form>
        </div>

        <div class="login appActive">
          <h1>Welcome Back!</h1>

          <form action="#" enctype="multipart/form-data">
            <div class="field-wrap">
              <label> Email Address<span class="req">*</span> </label>
              <input type="email"  name="email" required autocomplete="off" />
            </div>

            <div class="field-wrap">
              <label> Password<span class="req">*</span> </label>
              <input type="password" name="password" required autocomplete="off" />
            </div>

            <p class="forgot"><a href="#">Forgot Password?</a></p>

            <button type="submit" class="button button-log-in">Log In</button>
          </form>
        </div>
      </div>
    </div>

    <script src="/js/signUpLogIn.js"></script>
    <script src="/js/signUp.js"></script>
    <script src="/js/logIn.js"></script>
  </body>
</html>
