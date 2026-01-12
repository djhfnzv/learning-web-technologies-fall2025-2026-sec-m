<!DOCTYPE html>
<html>
<head>
    <title>AJAX Example</title>
</head>
<body>

<h2>AJAX Example</h2>

<button onclick="getServerTime()">Get Server Time</button>

<br><br>
<div id="result"></div>

<script>
function getServerTime() {

    var xttp = new XMLHttpRequest();
    xttp.open("GET", "server_time.php", true);

    xttp.onreadystatechange = function () {

        if (xttp.readyState === 4) {
            if (xttp.status === 200) {
                document.getElementById("result").innerHTML = xttp.responseText;
            } else {
                document.getElementById("result").innerHTML = "Error: Unable to fetch server time.";
            }
        }
    };

    xttp.send();
}
</script>

</body>
</html>
