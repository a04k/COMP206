<?php
$servername = "localhost";
$username = "amogus";
$password = "amogus";
$dbname = "sheet7";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}

function addStudent($fname, $lname, $email, $course) {
  global $conn;
  try {
    $sql = "INSERT INTO student (fname, lname, email) VALUES ('$fname', '$lname', '$email')";
    $conn->exec($sql);

    $student_id = $conn->lastInsertId();

    // just to add to the other table.
    $sql = "INSERT INTO student_course (student_id, Course_Code) VALUES ($student_id, $course)";
    $conn->exec($sql);

    echo "New student registered successfully";
  } catch(PDOException $e) {
    return "Error: " . $e->getMessage();
  }
}

if(isset($_POST['register'])) {
  // to fetch form data from addStudents.php
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $course = $_POST['course'];

  $result = addStudent($fname, $lname, $email, $course);
  echo $result;
}


function updateGrade($student_id, $grade) {
  global $conn;
  try {
    $sql = "UPDATE student_course SET grade = $grade WHERE student_id = $student_id";
    $conn->exec($sql);
    return "Grade updated successfully";
  } catch(PDOException $e) {
    return "Error: " . $e->getMessage();
  }
}

if(isset($_POST['submit_grade'])) {
  $student_id = $_POST['student_id'];
  $grade = $_POST['grade'];

  $result = updateGrade($student_id, $grade);
  echo $result;
}

function getStudents() {
  global $conn;
  try {
    $sql = "SELECT student.student_id AS id, student.fname AS first_name, student.lname AS last_name, course.name AS course, student_course.grade AS grade 
            FROM student 
            INNER JOIN student_course ON student.student_id = student_course.student_id 
            INNER JOIN course ON student_course.Course_Code = course.Course_Code";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
    return "Error: " . $e->getMessage();
  }
}

?>
