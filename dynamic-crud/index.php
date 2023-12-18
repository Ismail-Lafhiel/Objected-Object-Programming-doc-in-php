<?php
  
  // Include database file
  include 'classes/customers.php';

  $customerObj = new Employee();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $customerObj->deleteRecord($deleteId);
  }
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP OOP CRUD Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>PHP OOP CRUD Example</h4>
</div><br><br> 

<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Costumer added successfully
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-info alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Costumer updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Costumer deleted successfully
            </div>";
    }
  ?>
  <h2>View Records
    <a href="classes/Add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Salary</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php
          $customers = $customerObj->displayData(); 
          foreach ($customers as $customer) {
        ?>
        <tr>
          <td><?php echo $customer['id'] ?></td>
          <td><?php echo $customer['name'] ?></td>
          <td><?php echo $customer['email'] ?></td>
          <td><?php echo $customer['salary'] ?></td>
          <td>
            <button class="btn btn-primary mr-2"><a href="classes/Edit.php?editId=<?php echo $customer['id'] ?>">
              <i class="fa fa-pencil text-white" aria-hidden="true"></i></a></button>
            <button class="btn btn-danger"><a href="index.php?deleteId=<?php echo $customer['id'] ?>" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash text-white" aria-hidden="true"></i>
            </a></button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>