<?php $profile = true; ?>

<!DOCTYPE html>
<html>
	<head>
	    <title>generic profile</title>
	    <?php include "../../head-content.html" ?>
	    <link rel="stylesheet" href="../../global.css">
	</head>
	<body>
	    <?php include "../../navbar.php" ?>
	    <div class="container setmax-900">
        <div class="card text-white burnt-orange my-5 mx-auto w-100">
            <div class="card-header">Note</div>
            <div class="card-body">
                <h5 class="card-title">This profile is included as proof of concept.</h5>
                <p class="card-text">For this release we just did a generic profile page, which is the only one you can view. Our Browse page meets the requirement of interacting with the SQL backend.</p>
            </div>
        </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <img class="mx-auto img-fluid" src="profile.jpg" alt="profile picture">
                </div>
                <div class="col-md-6">
                    <h5 class="text-center">David Bowie</h5>
                    <table>
                        <tr>
                            <td><strong>Bio:</strong></td>
                            <td>I stepped through the door, floated in a most peculiar way, ended up in Austin, and now I'm taking pictures.</td>
                        </tr>
                        <tr>
                            <td><strong>Languages:</strong></td>
                            <td>English, Martian</td>
                        </tr>
                        <tr>
                            <td><strong>Price:</strong></td>
                            <td>$$</td>
                        </tr>
                        <tr>
                            <td><strong>Payment:</strong></td>
                            <td>Cash, Paypal</td>
                        </tr>
                        <tr>
                            <td><strong>Has own transportation:</strong></td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td><strong>Rating:</strong></td>
                            <td>4.5</td>
                        </tr>
                    </table>
		    <div class="w-100 text-center">
		        <a href="https://www.facebook.com/davidbowie"><img style="width: 50px; display: inline-block;" src="../../Global_Images/facebook.png" alt="Facebook"></a>
			<a href="https://www.instagram.com/davidbowie/"><img style="width: 50px; display: inline-block;" src="../../Global_Images/instagram.png" alt="Instagram"></a>
			<a href="https://www.twitter.com/DavidBowieReal"><img style="width: 50px;" src="../../Global_Images/twitter.png" alt="Twitter"></a>
		    </div>
                </div>
            </div>
            <div class="row py-5">
		<div class="w-100 text-center"><h2>Portfolio</h2></div>
                <div id="portfolioCarousel" class="carousel slide mx-auto" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active text-center">
                            <img class="d-block" style="max-width: 565px;" src="Portfolio/graduation_row.jpeg" alt="First slide">
                        </div>
                        <div class="carousel-item text-center">
                            <img class="d-block w-100" style="max-width: 565px;" src="Portfolio/510365.jpg" alt="Second slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#portfolioCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#portfolioCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
	    <?php include "../../footer.php"; ?>
    </body>
</html>
