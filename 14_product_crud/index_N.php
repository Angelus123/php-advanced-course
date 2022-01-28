<?php
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=products_crud;', 'iz', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($products);
// echo '</pre>';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Normal css -->
    <link rel="stylesheet" href="app.css">
    <title>Product CRUD</title>
</head>

<body>

    <h1>Product CRUD</h1>
    <a href="create.php" class="btn btn-sm btn-success">CREATE PRODUCT</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">image</th>
                <th scope="col">price</th>
                <th scope="col">create_date</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $key => $value) : ?>
                <tr>
                    <td scope='row'><?php $value['id'] ?></td>
                    <td><?php echo $value['title'] ?></td>
                    <td><?php echo $value['description'] ?></td>
                    <td><?php echo $value['image'] ?></td>
                    <td><?php echo $value['price'] ?></td>
                    <td><?php echo $value['create_date'] ?></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-primary">EDIT</button>
                        <button type="button" class="btn btn-sm btn-outline-danger">DELETE</button>
                    </td>
                </tr>
            <?php endforeach ?>


        </tbody>
    </table>
</body>

</html>