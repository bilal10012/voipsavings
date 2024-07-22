@extends('layouts.admin.app')
@section('title', 'Contact Inquiries')
@section('css')
@endsection
@section('content')
    <div class="content">
        <h2 class="content-heading">Inquiry # {{ $inquiry->id }} <a href="{{url('panel/inquiries')}}" class="btn btn-alt-primary pull-right">Back</a></h2>
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
                        @if($inquiry->subject !=null)
                        <tr>
                            <th>Subject :</th>
                            <td>{{$inquiry->subject}}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Email :</th>
                            <td>{{$inquiry->email}}</td>
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
