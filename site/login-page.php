<?php
  include "include/checklog.inc.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>cyphergate</title>
    <link rel="stylesheet" href="./css-html files/stylesheet.css">
    <!--check if user is already signed on and if so redirect to homepage-->
    <?php
    if(isset($_SESSION['userId']))
    {
      header("Location: http://localhost/site/homePage.php");
    }
    ?>
  </head>
  <body>
    <?php
      include "css-html files/bg.html";
     ?>
     <div class="logo">
       <h1><a href="http://localhost/site/login-page.php">- Cyphergate -</a></h1>
     </div>
     <div class="signUpframe" id="1">
       <fieldset>
         <legend>Register</legend>
         <form class="formFD" action="./include/signup.inc.php" method="post" >
            <label for="userName">UserName</label>
           <?php
           if (isset($_GET['userName'])) {
             $userName = $_GET['userName'];
             echo '<input type="text" name="userName" id="userName" value="'.$userName.'">';
           }
           else {
             echo '<input type="text" name="userName" id="userName">';
           }
            ?>

           <label for="emailAdress">Email Adress</label>
           <?php
           if (isset($_GET['emailAdress'])) {
             $eAdress = $_GET['emailAdress'];
             echo '<input type="text" name="emailAdress" id="emailAdress" value="'.$eAdress.'">';
           }
           else {
             echo '<input type="text" name="emailAdress" id="emailAdress">';
           }
            ?>

           <label for="password">Password</label>
           <input type="password" name="password" id="password">

           <label for="RepeatPassword">Repeat Password</label>
           <input type="password" name="RepeatPassword" id="RepeatPassword">

           <button type="submit" name="signup-submit">Register</button>
       </fieldset>
       </form>
     </div>
     <div class="signInframe" id="2">
       <fieldset>
         <legend>Login</legend>
         <form class="formFD" action="include/login.inc.php" method="post" >
            <label for="userName-login">UserName</label>
           <?php
           if (isset($_GET['userNamelog'])) {
             $username = $_GET['userNamelog'];
             echo '<input type="text" name="userName-login" id="userName-login" value="'.$username.'">';
           }
           else {

             echo '<input type="text" name="userName-login" id="userName-login" value="">';
           }

            ?>


           <label for="password-login">Password</label>
           <input type="password" name="password-login" id="password-login">

           <button type="submit" name="login-submit">Login</button>
       </fieldset>
       </form>
     </div>
     <div class="bar">
       <h1><button onclick="signin()">Signin</button></h1>
       <h1><button onclick="signup()">SignUp</button></h1>
     </div>
     <script>
       function signin()
       {
         document.getElementById("1").style.display = "none";
         document.getElementById("2").style.display = "flex";
       }
       function signup()
       {
         document.getElementById("1").style.display = "flex";
         document.getElementById("2").style.display = "none";
       }
     </script>
     <div class="errormessage">
       <?php
       if (!isset($_GET['error'])) {
         exit();
       }
       else {
         $signupcheck = $_GET["error"];
         if ($signupcheck == "empty") {
           echo "<h1>fill all the inputs</h1>";
         }
         else if($signupcheck == "exist")
         {
           echo "<h1>UserName Already Exist, try Another One</h1>";
         }
         elseif($signupcheck == "invalidEmail"){
           echo "<h1>fill in the prober email</h1>";
         }
         elseif ($signupcheck == "pass") {
          echo "<h1>match the Passwords</h1>";
         }
         elseif ($signupcheck == "u") {
          echo "<h1>For a username you can only enter A-Z & 0-9</h1>";
         }
         elseif ($signupcheck == "longU") {
           echo "<h1>User Name either too long or too short. <br> Try to keep it between 3 & 20 characters.</h1>";
         }
         elseif ($signupcheck == "success") {
           echo "<h1>success</h1>";
         }
         elseif ($signupcheck == "wrongpass") {
           echo "<h1>wrong password</h1>";
         }
         elseif ($signupcheck == "nouser") {
           echo "<h1>This Username doesnt exist</h1>";
         }
       }

       ?>
     </div>

  </body>
</html>
