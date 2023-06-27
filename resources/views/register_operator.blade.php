@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('frontend/css/registeration_form.css') }}">
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="logi2 text-center">
                            <h5>Registration: in to Tripology</h5>
                        </div>
                    </div>
                </div>


                <div class="mx-auto container">

                    <!-- Progress Form -->
                    <form id="progress-form" class="p-4 progress-form" action="{{route('operator.store')}}" lang="en"
                        novalidate>

                        <!-- Step Navigation -->
                        <div class="d-flex align-items-start mb-3 sm:mb-5 progress-form__tabs" role="tablist"
                            style="display:none !important;">
                            <button id="progress-form__tab-1" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                                type="button" role="tab" aria-controls="progress-form__panel-1" aria-selected="true">
                                <span class="d-block step" aria-hidden="true">Step 1 <span class="sm:d-none">of
                                        3</span></span>
                                Details
                            </button>
                            <button id="progress-form__tab-2" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                                type="button" role="tab" aria-controls="progress-form__panel-2" aria-selected="false"
                                tabindex="-1" aria-disabled="true">
                                <span class="d-block step" aria-hidden="true">Step 2 <span class="sm:d-none">of
                                        3</span></span>
                                Shipping
                            </button>
                            <button id="progress-form__tab-3" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                                type="button" role="tab" aria-controls="progress-form__panel-3" aria-selected="false"
                                tabindex="-1" aria-disabled="true">
                                <span class="d-block step" aria-hidden="true">Step 3 <span class="sm:d-none">of
                                        3</span></span>
                                Survey
                            </button>
                            <button id="progress-form__tab-4" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                                type="button" role="tab" aria-controls="progress-form__panel-4" aria-selected="false"
                                tabindex="-1" aria-disabled="true">
                                <span class="d-block step" aria-hidden="true">Step 4 <span class="sm:d-none">of
                                        4</span></span>
                                Survey
                            </button>
                            <button id="progress-form__tab-5" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                                type="button" role="tab" aria-controls="progress-form__panel-5" aria-selected="false"
                                tabindex="-1" aria-disabled="true">
                                <span class="d-block step" aria-hidden="true">Step 5 <span class="sm:d-none">of
                                        5</span></span>
                                Survey
                            </button>
                            <button id="progress-form__tab-6" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                                type="button" role="tab" aria-controls="progress-form__panel-6" aria-selected="false"
                                tabindex="-1" aria-disabled="true">
                                <span class="d-block step" aria-hidden="true">Step 6 <span class="sm:d-none">of
                                        6</span></span>
                                Survey
                            </button>
                            <button id="progress-form__tab-7" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                                type="button" role="tab" aria-controls="progress-form__panel-7" aria-selected="false"
                                tabindex="-1" aria-disabled="true">
                                <span class="d-block step" aria-hidden="true">Step 7 <span class="sm:d-none">of
                                        7</span></span>
                                Survey
                            </button>
                            <button id="progress-form__tab-8" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                                type="button" role="tab" aria-controls="progress-form__panel-8" aria-selected="false"
                                tabindex="-1" aria-disabled="true">
                                <span class="d-block step" aria-hidden="true">Step 8 <span class="sm:d-none">of
                                        8</span></span>
                                Survey
                            </button>
                            <button id="progress-form__tab-9" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                                type="button" role="tab" aria-controls="progress-form__panel-9" aria-selected="false"
                                tabindex="-1" aria-disabled="true">
                                <span class="d-block step" aria-hidden="true">Step 9 <span class="sm:d-none">of
                                        9</span></span>
                                Survey
                            </button>
                        </div>
                        <!-- / End Step Navigation -->

                        <!-- Step 1 -->
                        <section id="progress-form__panel-1" role="tabpanel" aria-labelledby="progress-form__tab-1"
                            tabindex="0">

                            <div class="mt-3 sm:mt-0 form__field">
                                <label for="company_name">
                                    Company Name
                                    <span data-required="true" aria-hidden="true"></span>
                                </label>
                                <input id="company_name" type="text" name="company_name" autocomplete="given-name"
                                    required>
                            </div>

                            <div class="mt-3 form__field">
                                <label for="email">
                                    Email address
                                    <span data-required="true" aria-hidden="true"></span>
                                </label>
                                <input id="email" type="email" name="email" autocomplete="email"
                                    inputmode="email" required>
                            </div>

                            <div class="mt-3 form__field">
                                <label for="password">
                                    Password
                                    <span data-required="true" aria-hidden="true"></span>
                                </label>
                                <input id="password" type="password" name="password" autocomplete="password"
                                    inputmode="password" required>
                            </div>

                            <div class="mt-3 form__field">
                                <label for="confirm_password">
                                    Confirm Password
                                    <span data-required="true" aria-hidden="true"></span>
                                </label>
                                <input id="confirm_password" type="password" name="confirm_password"
                                    autocomplete="password" inputmode="password" required>
                            </div>

                            <div class="d-flex align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                <button type="button" data-action="next">
                                    Continue
                                </button>
                            </div>
                        </section>
                        <!-- / End Step 1 -->

                        <!-- Step 2 -->
                        <section id="progress-form__panel-2" role="tabpanel" aria-labelledby="progress-form__tab-2"
                            tabindex="0" hidden>

                            <div class="mt-3 sm:mt-0 form__field">
                                <label for="company_legal_name">
                                    Company Legal Name
                                    <span data-required="true" aria-hidden="true"></span>
                                </label>
                                <input id="company_legal_name" type="text" name="company_legal_name"
                                    autocomplete="given-name" required>
                            </div>

                            <div class="mt-3 sm:mt-0 form__field">
                                <label for="head_office_location">
                                    Head Office Location
                                    <span data-required="true" aria-hidden="true"></span>
                                </label>
                                <input id="head_office_location" type="text" name="head_office_location"
                                    autocomplete="given-head_office_location" required>
                            </div>

                            <div class="mt-3 form__field">
                                <label for="address">
                                    Address 1
                                    <span data-required="true" aria-hidden="true"></span>
                                </label>
                                <input id="address_1" type="text" name="address_1" autocomplete="shipping address-line1"
                                    required>
                            </div>


                            <div class="mt-3 form__field">
                                <label for="address">
                                    Address 2
                                    <span data-required="true" aria-hidden="true"></span>
                                </label>
                                <input id="address_2" type="text" name="address_2"
                                    autocomplete="shipping address-line1">
                            </div>

                            <div class="mt-3 form__field">
                                <label for="website">
                                    Website
                                </label>
                                <input id="website" type="text" name="website" autocomplete="shipping address-line2">
                            </div>

                            <div class="mt-3 form__field">
                                <label for="base_currency">
                                    What is your base curreny?
                                </label>
                                <p>This is your base currency which will be used to convert your adventure price to any
                                    currency Tripology offers and the traveller books in which you don
                                    t provide pricing. The operator bears the risk of exchange rate fluctuations between
                                    the booking and payment release dates.</p>
                                <select id="base_currency" name="base_currency" autocomplete="shipping address-level1"
                                    required>
                                    <option value="usd" selected>USD</option>
                                </select>
                            </div>

                            <div
                                class="d-flex flex-column-reverse sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                    Back
                                </button>
                                <button type="button" data-action="next">
                                    Continue
                                </button>
                            </div>
                        </section>
                        <!-- / End Step 2 -->

                        <!-- Step 3 -->
                        <section id="progress-form__panel-3" role="tabpanel" aria-labelledby="progress-form__tab-3"
                            tabindex="0" hidden>

                            <fieldset id="best_describe_your_company" class="mt-3 form__field">
                                <legend>
                                    Which of the following best describes your company?
                                </legend>
                                <label class="form__choice-wrapper">
                                    <input type="radio" name="best_describe_your_company" value="Travel Agency/OTA">
                                    <span>Travel Agency/OTA</span>
                                </label>
                                <label class="form__choice-wrapper">
                                    <input type="radio" name="best_describe_your_company" value="Destination Management Company holding contracts for the products">
                                    <span>Destination Management Company holding contracts for the products</span>
                                </label>
                                <label class="form__choice-wrapper">
                                    <input type="radio" name="best_describe_your_company" value="Local supplier of the tour products">
                                    <span>Local supplier of the tour products</span>
                                </label>
                                <label class="form__choice-wrapper">
                                    <input type="radio" name="best_describe_your_company" value="Tour operator creating adventure products by contracting services">
                                    <span>Tour operator creating adventure products by contracting services</span>
                                </label>
                                <label class="form__choice-wrapper">
                                    <input type="radio" name="best_describe_your_company" value="Wholesaler creating adventures for distribution">
                                    <span>Wholesaler creating adventures for distribution</span>
                                </label>
                                <label class="form__choice-wrapper">
                                    <input type="radio" name="best_describe_your_company" value="Others">
                                    <span>Others:</span>
                                </label>
                            </fieldset>

                            <div
                                class="d-flex flex-column-reverse sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                    Back
                                </button>
                                <button type="button" data-action="next">
                                    Continue
                                </button>
                            </div>
                        </section>
                        <!-- / End Step 3 -->


                        <!-- Step 4 -->
                        <section id="progress-form__panel-4" role="tabpanel" aria-labelledby="progress-form__tab-4"
                            tabindex="0" hidden>

                            <fieldset id="sell_your_adventures" class="mt-3 form__field">
                                <legend>
                                    How do you sell your adventures?
                                </legend>
                                <label class="form__choice-wrapper">
                                    <input type="radio" name="sell_your_adventures" value="Directly to customers (B2C)">
                                    <span>Directly to customers (B2C)</span>
                                </label>
                                <label class="form__choice-wrapper">
                                    <input type="radio" name="sell_your_adventures" value="Only via agents/other distributors (B2B)">
                                    <span>Only via agents/other distributors (B2B)</span>
                                </label>
                                <label class="form__choice-wrapper">
                                    <input type="radio" name="sell_your_adventures" value="Both B2C and B2B - our brand name can be displayed to the public">
                                    <span>Both B2C and B2B - our brand name can be displayed to the public</span>
                                </label>
                                <label class="form__choice-wrapper">
                                    <input type="radio" name="sell_your_adventures" value="Others">
                                    <span>Others:</span>
                                </label>
                            </fieldset>

                            <div
                                class="d-flex flex-column-reverse sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                    Back
                                </button>
                                <button type="button" data-action="next">
                                    Continue
                                </button>
                            </div>
                        </section>
                        <!-- / End Step 4 -->

                        <!-- Step 5 -->
                        <section id="progress-form__panel-5" role="tabpanel" aria-labelledby="progress-form__tab-5"
                            tabindex="0" hidden>

                            <div class="mt-3 form__field">
                                <label for="adventures_days">
                                    Are all your adventures 3 days or longer?
                                </label>

                                <select id="adventures_days" name="adventures_days"
                                    autocomplete="shipping address-level1" required>
                                    <option value="yes" selected>Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <p>We currently only offers adventures three days or longer on our platform. This is to
                                    ensure that Tripology provides the biggest selection of multi-day organized
                                    adventures worldwide.</p>
                            </div>

                            <div
                                class="d-flex flex-column-reverse sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                    Back
                                </button>
                                <button type="button" data-action="next">
                                    Continue
                                </button>
                            </div>
                        </section>
                        <!-- / End Step 5 -->

                        <!-- Step 6 -->
                        <section id="progress-form__panel-6" role="tabpanel" aria-labelledby="progress-form__tab-6"
                            tabindex="0" hidden>

                            <fieldset id="adventure_info" class="mt-3 form__field">
                                <legend>
                                    How will you load adventure information to Tripology?
                                </legend>
                                <label class="form__choice-wrapper">
                                    <input type="radio" name="adventure_info" value="json_api">
                                    <span>Provide a JSON/XML feed or API connection</span>
                                </label>
                                <label class="form__choice-wrapper">
                                    <input type="radio" name="adventure_info" value="third_party">
                                    <span>3rd Party Reservation System</span>
                                </label>
                                <label class="form__choice-wrapper">
                                    <input type="radio" name="adventure_info" value="both" checked>
                                    <span>Manually using the Tripology dashboard</span>
                                </label>
                            </fieldset>

                            <div
                                class="d-flex flex-column-reverse sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                    Back
                                </button>
                                <button type="button" data-action="next">
                                    Continue
                                </button>
                            </div>
                        </section>
                        <!-- / End Step 6 -->

                        <!-- Step 7 -->
                        <section id="progress-form__panel-5" role="tabpanel" aria-labelledby="progress-form__tab-5"
                            tabindex="0" hidden>

                            <div class="mt-3 form__field">
                                <label for="employee_own_guides">
                                    Do you employ your own guides?
                                </label>

                                <select id="employee_own_guides" name="employee_own_guides"
                                    autocomplete="shipping address-level1" required>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <div class="mt-3 form__field">
                                <label for="own_transport">
                                    Do you own your own transport?
                                </label>

                                <select id="own_transport" name="own_transport" autocomplete="shipping address-level1"
                                    required>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <div class="mt-3 form__field">
                                <label for="own_hotels">
                                    Do your own your own hotels?
                                </label>

                                <select id="own_hotels" name="own_hotels" autocomplete="shipping address-level1"
                                    required>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <div
                                class="d-flex flex-column-reverse sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                    Back
                                </button>
                                <button type="button" data-action="next">
                                    Continue
                                </button>
                            </div>
                        </section>
                        <!-- / End Step 7 -->

                        <!-- Step 8 -->
                        <section id="progress-form__panel-8" role="tabpanel" aria-labelledby="progress-form__tab-8"
                            tabindex="0" hidden>

                            <div class="mt-3 sm:mt-0 form__field">
                                <label for="full_name">
                                    Full Name
                                    <span data-required="true" aria-hidden="true"></span>
                                </label>
                                <input id="full_name" type="text" name="full_name" autocomplete="given-name" required>
                            </div>

                            <div class="mt-3 form__field">
                                <label for="email_address">
                                    Email address
                                    <span data-required="true" aria-hidden="true"></span>
                                </label>
                                <input id="email_address" type="email" name="email_address" autocomplete="email"
                                    inputmode="email" required>
                            </div>

                            <div class="mt-3 form__field">
                                <label for="phone_number">
                                    Phone number
                                </label>
                                <input id="phone_number" type="tel" name="phone" autocomplete="tel"
                                    inputmode="tel" required>
                            </div>

                            <div class="mt-3 form__field">
                                <label for="address">
                                    Where is your location?
                                    <span data-required="true" aria-hidden="true"></span>
                                </label>
                                <input id="location" type="text" name="location" autocomplete="shipping address-line1"
                                    required>
                            </div>

                            <div class="mt-3 form__field">
                                <label for="operation_hours">
                                    What are you operation hours?
                                </label>
                                <input id="operation_hours" type="text" name="operation_hours" autocomplete="shipping address-line2">
                            </div>

                            <div
                                class="d-flex flex-column-reverse sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                                <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                                    Back
                                </button>
                                <button type="submit">
                                    Submit
                                </button>
                            </div>
                        </section>
                        <!-- / End Step 8 -->

                        <!-- Thank You -->
                        <section id="progress-form__thank-you" hidden>
                            <p>Thank you for your submission!</p>
                            <p>We appreciate you contacting us. One of our team members will get back to you
                                very&nbsp;soon.</p>
                        </section>
                        <!-- / End Thank You -->

                    </form>
                    <!-- / End Progress Form -->

                </div>



            </div>
        </div>
    </div>
</div>
<script>
console.clear();

function ready(fn) {
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        setTimeout(fn, 1);
        document.removeEventListener('DOMContentLoaded', fn);
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}

ready(function() {

    // Global Constants

    const progressForm = document.getElementById('progress-form');

    const tabItems = progressForm.querySelectorAll('[role="tab"]'),
        tabPanels = progressForm.querySelectorAll('[role="tabpanel"]');

    let currentStep = 0;

    // Form Validation

    /*****************************************************************************
     * Expects a string.
     *
     * Returns a boolean if the provided value *reasonably* matches the pattern
     * of a US phone number. Optional extension number.
     */

    const isValidPhone = val => {
        const regex = new RegExp(/^[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?$/);

        return regex.test(val);
    };

    /*****************************************************************************
     * Expects a string.
     *
     * Returns a boolean if the provided value *reasonably* matches the pattern
     * of a real email address.
     *
     * NOTE: There is no such thing as a perfect regular expression for email
     *       addresses; further, the validity of an email address cannot be
     *       verified on the front end. This is the closest we can get without
     *       our own service or a service provided by a third party.
     *
     * RFC 5322 Official Standard: https://emailregex.com/
     */

    const isValidEmail = val => {
        const regex = new RegExp(
            /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );

        return regex.test(val);
    };

    /*****************************************************************************
     * Expects a Node (input[type="text"] or textarea).
     */

    const validateText = field => {
        const val = field.value.trim();

        if (val === '' && field.required) {
            return {
                isValid: false
            };
        } else {
            return {
                isValid: true
            };
        }
    };


    const validatePassword = field => {
        var password = '';
        var confirm_password = '';
        if(field.name == 'password')
        {
            password = field.value.trim();
        }
        if(field.name == 'confirm_password'){
            confirm_password = field.value.trim();
        }
        console.log('password',password);
        console.log('confirm_password',confirm_password);
        if(password == confirm_password){
            return {
                    isValid: true
            };
        }else{
            return {
                isValid: false
            };
        }
        
    };

    /*****************************************************************************
     * Expects a Node (select).
     */

    const validateSelect = field => {
        const val = field.value.trim();

        if (val === '' && field.required) {
            return {
                isValid: false,
                message: 'Please select an option from the dropdown menu.'
            };
        } else {
            return {
                isValid: true
            };
        }
    };

    /*****************************************************************************
     * Expects a Node (fieldset).
     */

    const validateGroup = fieldset => {
        const choices = fieldset.querySelectorAll('input[type="radio"], input[type="checkbox"]');

        let isRequired = false,
            isChecked = false;

        for (const choice of choices) {
            if (choice.required) {
                isRequired = true;
            }

            if (choice.checked) {
                isChecked = true;
            }
        }

        if (!isChecked && isRequired) {
            return {
                isValid: false,
                message: 'Please make a selection.'
            };
        } else {
            return {
                isValid: true
            };
        }
    };

    /*****************************************************************************
     * Expects a Node (input[type="radio"] or input[type="checkbox"]).
     */

    const validateChoice = field => {
        return validateGroup(field.closest('fieldset'));
    };

    /*****************************************************************************
     * Expects a Node (input[type="tel"]).
     */

    const validatePhone = field => {
        const val = field.value.trim();

        if (val === '' && field.required) {
            return {
                isValid: false
            };
        } else if (val !== '' && !isValidPhone(val)) {
            return {
                isValid: false,
                message: 'Please provide a valid US phone number.'
            };
        } else {
            return {
                isValid: true
            };
        }
    };

    /*****************************************************************************
     * Expects a Node (input[type="email"]).
     */

    const validateEmail = field => {
        const val = field.value.trim();

        if (val === '' && field.required) {
            return {
                isValid: false
            };
        } else if (val !== '' && !isValidEmail(val)) {
            return {
                isValid: false,
                message: 'Please provide a valid email address.'
            };
        } else {
            return {
                isValid: true
            };
        }
    };

    /*****************************************************************************
     * Expects a Node (field or fieldset).
     *
     * Returns an object describing the field's overall validity, as well as
     * a possible error message where additional information may be helpful for
     * the user to complete the field.
     */

    const getValidationData = field => {
        switch (field.type) {
            case 'text':
            case 'password':
                //return validatePassword(field);
            case 'textarea':
                return validateText(field);
            case 'select-one':
                return validateSelect(field);
            case 'fieldset':
                return validateGroup(field);
            case 'radio':
            case 'checkbox':
                return validateChoice(field);
            case 'tel':
                return validatePhone(field);
            case 'email':
                return validateEmail(field);
            default:
                throw new Error(
                    `The provided field type '${field.tagName}:${field.type}' is not supported in this form.`
                    );
        }
    };

    /*****************************************************************************
     * Expects a Node (field or fieldset).
     *
     * Returns the field's overall validity based on conditions set within
     * `getValidationData()`.
     */

    const isValid = field => {
        return getValidationData(field).isValid;
    };

    /*****************************************************************************
     * Expects an integer.
     *
     * Returns a promise that either resolves if all fields in a given step are
     * valid, or rejects and returns invalid fields for further processing.
     */

    const validateStep = currentStep => {
        const fields = tabPanels[currentStep].querySelectorAll(
            'fieldset, input:not([type="radio"]):not([type="checkbox"]), select, textarea');

        const invalidFields = [...fields].filter(field => {
            return !isValid(field);
        });

        return new Promise((resolve, reject) => {
            if (invalidFields && !invalidFields.length) {
                resolve();
            } else {
                reject(invalidFields);
            }
        });
    };

    // Form Error and Success

    const FIELD_PARENT_CLASS = 'form__field',
        FIELD_ERROR_CLASS = 'form__error-text';

    /*****************************************************************************
     * Expects a Node (fieldset) that contains any number of radio or checkbox
     * input elements, and a string representing the group's validation status.
     */

    function updateChoice(fieldset, status, errorId = '') {
        const choices = fieldset.querySelectorAll('[type="radio"], [type="checkbox"]');

        for (const choice of choices) {
            if (status) {
                choice.setAttribute('aria-invalid', 'true');
                choice.setAttribute('aria-describedby', errorId);
            } else {
                choice.removeAttribute('aria-invalid');
                choice.removeAttribute('aria-describedby');
            }
        }
    }

    /*****************************************************************************
     * Expects a Node (field or fieldset) that either has the class name defined
     * by `FIELD_PARENT_CLASS`, or has a parent with that class name. Optional
     * string defines the error message.
     *
     * Builds and appends an error message to the parent element, or updates an
     * existing error message.
     *
     * https://www.davidmacd.com/blog/test-aria-describedby-errormessage-aria-live.html
     */

    function reportError(field, message = 'Please complete this required field.') {
        const fieldParent = field.closest(`.${FIELD_PARENT_CLASS}`);

        if (progressForm.contains(fieldParent)) {
            let fieldError = fieldParent.querySelector(`.${FIELD_ERROR_CLASS}`),
                fieldErrorId = '';

            if (!fieldParent.contains(fieldError)) {
                fieldError = document.createElement('p');

                if (field.matches('fieldset')) {
                    fieldErrorId = `${field.id}__error`;

                    updateChoice(field, true, fieldErrorId);
                } else if (field.matches('[type="radio"], [type="checkbox"]')) {
                    fieldErrorId = `${field.closest('fieldset').id}__error`;

                    updateChoice(field.closest('fieldset'), true, fieldErrorId);
                } else {
                    fieldErrorId = `${field.id}__error`;

                    field.setAttribute('aria-invalid', 'true');
                    field.setAttribute('aria-describedby', fieldErrorId);
                }

                fieldError.id = fieldErrorId;
                fieldError.classList.add(FIELD_ERROR_CLASS);

                fieldParent.appendChild(fieldError);
            }

            fieldError.textContent = message;
        }
    }

    /*****************************************************************************
     * Expects a Node (field or fieldset) that either has the class name defined
     * by `FIELD_PARENT_CLASS`, or has a parent with that class name.
     *
     * https://www.davidmacd.com/blog/test-aria-describedby-errormessage-aria-live.html
     */

    function reportSuccess(field) {
        const fieldParent = field.closest(`.${FIELD_PARENT_CLASS}`);

        if (progressForm.contains(fieldParent)) {
            const fieldError = fieldParent.querySelector(`.${FIELD_ERROR_CLASS}`);

            if (fieldParent.contains(fieldError)) {
                if (field.matches('fieldset')) {
                    updateChoice(field, false);
                } else if (field.matches('[type="radio"], [type="checkbox"]')) {
                    updateChoice(field.closest('fieldset'), false);
                } else {
                    field.removeAttribute('aria-invalid');
                    field.removeAttribute('aria-describedby');
                }

                fieldParent.removeChild(fieldError);
            }
        }
    }

    /*****************************************************************************
     * Expects a Node (field or fieldset).
     *
     * Reports the field's overall validity to the user based on conditions set
     * within `getValidationData()`.
     */

    function reportValidity(field) {
        const validation = getValidationData(field);

        if (!validation.isValid && validation.message) {
            reportError(field, validation.message);
        } else if (!validation.isValid) {
            reportError(field);
        } else {
            reportSuccess(field);
        }
    }

    // Form Progression

    /*****************************************************************************
     * Resets the state of all tabs and tab panels.
     */

    function deactivateTabs() {
        // Reset state of all tab items
        tabItems.forEach(tab => {
            tab.setAttribute('aria-selected', 'false');
            tab.setAttribute('tabindex', '-1');
        });

        // Reset state of all panels
        tabPanels.forEach(panel => {
            panel.setAttribute('hidden', '');
        });
    }

    /*****************************************************************************
     * Expects an integer.
     *
     * Shows the desired tab and its associated tab panel, then updates the form's
     * current step to match the tab's index.
     */

    function activateTab(index) {
        const thisTab = tabItems[index],
            thisPanel = tabPanels[index];

        // Close all other tabs
        deactivateTabs();

        // Focus the activated tab for accessibility
        thisTab.focus();

        // Set the interacted tab to active
        thisTab.setAttribute('aria-selected', 'true');
        thisTab.removeAttribute('tabindex');

        // Display the associated tab panel
        thisPanel.removeAttribute('hidden');

        // Update the current step with the interacted tab's index value
        currentStep = index;
    }

    /*****************************************************************************
     * Expects an event from a click listener.
     */

    function clickTab(e) {
        activateTab([...tabItems].indexOf(e.currentTarget));
    }

    /*****************************************************************************
     * Expects an event from a keydown listener.
     */

    function arrowTab(e) {
        const {
            keyCode,
            target
        } = e;

        /**
         * If the current tab has an enabled next/previous sibling, activate it.
         * Otherwise, activate the tab at the beginning/end of the list.
         */

        const targetPrev = target.previousElementSibling,
            targetNext = target.nextElementSibling,
            targetFirst = target.parentElement.firstElementChild,
            targetLast = target.parentElement.lastElementChild;

        const isDisabled = node => node.hasAttribute('aria-disabled');

        switch (keyCode) {
            case 37: // Left arrow
                if (progressForm.contains(targetPrev) && !isDisabled(targetPrev)) {
                    activateTab(currentStep - 1);
                } else if (!isDisabled(targetLast)) {
                    activateTab(tabItems.length - 1);
                }
                break;
            case 39: // Right arrow
                if (progressForm.contains(targetNext) && !isDisabled(targetNext)) {
                    activateTab(currentStep + 1);
                } else if (!isDisabled(targetFirst)) {
                    activateTab(0);
                }
                break;
        }
    }

    /*****************************************************************************
     * Expects a boolean.
     *
     * Updates the visual state of the progress bar and makes the next tab
     * available for interaction (if there is a next tab).
     */

    // Immediately attach event listeners to the first tab (happens only once)
    tabItems[0].addEventListener('click', clickTab);
    tabItems[0].addEventListener('keydown', arrowTab);

    function handleProgress(isComplete) {
        const currentTab = tabItems[currentStep],
            nextTab = tabItems[currentStep + 1];

        if (isComplete) {
            currentTab.setAttribute('data-complete', 'true');

            /**
             * Verify that there is, indeed, a next tab before modifying or listening
             * to it. In case we've reached the last item in the tablist.
             */

            if (progressForm.contains(nextTab)) {
                nextTab.removeAttribute('aria-disabled');

                nextTab.addEventListener('click', clickTab);
                nextTab.addEventListener('keydown', arrowTab);
            }

        } else {
            currentTab.setAttribute('data-complete', 'false');
        }
    }

    // Form Interactions

    /*****************************************************************************
     * Returns a function that only executes after a delay.
     *
     * https://davidwalsh.name/javascript-debounce-function
     */

    const debounce = (fn, delay = 500) => {
        let timeoutID;

        return (...args) => {
            if (timeoutID) {
                clearTimeout(timeoutID);
            }

            timeoutID = setTimeout(() => {
                fn.apply(null, args);
                timeoutID = null;
            }, delay);
        };
    };

    /*****************************************************************************
     * Waits 0.5s before reacting to any input events. This reduces the frequency
     * at which the listener is fired, making the errors less "noisy". Improves
     * both performance and user experience.
     */

    progressForm.addEventListener('input', debounce(e => {
        const {
            target
        } = e;

        validateStep(currentStep).then(() => {

            // Update the progress bar (step complete)
            handleProgress(true);

        }).catch(() => {

            // Update the progress bar (step incomplete)
            handleProgress(false);

        });

        // Display or remove any error messages
        reportValidity(target);
    }));

    /****************************************************************************/

    progressForm.addEventListener('click', e => {
        const {
            target
        } = e;

        if (target.matches('[data-action="next"]')) {
            validateStep(currentStep).then(() => {

                // Update the progress bar (step complete)
                handleProgress(true);

                // Progress to the next step
                activateTab(currentStep + 1);

            }).catch(invalidFields => {

                // Update the progress bar (step incomplete)
                handleProgress(false);

                // Show errors for any invalid fields
                invalidFields.forEach(field => {
                    reportValidity(field);
                });

                // Focus the first found invalid field for the user
                invalidFields[0].focus();

            });
        }

        if (target.matches('[data-action="prev"]')) {

            // Revisit the previous step
            activateTab(currentStep - 1);

        }
    });

    // Form Submission

    /*****************************************************************************
     * Returns the user's IP address.
     */
    async function getIP() {
        
        var response = {
            "ip": "103.183.32.24"
        }
        return response;
    }

    /*async function getIP(url = 'https://api.ipify.org?format=json') {
        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error(response.statusText);
        }

        var response = {
            "ip": "103.183.32.24"
        }
        return response.json();
    }*/

    /*****************************************************************************
     * POSTs to the specified endpoint.
     */

    async function postData(url = '', data = {}) {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            throw new Error(response.statusText);
        }

        return response.json();
    }

    /****************************************************************************/

    function disableSubmit() {
        const submitButton = progressForm.querySelector('[type="submit"]');

        if (progressForm.contains(submitButton)) {

            // Update the state of the submit button
            submitButton.setAttribute('disabled', '');
            submitButton.textContent = 'Submitting...';

        }
    }

    /****************************************************************************/

    function handleSuccess(response) {
        const thankYou = progressForm.querySelector('#progress-form__thank-you');

        // Clear all HTML Nodes that are not the thank you panel
        while (progressForm.firstElementChild !== thankYou) {
            progressForm.removeChild(progressForm.firstElementChild);
        }

        thankYou.removeAttribute('hidden');

        // Logging the response from httpbin for quick verification
        console.log(response);
    }

    /****************************************************************************/

    function handleError(error) {
        const submitButton = progressForm.querySelector('[type="submit"]');

        if (progressForm.contains(submitButton)) {
            const errorText = document.createElement('p');

            // Reset the state of the submit button
            submitButton.removeAttribute('disabled');
            submitButton.textContent = 'Submit';

            // Display an error message for the user
            errorText.classList.add('m-0', 'form__error-text');
            errorText.textContent = `Sorry, your submission could not be processed.
        Please try again. If the issue persists, please contact our support
        team. Error message: ${error}`;

            submitButton.parentElement.prepend(errorText);
        }
    }

    /****************************************************************************/

    progressForm.addEventListener('submit', e => {

        // Prevent the form from submitting
        e.preventDefault();

        // Get the API endpoint using the form action attribute
        const form = e.currentTarget,
            API = new URL(form.action);

        validateStep(currentStep).then(() => {

            // Indicate that the submission is working
            disableSubmit();

            // Prepare the data
            const formData = new FormData(form),
                formTime = new Date().getTime(),
                formFields = [];

            // Format the data entries
            for (const [name, value] of formData) {
                formFields.push({
                    'name': name,
                    'value': value
                });
            }

            // Get the user's IP address (for fun)
            // Build the final data structure, including the IP
            // POST the data and handle success or error
            getIP().then(response => {
                console.log('response',response);
                    return {
                        'fields': formFields,
                        'meta': {
                            'submittedAt': formTime,
                            'ipAddress': response.ip
                        }
                    };
                })
                .then(data => postData(API, data))
                .then(response => {
                    setTimeout(() => {
                        handleSuccess(response)
                    }, 5000); // An artificial delay to show the state of the submit button
                })
                .catch(error => {
                    setTimeout(() => {
                        handleError(error)
                    }, 5000); // An artificial delay to show the state of the submit button
                });

        }).catch(invalidFields => {

            // Show errors for any invalid fields
            invalidFields.forEach(field => {
                reportValidity(field);
            });

            // Focus the first found invalid field for the user
            invalidFields[0].focus();

        });
    });
});
</script>
@endsection