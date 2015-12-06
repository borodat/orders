<form action="index.php?page_id=success_sent" method="post">
<table>
        <caption><h3 class="main_color">Все заказы:</h3></caption>
    <tr><th>ID</th><th>Дата</th><th>Товар</th><th>Номер заказчика</th><th>Сумма заказа</th><th>Предоплата</th><th>Отгружен</th><th>Отгрузить</th></tr>
<?php
    $show_all = mysqli_query($cnn, "SELECT id, goods, full_price, prepay, contacts, date, is_shipped FROM orders WHERE is_shipped='0' ORDER BY id DESC");
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
            echo "<td>";
            echo "<input type='checkbox' name=".$row['id']."></input>";
            echo "</td>";
        echo "</tr>";
    }
    mysqli_close($cnn);
?>
<input type="submit">
</table>
</form>
<div class="form_box">
    <a href="index.php">На главную</a>
    <a href="show_all.php?do=logout" class="grey">Выход</a>
</div>
<script>
 //slect All script
function checkAll(ele) {
    var checkboxes = document.getElementsByTagName('input');
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
}
</script>