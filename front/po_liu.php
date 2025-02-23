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

<div>目前位置：首頁>分類網誌><span id="po_name"></span></div>
<div class="po_container">
    <div class="po_type">
        <fieldset>
            <legend>分類網誌</legend>
            <div class="po_nav"><a href="#"><span id="nav1" data-id="1">健康新知</span></a></div>
            <div class="po_nav"><a href="#"><span id="nav2" data-id="2">菸害防制</span></a></div>
            <div class="po_nav"><a href="#"><span id="nav3" data-id="3">癌症防治</span></a></div>
            <div class="po_nav"><a href="#"><span id="nav4" data-id="4">慢性病防治</span></a></div>
        </fieldset>
    </div>


    <div class="po_list">
        <fieldset>
            <legend>文章列表</legend>
            <div id="list1">
                <?php
                $row=$New->find(1);
                ?>
                <div class="po_title"><a href="#"><?=$row['title'];?></a>
                </div>
                <?php
                $row=$New->find(2);
                ?>
                <div class="po_title"><a href="#"><?=$row['title'];?></a>
                </div>
            </div>
            <div id="list2">
                <?php
                $row=$New->find(5);
                ?>
                <div class="po_title"><a href="#" data-id="<?=$row['id'];?>" onclick="getArt()"><?=$row['title'];?></a>
                </div>
                <?php
                $row=$New->find(6);
                ?>
                <div class="po_title"><a href="#" data-id="<?=$row['id'];?>" onclick="getArt()"><?=$row['title'];?></a>
                </div>
            </div>
            <div id="list3">
                <?php
                $row=$New->find(7);
                ?>
                <div class="po_title"><a href="#" data-id="<?=$row['id'];?>" onclick="getArt()"><?=$row['title'];?></a>
                </div>
                <?php
                $row=$New->find(9);
                ?>
                <div class="po_title"><a href="#" data-id="<?=$row['id'];?>" onclick="getArt()"><?=$row['title'];?></a>
                </div>
            </div>
            <div id="list4">
                <?php
                $row=$New->find(10);
                ?>
                <div class="po_title"><a href="#" data-id="<?=$row['id'];?>" onclick="getArt()"><?=$row['title'];?></a>
                </div>
                <?php
                $row=$New->find(11);
                ?>
                <div class="po_title"><a href="#" data-id="<?=$row['id'];?>" onclick="getArt()"><?=$row['title'];?></a>
                </div>
            </div>

        </fieldset>
    </div>

</div>
<fieldset style="width:80%;margin:auto;" id="art">
    <legend>文章內容</legend>
    <?php
    $row=$New->find(1);
    ?>
    <div>
        <pre><?=$row['text'];?></pre>
    </div>
</fieldset>

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
$("#list1").on('click', function() {
    let type = $(this)
    console.log('type', type)

    // location.href("index.php?do=art1")
})

$(".ar").hide()

function getArt() {
    $.get("./api/get_po.php", $row['id'], function(res) {
        console.log('res', res);

        $("#art").text(res)
    })
}
</script>