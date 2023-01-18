@extends('authenticated.layouts.print')

@section('head')
    <style>
        .bold {
            font-weight:bold;
        }
        .mr-20 {
            padding-right:20px;
        }
        .col-6 {
            width:50%;
            float:left;
        }
        table.spaced tr td {
            padding-bottom:20px;
        }
        table {
            vertical-align: top;
        }
    </style>
@endsection

@section('main')

    <div class="row">
        <div class="col-6">
            <img src="{{ public_path('assets/img/logo_final.png') }}" alt="" width="175">
        </div>
        <div class="col-6">
            <h1>Raport medical</h1>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-6">
            <table>
                <tbody>
                <tr>
                    <td class="bold mr-20">Nume pacient</td>
                    <td>{{ $patient->name }}</td>
                </tr>
                <tr>
                    <td class="bold mr-20">Varsta</td>
                    <td>{{ $patient->patientAge }} ani</td>
                </tr>
                <tr>
                    <td class="bold mr-20">CNP</td>
                    <td>{{ $patient->settingsPatient->pin }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <table>
                <tbody>
                <tr>
                    <td class="bold mr-20">Nume medic</td>
                    <td>{{ $medic->name }}</td>
                </tr>
                <tr>
                    <td class="bold mr-20">Data consultatiei</td>
                    <td>{{ $visit->date->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <td class="bold mr-20">Ora consultatiei</td>
                    <td>{{ $visit->date->format('H:i') }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>

    <table class="spaced">
        <tbody>
            <tr>
                <td class="bold mr-20">Bilet de trimitere</td>
                <td>{{ $record->referral ? 'Da' : 'Nu' }}</td>
            </tr>
            <tr>
                <td class="bold mr-20">Istoric</td>
                <td>{{ $record->medical_history ?? '-' }}</td>
            </tr>
            <tr>
                <td class="bold mr-20">Simptome</td>
                <td>{{ $record->symptoms ?? '-' }}</td>
            </tr>
            <tr>
                <td class="bold mr-20">Diagnostic</td>
                <td>{{ $record->diagnosis ?? '-' }}</td>
            </tr>
            <tr>
                <td class="bold mr-20">Date clinice</td>
                <td>{{ $record->clinical_data ?? '-' }}</td>
            </tr>
            <tr>
                <td class="bold mr-20">Date paraclinice</td>
                <td>{{ $record->para_clinical_data ?? '-' }}</td>
            </tr>
            <tr>
                <td class="bold mr-20">Recomandari</td>
                <td>{{ $record->indications ?? '-' }}</td>
            </tr>
        </tbody>
    </table>


@endsection
