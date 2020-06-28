$(document).ready(function () {
    $('.delete').click(function () {
        let currentUser = this.id

        const userDel = {
            userId: currentUser
        }
        $(function () {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: '../user_change/delete_user.php?submit=delete',
                        data: userDel,
                        success: function (data) {
                            if (data === currentUser) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ).then(() => {
                                    window.location.replace("../index.php");
                                })
                            }
                        }
                    })
                }
            })
        });
    })
})