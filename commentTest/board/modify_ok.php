<?php
include $_SERVER['DOCUMENT_ROOT']."/commentTest/db.php"; /* db load */
	$bno = $_POST['idx'];
	$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
	if(isset($_POST['lockpost'])){
	$lo_post = '1';
}else{
	$lo_post = '0';
}
	$sql = mq("update board set name='".$_POST['name']."',pw='".$userpw."',title='".$_POST['title']."',content='".$_POST['content']."',lock_post='".$lo_post."' where idx='".$bno."'");?>

<script type="text/javascript">
alert('수정되었습니다.');
</script>
<meta http-equiv="refresh" content="0 url=/commentTest/board/read.php?idx=<?php echo $bno; ?>">