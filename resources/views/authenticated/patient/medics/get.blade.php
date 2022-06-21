@extends('authenticated.layouts.app')

@section('header')
    <h2>Profil medic</h2>
@endsection

@section('main')
    <div class="row">
        @include('authenticated.components.medic', ['user' => $medic, 'showProfile' => false])


        <div class="col col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    Programeaza-te
                </div>
                <div class="card-body">

                    <form id="appointment-create-form" method="POST" action="{{ route('appointments.create') }}">
                        @csrf

                        <input name="medic_id" type="hidden" value="{{ $medic->id }}">

                        <x-appointment-time></x-appointment-time>

                        <button class="btn btn-primary" type="submit">Solicita programare</button>
                    </form>

                </div>
            </div>

            @include('authenticated.components.medic-profile-section', ['title' => 'Specializare', 'value' => $medic->settingsMedic->specialisation])
            @include('authenticated.components.medic-profile-section', ['title' => 'Competente', 'value' => $medic->settingsMedic->skills])
            @include('authenticated.components.medic-profile-section', ['title' => 'Domenii de activitate', 'value' => $medic->settingsMedic->areas_of_activity])
            @include('authenticated.components.medic-profile-section', ['title' => 'Educatie', 'value' => $medic->settingsMedic->education])
            @include('authenticated.components.medic-profile-section', ['title' => 'Cursuri postuniversitare', 'value' => $medic->settingsMedic->postgraduate_courses])
            @include('authenticated.components.medic-profile-section', ['title' => 'Traininguri', 'value' => $medic->settingsMedic->trainings])
            @include('authenticated.components.medic-profile-section', ['title' => 'Certificari internationale', 'value' => $medic->settingsMedic->international_certifications])
            @include('authenticated.components.medic-profile-section', ['title' => 'Publicatii', 'value' => $medic->settingsMedic->publications])
            @include('authenticated.components.medic-profile-section', ['title' => 'Membru in', 'value' => $medic->settingsMedic->member])
            @include('authenticated.components.medic-profile-section', ['title' => 'Alte realizari', 'value' => $medic->settingsMedic->other_realizations])

{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    Experience--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="v-timeline dots">--}}
{{--                        <div class="line"></div>--}}

{{--                        <div class="timeline-box">--}}
{{--                            <div class="box-items">--}}
{{--                                <div class="item">--}}
{{--                                    <div class="icon-block">--}}
{{--                                        <div class="item-icon bg-success"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="content-block">--}}
{{--                                        <div class="item-header">--}}
{{--                                            <div class="item-date"><span>2017 - 2018</span></div>--}}
{{--                                        </div>--}}

{{--                                        <div class="item-desc"><strong>UI/UX Designer</strong> - IronSketch</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="item">--}}
{{--                                    <div class="icon-block">--}}
{{--                                        <div class="item-icon bg-warning"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="content-block">--}}
{{--                                        <div class="item-header">--}}
{{--                                            <div class="item-date"><span>2015 - 2017</span></div>--}}
{{--                                        </div>--}}

{{--                                        <div class="item-desc"><strong>Art & Multimedia From</strong> - Oxford University</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="item">--}}
{{--                                    <div class="icon-block">--}}
{{--                                        <div class="item-icon bg-info"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="content-block">--}}
{{--                                        <div class="item-header">--}}
{{--                                            <div class="item-date"><span>2013 - 2015</span></div>--}}
{{--                                        </div>--}}

{{--                                        <div class="item-desc"><strong>Web Designer</strong> - WebDev Company</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="item">--}}
{{--                                    <div class="icon-block">--}}
{{--                                        <div class="item-icon bg-danger"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="content-block">--}}
{{--                                        <div class="item-header">--}}
{{--                                            <div class="item-date"><span>2009 - 2013</span></div>--}}
{{--                                        </div>--}}

{{--                                        <div class="item-desc"><strong>UI/UX Designer</strong> - Design ArtData</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    Education--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="v-timeline dots">--}}
{{--                        <div class="line"></div>--}}

{{--                        <div class="timeline-box">--}}
{{--                            <div class="box-items">--}}
{{--                                <div class="item">--}}
{{--                                    <div class="icon-block">--}}
{{--                                        <div class="item-icon bg-danger"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="content-block">--}}
{{--                                        <div class="item-header">--}}
{{--                                            <div class="item-date"><span>2008 - 2009</span></div>--}}
{{--                                        </div>--}}

{{--                                        <div class="item-desc"><strong>Special schools</strong> - Edison Schools</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="item">--}}
{{--                                    <div class="icon-block">--}}
{{--                                        <div class="item-icon bg-info"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="content-block">--}}
{{--                                        <div class="item-header">--}}
{{--                                            <div class="item-date"><span>2007 - 2008</span></div>--}}
{{--                                        </div>--}}

{{--                                        <div class="item-desc"><strong>Technical schools</strong> - Jules E. Mastbaum Technical High School</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="item">--}}
{{--                                    <div class="icon-block">--}}
{{--                                        <div class="item-icon bg-warning"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="content-block">--}}
{{--                                        <div class="item-header">--}}
{{--                                            <div class="item-date"><span>2005 - 2007</span></div>--}}
{{--                                        </div>--}}

{{--                                        <div class="item-desc"><strong>High schools</strong> - Benjamin Franklin High School</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="item">--}}
{{--                                    <div class="icon-block">--}}
{{--                                        <div class="item-icon bg-primary"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="content-block">--}}
{{--                                        <div class="item-header">--}}
{{--                                            <div class="item-date"><span>1996 - 2004</span></div>--}}
{{--                                        </div>--}}

{{--                                        <div class="item-desc"><strong>Middle schools</strong> - Bethune, Mary Mcleod School</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="card mb-0">--}}
{{--                <div class="card-header">--}}
{{--                    Skills--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="elements-list">--}}
{{--                        <span class="badge badge-primary badge-pill">html</span>--}}
{{--                        <span class="badge badge-primary badge-pill">php</span>--}}
{{--                        <span class="badge badge-primary badge-pill">css</span>--}}
{{--                        <span class="badge badge-primary badge-pill">scss</span>--}}
{{--                        <span class="badge badge-primary badge-pill">js</span>--}}
{{--                        <span class="badge badge-primary badge-pill">Angular</span>--}}
{{--                        <span class="badge badge-primary badge-pill">React</span>--}}
{{--                        <span class="badge badge-primary badge-pill">Vue.js</span>--}}
{{--                        <span class="badge badge-primary badge-pill">Javascript</span>--}}
{{--                        <span class="badge badge-primary badge-pill">Typescript</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
