@php
    $artikel = $getRecord();
    $fotoList = [];

    if ($artikel->fotos && $artikel->fotos->count()) {
        foreach ($artikel->fotos->take(3) as $foto) {
            $fotoList[] = asset('storage/' . $foto->path);
        }
    }
@endphp

<div class="flex gap-1">
    @forelse ($fotoList as $fotoSrc)
        <img src="{{ $fotoSrc }}" class="w-10 h-10 object-cover rounded" />
    @empty
        <span class="text-sm text-gray-500 italic">Tidak ada foto</span>
    @endforelse
</div>
