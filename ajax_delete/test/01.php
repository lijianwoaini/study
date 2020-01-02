<?php
require_once 'DAOPDO.class.php';
$configs=array(
    'dbname'=>'test'
);
$dao=DAOPDO::getSingleton($configs);
$sql="select * from users";
$arr=$dao->fetchAll($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td><a href="insert.html">添加</a></td>
    </tr>
    <tr>
        <th>账号</th>
        <th>密码</th>
        <th>rname</th>
        <th>操作</th>
    </tr>
    <?php foreach($arr as $key=>$value){ ?>
    <tr>
        <td><?php echo $value['name'] ?></td>
        <td><?php echo $value['pass'] ?></td>
        <td><?php echo $value['rname'] ?></td>
        <td><a id="<?php echo $value['id'] ?>" href="javascript:void(0)" class="btn">删除</a></td>
    </tr>
    <?php } ?>
</table>
<script src="jquery.min.js"></script>
<script>
    $(".btn").click(function () {
        $id=$(this).attr('id');
        $.ajax({
            url:'handle.php',
            type:'post',
            data:{id:$id},
            dataType:'json',
            success:function (data) {
                // console.log(data);
                if(data.code==1){
                    alert('删除成功');
                }else{
                    alert('删除失败');
                }

            }
        })
    })
</script>
</body>
</html>
