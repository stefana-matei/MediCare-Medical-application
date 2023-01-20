@extends('authenticated.medic.layouts.app')

@section('header')
    <div>
        <h6 class="bold mb-0 text-muted">ISTORIC PACIENT</h6>
        <h2 class="mt-1">{{ $patient->name }}</h2>
    </div>
@endsection

@section('main')
    <div class="page-content mt-5">
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-5" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-10" type="button" role="tab" aria-selected="true">13.01.2012</button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-11" type="button" role="tab" aria-selected="false">25.05.2015</button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-12" type="button" role="tab" aria-selected="false">15.02.2023</button>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="tab-10" role="tabpanel">
                    <h4 class="mt-0">Consultatia 1</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab amet ex, exercitationem inventore labore laborum maxime nostrum nulla odio officiis placeat, possimus praesentium quas quod repellat. Commodi debitis delectus distinctio eius facilis fugit illum molestiae, perspiciatis! Ab dolor ducimus enim fugit illo ipsum mollitia nesciunt obcaecati provident quia velit, voluptate.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, soluta.</p>
                </div>
                <div class="tab-pane fade" id="tab-11" role="tabpanel">
                    <h4 class="mt-0">Consultatia 2</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci animi asperiores assumenda atque corporis culpa cumque cupiditate debitis dicta dignissimos dolor, dolorem dolores eius est et facere fugit harum hic illo impedit in libero nesciunt nisi nostrum obcaecati quae quam qui ratione reiciendis repellendus rerum sit soluta veritatis vitae voluptas?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque facilis nihil nisi, numquam
                        perferendis sed!</p>
                </div>
                <div class="tab-pane fade" id="tab-12" role="tabpanel">
                    <h4 class="mt-0">Consultatia 3</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad aliquid asperiores consequatur dolore error hic id magnam, optio, praesentium repellendus sunt tempora velit? Asperiores doloremque molestiae odio rem repellendus, sit totam voluptas! Commodi culpa, deserunt dolor et magnam molestiae mollitia necessitatibus officia officiis praesentium quam sit suscipit, tempore!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque laboriosam laudantium
                        repellat.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
