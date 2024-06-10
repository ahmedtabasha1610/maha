@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Edit Services
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('Services.index') }}">{{__('Back')}}</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($Services, ['route' => ['Services.update', $Services->id], 'method'=>'PATCH']) !!}
                <div class="form-group">
                    <strong>{{__('Title-Ar')}}:</strong>
                    {!! Form::text('title', null, array('placeholder' => __('Title'),'class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    <strong>{{__('Title-En')}}:</strong>
                    {!! Form::text('entitle', null, array('placeholder' => __('Title'),'class' => 'form-control')) !!}
                </div>
                 
                    <div class="form-group">
                        <strong>{{__('Description')}}:</strong>
                        {!! Form::textarea('body', null, array('placeholder' => 'description','class' => 'form-control tinymce-editor','cols'=>'40','rows'=>'5')) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{__('Upload Image')}}:</strong>
                        {!! Form::file('image', null, array('placeholder' => 'image','class' => 'form-control')) !!}
                        <img src="{{asset($Services->image)}}" width="75px" height="75px">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
      tinymce.init({
        selector: 'textarea',
        mobile: {
            theme: 'mobile'
        },
        directionality: "rtl",
        image_class_list: [{
            title: 'img-responsive',
            value: 'img-responsive'
        }, ],
        height: 300,
        setup: function(editor) {
            editor.on('init change', function() {
                editor.save();
            });
        },
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste imagetools",
            "directionality"
        ],
        toolbar: "lrt rtl insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",
        content_css: '//www.tiny.cloud/css/codepen.min.css'



    });
</script>
@endsection