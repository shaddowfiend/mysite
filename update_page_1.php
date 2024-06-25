<?php include("header.php"); ?>
<?php include("db.php"); ?>


<?php 
if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "select * from students where id = $id";

    $result = mysqli_query($connection, $query);

    if(!$result)
        die("query Failed".mysqli_error());
    else
        $row = mysqli_fetch_assoc($result);       
    }   



    if(isset($_POST['update_students'])){

        if (isset($_GET['id_new'])) {
            $idnew = $_GET['id_new'];
        }

        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $age = $_POST['age'];

        $query = "update students set first_name = '$fname',last_name = '$lname', age = $age where id = $idnew";

        $result = mysqli_query($connection, $query);
            
            if(!$result){
                die("query Failed".mysqli_error());
            }else{
                header('location:index.php?update_msg=You have successfully update the data.');
            }
    }

?>


<form action="update_page_1.php?id_new=<?php echo isset($id) ? $id : ''; ?>" method="post">

    <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control" value="<?php echo isset($row['first_name']) ? htmlspecialchars($row['first_name']) : ''; ?>">
    </div>
    <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" name="l_name" class="form-control" value="<?php echo isset($row['last_name']) ? htmlspecialchars($row['last_name']) : ''; ?>">
    </div>
    <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" value="<?php echo isset($row['age']) ? htmlspecialchars($row['age']) : ''; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>


<?php include("footer.php"); ?>