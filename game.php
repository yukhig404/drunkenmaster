<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
<!--
BODY{
	background-color: red;
}
.wrapper{
	margin: 0 auto 0 auto;
	width: 100%;
	background-image:url("./img/bg.png");
	background-repeat: no-repeat;
 	background-size: 100%;
}
.question{
	margin-left: 10%;
	margin-top: 10%;
	width: 80%;
	position: relative;
}
	.monster{
		position: absolute;
		top: 100px;
		left: 85px;
	}
#progress{
	background-image:url("./img/bar_time.png");
	background-repeat: repeat-x;
}
.buttons{
	margin: 0 auto 0 auto;
	width: 80%;
	margin-top: 17%;
	margin-bottom: 20%;
	margin-left: 13%;	
}
.button{

}
.button_image{
	margin: 0 30px 10px auto;
	width: 80px;
}
-->
</style>
<title>ログイン</title>
<script langage="javascript">
	//指定したURLでリダイレクトさせる
	function jumpPage(url) {
		location.href = url;
	}
	function goHome(){
		jumpPage("/game.php?uuid=123&alcoholNum=950");
	}
</script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<?php
	if(empty($_GET["uuid"])){
		//再度ログイン処理をしてもらう
		//ログイン画面にリダイレクト
	}

	if (isset($_GET["alcoholNum"])) {
		//飲んでいるのか？
		$alcoholNum = $_GET["alcoholNum"];
		$uuid = $_POST["uuid"];
		if($alcoholNum < 100){
			//ログイン失敗
			$loginState = 0;
			//飲み足りないよ！画像をだす。
			
			//数秒後にゲーム開始画面に戻る。
		}else{
			//ログイン成功
			$loginState = 1;
		}
	}else{
		//ログイン失敗
		$loginState = 99;
	}
?>
</head>
<body>
<?php //飲みが足りないよ！?>
<?php if($loginState == 0): ?>
	<div class="" style="width: 300px;margin:0 auto 0 auto;">
		<img width="100%" src="http://textbooks.xsrv.jp/ng.png" / alt="ゲームはお酒を飲んでから！">
	</div>
<?php elseif($loginState == 1): ?>
<!-- javascriptでプログレスバー -->
<SCRIPT language="JavaScript">
<!--
	// 一定時間経過後に指定ページにジャンプする
	var restGameTime = 20; // 何秒後に移動するか？
	var score = 0;
	var uuid = 0;
	var storeId = -1;

	var url = "./result.php"; // 移動するアドレス
	
	// 画像がクリックされたら画像を入れ替える
	// img0.jpg,img1.jpgなどの数字が続いたファイルを複数用意します。
	var num = 5; // 入れ替える画像の枚数(最初の画像も含める)
	var nme = "./img/" // 画像のディレクトリとファイル名の数字と拡張子より前の部分
	var exp = "png" // 拡張子
	var cnt = 0;
	var rightPoint = 100;
	var wrongPoint = 50;
	
	var answer = 3;
	var answerArray = [1,2,3,4];
	var colorArray = ['blue','green','red','yellow'];
	
	var button_id = 0;
	var preCnt2 = -1;
	
	function jumpPage() {
	  url = url + '?score=' + score + '&uuid=' + uuid + '&storeId=' + storeId;
	  location.href = url;
	}
	
    function btnClick(obj){
		//答え合わせ
		button_id = obj.value;
		
		if(answer == button_id){ 	//正解
			score = score + rightPoint;
		}else{ 						//間違い
			score = score - wrongPoint;
		}

		//1～4までの乱数を発生させる
		cnt = Math.floor( Math.random() * 4 );
		cnt %= num;
		cnt = cnt + 1;

		//0～3までの乱数を発生させる
		cnt2 = Math.floor( Math.random() * 4 );
		cnt2 %= num;
		cnt2 = cnt2;

		//同じ問題は出さない
		while(preCnt2 == cnt2){
			//0～3までの乱数を発生させる
			cnt2 = Math.floor( Math.random() * 4 );
			cnt2 %= num;
			cnt2 = cnt2;
		}
		
		preCnt2 = cnt2;

		document.img.src = nme + 'panel_'+ colorArray[cnt2] + cnt + "." + exp;		
		answer = answerArray[cnt2];

    }

	var run = function(time) {
		return $.Deferred(function(dfd) {
		setTimeout(dfd.resolve, time)
		}).promise();
	}
	run().then(function() {
		$('#progress').each(function() {
			var $this = $(this)
			, rate = $this.attr('data-rate')
			, current = 100;
			
			var progress = setInterval(function() {
				if(current <= 0) {
					clearInterval(progress);
				} else {
					if(current <= 30){
						$this.addClass("progress-bar-danger");
					}else{
							
					}
					current -= 1;
					$this.css('width', (current)+ '%');
				}
			}, restGameTime*10);
		});
	});
	
	setTimeout("jumpPage()",restGameTime*1000)
	
//-->
</SCRIPT>
<div class="wrapper clearfix">
	<div style="width:80%;margin-left:18%;margin-right:2%;margin-top:2%">
	<SCRIPT LANGUAGE="JavaScript">
    </script>
	 <div id='progress' style='height:36px'>&nbsp</div>
	</div>
	<div class="question">
		<A href="JavaScript:changeImage()">
		<div class="">
			<IMG width="100%" src="./img/panel_red2.png" name="img" border="0"></A>
		</div>
		<div class="monster">
			<IMG width="120" src="./img/monster_1.png" name="img2" border="0"></A>
		</div>
	</div>
	<form action="#" method="post" onsubmit="return false;">
		<div class="buttons">
			<div>
				<input type="image" width="45%" src="./img/btn_blue_on.png" name="btn" value="1" onclick="btnClick(this)" />
				<input type="image" width="45%" src="./img/btn_green_on.png" name="btn" value="2" onclick="btnClick(this)" style="margin-left:%"/>
			</div>
			<div style="margin-top:2%">
				<input type="image" width="45%" src="./img/btn_red_on.png" name="btn" value="3" onclick="btnClick(this)" />
				<input type="image" width="45%" src="./img/btn_yellow_on.png" name="btn" value="4" onclick="btnClick(this)" style="margin-left:%"/>	
			</div>
		</div>
	</form>
</div>

</div>

<?php else: ?>
	<div class="">ログイン失敗。最初からやり直してください。</div>
<script language="JavaScript">
	<!--
	// 一定時間経過後に指定ページにジャンプする
	mnt = 5; // 何秒後に移動するか？
	//var url = "http://www.yahoo.co.jp"; // 移動するアドレス
	setTimeout("goHome()",mnt * 1000);
	//-->
</script>
<?php endif ?>
</body>
</html>