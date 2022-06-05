@php($width = $width ?? '4')
@php($showProfile = $showProfile ?? true)

<div class="col-12 col-md-{{ $width }}">
    <div class="contact">
        <div class="img-box">
            <img src="{{ $user->avatar }}" width="400" alt=""
                 style="height: 275px; object-fit: cover; object-position: top">
        </div>

        <div class="info-box">
            <h4 class="name text-primary">Dr. {{ $user->name }}</h4>

            <p class="text-muted fs-5">{{ $user->settingsMedic->level->name }}</p>

            <hr class="mt-4 mb-4">

            <h5 class="mb-1">Specialitate</h5>
            <p class="fs-6 text-muted">{{ $user->settingsMedic->specialty->name }}</p>

            @if($showProfile)
            <div class="button-box">
                <a href="{{ route('medics.get', ['id' => $user->id]) }}"
                   class="btn btn-primary">
                    Vezi profilul medicului
                </a>
            </div>
            @endif

        </div>
    </div>
</div>
