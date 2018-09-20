<?php

    // Print content that is the same regardless of whether the user is logged in or not
    print <<<UNIVERSAL

        <nav id="navbar" class="navbar navbar-expand-md navbar-light bg-light sticky-top justify-content-between border-bottom">
            <a href=""><img src="../Global_Images/logo.PNG" alt="Home" style="height: 60px;"</img></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navcollapse" aria-controls="navcollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse pl-5" id="navcollapse">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item pr-3">
                    <a class="nav-link text-burnt-orange" href="../Upload/index.php">Upload</a>
                </li>
                <li class="nav-item pr-3">
                    <a class="nav-link text-burnt-orange" href="../View/index.php">View</a>
                </li>
                </ul>
                <ul class="navbar-nav">
UNIVERSAL;

    session_start();

    // If user is logged in, print ACCT
    if (isset($_COOKIE["admin"]) || isset($_COOKIE["user"])){
        print <<<ACCT
                    <li class="nav-item">
                        <form class="form-inline" action="../logout.php" method="post">
			    <button class="btn btn-outline-dark type="submit">Log Out</button>
			</form>
                    </li>
ACCT;
    // If no user logged in, print NOACCT
    } else {
        print <<<NOACCT
                    <li class="nav-item">
                        <a class="nav-link text-burnt-orange" href="Login/index.php" style="width: 100px;">Log In</a>
                    </li>
                        
                    <li class="nav-item">
                        <a class="nav-link text-burnt-orange" href="Register/index.php" style="width: 100px;">Register</a>
                    </li>

NOACCT;
        }

    print <<<REMAINDER
                </ul>
            </div>
        </nav>
REMAINDER;

?>
