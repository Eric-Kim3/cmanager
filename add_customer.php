<?php include('includes/database.php'); ?>
<?php
    if($_POST){
        
        $first_name = $_POST['first_name'];
        $last_name = ($_POST['last_name']);
        $email = ($_POST['email']);
        $password =  (md5($_POST['password']));
        $address =  ($_POST['address']);
        $address2 =  ($_POST['address2']);
        $city =  ($_POST['city']);
        $state =  ($_POST['state']);
        $zip =  ($_POST['zip']);
        
        //create customer query
        $query = "INSERT INTO customers (first_name, last_name, email, password) 
                            VALUES ('$first_name', '$last_name', '$email', '$password')";   
        //run query
        $mysqli->query($query);
        
        //create address query
        $query = "INSERT INTO customer_addresses (customer, address, address2, city, state, zip) 
                            VALUES ('$mysqli->insert_id','$address', '$address2', '$city', '$state', '$zip')";   
        //run query
        $mysqli->query($query);
        
        $msg='Customer Added';
        header('Location: index.php?msg='.urlencode($msg).'');
        
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CManager | Add Customer</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li ><a href="index.php">Home</a></li>
          <li class="active"><a href="add_customer.php">Add Customer</a></li>
        </ul>
        <h3 class="text-muted">Store CManager</h3>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
         <h2>Add Customers</h2>
           
            <form role="form" method="post" action="add_customer.php">
                <div class="form-group">
                    <label >First Nmae</label>
                    <input name="first_name" type="text" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label >Last Nmae</label>
                    <input name="last_name" type="text" class="form-control" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label >Email address</label>
                    <input name="email" type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name = "password" type="password" class="form-control" placeholder="Password">
                </div>
                
                <div class="form-group">
                    <label >Address</label>
                    <input name="address" type="text" class="form-control" placeholder="Address">
                </div>
                <div class="form-group">
                    <label >Address 2</label>
                    <input name="address2" type="text" class="form-control" placeholder="Address 2">
                </div>
                <div class="form-group">
                    <label >City</label>
                    <input name="city" type="text" class="form-control" placeholder="City">
                </div>
                <div class="form-group">
                    <label >State</label>
                    <input name="state" type="text" class="form-control" placeholder="State">
                </div>
                <div class="form-group">
                    <label >Zip</label>
                    <input name="zip" type="text" class="form-control" placeholder="Zip">
                </div>
  
 
             <input type="submit" class="btn btn-default" value="Add Customer"/>
            </form>
       
        </div>

       
      </div>

      <div class="footer">
        <p>&copy; Company 2014</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>