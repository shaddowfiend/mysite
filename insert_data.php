<?php 
include 'db.php';
if (isset($_POST['add_students']) ){
    
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    if($fname == "" || empty($fname) || empty($lname) || empty($age)){
        header('location:index.php?message=You need to fill in all fields');
        
    } else if (!filter_var($age, FILTER_VALIDATE_INT) || $age < 0) {
        header('Location: index.php?intcheck_msg=Age must be a non-negative number');
    }
    else{
        $query = "insert into `students` (first_name, last_name, age) values ('$fname','$lname','$age')";
        $result = mysqli_query($connection,$query);
        
        if(!$result){
            die("Querry Failed".mysqli_error($connection));
        }
        else{
            header('location:index.php?insert_msg=Your data has been added successfully');
        }
    }
}

?>