<?php
require_once './DAOPDO.class.php';
$name=$_POST['name'];
$pass=$_POST['password'];
$rname=$_POST['rname'];

$arr=array(
    'dbname'=>'test'
);
$dao=DAOPDO::getSingleton($arr);
$sql="insert into users values (null,'$name','$pass','$rname')";
$res=$dao->query($sql);
if ($res){
    header('location:01.php');
}else{
    echo '添加失败';
}

?>