@php($title = $title ?? 'Lipseste titlul')
@php($key = $key ?? 'cheie_lipsa')

<div class="form-group">
    <label>{{ $title }}</label>
    <textarea wire:model="record.{{ $key }}" class="form-control rounded resize"></textarea>
</div>
