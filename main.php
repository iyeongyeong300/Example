<div id="main_img_bar">
    <img src="./img/main_img.png">
</div>
<div id="main_content">
    <div id="latest">
        <h4>게시글</h4>
        <ul>
        <?php
            $con = mysqli_connect("localhost", "user1", "12345", "sample");
            $sql = "select * from board order by num desc limit 5";
            $result = mysqli_query($con, $sql);

            if (!$result){
                echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
            }else{
                while( $row = mysqli_fetch_array($result) ){
                    $regist_day = substr($row["regist_day"], 0, 10);
        ?>
                    <li>
                        <span>
                       	<?php
                            if($row["secret_yn"] == "Y"){
                        ?>
                            <a href="board_chk_form.php?num=<?=$row["num"]?>"><?=$row["subject"]?></a>
                            <a id="secretChk" style="color:red;">&nbsp;[비밀글]</a>
                        <?php
                            }else{
                        ?>
                            <a href="board_view.php?num=<?=$row["num"]?>"><?=$row["subject"]?></a>
                        <?php       
                            }
                        ?>                        
                        </span>
                        <span><?=$row["name"]?></span>
                        <span><?=$regist_day?></span>
                    </li>
        <?php
                }
            }
        ?>
    </div>
</div>