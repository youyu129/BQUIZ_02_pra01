<fieldset style="width: 80%;margin:10px auto;">
    <legend>
        會員註冊
    </legend>
    <p style="color:red;">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
    <table>
        <tr>
            <td>Step1:登入帳號</td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td>
                <input type="password" name="pw2" id="pw2">
            </td>
        </tr>
        <tr>
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td>
                <input type="email" name="email" id="email">
            </td>
        </tr>
    </table>
    <input type="button" value="註冊" onclick="reg()">
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
                        alert("註冊完成，歡迎加入")
                    }
                })
            }
        })
    }
}

function reset() {
    $("#acc").val(""),
        $("#pw").val(""),
        $("#pw2").val(""),
        $("#email").val("")
}
</script>