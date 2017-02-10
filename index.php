<?php
require_once('includes/sessions.inc.php');
require_once('includes/conn.inc.php');
$sql= "SELECT DISTINCT country FROM cities ORDER BY country;";
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
    <link rel="stylesheet" href="https://brick.a.ssl.fastly.net/Karla:400">
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
        <nav>
            <ul>
                <li><a href=#homepage class="navLink">
                    Homepage
                </a></li>
                <li><a href=#multiPage class="navLink">
                    Events
                </a></li>
                <li><a href=#contactPage class="navLink">
                    Contact Us
                </a></li>
            </ul>
        </nav>
    </div>
    <header id="homepage">
        <h1>UK Events</h1>
        <h1>Powered by <a href="https://www.skiddle.com">Skiddle</a></h1>
        <?php if(isset($_SESSION['login'])){
            require_once('includes/session-logout.inc.php');
        } else {
            require_once('includes/session-login.inc.php');
        }?>
    </header>
    <section id="multiPage">
        <div id="eventsSection">
            <?php require_once('includes/events.inc.php'); ?>
        </div>
        <div id="cmsSection">
            <?php require_once('includes/cms.inc.php'); ?>
        </div>
        <div id="editCMSSection"></div>
        <div id="deleteCMSSection"></div>
        <div id="viewCMSSection"></div>
        <div id="addCMSSection"></div>
        <div id="registrationSection">
            <?php require_once('includes/registration.inc.php'); ?>
        </div>
        <div id="profileSection">
            <?php require_once('includes/profile.inc.php'); ?>
        </div>
    </section>
    <section id="contactPage">
        <h1>We'd love to hear from you!</h1>
        <form class="" action="sendToDatabase.php" method="post">
            <input type="text" name="contactName" id="contactName" placeholder="Name"><br>
            <input type="email" name="contactEmail" id="contactEmail" placeholder="Email address"><br>
            <input type="text" name="contactSubject" id="contactSubject" placeholder="Subject"><br>
            <textarea name="contactMessage" id="contactMessage" rows="8" cols="40" placeholder="Message"></textarea><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </section>
    <footer id = "footer">
        <p>&copy; 2017</p>
    </footer>
    <script src="scripts/jquery-3.1.1.min.js"></script>
    <script src="scripts/main.js"></script>
    <script>
    $('#openOverlay').click(function(){
        openOverlay();
    });
    $('#closeOverlay').click(function(){
        closeOverlay();
    })
    if (window.matchMedia("(max-width: 1024px)")) {
        var numNav = document.querySelectorAll(".navLink");
        for (var i = 0; i < numNav.length; i++) {
            numNav[i].addEventListener("click",function(){
                closeOverlay();
            })
        }
    }
    $('#country').change(function(){
        updateDropdown(this.id, "area");
    });
    $('#areaList').change(function(){
        updateDropdown('area','city');
    });
    $('#searchEvents').click(function(){
        getRecords();
    });
    $('#adminButton').click(function(){
        toggleCMSPage();
    });
    var cmsEditLink = document.querySelectorAll('.editCMSLink');
    for (var i = 0; i < cmsEditLink.length; i++) {
        cmsEditLink[i].addEventListener('click',function(){
            loadCMSSubPage('edit', this.id);
        })
    }
    var cmsDeleteLink = document.querySelectorAll('.deleteCMSLink');
    for (var i = 0; i < cmsDeleteLink.length; i++) {
        cmsDeleteLink[i].addEventListener('click',function(){
            loadCMSSubPage('delete', this.id);
        })
    }
    $('#registrationButton').click(function(){
        loadRegistrationPage();
    });
    $('#addCMSLink').click(function(){
        loadCMSSubPage('add',this.id);
    });
    $('#profileButton').click(function(){
        loadProfilePage();
    });
    var reserveEventLink = document.querySelectorAll('.reserveEventLink');
    console.log(reserveEventLink.length);
    for (var i = 0; i < reserveEventLink.length; i++) {
        reserveEventLink[i].addEventListener('click',function(){
            reserveEvent(this.id);
        })
    }
    </script>
</body>
</html>
