document.addEventListener("DOMContentLoaded", () => {

    const tree = document.querySelector(".tree");
    const stars = document.querySelectorAll(".star");
    const forks = document.querySelectorAll(".fork");
    let isOn = false;

    function encender() {

        stars.forEach(star => {
            const pixels = star.querySelectorAll(".light_pixel");
            pixels.forEach(pixel => {
                pixel.classList.add("yellow");
            });
        });

        if (forks.length > 1) {
            // Píxeles a encender
            const pixelsToAddClass = [
                { fork: 1, index: 4, classList: ["yellow"] },
                { fork: 2, index: 0, classList: ["red"] },
                { fork: 2, index: 2, classList: ["blue"] },
                { fork: 3, index: 2, classList: ["red"] },
                { fork: 4, index: 0, classList: ["yellow"] },
                { fork: 4, index: 3, classList: ["red"] },
                { fork: 4, index: 4, classList: ["red"] },
                { fork: 4, index: 5, classList: ["red"] },
                { fork: 4, index: 6, classList: ["red"] },
                { fork: 6, index: 2, classList: ["blue"] },
                { fork: 6, index: 8, classList: ["red"] },
                { fork: 7, index: 0, classList: ["yellow"] },
                { fork: 7, index: 5, classList: ["yellow"] },
                { fork: 7, index: 8, classList: ["red"] },
                { fork: 8, index: 1, classList: ["yellow"] },
                { fork: 8, index: 6, classList: ["red"] },
                { fork: 8, index: 7, classList: ["red"] },
                { fork: 9, index: 1, classList: ["red"] },
                { fork: 9, index: 5, classList: ["red"] },
                { fork: 9, index: 6, classList: ["red"] },
                { fork: 9, index: 11, classList: ["yellow"] },
                { fork: 10, index: 2, classList: ["red"] },
                { fork: 10, index: 3, classList: ["red"] },
                { fork: 10, index: 4, classList: ["red"] },
                { fork: 10, index: 10, classList: ["blue"] },
                { fork: 11, index: 1, classList: ["red"] },
                { fork: 11, index: 4, classList: ["yellow"] },
                { fork: 11, index: 14, classList: ["red"] },
                { fork: 12, index: 2, classList: ["red"] },
                { fork: 12, index: 6, classList: ["blue"] },
                { fork: 12, index: 9, classList: ["yellow"] },
                { fork: 12, index: 13, classList: ["red"] },
                { fork: 13, index: 4, classList: ["red"] },
                { fork: 13, index: 5, classList: ["red"] },
                { fork: 13, index: 6, classList: ["red"] },
                { fork: 13, index: 12, classList: ["red"] },
                { fork: 13, index: 13, classList: ["red"] },
                { fork: 14, index: 0, classList: ["yellow"] },
                { fork: 14, index: 2, classList: ["blue"] },
                { fork: 14, index: 7, classList: ["red"] },
                { fork: 14, index: 8, classList: ["red"] },
                { fork: 14, index: 9, classList: ["red"] },
                { fork: 14, index: 10, classList: ["red"] },
                { fork: 14, index: 11, classList: ["red"] },
                { fork: 15, index: 6, classList: ["yellow"] },
                { fork: 16, index: 14, classList: ["blue"] },
            ];

            pixelsToAddClass.forEach(({ fork, index, classList }) => {
                const pixel = forks[fork].querySelectorAll(".light_pixel")[index];
                if (pixel) {
                    classList.forEach(className => pixel.classList.add(className));
                }
            });
        }
    }

    function apagar() {

        stars.forEach(star => {
            const pixels = star.querySelectorAll(".light_pixel");
            pixels.forEach(pixel => {
                pixel.classList.remove("yellow");
            });
        });

        forks.forEach(fork => {
            const pixels = fork.querySelectorAll(".light_pixel");
            pixels.forEach(pixel => {
                pixel.classList.remove("yellow", "red", "blue");
            });
        });
    }
        // Apagado con mouse
        tree.addEventListener("mouseover", encender);
        tree.addEventListener("mouseout", apagar);

        // Función para alternar el estado del árbol
        function toggleTree() {
            if (isOn) {
                apagar();
            } else {
                encender();
            }
            isOn = !isOn;
        }
        // Apagado con teclado letra Q
        document.addEventListener("keydown", (e) => {
            if (e.key === "q" || e.key === "Q") {
                toggleTree();
            }
        });
});
