<div class="row">
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <label>Data</label>
            <input name="date" class="form-control" type="date" placeholder="Data programarii"
                   value="{{ now()->addDay()->format('Y-m-d') }}">
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <label>Ora</label>
            <div class="form-group with-suffix-icon">
                <select name="time" class="form-control">
                    @foreach($times as $time)
                        <option {{ $loop->first ? 'selected' : '' }}>{{ $time }}</option>
                    @endforeach
                </select>
                <div class="suffix-icon sli-list"></div>
            </div>
        </div>
    </div>
</div>


