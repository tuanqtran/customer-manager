<?php 
    require('config.php');
    include('includes/database.php');
?>
<?php 
    // Create the select query.
    $query = "SELECT * FROM customers
            INNER JOIN customer_addresses
            ON customer_addresses.customer=customers.id
            ORDER BY join_date";

    // GET results
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CManage | Dashboard</title>
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/css/jumbotron-narrow.css">
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
    </head>

    <body>

        <div class="container">
            <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="add_customer.php">Add Customer</a></li>
                    </ul>
                </nav>
                <h3 class="text-muted">Store CManager</h3>
            </div>

            <div class="row marketing">
                <div class="col-lg-12">
                    <?php if(isset($_GET['msg'])){ ?>
                        <div class="msg"><?php echo $_GET['msg']; ?></div>
                        <?php
                    }?>
                    <h2>Customers</h2>
                    <table class="table table-striped">
                        <tr>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                        <!-- Check if at least one row is found. -->
                        <?php if($result->num_rows > 0) {
                            // Loop through results.
                            while($row = $result->fetch_assoc()){
                                ?>
                                <!-- Display customer info -->
                                <tr>
                                    <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['address'].' '.$row['city'].' '.$row['state']; ?></td>
                                    <td><a href="edit_customer.php?id=<?php echo $row['id']; ?>" class="btn btn-default btn-sm">Edit</a></td>
                                </tr>

                                <?php
                            }
                        }else{
                            echo "Sorry, no customers were found.";                            
                        }?>
                    </table>
                </div>
            </div>

            <footer class="footer">
            </footer>

        </div> <!-- /container -->
    </body>
</html>
