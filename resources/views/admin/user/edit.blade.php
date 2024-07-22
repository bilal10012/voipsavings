@extends('layouts.admin.app')
@section('title','Updating User '.$user->id)
@section('css')
<style type="text/css">
    p.error-message {
        color: red;
        font-weight: 600;
    }
</style>
@endsection
@section('content')
    <div class="content">
        <h2 class="content-heading">Updating User # {{$user->id}} <a href="{{route('admin.user.index')}}" class="btn btn-alt-primary pull-right">Back</a></h2>
        <div class="block">
            <div class="block-content">
                <form method="POST" action="{{route('admin.user.update', $user->id)}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material form-material-primary floating m-20">
                                        <input type="text" class="form-control" name="email" value="{{$user->email}}" disabled>
                                        <label>Email <small>(Not editable)</small></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material form-material-primary floating m-20">
                                        <input type="text" class="form-control" name="contact" value="{{$user->contact}}">
                                        @error('contact')
                                        <p class="error-message">**{{ $message }}</p>
                                        @enderror
                                        <label>Contact Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material form-material-primary floating m-20">
                                        <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}">
                                        @error('first_name')
                                        <p class="error-message">**{{ $message }}</p>
                                        @enderror
                                        <label>First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material form-material-primary floating m-20">
                                        <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}">
                                        @error('last_name')
                                        <p class="error-message">**{{ $message }}</p>
                                        @enderror
                                        <label>Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material form-material-primary floating m-20">
                                        <input type="text" class="form-control" name="address_1" value="{{$user->address_1}}">
                                        @error('address_1')
                                        <p class="error-message">**{{ $message }}</p>
                                        @enderror
                                        <label>Address One</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material form-material-primary floating m-20">
                                        <input type="text" class="form-control" name="address_2" value="{{$user->address_2}}">
                                        @error('address_2')
                                        <p class="error-message">**{{ $message }}</p>
                                        @enderror
                                        <label>Address Two</label>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material form-material-primary floating m-20">
                                        <input type="text" class="form-control" name="city" value="{{$user->city}}">
                                        @error('city')
                                        <p class="error-message">**{{ $message }}</p>
                                        @enderror
                                        <label>CIty</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material form-material-primary floating m-20">
                                        <input type="text" class="form-control" name="state" value="{{$user->state}}">
                                        @error('state')
                                        <p class="error-message">**{{ $message }}</p>
                                        @enderror
                                        <label>State</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material form-material-primary floating m-20">
                                        <input type="text" class="form-control" name="country" value="{{$user->country}}">
                                        @error('country')
                                        <p class="error-message">**{{ $message }}</p>
                                        @enderror
                                        <label>Country</label>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    @method('PUT')
                    @csrf
                    <!-- <div class="col-md-6 offset-md-3">
                        <input type="submit" class="btn btn-primary m-30" value="Update Detail">
                    </div> -->
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection