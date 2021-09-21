<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Display PDF</title>
    <style media="screen">
      embed{
        border: 2px solid black;
        margin-top: 30px;
      }
      .div1{
        margin-left: 170px;
      }
      table{
          border:2px solid red;
          background-color:#FFC;
      }
      th{
          border-bottom:5px solid #000;
      }
      td{
          border-bottom:2px solid #666;
      }
    </style>
  </head>
  <body>
    <div class="div1">
      <?php
      include 'config.php';

      $sqlget = "SELECT * FROM profiles";
      $sqldata = mysqli_query($conn,$sqlget) or die('error getting data');
      echo "<table>";
      echo "<tr><th>ID</th><th>Username</th><th>Password</th><th>Date</th></tr>";
      while($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
          echo "<tr></td>";
          echo $row['id'];
          echo "</td><td>";
          echo $row['username'];
          echo "</td><td>";
          echo $row['password'];
          echo "</td><td>";
          echo $row['created_at'];
          echo "</td></tr>";

      }
      echo "</table>";
      $sql="SELECT PDF from files";
      $query=mysqli_query($conn,$sql);
      while ($info=mysqli_fetch_array($query)) {
        ?>
      <embed type="application/pdf" src="pdf/<?php echo $info['pdf'] ; ?>" width="900" height="500">
    <?php
      }

      ?>

    </div>

  </body>
</html>