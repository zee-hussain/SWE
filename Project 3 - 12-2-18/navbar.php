<?php
    if ($home === true) {
	   $cd = "";
    } else if ($profile === true) {
	   $cd = "../../";
    } else {
	   $cd = "../";
    }

    // Print content that is the same regardless of whether the user is logged in or not
    print <<<UNIVERSAL

        <nav id="navbar" class="navbar navbar-expand-md navbar-light bg-light sticky-top justify-content-between border-bottom">
            <a href="$cd"><img src="${cd}Global_Images/Logo.png" alt="Home" style="height: 60px;"</img></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navcollapse" aria-controls="navcollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse pl-5" id="navcollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item pr-3">
                        <a class="nav-link text-burnt-orange" href="${cd}Browse">Browse</a>
                    </li>
                    <li class="nav-item">
                        <form class="form-inline my-2 my-md-0" action="${cd}Profile/generic">
                            <input class="form-control focus-orange" type="text" placeholder="Search Photographers">
			    <input type="submit" value="Search">
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav">
UNIVERSAL;

    session_start();

    // If user is logged in, print ACCT
    if (isset($_COOKIE["success"])){
        print <<<ACCT
                    <li class="nav-item">
                        <form class="form-inline" action="${cd}logout.php" method="post">
			    <button class="btn btn-outline-dark type="submit">Log Out</button>
			</form>
                    </li>
ACCT;
    // If no user logged in, print NOACCT
    } else {
        print <<<NOACCT
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-burnt-orange" id="signinDropdownToggler" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100px;">Sign In</a>
                        <div class="dropdown-menu" aria-labelledby="signinDropdownToggler" style="min-width: 200px;">
                            <form class="px-2 py-2 mr-0" action="${cd}login.php" method="post">
                                <input id="user" name="user" type="text" class="form-control mb-1 w-100" placeholder="Username">
                                <input id="password" name="password" type="password" class="form-control mb-1 w-100" placeholder="Password">
                                <button type="submit" name="login" class="btn burnt-orange mx-auto" style="width: 85px; display: block;">Sign In</button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-burnt-orange" href="${cd}Become_A_Photographer" style="width: 100px;">Register</a>
                    </li>

NOACCT;
        }

    print <<<REMAINDER
                </ul>
            </div>
        </nav>
REMAINDER;

?>
