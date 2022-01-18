<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight">
            {{ __('Home') }} >> {{ __('Balance') }}
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
                <h4 class="text-green-900 font-bold w-3/5">Current balance</h4>
                <div class="w-2/5 text-right">
                    <a href="{{ route('balance.deposit') }}" class="bg-blue-600 rounded-lg px-4 py-2 text-xs text-white mr-2">
                        <i class="fas fa-cart-plus"></i> RELOAD
                    </a>
                    @if($amount > 0)
                        <a href="{{ route('balance.withdraw') }}" class="bg-red-600 rounded-lg px-4 py-2 text-xs text-white mr-2">
                            <i class="fas fa-cart-arrow-down"></i> EXTRACT
                        </a>
                    @endif
                    @if($amount > 0)
                        <a href="{{ route('balance.transfer') }}" class="bg-sky-600 rounded-lg px-4 py-2 text-xs text-white mr-2">
                            <i class="fas fa-exchange-alt"></i> TRANSFER
                        </a>
                    @endif
                </div>
            </div>
            <hr>

            @include('dashboard.includes.alerts')

            <div class="font-bold py-2 text-2xl">
                R$ {{ number_format($amount, 2, '.', '') }}
            </div>
            <hr>
            <div class="text-sm flex justify-end py-2 cursor-pointer">
                <a href="">
                    More Info >>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
