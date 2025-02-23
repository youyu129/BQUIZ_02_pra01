<style>
.po_container {
    width: 80%;
    display: flex;
    margin: 20px auto;
}

.po_type {
    width: 40%;
}

.po_list {
    width: 60%;
}

.po_nav {
    margin-top: 20px;
}

.po_title {
    margin: 10px;
}
</style>

<p>目前位置：首頁>分類網誌><span id="po_name"></span></p>
<div class="po_container">
    <div class="po_type">
        <fieldset>
            <legend>分類網誌</legend>
            <div class="po_nav"><a href="#"><span id="nav1">健康新知</span></a></div>
            <div class="po_nav"><a href="#"><span id="nav2">菸害防制</span></a></div>
            <div class="po_nav"><a href="#"><span id="nav3">癌症防治</span></a></div>
            <div class="po_nav"><a href="#"><span id="nav4">慢性病防治</span></a></div>
        </fieldset>
    </div>


    <div class="po_list">
        <fieldset>
            <legend>文章列表</legend>
            <div id="list1">
                <?php
                $rows=$New->all(['type'=>1]);
                foreach($rows as $row):
                ?>
                <div class="po_title"><a href=""><?=$row['title'];?></a></div>
                <?php
                endforeach;
                ?>
            </div>
            <div id="list2">
                <?php
                $rows=$New->all(['type'=>2]);
                foreach($rows as $row):
                ?>
                <div class="po_title"><a href=""><?=$row['title'];?></a></div>
                <?php
                endforeach;
                ?>
            </div>
            <div id="list3">
                <?php
                $rows=$New->all(['type'=>3]);
                foreach($rows as $row):
                ?>
                <div class="po_title"><a href=""><?=$row['title'];?></a></div>
                <?php
                endforeach;
                ?>
            </div>
            <div id="list4">
                <?php
                $rows=$New->all(['type'=>4]);
                foreach($rows as $row):
                ?>
                <div class="po_title"><a href=""><?=$row['title'];?></a></div>
                <?php
                endforeach;
                ?>
            </div>
        </fieldset>
    </div>



</div>
<script>
$("#po_name").text("健康新知")
$("#list1").show()
$("#list2").hide()
$("#list3").hide()
$("#list4").hide()

$("#nav1").on('click', function() {
    $("#po_name").text("")
    $("#po_name").text("健康新知")
    $("#list1").show()
    $("#list2").hide()
    $("#list3").hide()
    $("#list4").hide()
    // console.log('nav1 click ok');
})
$("#nav2").on('click', function() {
    $("#po_name").text("")
    $("#po_name").text("菸害防制")
    // console.log('nav1 click ok');
    $("#list2").show()
    $("#list1").hide()
    $("#list3").hide()
    $("#list4").hide()
})
$("#nav3").on('click', function() {
    $("#po_name").text("")
    $("#po_name").text("癌症防治")
    // console.log('nav1 click ok');
    $("#list3").show()
    $("#list2").hide()
    $("#list1").hide()
    $("#list4").hide()
})
$("#nav4").on('click', function() {
    $("#po_name").text("")
    $("#po_name").text("慢性病防治")
    // console.log('nav1 click ok');
    $("#list4").show()
    $("#list2").hide()
    $("#list3").hide()
    $("#list1").hide()
})
</script>