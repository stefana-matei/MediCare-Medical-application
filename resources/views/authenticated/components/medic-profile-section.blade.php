@php($title = $title ?? 'Forgot title!')

@if($value)
    <div class="card">
        <div class="card-header">
            {{ $title }}:
        </div>
        <div class="card-body">
            <p>{!! nl2br(e($value)) !!} </p>
        </div>
    </div>
@endif
