$(document).ready(function () {
    var roles;

    $('#firstname').keyup(function (e) {
        let id = this.id;
        let val = this.value;
        localStorage.setItem(id, val)
    })

    $('#lastname').keyup(function (e) {
        let id = this.id;
        let val = this.value;
        localStorage.setItem(id, val)
    })

    $('#email').keyup(function (e) {
        let id = this.id;
        let val = this.value;
        localStorage.setItem(id, val)
    })

    let saved_first = getSavedValue('firstname')
    let saved_last = getSavedValue('lastname')
    let saved_mail = getSavedValue('email')

    $('#firstname').val(saved_first)
    $('#lastname').val(saved_last)
    $('#email').val(saved_mail)

    $('#generate_roles').click(function () {
         roles =JSON.stringify(generateRoles(4))
         $('#roles').val(roles)
    })

    $('#add').click(function () {
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
        let roles = JSON.parse($('#roles').val())
        if (roles .length<0) {
            valid = false;
            $('#roles_error').html('Fill field')
        }

        else {
            $('#roles_error').html('')

        }

        var user = {
            firstname,
            lastname,
            email,
            country,
            roles
        }


        if (valid) {
            $.ajax({
                type: "POST",
                url: "user_change/get_users.php?submit=add",
                data: user,
                success: function (data) {
                    if (data) {
                        removeValue('firstname');
                        removeValue('lastname');
                        removeValue('email');
                        window.location.href = '../index.php';
                    }
                }
            })
        }
    })
})


function getSavedValue(v) {
    if (!localStorage.getItem(v)) {
        return "";
    }
    return localStorage.getItem(v);

}

function removeValue(v) {

    if (localStorage.getItem(v)) {
        localStorage.removeItem(v)
    }

}















