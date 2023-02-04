@extends('authenticated.medic.layouts.app')

@section('header')
    <div>
        <h6 class="bold mb-0 text-muted">ISTORIC PACIENT</h6>
        <h2 class="mt-1">{{ $patient->name }}</h2>
    </div>
@endsection

@section('main')
    <div class="page-content mt-5">
        @if($visits->isNotEmpty())
            <div class="d-flex align-items-start">

                <div class="nav flex-column nav-pills me-5" role="tablist" aria-orientation="vertical">
                    <h4 class="mt-0">Data</h4>
                    @foreach($visits as $visit)
                        <button class="nav-link @if($loop->first) active @endif" data-bs-toggle="pill"
                                data-bs-target="#tab-{{ $visit->id }}" type="button" role="tab"
                                @if($loop->first)  aria-selected="true" @endif>{{ $visit->date->format('d.m.Y') }}</button>
                    @endforeach
                </div>

                <div class="tab-content flex-grow-1">
                    @foreach($visits as $visit)
                        <div class="tab-pane fade @if($loop->first) active show @endif" id="tab-{{ $visit->id }}"
                             role="tabpanel">

                            <div class="row">
                                <div class="col-9">
                                    <h4 class="mt-0">Detaliile consultației din data
                                        de {{ $visit->date->format('d.m.Y') }}</h4>
                                </div>
                                <div class="col-3">
                                    @if($visit->record)
                                        <a href="{{ route('medic.appointments.updateView', ['id' => $visit->appointment_id]) }}"
                                           type="button" class="btn btn-primary btn-mini">
                                            <span class="btn-icon icofont-ui-edit fs-6 me-2"></span>
                                            Editare consultație
                                        </a>

                                        <a href="{{ route('visits.record.print', ['visit_id' => $visit->id]) }}"
                                           type="button" target="_blank" class="btn btn-outline-primary btn-mini mt-3">
                                            <span class="btn-icon icofont-printer fs-6 me-2"></span>
                                            Tipărire raport medical
                                        </a>
                                    @endif
                                </div>
                            </div>


                            @if($visit->record)
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="v-timeline dots">
                                            <div class="line"></div>

                                            <div class="timeline-box">
                                                <div class="box-items">

                                                    {{--Investigații efectuate--}}
                                                    <div class="item">
                                                        <div class="icon-block">
                                                            <div class="item-icon"></div>
                                                        </div>

                                                        <div class="content-block">
                                                            <div class="item-header">
                                                                <h3 class="h5 item-title">Investigații efectuate</h3>
                                                            </div>

                                                            <div class="item-desc">
                                                                {{ $visit->record->medical_service ?? '-' }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{--Istoric--}}
                                                    <div class="item">
                                                        <div class="icon-block">
                                                            <div class="item-icon bg-info"></div>
                                                        </div>

                                                        <div class="content-block">
                                                            <div class="item-header">
                                                                <h3 class="h5 item-title">Istoric</h3>
                                                            </div>

                                                            <div class="item-desc">
                                                                {{ $visit->record->medical_history ?? '-' }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{--Simptome--}}
                                                    <div class="item">
                                                        <div class="icon-block">
                                                            <div class="item-icon bg-danger"></div>
                                                        </div>

                                                        <div class="content-block">
                                                            <div class="item-header">
                                                                <h3 class="h5 item-title">Simptome</h3>
                                                            </div>

                                                            <div class="item-desc">
                                                                {{ $visit->record->symptoms ?? '-' }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{--Diagnostic--}}
                                                    <div class="item">
                                                        <div class="icon-block">
                                                            <div class="item-icon bg-warning"></div>
                                                        </div>

                                                        <div class="content-block">
                                                            <div class="item-header">
                                                                <h3 class="h5 item-title">Diagnostic</h3>
                                                            </div>

                                                            <div class="item-desc">
                                                                {{ $visit->record->diagnosis ?? '-' }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{--Date clinice--}}
                                                    <div class="item">
                                                        <div class="icon-block">
                                                            <div class="item-icon"></div>
                                                        </div>

                                                        <div class="content-block">
                                                            <div class="item-header">
                                                                <h3 class="h5 item-title">Date clinice</h3>
                                                            </div>

                                                            <div class="item-desc">
                                                                {{ $visit->record->clinical_data ?? '-' }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{--Date paraclinice--}}
                                                    <div class="item">
                                                        <div class="icon-block">
                                                            <div class="item-icon"></div>
                                                        </div>

                                                        <div class="content-block">
                                                            <div class="item-header">
                                                                <h3 class="h5 item-title">Date paraclinice</h3>
                                                            </div>

                                                            <div class="item-desc">
                                                                {{ $visit->record->para_clinical_data ?? '-' }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{--Bilet trimitere--}}
                                                    <div class="item">
                                                        <div class="icon-block">
                                                            <div class="item-icon bg-warning"></div>
                                                        </div>

                                                        <div class="content-block">
                                                            <div class="item-header">
                                                                <h3 class="h5 item-title">Bilet trimitere</h3>
                                                            </div>

                                                            <div class="item-desc">
                                                                {{ $visit->record->referral ? 'Da' : 'Nu' }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{--Recomandari--}}
                                                    <div class="item">
                                                        <div class="icon-block">
                                                            <div class="item-icon bg-success"></div>
                                                        </div>

                                                        <div class="content-block">
                                                            <div class="item-header">
                                                                <h3 class="h5 item-title">Recomandări</h3>
                                                            </div>

                                                            <div class="item-desc">
                                                                {{ $visit->record->indications ?? '-' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <p class="alert alert-secondary text-center fw-bold">
                                    <span class="icon sli-list text-muted fs-48 mb-2"></span><br>
                                    Nu sunt informații despre această consultație!
                                    <br>
                                    <a href="{{ route('medic.appointments.updateView', ['id' => $visit->appointment_id]) }}"
                                       type="button" class="btn btn-primary btn-mini mt-3">
                                        Adăugați informații
                                    </a>
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="alert alert-secondary text-center fw-bold">
                <span class="icon sli-docs text-muted fs-48 mb-2"></span><br>
                Pacientul nu are consultații în acest moment!
            </p>
        @endif
    </div>
@endsection
