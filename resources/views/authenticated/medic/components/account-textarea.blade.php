@php($title = $title ?? 'Lipseste titlul')
@php($key = $key ?? 'cheie_lipsa')

<div class="form-group">
    <label>{{ $title }}</label>
    <textarea name="{{ $key }}" class="form-control rounded resize">{{ $user->settingsMedic->{$key} }}</textarea>
</div>
