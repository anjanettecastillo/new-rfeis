function addVenueSize(counter,size, fee){
    var rbtn = "faci_" + counter;
    if (document.getElementById(rbtn).checked) {
        $("#size").val(size);
        $("#h-fee").val(fee);
    }
}