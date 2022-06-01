"use strict";
var KTPasswordResetNewPassword = function() {
    var e, t, r, o, s = function() {
        return 100 === o.getScore()
    };
    return {
        init: function() {
            e = document.querySelector("#kt_new_password_form"), t = document.querySelector("#kt_new_password_submit"), r = FormValidation.formValidation(e, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Email address is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            }
                        }
                    },
                    "confirm-password": {
                        validators: {
                            notEmpty: {
                                message: "The password confirmation is required"
                            },
                            identical: {
                                compare: function() {
                                    return e.querySelector('[name="password"]').value
                                },
                                message: "The password and its confirm are not the same"
                            }
                        }
                    },
                    toc: {
                        validators: {
                            notEmpty: {
                                message: "You must accept the terms and conditions"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: !1
                        }
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }), t.addEventListener("click", (function(s) {
                s.preventDefault(), r.revalidateField("password"), r.validate().then((function(r) {
                    if ("Valid" == r) {
                        (t.setAttribute("data-kt-indicator", "on"), t.disabled = !0, setTimeout((function() {
                            t.removeAttribute("data-kt-indicator"), t.disabled = !1, e.submit()
                        }), 2e3))
                    }
                }))
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTPasswordResetNewPassword.init()
}));