<table>
        <caption><h3 class="main_color">Все заказы:</h3></caption>
    <tr><th>ID</th><th>Дата</th><th>Товар</th><th>Номер заказчика</th><th>Сумма заказа</th><th>Предоплата</th><th>Отгружен</th></tr>
<?php
    $show_all = mysqli_query($cnn, "SELECT id, goods, full_price, prepay, contacts, date, is_shipped FROM orders ORDER BY id DESC");
    while ($row = mysqli_fetch_array($show_all)){
        echo "<tr>";
            echo "<td>";
            echo $row['id']."<br>";
            echo "</td>";
            echo "<td>";
            echo $row['date'];
            echo "</td>";
            echo "<td>";
            echo $row['goods'];
            echo "</td>";
            echo "<td>";
            echo $row['contacts'];
            echo "</td>";
            echo "<td>";
            echo $row['full_price'];
            echo "</td>";
            echo "<td>";
            echo $row['prepay'];
            echo "</td>";
            echo "<td>";
            echo $row['is_shipped'];
            echo "</td>";
        echo "</tr>";
    }
    mysqli_close($cnn);
?>
</table>
<div class="form_box">
    <a href="index.php">На главную</a>
    <a href="show_all.php?do=logout" class="grey">Выход</a>
</div>