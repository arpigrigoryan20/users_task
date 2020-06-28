<?php

if ($_GET['submit']=='add'){
    $id=$_POST['id'];
    $user['firstname']=$_POST['firstname'];
    $user['lastname']=$_POST['lastname'];
    $user['email']=$_POST['email'];
    $country=$_POST['country'];
    $file_content=file_get_contents('all.json');
    $dec_json=json_decode($file_content,true);
    foreach($dec_json as $key=>$value){
        if ($key=="countries"){
            foreach($value as $index=>$name){
                if ($name===$country){
                    $user['country']=$index;
                }
            }
        }
    }
    $user['roles']=$_POST['roles'];
    $json = json_encode($user);
    foreach ($dec_json as $key => $value) {
       if ($key=='users') {
        array_push($dec_json[$key],$user);
        echo true;
       }
        }
    file_put_contents('all.json', json_encode($dec_json));

}

else if ($_GET['submit']=='edit'){
    $id=$_POST['id'];
    $country=$_POST['country'];
    $file_content=file_get_contents('all.json');
    $dec_json=json_decode($file_content,true);
    foreach($dec_json as $key=>$value){
        if ($key=="countries"){
            foreach($value as $index=>$name){
                if ($name===$country){
                   $country_id=$index;
                }
            }
        }
    }


    foreach ($dec_json as $key => $value) {
       if ($key=='users') {
            foreach($value as $user_id=>$info){
               if ($user_id==$id){
                $info['firstname']=$_POST['firstname'];;
                $info['lastname']=$_POST['lastname'];
                $info['email']=$_POST['email'];
                $info['country']=$country_id;
                $info['roles']=$_POST['roles'];
                $value[$user_id]=$info;
               }
            $dec_json[$key]=$value;

           }
       }
    }
   
    file_put_contents('all.json', json_encode($dec_json));
    echo true;
}
?>