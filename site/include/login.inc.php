<?php
if (isset($_POST['login-submit']))
{
  require "dbh.inc.php";

  $userNameL = $_POST["userName-login"];
  $pwdL = $_POST["password-login"];

  if (empty ($userNameL) || empty($pwdL)) {
    header("Location:../login-page.php?error=empty&userNamelog=$userNameL");
    exit();
  }
  else {
    $sql="SELECT * FROM users WHERE username=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location:../login-page.php?SQLError");
          exit();
    }
    else {
      mysqli_stmt_bind_param($stmt,"s",$userNameL);
      mysqli_stmt_execute($stmt);
      $results = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($results)) {
        $passCheck = password_verify($pwdL, $row["pwd"]);
        if ($passCheck == false) {
              header("Location:../login-page.php?error=wrongpass&userNamelog=$userNameL");
          exit();
        }
        else if($passCheck == true)
        {
          session_start();
          $_SESSION["userId"] = $row["id"];
          $_SESSION["userusername"] = $row["username"];
          header("Location:../login-page.php?login=success");
          exit();
        }
        else {
          header("Location:../login-page.php?error=wrongpassword");
          exit();
        }
      }
      else {
        header("Location:../login-page.php?error=nouser");
        exit();
      }

    }
  }
}
else {
  header("Location:../login-page.php");
}
