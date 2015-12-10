<?php
  require('scripts.php');
  if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $res = $_POST['submit'];
    echo $res;
    echo $id;
    switch ($res) {
      case 'заказан':
        $query_update = "UPDATE orders SET is_ordered='1' WHERE id='$id'";
        $update_sent = mysqli_query($cnn, $query_update);
        if($update_sent){
          header('Location: http://localhost/orders/index.php?page_id=unsent');
        }
        break;
      case 'оповещен':
        echo 'OK!';
        break;
      case 'отгружен':
        echo 'OK!';
        break;
      default:
        echo 'данных нет';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  
</body>
</html>