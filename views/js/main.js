function validatedBs5() {
  (function () {
    "use strict";
    const forms = document.querySelectorAll(".requires-validation");
    Array.from(forms).forEach(function (form) {
      form.addEventListener(
        "submit",
        function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }

          form.classList.add("was-validated");
        },
        false
      );
    });
  })();
}

function validateJS(event, type) {
  console.log("event", event.target.value);

  if (type == "text") {
    let expRegular = /^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/;
    if (!expRegular.test(event.target.value)) {
      $(event.target).parent().addClass("requires-validation");
      $(event.target)
        .parent()
        .children(".invalid-feedback")
        .html("No utilices numeros o caracteres especiales");
      $(event.target)
        .parent()
        .children(".invalid-feedback")
        .addClass("aparecer");
      event.target.value = "";
      return;
    } else {
      $(event.target)
        .parent()
        .children(".invalid-feedback")
        .removeClass("aparecer");
    }
  }

  if (type == "email") {
    let expRegular =
      /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!expRegular.test(event.target.value)) {
      $(event.target).parent().addClass("requires-validation");
      $(event.target)
        .parent()
        .children(".invalid-feedback")
        .html("Debe tener un formato valido de email");
      $(event.target)
        .parent()
        .children(".invalid-feedback")
        .addClass("aparecer");
      event.target.value = "";
      return;
    } else {
      $(event.target)
        .parent()
        .children(".invalid-feedback")
        .removeClass("aparecer");
    }
  }
  if (type == "tel") {
    let expRegular =
      /^(\(\+?\d{2,3}\)[\*|\s|\-|\.]?(([\d][\*|\s|\-|\.]?){6})(([\d][\s|\-|\.]?){2})?|(\+?[\d][\s|\-|\.]?){8}(([\d][\s|\-|\.]?){2}(([\d][\s|\-|\.]?){2})?)?)$/;
    if (!expRegular.test(event.target.value)) {
      $(event.target).parent().addClass("requires-validation");
      $(event.target)
        .parent()
        .children(".invalid-feedback")
        .html("Ingresa tus 10 o 12 digitos de tu teléfono");
      $(event.target)
        .parent()
        .children(".invalid-feedback")
        .addClass("aparecer");
      event.target.value = "";
      return;
    } else {
      $(event.target)
        .parent()
        .children(".invalid-feedback")
        .removeClass("aparecer");
    }
  }
}

validatedBs5();
