<?php
include "db_connect.php";

if ($query = $db->query("SELECT * FROM categories ORDER BY name")){
  $infoProduct = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
  print_r($db->errorInfo());}
?>


<div class="menu links fonts">
    <h1>Категории</h1>
    <ul>
        <?php foreach ($infoProduct as $sections): ?>
            <li>
              <a href="/<?php echo $sections['namean'] ?>">
                <?php echo $sections['name'] ?></a>
              </li>
            <?php endforeach; ?>
    </ul>
</div>
