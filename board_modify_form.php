<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<title>PHP Example Yeon</title>
		<link rel="stylesheet" type="text/css" href="./css/common.css">
		<link rel="stylesheet" type="text/css" href="./css/board.css">
		<script>
			//유효성 체크
			function check_input(){
	      if(!document.board_form.subject.value){
	        alert("제목을 입력하세요!");
	        document.board_form.subject.focus();
	        return;
	      }
	      if(!document.board_form.content.value){
	          alert("내용을 입력하세요!");    
	          document.board_form.content.focus();
	          return;
	      }
	      document.board_form.submit();
		   }
		   //비밀번호 수정
		   function pass_modify(){
		   	document.getElementById("passInput").style.display = '';
		   	document.getElementById("passModify").style.display = 'none';
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
		    <h3 id="board_title">게시판 > 수정하기</h3>
				<?php
					$num  = $_GET["num"];
					$page = $_GET["page"];
					
					$con = mysqli_connect("localhost", "user1", "12345", "sample");
					$sql = "select * from board where num=$num";
					$result = mysqli_query($con, $sql);
					$row = mysqli_fetch_array($result);

					$id         = $row["id"];
					$name       = $row["name"];
					$subject    = $row["subject"];
					$content    = $row["content"];
					$file_name  = $row["file_name"];
					$pass  			= $row["pass"];
				?>
		    <form  name="board_form" method="post" action="board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
		    	<ul id="board_form">
		    		<li>
							<span class="col1">아이디 : </span>
							<span class="col2"><?=$id?></span>
						</li>
						<li>
							<span class="col1">비밀번호 : </span>
							<span class="col2">
								<input id="passInput" name="pass" type="password" maxlength="10" style="display:none; width:300px;">
								<button id="passModify" type="button" onclick="pass_modify()">수정하기</button>
							</span>
						</li>
						<li>
							<span class="col1">이름 : </span>
							<span class="col2"><?=$name?></span>
						</li>		
		    		<li>
		    			<span class="col1">제목 : </span>
		    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>" maxlength="10"></span>
		    		</li>	    	
		    		<li id="text_area">	
		    			<span class="col1">내용 : </span>
		    			<span class="col2">
		    				<textarea name="content"><?=$content?></textarea>
		    			</span>
		    		</li>
		    		<li>
				      <span class="col1"> 첨부 파일 : </span>
				      <!-- <span class="col2"><?=$file_name?></span> -->
				      <span class="col2">
				      	<input type="file" name="upfile">
					      <?php
					      	if(!empty($file_name)){
					      		echo $file_name;
					      	}
					      ?>
				      </span>
				    </li>
			    </ul>
			    <ul class="buttons">
						<li><button type="button" onclick="check_input()">수정하기</button></li>
						<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
					</ul>
		    </form>
			</div>
		</section> 
		<footer>
		    <?php include "footer.php";?>
		</footer>
	</body>
</html>
