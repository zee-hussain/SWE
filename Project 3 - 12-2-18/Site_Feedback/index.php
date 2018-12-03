<!-- SITE FEEDBACK page -->

<html>
    <head>
        <title>Feedback</title>
        <?php include "../head-content.html"; ?>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="validateAndSubmit.js" defer></script>
    </head>
    <body>
        <?php include "../navbar.php"; ?>
        <div class="container setmax">
            <div class="py-5 text-center">
                <h2>Site Feedback</h2>
                <p class="lead">We are happy to accept any comments you have about our site's usability and layout. Just fill out the form below and the ATXGradPhoto team will discuss your suggestions.</p>
            </div>
            <form id="feedbackForm">
                <div class="mb-3">
                    <label for="name">Name<span class="text-muted"> (Optional)</span></label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="email">Email<span class="text-muted"> (Optional)</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                </div>
                <div class="mb-3">
                    <label for="feedback">Feedback</label>
                    <textarea class="textarea" id="comments" placeholder="Your feedback here..." required></textarea>
                </div>
                <hr class="mb-4">
                <div class="text-center">
                    <button class="btn btn-lg burnt-orange" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <?php include "../footer.php"; ?>
    </body>
</html>
