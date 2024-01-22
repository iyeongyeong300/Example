<?php
    $num  = $_GET["num"];
    if (isset($_GET["page"]))   $page = $_GET["page"];                  
    else    $page = 1;

    $userid     = $_POST["userid"];
    $pass       = $_POST["pass"];
    $pass_hash  = hash("sha256", $pass);

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from board where id='$userid'";
    $result = mysqli_query($con, $sql);

    $num_match = mysqli_num_rows($result);

    if(!$num_match){
        echo("
           <script>
             window.alert('등록되지 않은 아이디입니다.')
             history.go(-1)
           </script>
        ");
    }else{
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pass"];

        mysqli_close($con);

        if($pass_hash != $db_pass){
           echo("
              <script>
                console.log($pass_hash)
                window.alert('비밀번호가 일치하지 않습니다.')
                history.go(-1)
              </script>
           ");
           exit;
        }else{
            echo("
              <script>
                location.href = 'board_view.php?num=$num&page=$page';
              </script>
            ");
        }
     }        
?>
