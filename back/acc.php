<fieldset>
    <legend>帳號管理</legend>
    <form action="api/del_acc.php" method='post'>
        <table width="80%" style="margin:auto;" class="ct">
            <tr>
                <td width="40%" class="clo">帳號</td>
                <td width="30%" class="clo">密碼</td>
                <td width="30%" class="clo">刪除</td>
            </tr>
            <?php
                $rows = $User->all();
                foreach ($rows as $row):
            ?>
            <tr>
                <td><?php echo $row['acc']; ?></td>
                <td>
                    <?php echo str_repeat("*", strlen($row['pw'])); ?>
                </td>
                <td>
                    <input type="checkbox" name="del[]" class="checkbox" value="<?php echo $row['id']; ?>">
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <button onclick="resetCheckbox()">清空選取</button>
        </div>
    </form>

    <h2>新增會員

    </h2>

    <p style="color:red;">*請設定您要註冊的帳號及密碼（最長12個字元）</p>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td>
                <input type="password" name="pw2" id="pw2">
            </td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td>
                <input type="email" name="email" id="email">
            </td>
        </tr>
    </table>
    <input type="button" value="新增" onclick="reg()">
    <input type="button" value="清除" onclick="reset()">
</fieldset>
<script>
function reg() {
    let user = {
        acc: $("#acc").val(),
        pw: $("#pw").val(),
        pw2: $("#pw2").val(),
        email: $("#email").val()
    }
    console.log('reg ok');

    if (user.acc == "" || user.pw == "" || user.pw2 == "" || user.email == "") {
        alert("不可空白")
    } else if (user.pw != user.pw2) {
        alert("密碼錯誤")
    } else {
        $.get("./api/chk_acc.php", {
            acc: user.acc
        }, (res) => {
            console.log("chkacc=>", res);
            if (parseInt(res) > 0) {
                alert("帳號重複")
            } else {
                $.post("./api/reg.php", user, (res) => {
                    console.log("reg=>", res);
                    if (parseInt(res) == 1) {
                        location.reload()
                        alert("新增完成")
                    }
                })
            }
        })
    }
    reset()
}

function reset() {
    $("#acc").val("")
    $("#pw").val("")
}

function resetCheckbox() {
    $(".checkbox").prop('checked', false)
}
</script>