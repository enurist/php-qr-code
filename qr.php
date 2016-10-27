<?php
$cht = 'qr';

if (is_string($_POST['url'])) {
	$url = filter_var($_POST['url'], FILTER_SANITIZE_URL);
	$chl = urlencode($url);
} else {
	$url = 'http://www.google.de/';
	$chl = urlencode($url);
}

if (is_numeric($_POST['chs'])) {
	$chs = filter_var($_POST['chs'], FILTER_SANITIZE_NUMBER_INT);
} else {
	$chs = '500';
}

if (is_string($_POST['chlde'])) {
	$chlde = filter_var($_POST['chlde'], FILTER_SANITIZE_STRING);
} else {
	$chlde = 'L';
}

if (is_numeric($_POST['chldr'])) {
	$chldr = filter_var($_POST['chldr'], FILTER_SANITIZE_NUMBER_INT);
} else {
	$chldr = '1';
}

if (is_string($_POST['choe'])) {
	$choe = filter_var($_POST['choe'], FILTER_SANITIZE_STRING);
} else {
	$choe = 'UTF-8';
}

$img = "http://chart.apis.google.com/chart?cht=".$cht."&chs=".$chs."x".$chs."&chld=".$chlde."|".$chldr."&chl=".$chl."&choe=".$choe;

/*
echo "\n"
	. "URL: $url \n"
	. "CHL: $chl \n"
	. "CHT: $cht \n"
	. "CHOE: $choe \n"
	. "CHS: $chs \n"
	. "CHLDE: $chlde \n"
	. "CHLDR: $chldr \n"
	. "IMG: $img \n"
	. "\n";
*/
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>QR-Code</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!--[if lt IE 9]>
	<script src="../js/html5shiv.min.js"></script>
	<script src="../js/respond.min.js"></script>
<![endif]-->
    </head>

    <body>
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand alert-link" href="#">QR-Code-Generator</a> </div>
                <!-- /.navbar-header -->
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a class="alert-link" href="qr.php">Begin</a></li>
                        <li class=""><a class="alert-link" href="https://developers.google.com/chart/infographics/docs/qr_codes?hl=de" target=_blank ">Help</a></li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div><!-- /.container -->
		</div><!-- /.navbar -->

		<div class="container ">

			<div class="jumbotron clearfix ">
				<h1>QR-Code <a href="<?php echo $img;?>" target=_blank"><img class="img-thumbnail pull-right img-responsive" src="<?php echo $img;?>"></a>
                            </h1>
                            <p>
                                <a href="<?php echo " $url ";?>" target="_blank">
                                    <?php echo "$url";?>
                                </a>
                            </p>
                            <p style="clear: both;">URL:
                                <?php echo $url;?>
                                    <br> CHL:
                                    <?php echo $chl;?>
                            </p>
                </div>
                <!-- /.jumbo -->
                <div class="page-header">
                    <h1>Parameter <small>(default)</small></h1> </div>
                <form class="form-horizontal" role="form" method="post" action="qr.php">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="chl">URL</label>
                        <div class="col-sm-6">
                            <input type="url" class="form-control" id="url" name="url" placeholder="<?php echo urldecode($chl);?>" value="<?php echo urldecode($chl);?>"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="cht">Kind <small>(qr)</small></label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" id="cht" name="cht" placeholder="<?php echo $cht;?>" value="<?php echo $cht;?>" disabled> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="choe">Encoding <small>(UTF-8)</small></label>
                        <div class="col-sm-2">
                            <select class="form-control" id="choe" name="choe">
                                <option <?php if ($choe=='UTF-8' ) { echo "selected";} ?> value="UTF-8">UTF-8</option>
                                <option <?php if ($choe=='Shift_JIS' ) { echo "selected";} ?> value="Shift_JIS">Shift_JIS</option>
                                <option <?php if ($choe=='ISO-8859-1' ) { echo "selected";} ?> value="ISO-8859-1">ISO-8859-1</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="chs">Size in px <small>(500)</small></label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" id="chs" name="chs" placeholder="<?php echo $chs;?>" value="<?php echo $chs;?>"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="chlde">Error correction <small>(L)</small></label>
                        <div class="col-sm-2">
                            <select class="form-control" id="chlde" name="chlde">
                                <option <?php if ($chlde=='L' ) { echo "selected";} ?> value="L">L (7% data loss)</option>
                                <option <?php if ($chlde=='M' ) { echo "selected";} ?> value="M">M (15% data loss)</option>
                                <option <?php if ($chlde=='Q' ) { echo "selected";} ?> value="Q">Q (25% data loss)</option>
                                <option <?php if ($chlde=='H' ) { echo "selected";} ?> value="H">H (30% data loss)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="chldr">Border lines <small>(1)</small></label>
                        <div class="col-sm-1">
                            <input type="number" class="form-control" id="chldr" name="chldr" placeholder="<?php echo $chldr;?>" value="<?php echo $chldr;?>"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <button type="submit" class="btn btn-default btn-primary">Set</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.container -->
            <script src="../js/jquery.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
    </body>

    </html>