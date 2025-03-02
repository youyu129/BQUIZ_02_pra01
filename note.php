<?php
/* 
 * 建資料夾
 * 設定xampp根目錄
 * 整理檔案
 * 修改路徑
 * 完成db檔案
 * 
 * 資料庫
 * 新增資料庫 db13
 * 新增資料表 total：id day total
 * 新增資料表 users：id acc pw email
 * 新增資料表 news：id title text type likes sh
 * 新增資料表 ques：id text main_id vote
 * 新增資料表 likes：id user news
 * 新增到資料表內容
 * 
 * db
 * 新增變數new DB Total User News Que Like
 * 新增瀏覽人次的記錄
 * 如果有今天的日期就加一
 * 如果沒有今天的日期就建立資料=1
 * 建立session['view']=1
 * 
 * front
 * 新增main
 * 開前台頁面的檔案 po news pop que
 * 
 * index
 * 最上面include_once db
 * 在hal最下面開include do/main
 * 刪除iframe
 * 在title2貼上標題圖片 替代文字 加上連結回首頁
 * 調整超出範圍的高度改為515px #lef #mm #main
 * 頁尾版權年份
 * 在會員登入下面的div加入跑馬燈 並交換位置 設定寬度75:23
 * 自動顯示今天日期
 * 最右邊新增回首頁的連結
 * 把瀏覽人次資料撈出
 * 如果沒有session['login']的話顯示會員登入按鈕 完整連結
 * 有的話顯示登出按鈕 onclick="logout()"
 * 管理帳號的話顯示管理按鈕 導到後台
 * 
 * js
 * logout() get logout頁面 導到首頁 
 * 
 * api/logout
 * 刪除session['login']
 * 
 * admin
 * 修改include do的路徑是back
 * 修改nav的文字
 * 
 * back
 * 新增main
 * 開後台頁面的檔案 acc po news que
 * 
 * front/main
 * 四個頁籤
 * 四個文字區塊 隱藏
 * 設定點擊後顯示對應的文字區塊
 * 將文章內容放入區塊 加入pre
 * 
 * front/reg
 * 建立畫面
 * 註冊按鈕onclick="reg()"
 * reg() 物件user={}變數acc pw pw2 email //acc:$("#acc").val()
 * 判斷所有欄位不可空白
 * 判斷密碼錯誤(密碼不一致)
 * 判斷帳號重複 到api/chk_acc檔案get帳號
 * 用post把user資料送到api/reg 註冊完成，歡迎加入
 * 完成api之後將四筆資料完成註冊
 * 清除按鈕onclick="reset()"
 * reset() 清空欄位內容
 * 
 * api/chk_acc
 * echo count的get結果
 * 
 * api/reg
 * 刪掉不需要的密碼
 * 存入資料庫
 * 
 * front/login
 * 建立畫面
 * 清除按鈕onclick="reset()"
 * reset() 清空欄位內容
 * 登入按鈕onclick="login()"
 * reg() 物件user={}變數acc pw  //acc:$("#acc").val()
 * 判斷查無帳號 清除畫面
 * 判斷密碼正確 導到首頁
 * 判斷管理者帳號 導到後台
 * 判斷密碼錯誤 清除畫面
 * 
 * api/chk_pw
 * count的post結果
 * 登入成功的話建立session['login']
 * 
 * front/forgot
 * 建立畫面
 * 尋找按鈕 onclick="forgot()"
 * forgot() 變數email
 * get到後台 chk_email頁面 傳email
 * 把回來的結果放到#位置
 * 
 * api/chk_email
 * count get
 * 空的顯示查無此資料 不是空的就顯示密碼
 * 
 * back/acc
 * 建立頁面
 * 顯示出資料庫的帳號資料 密碼改為* 刪除的name[] value是id
 * 複製註冊的頁面內容 並修改文字 註冊成功就重整頁面
 * 確定刪除按鈕 onclick="del()"
 * 清空選取按鈕 onclick="resetChk()"
 * resetChk() input:[type='checkbox'].prop('checked',false)
 * del() dels為有勾選的checkbox ids為空陣列 用each將資料push到ids
 * post到del_user頁面 並重整畫面
 * 
 * api/del_user
 * foreach $_POST['ids'] 一筆一筆刪除
 * 
 * back/news
 * 建立畫面
 * 設定分頁
 * 抓出資料 抓出第幾筆資料的編號 判斷顯示是否打勾
 * 做頁碼及上下頁按鈕
 * 隱藏欄位傳送id
 * 確定修改按鈕 onclick="edit()"
 * edit() 變數ids= 全部 .map((idx,item)=>$(item).val()).get()
 *        變數del= 被勾選的
 *        變數 sh= 被勾選的
 * post到edit_news頁面 重整頁面
 * 
 * api/edit_news
 * 如果有id就把id foreach
 * 如果要刪除 就刪除資料庫
 * 其他的找出id並修改顯示 存回資料庫
 * 
 * back/que
 * 建立畫面
 * 更多按鈕 onclick="more()"
 * more() 變數el 加在div之前
 * 新增按鈕 onclick="send()"
 * 清空按鈕 onclick="resetForm()"
 * resetForm() 清空
 * send() 變數subject
 *        變數options .map((id.item)=>$(item).val()).get
 * post到add_que的頁面 重整頁面
 * 
 * api/add_que
 * subject直接存到text欄位 main_id是0 vote也是0
 * 變數subject_id
 * 把options foreach出來 text欄位是option main_id是subject_id vote也是0
 * 
 * front/po
 * 建立導覽列
 * 建立畫面
 * 
 * front/news
 * 建立導覽列
 * 建立畫面
 * 建立分頁 all(['sh'=>1]," LIMIT $start,$div")
 * 抓出要顯示的資料span title mb_substr(內容,0,25)
 * 隱藏span detail 顯示完整文章內容nl2br()
 * 判斷已登入者 判斷是否有按過讚 顯示按讚或收回讚的連結 data-id是文章id class="like"
 * like被點的時候 變數id是data-id 變數like是文字
 *     post id傳到like.php switch like交換文字
 * row-title 被點的時候 $(this).next.children(".title, .detail").toggle() 
 * 
 * api/like
 * count檢查 news跟user是否已存在
 * 已經有的話 要刪除
 * 沒有的話 要儲存
 * 
 * front/pop
 * 將news全部複製貼上
 * 修改導覽列文字
 * 新增表格人氣欄位
 * 修改分頁 all(['sh'=>1]," ORDER BY `likes` DESC LIMIT $start,$div")
 * 修改分頁的連結網址
 * 複製alerr的css 貼到detail 寬300高400 position改成absolute
 * row-title hover的時候 兩個function detail show/hide
 * row-content hover的時候 兩個function detail show/hide
 * 
 * front/que
 * 
 * 
 * 
 */
?>