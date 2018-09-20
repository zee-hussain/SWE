<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>File Manager</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../main.css">
    <script src="https://code.jquery.com/jquery-2.2.4.js" type="text/javascript"></script>
</head>
<body>
  <div class="wrapper">
      <form class="form-signin" method="POST" action="login.php">
      <h1 class="form-signin-heading">File Manager</h1>
      <h4>Please Log In</h4><br>     
      <input type="text" class="form-control" name="username" id="username" placeholder="Username" onchange="checkServer()" required>
      <span id="avaliable"></span>
      <br>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required> 
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="Login" value="Login">
      <br>
    <br>
    </form>
</div>
</body>
</html>