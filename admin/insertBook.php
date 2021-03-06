<?php include "../dbconfig.php";
isAuth();
?>
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
    <?php include "include/header.php";?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
            <?php include "include/side.php";?>
            </div>
            <div class="col-9">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="">title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="">author</label>
                        <input type="text" class="form-control" name="author">
                    </div>
                    <div class="mb-3">
                        <label for="">isbn</label>
                        <input type="text" class="form-control" name="isbn">
                    </div>
                    <div class="mb-3">
                        <label for="">decription</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">price</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="">discount_price</label>
                        <input type="text" class="form-control" name="discount_price">
                    </div>
                    <div class="mb-3">
                        <label for="">cover</label>
                        <input type="file" class="form-control" name="cover">
                    </div>
                    <div class="mb-3">
                        <label for="">genre_id</label>
                        <select class="form-select" name="genre_id">
                       <?php 
                        $callinggenre = mysqli_query($connect,"select * from genre");
                        while($row = mysqli_fetch_array($callinggenre)){
                        ?>
                           <option value="<?= $row['id'];?>"><?= $row['cat_title'];?></option>
                           <?php } ?>
                       </select>
                    </div>
                    <div class="mb-3">
                        <label for="">nop</label>
                        <input type="text" class="form-control" name="nop">
                    </div>
                    <div class="mb-3">
                        <input type="submit"  name="save" class="btn btn-info w-100">
                    </div>
                </form>
                <?php
                    if(isset($_POST['save'])){
                        $data = [
                            'title' => $_POST['title'],
                            'author' => $_POST['author'],
                            'isbn' => $_POST['isbn'],
                            'description' => $_POST['description'],
                            'price' => $_POST['price'],
                            'discount_price' => $_POST['discount_price'],
                            'cover' => $_FILES['cover']['name'],
                            'genre_id' => $_POST['genre_id'],
                            'nop' => $_POST['nop']
                        ];

                        $tmp_cover = $_FILES['cover']['tmp_name'];
                        move_uploaded_file($tmp_cover,"../images/" . $_FILES['cover']['name']);

                        $query = insertData("books",$data);
                        
                    if($query){
                        echo "success";
                    }
                    else{
                        echo "failed";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
