<h2>Events page</h2>
<table>
    <tr>
        <td>Country</td>
        <td>Area</td>
        <td>City</td>
        <td>Radius (miles)</td>
        <td>No. of Records</td>
    </tr>
    <tr>
        <td>
            <select name="country" id="country">
                <option value="base" selected>-</option>
                <?php
                foreach($pdo->query($sql) as $row) {
                    ?>
                    <option value=<?php echo $row['country'];?>><?php echo str_replace("_", " ", $row['country']);?></option>
                    <?php
                }
                ?>
            </select>
        </td>
        <td>
            <div id="areaList">
                <select name="area" id="area">
                    <option value="base" selected>-</option>
                </select>
            </div>
        </td>
        <td>
            <div id="cityList">
            <select name="city" id="city">
                <option value="base" selected>-</option>
                <div id="cityList"></div>
            </select>
        </div>
        </td>
        <td><input type="number" name="radius" id="radius" required></td>
        <td>
            <select name="records" id="records">
            <option value="25" selected>25</option>
            <option value="50">50</option>
            <option value="75">75</option>
            <option value="100">100</option>
            </select>
        </td>
        <td>
            <input type="submit" name="searchEvents" id="searchEvents" class="fa" value="&#xf002;">
        </td>
    </tr>
    <tr>
        <td>Order by</td>
        <td>Event type</td>
        <td>Start date</td>
        <td>End date</td>
    </tr>
    <tr>
        <td>
            <select name="order" id="order">
            <option value="base" selected>-</option>
            <option value="trending">Trending events</option>
            <option value="goingto">Number of attendees</option>
            <option value="distance">Distance from location</option>
            </select>
        </td>
        <td>
            <select name="eventCode" id="eventCode">
            <option value="base" selected>-</option>
            <option value="ARTS">The Arts</option>
            <option value="BARPUB">Bar/Pub event</option>
            <option value="CLUB">Clubbing/dance music</option>
            <option value="COMEDY">Comedy event</option>
            <option value="DATE">Dating event</option>
            <option value="EXHIB">Exhibitions and Attractions</option>
            <option value="FEST">Festivals</option>
            <option value="KIDS">Kids/Family event</option>
            <option value="LGB">Gay/Lesbian event</option>
            <option value="LIVE">Live music</option>
            <option value="SPORT">Sporting event</option>
            <option value="THEATRE">Theatre/dance</option>
            </select>
        </td>
        <td><input type="date" name="startDate" id="startDate" value="<?php echo date('d-m-Y')?>" min="<?php echo date('Y-m-d')?>"></td>
        <td><input type="date" name="endDate" id="endDate"></td>
    </tr>
    <tr>
        <td>Recommended events</td>
        <td>Tickets available</td>
        <td>18+</td>
    </tr>
    <tr>
        <td><input type="checkbox" name="recommendedEvents" id="recommendedEvents"></td>
        <td><input type="checkbox" name="ticketsAvailable" id="ticketsAvailable"></td>
        <td><input type="checkbox" name="over18" id="over18"></td>
    </tr>
</table>
<table id = "eventsRecords">
</table>
