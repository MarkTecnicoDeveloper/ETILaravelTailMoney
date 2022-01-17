<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight">
            {{ __('Home') }} >> {{ __('Deposit') }}
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
                <a href="">
                    <i class="fas fa-history"></i> Historic
                </a>
            </li>
        </ul>
    </x-slot>

    <div class="px-6 py-6">
        <div class="bg-white rounded-lg px-4 py-4">
            <div class="flex flex-row h-[45px] items-center">
                <h4 class="text-green-900 font-bold w-4/5">Confirm Transfer</h4>
            </div>
            <hr>

            @include('dashboard.includes.alerts')

            <p><strong>Recebedor: </strong>{{ $sender->name }}</p>

            <form class="mt-4" method="POST" action="{{ route('transfer.store') }}">
                @csrf

                <input type="hidden" name="sender_id" value="{{ $sender->id }}" />
                <!-- Email Address -->
                <div>
                    <x-input id="email" class="block mt-1 w-full" type="text" name="balance" placeholder="Value:" autofocus />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Transfer') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
