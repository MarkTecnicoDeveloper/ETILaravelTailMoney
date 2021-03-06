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
            <form action="{{ route('historic.search') }}" method="POST" class="flex flex-row mt-2 mb-2">
                @csrf
                <x-input class="block mt-1 w-1/5" type="text" name="id" placeholder="ID" />
                <x-input class="block mt-1 w-1/5 ml-3" type="date" name="date" />
                <select name="type" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1 w-1/5 ml-3">
                    <option value="">-- Select Type --</option>
                    @foreach ($types as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                    @endforeach
                </select>
                <x-button class="ml-3 w-1/5 text-center flex justify-center">
                    {{ __('Find') }}
                </x-button>
            </form>
            <hr>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Value</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sender</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($historics as $historic)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $historic->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ number_format($historic->amount, 2, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $historic->type($historic->type) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $historic->date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($historic->user_id_transaction)
                                {{ $historic->userSender->name }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>

            @if (isset($dataForm))
                {{ $historics->appends($dataForm)->links() }}
            @else
                {{ $historics->links() }}
            @endif
        </div>
    </div>
</x-app-layout>
