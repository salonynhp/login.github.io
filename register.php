<?php
require_once "config.php";
 
$username = $password = $confirm_password =$email= "" ;
$username_err = $password_err =$confirm_password_err= $email_err="";
 
if($_SERVER['REQUEST_METHOD']=="POST")
{
//check if username is empty
    if(empty(trim($_POST['username'])))
    {
     $username_err="username cannot be blank";
    }
    else
    {
           $sql="SELECT id FROM users WHERE username=?";
           $stmt=mysqli_prepare($conn,$sql);
           if($stmt)
            {
               mysqli_stmt_bind_param($stmt,"s",$param_username);
               //set value of param username
               $param_username=trim($_POST['username']);
               //try to execute statemant
               if(mysqli_stmt_execute($stmt))
               {
                  mysqli_stmt_store_result($stmt);
                  if(mysqli_stmt_num_rows($stmt)==1)
                   {
                     $username_err="this username is already taken";
                   }
                   else
                    {
                      $username=trim($_POST['username']);
                    }
                }
                else
                {
                     echo"something went wrong";
                }
            }
            mysqli_stmt_close($stmt);
    }


   

  //check for password
  if(empty(trim($_POST['password'])))
  {
      $password_err="password cannot be blank";
  }
  elseif(strlen(trim($_POST['password']))<5)
  {
      $password_err="password canot be less than 5 char";
  }
  else
  {
      $password=trim($_POST['password']);
  }

  //check for confirm password
  if(trim($_POST['password'])!=trim($_POST['confirm_password']))
  {
    $password_err="password should match";
  }
//check for email
if(empty(trim($_POST['email'])))
    {
     $email_err="please insert email";
    }
    else
  {
      $email=trim($_POST['email']);
  }

    


  //if no errors found go and insert detail into database users
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)&& empty($email_err))
   {
      $sql="INSERT INTO users (username,password,email) VALUES(?, ?, ?)";
      $stmt=mysqli_prepare($conn,$sql);
     if($stmt)
       {
            mysqli_stmt_bind_param($stmt,"sss",$param_username,$param_password,$param_email);
         //set these parameters
          $param_username=$username;
          $param_password=password_hash($password,PASSWORD_DEFAULT);
          $param_email=$email;
          //TRY TO EXECUTE QUERY
          if(mysqli_stmt_execute($stmt))
            {
             header("location:login.php");
            }
         else
           {
              echo "something went wrong... cannot redirect!";
            }   
       }

     mysqli_stmt_close($stmt);
   }
mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>login</title>
  </head>
  <body style="background-color:#FFE3D8">
  <nav style="background-color:  #262A53" class="navbar navbar-expand-lg navbar-light" >
  <div class="container-fluid">
    <a class="navbar-brand  text-warning" href="#">systemlogin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active  text-warning" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  text-warning" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  text-warning" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  text-warning" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="register.php">create account</a></li>
            <li><a class="dropdown-item" href="login.php">login</a></li>
            <li><a class="dropdown-item" href="logout.php">logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--form-->
<div class="container mt-4";>
    <h3>create an account</h3>
    <hr>
<form  action="" method="post" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">username</label>
    <input type="text" class="form-control" name="username" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputpassword4" class="form-label">password</label>
    <input type="password" class="form-control" name="password" id="inputpassword4">
  </div>
  <div class="col-md-6">
    <label for="inputpassword4" class="form-label">confirm password</label>
    <input type="password" class="form-control" name="confirm_password" id="inputpassword">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">email id</label>
    <input type="email" name="email" class="form-control" id="inputAddress2" >
  </div>
  <!-- <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip">
  </div> -->
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>