<div {{ $attributes->merge(['class' => 'shadow italic font-bold bg-delete rounded-md p-8 m-5']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    {{-- <div class="">
        <div class=""> --}}
            {{ $content }}
        {{-- </div>
    </div> --}}
</div>
