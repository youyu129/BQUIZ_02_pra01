<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>

    <table>
        <tr>
            <td width="30%">標題</td>
            <td>內容</td>
            <td>讚</td>
        </tr>
        <?php

        $div=5;
        $all=$New->count();
        $pages=ceil($all/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;

        $rows=$New->all(" limit $start,$div");
        foreach($rows as $row):
        ?>
        <tr>
            <td class="clo"><?=$row['title'];?></td>
            <td><?=substr($row['text'],0,30);?>...</td>
            <td><?=$row['likes'];?></td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
    <div>
        <?php
    if(($now-1)<0){
        echo "<a href='?do=news&p='".($now-1)."'> < </a>";
    }

    for ($i=1; $i <=$pages ; $i++) { 
        // echo $i;
        $size=($i==$now)?'24px':'18px';
        echo "<a href='?do=news&p=$i' style='font-size:$size'> $i </a>";
    }

    if(($now+1)<=$pages){
        echo "<a href='?do=news&p='".($now+1)."'> > </a>";
    }
    
    ?>
    </div>
</fieldset>