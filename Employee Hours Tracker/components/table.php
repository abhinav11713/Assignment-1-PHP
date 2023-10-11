<!-- Table -->
<?php
  $query = 'SELECT * FROM randomtable11713';
  $result = $db->getData($query);
?>
<table>
  <thead>
    <th>#</th>
    <th>Name</th>
    <th>ID</th>
    <th>Shift Date</th>
    <th>Hours Worked</th>
  </thead>
  <tbody>
    <?php
      $i = 1;
      foreach($result as $key => $res){
        echo "<tr>";
          echo "<td>".$i."</td>";
          echo "<td>".$res['emp_name']."</td>";
          echo "<td>".$res['emp_id']."</td>";
          echo "<td>".$res['shift_date']."</td>";
          echo "<td>".$res['hours']."</td>";
        echo "</tr>";
        $i++;
      }
    ?>
  </tbody>
</table>