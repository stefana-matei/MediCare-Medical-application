@php($width = $width ?? '4')

<div class="col-12 col-md-{{ $width }}">
    <div class="contact">
        <div class="img-box">
            <img src="{{ $user->avatar }}" width="400" alt="" style="height: 275px; object-fit: cover; object-position: top">
        </div>

        <div class="info-box">
            <h4 class="name">Dr. {{ $user->name }}</h4>

            <p class="role fs-5">{{ $user->settingsMedic->specialty->name }}</p>

            <hr class="mt-4 mb-4">

            <div class="button-box">
                <a href="{{ route('medics.get', ['id' => $user->id]) }}"
                   class="btn btn-primary">
                    Vezi profilul medicului
                </a>
            </div>

        </div>
    </div>
</div>
