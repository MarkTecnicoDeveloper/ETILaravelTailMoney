<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight">
            {{ __('Home') }} 
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
