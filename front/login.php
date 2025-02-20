<fieldset style="width: 50%;margin:10px auto;">
    <legend>會員登入</legend>
    <table>
        <tr>
            <td class="clo">
                帳號
            </td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo">
                密碼
            </td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="登入" onclick="login()">
                <input type="button" value="清除" onclick="reset()">
            </td>
            <td style="text-align: right;">
                <a href="?do=forgot">忘記密碼</a>|
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>

</fieldset>

<script>
function login() {
    let user = {
        acc: $("#acc").val(),
        pw: $("#pw").val()
    }
    $.get("./api/chk_acc.php", {
        acc: user.acc
    }, (res) => {
        console.log('chk acc =>', res);

        if (parseInt(res) < 1) {
            alert("查無帳號")
        }
        $.post("./api/chk_pw.php", {
            acc: user.acc,
            pw: user.pw
        }, (res) => {
            console.log('chk pw =>', res);
            if (res == 1) {
                if (user.acc == "admin") {
                    location.href = "admin.php"
                } else {
                    location.href = "index.php"
                }
            } else {
                alert("密碼錯誤")
            }
        })
    })
}

function reset() {
    $("#acc").val("")
    $("#pw").val("")
}
</script>