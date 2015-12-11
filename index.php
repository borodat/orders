<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
</head>
<body>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cards</title>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php" class="grey">Главная</a></li>
            <li><a href="index.php?page_id=all" class="grey">Все заказы</a></li>
            <li><a href="index.php?page_id=unsent" class="grey">Неотгруженные</a></li>
            <li><a href="index.php?page_id=edit" class="grey">Редактировать</a></li>
            <li><a href="../cards/" class="green">Карточки</a></li>
        </ul>
    </nav>
<?php
require('scripts.php');
if(isset($_GET['page_id'])){
    $page_id = $_GET['page_id'];
    switch ($page_id){
    case "all":
        require('show_all.php');
        break;
    case "unsent":
        require('show_unshipped.php');
        break;
    case "edit":
        require('show_for_edit.php');
        break;
    case "edit_page":
        require('edit.php');
        break;
    case "success":
        require('success.php');
        break;
    case "success_sent":
        require('success_sent.php');
        break;
    }
   
} else {// если page_id не указан грузим главную

if(isset($_POST['submit'])){
        $goods = isset($_POST['goods']) ? trim(strip_tags($_POST['goods'])): null;//Принимаем форму
        $contacts = isset($_POST['contacts']) ? trim(strip_tags($_POST['contacts'])) : null;
        $full_price = isset($_POST['full_price']) ? trim(strip_tags($_POST['full_price'])) : null;
        $prepay = isset($_POST['prepay']) ? trim(strip_tags($_POST['prepay'])) : null;
    
        $goods = mysqli_real_escape_string($cnn, $goods);//Экранируем спец. символы
        $contacts = mysqli_real_escape_string($cnn, $contacts);
        $full_price = mysqli_real_escape_string($cnn, $full_price);
        $prepay = mysqli_real_escape_string($cnn, $prepay);
        
        $data = "INSERT INTO orders (goods, contacts, full_price, prepay) VALUES ('$goods', '$contacts', '$full_price', $prepay)";
        $sql = mysqli_query($cnn, $data);
        if( !$sql ){
            echo mysqli_error($cnn);
            exit;
        }
        header('location: index.php');
        exit;
    }    
    
?>
    <div class="form_box">
        <h3 class="main_color">Главная</h3>
        <form action="index.php" method="post">
            <label for="card_id">Товар:</label>
            <textarea type="text" class="rfield" name="goods"  placeholder="Минвата" required></textarea>
            <label for="persona">Контакты:</label>
            <input type="text" class="rfield" name="contacts" placeholder="0981112233" required/>
            <label for="user_phone">Сумма заказа:</label>
            <input type="text" class="rfield" name="full_price" placeholder="333"/>
            <label for="user_phone">Предоплата:</label>
            <input type="text" class="rfield" name="prepay" placeholder="155"/>
            <input type="submit" class="btn_submit" name="submit" value="Отправить данные" />
        </form>
        
    </div>
<?php }// конец елс?>
</body>
</html>
</body>
</html>