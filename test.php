<?php

$SERVER_IP = "cc1.cimeyclust.com"; //Insert the IP of the server you want to query. Query must be enabled in your server.properties file!
$SERVER_PORT = "6001"; //Insert the PORT of the server you want to ping. Needed to get the favicon, motd, players online and players max. etc
$QUERY_PORT = "6001"; //Port of query.port="" in your server.properties. Needed for the playerlist! Can be the same like the port or different

$HEADS = "3D"; //"normal" / "3D"
$SHOW_FAVICON = "on"; //"off" / "on"

$TITLE = "Server Status";
$TITLE_BLOCK_ONE = "Server Information";
$TITLE_BLOCK_TWO = "Players";

//You can either insert the DNS (eg. play.mc.com) OR the IP itself (eg. 127.0.0.1). 
//Note: port is not neccesary when running the server on default port, otherwise use it!

//End config

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$status = json_decode(file_get_contents('https://api.mcsrvstat.us/bedrock/2/cc1.cimeyclust.com:6001'));

?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <title><?php echo htmlspecialchars($TITLE); ?></title>
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css">
    	<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    	<link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    	<script type="text/javascript" src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    	<script language="javascript">
   		jQuery(document).ready(function(){
 			$("[rel='tooltip']").tooltip();
     	});
		</script>
    	<style>
    	/*Custom CSS Overrides*/
    	body {
      		font-family: 'Lato', sans-serif !important;
    	}
    	</style>
    </head>
    <body>
	<div class="container">
        <h1><?php echo htmlspecialchars($TITLE); ?></h1><hr>       
		<div class="row">
			<div class="span4">
				<h3><?php echo htmlspecialchars($TITLE_BLOCK_ONE); ?></h3>
				<table class="table table-striped">
					<tbody>
						<tr>
							<td><b>IP</b></td>
							<td><?php echo $status->hostname; ?></td>
						</tr>
                        <tr>
							<td><b>Version</b></td>
							<td><?php echo $status->version; ?></td>
						</tr>
                        <tr>
							<td><b>Online Players</b></td>
							<td><?php echo "".$status->players->online." / ".$status->players->max."";?></td>
						</tr>
						<tr>
							<td><b>Status</b></td>
							<td><?php if($status->online) { echo "<i class=\"icon-ok-sign\"></i> Server ist online"; } else { echo "<i class=\"icon-remove-sign\"></i> Server ist offline";}?></td>
						</tr>
					<?php if(!empty($favicon)) { ?>
					<?php if ($SHOW_FAVICON == "on") { ?>
						<tr>
							<td><b>Symbol</b></td>
							<td><img src='<?php echo $favicon; ?>' width="64px" height="64px" style="float:left;"/></td>
						</tr>
					<?php } ?>
					<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="span8">
				<h3><?php echo htmlspecialchars($TITLE_BLOCK_TWO); ?></h3>
				<?php

                ?>
			</div>
		</div>
	</div>
	</body>
</html>