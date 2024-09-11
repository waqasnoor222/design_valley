
<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


<!-- <input type="tel" id="phone"> -->




<form action="email.php" method="POST" class="PopupForm_popupForm__Ew0Vk popup-main-form">
<input type="hidden" id="packagePrice" name="packagePrice" value="">
    <div class="PopupForm_inputField__Y_4nR">
        <div class="PopupForm_input-flex__HUi23 undefined">
            <input placeholder="Your name*" class="form-control" type="text" value="" name="firstName" required id="firstName">
            <span class="error-message" id="nameError"></span>
        </div>
    </div>
    <div class="PopupForm_inputField__Y_4nR">
        <div class="PopupForm_input-flex__HUi23 PopupForm_email__DbL35">
            <input placeholder="Your email address*" class="form-control" type="email" value="" name="cemail">
        </div>
    </div>
    <div class="PopupForm_inputField__Y_4nR">
        <input type="tel" id="phone" name="countryCode">
    </div>
    <div class="PopupForm_inputField__Y_4nR">
        <div class="PopupForm_input-flex__HUi23 PopupForm_budget__D5oUs">
            <input min="1" placeholder="Your Budget" class="form-control" type="number" value="" name="budget">
        </div>
    </div>
    <div class="PopupForm_inputField__Y_4nR">
        <div class="PopupForm_input-flex__HUi23 PopupForm_message__UCI8V">
            <textarea rows="4" name="message" placeholder="Your message" type="text" class="form-control"></textarea>
        </div>
    </div>
    <button type="submit" class="Button_btn__CsQ0G undefined">Lets Make a Deal</button>
</form>



<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        // options
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>



<style>
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