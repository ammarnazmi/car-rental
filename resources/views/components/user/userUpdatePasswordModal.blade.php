<div class="modal fade" id="updatePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="post" id="updatePasswordform">
        @csrf
        <input type="hidden" id="userId">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="currentPassword">Current Password</label>
                        <input id="currentPassword" class="form-control" type="text" name="currentPassword" >
                        <div ><span id="currentPasswordErrorMessage" class="text-danger"></span></div>
                    </div>
                    <div class="form-group pt-5">
                        <label for="newPassword">Enter New Password</label>
                        <input id="newPassword" class="form-control" type="text" name="newPassword" >
                        <div ><span id="newPasswordErrorMessage" class="text-danger"></span></div>

                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input id="confirmPassword" class="form-control" type="text" name="confirmPassword" >
                        <div ><span id="confirmPasswordErrorMessage" class="text-danger"></span></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="savePassword" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        const authToken = localStorage.getItem('authToken');

        $('#updatePasswordform').submit(function(event) {
            event.preventDefault();

            var userId = $('#userId').val();
            var currentPassword = $('#currentPassword').val();
            var newPassword = $('#newPassword').val();
            var confirmPassword = $('#confirmPassword').val();

            $.ajax({
                url: '/api/user/' + userId + '/update-password',
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${authToken}`,
                },
                data: {
                    current_password: currentPassword,
                    new_password: newPassword,
                    confirm_password: confirmPassword,
                },
                success: function(response) {
                    $('#updatePasswordModal').modal('hide');
                    document.getElementById("successToastMessage").textContent = response.message;
                    $('#successToast').toast('show');
                },
                error: function(error) {
                    if(error.status == 404) {
                        document.getElementById("errorToastMessage").textContent = error.responseJSON.message;
                        $('#errorToast').toast('show');
                    }

                    if(error.responseJSON.errors.current_password) {
                        document.getElementById("currentPasswordErrorMessage").textContent = error.responseJSON.errors.current_password[0];
                    }

                    if(error.responseJSON.errors.new_password){
                        document.getElementById("newPasswordErrorMessage").textContent = error.responseJSON.errors.new_password[0];
                    }

                    if(error.responseJSON.errors.confirm_password) {
                        document.getElementById("confirmPasswordErrorMessage").textContent = error.responseJSON.errors.confirm_password[0];
                    }
                }
            });

        })
    });
</script>
