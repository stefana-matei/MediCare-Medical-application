@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="fs-3 text-danger">
            Eroare
        </div>

        <ul class="mt-3 text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
