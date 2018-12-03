<!-- CONTACT US index.html -->

<html>
    <head>
        <title>Help</title>
        <?php include "../head-content.html"; ?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="validateAndSubmit.js" defer></script>
    </head>
    <body>
        <?php include "../navbar.php"; ?>
        <div class="container setmax">
            <div class="py-5 text-center">
                <h2>Get Help</h2>
                <p class="lead">Do you need help using the site? Fill out the form below and an ATX Grad Photo representative will get back to you promptly.</p>
                <p class="text-danger">Do not submit sensitive information such as passwords or credit card numbers.</p>
            </div>
            <form id="helpForm" class="needs-validation" novalidate>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname">
                            <div class="invalid-feedback">First name is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname">Last name<span class="text-muted"> (Optional)</span></label>
                            <input type="text" class="form-control" name="lastname" id="lastname">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">Valid email is required.</div>
                </div>
                <div class="form-group mb-3">
                    <label for="comments">Comments</label>
                    <textarea class="textarea" id="comments" placeholder="Your comments/question here..."></textarea>
                    <div class="invalid-feedback">Comments are required.</div>
                </div>
                <hr class="mb-4">
                <div class="text-center">
                    <button class="btn btn-lg burnt-orange" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <?php include "./../footer.php"; ?>
    </body>
</html>
