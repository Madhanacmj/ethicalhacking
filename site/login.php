<?php
session_start();
if(  isset($_SESSION['username']) )
{
  header("location:home.php");
  die();
}
//connect to database
$db=mysqli_connect("localhost","root","","web");
if($db)
{
  if(isset($_POST['login_btn']))
  {
      $username=$_POST['username'];
      $password=$_POST['password'];
      
      $sql="SELECT * FROM users WHERE  username='$username' AND password='$password'";
      $result=mysqli_query($db,$sql);
      
      if($result)
      {
     
        if( mysqli_num_rows($result)>=1)
        {
            $_SESSION['message']="You are now Loggged In";
            $_SESSION['username']=$username;
            $_SESSION['email']=$email;
            $_SESSION['password']=$password;
            header("location:home.php");
        }
       else
       {
              $_SESSION['message']="Username and Password combiation incorrect";
       }
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sample Site</title>
  <style>
    /* Basic styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    .container {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      background-color: #f2f2f2;
    }
    

    h1 {
      font-size: 28px;
      text-align: center;
      color: green;
    }
    nav {
      background-color: #333;
      color: #fff;
      padding: 10px;
      margin-bottom: 20px;
    }
    .nav > li > a {
      color: #fff;
    }
    #error_msg {
      color: red;
      margin-top: 10px;
    }
    form {
      margin-top: 20px;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input[type="text"],
    input[type="password"],
    input[type="submit"] {
      display: block;
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Sample Site</h1>

  <nav>
    <ul class="nav">
      <li><a href="login.php">LogIN</a></li>
      <li><a href="register.php">SignUp</a></li>
      <li><a href="logout.php">LogOut</a></li>
    </ul>
  </nav>

  <div>
    <?php
      if(isset($_SESSION['message']))
      {
           echo "<div id='error_msg'>".$_SESSION['message']."</div>";
           unset($_SESSION['message']);
      }
    ?>
    <form method="POST" action="login.php">
  <table>
     <tr>
           <td>Username : </td>
           <td><input type="text" name="username" ></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="password" ></td>
     </tr>
      <tr>
           <td></td>
           <td><input type="submit" name="login_btn" ></td>
     </tr>
 
</table>
</form>
</div>

</main>
</div>

</body>
</html>
