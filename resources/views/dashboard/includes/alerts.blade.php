@if ($errors->any())
    <div class="px-4 py-4 mt-4 bg-red-200 text-red-700 rounded-lg">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if (session(['success']))
    <div class="px-4 py-4 mt-4 bg-green-200 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@if (session(['error']))
    <div class="px-4 py-4 mt-4 bg-red-200 text-red-700 rounded-lg">
        {{ session('error') }}
    </div>
@endif