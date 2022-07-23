<?php 
$array=array 
(
    array("user_id"=>1,"first_name"=>"Maryanne","last_name"=>"Wanjiru","user_email"=>"mary@gmail.com","user_status"=>"active"),
    array("user_id"=>3,"first_name"=>"James","last_name"=>"Bond","user_email"=>"bond@gmail.com","user_status"=>"active"),
    array("user_id"=>4,"first_name"=>"Titus","last_name"=>"Peters","user_email"=>"peters@gmail.com","user_status"=>"active")
);
/*function Return_Values($array)
{
    return (array_values ($array,$array1,$array2));
}
$array=array(1,Maryanne,Wanjiru,mary@gmail.com,active);
$array1=array(3,James,Bond,bond@gmail.com,active);
$array2=array(4,Titus,Peters,peters@gmail.com,active);*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Test2</title>
        <link rel="stylesheet" href="table.css">
</head>
<body>
      <table style="margin: 0 auto" class="table1">
        <thead>
            <tr>
                <th>User id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>

        <?php foreach($array as $array){ ?>
            <tr>
                <td><?php echo $array['user_id'];?></td>
                <td><?php echo $array['first_name'];?></td>
                <td><?php echo $array['last_name'];?></td>
                <td><?php echo $array['user_email'];?></td>
                <td><?php echo $array['user_status'];?></td>
            </tr>
        <?php } ?>
      </table>
</body>
</html>