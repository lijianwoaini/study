<?php
$id=$_POST['id'];//接收前台传递的id值
require_once 'DAOPDO.class.php';
$configs=array(
    'dbname'=>'test'
);
$dao=DAOPDO::getSingleton($configs);
$sql="delete from users where id=$id";
$res=$dao->query($sql);//执行的结果是布尔值 true/false
if($res){
    //自己拼接返回结果数组
    $arr=array(
        'code'=>1,
        'msg'=>'删除成功'
    );
    echo json_encode($arr);
}else{
    //自己拼接返回结果数组
    $arr=array(
        'code'=>0,
        'msg'=>'删除失败'
    );
    echo json_encode($arr);
}