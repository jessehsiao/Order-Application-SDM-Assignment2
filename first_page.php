
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>

      $(document).ready(function(){
          $("#btn1").click(function(){
              // Get value from input element on the page
              var name = $("#searchName").val();
              // Send the input data to the server using get

              $.get("ajax_page.php", {name: name} , function(response){
                  // Display the returned data in browser
                  
                  data = JSON.parse(response)
                  var s=""

                  console.log(data)

                  for (let i = 0; i < data.length; i++){
                    s += "<tr><th scope='row'><a href='second_page.php?id="+data[i].ID+"'>"+data[i].ID+"</a></th><td>"+data[i].customer+"</td></tr>"; 
                  }
                  
                  $("#result").html(s);
              });
          });
      });

    </script>

    <title>Order Application!</title>

  </head>
  <body>

    
  <div class="container">
      <h1 class="text-center">Order application</h1>

      <div class="input-group mb-3">
        <input type="text" class="form-control" id="searchName" placeholder="Search by name" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="btn1">Search</button>
        </div>
      </div>

      <table class="table table-striped text-center">
        <thead>
          <tr><th colspan="2">Orders</th></tr>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Customer</th>
          </tr>
        </thead>
        <tbody id="result">
        <tr><th colspan="2">No Order</th></tr>

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