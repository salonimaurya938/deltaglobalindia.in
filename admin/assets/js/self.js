//verify mobile number
function verifyPhone() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "verify_phone.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            document.getElementById("verification-result").innerHTML = this.responseText;
            if (this.responseText.includes("Verification successful")) {
                document.getElementById("submit-btn").disabled = false;
            } else {
                document.getElementById("submit-btn").disabled = true;
            }
        }
    }
    var phone = document.getElementsByName("phone")[0].value;
    xhr.send("phone=" + encodeURIComponent(phone));
}

// Validation function
const validatePhone = (input) => {
    input.value = input.value.replace(/\D/g, '');
};

const MAX_GUESTS = 5;
let fieldCounter = 1;

const createFormFields = (guestNumber, selectedOption) => {
    const fields = {
        'addhar-card': `
            <div class="col-lg-6 col-md-6 col-12">
                <label>Upload front ID Guest${guestNumber}</label>
                <input type="file" class="form-control" name="addharfront${guestNumber}"/>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <label>Upload Back ID Guest${guestNumber}</label>
                <input type="file" class="form-control" name="addharback${guestNumber}"/>
            </div>
        `,
        'voter-id': `
            <div class="col-lg-6 col-md-6 col-12">
                <label>Upload front Voter ID Guest${guestNumber}</label>
               <input type="file" class="form-control" name="voteridfront${guestNumber}"/>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <label>Upload back Voter ID Guest${guestNumber}</label>
                <input type="file" class="form-control" name="voteridback${guestNumber}"/>
            </div>
        `,
        'pan-card': `	
            <div class="col-lg-6 col-md-6 col-12">
                <label>Upload Pan Card Guest${guestNumber}</label>
                <input type="file" class="form-control" name="pancard${guestNumber}"/>
            </div>
        `
    };
    return fields[selectedOption] || '';
};

const handleIdProofChange = function() {
    const selectedOption = $(this).val();
    const guestNumber = this.name.replace('idProof', '');
    $(`#formFields${guestNumber}`).html(createFormFields(guestNumber, selectedOption));
};

const addGuest = () => {
    if (fieldCounter >= MAX_GUESTS) {
        alert("Maximum number of guests reached.");
        return;
    }

    fieldCounter++;
    $("#formGuest1").append(`
        <div class="row guest-row" id="guest${fieldCounter}">
            <div class="col-lg-6 col-md-6 col-12">
                <label>Guest ${fieldCounter}</label>
                <input type="text" class="form-control" name="guest${fieldCounter}" placeholder="Enter Guest Name...">
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <label>Choose ID Proof Guest ${fieldCounter}</label>
                <select name="idProof${fieldCounter}" class="form-control fieldSelect">
                    <option value="">--Choose Option--</option>
                    <option value="addhar-card">Aadhaar Card</option>
                    <option value="voter-id">Voter ID</option>
                    <option value="pan-card">PAN Card</option>
                </select>
            </div>
            <div id="formFields${fieldCounter}"></div>
            <div class="col-lg-6 col-md-6 col-12" style="margin-top:40px;">
                <button type="button" class="btn btn-danger remove-guest" data-guest="${fieldCounter}">Remove Guest</button>
            </div>
        </div>
    `);

    // Initialize the new select field
    $(`select[name="idProof${fieldCounter}"]`).change(handleIdProofChange);
    updateAddGuestButton();
};

const removeGuest = (guestNumber) => {
    $(`#guest${guestNumber}`).remove();
    fieldCounter--;
    updateAddGuestButton();
};

const updateAddGuestButton = () => {
    $('#addGuestButton').prop('disabled', fieldCounter >= MAX_GUESTS);
};

$(document).ready(() => {
    $("select[name^='idProof']").change(handleIdProofChange);
    $('#btn-guest').click(addGuest);
    $(document).on('click', '.remove-guest', function() {
        removeGuest($(this).data('guest'));
    });
});