@extends('authenticated.layouts.app')

@section('header')
    <h2>{{ $medic->name }}</h2>
@endsection

@section('main')
    <div class="row">
        <div class="col col-12 col-md-6 mb-md-0">
            <div class="card bg-light personal-info-card">
                <img src="../assets/content/user-profile.jpg" class="card-img-top" alt="">

                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3 user-actions">
                        <img src="../assets/content/user-400-1.jpg" width="100" height="100" alt="" class="rounded-500 me-4">

                        <button type="button" class="btn btn-danger rounded-500">Subscribe</button>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 mt-0 me-1">Liam Jouns</h5>

                        <select class="rating" data-readonly="true">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4" selected>4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <p class="text-muted">UI/UX Designer</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore enim, nemo nihil non omnis temporibus? Blanditiis
                        culpa labore velit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, provident?</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Websites & social channel
                </div>
                <div class="card-body">
                    <div class="row align-items-center mb-3">
                        <div class="col col-auto">
                            <div class="icon icofont-github fs-30 github-color"></div>
                        </div>
                        <div class="col">
                            <div>Github</div>
                            <a href="#">github.com/liam-jouns</a>
                        </div>
                    </div>

                    <div class="row align-items-center mb-3">
                        <div class="col col-auto">
                            <div class="icon icofont-twitter fs-30 twitter-color"></div>
                        </div>
                        <div class="col">
                            <div>Twitter</div>
                            <a href="#">twitter.com/liam-jouns</a>
                        </div>
                    </div>

                    <div class="row align-items-center mb-3">
                        <div class="col col-auto">
                            <div class="icon icofont-linkedin fs-30 linkedin-color"></div>
                        </div>
                        <div class="col">
                            <div>Linkedin</div>
                            <a href="#">linkedin.com/liam-jouns</a>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col col-auto">
                            <div class="icon icofont-youtube fs-30 youtube-color"></div>
                        </div>
                        <div class="col">
                            <div>YouTube</div>
                            <a href="#">youtube.com/liam-jouns</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-md-0">
                <div class="card-header">
                    Contact information
                </div>
                <div class="card-body">
                    <div class="row align-items-center mb-3">
                        <div class="col col-auto">
                            <div class="icon icofont-ui-touch-phone fs-30 text-muted"></div>
                        </div>
                        <div class="col">
                            <div>Mobile</div>
                            0126596578
                        </div>
                    </div>

                    <div class="row align-items-center mb-3">
                        <div class="col col-auto">
                            <div class="icon icofont-slack fs-30 text-muted"></div>
                        </div>
                        <div class="col">
                            <div>Slack</div>
                            @liam.jouns
                        </div>
                    </div>

                    <div class="row align-items-center mb-3">
                        <div class="col col-auto">
                            <div class="icon icofont-skype fs-30 text-muted"></div>
                        </div>
                        <div class="col">
                            <div>Skype</div>
                            liam0jouns
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col col-auto">
                            <div class="icon icofont-location-pin fs-30 text-muted"></div>
                        </div>
                        <div class="col">
                            <div>Current Address</div>
                            71 Pilgrim Avenue Chevy Chase, MD 20815
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    Experience
                </div>
                <div class="card-body">
                    <div class="v-timeline dots">
                        <div class="line"></div>

                        <div class="timeline-box">
                            <div class="box-items">
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon bg-success"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <div class="item-date"><span>2017 - 2018</span></div>
                                        </div>

                                        <div class="item-desc"><strong>UI/UX Designer</strong> - IronSketch</div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon bg-warning"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <div class="item-date"><span>2015 - 2017</span></div>
                                        </div>

                                        <div class="item-desc"><strong>Art & Multimedia From</strong> - Oxford University</div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon bg-info"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <div class="item-date"><span>2013 - 2015</span></div>
                                        </div>

                                        <div class="item-desc"><strong>Web Designer</strong> - WebDev Company</div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon bg-danger"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <div class="item-date"><span>2009 - 2013</span></div>
                                        </div>

                                        <div class="item-desc"><strong>UI/UX Designer</strong> - Design ArtData</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Education
                </div>
                <div class="card-body">
                    <div class="v-timeline dots">
                        <div class="line"></div>

                        <div class="timeline-box">
                            <div class="box-items">
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon bg-danger"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <div class="item-date"><span>2008 - 2009</span></div>
                                        </div>

                                        <div class="item-desc"><strong>Special schools</strong> - Edison Schools</div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon bg-info"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <div class="item-date"><span>2007 - 2008</span></div>
                                        </div>

                                        <div class="item-desc"><strong>Technical schools</strong> - Jules E. Mastbaum Technical High School</div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon bg-warning"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <div class="item-date"><span>2005 - 2007</span></div>
                                        </div>

                                        <div class="item-desc"><strong>High schools</strong> - Benjamin Franklin High School</div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon bg-primary"></div>
                                    </div>

                                    <div class="content-block">
                                        <div class="item-header">
                                            <div class="item-date"><span>1996 - 2004</span></div>
                                        </div>

                                        <div class="item-desc"><strong>Middle schools</strong> - Bethune, Mary Mcleod School</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-0">
                <div class="card-header">
                    Skills
                </div>
                <div class="card-body">
                    <div class="elements-list">
                        <span class="badge badge-primary badge-pill">html</span>
                        <span class="badge badge-primary badge-pill">php</span>
                        <span class="badge badge-primary badge-pill">css</span>
                        <span class="badge badge-primary badge-pill">scss</span>
                        <span class="badge badge-primary badge-pill">js</span>
                        <span class="badge badge-primary badge-pill">Angular</span>
                        <span class="badge badge-primary badge-pill">React</span>
                        <span class="badge badge-primary badge-pill">Vue.js</span>
                        <span class="badge badge-primary badge-pill">Javascript</span>
                        <span class="badge badge-primary badge-pill">Typescript</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
