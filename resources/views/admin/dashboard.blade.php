@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8 flex items-center justify-between gap-4">
        <div>
            <p class="text-xs font-black uppercase tracking-[0.3em] text-orange-700">Analytics</p>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight mt-2">Dashboard Nusa Brew</h1>
            <p class="text-slate-600 font-bold mt-1">Ringkasan performa tautan dan penjualan digital Anda.</p>
        </div>
        <a href="{{ route('admin.links.index') }}" class="hidden sm:flex bg-white hover:bg-orange-50 text-slate-900 font-black py-2.5 px-5 rounded-xl border-4 border-slate-900 shadow-[4px_4px_0px_0px_#0f172a] hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all items-center gap-2">
            Kelola Tautan <i data-lucide="arrow-right" class="w-5 h-5 stroke-[3]"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-br from-orange-200 to-amber-200 border-4 border-slate-900 rounded-3xl p-6 shadow-[6px_6px_0px_0px_#0f172a] relative overflow-hidden group hover:-translate-y-1 transition-transform">
            <i data-lucide="link-2" class="w-20 h-20 text-orange-300 absolute -bottom-4 -right-4 stroke-[3] group-hover:scale-110 transition-transform"></i>
            <h3 class="text-sm font-black text-slate-700 uppercase tracking-widest mb-2 relative z-10">Total Tautan</h3>
            <div class="flex items-baseline gap-2 relative z-10">
                <span class="text-5xl font-black text-slate-900">{{ $totalLinks }}</span>
                <span class="text-sm font-extrabold text-slate-600">({{ $activeLinks }} Aktif)</span>
            </div>
        </div>

        <div class="bg-gradient-to-br from-emerald-200 to-lime-200 border-4 border-slate-900 rounded-3xl p-6 shadow-[6px_6px_0px_0px_#0f172a] relative overflow-hidden group hover:-translate-y-1 transition-transform">
            <i data-lucide="mouse-pointer-click" class="w-20 h-20 text-emerald-300 absolute -bottom-4 -right-4 stroke-[3] group-hover:scale-110 transition-transform"></i>
            <h3 class="text-sm font-black text-slate-700 uppercase tracking-widest mb-2 relative z-10">Total Akses</h3>
            <span class="text-5xl font-black text-slate-900 relative z-10">{{ $totalClicks }}</span>
        </div>

        <div class="bg-gradient-to-br from-yellow-200 to-amber-200 border-4 border-slate-900 rounded-3xl p-6 shadow-[6px_6px_0px_0px_#0f172a] relative overflow-hidden group hover:-translate-y-1 transition-transform">
            <i data-lucide="trophy" class="w-20 h-20 text-yellow-300 absolute -bottom-4 -right-4 stroke-[3] group-hover:scale-110 transition-transform"></i>
            <h3 class="text-sm font-black text-slate-700 uppercase tracking-widest mb-2 relative z-10">Tautan Terpopuler</h3>
            @if($topLink)
                <p class="text-xl font-black text-slate-900 relative z-10 truncate mb-1">{{ $topLink->title }}</p>
                <p class="text-sm font-bold text-amber-900 bg-amber-300 inline-block px-3 py-1 rounded-md border-2 border-slate-900 relative z-10">{{ $topLink->clicks }} Klik</p>
            @else
                <p class="text-xl font-black text-slate-900 relative z-10">Belum ada data</p>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-12">
        <div class="bg-white/90 border-4 border-slate-900 rounded-3xl p-6 shadow-[6px_6px_0px_0px_#0f172a] flex flex-col">
            <h3 class="text-lg font-black text-slate-900 border-b-4 border-slate-900 pb-3 mb-6 uppercase tracking-wider">Perbandingan Klik (Top 5)</h3>
            <div class="relative w-full h-72">
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <div class="bg-white/90 border-4 border-slate-900 rounded-3xl p-6 shadow-[6px_6px_0px_0px_#0f172a] flex flex-col">
            <h3 class="text-lg font-black text-slate-900 border-b-4 border-slate-900 pb-3 mb-6 uppercase tracking-wider">Distribusi Minat Audiens</h3>
            <div class="relative w-full h-72 flex justify-center items-center">
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartLabels = @json($chartLabels);
    const chartData = @json($chartData);

    const bgColors = ['#fdba74', '#fbbf24', '#fca5a5', '#86efac', '#c4b5fd'];
    const borderColors = ['#0f172a', '#0f172a', '#0f172a', '#0f172a', '#0f172a'];

    Chart.defaults.font.family = 'Inter, sans-serif';
    Chart.defaults.font.weight = 'bold';
    Chart.defaults.color = '#0f172a';

    const ctxBar = document.getElementById('barChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Jumlah Klik',
                data: chartData,
                backgroundColor: bgColors,
                borderColor: borderColors,
                borderWidth: 3,
                borderRadius: 4,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 },
                    grid: { color: '#f1f5f9', lineWidth: 2, borderDash: [5, 5] }
                },
                x: { grid: { display: false } }
            },
            plugins: { legend: { display: false } }
        }
    });

    const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
    new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            labels: chartLabels,
            datasets: [{
                data: chartData,
                backgroundColor: bgColors,
                borderColor: borderColors,
                borderWidth: 3,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'right' } }
        }
    });
</script>
@endsection