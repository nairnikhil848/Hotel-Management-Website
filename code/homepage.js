
function sugg(str) {
    if (str.length == 0) {
        document.getElementById("ps").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ps").innerHTML = this.responseText;
                
                
            }
        };
        xmlhttp.open("GET", "search.php?q=" + str, true);
        xmlhttp.send();
    }
}
//var myPhpValue = $("#myPhpValue").val();
//var hello="myvoi";
//$("#acc").html("hello");
//$("#myPhpVaue").html("man");