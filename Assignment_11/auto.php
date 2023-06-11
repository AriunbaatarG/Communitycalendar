<?php
$conn = new mysqli("localhost", "group20", "mootbryan", "group20");
if (! empty($_POST["keyword"])) {
    $sql = $conn->prepare("SELECT * FROM student WHERE name LIKE  ? ORDER BY name LIMIT 0,6");
    $search = "{$_POST['keyword']}%";
    $sql->bind_param("s", $search);
    $sql->execute();
    $result = $sql->get_result();
    if (! empty($result)) {
        ?>
<ul id="country-list">
<?php
        foreach ($result as $studentname) {
            ?>
   <li
        onClick="selectCountry('<?php echo $studentname["name"]; ?>');">
      <?php echo $studentname["name"]; ?>
    </li>

<?php
        } // end for
        ?>
</ul>
<?php
    } // end if not empty
}
?>
