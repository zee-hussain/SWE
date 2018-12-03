<!-- BECOME A PHOTOGRAPHER index.php -->
<html>
    <head>
        <title>Become a Photographer</title>
        <?php include "../head-content.html"; ?>
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

            xhr.onreadystatechange = update;

            xhr.send(params);
        }

        function update() {
            if ((xhr.readyState == 4) && (xhr.status == 200)) {
                var response = xhr.responseText;

                if (response == "Taken") {
                    window.alert("Email already associated with an account. Please Log In.");
                }
            }

        }
    </script>
    </head>
    <body>
        <?php include "../navbar.php"; ?>
        <div class="container setmax">
            <div class="py-5 text-center">
                <h2>Become a Photographer</h2>
                <p class="lead">Good with a camera? Looking for clients? Join our community of photographers to take potraits of future UT Grads!</p>
            </div>
            <form class="needs-validation" id="login" method="POST" action="register.php">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="John" required>
                        <div class="invalid-feedback">First name is required.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Smith" required>
                        <div class="invalid-feedback">Last name is required.</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username">Email</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="you@example.com" onfocusout="checkServer()" required>
                    <div class="invalid-feedback">Valid email is required.</div>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="***********" required>
                    <div class="invalid-feedback">Your Password Must Contain: <table><tr><th>One Capital Letter</th><th>One Special Character</th><th>One Number</th></tr></table></div>
                </div>

                <hr class="mb-3">
                <h4 class="mb-3">Languages</h4>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="languages[]" value="English" id="English">
                    <label class="custom-control-label" for="English">English</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Spanish" name="languages[]" value="Spanish">
                    <label class="custom-control-label" for="Spanish">Spanish</label>
                </div>
              <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Chinese">
                    <label class="custom-control-label" for="Chinese" name="languages[]" value="Chinese">Chinese</label>
                </div>
              <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Hindi">
                    <label class="custom-control-label" for="Hindi" name="languages[]" value="Hindi">Hindi</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Vietnamese" name="languages[]" value="Vietnamese">
                    <label class="custom-control-label" for="Vietnamese">Vietnamese</label>
                </div>

                <hr class="mb-3">
                <h4 class="mb-2">Price Range</h4>
                 <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="$" value="$" name="pricerange" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="$">$</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="$$" value="$$" name="pricerange" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="$$">$$</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="$$$" value="$$" name="pricerange" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="$$$">$$$</label>
                    </div>
                </div>

                <hr class="mb-3">
                <h4 class="mb-3">Form of Payment</h4>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="payments[]" value="Cash"class="custom-control-input" id="Cash">
                    <label class="custom-control-label" for="Cash">Cash</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="payments[]" value="Credit Card"class="custom-control-input" id="Credit Card">
                    <label class="custom-control-label" for="Credit Card">Credit Card</label>
                </div>
              <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="payments[]" value="Venmo" id="Venmo">
                    <label class="custom-control-label" for="Venmo">Venmo</label>
                </div>
              <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="payments[]" value="Check"class="custom-control-input" id="Check">
                    <label class="custom-control-label" for="Check">Check</label>
                </div>

                <hr class="mb-3">
                <h4 class="mb-2">Can you Provide Transportation for Shoots?</h4>
                 <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="Yes" value="1" name="transportation" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="Yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="No" value="0" name="transportation" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="No">No</label>
                    </div>

                <hr class="mb-4">
                <div class="text-center">
                    <button class="btn btn-lg burnt-orange" name="signup" type="submit">Register</button>
                </div>
            </form>
        </div>
        </div>
        <?php include "../footer.php"; ?>
    </body>
</html>
