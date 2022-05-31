@extends('authenticated.layouts.app')

@section('header')
    <h2> Detalii consultatie</h2>

    <a href="#"
       class="btn btn-outline-primary align-self-center"
       role="button"
       data-bs-toggle="modal"
       data-bs-target="#add-appointment"
    >
        Tipareste raportul medical
    </a>
@endsection

@section('main')
    <div class="row">
        @include('authenticated.components.visit', ['width' => 3, 'showRecord' => false, 'visit' => $visit])
        <div class="col-md-8">
            <div class="card">
                {{--                <div class="card-header fs-4">--}}
                {{--                    Poti vizualiza detaliile consultatiei--}}
                {{--                </div>--}}
                <div class="card-body">
                    <div class="v-timeline">
                        <div class="line"></div>

                        <div class="timeline-box">
                            <div class="box-items">

                                {{--Istoric--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-doctor-alt bg-info"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Istoric</h3>
                                            {{--                                            <div class="item-date"><span>2m ago</span></div>--}}
                                        </div>

                                        <div class="item-desc">
                                            {{ $record->medical_history ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                {{--Simptome--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-drug bg-danger"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Simptome</h3>
                                            {{--                                            <div class="item-date"><span>2h ago</span></div>--}}
                                        </div>

                                        <div class="item-desc">
                                            {{ $record->symptoms ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                {{--Diagnostic--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-paralysis-disability bg-warning"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Diagnostic</h3>
{{--                                            <div class="item-date"><span>Jul 10</span></div>--}}
                                        </div>

                                        <div class="item-desc">
                                            {{ $record->diagnosis ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                {{--Date clinice--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-stethoscope-alt"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Date clinice</h3>

{{--                                            <div class="item-date"><span>Jul 10</span></div>--}}
                                        </div>

                                        <div class="item-desc">
                                            {{ $record->clinical_data ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                {{--Date paraclinice--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-stethoscope-alt"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Date paraclinice</h3>

{{--                                            <div class="item-date"><span>Jul 10</span></div>--}}
                                        </div>

                                        <div class="item-desc">
                                            {{ $record->para_clinical_data ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                {{--Bilet trimitere--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-stethoscope-alt"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Bilet trimitere</h3>

{{--                                            <div class="item-date"><span>Jul 10</span></div>--}}
                                        </div>

                                        <div class="item-desc">
                                           {{ $record->referral ? 'Da' : 'Nu' }}
                                        </div>
                                    </div>
                                </div>

                                {{--Recomandari--}}
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-stethoscope-alt"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Recomandari</h3>

{{--                                            <div class="item-date"><span>Jul 10</span></div>--}}
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
