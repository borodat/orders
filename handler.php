<?php
  require('scripts.php');
  if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $res = $_POST['submit'];
    echo $res;
    echo $id;
    if ($status == 'success') {
      switch ($res) {
      case 'заказан':
        $query_update = "UPDATE orders SET is_ordered='0' WHERE id='$id'";
        $update_sent = mysqli_query($cnn, $query_update);
        if($update_sent){
          header('Location: http://localhost/orders/index.php?page_id=unsent');
        }
        break;
      case 'оповещен':
        $query_update = "UPDATE orders SET is_called='0' WHERE id='$id'";
        $update_sent = mysqli_query($cnn, $query_update);
        if($update_sent){
          header('Location: http://localhost/orders/index.php?page_id=unsent');
        }
        break;
      case 'отгружен':
        $query_update = "UPDATE orders SET is_shipped='0' WHERE id='$id'";
        $update_sent = mysqli_query($cnn, $query_update);
        if($update_sent){
          header('Location: http://localhost/orders/index.php?page_id=unsent');
        }
        break;
      default:
        echo 'данных нет';
      }
    } else {
      switch ($res) {
        case 'отгружен':
          $query_update = "UPDATE orders SET is_shipped='1' WHERE id='$id'";
          $update_sent = mysqli_query($cnn, $query_update);
          if($update_sent){
            header('Location: http://localhost/orders/index.php?page_id=unsent');
          }
        case 'оповещен':
          $query_update = "UPDATE orders SET is_called='1' WHERE id='$id'";
          $update_sent = mysqli_query($cnn, $query_update);
          if($update_sent){
            header('Location: http://localhost/orders/index.php?page_id=unsent');
          }
        case 'заказан':
          $query_update = "UPDATE orders SET is_ordered='1' WHERE id='$id'";
          $update_sent = mysqli_query($cnn, $query_update);
          if($update_sent){
            header('Location: http://localhost/orders/index.php?page_id=unsent');
          }
          break;
        default:
          echo 'данных нет';
      }
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