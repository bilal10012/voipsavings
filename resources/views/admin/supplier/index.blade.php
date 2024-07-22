@extends('layouts.admin.app')
@section('title', 'Supplier Index')
@section('css')
@endsection
@section('content')
    <div class="content">
        <h2 class="content-heading">Suppliers <a href="{{route('admin.supplier.create')}}" class="btn btn-alt-primary pull-right">Add New Supplier</a></h2>
        <div class="block">
            <div class="block-content">
                <table class="table table-hover table-vcenter">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>subtitle</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($suppliers as $key => $supplier)
                    <tr>
                        <td>#{{str_pad($supplier->id, 5, '0', STR_PAD_LEFT)}}</td>
                        <td>{{$supplier->name}}</td>
                        <td>{{$supplier->designation}}</td>
                        <td class="d-none d-sm-table-cell">
                            @if($supplier->is_active == 0)
                            <span class="badge badge-danger">Draft</span>
                            @else
                            <span class="badge badge-success">Active</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{route('admin.supplier.edit', $supplier->id)}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit Info">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="javascript:;" onclick="if(confirm('Are you sure about deleting this Member?') == true) document.getElementById('delete-'+{{$supplier->id}}).submit();" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete Supplier">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <form id="delete-{{$supplier->id}}" action="{{ route('admin.supplier.destroy',  $supplier->id) }}" style="display:none" method="POST">
                         {{ method_field('DELETE') }}
                         {{ csrf_field() }}
                    </form>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center"><p class="text-uppercase m-20 font-weight-bold">You have not listed any Supplier yet.</p></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection