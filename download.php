<?php
	$id = $_GET['id'];
	
	if (!$_GET['revision']) {
		$revision = '0'; //retrieve from database, default 0;
	} else {
		$revision = $_GET['revision'];
	};
	
	$extension = '.' . 'docx'; //retrieve from database
	
	$name = 'samenvatting';
	
	if ($revision==0) {
		$filename = $name.$extension;
	} else {
		$filename = $name.' '.$revision.$extension;
	};
	$base = 'http://lschoonheid.leerik.nl/summary/';
	$url = $base.'files/'.$id.'-'.$revision.$extension.'/'.$filename;
	$dUrl = $base.'f/'.$id.'-'.$revision.$extension.'/n/'.$filename;
	header ("location: " . $dUrl);
?>