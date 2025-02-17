document.addEventListener("DOMContentLoaded", function () {
    const emailInput = document.getElementById("email");
    const subscribeButton = document.getElementById("subscribeButton");
    const successMessage = document.getElementById("successMessage");
    const form = document.getElementById("subscriptionForm");

    // Validar campo de correo
    emailInput.addEventListener("input", function () {
      if (emailInput.validity.valid) {
        subscribeButton.disabled = false;
        subscribeButton.classList.add("active");
      } else {
        subscribeButton.disabled = true;
        subscribeButton.classList.remove("active");
      }
    });

    // Mostrar mensaje de éxito al enviar el formulario
    form.addEventListener("submit", function (e) {
      e.preventDefault(); // Evitar envío real
      successMessage.style.display = "block";
      form.reset(); // Limpiar formulario
      subscribeButton.disabled = true;
      subscribeButton.classList.remove("active");
    });
  });
  