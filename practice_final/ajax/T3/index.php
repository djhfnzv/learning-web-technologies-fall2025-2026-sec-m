<!DOCTYPE html>
<html>
<head>
    <title>AJAX Form Submission</title>
</head>
<body>

<h2>AJAX Contact Form</h2>

<form id="myForm">
    <label>Name:</label><br>
    <input type="text" id="name" name="name"><br><br>

    <label>Email:</label><br>
    <input type="email" id="email" name="email"><br><br>

    <button type="submit">Submit</button>
</form>

<br>
<div id="response"></div>

<script>
document.getElementById("myForm").addEventListener("submit", function(e) {
    e.preventDefault();

    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;

    var xttp = new XMLHttpRequest();
    xttp.open("POST", "process_form.php", true);
    xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xttp.onreadystatechange = function () {
        if (xttp.readyState === 4) {
            if (xttp.status === 200) {
                document.getElementById("response").innerHTML = xttp.responseText;
            } else {
                document.getElementById("response").innerHTML = "Error processing request.";
            }
        }
    };

    var data = "name=" + encodeURIComponent(name) + "&email=" + encodeURIComponent(email);
    xttp.send(data);
});
</script>

</body>
</html>
