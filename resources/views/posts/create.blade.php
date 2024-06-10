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
            <div class="card-header">{{__('Create post')}}
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('post.index') }}">{{__('Posts')}}</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::open(array('route' => 'post.store', 'method'=>'POST','enctype'=>'multipart/form-data')) !!}
                    <div class="form-group">
                        <strong>{{__('Title')}}:</strong>
                        {!! Form::text('title', null, array('placeholder' => __('Title'),'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{__('Upload Image')}}:</strong>
                        {!! Form::file('image', null, array('placeholder' => 'image','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{__('Category')}}:</strong>
                        <select class="form-control" name="category_id"  required="" autofocus="">
                            <option value="">{{__('Selecte category')}}</option>
                            @foreach ($category as $Res)
                                <option value="{{ $Res->id }}">{{ $Res->catname }}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <strong>{{__('Body')}}:</strong>
                        {!! Form::textarea('body', null, array('placeholder' => __('Description'),'class' => 'form-control tinymce-editor','cols'=>'40','rows'=>'5')) !!}    
                                    </div>
                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/u3z14urx4kw4j3yv8f7awnq6gppsasgm2p4wr3c246bn6thy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
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
        height: 500,
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
        toolbar: " ltr rtl  insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",
      
      
    })
</script>
@endsection