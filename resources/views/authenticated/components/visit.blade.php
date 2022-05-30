@php($width = $width ?? '4')
@php($showRecord = $showRecord ?? true)

<div class="col-12 col-md-{{ $width }}">
    <div class="contact">
        <div class="img-box">
            <img src="{{ $visit->membership->medic->avatar }}" width="400" alt="" style="height: 275px; object-fit: cover; object-position: top">
        </div>

        <div class="info-box">
            <h4 class="name">Dr. {{ $visit->membership->medic->name }}</h4>

            <p class="role fs-5">{{ $visit->membership->medic->settingsMedic->specialty->name }}</p>

            <hr class="mt-4 mb-4">

            <p class="fs-5 text-muted mb-0">Data procesarii</p>
            <p class="fs-6 fw-bold">{{ $visit->date->format('d M Y H:i') }}</p>

            @if($showRecord)
                @if($visit->record)
                    <div class="button-box">
                        <a href="{{ route('visits.record.get', ['visit_id' => $visit->id]) }}"
                           class="btn btn-primary">
                            Vezi raportul consultatiei
                        </a>
                    </div>
                @else
                    <div class="button-box">
                        <button type="button" class="btn btn-secondary" disabled>
                            Vezi raportul consultatiei
                        </button>
                    </div>
                @endif
            @endif


        </div>
    </div>
</div>
