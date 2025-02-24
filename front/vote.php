<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <span>Q1</span></legend>

    <table>
        <?php
            $rows = $Que->all(['main_id' => $_POST['id']]);
        ?>
        <tr>
            <td>
                題目
            </td>
        </tr>
        <tr>
            <td>
                選項
            </td>
        </tr>
    </table>
</fieldset>