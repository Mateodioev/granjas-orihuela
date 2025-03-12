const searchInput = document.getElementById("search_input");

searchInput.addEventListener("input", staticEmployeeSearch);

function staticEmployeeSearch(e) {
    console.log(e.target.value);
    const input = e.target.value.toLowerCase();
    const rows = document.querySelectorAll(".employee-row");
    console.log(rows[0].children);

    rows.forEach((row) => {
        const dni = row.children[0].textContent.trim().toLowerCase();
        const nombres = row.children[1].textContent.trim().toLowerCase();

        if (nombres.includes(input) || dni.includes(input)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
}
