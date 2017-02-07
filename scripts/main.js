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
        $('#cityList').html('<select name='city' id='city'> <option value='base' selected>-</option> </select>');
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
                records: document.getElementById('records').value},
        success:function(data){
            $('#eventsRecords').html(data);
        },
        error: function(e) {
            console.error(e);
        }
    });
}
