<?php 
include 'db.php';
if (isset($_POST['add_students']) ){
    
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    if($fname == "" || empty($fname) || empty($lname) || empty($age)){
        header('location:index.php?message=You need to fill in all fields');
    } else if (!filter_var($age, FILTER_VALIDATE_INT) || $age < 0) {
        header('Location: index.php?intcheck_msg=Age must be a non-negative number');
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: index.php?emailcheck_msg=Invalid email format');
    }
    else{
        $query = "insert into `students` (first_name, last_name, age, email) values ('$fname','$lname','$age','$email')";
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