@php($width = $width ?? '4')

<div class="col-12 col-md-{{ $width }}">
    <div class="contact">
        <div class="img-box">
            <img src="{{ $user->avatar }}" width="400" alt=""
                 style="height: 150px; object-fit: cover; object-position: top">
        </div>

        <div class="info-box p-3">
            <h6 class="name text-primary mb-1">Dr. {{ $user->name }}</h6>

            <p class="text-muted fs-6 mb-1">{{ $user->settingsMedic->level->name }}</p>
            <p class="fs-6 text-muted mb-1">{{ $user->settingsMedic->specialty->name }}</p>

            <hr class="my-3">

            <p>
                @forelse($times as $time)
                    <div class="appointment-btn btn btn-primary btn-sm">{{ $time }}</div>
                @empty

                @endforelse
            </p>

        </div>
    </div>
</div>
