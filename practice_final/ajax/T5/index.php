<!DOCTYPE html>
<html>
<head>
    <title>AJAX JSON Example</title>
</head>
<body>

<h2>Load Student Data Using AJAX</h2>

<button onclick="loadStudent()">Load Student Data</button>

<br><br>
<div id="studentData"></div>

<script>
function loadStudent() {
    var xttp = new XMLHttpRequest();
    xttp.open("GET", "get_student.php", true);

    xttp.onreadystatechange = function () {
        if (xttp.readyState === 4) {

            if (xttp.status === 200) {
                try {
                    var student = JSON.parse(xttp.responseText);

                    var output  = "<b>ID:</b> " + student.id + "<br>";
                    output += "<b>Name:</b> " + student.name + "<br>";
                    output += "<b>Email:</b> " + student.email + "<br>";
                    output += "<b>Department:</b> " + student.department;

                    document.getElementById("studentData").innerHTML = output;

                } catch (e) {
                    document.getElementById("studentData").innerHTML =
                        "Error: Invalid JSON response.";
                }

            } else {
                document.getElementById("studentData").innerHTML =
                    "Error: Unable to load data from server.";
            }
        }
    };

    xttp.send();
}
</script>

</body>
</html>
