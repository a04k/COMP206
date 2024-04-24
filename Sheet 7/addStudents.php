<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
<h2>Add Student</h2>
<form action="db.php" method="post">
    <label for="fname">First Name:</label><br>
    <input type="text" id="fname" name="fname" required><br>
    <label for="lname">Last Name:</label><br>
    <input type="text" id="lname" name="lname" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="course">Courses:</label><br>
    <select id="course" name="course" required>
        <option value="104">COMP102</option>
        <option value="102">COMP104</option>
        <option value="206">COMP206</option>
    </select><br>
    <input type="submit" value="Register" name="register">
</form>
<br>
<a href="index.php">View Registered Students</a>
</body>
</html>

