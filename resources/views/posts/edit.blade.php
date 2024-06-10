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
            <div class="card-header">{{__('Edit post')}}
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('post.index') }}">{{__('Posts')}}</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($posts, ['route' => ['post.update', $posts->id], 'method'=>'PATCH','enctype'=>'multipart/form-data']) !!}
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
                                <option value="{{ $Res->id }}"@if($posts->category_id == $Res->id) selected @endif>{{ $Res->catname }}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <strong>Body:</strong>
                        {!! Form::textarea('body', null, array('placeholder' => __('Description'),'class' => 'form-control tinymce-editor','cols'=>'40','rows'=>'5')) !!} 
                                       </div>

                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
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
        selector: 'textarea.tinymce-editor',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
</script>
@endsection