<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:invoice-edit :invoice_id="$invoice->id"/>

                    @if ($invoice->amount()['due'] > 0)
                        <form method="POST" action="{{route('stripe')}}">
                            @csrf
                            <input type="text" hidden value="{{$invoice->user->name}}" name="name">
                            <div class="flex gap-4 items-center">
                                <div class="min-w-max"> 
                                    <input type="number" hidden name="amount" class="lms-input" value="{{number_format($invoice->amount()['due'], 2)}}" placeholder="Amount">
                                    <input type="text" hidden value="{{$invoice->id}}" name="invoice_id">
                                </div>
                            </div>

                            <h2 class="text-red-500 font-bold">Payble Amount: {{number_format($invoice->amount()['due'], 2)}}</h2>
                            <button class="lms-button" type="submit">Pay Now</button>
                        </form>
                    @endif
                    
                </div>

                
            </div>
        </div>
    </div>



</x-app-layout>


