<?php
    session_start();
    include('connect.php');

    $name = mysqli_real_escape_string($conn,$_GET["name"]);

    $s = mysqli_query($conn, "SELECT * FROM Orders where customer = '$name'");
    while($r = mysqli_fetch_array($s)){
        echo "<tr><th scope='row'><a href='second_page.php?id=".$r['ID']."'>".$r['ID']."</a></th><td>".$r['customer']."</td></tr>";
    }
    mysqli_close($conn);
?>