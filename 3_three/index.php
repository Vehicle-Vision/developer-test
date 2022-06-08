<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$urlErr = "";
$url = "";
$fileSize = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["url"])) {
    $urlErr = "URL is required";
  } else {
    $url = $_POST["url"];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    curl_setopt($ch, CURLOPT_NOBODY, TRUE);
    $data = curl_exec($ch);
    $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
    curl_close($ch);
    $fileSize = round( $size / 1048576, 2);
  }
}
?>

<h2>Reading URL - Test 3</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  URL: <input type="text" name="url" value="<?php echo $url;?>">
  <span class="error">* <?php echo $urlErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<?php if(!empty($fileSize)){
echo '<h2>File Size: ' .  $fileSize . 'MB<h2>';
 } ?>
</body>
</html>
