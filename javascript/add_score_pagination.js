function nextPage(str) {
    str = parseInt(str, 10) + 1;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    if (str >= 1 && str <= 2) //ekei p einai to 2 vale pages
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("events").innerHTML = this.responseText;
                document.getElementById("next").setAttribute("name", str);
                document.getElementById("previous").setAttribute("name", str - 1);
            }
        };
    xmlhttp.open("GET", "for_score.php?page=" + str, true);
    xmlhttp.send();
}

function previousPage(str) {
    str = parseInt(str, 10);
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (str != 1) {
                var temp2;
                document.getElementById("events").innerHTML = this.responseText;
                document.getElementById("previous").setAttribute("name", str - 1);
                document.getElementById("next").setAttribute("name", str);
            } else { // gia na mhn paei h prev katw apo to 0
                document.getElementById("events").innerHTML = this.responseText;
                document.getElementById("previous").setAttribute("name", str);
                document.getElementById("next").setAttribute("name", str);
            }

        }
    };
    xmlhttp.open("GET", "for_score.php?page=" + str, true);
    xmlhttp.send();
}
