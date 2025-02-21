<fieldset style="width:85%;margin:auto">
    <legend>最新文章管理</legend>

    <table width="90%" class="ct" style="margin:auto;">
        <tr>
            <th width="20%">編號</th>
            <th width="50%">標題</th>
            <th width="15%">顯示</th>
            <th width="15%">刪除</th>
        </tr>
        <?php
            $all   = $New->count();
            $div   = 3;
            $pages = ceil($all / $div);
            $now   = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;

            $rows = $New->all(" limit $start, $div");
            foreach ($rows as $idx => $row):
        ?>
        <tr>
            <td><?php echo $start + $idx + 1 ?></td>
            <td><?php echo $row['title']; ?></td>
            <td>
                <input type="checkbox" name="sh[]" value=""                                                            <?php echo($row['sh'] == 1) ? 'checked' : ''; ?>>

            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?php echo $row['id']; ?>">
            </td>
        </tr>
        <?php
            endforeach;
        ?>
    </table>
    <div class="ct">

        <?php
            if (($now - 1) > 0) {
                echo "<a href='?do=news&p=" . ($now - 1) . "'> < </a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $size = ($i == $now) ? '24px' : '16px';
                echo "<a href='?do=news&p=$i' style='font-size:$size;'> $i </a>";
            }
            if (($now + 1) <= $pages) {
                echo "<a href='?do=news&p=" . ($now + 1) . "'> > </a>";
            }

        ?>
    </div>
    <div class="ct">
        <button onclick="edit()">確定修改</button>
    </div>
</fieldset>