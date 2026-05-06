<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Третье задание') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                    <div>
                        <h3 style="margin-bottom: 15px; font-weight: bold;">Посещения по часам</h3>
                        <canvas id="lineChart"></canvas>
                    </div>
                    <div>
                        <h3 style="margin-bottom: 15px; font-weight: bold;">Посещение по городам</h3>
                        <div style="max-width: 300px; margin: 0 auto;">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>


                <div class="mt-8">
                    <p class="mt-4 text-sm text-gray-600">Содержимое файла <span class="font-mono bg-gray-200 px-1">public/thirdTask.js</span>:</p>
                    <div class="bg-gray-100 border border-gray-300 p-4 rounded-lg mt-2 text-xs font-mono whitespace-pre overflow-x-auto">
                        {{ file_get_contents(public_path('thirdTask.js')) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="http://127.0.0.1:8000/thirdTask.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const timeLabels = {!! json_encode($visitsPerHour->pluck('hour')->map(fn($h) => \Carbon\Carbon::parse($h)->format('H:00'))) !!};
            const visitCounts = {!! json_encode($visitsPerHour->pluck('count')) !!};

            const cityLabels = {!! json_encode($cityStats->pluck('city')->map(fn($c) => $c ?? 'Неизвестно')) !!};
            const cityCounts = {!! json_encode($cityStats->pluck('count')) !!};

            const palette = [
                '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b',
                '#fd7e14', '#6610f2', '#6f42c1', '#e83e8c', '#20c997'
            ];

            new Chart(document.getElementById('lineChart'), {
                type: 'line',
                data: {
                    labels: timeLabels,
                    datasets: [{
                        label: 'Уникальные визиты',
                        data: visitCounts,
                        borderColor: '#bfbfbf',
                        tension: 0.3,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });

            new Chart(document.getElementById('pieChart'), {
                type: 'pie',
                data: {
                    labels: cityLabels,
                    datasets: [{
                        data: cityCounts,
                        backgroundColor: palette
                    }]
                }
            });
        });
    </script>
</x-app-layout>
