function openOverlay(){
    document.getElementById("openOverlay").style.display="none"
    document.getElementById("navLinks").style.display="block"
    document.getElementById("closeOverlay").style.display="block";
}

function closeOverlay(){
    document.getElementById("openOverlay").style.display="block"
    document.getElementById("navLinks").style.display="none"
    document.getElementById("closeOverlay").style.display="none";
}

function updateDropdown(id, nextid){
    var country = document.getElementById(id).value;
    document.getElementById(nextid).disabled = false;
}
