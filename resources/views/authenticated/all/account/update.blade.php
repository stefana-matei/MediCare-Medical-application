@extends('authenticated.layouts.app')

@section('header')
    <h1 class="page-title">Edit account</h1>
@endsection

@section('main')
    <div class="row justify-content-center">
        <div class="col col-12 col-xl-8">
            <form class="mb-4">
                <label>Photo</label>
                <div class="form-group avatar-box d-flex align-items-center">
                    <img src="{{ asset('assets/content/user-400-1.jpg') }}" width="100" height="100" alt="" class="rounded-500 me-4">

                    <button class="btn btn-outline-primary" type="button">
                        Change photo<span class="btn-icon icofont-ui-user ms-2"></span>
                    </button>
                </div>

                <div class="form-group">
                    <label>First name</label>
                    <input class="form-control" type="text" placeholder="First name" value="Liam">
                </div>

                <div class="form-group">
                    <label>Last name</label>
                    <input class="form-control" type="text" placeholder="Last name" value="Jouns">
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Age</label>
                            <input class="form-control" type="number" placeholder="Age" value="25">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="selectpicker" title="Gender">
                                <option selected>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Phone number</label>
                    <input class="form-control" type="number" placeholder="Age" value="0126596578">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" placeholder="Address" rows="3">71 Pilgrim Avenue Chevy Chase, MD 20815</textarea>
                </div>

                <div class="form-group">
                    <label>Last visit</label>
                    <input class="form-control" type="text" placeholder="Last visit" value="18 Dec 2019" readonly>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="selectpicker" title="Status">
                        <option selected>Approved</option>
                        <option>Pending</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-success">Save changes</button>
                    </div>
                    <div class="col text-end">
                        <button type="button" class="btn btn-outline-danger">
                            <span class="d-none d-sm-block">Delete account</span>
                            <span class="d-sm-none">Delete</span>
                        </button>
                    </div>
                </div>
            </form>

            <hr>

            <h4>Change password</h4>

            <form>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Current password</label>
                            <input class="form-control" type="text" placeholder="Current password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>New password</label>
                            <input class="form-control" type="text" placeholder="New password">
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Confirm new password</label>
                            <input class="form-control" type="text" placeholder="Confirm new password">
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-dark">Change password</button>
            </form>
        </div>
    </div>

@endsection
