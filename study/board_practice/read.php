<?php
include  $_SERVER['DOCUMENT_ROOT']."/study/board_practice/db.php"; 
?>
<!doctype html>

<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <style>
    #board_read {
        width: 900px;
        position: relative;
        word-break: break-all;
    }

    #user_info {
        font-size: 14px;
    }

    #user_info ul li {
        float: left;
        margin-left: 10px;
    }

    #bo_line {
        width: 880px;
        height: 2px;
        background: gray;
        margin-top: 20px;
    }

    #bo_content {
        margin-top: 20px;
    }

    #bo_ser {
        font-size: 14px;
        color: #333;
        position: absolute;
        right: 0;
    }

    #bo_ser>ul>li {
        float: left;
        margin-left: 10px;
    }
    </style>


</head>

<body>
    <?php
		$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
		$hit = mysqli_fetch_array(query("select * from board where idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = query("update board set hit = '".$hit."' where idx = '".$bno."'");
		$sql = query("select * from board where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
	?>
    <!-- 글 불러오기 -->
    <div id="board_read">
        <h2><?php echo $board['title']; ?></h2>
        <div id="user_info">
            <?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?>
            <div id="bo_line"></div>
        </div>
        <div id="bo_content">
            <?php echo nl2br("$board[content]"); ?>
        </div>
        <!-- 목록, 수정, 삭제 -->
        <div id="bo_ser">
            <ul>
                <li><a href="./index.php">[목록으로]</a></li>
                <li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
                <li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
            </ul>
        </div>
    </div>
</body>

</html>