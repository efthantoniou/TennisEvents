function deleteThis(elementkick){
    var temp = $(elementkick).attr('name');
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        
        $(elementkick).remove();
    };
    xmlhttp.open("GET", "delete.php?id=" + temp, true);
    xmlhttp.send();
}