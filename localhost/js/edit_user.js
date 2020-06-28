$(document).ready(function () {
    const countryselected = $('#countryselected').val();
    $(`option[value= "${countries[countryselected]}"]`).attr("selected", true);

    $('#add_roles').click(function () {
        let roles = $('#roles').val();
        let edit_roles = $('#edit_roles').val();
        let all_roles = JSON.parse(edit_roles);
        let new_role = generateOneRole()
        let match=compareRoles(new_role,all_roles)
    
        //if generated role includes in array, then throw error(don't add in input), else add in input
        if (!match){
            all_roles.push(new_role)

           $('#roles').val(JSON.stringify(all_roles))
           $('#edit').prop('disabled',false)

           $('#roles_error').html('')

        }
        else{
            $('#roles_error').html(`Choose another role ${new_role} is exist`)
            $('#edit').prop('disabled',true)
        }
    })

    $("#edit").click(function () {
        let valid = true;
        let firstname = $('#firstname').val()

        if (firstname === '') {
            valid = false;
            $('#first_error').html('Fill field')
        }

        else {
            $('#first_error').html('')

        }

        let lastname = $('#lastname').val()
        if (lastname === '') {
            valid = false;
            $('#last_error').html('Fill field')
        }

        else {
            $('#last_error').html('')

        }

        let email = $('#email').val()

        if (email === '') {
            $('#email_error').html('Fill field');
            valid = false;
        }

        else if (!/^([a-z0-9\+_\-]{4,30})(\.[a-z0-9\+_\-]{1,30})*@([a-z0-9\-]{3,20}\.)+[a-z]{2,6}$/i.test(email)) {
            $('#email_error').html('Mail wrong format');
        }

        else {
            $('#email_error').html('')

        }
        let country = $('#country').val()
        if (country === null) {
            valid = false;
            $('#country_error').html('Select country')
        }

        else {
            $('#country_error').html('')

        }
        
        let for_roles=$('#roles').val();
        let roles=JSON.parse(for_roles)
        if (roles === '') {
            valid = false;
            $('#roles_error').html('Fill field')
        }

        else {
            $('#roles_error').html('')

        }

        let id = $("#userId").val()

        var user = {
            firstname,
            lastname,
            email,
            country,
            roles,
            id
        }

        if (valid){
            $.ajax({
                type: "POST",
                url: "user_change/get_users.php?submit=edit",
                data: user,
                success:function(data){
                    if (data){
                        window.location.href='../index.php';
                    }
                }
            })
        }
    })

    $('#cancel').click(function () {
        window.location.href = "../index.php";
    })
})


function compareRoles(role,arr){

   return arr.includes(role);
   

}