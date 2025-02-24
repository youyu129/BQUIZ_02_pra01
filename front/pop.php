<style>
.detail {
    background: rgba(51, 51, 51, 0.8);
    color: #FFF;
    height: 300px;
    width: 400px;
    position: absolute;
    left: 10px;
    top: 10px;
    display: none;
    z-index: 9999;
    overflow: auto;
}
</style>
<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>

    <table>
        <tr class="ct">
            <td width="30%">標題</td>
            <td>內容</td>
            <td width="15%">人氣</td>
            <td width="15%"></td>
        </tr>
        <?php

            $div   = 5;
            $all   = $New->count();
            $pages = ceil($all / $div);
            $now   = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;

            $rows = $New->all(" order by `likes` desc limit $start,$div");
            foreach ($rows as $row):
        ?>
        <tr>
            <td class="clo click_title"><?php echo $row['title']; ?></td>
            <td style="position:relative" class="art">
                <span class="text"><?php echo mb_substr($row['text'], 0, 25); ?>...</span>
                <span class="detail">
                    <h3 style="color:skyblue"><?php echo $New::$type[$row['type']]; ?></h3>
                    <?php echo $row['text']; ?>
                </span>
            </td>

            <?php
                $people = $Good->count(['news' => $row['id']]);
            ?>
            <td class="ct"><?php echo $people; ?>個人說<span class="good"></span></td>
            <td class="ct">

                <?php
                    if (isset($_SESSION['login'])) {
                        $chk  = $Good->count(['news' => $row['id'], 'user' => $_SESSION['login']]);
                        $like = ($chk > 0) ? '-收回讚' : '-讚';
                        echo "<a href='#' data-id='{$row['id']}' class='like'>$like</a>";
                    }
                ?>
                <!--<?php echo $row['likes']; ?> -->
            </td>
        </tr>
        <?php
            endforeach;
        ?>
    </table>
    <div>
        <?php
            if (($now - 1) < 0) {
                echo "<a href='?do=pop&p='" . ($now - 1) . "'> < </a>";
            }

            for ($i = 1; $i <= $pages; $i++) {
                // echo $i;
                $size = ($i == $now) ? '24px' : '18px';
                echo "<a href='?do=pop&p=$i' style='font-size:$size'> $i </a>";
            }

            if (($now + 1) <= $pages) {
                echo "<a href='?do=pop&p='" . ($now + 1) . "'> > </a>";
            }

        ?>
    </div>
</fieldset>

<script>
$(".like").on('click', function() {
    let id = $(this).data('id')
    // console.log('id', id);
    let like = $(this).text()
    // console.log('like', like);
    switch (
        like) {
        case "讚":
            $(this).text("收回讚")
            break
        case "收回讚":
            $(this).text("讚")
            break
    }
    $.post("./api/like.php", {
        id
    }, function() {


    })

})
$(".click_title").hover(
    function() {
        $(this).next().children('.detail').show()
    },
    function() {
        $(this).next().children('.detail').hide()
    }
)
$(".art").hover(
    function() {
        $(this).children('.detail').show()
    },
    function() {
        $(this).children('.detail').hide()
    }
)
</script>