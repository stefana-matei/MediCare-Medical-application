@extends('authenticated.layouts.print')

@section('main')

    <div class="row">
        <div class="col">
            <h2>Raport medical</h2>
        </div>
    </div>

    <hr>

    <div class="row">

        <div class="col">
            <table>
                <tbody>
                <tr>
                    <th style="width: 1%; white-space: nowrap; padding-right:20px">Nume pacient</th>
                    <td>{{ $patient->name }}</td>
                </tr>
                <tr>
                    <th>Varsta</th>
                    <td>{{ $patient->patientAge }} ani</td>
                </tr>
                <tr>
                    <th>CNP</th>
                    <td>{{ $patient->settingsPatient->pin }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col">
            <table>
                <tbody>
                <tr>
                    <th style="width: 1%; white-space: nowrap; padding-right:20px">Nume medic</th>
                    <td>{{ $medic->name }}</td>
                </tr>
                <tr>
                    <th style="width: 1%; white-space: nowrap; padding-right:20px">Data consultatiei</th>
                    <td>{{ $visit->date->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <th style="width: 1%; white-space: nowrap; padding-right:20px">Ora consultatiei</th>
                    <td>{{ $visit->date->format('H:i') }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="card">
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
