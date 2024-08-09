@extends('layouts.admin.app')
@section('title', 'Add Slider Info')
@section('css')
    <link rel="stylesheet" href="{{asset('a-asset/css/plugins/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('a-asset/css/plugins/bootstrap-colorpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('a-asset/css/plugins/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('a-asset/css/plugins/dropzone.css')}}">
    <style>
        .dz-success-mark {
            display: none;
        }
        .dz-error-mark {
            display: none;
        }
        .dz-error-message{
            display: none;
        }
        .dz-details{
            display: none;
        }
    </style>

@endsection
@section('content')
    <div class="content">
        <h2 class="content-heading">Adding new Image To the Gallery <a href="{{route('admin.gallery.index')}}" class="btn btn-alt-primary pull-right">Back</a></h2>
        <div class="block">
            <div class="block-content">
                <form method="POST" action="{{ route('admin.gallery.store') }}" id="createPost" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <!-- Title of the Image (Optional) -->
                            <div class="form-group">
                                <label for="imageTitle">Title of the Image (Optional)</label>
                                <input type="text" class="form-control" id="imageTitle" name="imageTitle" placeholder="Enter image title">
                            </div>

                            <!-- Image Upload -->
                            <div class="form-group">
                                <label for="primaryImage">Choose Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="primaryImage" name="primaryImage" data-toggle="custom-file-input">
                                    <label class="custom-file-label" for="primaryImage">Choose Image</label>
                                </div>
                            </div>

                            <!-- Checkbox to Display on State of the Art Section -->
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="stateOfTheArt" name="stateOfTheArt">
                                <label class="form-check-label" for="stateOfTheArt">Display on State of the Art Section?</label>
                            </div>
                        </div>
                    </div>

                    <input type="submit" id="publishFaq" class="btn btn-primary m-30" value="Add Image">
                </form>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('a-asset/js/plugins/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('a-asset/js/plugins/bootstrap-colorpicker.min.js')}}"></script>
    <script>
        jQuery('.js-summernote:not(.js-summernote-enabled)').each((index, element) => {
            let el = jQuery(element);
            el.addClass('js-summernote-enabled').summernote({
                height: el.data('height') || 350,
                minHeight: el.data('min-height') || null,
                maxHeight: el.data('max-height') || null
            });
        });
        jQuery('.js-colorpicker:not(.js-colorpicker-enabled)').each((index, element) => {
            jQuery(element).addClass('js-colorpicker-enabled').colorpicker();
        });
    </script>
@endsection
