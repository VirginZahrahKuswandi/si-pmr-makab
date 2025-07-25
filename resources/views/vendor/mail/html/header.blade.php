@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{ asset('img/logo-makab.jpg') }}" class="logo" alt="Makab Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
