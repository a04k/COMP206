<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Document</title>
</head>
<body>
<div class="q1">
    <h2>Q1 ~ Calculator</h2>
    <form method="post" action="">
        <input type="number" name="num1" placeholder="Enter first number" required>
        <input type="number" name="num2" placeholder="Enter second number" required>
        <button type="submit" name="calculate">Calculate</button>
    </form>
  <?php
  if(isset($_POST['calculate'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    echo "<h3>Results</h3>";
    echo "<table>";
    echo "<tr><th>Operation</th><th>Result</th></tr>";

    // addition
    $addRes = $num1 + $num2;
    echo "<tr><td>Addition</td><td>$addRes</td></tr>";

    // subtraction
    $subRes = $num1 - $num2;
    echo "<tr><td>Subtraction</td><td>$subRes</td></tr>";

    // subtraction
    $multRes = $num1 * $num2;
    echo "<tr><td>Multiplication</td><td>$multRes</td></tr>";

    // division
    if($num2 != 0) {
      $divRes = $num1 / $num2;
      echo "<tr><td>Division</td><td>$divRes</td></tr>";
    } else {
      echo "<tr><td>Division</td><td>Cannot divide by zero</td></tr>";
    }

    echo "</table><br><br>";
  }
  ?>
</div>

<div class="q2">
    <h2>Q2 ~ FizzBuzz</h2> <!--really sneaky there huh..-->
    <button id="showFizzBuzz">Click to View</button>
    <div class="fizzbuzzRes">
      <?php
      echo "<br>";
      for ($i = 1; $i <= 100; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
          echo "$i is a multiple of 3 and 5 <br>";
        } elseif ($i % 3 == 0) {
          echo "$i is a multiple of 3 <br>";
        } elseif ($i % 5 == 0) {
          echo "$i is a multiple of 5 <br>";
        }
        //    }else{
        //      echo "$i is not a multiple of either <br>" ;
        //    }
      }
      ?>
    </div>
    <script>
        const q2Content = document.querySelector(".fizzbuzzRes");
        const showBtn = document.getElementById("showFizzBuzz");

        let isShown = false;

        showBtn.addEventListener("click", ()=> {
            if (!isShown) {
                q2Content.style.display = "block";
                this.textContent = "Click to Hide";
                isShown = 1;
            } else {
                q2Content.style.display = "none";
                this.textContent = "Click to View";
                isShown = 0;
            }
        });
    </script>
</div>

<div class="q3"><br><br>
    <h2>Q3 ~ Series Sum Calculator</h2>
    <form method="post" action="">
        <label for="x">Enter the value of x:</label>
        <input type="number" id="x" name="x" required placeholder="Enter x"><br>
        <label for="n">Enter the value of n:</label>
        <input type="number" id="n" name="n" required placeholder="Enter n"><br>
        <button type="submit" name="calcSeries">Calculate Series</button>
    </form>
  <?php
  function factorial($n) {
    if ($n <= 1) {
      return 1;
    } else {
      return $n * factorial($n - 1);
    }
  }

  if(isset($_POST['calcSeries'])) {
    $n = $_POST['n'];
    $x = $_POST['x'];

    // Function to calculate sum 1: 1! + 3! + 5! + ... + n!
    function calcSum1($n) {
      $sum = 0;
      for ($i = 1; $i <= $n; $i += 2) {
        $sum += factorial($i);
      }
      return $sum;
    }

    //calculates sum 2: x^0/0! + x^1/1! + x^2/2! + ... + x^n/n!
    function calcSum2($x, $n) {
      $sum = 0;
      for ($i = 0; $i <= $n; $i++) {
        $sum += (pow($x, $i))/(factorial($i));
      }
      return $sum;
    }

    // Calculate sums
    $sum1 = calcSum1($n);
    $sum2 = calcSum2($x, $n);

    // Display results
    echo "<p>Sum 1: $sum1</p>";
    echo "<p>Sum 2: $sum2</p>";
  }
  ?>
</div><br><br>
<div class="q4">
    <h2>Q4 ~ Student Arr Ops</h2>
    <?php
    $students_marks = array(
    "Student1" => array("Maths" => 85, "Physics" => 90, "Chemistry" => 75, "Biology" => 80, "English" => 70),
    "Student2" => array("Maths" => 95, "Physics" => 88, "Chemistry" => 93, "Biology" => 90, "English" => 95),
    "Student3" => array("Maths" => 99, "Physics" => 42, "Chemistry" => 79, "Biology" => 85, "English" => 70),
    "Student4" => array("Maths" => 76, "Physics" => 78, "Chemistry" => 95, "Biology" => 85, "English" => 90),
    "Student5" => array("Maths" => 69, "Physics" => 69, "Chemistry" => 60, "Biology" => 95, "English" => 75)
    );

    $count_students = 0;
    $highest_marks_subject = array();

    foreach ($students_marks as $student => $marks) {
    $total_marks = array_sum($marks);

    if ($total_marks >= 400) {
    $count_students++;
    }

    // find subj with the highest mark for each student
    $max_mark = max($marks);
    $highest_subject = array_search($max_mark, $marks);
    $highest_marks_subject[$student] = $highest_subject;
    }

    echo "Number of students whose total marks are greater than or equal to 400: " . $count_students . "<br><br>";

    echo "Subject with the highest mark for each student:<br>";
    foreach ($highest_marks_subject as $student => $subject) {
    echo "$student: $subject<br>";
    }
    ?>
</div>
</body>
</html>
