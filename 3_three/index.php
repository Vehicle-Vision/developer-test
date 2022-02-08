<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	<div class="container" style="margin-top:20px;margin-right: 50%;">
    <div class="card shadow m-4">
      <div class="container align-items-center">
        <form method="post" action="index.php" enctype="multipart/form-data">
            <div  class="row" class="form-group">
              <div class="col-lg-12 mr-5">
              <input name="url" placeholder="place URL" class="form-control"  value="https://apps.vehicle-vision.com/sales/app/files/android135/vv_sales.apk">
              </div>
            </div>
            <br>
          <input name="postURL" class="btn btn-lg btn-primary btn-block" value="Get Size" type="submit">
            <br>
						<?php 
								if(isset($_POST['postURL'])):
                  $url = $_POST['url'];
                  $curl = curl_init($url);
                  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($curl, CURLOPT_HEADER, true);
                  curl_setopt($curl, CURLOPT_NOBODY, true);
                  curl_exec($curl);
                  $fileSize = curl_getinfo($curl, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
                  $fileSizeMB = round($fileSize / 1048576,2);
							?>
								<h6 style="color:green;"><?php echo $fileSizeMB . ' MB '?></h6>
							<?php endif; ?>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
