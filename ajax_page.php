<?php
    session_start();
    include('connect.php');

    $name = mysqli_real_escape_string($conn,$_GET["name"]);

    $s = mysqli_query($conn, "SELECT * FROM Orders where customer = '$name'");

    $emparray = array();
    while($row =mysqli_fetch_assoc($s)){
        //echo "<tr><th scope='row'><a href='second_page.php?id=".$r['ID']."'>".$r['ID']."</a></th><td>".$r['customer']."</td></tr>";
        $emparray[] = $row;
    }
    echo json_encode($emparray);//以json格式傳至前端
    
    mysqli_close($conn);
?>