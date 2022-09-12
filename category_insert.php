<?php
require_once "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $name = $_POST['name'];
     $sql = "SELECT `name` FROM `categories`";
     $arrTemp = querySQL($sql, 1);
     if (!empty($name)) {
          foreach ($arrTemp as $n) {
               if (strtolower($n['name']) == strtolower($name)) {
                    $er = 'Đã tồn tại';
               }
          }
     } else {
          $er = 'empty';
     }
     if (empty($er)) {
          $sql = "INSERT INTO `categories`(`name`) VALUES ('$name')";
          querySQL($sql);
          setcookie('notifi', 'insert success!!!', time() + 3600, '/');
          header('location: index.php');
     }
}
echo "<pre>";
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     <h2>Insert new category</h2>
     <p style="color: red;"><?= isset($er) ? $er : '' ?></p>
     <form method="POST" enctype="multipart/form-data">
          <label for="">Name
               <input type="text" name="name" placeholder="enter category name">
          </label>
          <input type="submit" value="insert">
     </form>
     <a href="index.php">back</a>
</body>

</html>