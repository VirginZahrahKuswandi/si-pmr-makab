<div class="mt-3 ms-{{ $level * 4 }} border-start ps-3">
    <strong>{{ $komentar->user->name }}</strong>
    <small class="text-muted ms-2">{{ $komentar->created_at->diffForHumans() }}</small>
    <p style="color: #444;">{{ $komentar->isi }}</p>

    @auth
        <a href="javascript:void(0)" class="text-primary" onclick="toggleReplyForm({{ $komentar->id }})">Balas</a>
        <form class="reply-form" data-parent="{{ $komentar->id }}">
            @csrf
            <input type="hidden" name="artikel_id" value="{{ $artikel->id }}">
            <input type="hidden" name="parent_id" value="{{ $komentar->id }}">
            <textarea name="isi" class="form-control mb-2" rows="2" placeholder="Balas komentar..."></textarea>
            <button type="button" class="btn btn-sm btn-outline-secondary reply-submit">Kirim Balasan</button>

        </form>
    @endauth

    @if ($komentar->anakKomentar->count())
        @foreach ($komentar->anakKomentar as $anak)
            @include('components.komentar-item', [
                'komentar' => $anak,
                'artikel' => $artikel,
                'level' => $level + 1,
            ])
        @endforeach
    @endif
</div>
