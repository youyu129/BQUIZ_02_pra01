<fieldset style="width: 50%;margin:10px auto;">
    <legend>
        忘記密碼
    </legend>
    <table style="width:98%">
        <tr>
            <td>
                <p>請輸入信箱以查詢密碼</p>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="email" id="email" style="width:80%">
            </td>
        </tr>
        <tr>
            <td id="result"></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="尋找" onclick="forgot()">
            </td>
        </tr>
    </table>

</fieldset>

<script>
function forgot() {
    let email = $("#email").val()
    $.get("./api/chk_email.php", {
        email
    }, (res) => {
        console.log('chk acc', res);
        $("#result").html(res)
    })
}
</script>