<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<title>PHP Example Yeon</title>
		<link rel="stylesheet" type="text/css" href="./css/common.css">
		<link rel="stylesheet" type="text/css" href="./css/login.css">
		<script type="text/javascript" src="./js/login.js"></script>
		<script>
			<?php
				$num  = $_GET["num"];
				if (isset($_GET["page"]))   $page = $_GET["page"];                  
    			else    $page = 1;
			?>
			function login_chk() {
				document.board_chk_form.submit();  		
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
	        <div id="main_content">
	      		<div id="login_box">
		    		<div id="login_title">
			    		<span>비밀 게시판을 이용하시려면<br>아이디와 비밀번호를 입력해주세요!!</span>
		    		</div>
		    		<div id="login_form">
		          		<form  name="board_chk_form" method="post" action="board_chk.php?num=<?=$num?>&page=<?=$page?>">
		          			<ul>
			                    <li><input type="text" name="userid" placeholder="아이디" ></li>
			                    <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li>
		                  	</ul>
		                  	<div id="login_btn">
		                      	<a href="#"><img src="./img/login.png" onclick="login_chk()"></a>
		                  	</div>		    	
		           		</form>
	        		</div>
	    		</div>
	        </div>
		</section> 
		<footer>
	    	<?php include "footer.php";?>
	    </footer>
	</body>
</html>

