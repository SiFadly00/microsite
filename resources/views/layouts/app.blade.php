<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nusa Brew Admin Dashboard')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(180deg, #fffaf0 0%, #fff7ed 35%, #fef3c7 100%);
        }
    </style>
</head>

<body class="text-slate-800 antialiased selection:bg-amber-300 selection:text-slate-900 min-h-screen flex flex-col overflow-x-hidden">

    <nav class="bg-gradient-to-r from-slate-900 via-amber-900 to-orange-900 text-white shadow-xl sticky top-0 z-50 border-b border-orange-700/40 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">

                <div class="flex items-center space-x-2 sm:space-x-3">
                    <div class="bg-gradient-to-tr from-amber-400 to-orange-500 text-slate-900 p-2 sm:p-2.5 rounded-xl sm:rounded-2xl shadow-lg shadow-amber-500/30 border border-amber-300/50">
                        <i data-lucide="coffee" class="w-5 h-5 sm:w-6 sm:h-6"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-extrabold text-lg sm:text-xl tracking-tight text-amber-100">Nusa Brew</span>
                        <span class="hidden sm:block text-[10px] text-orange-200 font-semibold uppercase tracking-widest leading-none mt-0.5">Admin Panel</span>
                    </div>
                </div>

                <div class="flex items-center space-x-2 sm:space-x-4">
                    <a href="{{ route('admin.links.index') ?? '#' }}"
                        class="text-amber-100 hover:text-white hover:bg-white/10 transition-all duration-200 p-2 sm:px-4 sm:py-2.5 rounded-lg sm:rounded-xl text-sm font-semibold flex items-center gap-2">
                        <i data-lucide="layout-grid" class="w-5 h-5 sm:w-4 sm:h-4"></i>
                        <span class="hidden md:inline">Manage Links</span>
                    </a>

                    <a href="{{ route('admin.dashboard') }}"
                        class="text-amber-100 hover:text-white hover:bg-white/10 transition-all duration-200 p-2 sm:px-4 sm:py-2.5 rounded-lg sm:rounded-xl text-sm font-semibold flex items-center gap-2">
                        <i data-lucide="bar-chart-3" class="w-5 h-5 sm:w-4 sm:h-4"></i>
                        <span class="hidden md:inline">Dashboard</span>
                    </a>

                    <a href="/" target="_blank"
                        class="bg-amber-300 hover:bg-amber-200 text-slate-950 font-bold px-3 py-2 sm:px-5 sm:py-2.5 rounded-lg sm:rounded-xl text-xs sm:text-sm transition-all duration-200 flex items-center gap-1.5 sm:gap-2 shadow-lg shadow-amber-500/20 hover:shadow-amber-500/40 border border-amber-200">
                        <span class="hidden sm:inline">Preview Public</span>
                        <span class="sm:hidden">Preview</span>
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit"
                            class="bg-rose-200 hover:bg-rose-300 text-slate-900 font-bold text-xs sm:text-sm px-3 py-2 sm:px-5 sm:py-2.5 rounded-lg sm:rounded-xl border-2 border-slate-900 shadow-[2px_2px_0px_0px_#0f172a] hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all flex items-center gap-1.5 sm:gap-2">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span class="hidden sm:inline">Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 sm:py-10 px-4 sm:px-6 lg:px-8 flex-grow w-full">

        @if (session('success'))
            <div class="mb-6 p-4 sm:p-5 bg-emerald-200 text-emerald-950 font-extrabold rounded-2xl border-2 border-slate-900 shadow-[4px_4px_0px_0px_#0f172a] flex items-center gap-3">
                <i data-lucide="check-circle-2" class="w-6 h-6 text-emerald-800 shrink-0"></i>
                <span class="text-sm sm:text-base">{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-white/80 border-t border-amber-200 text-center py-6 px-4 text-xs font-medium text-slate-600 mt-auto">
        &copy; {{ date('Y') }} Nusa Brew &bull; Bio Link Management
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>
