
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>

      th,td{
        vertical-align: top;
        height: 100px;
      }

    </style>

    <title>Order Application!</title>


  </head>
  <body>

    
    <div class="container">
      <h1 class="text-center">Order application</h1>

      <table class="table table-striped text-center">
        <thead> 
          <tr><th colspan="2">Orders</th></tr>

            <?php
              session_start();
              include('connect.php');
              $id = mysqli_real_escape_string($conn,$_GET['id']);

              $s = mysqli_query($conn, "SELECT * FROM Orders inner jOIN (SELECT * FROM OrderItems where  OrderID = '$id') AS sub ON Orders.ID=sub.OrderID inner join Items ON sub.ItemID = Items.ItemID group by Orders.ID");

              $r = mysqli_fetch_array($s);
              echo "<tr><th scope='row'>ID</th><td>".$r['ID']."</td></tr>";
              echo "<tr><th scope='row'>Customer</th><td>".$r['customer']."</td></tr>";
              


              $s = mysqli_query($conn, "SELECT * FROM Orders inner jOIN (SELECT * FROM OrderItems where  OrderID = '$id') AS sub ON Orders.ID=sub.OrderID inner join Items ON sub.ItemID = Items.ItemID");
              echo "<tr><th scope='row'>Items</th><td><table class='table text-center'>";
              while($r = mysqli_fetch_array($s)){
                  echo"<tr><td> ".$r['ItemName']."</td></tr>";
              }
              echo"</table></td></tr>";
              

              
            ?>
            


        </thead>
        <tbody id="result">

        </tbody>
      </table>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>