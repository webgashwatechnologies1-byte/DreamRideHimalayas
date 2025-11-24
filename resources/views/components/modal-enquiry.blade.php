<!-- ENQUIRY MODAL -->
<div class="modal fade" id="enquiryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">

            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

            <div class="modal-body">

                <h3 class="text-center mb-4" id="enquiry-modal-title">Enquiry</h3>

                <form id="form-enquiry">

                    <input type="hidden" id="enquiry-package-id">

                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" id="e_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" id="e_email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" id="e_phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Selected Date</label>
                        <input type="text" id="e_date_show" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label>No. of Riders</label>
                        <input type="text" id="e_riders_show" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Selected Services</label>
                        <textarea id="e_services_show" class="form-control" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Your Message</label>
                        <textarea id="e_message" class="form-control"></textarea>
                    </div>
                    <input type="hidden" id="e_package_id">
                    <input type="hidden" id="e_date">
                    <input type="hidden" id="e_riders">
                    <input type="hidden" id="e_services">

                    <button type="button" id="enquirySubmitBtn" class="btn btn-warning w-100">Submit Enquiry</button>

                </form>

            </div>
        </div>
    </div>
</div>
