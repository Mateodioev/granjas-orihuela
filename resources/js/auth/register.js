import { getUser } from "./public_user";

const part1 = document.getElementById("part_1");
const part2 = document.getElementById("part_2");
const siguienteBtn = document.getElementById("siguiente_btn");
const retrocederBtn = document.getElementById("retroceder_btn");
const dni = document.getElementById("dni");
const togglePassword = document.getElementById("togglePassword");
const password = document.getElementById("contraseña");

siguienteBtn.addEventListener("click", () => {
    const pass = document.getElementById("contraseña");
    const nombres = document.getElementById("nombres");
    const apellidos = document.getElementById("apellidos");

    if (
        dni.reportValidity() &&
        pass.reportValidity() &&
        nombres.reportValidity() &&
        apellidos.reportValidity()
    ) {
        part1.hidden = true;
        part2.hidden = false;
    }
});

retrocederBtn.addEventListener("click", () => {
    part1.hidden = false;
    part2.hidden = true;
});

dni.addEventListener("input", () => {
    if (dni.value.length != 8) {
        return;
    }

    getUser(dni.value).then(
        (user) => {
            const nombres = document.getElementById("nombres");
            const apellidos = document.getElementById("apellidos");

            nombres.value = user.nombre;
            apellidos.value = user.apellidos;
        },
        (error) => {
            // Ignore
        }
    );
});

togglePassword.addEventListener("click", () => {
    const type =
        password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    togglePassword.classList.toggle("bi-eye");
    togglePassword.classList.toggle("bi-eye-slash");
});
