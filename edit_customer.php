<?php include('includes/database.php'); ?>
<?php 
    //get the value 
    $id = $_GET['id'];

    //Create customer select query
    $query = "SELECT * FROM customers 
                INNER JOIN customer_addresses 
                ON customer_addresses.customer = customers.id
                WHERE customers.id =$id";
    $customer = $mysqli->query($query) or die($mysqli->error.__LINE__);
    
    if($customer){
        while($row = $customer->fetch_assoc()){
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $password =  $row['password'];
            $address =  $row['address'];
            $address2 =  $row['address2'];
            $city =  $row['city'];
            $state =  $row['state'];
            $zip =  $row['zip'];
            echo $first_name;
        }
        $customer -> close();
    }
?>

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
        
        //create customer update
        $query = "UPDATE customers SET
                    first_name='$first_name', 
                    last_name='$last_name', 
                    email='$email', 
                    password='$password' 
                WHERE id=$id";  
        //run query
        $mysqli->query($query);
        
        //create address update
        $query = "UPDATE customer_addresses SET
                    address='$address', 
                    address2='$address2', 
                    city='$city', 
                    state='$state', 
                    zip='$zip'
                WHERE customer=$id";   
        //run query
        $mysqli->query($query);
        
        $msg='Customer Updated';
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
    <title>CManager | Edit Customer</title>
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
         <h2>Edit Customers</h2>
           
            <form role="form" method="post" action="edit_customer.php?id=<?php echo $id?>">
                <div class="form-group">
                    <label >First Nmae</label>
                    <input name="first_name" type="text" class="form-control" value="<?php echo $first_name;?>" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label >Last Nmae</label>
                    <input name="last_name" type="text" class="form-control" value="<?php echo $last_name;?>" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label >Email address</label>
                    <input name="email" type="email" class="form-control" value="<?php echo $email;?>" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name = "password" type="password" class="form-control" value="<?php echo $password;?>" placeholder="Password">
                </div>
                
                <div class="form-group">
                    <label >Address</label>
                    <input name="address" type="text" class="form-control" value="<?php echo $address;?>" placeholder="Address">
                </div>
                <div class="form-group">
                    <label >Address 2</label>
                    <input name="address2" type="text" class="form-control" value="<?php echo $address2;?>" placeholder="Address 2">
                </div>
                <div class="form-group">
                    <label >City</label>
                    <input name="city" type="text" class="form-control" value="<?php echo $city;?>" placeholder="City">
                </div>
                <div class="form-group">
                    <label >State</label>
                    <input name="state" type="text" class="form-control" value="<?php echo $state;?>" placeholder="State">
                </div>
                <div class="form-group">
                    <label >Zip</label>
                    <input name="zip" type="text" class="form-control" value="<?php echo $zip;?>" placeholder="Zip">
                </div>
  
 
             <input type="submit" class="btn btn-default" value="Update Customer"/>
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