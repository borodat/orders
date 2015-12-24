<table>
    <caption>
      <h3 class="main_color">Неотгруженные заказы:</h3></caption>
    <tr>
      <th>ID</th>
      <th>Дата</th>
      <th>Товар</th>
      <th>Номер заказчика</th>
      <th>Сумма заказа</th>
      <th>Предоплата</th>
      <th>Заказан у поставщика</th>
      <th>Клиент оповещен</th>
      <th>Отгрузить</th>
      <th>Изменить</th>
    </tr>
<?php
$show_all = mysqli_query($cnn, "SELECT id, goods, full_price, prepay, contacts, date, is_ordered, is_called, is_shipped FROM orders WHERE is_shipped='0' ORDER BY id DESC");
    while ($row = mysqli_fetch_array($show_all)){
    $status_order = $row['is_ordered'] ? "success" : "";
    $status_called = $row['is_called'] ? "success" : "";
    $status_shipped = $row['is_shipped'] ? "success" : "";
?>
<tr>
  <td> <?php echo $row['id']; ?> </td>
  <td> <?php echo $row['date']; ?> </td>
  <td> <?php echo $row['goods']; ?> </td>
  <td> <?php echo $row['contacts']; ?> </td>
  <td> <?php echo $row['full_price']; ?> </td>
  <td> <?php echo $row['prepay']; ?> </td>
  <td> 
    <form action="handler.php" method="post">
      <input type="text" class="hidden" name="id" value="<?php echo $row['id'];?>">
      <input type="text" class="hidden" name="status" value="<?php echo $status_order;?>">
      <input type='submit' name='submit' class='btn_status  <?php echo $status_order; ?>' value='заказан'>
    </form>
  </td>
  <td>
    <form action="handler.php" method="post">
      <input type="text" class='hidden' name="id" value="<?php echo $row['id']; ?>">
      <input type="text" class="hidden" name="status" value="<?php echo $status_called;?>">
      <input type='submit' name='submit' class='btn_status <?php echo $status_called;?>' value='оповещен'>
    </form>
  </td>
  <td>
    <form action="handler.php" method="post">
      <input type="text" class="hidden" name="id" value="<?php echo $row['id']; ?>">
      <input type="text" class="hidden" name="status" value="<?php echo $status_shipped;?>">
      <input type='submit' name='submit' class='btn_status <?php echo $status_shipped;?>' value='отгружен'>
    </form>
  </td>
  <td>
    <form action="index.php?page_id=edit_page" method="post">
      <input type="text" class="hidden" name="id" value="<?php echo $row['id']; ?>">
      <input type='submit' name='submit' class='btn_status normal' value='изменить'>
    </form>
  </td>
</tr>
<?php
    } //end of while
    mysqli_close($cnn);
?>
</table>
  
<div class="form_box">
  <a href="index.php">На главную</a>
  <a href="index?do=logout" class="grey">Выход</a>
</div>
