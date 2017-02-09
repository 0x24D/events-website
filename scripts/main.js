function openOverlay(){
    document.getElementById('openOverlay').style.display='none'
    document.getElementById('navLinks').style.display='block'
    document.getElementById('closeOverlay').style.display='block';
}

function closeOverlay(){
    document.getElementById('openOverlay').style.display='block'
    document.getElementById('navLinks').style.display='none'
    document.getElementById('closeOverlay').style.display='none';
}

function updateDropdown(dropdown, nextDropdown){
    if ((dropdown == 'country') && ($('#city').value != 'base')) {
        $('#cityList').html("<select name='city' id='city'> <option value='base' selected>-</option> </select>");
    }
    $.ajax({
        url:'populateDropdown.php',
        type:'POST',
        data: {current: dropdown,
            next: nextDropdown,
            selected: document.getElementById(dropdown).value,
            selectedCountry: document.getElementById('country').value},
            success:function(data){
                $('#' + nextDropdown + 'List').html(data);
            },
            error: function(e) {
                console.error(e);
            }
    });
}

function getRecords(){
    $.ajax({
        url:'getRecords.php',
        type:'POST',
        data: {city: document.getElementById('city').value,
        area: document.getElementById('area').value,
        country: document.getElementById('country').value,
        radius: document.getElementById('radius').value,
        records: document.getElementById('records').value,
        order: document.getElementById('order').value,
        eventCode: document.getElementById('eventCode').value,
        minDate: document.getElementById('startDate').value,
        maxDate: document.getElementById('endDate').value,
        recommended: document.getElementById('recommendedEvents').checked,
        tickets: document.getElementById('ticketsAvailable').checked,
        over18: document.getElementById('over18').checked},
        beforeSend: function(){
            $('#eventsRecords').html('<p>Loading...</p>');
        },
        success:function(data){
            $('#eventsRecords').html(data);
        },
        error: function(e) {
            $('#eventsRecords').html('<p>An error occured. Please try again later.</p>');
            console.error(e);
        }
    });
}

function toggleCMSPage(){
    if (document.getElementById('eventsSection').style.display != 'none') {
        document.getElementById('eventsSection').style.display = 'none';
        document.getElementById('cmsSection').style.display = 'block';
    }
    else {
        document.getElementById('cmsSection').style.display = 'none';
        document.getElementById('eventsSection').style.display = 'block';

        if (document.getElementById('editCMSSection').style.display != 'none') {
            document.getElementById('editCMSSection').style.display = 'none';
        }
        else if (document.getElementById('deleteCMSSection').style.display != 'none') {
            document.getElementById('deleteCMSSection').style.display = 'none';
        }
        else if (document.getElementById('viewCMSSection').style.display != 'none') {
            document.getElementById('viewCMSSection').style.display = 'none';
        }
        else if (document.getElementById('addCMSSection').style.display != 'none') {
            document.getElementById('addCMSSection').style.display = 'none';
        }
    }
}

function loadCMSSubPage(subpage, linkID){
    document.getElementById('cmsSection').style.display = 'none';
    document.getElementById(subpage+'CMSSection').style.display = 'block';
    $.ajax({
        url: 'includes/' + subpage + '.inc.php',
        type: 'POST',
        data: {
            id: linkID.substring(subpage.length)
        },
        success: function(data){
            $('#'+subpage+'CMSSection').html(data);
        },
        error: function(e){
            console.error(e);
        }
    });
}

function loadRegistrationPage(){
    if (document.getElementById('eventsSection').style.display != 'none') {
        document.getElementById('eventsSection').style.display = 'none';
    }
    else if(document.getElementById('cmsSection').style.display != 'none'){
        document.getElementById('cmsSection').style.display = 'none';
    }
    else if (document.getElementById('editCMSSection').style.display != 'none') {
        document.getElementById('editCMSSection').style.display = 'none';
    }
    else if (document.getElementById('deleteCMSSection').style.display != 'none') {
        document.getElementById('deleteCMSSection').style.display = 'none';
    }
    else if (document.getElementById('viewCMSSection').style.display != 'none') {
        document.getElementById('viewCMSSection').style.display = 'none';
    }
    else if (document.getElementById('addCMSSection').style.display != 'none') {
        document.getElementById('addCMSSection').style.display = 'none';
    }
    document.getElementById('registrationSection').style.display = 'block';
}
