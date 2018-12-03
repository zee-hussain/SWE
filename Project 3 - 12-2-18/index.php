<?php $home = true; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	    <title>ATXGradPhotos Home</title>
        
        <!-- BOOTSTRAP -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- CUSTOM STYLESHEETS -->
        <link rel="stylesheet" href="global.css">
    </head>
    <body>
	   <!-- Header -->
        <?php include "navbar.php"; ?>

        <!-- Jumbotron -->
        <div class="jumbotron bg-eee pt-0 mb-0">
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-6" style="position: relative;">
                    <div style="position: absolute; top: 50%; transform: translateY(-50%);">
                        <h1>Discover photographers in the Austin area.</h1>
                        <p class="lead">Graduating and need someone to take your picture? We've got you covered.</p>
                        <form action="Browse"><input type="submit" class="btn burnt-orange" value="Browse Photographers"></form>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="Global_Images/camera.png" class="img-fluid h-auto mx-auto" style="max-width: 400px;">
                </div>
            </div>
            </div>
        </div>

        <div class="container-fluid px-0">
            <!-- Slideshow Overview -->
            <section class="align-items-center py-3"> <!-- Each page section -->
                <div class="row setmax-900">
                    <div id="howItWorks" class="carousel slide mx-auto" data-ride="carousel" data-interval="false" style="max-width: 800px; max-height: 400px;">
                        <!-- Bottom buttons -->
                        <ol class="carousel-indicators">
                            <li data-target="howItWorks" data-slide-to="0" class="active"></li>
                            <li data-target="howItWorks" data-slide-to="1"></li>
                            <li data-target="howItWorks" data-slide-to="2"></li>
                        </ol>
                        <!-- Slide content -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="Homepage_Resources/hookem.jpg" alt="Hook 'em" class="d-block img-fluid">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>Get portraits you will love from photographers near you. No signup required!</h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="Homepage_Resources/bevo.jpg" alt="Cap" class="d-block img-fluid">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>View the profiles of photographers you like!</h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="Homepage_Resources/tower.jpg" alt="Tower" class="d-block img-fluid">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>Contact the photographers you want!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- L/R slide controls -->
                        <a class="carousel-control-prev" href="#howItWorks" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#howItWorks" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </section>
            
    	    <!-- Testimonials -->
            <section class="align-items-center bg-eee py-3">
                <h1 class="text-center mb-5">What Our Customers Are Saying</h1>
                <div class="row setmax-900">
                    <div class="col-lg-6 order-lg-2 text-center">
                        <img class="w-lg-100 mx-auto" src="Homepage_Resources/c1photo1.jpg" alt="brittany">
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="py-5 p-3 text-center">
                            <h5>Brittany</h5>
                            <p class="lead">ATX Grad Photo helped me find a photographer two days before my graduation!</p>
                            <h5 class="font-weight-light text-burnt-orange">Spring 2018 | Business</h5>
                        </div>
                    </div>
                </div>
                <div class="row setmax-900">
                    <div class="col-lg-6 order-lg-1 text-center">
                        <img class="mw-100 w-auto ml-auto mr-auto" src="Homepage_Resources/c2photo1.jpeg" alt="amy">
                    </div>
                    <div class="col-lg-6 order-lg-2">
                        <div class="py-5 p-3 text-center">
                            <h5>Amy</h5>
                            <p class="lead">ATXGradPhoto helped take the stress out of a very stressful situation!</p>
                            <h5 class="font-weight-light text-burnt-orange">Fall 2017 | Engineering</h5>
                        </div>
                    </div>
                </div>
            </section>
 
            <!-- Join the Community -->
            <section class="align-items-center py-5 setmax-900">
                <h1>Join the Community of Photographers</h1>
                <p class="lead">Partner with ATXGradPhoto for a new way to find clients.</p>
                <a class="text-burnt-orange" href="Become_A_Photographer">Get Started ></a>
            </section>
        </div>
        
        <?php include "footer.php"; ?>
    </body>
</html>
