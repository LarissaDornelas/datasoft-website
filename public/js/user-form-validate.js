$("#formValidation").validate({
    // debug: true,
    rules: {
        password: {
            minlength: 5,
        },
        password_confirm: {
            minlength: 5,
            equalTo: "#password",
        },
    },
    messages: {
        minlength: "Este campo deve ter no mínimo 5 dígitos.",
        equalTo: "As senhas devem ser iguais",
    },
});
