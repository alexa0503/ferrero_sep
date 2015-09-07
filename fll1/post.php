<?php
$data = array(
	'ret' => 0,
	'msg' => '',
);
if( !isset($_POST['toName']) ){
	$data['ret'] = 1001;
	$data['msg'] = '老师姓名不能为空';
}
elseif( !isset($_POST['text']) ){
	$data['ret'] = 1002;
	$data['msg'] = '祝福不能为空';
}
elseif( !isset($_POST['fromName']) ){
	$data['ret'] = 1003;
	$data['msg'] = '落款不能为空';
}
else{
	$arr = array(
		'toName' => $_POST['toName'],
		'fromName' => $_POST['fromName'],
		'text' => $_POST['text'],
	);
	$json = json_encode($arr);
	$file_name = date('YmdHis').rand(111111,999999);
	file_put_contents('../text/'.$file_name.'.txt', $json);
	$data['file_name'] = $file_name;
}
echo json_encode($data);
exit(0);