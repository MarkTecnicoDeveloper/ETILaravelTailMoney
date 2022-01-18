<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight">
            {{ __('Home') }} >> {{ __('Historics') }}
        </h2>
    </x-slot>

    <x-slot name="asidebar">
        <ul>
            <li class="hover:bg-slate-500 px-4 py-4 rounded-lg ease-in duration-300 cursor-pointer mb-2">
                <a href=" {{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="text-slate-500 mb-1">
                Financial
                <hr>
            </li>
            <li class="hover:bg-slate-500 px-4 py-4 rounded-lg ease-in duration-300 cursor-pointer mb-2">
                <a href=" {{ route('dashboard.balance') }} ">
                    <i class="fas fa-balance-scale-right"></i> Balance
                </a>
            </li>
            <li class="hover:bg-slate-500 px-4 py-4 rounded-lg ease-in duration-300 cursor-pointer mb-2">
                <a href="{{ route('dashboard.historic') }}">
                    <i class="fas fa-history"></i> Historic
                </a>
            </li>
        </ul>
    </x-slot>

    <div class="px-6 py-6">
        <div class="bg-white rounded-lg px-4 py-4">
            <div class="flex flex-row h-[45px] items-center">
                <h4 class="text-green-900 font-bold w-3/5">Historics movements</h4>
            </div>
            <hr>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Value</th>
                        <th>Type</th>
                        <th>Data</th>
                        <th>Sender</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($historics as $historic)
                    <tr>
                        <td>{{ $historic->id }}</td>
                        <td>{{ number_format($historic->amount, 2, ',', '.') }}</td>
                        <td>{{ $historic->type }}</td>
                        <td>{{ $historic->date }}</td>
                        <td>{{ $historic->user_id_transaction }}</td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
