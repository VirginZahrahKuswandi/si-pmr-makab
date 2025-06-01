@php
    $foto = $getRecord()->foto;
@endphp

@if ($foto)
    <div class="p-2">
        <img src="{{ asset('storage/' . $foto) }}" alt="Foto Profil" class="w-12 h-12" />
    </div>
@else
    <span class="text-sm text-gray-500 italic">Tidak ada foto</span>
@endif
