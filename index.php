<?php include("header.php"); ?>
<?php include("db.php"); ?>

  <?php 
    if (isset($_GET['message'])) {
        echo "<h6>" . $_GET['message'] . "</h6>";
    }
    ?>
    <?php 
    if (isset($_GET['insert_msg'])  ) {
        echo "<h6 style='color: green;'>" . $_GET['insert_msg'] . "</h6>";
    }
    ?>
    <?php 
    if (isset($_GET['intcheck_msg'])  ) {
        echo "<h6 style='color: red;'>" . $_GET['intcheck_msg'] . "</h6>";
    }
    ?>
    <?php 
    if (isset($_GET['delete_msg'])) {
        echo "<h6 style='color: green;'>" . $_GET['delete_msg'] . "</h6>";
    }
    ?>

        <div class="box1">
        <h2>ALL STUDENTS</h2>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD STUDENTS</button>
        </div>
    <table class = "table table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th>Number</th>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
    <?php
        $count = 1;
        
        $query = "SELECT * FROM `students`";
        $result = mysqli_query($connection, $query);
        
        if(!$result){
            die("Query failed: " . mysqli_error($connection));
        } else {

            while($row = mysqli_fetch_assoc($result)){
    ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><a href="update_page_1.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-danger">Delete</a></td>
                </tr>
    <?php
            }
        }
    ?>
</tbody>
    </table>

<?php 
$error_message = '';
if (isset($_GET['insert_msg'])) {
    $error_message = $_GET['insert_msg'];
    echo "<script type='text/javascript'>
            $(document).ready(function(){
                $('#exampleModal').modal('show');
            });
          </script>";
}
?>

<form name="studentForm" action="insert_data.php" method="post" onsubmit="return validateForm()">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <?php if (!empty($error_message)) { ?>
            <div class="alert alert-danger">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>
        <div id="error_message" class="alert alert-danger" style="display: none;"></div>
            <div class="form-group">
            <label form="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control">
            </div>
            <div class="form-group">
            <label form="l_name">Last Name</label>
            <input type="text" name="l_name" class="form-control">
            </div>
            <div class="form-group">
            <label form="age">Age</label>
            <input type="text" name="age" class="form-control">
            </div>
            <div class="form-group">
            <label form="email">Email</label>
            <input type="text" name="email" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="SAVE">
      </div>
    </div>
  </div>
</div>
</form>

<?php include("footer.php"); ?>