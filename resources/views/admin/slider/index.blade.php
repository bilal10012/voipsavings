@extends('layouts.admin.app')
@section('title', 'Property Slider Index')
@section('css')
@endsection
@section('content')
    <div class="content">
        <h2 class="content-heading">Home Page Property Slider<a href="{{route('admin.slider.create')}}" class="btn btn-alt-primary pull-right">Add Slider Info</a></h2>
        <div class="block">
            <div class="block-content">
                <table class="table table-hover table-vcenter" id="mytable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Heading</th>
                        <th>Title</th>
                        {{-- <th>SubTitle</th> --}}
                        <th>Image</th>
                        <th>Status</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $key => $slider)
                    <tr>
                        <td>#{{str_pad($slider->id, 5, '0', STR_PAD_LEFT)}}</td>
                        <td>{{$slider->heading}}</td>
                        <td>{{$slider->title}}</td>
                        {{-- <td>{{$slider->subtitle}}</td> --}}
                        <td>
                            <img src="{{asset($slider->primary_image)}}" width="50%">
                        </td>
                        <td class="d-none d-sm-table-cell">
                            @if($slider->is_active == 1)
                            <span class="badge badge-success p-2">Active</span>
                            @else
                            <span class="badge badge-danger p-2">Hidden</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{route('admin.slider.edit', $slider->id)}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit Slider Info">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="javascript:;" onclick="if(confirm('Are you sure about deleting this Slider?') == true) document.getElementById('delete-'+{{$slider->id}}).submit();" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete Slider">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <form id="delete-{{$slider->id}}" action="{{ route('admin.slider.destroy',  $slider->id) }}" style="display:none" method="POST">
                         {{ method_field('DELETE') }}
                         {{ csrf_field() }}
                    </form>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection