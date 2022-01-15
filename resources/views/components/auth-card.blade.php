<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <h1 class="mb-2 text-lg">
        Welcome to Lara Money Dashboard Panel
    </h1>

    <div class="w-full flex flex-row sm:max-w-2xl bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="w-3/5 mt-6 px-6 py-4">
            {{ $slot }}
        </div>
        <div class="w-2/5 bg-slate-200 flex flex-col justify-center items-center">
            {{ $logo }}
        </div>
    </div>
</div>
