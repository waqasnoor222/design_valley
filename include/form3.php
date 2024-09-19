
<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


<!-- <input type="tel" id="phone"> -->




<!-- <input type="hidden" id="myInput" name="packagePrice" value="">
<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">

    <div class="PopupForm_inputField__Y_4nR">
        <div class="PopupForm_input-flex__HUi23 undefined">
            <input placeholder="Your name*" class="form-control firstName" type="text" value="" name="firstName" required id="firstName">
            <span class="error-message" id="nameError"></span>
        </div>
    </div>
    <div class="PopupForm_inputField__Y_4nR">
        <div class="PopupForm_input-flex__HUi23 PopupForm_email__DbL35">
            <input placeholder="Your email address*" class="form-control cemail" type="email" value="" name="cemail" id="cemail">
        </div>
    </div>
    <div class="PopupForm_inputField__Y_4nR">
    <input type="tel" id="phone2" name="countryCode" class="phone">
    </div>
    <div class="PopupForm_inputField__Y_4nR">
        <div class="PopupForm_input-flex__HUi23 PopupForm_budget__D5oUs">
            <input min="1" placeholder="Your Budget" class="form-control budget" type="number" value="" name="budget" id="budget">
        </div>
    </div>
    <div class="PopupForm_inputField__Y_4nR">
        <div class="PopupForm_input-flex__HUi23 PopupForm_message__UCI8V">
            <textarea rows="4" name="message" placeholder="Your message" type="text" class="form-control message" id="message"></textarea>
        </div>
    </div> -->



    <div class="ContactFrom_inputField__GMUX1">
                    <div class="ContactFrom_input-flex___f9qM undefined">
                    <input placeholder="Your name*" class="form-control firstName" type="text" value="" name="firstName" required id="firstName">
                    </div>
                </div>
                <div class="ContactFrom_inputField__GMUX1">
                    <div class="ContactFrom_input-flex___f9qM ContactFrom_email__eovGH">
                    <input placeholder="Your email address*" class="form-control cemail" type="email" value="" name="cemail" id="cemail" required>
                    </div>
                </div>
                <div class="ContactFrom_inputField__GMUX1">
                    <div class="ContactFrom_input-flex___f9qM ContactFrom_call__64O0U">
                    <input type="tel" id="phone2" name="countryCode" class="phone" required>
                    </div>
                </div>
                <div class="ContactFrom_inputField__GMUX1">
                    <div class="ContactFrom_input-flex___f9qM ContactFrom_message__P6hEa">
                    <textarea rows="4" name="message" placeholder="Your message" type="text" class="form-control message" id="message" required></textarea>
                    </div>
                </div>
              




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var input = document.querySelector("#phone2");
    var iti = window.intlTelInput(input, {
        // options
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });


    $(document).ready(function() {
    $('#contactForm').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting in the traditional way
        
        // Validate the form

        console.log($(this).find('.firstName').val());


            // Scope the selectors to this specific form
        let firstName = $(this).find('.firstName').val().trim();
        let email = $(this).find('.cemail').val().trim();
        let phone = $(this).find('.phone').val().trim();
        let message = $(this).find('.message').val().trim();

        if (!validateForm(firstName, email, phone, message)) {
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
                window.location.href = 'thanks.php';
                // if (response.status == 'success') {
                //     window.location.href = 'thanks.php';
                // } else {
                //     Swal.fire({
                //         icon: 'error',
                //         title: 'Oops...',
                //         text: response.message,
                //         confirmButtonText: 'OK'
                //     });
                // }
                // Re-enable the submit button
                $(this).find('button[type="submit"]').attr('disabled', false);
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'There was an error sending your message. Please try again later.',
                    confirmButtonText: 'OK'
                });

                // Re-enable the submit button
                $(this).find('button[type="submit"]').attr('disabled', false);
            }
        });
    });

    function validateForm(firstName, email, phone, budget, message) {
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



        if (phone === "") {
            Swal.fire({
                icon: 'warning',
                title: 'Validation Error',
                text: 'Phone number is required.',
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


        
        if (message === "") {
            Swal.fire({
                icon: 'warning',
                title: 'Validation Error',
                text: 'Message is required.',
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