<?php 
@session_destroy();
@ob_end_flush();
?>
<meta http-equiv="refresh" content="0;url=<?=SITE?>login.php" />
<?php
exit();
?>