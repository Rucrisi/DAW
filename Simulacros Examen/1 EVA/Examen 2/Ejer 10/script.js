const form = document.getElementById('encuestaForm');
        const successMessage = document.getElementById('successMessage');

        form.addEventListener('submit', (event) => {
            event.preventDefault();

            let hasError = false;

            // Mostrar mensaje de éxito si no hay errores
            if (!hasError) {
                successMessage.style.display = 'block';
                form.reset();
            }
        });