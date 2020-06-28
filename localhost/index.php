<?php

 $file_list= file_get_contents('user_change/all.json');
 $dec_list=json_decode($file_list,true);


 ?>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/create_user.css">
    <title>Users</title>
</head>
<body>
    <div class="create">
        <a href="create_user.php">Create user</a>

    </div>
  <div class="users">
        <table>
            <tr>
                <th></th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Country</th>
                <th>Roles</th>
                <th>Settings</th>
            </tr>
            <?php 
    foreach($dec_list as $key=>$value){
        if ($key=='users') {
            foreach($value as $keys=>$values){
                $each=$value[$keys];
            ?>
            <tr>
                <td><?echo $keys+1?></td>
            <?php 
                foreach($each as $index=>$each_user){
            ?>
            
            <td><?php
            if ($index=="country"){
                foreach($dec_list as $id=>$country_name){
                    if ($id=="countries"){
                        echo $country_name[$each_user];
                    }
                }
            }

            else if($index=="roles"){
                foreach($each_user as $each_role){
                    // echo '<pre>';
                    echo $each_role;
                    echo '<br>';

                }
            }
                else{
                   echo $each_user;
                }
            
            
            ?></td>
            
            <?php } ?>
                <td>
                    <a href="edit_user.php?id=<?=$keys?>"><button id="edit">Edit</button></a>
                    <a><button id="<?=$keys?>" class="delete">Delete</button>
                </td>
            </tr>
        <?php }
        }
    }?>
        </table>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="js/delete_values.js"></script>

    <script src="js/delete_user.js"></script>
</body>
</html>