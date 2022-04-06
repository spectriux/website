
<?php
/*function emptyInputSignup($tokenID,$eAdress,$pwd,$pwdRepeat)
{
  $results;
  if (empty($tokenID) || empty($eAdress) || empty($pwd) || empty($pwdRepeat)) {
    $results = true;
  }
  else {
    $results = false;
  }
  return $results;
}
function invalidUid($tokenID) {
  $results;
  if (!preg_match("/^[a-zA-Z0-9]*$/"), $tokenID)
  {
    $results = true;
  }
  else {
    $results = false;
  }
  return $results;
}
function invalidEmail($eAdress)
{
  $results;
  if (!filter_var($eAdress, FILTER_VALIDATE_EMAIL)) {
    $results = true;
  }
  else {
    $results = false;
  }
  return $results;
}

function pwdMatch($pwd, $pwdRepeat)
{
  $results;
  if ($pwd !== $pwdRepeat) {
    $results = true;
  }
  else {
    $results = false;
  }
  return $results;
}
function uidExists($conn, $tokenID, $eAdress)
{
  $sql = "SELECT * FROM users WHERE usersTokenID	 = ? OR usersEmail = ?;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql))
  {
    header("location: ../login-page.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $tokenID, $eAdress);
  mysqli_stmt_execute($stmt);

  $resultsData = mysqli_stmt_get_results($stmt);
  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $results = false;
    return $results;
  }

  mysqli_stmt_close($stmt);
}

function createUser($conn, $tokenID, $eAdress, $pwd)
{
  $sql = "INSERT INTO users (usersTokenID, usersEmail, usersPwd) VALUES(?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql))
  {
    header("location: ../login-page.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sss", $tokenID, $eAdress, $pwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../login-page.php?error=none");*/
}
