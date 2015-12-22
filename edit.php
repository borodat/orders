<?php
if (isset($_POST['submit'])) {
  $id = isset($_POST['id']) ? trim(strip_tags($_POST['id'])): null;//Принимаем форму
  $id = mysqli_real_escape_string($cnn, $id);
  $data = "SELECT id, goods, full_price, prepay, contacts FROM orders WHERE id = $id";
  $sql = mysqli_query($cnn, $data);
  if( !$sql ){
    echo mysqli_error($cnn);
    exit;
  } else {
    while ($row = mysqli_fetch_array($sql)){
      $goods = $row['goods'];
      $contacts = $row['contacts'];
      $full_price = $row['full_price'];
      $prepay = $row['prepay'];
    }
  }
} elseif (isset($_POST['update'])) {
  $id = isset($_POST['id']) ? trim(strip_tags($_POST['id'])): null;//Принимаем форму
  $goods = isset($_POST['goods']) ? trim(strip_tags($_POST['goods'])): null;
  $contacts = isset($_POST['contacts']) ? trim(strip_tags($_POST['contacts'])) : null;
  $full_price = isset($_POST['full_price']) ? trim(strip_tags($_POST['full_price'])) : null;
  $prepay = isset($_POST['prepay']) ? trim(strip_tags($_POST['prepay'])) : null;

  $goods = mysqli_real_escape_string($cnn, $goods);//Экранируем спец. символы
  $contacts = mysqli_real_escape_string($cnn, $contacts);
  $full_price = mysqli_real_escape_string($cnn, $full_price);
  $prepay = mysqli_real_escape_string($cnn, $prepay);
  $id = mysqli_real_escape_string($cnn, $id);

  $data = "UPDATE orders SET goods='$goods', contacts='$contacts', full_price='$full_price', prepay='$prepay' WHERE id='$id'";
  $sql = mysqli_query($cnn, $data);
  if( !$sql ){
      echo mysqli_error($cnn);
      exit;
  }
  header('location: index.php?page_id=unsent');
  exit;
}
?>
  <div class="form_box">
    <h3 class="main_color">Главная</h3>
    <form action="index.php?page_id=edit_page" method="post">
      <input type="text" class="hidden" name="id" value="<?php echo $id?>">
      <label for="goods">Товар:</label>
      <textarea type="text" class="rfield" id="goods" name="goods" rows="5" required><?php echo $goods; ?></textarea>
      <label for="contacts">Контакты:</label>
      <input type="text" class="rfield" id="contacts" name="contacts" value="<?php echo $contacts; ?>" required/>
      <div class="half-input">
        <label for="full_price">Сумма заказа:</label>
        <input type="text" class="rfield" id="full_price" name="full_price" value="<?php echo $full_price; ?>"/>
      </div>
      <div class="half-input">
        <label for="prepay">Предоплата:</label>
        <input type="text" class="rfield" id="prepay" name="prepay" value="<?php echo $prepay; ?>"/>
      </div>
      <input type="submit" class="btn_submit" id="update" name="update" value="Отправить данные" />
    </form>

  </div>
