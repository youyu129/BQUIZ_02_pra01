<fieldset style="width:85%;margin:auto">
    <legend>問卷管理</legend>
    <!-- <form action="add_que.php" method="post"> -->
    <table>
        <tr>
            <td class="clo">問卷名稱</td>
            <td>
                <input type="text" name="subject" id="subject">
            </td>
        </tr>
        <tr>
            <td colspan="2" class="clo options">
                選項<input type="text" name="options" id="">
                <button onclick="more()">更多</button>
            </td>
            <td>

            </td>
        </tr>
    </table>
    <div>
        <input type="submit" value="新增">|
        <input type="reset" value="清空">
    </div>
    <!-- </form> -->
</fieldset>

<script>
function more() {
    let more = `<div>選項<input type="text" name="options" id=""><div>`
    $(".options").prepend(more)

}
</script>