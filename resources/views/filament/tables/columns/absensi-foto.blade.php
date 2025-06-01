@php
    $absensiFasilitator = $getRecord();
    $fotoList = [];
    if (
        $absensiFasilitator->absensi &&
        $absensiFasilitator->absensi->foto &&
        $absensiFasilitator->absensi->foto->count()
    ) {
        foreach ($absensiFasilitator->absensi->foto as $foto) {
            $fotoList[] = asset('storage/' . $foto->path);
        }
    }
@endphp
<div class="flex flex-wrap gap-2">
    @if (count($fotoList))
        @foreach ($fotoList as $index => $fotoSrc)
            <button type="button" onclick="showFotoModal({{ $index }})"
                class="text-yellow-600 underline hover:text-yellow-800">
                dokumentasi-{{ $index + 1 }}.{{ pathinfo($absensiFasilitator->absensi->foto[$index]->path, PATHINFO_EXTENSION) }}
            </button>
        @endforeach
    @else
        <span class="text-sm text-gray-500 italic">Tidak ada foto</span>
    @endif
</div>

<!-- Modal -->
<div id="fotoModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden"
    onclick="hideFotoModal()">
    <div class="bg-white p-4 rounded shadow-lg relative w-full max-w-3xl lg:max-w-4xl" style="max-height:95vh;"
        onclick="event.stopPropagation()">
        <button class="absolute top-2 right-2 text-gray-500" onclick="hideFotoModal()">&times;</button>
        <div class="flex items-center justify-center gap-4">
            <button id="prevFotoBtn" onclick="prevFoto()" aria-label="Sebelumnya" class="p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-700" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <img id="fotoModalImg" src="" alt="Dokumentasi Absensi" class="max-w-full max-h-[85vh] mx-auto" />
            <button id="nextFotoBtn" onclick="nextFoto()" aria-label="Selanjutnya" class="p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-700" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
        <div id="fotoModalCaption" class="text-center mt-2 text-sm text-gray-600"></div>
    </div>
</div>

<script>
    // Foto list dari PHP
    const fotoList = @json($fotoList);
    let currentFotoIndex = 0;

    function showFotoModal(index) {
        currentFotoIndex = index;
        updateFotoModal();
        document.getElementById('fotoModal').classList.remove('hidden');
    }

    function hideFotoModal() {
        document.getElementById('fotoModal').classList.add('hidden');
        document.getElementById('fotoModalImg').src = '';
    }

    function updateFotoModal() {
        const img = document.getElementById('fotoModalImg');
        img.src = fotoList[currentFotoIndex];
        document.getElementById('fotoModalCaption').textContent =
            `Foto ${currentFotoIndex + 1} dari ${fotoList.length}`;
        // Disable prev/next if at ends
        document.getElementById('prevFotoBtn').disabled = currentFotoIndex === 0;
        document.getElementById('nextFotoBtn').disabled = currentFotoIndex === fotoList.length - 1;
    }

    function prevFoto() {
        if (currentFotoIndex > 0) {
            currentFotoIndex--;
            updateFotoModal();
        }
    }

    function nextFoto() {
        if (currentFotoIndex < fotoList.length - 1) {
            currentFotoIndex++;
            updateFotoModal();
        }
    }
</script>
