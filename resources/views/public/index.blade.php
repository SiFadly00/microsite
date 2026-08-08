<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Nusa Brew | Coffee & Bakery</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            background:
                radial-gradient(circle at top, rgba(252, 211, 77, 0.18), transparent 30%),
                linear-gradient(160deg, #fff7ed 0%, #fffbeb 35%, #fef3c7 100%);
        }

        .glass-card {
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }
    </style>
</head>

<body class="min-h-screen font-sans antialiased text-slate-900 pb-20">
    <main class="mx-auto max-w-md px-4 pt-8 sm:pt-12">
        <div class="relative mb-6">
            <div class="absolute -inset-2 rounded-full bg-amber-200/60 blur-2xl"></div>
            <div class="relative mx-auto w-28 h-28 overflow-hidden rounded-full border-4 border-slate-900 bg-amber-100 shadow-[6px_6px_0px_0px_#0f172a]">
                <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=400&q=80" alt="Nusa Brew" class="h-full w-full object-cover">
            </div>
        </div>

        <div class="text-center">
            <p class="mb-2 text-xs font-black uppercase tracking-[0.35em] text-amber-700">Coffee & Bakery</p>
            <h1 class="text-3xl font-black tracking-tight text-slate-900">Nusa Brew</h1>
            <p class="mx-auto mt-3 max-w-xs text-sm font-bold leading-relaxed text-slate-700">
                Kopi rumahan yang hangat, roti fresh setiap hari, dan menu favorit untuk nongkrong santai.
            </p>
        </div>

        <div class="mt-6 flex items-center justify-center gap-3">
            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="flex h-11 w-11 items-center justify-center rounded-full border-2 border-slate-900 bg-white shadow-[3px_3px_0px_0px_#0f172a] transition hover:-translate-y-0.5">
                <i data-lucide="camera" class="h-5 w-5"></i>
            </a>
            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="flex h-11 w-11 items-center justify-center rounded-full border-2 border-slate-900 bg-emerald-200 shadow-[3px_3px_0px_0px_#0f172a] transition hover:-translate-y-0.5">
                <i data-lucide="message-circle" class="h-5 w-5"></i>
            </a>
            <a href="https://maps.google.com/?q=Bandung" target="_blank" rel="noopener noreferrer" class="flex h-11 w-11 items-center justify-center rounded-full border-2 border-slate-900 bg-rose-200 shadow-[3px_3px_0px_0px_#0f172a] transition hover:-translate-y-0.5">
                <i data-lucide="map-pin" class="h-5 w-5"></i>
            </a>
        </div>

        <div class="glass-card mt-6 rounded-[2rem] border-2 border-slate-900 bg-white/80 p-4 shadow-[6px_6px_0px_0px_#0f172a]">
            <div class="flex items-center gap-3 rounded-2xl border-2 border-dashed border-amber-300 bg-amber-50 p-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl border-2 border-slate-900 bg-amber-200">
                    <i data-lucide="clock-3" class="h-5 w-5"></i>
                </div>
                <div>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Jam buka</p>
                    <p class="text-sm font-extrabold text-slate-900">Senin - Minggu • 08.00 - 21.00</p>
                </div>
            </div>
        </div>

        <div class="mt-7 w-full space-y-4">
            <button onclick="openModal()" class="w-full relative group">
                <div class="absolute inset-0 rounded-[1.75rem] bg-slate-900 translate-y-1.5 translate-x-1.5"></div>
                <div class="relative flex items-center justify-center gap-2 rounded-[1.75rem] border-2 border-slate-900 bg-gradient-to-r from-orange-300 to-amber-200 px-4 py-4 font-black text-slate-900 transition-transform group-active:translate-y-1.5 group-active:translate-x-1.5">
                    <i data-lucide="phone-call" class="h-5 w-5"></i>
                    <span>Pesan via WhatsApp</span>
                </div>
            </button>

            @foreach ($links as $link)
                <a href="{{ route('public.redirect', $link->id) }}" target="_blank" rel="noopener noreferrer" class="group block w-full relative">
                    <div class="absolute inset-0 rounded-[1.75rem] bg-slate-900 translate-y-1.5 translate-x-1.5"></div>
                    <div class="relative flex items-center gap-3 rounded-[1.75rem] border-2 border-slate-900 bg-white px-4 py-4 transition-transform group-active:translate-y-1.5 group-active:translate-x-1.5">
                        @if ($link->image)
                            <img src="{{ asset('storage/' . $link->image) }}" alt="{{ $link->title }}" class="h-11 w-11 rounded-xl border-2 border-slate-900 object-cover bg-slate-100">
                        @else
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl border-2 border-slate-900 bg-orange-200 shadow-[2px_2px_0px_0px_#0f172a]">
                                <i data-lucide="link-2" class="h-5 w-5 text-slate-900"></i>
                            </div>
                        @endif

                        <div class="flex-1 min-w-0 text-left">
                            <p class="truncate text-base font-black text-slate-900">{{ $link->title }}</p>
                            <p class="mt-0.5 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500">Buka sekarang</p>
                        </div>

                        <i data-lucide="arrow-up-right" class="h-5 w-5 shrink-0 text-slate-500"></i>
                    </div>
                </a>
            @endforeach
        </div>

        @if ($links->hasPages())
            <div class="mt-6">
                {{ $links->links('vendor.pagination.custom-public') }}
            </div>
        @endif
    </main>

    <div id="contact-modal" class="fixed inset-0 z-50 hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" onclick="closeModal()"></div>

        <div id="modal-content" class="absolute bottom-0 left-0 right-0 mx-auto max-w-md rounded-t-[2rem] border-t-4 border-slate-900 bg-white p-6 pb-10 shadow-[0px_-8px_0px_0px_rgba(15,23,42,0.08)] transition-transform duration-300 translate-y-full">
            <div class="mx-auto mb-6 h-1.5 w-12 rounded-full bg-slate-300"></div>

            <div class="mb-6 text-center">
                <p class="text-[11px] font-black uppercase tracking-[0.28em] text-amber-700">Contact</p>
                <h2 class="mt-2 text-2xl font-black text-slate-900">Nusa Brew</h2>
                <p class="mt-1 text-xs font-bold text-slate-500">Kopi, roti, dan hangatnya waktu bersama</p>
            </div>

            <div class="space-y-4 rounded-2xl border-2 border-slate-900 bg-amber-50 p-4 shadow-[4px_4px_0px_0px_#0f172a]">
                <div class="flex items-center gap-3 border-b-2 border-dashed border-amber-200 pb-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl border-2 border-slate-900 bg-emerald-200">
                        <i data-lucide="message-circle" class="h-4 w-4 text-slate-900"></i>
                    </div>
                    <p class="text-sm font-extrabold text-slate-900">+62 812-3456-7890</p>
                </div>
                <div class="flex items-center gap-3 border-b-2 border-dashed border-amber-200 pb-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl border-2 border-slate-900 bg-sky-200">
                        <i data-lucide="map-pin" class="h-4 w-4 text-slate-900"></i>
                    </div>
                    <p class="text-sm font-extrabold text-slate-900">Jl. Raya Cibubur No. 27, Bandung</p>
                </div>
                <div class="flex items-start gap-3">
                    <div class="mt-1 flex h-10 w-10 items-center justify-center rounded-xl border-2 border-slate-900 bg-rose-200">
                        <i data-lucide="clock-3" class="h-4 w-4 text-slate-900"></i>
                    </div>
                    <div>
                        <p class="text-sm font-extrabold text-slate-900">Setiap hari • 08.00 - 21.00</p>
                        <p class="mt-0.5 text-xs font-bold text-slate-500">Siap melayani untuk nongkrong, meeting, atau takeaway.</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="flex-1 rounded-xl border-2 border-slate-900 bg-emerald-300 px-4 py-3 text-center font-black text-slate-900 shadow-[3px_3px_0px_0px_#0f172a]">
                    Chat WhatsApp
                </a>
                <button onclick="closeModal()" class="flex h-14 w-14 items-center justify-center rounded-xl border-2 border-slate-900 bg-rose-200 shadow-[3px_3px_0px_0px_#0f172a]">
                    <i data-lucide="x" class="h-5 w-5 text-slate-900"></i>
                </button>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();

        const modal = document.getElementById('contact-modal');
        const modalContent = document.getElementById('modal-content');

        function openModal() {
            modal.classList.remove('hidden');
            requestAnimationFrame(() => {
                modal.classList.remove('opacity-0');
                modalContent.classList.remove('translate-y-full');
            });
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.add('opacity-0');
            modalContent.classList.add('translate-y-full');

            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }
    </script>
</body>

</html>
