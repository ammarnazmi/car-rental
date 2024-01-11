<div>
    <div class="modal fade" id="userBookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="" method="post" id="updateProfileForm">
            @csrf
            <input type="hidden" id="adminId">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Booking Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group pt-2">
                            <label for="manufacturer">Manufacturer</label>
                            <input id="manufacturerId" class="form-control" type="text" name="manufacturer" disabled>
                        </div>
                        <div class="form-group pt-2">
                            <label for="vehicle">Vehicle Name</label>
                            <input id="vehicleId" class="form-control" type="text" name="vehicle" disabled>
                        </div>
                        <div class="form-group pt-2">
                            <label for="price">Price (RM)/day</label>
                            <input id="priceId" class="form-control" type="text" name="price" disabled>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md-6">
                                <label for="startDate">Start Date</label>
                                <input id="startDateId" class="form-control" type="date" name="startDate" min="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="endDate">End Date</label>
                                <input id="endDateId" class="form-control" type="date" name="endDate" min="<?php echo date('Y-m-d'); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <div class="col-md-3">
                                <label for="totalPrice">Total Price (RM)</label>
                                <input id="totalPriceId" class="form-control" type="text" name="totalPrice" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  id="cancelBookingCarId" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).on('click', '#userBookingButton', function() {
        $('#manufacturerId').val($(this).data('manufacturer'));
        $('#vehicleId').val($(this).data('vehicle'));
        $('#priceId').val($(this).data('price'));
    });

    $(document).ready(function() {
        function calculateInterval() {
            var startDate = new Date($('#startDateId').val());
            var endDate = new Date($('#endDateId').val());

            if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
                var timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
                var days = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;
                var totalPrice = (days *  parseFloat($('#priceId').val())).toFixed(2);

                $("#totalPriceId").val(totalPrice);
            }
        }
        $("#startDateId").change(calculateInterval);
        $("#endDateId").change(calculateInterval);
    });

    function clearInputs() {
        $("#startDateId, #endDateId, #totalPriceId").val('');
    }

    $("#cancelBookingCarId").click(clearInputs);

    function setMinEndDate() {
        var startDateValue = $("#startDateId").val();
        $("#endDateId").prop('min', startDateValue);
    }

    function toggleEndDate() {
        var startDateValue = $("#startDateId").val();
        $("#endDateId").prop('disabled', !startDateValue);
    }

    $("#startDateId").change(function () {
        toggleEndDate();
        setMinEndDate();
    });



</script>
