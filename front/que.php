<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>

    <table>
        <tr class="ct">
            <th width="10%">編號</th>
            <th width="50%">問卷題目</th>
            <th width="10%">投票總數</th>
            <th width="10%">結果</th>
            <th width="10%">狀態</th>
        </tr>
        <?php
            $rows = $Que->all(['main_id' => 0]);
            foreach ($rows as $key => $row):
        ?>
        <tr style="text-align:center">
            <td><?php echo $key + 1; ?>.</td>
            <td style="padding:10px;text-align:left;"><?php echo $row['text']; ?></td>
            <td style="padding:10px;"><?php echo $row['vote']; ?></td>
            <td>
                <a href="?do=result&id=<?php echo $row['id']; ?>">結果</a>
            </td>
            <td>
                <?php
                    if (isset($_SESSION['login'])) {
                        echo "<a href='?do=vote&id={$row['id']}'>參與投票</a>";
                    } else {
                        echo "請先登入";
                    }
                ?>
            </td>
        </tr>
        <?php
            endforeach;
        ?>
    </table>

</fieldset>