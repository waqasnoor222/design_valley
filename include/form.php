
<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


<!-- <input type="tel" id="phone"> -->




<form action="email.php" method="POST" class="PopupForm_popupForm__Ew0Vk popup-main-form">
<input type="hidden" id="packagePrice" name="packagePrice" value="">
<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">

    <div class="PopupForm_inputField__Y_4nR">
        <div class="PopupForm_input-flex__HUi23 undefined">
            <input placeholder="Your name*" class="form-control" type="text" value="" name="firstName" required id="firstName">
            <span class="error-message" id="nameError"></span>
        </div>
    </div>
    <div class="PopupForm_inputField__Y_4nR">
        <div class="PopupForm_input-flex__HUi23 PopupForm_email__DbL35">
            <input placeholder="Your email address*" class="form-control" type="email" value="" name="cemail" id="cemail">
        </div>
    </div>
    <div class="PopupForm_inputField__Y_4nR">
        <input type="tel" id="phone" name="countryCode">
    </div>
    <div class="PopupForm_inputField__Y_4nR">
        <div class="PopupForm_input-flex__HUi23 PopupForm_budget__D5oUs">
            <input min="1" placeholder="Your Budget" class="form-control" type="number" value="" name="budget" id="budget">
        </div>
    </div>
    <div class="PopupForm_inputField__Y_4nR">
        <div class="PopupForm_input-flex__HUi23 PopupForm_message__UCI8V">
            <textarea rows="4" name="message" placeholder="Your message" type="text" class="form-control" id="message"></textarea>
        </div>
    </div>
    <button type="submit" class="Button_btn__CsQ0G undefined">Lets Make a Deal</button>
</form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        // options
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });


    $(document).ready(function() {
    $('#popupForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting in the traditional way
        
        // Validate the form
        if (!validateForm()) {
            return false;
        }

        // Disable the submit button to prevent multiple clicks
        $(this).find('button[type="submit"]').attr('disabled', true);

        // Collect form data
        var formData = $(this).serialize();

        // Send the form data via AJAX
        $.ajax({
            url: 'email.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                        confirmButtonText: 'OK'
                    });
                }
                // Re-enable the submit button
                $('#popupForm').find('button[type="submit"]').attr('disabled', false);
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'There was an error sending your message. Please try again later.',
                    confirmButtonText: 'OK'
                });

                // Re-enable the submit button
                $('#popupForm').find('button[type="submit"]').attr('disabled', false);
            }
        });
    });

    function validateForm() {
        let firstName = $('#firstName').val().trim();
        let email = $('#cemail').val().trim();
        let phone = $('#phone').val().trim();
        let budget = $('#budget').val().trim();

        if (firstName === "") {
            Swal.fire({
                icon: 'warning',
                title: 'Validation Error',
                text: 'Name is required.',
                confirmButtonText: 'OK'
            });
            return false;
        }

        if (email === "") {
            Swal.fire({
                icon: 'warning',
                title: 'Validation Error',
                text: 'Email is required.',
                confirmButtonText: 'OK'
            });
            return false;
        }

        // Email pattern validation
        let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email)) {
            Swal.fire({
                icon: 'warning',
                title: 'Validation Error',
                text: 'Please enter a valid email address.',
                confirmButtonText: 'OK'
            });
            return false;
        }

        if (budget === "" || isNaN(budget) || parseFloat(budget) <= 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Validation Error',
                text: 'Please enter a valid budget.',
                confirmButtonText: 'OK'
            });
            return false;
        }

        return true;
    }
});

</script>



<style>


.swal2-container {
    z-index: 2000 !important;
}


    .iti{
        width: 100% !important;
    display: table !important;
    }
    .iti--allow-dropdown input, .iti--allow-dropdown input[type=tel], .iti--allow-dropdown input[type=text], .iti--separate-dial-code input, .iti--separate-dial-code input[type=tel], .iti--separate-dial-code input[type=text] {
    padding-right: 6px;
    padding-left: 52px;
    margin-left: 0;
    width: 100%;
    border: 0;
    border-bottom: 1px solid #c1ccd7;
    font-family: var(--font-inter);
    color: #000;
    border-radius: 0;
    font-size: 16px;
    box-shadow: none;
    padding: 12px 12px 12px 40px;
    background-image: unset;
    width: 100%;
    
}
.iti__country-list {
    width: 432px;
}
.iti--allow-dropdown .iti__flag-container, .iti--separate-dial-code .iti__flag-container {
    right: auto;
    left: -4px;
}


</style>