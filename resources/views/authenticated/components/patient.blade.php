@php($width = $width ?? '4')
@php($showProfile = $showProfile ?? true)

<div class="col-12 col-md-{{ $width }}">
    <div class="contact">
        <div class="img-box">
            <img src="{{ $user->avatar }}" width="400" alt=""
                 style="height: 275px; object-fit: cover; object-position: top">
        </div>

        <div class="info-box">
            <h4 class="name text-primary">{{ $user->name }}</h4>

            <p class="text-muted fs-5">{{ $user->settingsPatient->birthday->format('d.m.Y') }}</p>

            <hr class="mt-4 mb-4">

            <h5 class="mb-1">Oras</h5>
            <p class="fs-6 text-muted">{{ $user->settingsPatient->city }}</p>

        </div>
    </div>
</div>
