@extends('authenticated.layouts.app')

@section('header')
    <h2> Detalii consultație</h2>

    <a href="{{ route('visits.record.print', ['visit_id' => $visit->id]) }}"
       target="_blank"
       class="btn btn-outline-primary align-self-center"
       role="button">
        <span class="btn-icon icofont-printer fs-6 me-2"></span>
        Tipărire raport medical
    </a>
@endsection

@section('main')

    <div class="row">
        <div class="col-3">
            @include('authenticated.components.visit', ['width' => 12, 'showRecord' => false, 'visit' => $visit])

            @if($record->files->isNotEmpty())
                <div class="mt-3">
                    <h5 class="mb-2">Fișiere atașate</h5>
                    @foreach($record->files as $file)
                        <a href="{{ $file->getUrl() }}" target="_blank"
                           class="btn btn-outline-primary rounded-pill btn-sm mw-100 p-2 mb-2">
                            <span class="btn-icon icofont-clip me-2"></span>
                            <span class="btn-content-ellipsis">{{ $file->file_name }}</span>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>


        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="v-timeline">
                        <div class="line"></div>

                        <div class="timeline-box">
                            <div class="box-items">

                                {{--Investigații efectuate--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-ui-clip-board"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Investigații efectuate</h3>
                                        </div>

                                        <div class="item-desc">
                                            {{ $record->medical_service ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                {{--Istoric--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-copy bg-info"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Istoric</h3>
                                        </div>

                                        <div class="item-desc">
                                            {{ $record->medical_history ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                {{--Simptome--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-ui-add bg-danger"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Simptome</h3>
                                        </div>

                                        <div class="item-desc">
                                            {{ $record->symptoms ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                {{--Diagnostic--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-stethoscope-alt bg-warning"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Diagnostic</h3>
                                        </div>

                                        <div class="item-desc">
                                            {{ $record->diagnosis ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                {{--Date clinice--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-heart-beat-alt"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Date clinice</h3>
                                        </div>

                                        <div class="item-desc">
                                            {{ $record->clinical_data ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                {{--Date paraclinice--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-ui-copy"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Date paraclinice</h3>
                                        </div>

                                        <div class="item-desc">
                                            {{ $record->para_clinical_data ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                {{--Bilet trimitere--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-notepad bg-info"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Bilet trimitere</h3>
                                        </div>

                                        <div class="item-desc">
                                            {{ $record->referral ? 'Da' : 'Nu' }}
                                        </div>
                                    </div>
                                </div>

                                {{--Recomandari--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-patient-file"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Recomandări</h3>
                                        </div>

                                        <div class="item-desc">
                                            {{ $record->indications ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
