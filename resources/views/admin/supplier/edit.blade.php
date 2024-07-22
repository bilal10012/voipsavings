@extends('layouts.admin.app')
@section('title', 'Edit Supplier')
@section('css')
    <link rel="stylesheet" href="{{asset('a-asset/css/plugins/summernote-bs4.css')}}">
@endsection
@section('content')
    <div class="content">
        <h2 class="content-heading">Editing Supplier #{{$supplier->id}} <a href="{{route('admin.supplier.index')}}" class="btn btn-alt-primary pull-right">Back</a></h2>
        <div class="block">
            <div class="block-content">
                <form method="POST" action="{{route('admin.supplier.update', $supplier->id)}}" id="createPost" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material form-material-primary floating m-20">
                                        <input required type="text" value="{{$supplier->name}}" class="form-control" name="name">
                                        <label>Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material form-material-primary floating m-20">
                                        <input required type="text" value="{{$supplier->designation}}" class="form-control" name="designation">
                                        <label>Sub title</label>
                                    </div>
                                </div>
                            </div>
                     
                            <!-- <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material floating m-20">
                                        <textarea required class="form-control" name="short_description" rows="8">{{$supplier->short_description}}</textarea>
                                        <label>Short Description</label>
                                    </div>
                                </div>
                            </div> -->
               
                            <!-- <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="block-content block-content-full">
                                        <label>Description</label>
                                        <textarea name="description" required class="js-summernote">{{$supplier->description}}</textarea>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-4">
                            <label class="mt-20">Supplier Image</label>
                            <img src="{{asset($supplier->primary_image)}}" class="img-fluid pb-10">
                            <div class="block col-md-12">
                                <input type="file" class="custom-file-input" id="example-file-input-custom" name="primaryImage" data-toggle="custom-file-input">
                                <label class="custom-file-label" for="example-file-input-custom">Choose Blog Post Primary Image</label>
                            </div>
                            <!-- <label class="mt-20">Blog Post Secondary Image</label>
                            <img src="{{asset($supplier->secondary_image)}}" class="img-fluid pb-10">
                            <div class="block col-md-12">
                                <input type="file" class="custom-file-input" id="example-file-input-custom" name="secondaryImage" data-toggle="custom-file-input">
                                <label class="custom-file-label" for="example-file-input-custom">Choose Blog Post Secondary Image</label>
                            </div> -->
                        </div>
                        <div class="form-group row text-center">
                                 <label class="col-12">Published</label>
                                    <div class="col-12">
                                       <label class="css-control css-control-success css-switch">
                                        <input type="checkbox" class="css-control-input" value="checked" name="is_active" {{($supplier->is_active == 1)? 'checked': ''}}>
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </div>
                                </div>

                    </div>
                    @csrf
                            @method('PUT')
                    <input type="submit" id="publishFaq" class="btn btn-primary m-30" value="Update Info">
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('a-asset/js/plugins/summernote-bs4.min.js')}}"></script>
    <script>
        jQuery('.js-summernote:not(.js-summernote-enabled)').each((index, element) => {
            let el = jQuery(element);
            el.addClass('js-summernote-enabled').summernote({
                height: el.data('height') || 350,
                minHeight: el.data('min-height') || null,
                maxHeight: el.data('max-height') || null
            });
        });
    </script>
@endsection
