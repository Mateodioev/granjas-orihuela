import {
    Chart,
    LineController,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Colors,
    DoughnutController,
    ArcElement,
    Legend,
    Tooltip,
} from "chart.js";

Chart.register(
    DoughnutController,
    LineController,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Colors,
    ArcElement,
    Legend,
    Tooltip
);

// Stats is an array of {puesto: string, cantidad: number}
export async function renderTotalEmployees(stats) {
    const config = {
        type: "doughnut",
        data: {
            labels: stats.map((stat) => stat.puesto),
            datasets: [
                {
                    data: stats.map((stat) => stat.cantidad),
                    backgroundColor: [
                        "#FF6B00",
                        "#FF8C38",
                        "#FFA866",
                        "#FFC599",
                        "#FFE0CC",
                    ],
                    borderWidth: 0,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    top: 0,
                    bottom: 0,
                },
            },
            plugins: {
                legend: {
                    position: "right",
                },
            },
            cutout: "60%",
        },
    };

    const c = new Chart(
        document.getElementById("totalEmployeesDoughnutChart"),
        config
    );
    c.render();
}
