<?php
require_once 'DAOPDO.class.php';
$configs=array(
    'dbname'=>'project'
);
$dao=DAOPDO::getSingleton($configs);
$sql="select * from blog";
$arr=$dao->fetchAll($sql);
//echo '<pre>';
//print_r($arr);
//echo '</pre>';
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
        <th>标题</th>
        <th>创建时间</th>
        <th>推荐数</th>
        <th>操作</th>
    </tr>
    <?php foreach($arr as $key=>$value){ ?>
    <tr>
        <td><?php echo $value['title'] ?></td>
        <td><?php echo $value['create_time'] ?></td>
        <td><?php echo $value['recommend'] ?></td>

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
