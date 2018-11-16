@extends('admin.layouts.master')

@section('title')
    New Article
@endsection

@section('content')
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

            <h2>New Article</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    {!! \Session::get('success') !!}
                </div>
            @endif

            <form action="{{ route('admin.help.new.article.post') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="name">Article title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter a title">
                </div>
                <div class="form-group">
                    <label for="name">Article category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach(\App\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Article body</label>
                    <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create article</button>
            </form>

        </main>
    </div>
@endsection