<?php

if ($_GET['submit']=='delete'){
    $current_user=$_POST['userId'];

    $file_contents=file_get_contents('all.json');
    $users_json=json_decode($file_contents,true);

    foreach($users_json as $key=>$value){
        if($key=="users"){
            foreach($value as $i=>$current){
                if ($i==$current_user){
                   unset($users_json[$key][$i]);
                   $json_arr = array_values($users_json[$key]);
                   $users_json[$key]=$json_arr;
                   echo $current_user;
                }
            }
        }
    }
    file_put_contents('all.json', json_encode($users_json));
 }
?>