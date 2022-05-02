@if ($errors->any())
    <div class="bg-gray-900 sm:rounded-lg">
        <div {{ $attributes }} class="p-10">
            <div class="font-medium text-red-600 pt-6 mt-6">{{ __('¡Vaya! Algo salió mal.') }}</div>

            <ul class="p-8 mt-3 mb-6 list-disc list-inside text-sm text-red-600 p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
