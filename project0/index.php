<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>File Manager</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://code.jquery.com/jquery-2.2.4.js" type="text/javascript"></script>
    <script type = "text/javascript">
        
        var xhr;
        if (window.ActiveXObject) {
            xhr = new ActiveXObject ("Microsoft.XMLHTTP");
        }
        else if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest ();
        }

        function checkServer()
        {

            var username = document.getElementById("username").value;

            if ((username == null) || (username == "")) return;

            var url = "check.php";

            var params = "username=" + username;

            xhr.open("POST", url, true);

            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.setRequestHeader("Content-length", params.length);

            xhr.setRequestHeader("Connection", "close");

            xhr.onreadystatechange=update;

            xhr.send(params);
        }

        function update() {
            if ((xhr.readyState == 4) && (xhr.status == 200)) {

                var response = xhr.responseText;

                if (response == "Taken") {
                    window.alert("Username is already taken. Please try again.");
                }
            }

        }
    </script>
</head>
<body>
  <div class="wrapper">
      <form class="form-signin" method="POST" action="register.php">
      <h1 class="form-signin-heading">File Manager</h1>
      <h4>Please Register</h4><br>     
      <input type="text" class="form-control" name="username" id="username" placeholder="Username" onchange="checkServer()" required>
      <span id="avaliable"></span>
      <br>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required> 
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="register" value="Register">
      <br>
      <div class="usertype">
      <label class="radio-inline"><input type="radio" name="usertype" id="usertype" value="Admin" required>Admin</label>
      <label class="radio-inline"><input type="radio" name="usertype" id="usertype" value="User" required>User</label>
    </div>
    <br>
    <a href="Login/index.php">Already Have an Account? Log In</a>
    </form>
</div>
</body>
</html>