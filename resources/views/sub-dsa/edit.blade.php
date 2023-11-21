@extends('admin-layouts.app')
@section('content')
<style type="text/css">
    #showImage{
        width: 105px;
        height: 105px;
        margin-top: 10px;
        border: 1px solid #eee;
        border-radius: 5px;
        padding: 5px;
    }
    #showIcon{
        margin-top: 10px;
        height: 100px;
        width: 100px;
        border: 1px solid #eee;
        border-radius: 5px;
        line-height: 93px;
        padding-left: 35px;
    }
</style>
<script src="{{ asset('assets/js/bundle.js?ver=2.7.0') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/css/editors/summernote.css?ver=3.0.3') }}">
<script src="{{ asset('assets/js/libs/editors/summernote.js?ver=3.0.3') }}"></script>
<script src="{{ asset('assets/js/editors.js?ver=3.0.3') }}"></script>

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Edit Chart</h3>

                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">

                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <form method="POST" action="{{url('daily-charts/edit')}}/{{ $chart->id }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Title</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $chart->title }}" name="title" placeholder="" id="full-name-1">
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no-1">File</label>
                                            <div class="form-control-wrap">
                                                <input type="file" class="form-control @error('file_url') is-invalid @enderror" name="file_url" value="{{$chart->file_url}}" accept="image/png, image/jpeg" id="phone-no-1" onchange="showImg(event)">
    
                                                @if($chart->file_url)
                                                <img id="showImage" src="{{url('/')}}/storage/app/{{$chart->file_url}}" style="height:100px; width:100px;">
                                                @else
                                                <i id="showIcon" class="material-icons">add_a_photo</i>
                                                @endif
                                                <img id="showImages"   style="height:100px; width:100px;"></img><br>
                                                @error('file_url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="description-address-1">Description</label>
                                            <div class="form-control-wrap">
                                                <textarea class="summernote-basic form-control @error('description') is-invalid @enderror" name="description">{{ $chart->description }}</textarea>
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
     $('#showImages').hide();
    function showImg(event){
    $('#showImages').show();
    $('#showIcon').hide();
    $('#showImage').hide();
    var output6 = document.getElementById('showImages');
    output6.src = URL.createObjectURL(event.target.files[0]);
    output6.onload = function() {
    URL.revokeObjectURL(output6.src)
    }
    }
var _basic = '.summernote-basic';
    if ($(_basic).exists()) {
      $(_basic).each(function () {
        $(this).summernote({
          placeholder: 'Enter Description',
          tabsize: 2,
          height: 120,
          toolbar: [['style', ['style']], ['font', ['bold', 'underline', 'strikethrough', 'clear']], ['font', ['superscript', 'subscript']], ['color', ['color']], ['fontsize', ['fontsize', 'height']], ['para', ['ul', 'ol', 'paragraph']], ['table', ['table']], ['insert', ['link', 'picture', 'video']], ['view', ['fullscreen', 'codeview', 'help']]]
      });
    });
}
</script>
@endsection
