@extends('layouts.main')

<button type="button" onclick="handlePrintBtn()" class="p-3 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out fixed"
            style="bottom: 80px; right: 20px">
    <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" fill="white"></path> <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" fill="white"></path>
    </svg>
</button>

@section('content')
    <script>
        function handlePrintBtn() {
            print();
        }
    </script>

    <div class="my-5">
        <div class="flex md:flex-row flex-col gap-y-3">
            {{-- Bar Chart --}}
            <div class="shadow-lg rounded-lg overflow-hidden md:w-2/3 w-full">
                <div class="py-3 px-5 bg-gray-50">Bar chart</div>
                <canvas class="p-10" id="chartBar"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                const labelsBarChart = @json($organizations_names);
                const dataBarChart = {
                    labels: labelsBarChart,
                    datasets: [
                        {
                            label: "ข้อมูลคำร้อง",
                            backgroundColor: "hsl(252, 82.9%, 67.8%)",
                            borderColor: "hsl(252, 82.9%, 67.8%)",
                            data: @json($organizations_count),
                        },
                    ],
                };

                const configBarChart = {
                    type: "bar",
                    data: dataBarChart,
                    options: {},
                };

                var chartBar = new Chart(
                    document.getElementById("chartBar"),
                    configBarChart
                );
            </script>

            {{-- Pie Chart --}}
            <div class="shadow-lg rounded-lg overflow-hidden md:ml-4 ml-0 md:w-1/3 w-full">
                <div class="py-3 px-5 bg-gray-50">Pie chart</div>
                <canvas class="p-10" id="chartPie"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                const dataPie = {
                    labels: @json($posts_status),
                    datasets: [
                        {
                            label: "ข้อมูลคำร้อง",
                            data: @json($posts_status_count),
                            backgroundColor: [
                                "rgb(133, 105, 241)",
                                "rgb(164, 101, 241)",
                                "rgb(101, 143, 241)",
                            ],
                            hoverOffset: 4,
                        },
                    ],
                };

                const configPie = {
                    type: "pie",
                    data: dataPie,
                    options: {},
                };

                var chartBar = new Chart(document.getElementById("chartPie"), configPie);
            </script>
        </div>

        {{-- Line Chart --}}
        <div>
            <div class="shadow-lg rounded-lg overflow-hidden mt-4">
                <div class="py-3 px-5 bg-gray-50">Line chart</div>
                <canvas class="p-10" id="chartLine"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                const labels = @json($tag_names);
                const data = {
                    labels: labels,
                    datasets: [
                        {
                            label: "ข้อมูลคำร้อง",
                            backgroundColor: "hsl(252, 82.9%, 67.8%)",
                            borderColor: "hsl(252, 82.9%, 67.8%)",
                            data: @json($tag_count),
                        },
                    ],
                };

                const configLineChart = {
                    type: "line",
                    data,
                    options: {},
                };

                var chartLine = new Chart(
                    document.getElementById("chartLine"),
                    configLineChart
                );
            </script>
        </div>
    </div>
@endsection
