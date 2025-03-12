import { renderTotalEmployees } from "./employees-chart.js";

renderTotalEmployees([
    {
        puesto: "Desarrollador",
        cantidad: 5,
    },
    {
        puesto: "Diseñador",
        cantidad: 3,
    },
    {
        puesto: "Gerente",
        cantidad: 2,
    },
    {
        puesto: "Contador",
        cantidad: 1,
    },
    {
        puesto: "Recepcionista",
        cantidad: 1,
    },
]).then(() => {
    console.log("Employees chart rendered");
});
