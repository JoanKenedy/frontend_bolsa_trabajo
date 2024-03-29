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

function validateEmailRepeat(event) {
  var settings = {
    url:
      $("#urlApi").val() +
      "usuarios?equalTo=" +
      event.target.value +
      "&linkTo=email",
    method: "GET",
    timeout: 0,
  };

  $.ajax(settings).done(function (response) {
    if (response.status == 200) {
      $(event.target).parent().addClass("requires-validation");
      $(event.target)
        .parent()
        .children(".invalid-feedback")
        .html("El correo ingresado ya existe");
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
  });

  validateJS(event, "email");
}
validateEmailRepeat();

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
    let expRegular = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

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
  if (type == "password") {
    let expRegular = /^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*$/;
    if (!expRegular.test(event.target.value)) {
      $(event.target).parent().addClass("requires-validation");
      $(event.target)
        .parent()
        .children(".invalid-feedback")
        .html("Debe tener al menos una mayúscula, una minúscula y un dígito");
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

function pagination() {
  var target = $(".paginacion");
  if (target.length > 0) {
    target.each(function () {
      var el = $(this),
        totalPages = el.data("total-pages"),
        currentPage = el.data("current-page"),
        urlPage = el.data("url-page");

      el.twbsPagination({
        totalPages: totalPages,
        startPage: currentPage,
        visiblePages: 3,
        first: '<i class="fas fa-angle-double-left"></i>',
        last: '<i class="fas fa-angle-double-right"></i>',
        prev: '<i class="fas fa-angle-left"></i>',
        next: '<i class="fas fa-angle-right"></i>',
      });
    });
  }
}

pagination();
