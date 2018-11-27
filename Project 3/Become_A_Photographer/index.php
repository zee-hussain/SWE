<!-- BECOME A PHOTOGRAPHER index.php -->
<html>
    <head>
        <title>Become a Photographer</title>
        <?php include "../head-content.html"; ?>
    </head>
    <body>
        <?php include "../navbar.php"; ?>
        <div class="container setmax">
            <div class="py-5 text-center">
                <h2>Become a Photographer</h2>
                <p class="lead">Good with a camera? Looking for clients? Join our community of photographers to take potraits of future UT Grads!</p>
            </div>
            <form class="needs-validation" id="login" method="post" action="register.php">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="John">
                        <div class="invalid-feedback">First name is required.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Smith">
                        <div class="invalid-feedback">Last name is required.</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="you@example.com">
                    <div class="invalid-feedback">Valid email is required.</div>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="***********">
                    <div class="invalid-feedback">Your Password Must Contain: <table><tr><th>One Capital Letter</th><th>One Special Character</th><th>One Number</th></tr></table></div>
                </div>
                <hr class="mb-4">
                <div class="text-center">
                    <button class="btn btn-lg burnt-orange" name="signup" type="submit">Register</button>
                </div>
            </form>
        </div>
        <?php include "../footer.php"; ?>
    </body>
</html>
