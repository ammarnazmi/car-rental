<div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateProfileForm">
        @csrf
        <input type="hidden" id="userId">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input id="updateUsername" class="form-control" type="text" name="update_username">
                        <div ><span id="updateUsernameError" class="text-danger"></span></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input id="updateEmail" class="form-control" type="text" name="update_email">
                        <div ><span id="updateEmailError" class="text-danger"></span></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Phone Number</label>
                        <input id="updatePhoneNumber" class="form-control" type="text" name="updatePhoneNumber">
                        <div ><span id="updatePhoneNumberError" class="text-danger"></span></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        const authToken = localStorage.getItem('authToken');

        $('#updateProfileForm').submit(function(event) {
            event.preventDefault();

            var updateUsername = $('#updateUsername').val();
            var updateEmail = $('#updateEmail').val();
            var updatePhoneNumber = $('#updatePhoneNumber').val();
            var userId = $('#userId').val();

            $.ajax({
                url: '/api/user/' + userId + '/update-profile',
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${authToken}`,
                },
                data: {
                    name: updateUsername,
                    email: updateEmail,
                    phone: updatePhoneNumber,
                },
                success: function(response) {
                    $('#updateProfileModal').modal('hide');
                    $('#username').val(updateUsername);
                    $('#email').val(updateEmail);
                    $('#phoneNumber').val(updatePhoneNumber);
                    $('#successToast').toast('show');
                    document.getElementById("successToastMessage").textContent = response.message;
                },
                error: function(error) {
                    if (error.responseJSON.errors.name) {
                        document.getElementById("updateUsernameError").textContent = error.responseJSON.errors.name[0];
                    }

                    if(error.responseJSON.errors.email) {
                        document.getElementById("updateEmailError").textContent = error.responseJSON.errors.email[0];
                    }

                    if(error.responseJSON.errors.phone) {
                        document.getElementById("updatePhoneNumberError").textContent = error.responseJSON.errors.phone[0];
                    }
                }
            });
            return false;
        });
    })
</script>
