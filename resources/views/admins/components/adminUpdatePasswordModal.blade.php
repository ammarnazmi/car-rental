<div class="modal fade" id="updatePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="post" id="updatePassword">
        @csrf
        <input type="hidden" id="admin_id">
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
                    </div>
                    <div class="form-group pt-5">
                        <label for="newPassword">Enter New Password</label>
                        <input id="newPassword" class="form-control" type="text" name="newPassword" >
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input id="confirmPassword" class="form-control" type="text" name="confirmPassword" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="savePassword" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#savePassword', function(event) {
            event.preventDefault();

            var adminId = $('#adminId').val();
            var currentPassword = $('#currentPassword').val();
            var newPassword = $('#newPassword').val();
            var confirmPassword = $('#confirmPassword').val();

            $.ajax({
                url: '/api/admins/' + adminId + '/update-password',
                method: 'PUT',
                data: {
                    current_password: currentPassword,
                    new_password: newPassword,
                    confirm_password: confirmPassword,
                },
                success: function(response) {

                },
                error: function(error) {

                }
            });

            window.location.reload();
        })
    });
</script>
