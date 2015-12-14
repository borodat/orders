<?php
  require('scripts.php');
  if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $res = $_POST['submit'];
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
            echo $id." btn_submit ";
            header('Location: http://localhost/orders/index.php?page_id=unsent');
          }
          break;
        default:
          echo 'данных нет';
      }
    }
  }
$show_status = mysqli_query($cnn, "SELECT id, goods, full_price, prepay, contacts, date, is_ordered, is_called, is_shipped FROM orders WHERE is_shipped='0' ORDER BY id DESC");
    while ($row = mysqli_fetch_array($show_status)){
$status_order = $row['is_ordered'] ? "success" : "";
$status_called = $row['is_called'] ? "success" : "";
$status_shipped = $row['is_shipped'] ? "success" : "";

?>