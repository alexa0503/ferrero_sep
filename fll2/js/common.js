//找到url中匹配的字符串
function findInUrl(str){
	url = location.href;
	return url.indexOf(str) == -1 ? false : true;
}
//获取url参数
function queryString(key){
    return (document.location.search.match(new RegExp("(?:^\\?|&)"+key+"=(.*?)(?=&|$)"))||['',null])[1];
}

//产生指定范围的随机数
function randomNumb(minNumb,maxNumb){
	var rn=Math.round(Math.random()*(maxNumb-minNumb)+minNumb);
	return rn;
	}
	
var wHeight;
$(document).ready(function(){
	wHeight=$(window).height();
	if(wHeight<832){
		wHeight=832;
		}
	$('.outerDiv').height(wHeight);
	$('.page1').css('margin-top',((wHeight-832)/2-232)+'px');
	$('.page2').css('margin-top',((wHeight-832)/2-182)+'px');
	$('.page3').css('margin-top',((wHeight-832)/2-182)+'px');
	$('.page4Btn1').css('top',((wHeight-1039)/2+995)+'px');
	$('.page4Btn2').css('top',((wHeight-1039)/2+995)+'px');
	
	$('.indexTxt').css('top',((1039-wHeight)/2+250)+'px');
	
	//预加载
	window.onload=winOnload;
	});
	
function winOnload(){
	indexAct();
	}
	
function indexAct(){
	$('.indexTxt1').addClass('indexTxt1Act');
	$('.indexTxt2').addClass('indexTxt2Act');
	$('.indexTxt3').addClass('indexTxt3Act');
	$('.indexImg1').addClass('indexImg1Act');
	$('.le3').addClass('indexImg1Act');
	$('.lighting1').addClass('lighting1Act');
	$('.lighting2').addClass('lighting2Act');
	$('.lighting3').addClass('lighting3Act');
	$('.indexBtn').addClass('indexBtnAct');
	$('.indexImg2').addClass('indexImg2Act');
	$('.page1').fadeIn(500);
	_czc.push(["_trackEvent","贺卡","P_1"]);
	}
	
function goPage2(){
	if(isBgmPlay){
		bgm.play();
		$('.musicBtn1').addClass('indexBtn2');
		}
	$('.indexTxt').fadeOut(500);
	$('.indexBtn').fadeOut(500);
	$('.le3').removeClass('indexImg1Act').addClass('le3Act');
	$('.le2').addClass('le2Act').show();
	//$('.page2Img1').fadeIn(1000);
	
	_czc.push(["_trackEvent","贺卡","P_2"]);
	setTimeout(function(){
		$('.page2Img2').addClass('page2Img2Act').show();
		},2000);
	setTimeout(function(){goPage3();},4100);
	}
	
var handerTime;
function goPage3(){
	$('.page2Img2').removeClass('page2Img2Act').addClass('page2Img2Act2');;
	$('.page3Img1').addClass('page3Img1Act').show();
	$('.page2Img1').addClass('page2Img1Act');
	$('.indexImg2').removeClass('indexImg2Act').addClass('indexImg2Act2');
	setTimeout(function(){
		$('.indexImg1').removeClass('indexImg1Act').fadeOut(1500);
		$('.le2').removeClass('le2Act').fadeOut(1000);
		},500);
	setTimeout(function(){
		$('.page2Btn1').fadeIn(500);
		setTimeout(function(){
			$('.page2Btn1').addClass('page2Btn1Act');
			},600);
		},2500);
		
	handerTime=setTimeout(function(){
		$('.hander').css({'left':'640px','top':'970px'}).stop().animate({top:870,left:550},1000).show();
		},5000);
	}
	
function goPage4(){
	clearTimeout(handerTime);
	$('.hander').hide();
	$('.page1').fadeOut(500);
	$('.page25').show();
	$('.p25Img').addClass('p25ImgAct');
	$('.page5Img1').addClass('page5Img1Act');
	$('.page4Img3').addClass('page4Img3Act');
	$('.page4Img2').addClass('page4Img2Act');
	$('.page4Btn1').addClass('page4Btn1Act');
	$('.page4Btn2').addClass('page4Btn2Act');
	$('.page2').fadeIn(500);
	setTimeout(function(){
		$('.page25').hide();
		},1200);
	_czc.push(["_trackEvent","贺卡","P_3"]);
	}
	
function goPage5(){
	$('.page25').fadeIn(500);
	$('.p25Img').removeClass('p25ImgAct').addClass('p25ImgAct2');
	$('.page2').fadeOut(500);
	$('.page5Img2').addClass('page5Img2Act');
	$('.page5Img3').addClass('page5Img3Act');
	$('.page5Le2').addClass('page5Img3Act');
	$('.page5Btn3').addClass('page5Btn3Act');
	$('.page5Btn').addClass('page5BtnAct');
	$('.page5Img4').addClass('page5Img4Act');
	$('.page3').fadeIn(500);
	setTimeout(function(){
		$('.page25').fadeOut(1000);
		$('.page5Le3').addClass('page5Le3Act').show();
		$('.page5Le2').removeClass('page5Img3Act').addClass('page5Le2Act');
		},1500);
	_czc.push(["_trackEvent","贺卡","P_4"]);
	}
	
function showSharePop(){
	$('.sharePop').fadeIn(500);
	}
	
function closePop(){
	$('.sharePop').fadeOut(500);
	}
	
var isBgmPlay=true;
function conBmg(){
	var bgm=document.getElementById('bgm');
	if(isBgmPlay){
		isBgmPlay=false;
		bgm.pause();
		$('.musicBtn1').removeClass('indexBtn2');
		}
		else{
			isBgmPlay=true;
			bgm.play();
			$('.musicBtn1').addClass('indexBtn2');
			}
	}