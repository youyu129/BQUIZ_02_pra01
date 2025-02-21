<fieldset>
    <legend>醉心文章管理</legend>

    <table width="90%" class="ct">
        <tr>
            <th width="20%">編號</th>
            <th width="40%">標題</th>
            <th width="20%">顯示</th>
            <th width="20%">刪除</th>
        </tr>
        <?php
            $div  = 3;
            $all  = $New->count();
            $page = $all / $div;
            $rows = $New->all();
            foreach ($rows as $row):
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td>
                <input type="checkbox" name="sh[]" value="">
            </td>
            <td>
                <input type="checkbox" name="del[]" value="">
            </td>
        </tr>
        <?php
            endforeach;
        ?>
    </table>
    <div class="ct">
        <button>確定修改</button>
    </div>
</fieldset>