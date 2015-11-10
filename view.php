<!DOCTYPE html>

<?php
	$id = $_GET['id'];

	if (!$_GET['revision']) {
		$revision = '0'; //retrieve from database, default 0;
	} else {
		$revision = $_GET['revision'];
	};

	$extension = '.' . 'docx'; //retrieve from database

	$base = 'http://samenvattingen.westerbeek.us/';
	$url = $base.'files/'.$id.'-'.$revision.$extension;
?>

<html lang="nl">
	<title><?php echo $DocumentTitle ?></title>
	<head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">-->

		<!--<meta name="description" content="">
		<meta name="keywords" content="">
		<meta property="og:locale" content="nl_NL">
		<meta property="og:title" content="<?php echo $DocumentTitle ?>">
		<meta property="og:description" content="">-->

		<!--<link rel="stylesheet" type="text/css" media="screen" href="stylesheet.css" />-->
		<!--<link href="images/favicon.png" rel="icon" type="image/png" />-->

		<?php
			if ( !$ScriptPass ) {
				echo "
					<script>
					  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
					  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
					  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
					  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

					  ga('create', 'UA-37003381-1', 'auto');
					  ga('send', 'pageview');
					</script>"
				;
			} else {
				echo '<script>$.getScript( "scripts/ScriptPasser.php?sp=' . $ScriptPass . '");console.log("[DevMode] Currently preventing Google Analytics logging as you appear to be in Developer Mode.")</script>';
			};
		?>

		<style>
			html, body{
			  height:100%;
			}

			body {
				padding: 0px;
				margin: 0px;
			}
		</style>
	</head>

	<body>
		<noscript>
			<center>
				<div style="position: fixed; top: 0px; left: 0px; z-index: 3000; height: 100%; width: 100%; background-color: #232323">
					<?php/* include "../../../error.php"; */?>Het is noodzakelijk dat je Javascript inschakelt; zonder Javascript werkt deze website niet.
				</div>
			</center>
		</noscript>

		<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=<?php echo $url ?>' width='100%' height='100%' frameborder='0'>
		</iframe>

	</body>
</html>
