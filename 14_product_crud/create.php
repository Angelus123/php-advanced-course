<?php

use app\Database;
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=products_crud;', 'iz', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $products = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';
// exit();
$errors =[];
if ($_SERVER['REQUEST_METHOD']=='POST'){
$productInfo=$_POST;
$title=$productInfo['title'];
$description=$productInfo['description'];
$price=$productInfo['price'];
$date=date('Y-m-d H:i:s');


if(!$title){
   
    $errors[] = "Title is required";
 
}
if(!$price){
    $errors[] = "Price is required";
}
// echo '<pre>';
// print_r($errors);
// echo '</pre>';
//poor security
// $statement = $pdo->prepare("INSERT INTO products (title,description,image,price,create_date) VALUE ('$title','$description','','$price','$date')");
// $statement->execute();
//advanced insert
if(!empty($errors)){
$statement = $pdo->prepare("INSERT INTO products (title,description,image,price,create_date) 
VALUEs (:title, :description, :image, :price, :date)");

$statement->bindValue(':title', $title);
$statement->bindValue(':description', $description);
$statement->bindValue(':image', '');
$statement->bindValue(':price', $price);
$statement->bindValue(':date', $date);
$statement->execute();
}
echo '<pre>';
print_r($errors);
echo '</pre>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Normal css -->
    <link rel="stylesheet" href="app.css">

    <title>Create a product</title>
</head>
<body>
    <h1>Create CRUD <?php empty($rrors) ?></h1>
    <?php if(empty($rrors)):?>
    <div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
        
    </div>
    <?php  endif; ?>
    <form action="" method="post">
        <div class="mb-3">
                <label  class="form-label">File</label>
                <input type="file" class="form-control" name="file" placeholder="Enter product title">
            </div>
            <div class="mb-3">
                <label  class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter product title">
            </div>
            <div class="mb-3">
                <label  class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Enter product title">
            </div>
    
            <input type="submit" value="Submit" class="btn-primary">
    
        </form>
    
</body>
</html>