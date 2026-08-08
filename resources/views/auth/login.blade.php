<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Area - Nusa Brew Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            background:
                radial-gradient(circle at top, rgba(251, 191, 36, 0.2), transparent 28%),
                linear-gradient(160deg, #fff7ed 0%, #fffbeb 40%, #fef3c7 100%);
        }
    </style>
</head>
<body class="min-h-screen font-sans antialiased flex flex-col justify-center py-12 sm:px-6 lg:px-8">

    <div class="sm:mx-auto sm:w-full sm:max-w-md px-4">

        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-br from-amber-300 to-orange-400 border-4 border-slate-900 rounded-2xl flex items-center justify-center shadow-[4px_4px_0px_0px_#0f172a] mx-auto mb-4">
                <i data-lucide="coffee" class="w-8 h-8 text-slate-900 stroke-[2.5]"></i>
            </div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Login Admin</h1>
            <p class="text-sm font-bold text-slate-600 mt-2">Masuk untuk mengelola Nusa Brew</p>
        </div>

        <div class="bg-white/80 border-4 border-slate-900 rounded-3xl p-6 sm:p-8 shadow-[8px_8px_0px_0px_#0f172a] backdrop-blur-sm">

            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf

                @if($errors->any())
                    <div class="bg-rose-200 border-2 border-slate-900 p-4 rounded-xl flex items-start gap-3 shadow-[2px_2px_0px_0px_#0f172a]">
                        <i data-lucide="alert-triangle" class="w-5 h-5 text-rose-800 shrink-0 mt-0.5"></i>
                        <p class="text-sm font-bold text-rose-900">{{ $errors->first() }}</p>
                    </div>
                @endif

                <div class="space-y-2">
                    <label for="email" class="block text-sm font-extrabold text-slate-900">Alamat Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-3 bg-slate-50 border-2 border-slate-900 rounded-xl focus:outline-none focus:ring-4 focus:ring-amber-500/20 focus:border-amber-500 font-medium text-slate-900 transition-all placeholder:text-slate-400">
                </div>

                <div class="space-y-2">
                    <label for="password" class="block text-sm font-extrabold text-slate-900">Kata Sandi</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-3 bg-slate-50 border-2 border-slate-900 rounded-xl focus:outline-none focus:ring-4 focus:ring-amber-500/20 focus:border-amber-500 font-medium text-slate-900 transition-all placeholder:text-slate-400">
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-gradient-to-r from-amber-300 to-orange-300 hover:from-amber-200 hover:to-orange-200 text-slate-950 font-extrabold py-3.5 rounded-xl border-2 border-slate-900 shadow-[4px_4px_0px_0px_#0f172a] hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all flex items-center justify-center gap-2">
                        Masuk Dashboard <i data-lucide="arrow-right" class="w-5 h-5 stroke-[2.5]"></i>
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>