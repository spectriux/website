<?php
if (isset($_POST['signup-submit']))
{
  include_once"dbh.inc.php";
  /* //This is prepared statement but no stareoids
  $statement = $conn -> prepare("INSERT INTO users(username,email,pwd)
  VALUES (?, ?, ?)");
  $statement->bind_param("sss", $userName, $eAdress, $pwd);
  $statement->execute();
  $statement->close();
  $conn->close();*/

  $userName = mysqli_real_escape_string($conn, $_POST["userName"]);
  $eAdress = mysqli_real_escape_string($conn, $_POST["emailAdress"]);
  $pwd = mysqli_real_escape_string($conn, $_POST["password"]);
  $rePwd = mysqli_real_escape_string($conn, $_POST["RepeatPassword"]);

  $usernamelength= strlen($userName);



  if (empty($userName) || empty($eAdress) || empty($pwd) || empty($rePwd))
  {
    header("Location:../login-page.php?error=empty&userName=$userName&emailAdress=$eAdress");
    exit();
  }
  else if(!preg_match('/^[a-z-A-Z0-9]*$/', $userName)) {
    header("Location:../login-page.php?error=u&userName=$userName&emailAdress=$eAdress");
    exit();
  }
  else if(!filter_var($eAdress, FILTER_VALIDATE_EMAIL))
  {
    header("Location:../login-page.php?error=invalidEmail&userName=$userName");
    exit();
  }
  elseif ($usernamelength < 3 || $usernamelength > 20) {
    header("Location:../login-page.php?error=longU&userName=$userName&emailAdress=$eAdress");
    exit();
  }
  else if ($pwd !== $rePwd)
  {
    header("Location:../login-page.php?error=pass&userName=$userName&emailAdress=$eAdress");
    exit();
  }
  else
  {
      $userNameCheck = "SELECT username FROM users WHERE username=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $userNameCheck))
      {
        header("Location:../login-page.php?SQLError");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "s", $userName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultsCheck = mysqli_stmt_num_rows($stmt);
        if($resultsCheck > 0)
        {
          header("Location:../login-page.php?error=exist&userName=$userName&emailAdress=$eAdress");
          mysqli_stmt_close($stmt);
          $conn->close();
          exit();
        }
        else {
          $sql = "INSERT INTO users(username,email,pwd) VALUES (?, ?, ?);";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql))
          {
            header("Location:../login-page.php?SQLError");
            exit();
          }
          else
          {
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt,"sss", $userName, $eAdress, $hashedPwd);
            mysqli_stmt_execute($stmt);
            header("Location:../login-page.php?error=success");
          }
        }
      }
    }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  header("Location:../login-page.php?signup");
}
?>
