<?php
require_once "connect.php";
$sql = "SELECT t.*, c.name as `category_name` FROM `tours` t JOIN categories c on c.id = t.category_id";
$arr = querySQL($sql, 1);
echo "<pre>";
echo "</pre>";

if (isset($_COOKIE['notifi'])) {
     $notifi_content = $_COOKIE['notifi'];
     $notifi = "<script>alert('$notifi_content')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>home</title>
     <style>
          table {
               border-collapse: collapse;
          }

          tr {
               text-align: center;
          }

          tr>th,
          tr>td {
               padding: 10px;
               border: 3px solid #000;
          }

          a {
               padding: 8px 15px;
               border: 2px solid #000;
               text-decoration: none;
          }
     </style>
</head>

<body>
     <?php if (isset($notifi)) : ?>
          <?= $notifi ?>
          <?php setcookie('notifi', '', 1); ?>
     <?php endif; ?>

     <h2>tất cả tour</h2>
     <a href="insert.php">
          insert a new tour
     </a>
     <br>
     <br><br>
     <a href="category_insert.php">
          insert a new category
     </a>
     <br><br>
     <table>
          <thead>
               <tr>
                    <th>name</th>
                    <th>image</th>
                    <th>intro</th>
                    <th>des</th>
                    <th>total day</th>
                    <th>price</th>
                    <th>category</th>
                    <th>function</th>
               </tr>
          </thead>
          <tbody>
               <?php foreach ($arr as $e) : ?>
                    <tr>
                         <td><?= $e['name'] ?></td>
                         <td><img style="max-width: 100px" src="./img/<?= $e['image'] ?>" alt="img"></td>
                         <td><?= $e['intro'] ?></td>
                         <td><?= $e['description'] ?></td>
                         <td><?= $e['number_date'] ?></td>
                         <td><?= number_format($e['price']) ?></td>
                         <td><?= $e['category_name'] ?></td>
                         <td>
                              <br>
                              <a href="edit.php?id=<?= $e['id'] ?>">
                                   edit
                              </a>
                              <br><br><br>
                              <a href="del.php?id=<?= $e['id'] ?>" onclick="return confirm('really want to delete this')">
                                   delete
                              </a>
                              <br>
                              <br>
                         </td>
                    </tr>
               <?php endforeach; ?>
          </tbody>
     </table>
</body>

</html>