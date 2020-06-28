<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/create_user.css">
    <title>Edit user</title>
</head>
<?php


$users= file_get_contents('user_change/all.json');
$users_list=json_decode($users,true);

if(isset($_GET['id'])){
    $id=$_GET['id'];
    foreach($users_list as $key=>$value){
        if ($key=='users') {

            $firstname=$value[$id]['firstname'];
            $lastname=$value[$id]['lastname'];
            $email=$value[$id]['email'];
            $country=$value[$id]['country'];
            $roles=$value[$id]['roles'];
        }
    }
}
?>
<body>
    <div class="personal">
        <div class="personal-item">
            <div class="label">
                <label for="firstname">Firstname</label>
            </div>
            <div class="input">
                <input type="text" id="firstname" value="<?=$firstname?>">
                <input type="text" id="userId" value="<?=$id?>" style="display: none">
                <span class="errors" id="first_error"></span>
            </div>
        </div>
        <div class="personal-item">
            <div class="label">
                <label for="lastname">Lastname</label>
            </div>
            <div class="input">
                <input type="text" id="lastname" value="<?=$lastname?>">
                <span class="errors" id="last_error"></span>

            </div>
        </div>
        <div class="personal-item">
            <div class="label">
                <label for="email">Email</label>
            </div>
            <div class="input">
                <input type="text" id="email" value="<?=$email?>">
                <span class="errors" id="email_error"></span>

            </div>

        </div>
        <div class="personal-item">
            <div class="label">
                <label for="country">Country</label>
            </div>
            <div class="input" id="country_select">
            <input type="text" id="countryselected" value="<?=$country?>" style="display: none">

                <select id="country">
                    <option value="" selected disabled>Select country</option>
                </select>
                <span class="errors" id="country_error"></span>

            </div>
        </div>
        <div class="personal-item">
            <div class="label">
                <label for="roles">Roles</label>
            </div>
            <div class="input">
                <input type="text" id="new_roles" style="display:none">
                <input type="text" id="edit_roles" value='<?=json_encode($roles)?>' style="display: none">
                <input type="text" id="roles" value='<?=json_encode($roles)?>'>
            
                <button id="add_roles">Add roles</button>
                <span class="errors" id="roles_error"></span>

            </div>
        </div>

        <div class="button">
            <button id="edit">Edit</button>
            <button id='cancel'>Cancel</button>

        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/array_country.js"></script>
        <script src="js/delete_values.js"></script>
        <script src="js/edit_user.js"></script>
        <script src="js/country_select.js"></script>
</body>

</html>