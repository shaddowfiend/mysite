<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel = "stylesheet" type="text/css" href="style.css">
    <script>
        function validateForm() {
            var fname = document.forms["studentForm"]["f_name"].value.trim();
            var lname = document.forms["studentForm"]["l_name"].value.trim();
            var age = document.forms["studentForm"]["age"].value.trim();
            var email = document.forms["studentForm"]["email"].value.trim();
            var errorMsg = "";

        var specialChars = /[\uD83C-\uDBFF\uDC00-\uDFFF\u2600-\u26FF\u2700-\u27BF!@#$%^&*(),.?":{}|<>]/;

        if (specialChars.test(fname)) {
            errorMsg += "First Name cannot contain emojis or special symbols.<br>";
        }

        if (specialChars.test(lname)) {
            errorMsg += "Last Name cannot contain emojis or special symbols.<br>";
        }

        if (fname == "" || lname == "" || age == "") {
            errorMsg += "All fields must be filled out.<br>";
        }

        if (isNaN(age) || age < 0) {
            errorMsg += "Age must be a non-negative integer.<br>";
        }

        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            errorMsg += "Invalid email format.<br>";
        }

        if (errorMsg != "") {
            document.getElementById("error_message").innerHTML = errorMsg;
            document.getElementById("error_message").style.display = "block";
            return false;
        }

        return true;
        }
    </script>
    
</head>
<body>
    <h1 id = "main_title">CRUD App in PHP</h1>
    <div class = "container"></div>