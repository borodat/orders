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
if(isset($_GET['page_id'])){
    $page_id = $_GET['page_id'];
    switch ($page_id){
    case "all":
        require('show_all.php');
        break;
    case "unsent":
        require('show_unsent.php');
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
?>
    <div class="form_box">
        <h3 class="main_color">Главная</h3>
        <form action="index.php" method="post">
            <label for="card_id">Товар:</label>
            <textarea type="text" class="rfield" name="card_id"  placeholder="Минвата" required></textarea>
            <label for="persona">Контакты:</label>
            <input type="text" class="rfield" name="name" placeholder="0981112233" pattern="^[А-Яа-яІіЇїЄє\s\.]+$" maxlength="50" required/>
            <label for="user_phone">Сумма заказа:</label>
            <input type="tel" class="rfield" name="phone" placeholder="333" required maxlength="10" pattern="[0-9]{10,13}"/>
            <label for="user_phone">Предоплата:</label>
            <input type="tel" class="rfield" name="phone" placeholder="155" required maxlength="10" pattern="[0-9]{10,13}"/>
            <input type="submit" class="btn_submit" name="submit" value="Отправить данные" />
        </form>
        
    </div>
<?php }// конец елс?>
</body>
</html>
</body>
</html>