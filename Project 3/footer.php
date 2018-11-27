<?php
    if ($home === true) {
	   $cd = "";
    } else {
	   $cd = "../";
    }

    print <<<FOOTER
        <footer class="burnt-orange container-fluid pt-3 pb-1">
            <div class="row">
                <div class="col-12 col-md text-center">
                    <a href="$cd"><img src="${cd}Global_Images/Logo.png" alt="Home" style="height: 70px;"</img></a>
                </div>
                <div class="col-6 col-md">
                    <ul class="list-unstyled text-small text-center">
                        <li><a href="${cd}Become_A_Photographer">Become a Photographer</a></li>
                        <li><a href="${cd}About">About the Developers</a></li>
                        <li><a href="${cd}Help">Help</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <ul class="list-unstyled text-small text-center">
                        <li><a href="${cd}no_page.html">FAQ</a></li>
                        <li><a href="${cd}Site_Feedback">Site Feedback</a></li>
                    </ul>
                </div>
            </div>
        </footer>
FOOTER;

    // Enable Bootstrap dropdown in navbar (not footer)
    print <<<BOTTOMSCRIPTS
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
BOTTOMSCRIPTS;

?>
