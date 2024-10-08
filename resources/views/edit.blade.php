<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        <form method="POST" action="{{ route('update') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Name -->
                            <div>
                                <input type="file" name="image">
                            </div>

                            <!-- Name -->
                            <div class="mt-4">
                                <label>Result</label>
                                {{-- <x-input id="price" class="block mt-1 w-full" type="text" name="price"
                                 required /> --}}
                                 @if(Session::has('text'))
                                    {{ Session::get('text') }}
                                 @endif
                            </div>

                            <div class="flex items-center mt-4">
                                <button type="submit" class="btn btn-success"> Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
