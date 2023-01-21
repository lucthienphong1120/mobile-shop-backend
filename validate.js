// Validator object constructor
function Validator(formSelector) {
    var formRules = {};
    // function of rules to validate
    var validatorRules = {
        required(value) {
            if(typeof value == 'string') value = value.trim();
            return value ? '' : `Vui lòng nhập phần này!`;
        },
        email(value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? '' : `Email nhập vào không hợp lệ!`;
        },
        min(min) {
            return (value) => {
                return value.length >= min ? '' : `Vui lòng nhập tối thiểu ${min} ký tự!`;
            }
        },
        max(max) {
            return (value) => {
                return value.length <= max ? '' : `Vui lòng nhập tối đa ${max} ký tự!`;
            }
        },
        confirm(selector) {
            return (value) => {
                return value == document.querySelector(selector).value ? '' : `Mật khẩu nhập lại không chính xác`;
            }
        },
        checkone(name) {
            return () => {
                var checked = formElement.querySelector(`[name="${name}"]:checked`);
                return checked ? '' : `Vui lòng chọn tối thiểu 1 lựa chọn`;
            }
        }

    };
    var formElement = document.querySelector(formSelector);
    if (formElement) {
        // take rules of all input elements
        var inputs = formElement.querySelectorAll('[name][rules]:not([disabled])');
        for (var input of inputs) {
            var rules = input.getAttribute('rules').split('|');
            for (var rule of rules) {
                // if rule is a function of function
                var isRuleHasValue = rule.includes(':');
                var ruleInfo;
                if (isRuleHasValue) {
                    ruleInfo = rule.split(':');
                    rule = ruleInfo[0];
                }
                var ruleFunc = validatorRules[rule];
                if (isRuleHasValue) {
                    ruleFunc = ruleFunc(ruleInfo[1]);
                }
                // add rule to formRules
                var name = input.getAttribute('name');
                if (!Array.isArray(formRules[name])) {
                    formRules[name] = [ruleFunc];
                }
                else {
                    formRules[name].push(ruleFunc);
                }
            }
            // handle event on all input elements
            input.onblur = handleValidate;
            input.oninput = handleClearError;
        }
        // check when blur event
        function handleValidate(e) {
            var rules = formRules[e.target.name];
            var formGroup = e.target.closest('.form-group');
            var formMessage = formGroup.querySelector('.form-message');
            var errorMessage;
            for (var rule of rules) {
                switch (e.target.type) {
                    case 'checkbox':
                    case 'radio':
                        errorMessage = rule(formElement.querySelector('[rules="checkone"]:checked'));
                        break;
                    default:
                        errorMessage = rule(e.target.value);
                }
                if (errorMessage) break;
            }
            if (errorMessage && formGroup && formMessage) {
                formGroup.classList.add('invalid');
                formMessage.innerText = errorMessage;
            }
            return Boolean(errorMessage);
        }
        // check when input event
        function handleClearError(e) {
            var formGroup = e.target.closest('.form-group');
            var formMessage = formGroup.querySelector('.form-message');
            if (formGroup.classList.contains('invalid') && formMessage) {
                formGroup.classList.remove('invalid');
                formMessage.innerText = '';
            }
        }
    }
    // handle submit event and return data
    formElement.onsubmit = (e) => {
        var inputs = formElement.querySelectorAll('[name][rules]:not([disabled])');
        var isFormValid = true;
        // callback validate all input elements
        for (var input of inputs) {
            var isError = handleValidate({ target: input });
            if (isError) {
                isFormValid = false;
                e.preventDefault();
            }
        }
        if (isFormValid) {
            // submit form with javascript
            if (typeof this.onSubmit == 'function') {
                var formVales = Array.from(inputs).reduce((values, input) => {
                    switch (input.type) {
                        case 'checkbox':
                            if (input.checked) {
                                if (!Array.isArray(values[input.name])) {
                                    values[input.name] = [];
                                }
                                values[input.name].push(input.value);
                            }
                            else if (!values[input.name]) {
                                values[input.name] = '';
                            }
                            break;
                        case 'radio':
                            if (input.checked) {
                                values[input.name] = input.value;
                            }
                            else if (!values[input.name]) {
                                values[input.name] = '';
                            }
                            break;
                        case 'file':
                            if (input.files.length) {
                                values[input.name] = input.files[0];
                            }
                            else {
                                values[input.name] = '';
                            }
                            break;
                        default:
                            values[input.name] = input.value;
                    }
                    return values;
                }, {});
                this.onSubmit(formVales);
            }
            // submit form with html
            else {
                formElement.submit();
            }
        }
    }
}