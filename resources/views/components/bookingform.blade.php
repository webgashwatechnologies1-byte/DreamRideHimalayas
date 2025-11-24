<div class="sidebar-widget" id="book">
    <h6 class="block-heading">Book This Expedition</h6>

    <form id="form-book-tour">

        <div class="input-wrap mb-30">
            <input id="book-date" type="date" required>
        </div>

        <div class="flex-two mb-30">
            <span class="label">Choose Time:</span>
            <div class="radio">
                <input id="time-1" type="radio" name="startTime" value="07:30" checked>
                <label for="time-1">07:30 AM</label>

                <input id="time-2" type="radio" name="startTime" value="08:00">
                <label for="time-2">08:00 AM</label>
            </div>
        </div>

        <div class="input-wrap-sellect mb-30">
            <span class="label">Select Riders:</span>

            <div class="flex-two mb-15">
                <p id="solo-label">Rider (with bike)</p>
                <select id="sel-solo" class="nice-select">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="flex-two mb-15">
                <p id="pillion-label">Pillion Rider</p>
                <select id="sel-pillion" class="nice-select">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
        </div>

        <div class="input-wrap-checkbox mb-30">
            <span class="label">Add Extras</span>

            <div class="checkbox">
                <input id="extra-gopro" type="checkbox" value="gopro">
                <label for="extra-gopro">GoPro Helmet Camera (₹1,500)</label>
            </div>

            <div class="checkbox">
                <input id="extra-support" type="checkbox" value="support">
                <label for="extra-support">Backup Vehicle Support (₹2,000)</label>
            </div>
        </div>

        <div class="flex-two mb-40">
            <span class="label">Total:</span>
            <span class="total text-main" id="booking-total">₹0</span>
        </div>

        <button type="button" id="btn-book" class="btn w-100 mb-2">Proceed to Book</button>
        <button type="button" id="btn-enquiry" class="btn btn-warning w-100">Enquiry Now</button>

    </form>
</div>
