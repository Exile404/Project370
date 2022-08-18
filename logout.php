<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $nid        = $_POST["nid"];
    $name       = $_POST["name"];
    $location   = $_POST["location"];
    $contact    = $_POST["contact"];
    $email      = $_POST["email"];
    $password   = $_POST["password"];
    $cpassword  = $_POST["cpassword"];
    $exists     = false;
    if(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `user` ( `nid`,`name`,`location`,`contact`,`email`, `password`) VALUES ('$nid','$name','$location','$contact','$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
</head>
<body>
<?php require 'partials/_nav.php' ?>
<?php
if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
}
if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
}
?>


<div class="container my-4">
    <div class="card w-100">
        <div class="card-body">
            <h1 class="text-center">Signup to our E-Ticketing System</h1>
            <form action="signup.php" method="post">
                <div class="form-group">
                    <label for="nid">NID</label>
                    <input type="text" class="form-control" Required id="nid" name="nid" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" Required>
                </div>
                <div class="form-group">
                    <label for="location">Your Location</label>
                    <input type="text" class="form-control" id="location" name="location" aria-describedby="emailHelp" Required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact Number</label>
                    <input type="text" class="form-control" id="contact" name="contact" aria-describedby="emailHelp" Required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" Required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" Required>
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" Required>
                    <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
                </div>

                <button type="submit" class="btn btn-primary">SignUp</button>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
