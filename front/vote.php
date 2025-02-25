<?php
    $id   = $_GET['id'];
    $rows = $Que->all(['id' => $id]);
    foreach ($rows as $row) {
        // echo $row['text'];
    }
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <span><?php echo $row['text']; ?></span></legend>

    <form action="api/vote.php" method="post">
        <div style="margin-top:20px;">
            <?php echo $row['text']; ?>
        </div>

        <div style="margin-top:10px;">
            <?php
                $main_id = $row['id'];
                $items   = $Que->all(['main_id' => $main_id]);
                // dd($items);
                foreach ($items as $item) {
                    echo "<p style='margin-top:20px;'>";
                    echo "<input type='radio' name='item' value='{$item['id']}'> ";
                    echo $item['text'];
                    echo "</p>";
                }
            ?>
        </div>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>