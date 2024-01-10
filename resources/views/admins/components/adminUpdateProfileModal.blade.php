<div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateProfileForm">
        @csrf
        <input type="hidden" id="adminId">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="updateUsername" class="form-control" type="text" name="update_username">
                        <div class="updateUsernameError"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="updateEmail" class="form-control" type="text" name="update_email">
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
        $('#updateProfileForm').submit(function(event) {
            event.preventDefault();

            var adminId = $('#adminId').val();
            var updateUsername = $('#updateUsername').val();
            var updateEmail = $('#updateEmail').val();

            $.ajax({
                url: '/api/admins/' + adminId + '/update-profile',
                method: 'PUT',
                data: {
                    name: updateUsername,
                    email: updateEmail,
                },
                success: function(response) {
                    $('#updateProfileModal').modal('hide');
                    $('#username').val(updateUsername);
                    $('#username').val(updateUsername);
                    $('#updateProfileToast').toast('show');
                },
                error: function(error) {
                    console.log('error');
                }
            });
        });
    })
</script>
