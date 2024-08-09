@extends('layouts.admin.app')
@section('title', 'City')
@section('css')
<link rel="stylesheet" href="{{asset('a-asset/css/plugins/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.3.1/css/rowReorder.dataTables.css" />
@endsection
@section('content')
    <div class="content">
        <h2 class="content-heading">City <a href="{{route('admin.integration.create')}}" class="btn btn-alt-primary pull-right"><i class="fa fa-plus-circle"></i> Add new City</a></h2>
        <div class="block">
            <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cities as $key => $citie)
                    <tr>
                        <td>#{{str_pad($citie->id, 5, '0', STR_PAD_LEFT)}}</td>
                        <td>{{$citie->title}}</td>
                        <td class="d-none d-sm-table-cell">
                            @if($citie->status == 0)
                            <span class="badge badge-danger">Draft</span>
                            @else
                            <span class="badge badge-success">Active</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{route('admin.integration.edit', $citie->id)}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit City">
                                    <i class="fa fa-pencil text-primary"></i>
                                </a>
                                <a href="javascript:;" onclick="if(confirm('Are you sure about deleting this City?') == true) document.getElementById('delete-'+{{$citie->id}}).submit();" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete Product">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </div>
                        </td>
                        <form id="delete-{{$citie->id}}" action="{{ route('admin.integration.destroy',  $citie->id) }}" style="display:none" method="POST">
                         {{ method_field('DELETE') }}
                         {{ csrf_field() }}
                    </form>
                    </tr>

                    @empty
                        <tr>
                            <td colspan="7" class="text-center"><p class="text-uppercase m-20 font-weight-bold">You have not listed any City yet.</p></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset('a-asset/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('a-asset/js/plugins/dataTables.bootstrap4.min.js')}}"></script>


<script>
$(document).ready( function () {
  var table = $('.js-dataTable-full').DataTable({
    rowReorder: true,
    lengthMenu:[[10,25,50,-1],[10,25,50,"All"]]
  });





} );
</script>
@endsection
