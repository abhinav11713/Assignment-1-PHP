<!DOCTYPE html>
<html lang="en">
<head>
  <!-- SEO -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Abhinav Singh">
  <meta name="description" content="Employee Hours tracking dynamic website made using HTML, CSS, and PHP">
  <meta name="robots" content="noindex, nofollow">

  <title>Track Employee Working Hours</title>

  <!-- Stylesheets & More -->
  <link rel="stylesheet" type="text/css" href="/stylesheets/styles.css">
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/38e0495f56.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Header -->
  <header>
    <?php  
      include("components/header.php");
    ?>

  </header>

  <aside>
    <div class="admin__information">
      <b>Admin:</b> Fagun Vankawala<br>
      <b>Admin Plan:</b> Premium<br>
      <b>Company Name:</b> TechInfo INC.
    </div>
  </aside>

  <!-- Main -->
  <main>
    <div class="employee__form">
      <h1>
        Add Employee Information 
      </h1>
      <form class="employee__form__fields" action="/" method="POST">
        <input type="text" name="ename" placeholder="Name of Employee" required>
        <input type="text" name="id" placeholder="ID of Employee" required>
        <?php
          $dateToday = date('Y-m-d');
          echo "<input type='date' name='date' min='2023-01-01' max='$dateToday' value='$dateToday' required>";
        ?>
        <input type="number" name="hours" min="1" max="24" placeholder="Hours to Add" required>
        <button class="btn btn--light" type="submit">Add</button>
        <?php
          if (isset($_POST['ename'])) {
            // Store everything
            $name = $_POST['ename'];
            $id = $_POST['id'];
            $date = $_POST['date'];
            $number = $_POST['hours'];

            // Make new Connection
            $con = mysqli_connect('localhost', 'root', '', 'mydb');

            $nameFine = false;
            $idFine = false;

            if (strlen($name) <= 30) {
              $nameFine = true;
            }
            else {
              echo "<p class='error-message'>Name should be less 50 chars</p>";
            }

            if (strlen($id) <= 10) {
              if (preg_match("/^[0-9]+$/", $id)){
                $idFine = true;        
              }
              else {
                echo "<p class='error-message'>ID should be numeric</p>";
              }      
            }
            else {
              echo "<p class='error-message'>ID should be less than 10 digits</p>";
            }
            
            if ($nameFine && $idFine) {
              $addquery = "INSERT INTO randomtable11713 VALUES ('$name', '$id', '$date', '$number')";
              try {
                mysqli_query($con, $addquery);
                echo "<p class='success-message'>Added Successfully</p>";
              }
              catch (mysqli_sql_exception $e) {
                echo "<p class='error-message'>ID already exists</p>";
              }
            }
          }
        ?>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer>
    <?php 
      include("components/footer.php");
    ?>
  </footer>
</body>
</html>