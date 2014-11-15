<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<TITLE>DrunkenMaster ~酔えば酔うほど強くなる！~ </TITLE>
<style>
<!--
BODY{

}
.wrapper{
	margin: 0 auto 0 auto;
	width: 100%;
	height: 600px;
	background-repeat: no-repeat;
 	background-size: 100%;
}
.your_score{
	color: #3a3a3a;
}
.ranking{
	
}
.ranking_table{
	
}
.ranking_table tr{
	
}
.ranking_table tr td{
	
}

table {
  width: auto;
  border-spacing: 0;
  font-size:14px;
}
table th {
  color: #fff;
  padding: 8px 15px;
  background: #258;
  background:-moz-linear-gradient(rgba(34,85,136,0.7), rgba(34,85,136,0.9) 50%);
  background:-webkit-gradient(linear, 100% 0%, 100% 50%, from(rgba(34,85,136,0.7)), to(rgba(34,85,136,0.9)));
  font-weight: bold;
  border-left:1px solid #258;
  border-top:1px solid #258;
  border-bottom:1px solid #258;
  line-height: 120%;
  text-align: center;
  text-shadow:0 -1px 0 rgba(34,85,136,0.9);
  box-shadow: 0px 1px 1px rgba(255,255,255,0.3) inset;
}
table th:first-child {
  border-radius: 5px 0 0 0;	
}
table th:last-child {
  border-radius:0 5px 0 0;
  border-right:1px solid #258;
  box-shadow: 2px 2px 1px rgba(0,0,0,0.1),0px 1px 1px rgba(255,255,255,0.3) inset;
}
table tr td {
  padding: 8px 15px;
  border-bottom: 1px solid #84b2e0;
  border-left: 1px solid #84b2e0;
  text-align: center;
}
table tr td:last-child {
  border-right: 1px solid #84b2e0;
  box-shadow: 2px 2px 1px rgba(0,0,0,0.1);
}
table tr {
  background: #fff;
}
table tr:nth-child(2n+1) {
  background: #f1f6fc;
}
table tr:last-child td {
  box-shadow: 2px 2px 1px rgba(0,0,0,0.1);
}
table tr:last-child td:first-child {
  border-radius: 0 0 0 5px;
}
table tr:last-child td:last-child {
  border-radius: 0 0 5px 0;
}
table tr:hover {
  background: #bbd4ee;
  cursor:pointer;
}
-->
</style>
<?php
	$score = $_GET['score'];
	$uuid = $_GET['uuid'];
	$storeId = $_GET['storeId'];
	
	$url = "https://dm.azure-mobile.net/api/ranking?place=";
	$options = array(
	  'http' => array(
	    'method'  => 'GET',
	    )
	);
	$context  = stream_context_create( $options );
	$result = file_get_contents( $url, false, $context );
	
	$result2 = json_decode($result,true);
?>
</HEAD>
<BODY>
<div class="wrapper">
<h2 class="your_score">あなたのスコアは<span sytle="color:red;"><?php echo $score; ?>点</span>でした！！！！</h2>
<div class="ranking">
<table class="ranking_table">
<tr>
	<th>レベル</th>
	<th>ニックネーム</th>
	<th>店舗</th>
	<th>スコア</th>
</tr>
<?php foreach($result2 as $key => $val) :?>
<tr>
	<td class="level">Lv <?php echo $result2[$key]['level']; ?></td>
	<td class="nickname"><?php echo $result2[$key]['nickname']; ?></td>
	<td class="place"><?php echo $result2[$key]['place']; ?></td>
	<td class="score"><?php echo $result2[$key]['score']; ?>点</td>
</tr>
<?php endforeach ?>
</table>
</div>
</div>
</BODY>
</HTML>