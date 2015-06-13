<?php
$url = basename($_SERVER['SCRIPT_FILENAME']);
if(isset($_GET['progress_key'])) {
	$status = apc_fetch('upload_'.$_GET['progress_key']);
	echo $status['current']/$status['total']*100;
	die;
}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.js" type="text/javascript"></script>
<link href="style_progress.css" rel="stylesheet" type="text/css" />
<script>
$(document).ready(function() {
	setInterval(function()
		{
	$.get("<?php echo $url; ?>?progress_key=<?php echo $_GET['up_id']; ?>&randval="+ Math.random(), {
	},
		function(data)
			{
				$('#progress_container').fadeIn(100);
				$('#progress_bar').width(data +"%");
				$('#progress_completed').html(parseInt(data) +"%");
			}
		)},500);
});
</script>
<body style="margin:0px">
<!--Progress bar divs-->
<div id="progress_container">
	<div id="progress_bar">
  		 <div id="progress_completed"></div>
	</div>
</div>
<!---->
</body>
