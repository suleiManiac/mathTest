<?php

require_once('../private/initialize.php');
?>

<?php
  if (is_request_post()) {
    if(isset($_POST['login'])) {
      $username = $_POST['email'];
      $password = $_POST['password'];

      $result = get_user_for_login($db, $username, $password);
      if (!$result) {
        redirect_to(url_for('login.php'));
      }
      $user = mysqli_fetch_assoc($result);

      session_start();
      $_SESSION['email'] = $user['email'];
      $_SESSION['user_type'] = $user['user_type'] === 1 ? "admin" : "normal" ;
      $_SESSION['name'] = $user['first_name'];
      $_SESSION['user_id'] = $user['id'];

      redirect_to(url_for("index.php"));
    }
    else if (isset($_POST['signup'])) {
      echo "Signing up!!";
    }
  } 

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Signin Template · Bootstrap</title>

  
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo url_for('css/bootstrap.min.css');?>">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo url_for('css/signin.css');?>">
  
</head>
<body class="text-center">
  <div class="container" id="loginForm">
  <form class="form-signin" action="login.php" method="POST">
    <img class="mb-4" src="<?php echo url_for('img/bootstrap-solid.svg');?>" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
    <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
    <button class="btn btn-lg btn-primary" type="submit" name="login">Log In</button>
    <button class="btn btn-lg btn-primary" type="button" id="register">Sign Up</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form>
  </div>


  <div class="container" id=regForm>
  <form class="form-signin" action="login.php" method="POST">
    <img class="mb-4" src="<?php echo url_for('img/bootstrap-solid.svg');?>" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please Fill The Form to Register</h1>
    <label for="reginputEmail" class="sr-only">Email address for registration</label>
    <input type="email" id="reginputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="reginputPassword" class="sr-only">Password</label>
    <input type="password" id="reginputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
      
    </div>
    <button class="btn btn-lg btn-primary" type="button" id="login">Log In</button>
    <button class="btn btn-lg btn-primary" type="submit" name="signup">Sign Up</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form>
  </div>

  <script>
    
    const signUpForm = document.querySelector('#regForm');
    const logInForm = document.querySelector('#loginForm');
    
    signUpForm.style.display = 'none';

    const logInBtn = document.querySelector('#login');
    const signUpBtn = document.querySelector('#register');

    logInBtn.addEventListener('click', ()=> {
      signUpForm.style.display = 'none';
      logInForm.style.display = 'block';
    });

    
    signUpBtn.addEventListener('click', ()=> {
      signUpForm.style.display = 'block';
      logInForm.style.display = 'none';
    });
      
  </script>
</body>
</html>
