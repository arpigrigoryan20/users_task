<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/create_user.css">
    <title>Create user</title>
</head>

<body>
    <div class="personal">
        <div class="personal-item">
            <div class="label">
                <label for="firstname">Firstname</label>
            </div>
            <div class="input">
                <input type="text" id="firstname">
                <span class="errors" id="first_error"></span>
            </div>
        </div>
        <div class="personal-item">
            <div class="label">
                <label for="lastname">Lastname</label>
            </div>
            <div class="input">
                <input type="text" id="lastname">
                <span class="errors" id="last_error"></span>

            </div>
        </div>
        <div class="personal-item">
            <div class="label">
                <label for="email">Email</label>
            </div>
            <div class="input">
                <input type="text" id="email">
                <span class="errors" id="email_error"></span>

            </div>

        </div>
        <div class="personal-item">
            <div class="label">
                <label for="country">Country</label>
            </div>
            <div class="input" id="country_select">
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
                <button id='generate_roles'>Get roles</button>
                <input type="text" id="roles" >
                <span class="errors" id="roles_error"></span>

            </div>
        </div>

        <div class="button">
            <button id="add">Add</button>

        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/array_country.js"></script>

        <script src="js/create_user.js"></script>
        <script src="js/country_select.js"></script>
</body>

</html>