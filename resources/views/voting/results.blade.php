<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil Voting Isthara</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center" style="background-image: url('{{ asset('assets/images/backgrounds.png') }}');">
  <div class="max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-white rounded-2xl shadow-lg mt-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Hasil Voting Isthara</h2>
    <div class="w-full relative" style="height: 60vh;">
      <canvas id="voteChart" class="w-full h-full"></canvas>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const labels = @json($istharas->pluck('name'));
        const votes = @json($istharas->pluck('vote_count'));

        const ctx = document.getElementById('voteChart').getContext('2d');

        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(59, 130, 246, 0.8)');
        gradient.addColorStop(1, 'rgba(147, 197, 253, 0.3)');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Vote',
                    data: votes,
                    backgroundColor: gradient,
                    borderRadius: 10,
                    barThickness: 'flex',
                    maxBarThickness: 60,
                    hoverBackgroundColor: 'rgba(37, 99, 235, 0.9)',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 800,
                    easing: 'easeOutQuart'
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            color: '#4B5563',
                            font: {
                                size: 14
                            }
                        },
                        grid: {
                            color: '#E5E7EB'
                        }
                    },
                    x: {
                        ticks: {
                            color: '#4B5563',
                            font: {
                                size: 14
                            }
                        },
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#1F2937',
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1e40af',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 10,
                        cornerRadius: 6
                    }
                }
            }
        });
    });
  </script>
</body>
</html>
