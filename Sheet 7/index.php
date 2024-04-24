<?php include './db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registered Students</title>
</head>
<body>
<h2>Registered Students</h2>
<table border="1">
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Course</th>
    <th>Grade</th>
  </tr>
  <?php
  $students = getStudents();
  foreach ($students as $student) {
    echo "<tr>";
    echo "<td>".$student['id']."</td>";
    echo "<td>".$student['first_name']."</td>";
    echo "<td>".$student['last_name']."</td>";
    echo "<td>".$student['course']."</td>";
    echo "<td><a href='grade.php?id=".$student['id']."'>Grade</a></td>";
    echo "</tr>";
  }
  ?>
</table>
<br>
<a href="addStudents.php">Register New Student</a><br><br>
<form action="search.php" method="post">
  <label for="search">Search:</label>
  <input type="text" name="search">
  <input type="submit" value="Search">
</form>
</body>
</html>
