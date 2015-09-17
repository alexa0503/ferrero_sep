<?php
include_once('../includes/jssdk.php');
//include_once('../includes/curl.php');
$domain = 'http://'.$_SERVER[HTTP_HOST];
define('WECHAT_APPID','wx3978e56538c6ef7f');
define('WECHAT_SECRET','83bc38882177448990ea14101ca7b78a');
$wechat_share = array(
	'title'=>'臻心意 致师恩',
	'desc' => '您的学生送来一份甜蜜的祝福',
	'link' => $domain.'/fll2/index.php?n='.$_GET['n'],
	'imgUrl' => $domain.'/fll1/images/share.jpg'
	);
$jssdk = new Jssdk(WECHAT_APPID, WECHAT_SECRET);
$sign_package = $jssdk->getSignPackage();
if( isset($_GET['n'])){
	$data = json_decode(file_get_contents('../text/'.$_GET['n'].'.txt'), true);
}

if( !empty($data['fromName']))
	$wechat_share['desc'] = '您的学生'.$data['fromName'].'送来一份甜蜜的祝福';
if( empty($data['fromName']))
	$data['fromName'] = '您的学生';
if( empty($data['toName']))
	$data['toName'] = '老师';
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="format-detection" content="telephone=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<title>臻心意 报师恩</title>
	<link rel="stylesheet" href="css/common.css">
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/common.js"></script>

	<!--移动端版本兼容 -->
	<script type="text/javascript">
		var phoneWidth =  parseInt(window.screen.width);
		var phoneScale = phoneWidth/640;
		var ua = navigator.userAgent;
		if (/Android (\d+\.\d+)/.test(ua)){
			var version = parseFloat(RegExp.$1);
			if(version>2.3){
				document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
			}else{
				document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
			}
		} else {
			document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
		}
	</script>
	<!--移动端版本兼容 end -->
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript">
		wxData = {
			wx_app_id: '<?php echo $sign_package["appId"];?>',
			wx_timestamp: '<?php echo $sign_package["timestamp"];?>',
			wx_nonce_str: '<?php echo $sign_package["nonceStr"];?>',
			wx_signature: '<?php echo $sign_package["signature"];?>',
			wx_title: '<?php echo $wechat_share["title"]?>',
			wx_desc :  '<?php echo $wechat_share["desc"]?>',
			wx_share_url:  '<?php echo $wechat_share["link"]?>',
			wx_img_url:  '<?php echo $wechat_share["imgUrl"]?>'
		}
		function wxShare(data){
			wx.config({
				debug: false,
				appId: data.wx_app_id,
				timestamp: data.wx_timestamp,
				nonceStr: data.wx_nonce_str,
				signature: data.wx_signature,
				jsApiList: [
				'onMenuShareTimeline',
				'onMenuShareAppMessage'
				]
			});
			wx.ready(function () {
				wx.onMenuShareAppMessage({
					title: data.wx_title,
					desc: data.wx_desc,
					link: data.wx_share_url,
					imgUrl: data.wx_img_url,
					trigger: function (res) {
					},
					success: function (res) {
						_czc.push(["_trackEvent","贺卡","分享完成"]);
					},
					cancel: function (res) {
					},
					fail: function (res) {
					}
				});
				wx.onMenuShareTimeline({
					title: data.wx_desc,
					desc: data.wx_desc,
					link: data.wx_share_url,
					imgUrl: data.wx_img_url,
					trigger: function (res) {
					},
					success: function (res) {
						_czc.push(["_trackEvent","贺卡","分享完成"]);
					},
					cancel: function (res) {
					},
					fail: function (res) {
					}
				});
			});
		}
		wxShare(wxData);
	</script>
</head>

<body>
	<audio src="images/bgm.mp3" id="bgm" preload="auto" autoplay loop style="display:none; height:0;"></audio>
	<div class="outerDiv">
		<div class="page page1" style="display:none;">
			<div class="innerDiv">
				<div class="indexTxt">
					<img src="images/indexTxt1.png" class="indexTxt1">
					<img src="images/indexTxt2.png" class="indexTxt2">
					<img src="images/indexTxt3.png" class="indexTxt3">
				</div>

				<img src="images/le3.png" class="abs indexImg1">
				<img src="images/le1.png" class="abs le3">
				<img src="images/le2.png" class="abs le2" style="display:none;">

				<img src="images/page4Img3.png" class="abs indexImg2">

				<img src="images/page2Img2.png" class="abs page2Img2" style="display:none;">
				<div class="abs page3Img1" style="display:none;">
					<div class="innerDiv">
						<img src="images/f1.png" class="f1">
						<img src="images/f2.png" class="f2 f2Act">
						<img src="images/f3.png" class="f3 f3Act">
						<img src="images/f4.png" class="f4 f4Act">
						<img src="images/f5.png" class="f5 f5Act">
					</div>
				</div>

				<img src="images/l1.png" class="abs lighting1">
				<img src="images/l2.png" class="abs lighting2">
				<img src="images/l3.png" class="abs lighting3">

				<div class="abs indexBtn">
					<div class="innerDiv">
						<img src="images/indexBtn2.png" class="indexBtn2">
						<a href="javascript:void(0);" onClick="goPage2();" class="abs indexBtn1"><img src="images/indexBtn1.png"></a>
					</div>
				</div>

				<a href="javascript:void(0);" class="abs page2Btn1" onClick="goPage4();" style="display:none;"><img src="images/page2Btn1.png"></a>
                
                <img src="images/hander.png" class="abs hander handerAct" style="display:none;">

			</div>
		</div>

		<div class="page page2" style="display:none;">
			<div class="innerDiv">
				<img src="images/page5Img2.png">
				<div class="page5Img1">
					<div class="innerDiv">
						<label class="abs txtName"><?php echo $data['toName'];?></label>
						<label class="txtLine" maxlength="50"><?php echo $data['text'];?></label>
						<label class="abs txtMyName"><?php echo $data['fromName'];?></label>
					</div>
				</div>
				<img src="images/page4Img3b.png" class="abs page4Img3">
				<img src="images/page4Img2.png" class="abs page4Img2">
				<a href="<?php echo $domain.'/fll1/index.php';?>" class="abs page4Btn1"><img src="images/page4Btn1.png"></a>
				<a href="javascript:void(0);" onClick="showSharePop();" class="abs page4Btn2"><img src="images/page4Btn2.png"></a><!--goPage5();-->
			</div>
		</div>

		<div class="page page3" style="display:none;">
			<div class="innerDiv">
				<img src="images/page5Img2.png">
				<img src="images/page5Img1.png" class="abs page5Img2">
				<img src="images/le3.png" class="abs page5Img3">
				<img src="images/le1.png" class="abs page5Le3" style="display:none;">
				<img src="images/le2.png" class="abs page5Le2">
				<a href="http://ferrero.tmall.com" target="_blank" class="abs page5Btn3"><img src="images/page5Btn3.png"></a>
				<div class="abs page5Btn">
					<div class="innerDiv">
						<img src="images/indexBtn2.png" class="page5Btn2">
						<a href="javascript:void(0);" onClick="showSharePop();_czc.push(['_trackEvent','贺卡','制作完成']);" class="abs page5Btn1"><img src="images/page5Btn1.png"></a>
					</div>
				</div>
				<img src="images/page4Img3b.png" class="abs page5Img4">
			</div>
		</div>

		<div class="page page25" style="display:none;">
			<div class="innerDiv">
				<img src="images/page4Img1.png" class="abs p25Img">
			</div>
		</div>
	</div>

	<img src="images/logo.png" class="logo">
	<a href="javascript:void(0);" onClick="conBmg();" class="musicBtn1 indexBtn2"><img src="images/musicBtn1.png" style="display:block; padding:20px;"></a>

	<img src="images/shareNote.png" class="pop sharePop" style="display:none;" onClick="closePop();">
    
    <div class="popBg" style="display:none;"></div>
    <img src="images/hsNote.png" class="pop popHs" style="display:none;">

	<script>
		$(document).ready(function(e){
			$(document).bind('touchmove', function (e) { e.preventDefault(); }, false);
		});
	</script>
	<div style="display:none;">
		<script src="http://s95.cnzz.com/z_stat.php?id=1256257678&web_id=1256257678" language="JavaScript"></script>
	</div>
	<script>
		var _hmt = _hmt || [];
		(function() {
			var hm = document.createElement("script");
			hm.src = "//hm.baidu.com/hm.js?21b8b4b19f244e0bd0ad39d329d637ce";
			var s = document.getElementsByTagName("script")[0]; 
			s.parentNode.insertBefore(hm, s);
		})();
	</script>


</body>
</html>
