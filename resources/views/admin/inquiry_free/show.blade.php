@extends('layouts.admin.app')
@section('title', 'Contact Inquiries')
@section('css')
@endsection
@section('content')
    <div class="content">
        <h2 class="content-heading">Free Estimate Inquiry # {{ $inquiry->id }} 
        @if(auth()->user()->role == 0)

            <a href="{{url('panel/free-estimate-inquiries')}}" class="btn btn-alt-primary pull-right">Back</a>
    @else
    <a href="{{url('user/vehicle-inquiries')}}" class="btn btn-alt-primary pull-right">Back</a>

    @endif
        </h2>
        <div class="block">
            <div class="block-content">
                <table class="table table-hover table-vcenter">
                    <tbody>
                        <tr>
                            <th>First Name :</th>
                            <td>{{$inquiry->first_name}} </td>
                        </tr>
                        <tr>
                            <th>Last Name :</th>
                            <td>{{$inquiry->last_name}}</td>
                        </tr>
                        @if($inquiry->contact !=null)
                        <tr>
                            <th>Contact :</th>
                            <td>{{$inquiry->contact}}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Email :</th>
                            <td>{{$inquiry->email}}</td>
                        </tr>
                        <tr>
                            <th>Address :</th>
                            <td>{{$inquiry->address}}</td>
                        </tr>
                        <tr>
                            <th>Message :</th>
                            <td>{{$inquiry->message}}</td>
                        </tr>
                        
                       
                  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
