<!-- BOOKING MODAL -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

            <div class="modal-body">

                <h3 class="text-center mb-4" id="booking-modal-title">Book This Package</h3>

                <form id="form-booking">

                    <input type="hidden" id="booking-package-id">

                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" id="b_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" id="b_email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" id="b_phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Selected Date</label>
                        <input type="text" id="b_date_show" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label>No. of Riders</label>
                        <input type="text" id="b_riders_show" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Selected Services</label>
                        <textarea id="b_services_show" class="form-control" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Amount to Pay (₹)</label>
                        <input type="number" readonly id="b_amount" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Your Message</label>
                        <textarea id="b_message" class="form-control"></textarea>
                    </div>
<input type="hidden" id="b_package_id">
<input type="hidden" id="b_date">
<input type="hidden" id="b_riders">
<input type="hidden" id="b_services">
<input type="hidden" id="b_amount">

                    <button type="button" id="bookingSubmitBtn" class="btn btn-primary w-100">Confirm Booking</button>

                </form>

            </div>
        </div>
    </div>
</div>
