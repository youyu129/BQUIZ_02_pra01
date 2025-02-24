<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>

    <table>
        <tr class="ct">
            <td width="10%">編號</td>
            <td width="50%">問卷題目</td>
            <td width="10%">投票總數</td>
            <td width="10%">結果</td>
            <td width="10%">狀態</td>
        </tr>
        <?php
            $rows = $Que->all(['main_id' => 0]);
            foreach ($rows as $row):
        ?>
        <tr style="text-align:center">
            <td>1</td>
            <td style="padding:10px;"><?php echo $row['text']; ?></td>
            <td style="padding:10px;"><?php echo $row['vote']; ?></td>
            <td>
                <a href="?do=result">結果</a>
            </td>
            <td>
                <?php
                    if (isset($_SESSION['login'])) {
                        echo "<a href='?do=vote'>參與投票</a>";
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