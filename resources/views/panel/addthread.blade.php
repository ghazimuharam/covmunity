@extends('layout.main')

@section('title','Covmunity - Add Thread')

@section('body')
<link rel="stylesheet" type="text/css" href="{{ asset('ckeditor/styles.css') }}">

<body data-editor="ClassicEditor" data-collaboration="false">
  @include('layout.header')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
    <div class="header-body">
        <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Default</li>
            </ol>
            </nav>
        </div>
        </div>
    </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row mx-1">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Welcome to Covmunity Forum</h6>
                            <h3 class="h1 text-white mb-0">Add new thread</h3>
                        </div>
                    </div>
                    <div class="row mx-1 mt-1">
                        <div class="col">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="card-body">

                    <form action="{{ route('addthread') }}" method="post">
                        @csrf
                        <div class="row mx-1">
                            <div class="col-xl-6 col-md-8 col-xs-2">
                                <div class="alert alert-primary" role="alert">
                                    <li>
                                        <span>Due to limited capacity of our hosting, please upload your image into <a href="https://imgur.com/upload" target="_blank">https://imgur.com/upload</a></span>
                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-1">
                            <div class="col">

                                <div class="row">
                                    <div class="form-group col-xl-6 col-md-6 col-xs-2">
                                        <input type="subject" name="subject" class="form-control text-dark" id="subject" placeholder="Subject">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xl-12 col-md-12 col-xs-8">
                                        <textarea name="thread" class="editor">
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="from-group col-xl-12 col-md-12 col-xs-8">
                                        <button type="submit" id="submit" class="btn btn-primary btn-lg btn-block">Submit Thread</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="{{ asset('ckeditor/build/ckeditor.js') }}"></script>
<script>

    ClassicEditor
        .create( document.querySelector( '.editor' ), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    '|',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'undo',
                    'redo'
                ]
            },
            language: 'en',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            licenseKey: '',

        } )
        .then( editor => {
            editor.setData( 'Insert your text here.' );
            const data = editor.getData();
            console.log(data);
        } )
        .catch( error => {
            console.error( error );
        } );


</script>
@endsection
