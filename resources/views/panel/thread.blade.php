@extends('layout.main')

@section('title','Covmunity - Forum')

@section('body')
<body>
  @include('layout.header')
  <link rel="stylesheet" type="text/css" href="{{ asset('ckeditor/styles.css') }}">
            <div class="header bg-primary pb-6">
                <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                            @if ($thread->type == 'thread')
                                <li class="breadcrumb-item"><a href="{{ route('forum') }}">Forum</a></li>
                            @else
                                <li class="breadcrumb-item"><a href="{{ route('basic') }}">Basic</a></li>
                            @endif

                            <li class="breadcrumb-item"><a href="{{ route('thread',$thread->id) }}">{{ $thread->subject }}</a></li>
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
                    <!-- Card header -->
                    <div class="card-header bg-transparent">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col">
                                <h3 class="h1 text-white mb-0">{{ $thread->subject }}</h3>
                                <h6 class="text-light text-capitalize ls-1 mb-1">Posted by {{ $thread->user->name }} on {{ $thread->created_at }}</h6>
                            </div>
                            @if ($user->id == $thread->user->id)
                                <div class="col">
                                    <div class="text-white text-capitalize">
                                        <a href="{{ route('editthread',$thread->id) }}"><div class="d-flex justify-content-end">edit</div></a>
                                        <a href="{{ route('deletethread',$thread->id) }}"><div class="d-flex justify-content-end">delete</div></a>
                                    </div>
                                </div>
                            @endif
                        </div>


                    </div>

                    <div class="card-body">
                        <div class="content text-white text-justify">
                            {!! html_entity_decode($thread->thread) !!}
                        </div>
                        <div class="text-white text-capitalize">
                            <div class="d-flex justify-content-end">Thread by {{ $thread->user->name }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($thread->type == 'thread')
        <div class="row">
            <div class="col">
                <div class="card bg-default">
                    <!-- Card header -->
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="h1 text-white mb-0">Replies</h3>
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

                        <form action="{{ route('addreplies', $thread->id) }}" method="post">
                            @csrf
                            <div class="row mx-1">
                                <div class="col">

                                    @if (isset($replies))
                                        @foreach ($replies as $rep)
                                            <div class="row mx-1">
                                                <div class="card col-xl-12 col-md-12 col-xs-8">
                                                    <div class="row mx-1 mt-3">
                                                        <span class="avatar avatar-sm rounded-circle">
                                                            <img alt="Image placeholder" src="{{ asset('assets/img/theme/team-4.jpg') }}">
                                                        </span>
                                                        <div class="media-body ml-3 mt-2 ">
                                                            <div class="text-capitalize">
                                                                <div class="d-flex justify-content-start">{{ $rep->user->name }}</div>
                                                            </div>
                                                        </div>

                                                        @if ($user->id == $rep->user->id)
                                                            <div class="mr-3 mt-2">
                                                                <a href="{{ route('deletereplies',['id' => $thread->id, 'rid'=> $rep->id]) }}" class="d-flex justify-content-end">delete</a>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="card-body text-dark text-justify ml-5">
                                                        <div class="row">
                                                            {!! html_entity_decode($rep->reply) !!}
                                                        </div>
                                                        <div class="d-flex justify-content-end">{{ $rep->created_at }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    @else
                                        <div class="row mx-1">
                                            <h1 class="text-white">No Replies found</h1>
                                        </div>
                                    @endif
                                    <div class="row mt-5">
                                        <div class="form-group col-xl-12 col-md-12 col-xs-8">
                                            <textarea name="replies" class="editor">
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="from-group col-xl-12 col-md-12 col-xs-8">
                                            <button type="submit" id="submit" class="btn btn-secondary btn-lg btn-block">Submit Replies</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
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
