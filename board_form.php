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
		  	if(!document.board_form.userid.value){
          alert("아이디를 입력하세요!");
          document.board_form.userid.focus();
          return;
	      }
	      if(document.board_form.secretYn.value == "Y"){
	      	if(!document.board_form.pass.value){
	          alert("비밀번호를 입력하세요!");
	          document.board_form.pass.focus();
	          return;
		      }
	      }
	      if(!document.board_form.username.value){
          alert("이름을 입력하세요!");
          document.board_form.username.focus();
          return;
	      }
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
		  //비밀글 여부에 따른 비밀번호 hidden 처리
	   	function secret_chk(){
	   		if(document.board_form.secretYn.value == "N"){
	   			document.getElementById("passYn").style.display = 'none';
	   		}else{
	   			document.getElementById("passYn").style.display = '';
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
			  <h3 id="board_title">게시판 > 글 쓰기</h3>
			  <form name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">
					<ul id="board_form">
						<li>
							<span class="col1">비밀글 여부 : </span>
							<span>
								<input onclick="secret_chk()" name="secretYn" type="radio" value="Y" style="    width: 30px;">예&nbsp;&nbsp;
								<input onclick="secret_chk()" name="secretYn" type="radio" value="N" style="    width: 30px;" checked>아니오
							</span>
						</li>	
				    <li>
							<span class="col1">아이디 : </span>
							<span class="col2"><input name="userid" type="text" maxlength="10"></span>
						</li>
						<li id="passYn" style="display:none;">
							<span class="col1">비밀번호 : </span>
							<span class="col2"><input name="pass" type="password" maxlength="10"></span>
						</li>
						<li>
							<span class="col1">이름 : </span>
							<span class="col2"><input name="username" type="text" maxlength="10"></span>
						</li>
				    <li>
				    	<span class="col1">제목 : </span>
				    	<span class="col2"><input name="subject" type="text" maxlength="100"></span>
				    </li>	    	
				    <li id="text_area">	
				    	<span class="col1">내용 : </span>
				    	<span class="col2"><textarea name="content"></textarea></span>
				    </li>
				    <li>
							<span class="col1"> 첨부 파일</span>
						  <span class="col2"><input type="file" name="upfile"></span>
						</li>
		    	 </ul>
				  <ul class="buttons">
						<li><button type="button" onclick="check_input()">완료</button></li>
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
