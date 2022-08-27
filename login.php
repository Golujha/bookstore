<?php include "dbConfig.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php include "header.php";?>

    <div class="container">
        <div class="row">
            <div class="col-3 mx-auto mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="fw-bold">LOGIN Here</h3>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="login" value="Login" class="btn btn-info w-100">
                            </div>
                        </form>
                        <?php
                             if(isset($_POST['login'])){
                                 $email = $_POST['email'];
                                 $password = $_POST['password'];
                                 $query = mysqli_query($connect,"select * from admin where email='$email' AND password='$password'");
                                 $count = mysqli_num_rows($query);
                                 if($count > 0){
                                     // login success
                                     $_SESSION['admin'] = $email;
                                     echo "<script>window.open('admin/index.php','_self')</script>";
                                 }
                                 else{
                                     // login fail
                                     echo "<script>alert('username & password is incorrect')</script>";
                                 }
                             };
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>