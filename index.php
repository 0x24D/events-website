<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once('includes/conn.inc.php');
$sql= 'SELECT DISTINCT country FROM cities ORDER BY country';
?>
<!DOCTYPE html>
<html lang='en-gb'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1'>
    <link rel='stylesheet' href='styles/base.css' media='screen'>
    <link rel='stylesheet' href='styles/mobile.css' media='screen and (max-width: 1024px)'>
    <link rel='stylesheet' href='styles/desktop.css' media='screen and (min-width: 1025px)'>
    <link rel='stylesheet' href='fonts/font-awesome-4.7.0/css/font-awesome.min.css'>
    <!--[if IE 7]>
    <link rel='stylesheet' href='fonts/font-awesome/css/font-awesome-ie7.min.css'>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src='scripts/html5shiv.min.js'></script>
    <![endif]-->
    <title>UK Events Site</title>
</head>
<body>
    <span id=openOverlay class='fa fa-bars fa-3x icon-reorder icon-3x'></span>
    <span id=closeOverlay class='fa fa-times fa-3x icon-remove icon-3x'></span>
    <div id='navLinks'>
        <nav>
            <ul>
                <li><a href=#homepage class='navLink'>
                    Homepage
                </a></li>
                <li><a href=#eventsPage class='navLink'>
                    Events
                </a></li>
                <li><a href=#contactPage class='navLink'>
                    Contact Us
                </a></li>
            </ul>
        </nav>
    </div>
    <header id='homepage'>
        <h1>UK Events</h1>
    </header>
    <section id='eventsPage'>
        <h2>Events page</h2>
        <table>
            <tr>
                <th>Country</th>
                <th>Area</th>
                <th>City</th>
                <th>Radius (miles)</th>
                <th>No. of Records</th>
            </tr>
            <tr>
                <td>
                    <select name='country' id='country'>
                        <option value='base' selected>-</option>
                        <?php
                        foreach($pdo->query($sql) as $row) {
                            ?>
                            <option value=<?php echo $row['country'];?>><?php echo str_replace('_', ' ', $row['country']);?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <div id='areaList'>
                        <select name='area' id='area'>
                            <option value='base' selected>-</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div id='cityList'>
                    <select name='city' id='city'>
                        <option value='base' selected>-</option>
                        <div id='cityList'></div>
                    </select>
                </div>
                </td>
                <td><input type='number' name='radius' id='radius' required></td>
                <td>
                    <select name='records' id='records'>
                    <option value='25' selected>25</option>
                    <option value='50'>50</option>
                    <option value='75'>75</option>
                    <option value='100'>100</option>
                </select>
                </td>
                <td>
                    <input type='submit' name='searchEvents' id='searchEvents' class='fa' value='&#xf002;'>
                </td>
            </tr>
        </table>
        <table id = 'eventsRecords'>
        </table>
    </section>
    <section id='contactPage'>
        <h1>We'd love to hear from you!</h1>
        <form class='' action='index.html' method='post'>
            <input type='text' name='name' placeholder='Name'><br>
            <input type='email' name='email' placeholder='Email address'><br>
            <input type='text' name='subject' placeholder='Subject'><br>
            <textarea name='message' id='message' rows='8' cols='40' placeholder='Message'></textarea><br><br>
            <input type='submit' name='submit' value='Submit'>
        </form>
    </section>
    <footer id = 'footer'>
        <p>&copy; 2017</p>
    </footer>
    <script src='scripts/jquery-3.1.1.min.js'></script>
    <script src='scripts/main.js'></script>
    <script>
    document.getElementById('openOverlay').onclick = function(){
        openOverlay();
    }
    document.getElementById('closeOverlay').onclick = function(){
        closeOverlay();
    }
    if (window.matchMedia('(max-width: 1024px)')) {
        var numNav = document.querySelectorAll('.navLink'); /*doesn't work in IE8*/
        for (var i = 0; i < numNav.length; i++) {
            numNav[i].addEventListener('click',function(){
                closeOverlay();
            })
        }
    }
    document.getElementById('country').onchange = function(){
        updateDropdown(this.id, 'area'); //remove hardcoded parameters
    }
    document.getElementById('areaList').onchange = function(){
        updateDropdown('area', 'city'); //remove hardcoded parameters
    }
    document.getElementById('searchEvents').onclick = function(){
        console.log('City: ' + document.getElementById('city').value + ' Area: ' + document.getElementById('area').value +
                    ' Country: ' + document.getElementById('country').value + ' Results: ' + document.getElementById('records').value);
                    getRecords();
    }
    </script>
</body>
</html>
