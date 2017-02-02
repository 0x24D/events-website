<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
    <link rel="stylesheet" href="styles/base.css" media="screen">
    <link rel="stylesheet" href="styles/mobile.css" media="screen and (max-width: 1024px)">
    <link rel="stylesheet" href="styles/desktop.css" media="screen and (min-width: 1025px)">
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="scripts/html5shiv.min.js"></script>
    <![endif]-->
    <title>UK Events Site</title>
</head>
<body>
    <span id=openOverlay class="fa fa-bars fa-3x icon-reorder icon-3x"></span>
    <span id=closeOverlay class="fa fa-times fa-3x icon-remove icon-3x"></span>
    <div id="navLinks">
        //
        <nav>
            <ul>
                <li><a href=#homepage class="navLink">
                    Homepage
                </a></li>
                <li><a href=#eventsPage class="navLink">
                    Events
                </a></li>
                <li><a href=#contactPage class="navLink">
                    Contact Us
                </a></li>
            </ul>
        </nav>
        //
    </div>
    <header id="homepage">
        <h1>UK Events</h1>
    </header>
    <section id="eventsPage">
        <h2>Events page</h2>
        <?php include("includes/events.inc.php");?>
    </section>
    <section id="contactPage">
        <h1>We'd love to hear from you!</h1>
        <form class="" action="index.html" method="post">
            <input type="text" name="name" placeholder="Name"><br>
            <input type="email" name="email" placeholder="Email address"><br>
            <input type="text" name="subject" placeholder="Subject"><br>
            <textarea name="message" rows="8" cols="40" placeholder="Message"></textarea><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </section>
    <footer id = "footer">
        <p>&copy; 2017</p>
    </footer>
    <script type="text/javascript" src="scripts/script.js"></script>
    <script type="text/javascript">
    document.getElementById("openOverlay").onclick = function(){
        openOverlay();
    }
    document.getElementById("closeOverlay").onclick = function(){
        closeOverlay();
    }
    if (window.matchMedia("(max-width: 1024px)")) {
        var numNav = document.querySelectorAll(".navLink"); /*doesn't work in IE8*/
        for (var i = 0; i < numNav.length; i++) {
            numNav[i].addEventListener("click",function(){
                closeOverlay();
            })
        }
    }
    document.getElementById("country").onchange = function(){
        updateDropdown(this.id, "area"); //remove hardcoded parameter
    }
    document.getElementById("area").onchange = function(){
        updateDropdown(this.id, "city"); //remove hardcoded parameter
    }
    </script>
</body>
</html>
