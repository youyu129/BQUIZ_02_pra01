<style>
.box {
    background-color: #ccc;
}
</style>
<?php
    $id   = $_GET['id'];
    $rows = $Que->all(['id' => $id]);
    foreach ($rows as $row) {
        // echo $row['text'];
    }
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <span><?php echo $row['text']; ?></span></legend>


    <div style="margin-top:20px;">
        <?php echo $row['text']; ?>
    </div>

    <table>
        <?php
            $main_id = $row['id'];
            $items   = $Que->all(['main_id' => $main_id]);
            // dd($items);
            foreach ($items as $item):

                // dd($item);
                $rate = round($item['vote'] / $row['vote'] * 100, 2);

            ?>
	        <tr>
	            <td width="40%"><?php echo $item['text']; ?></td>
	            <td width="40%">
	                <div class="box" style="width:<?php echo $rate; ?>%;height:20px">&nbsp;</div>
	            </td>

	            <td width="20%"><?php echo $item['vote']; ?>票(<?php echo $rate; ?>%)</td>
	        </tr>
	        <?php
                endforeach;
            ?>
    </table>

    <div style="margin-top:10px;">

    </div>
    <div class="ct"><button><a href="?do=que">返回</a></button></div>
</fieldset>