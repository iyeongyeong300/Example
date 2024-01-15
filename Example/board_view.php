<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<title>PHP Example Yeon</title>
		<link rel="stylesheet" type="text/css" href="./css/common.css">
		<link rel="stylesheet" type="text/css" href="./css/board.css">
		<script>
			<?php
				$num  = $_GET["num"];
				if (isset($_GET["page"]))	$page = $_GET["page"];					
				else	$page = 1;
			?>
			function delete_click() {
	  			if(confirm("해당 글을 삭제하시겠습니까?")){
	  				location.href="board_delete.php?num=<?=$num?>&page=<?=$page?>";
	  			}else{
	  				return;
	  			}	      		
	   		}
		</script>
	</head>
	<body> 
		<header>
		    <?php include "header.php";?>
		</header>  
		<section>
			<div id="main_img_bar">
		        <img src="./img/main_img.png">
		    </div>
		   	<div id="board_box">
			    <h3 class="title">게시판 > 내용보기</h3>
				<?php
					$con = mysqli_connect("localhost", "user1", "12345", "sample");
					$sql = "select * from board where num=$num";
					$result = mysqli_query($con, $sql);

					$row = mysqli_fetch_array($result);
					$id      = $row["id"];
					$name      = $row["name"];
					$regist_day = $row["regist_day"];
					$subject    = $row["subject"];
					$content    = $row["content"];
					$file_name    = $row["file_name"];
					$file_type    = $row["file_type"];
					$file_copied  = $row["file_copied"];
					$hit          = $row["hit"];

					$content = str_replace(" ", "&nbsp;", $content);
					$content = str_replace("\n", "<br>", $content);

					$new_hit = $hit + 1;
					$sql = "update board set hit=$new_hit where num=$num";   
					mysqli_query($con, $sql);
				?>		
			    <ul id="view_content">
					<li>
						<span class="col1"><b>제목 :</b> <?=$subject?></span>
						<span class="col2"><?=$name?> | <?=$regist_day?></span>
					</li>
					<?php
						if($file_name){
							$real_name = $file_copied;
							$file_path = "./data/".$real_name;
							$file_size = filesize($file_path);
					?>
					<li style="padding:10px;">
						▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
						<a href='board_download.php?num=<?=$num?>&real_name=<?=$real_name?>&file_name=<?=$file_name?>&file_type=<?=$file_type?>' style='font-weight:bold;'>[저장]</a>
					</li>
					<?php
				        }
					?>
					<li style="padding:15px; border-bottom:solid 1px #cccccc;"><?=$content?></li>
			    </ul>
			    <ul class="buttons">
					<li><button onclick="location.href='board_list.php?page=<?=$page?>'">목록</button></li>
					<li><button onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
					<li><button onclick="delete_click()">삭제</button></li>
				</ul>
			</div>
		</section> 
		<footer>
		    <?php include "footer.php";?>
		</footer>
	</body>
</html>
