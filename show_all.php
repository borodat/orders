<table>
        <caption><h3 class="main_color">Все заказы:</h3></caption>
    <tr><th>ID</th><th>Дата</th><th>Товар</th><th>Номер заказчика</th><th>Сумма заказа</th><th>Предоплата</th><th>Заказан</th><th>Оповещен</th><th>Отгружен</th></tr>
<?php
    $show_all = mysqli_query($cnn, "SELECT id, goods, full_price, prepay, contacts, date, is_ordered, is_called, is_shipped FROM orders ORDER BY id DESC");
    while ($row = mysqli_fetch_array($show_all)){
?>
<tr>
  <td><?php echo $row['id']; ?></td>
  <td><?php echo $row['date']; ?></td>
  <td><?php echo $row['goods']; ?></td>
  <td><?php echo $row['contacts']; ?></td>
  <td><?php echo $row['full_price']; ?></td>
  <td><?php echo $row['prepay']; ?></td>
  <td><?php echo $row['is_ordered']; ?></td>
  <td><?php echo $row['is_called']; ?></td>
  <td><?php echo $row['is_shipped']; ?></td>
<?php
    }//end of while
    mysqli_close($cnn);
?>
</table>
<div class="form_box">
    <a href="index.php">На главную</a>
    <a href="show_all.php?do=logout" class="grey">Выход</a>
</div>