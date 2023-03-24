<?php
session_start();

//connect to database
$db = new mysqli("localhost", "root", "", "ss");

if ($db->connect_errno) {
    die("Failed to connect to MySQL: " . $db->connect_error);
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
<h1>Home</h1>
<div>
    <h4>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?></h4>
</div>
<a href="logout.php">Log Out</a>
</div>
</main>
</div>

</body>
</html>
