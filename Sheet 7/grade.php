<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Student</title>
</head>
<body>
    <h2>Grade Student</h2>
    <form action="db.php" method="post">
        <label for="grade">Enter Grade:</label><br>
        <input type="hidden" name="student_id" value="<?php echo $_GET['id']; ?>">
        <input type="number" id="grade" name="grade" min="0" max="100" required><br>
        <input type="submit" value="Submit Grade" name="submit_grade">
    </form>
</body>
</html>
