@extends('layouts.admin.app')
@section('title', 'Add City')
@section('before-css')
    <link rel="stylesheet" href="{{asset('a-asset/css/plugins/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('a-asset/css/plugins/summernote-bs4.css')}}">
@endsection
@section('css')
    <style>
        ::placeholder, .custom-file-label, .select2-selection__placeholder {
            color: #adadadda !important;
            opacity: 1;
        }
        :-ms-input-placeholder, .custom-file-label, .select2-selection__placeholder {
            color: #adadadda !important;
        }
        ::-ms-input-placeholder, .custom-file-label, .select2-selection__placeholder {
            color: #adadadda !important;
        }
        #submit_product {
            border: 1px solid #3e4d5f;
            background-color: #f0f2f5;
            color: #374659;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <h2 class="content-heading">Adding new City <a href="{{route('admin.detail.index')}}" class="btn btn-alt-primary pull-right">Back</a></h2>
        <form method="post" action="{{route('admin.detail.store')}}" enctype="multipart/form-data">
            <div class="row gutters-tiny">
                <div class="col-md-10">
                    <div class="block block-rounded block-themed">
                        <div class="block-header bg-gd-primary">
                            <h3 class="block-title">City Information</h3>
                        </div>
                        <div class="block-content block-content-full">
                            @if($errors->any())
                                @foreach($errors as $message)
                                {{ $message }}
                                @endforeach
                            @endif
                            <div class="form-group row">
                                <label class="col-12">Business Grow</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="business" placeholder="City Name" value="{{old('business')}}">
                                    @if($errors->has('business'))
                                        <div class="text-danger ml-5 font-weight-bold">{{ $errors->first('business') }}</div>
                                    @endif
                                </div>
                                <label class="col-12">years of  Experience</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="experience" placeholder="120" value="{{old('experience')}}">
                                    @if($errors->has('experience'))
                                        <div class="text-danger ml-5 font-weight-bold">{{ $errors->first('experience') }}</div>
                                    @endif
                                </div>
                                <label class="col-12">Shipment Parcels</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="shipments" placeholder="shipments" value="{{old('shipments')}}">
                                    @if($errors->has('shipments'))
                                        <div class="text-danger ml-5 font-weight-bold">{{ $errors->first('shipments') }}</div>
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="block block-rounded block-themed">
                        <div class="block-content block-content-full">
                            <div class="row gutters-tiny items-push">
                                <div class="col-sm-12 col-xl-12 mb-0">
                                    <div class="block text-center">
                                        <button type="submit" id="submit_product" class="btn btn-lg">
                                            <i class="fa fa-save mr-5"></i>
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @csrf
        </form>
    </div>
@endsection
@section('js')
<script src="{{asset('a-asset/js/plugins/select2.full.min.js')}}"></script>
<script src="{{asset('a-asset/js/plugins/summernote-bs4.min.js')}}"></script>
<script>

    jQuery('.js-select2:not(.js-select2-enabled)').each((index, element) => {
        let el = jQuery(element);
        el.addClass('js-select2-enabled').select2({
            placeholder: el.data('placeholder') || false
        });
    });
    jQuery('.js-summernote:not(.js-summernote-enabled)').each((index, element) => {
        let el = jQuery(element);
        el.addClass('js-summernote-enabled').summernote({
            height: el.data('height') || 350,
            minHeight: el.data('min-height') || null,
            maxHeight: el.data('max-height') || null,
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                }
            }
        });
    });
    $(".product_tags").select2({
        tags: true,
        tokenSeparators: [',']
    })

    function itemType(e) {
        if(e.value == 'single') {
            $('.item-count').css('display', 'none');
        }
        else {
            $('.item-count').css('display', 'block');
        }
    }
</script>
@endsection
