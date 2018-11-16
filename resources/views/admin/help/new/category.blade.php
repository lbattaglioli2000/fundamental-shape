@extends('admin.layouts.master')

@section('title')
    New Category
@endsection

@section('content')
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

            <h2>New Category</h2>

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

            <form action="{{ route('admin.help.new.category.post') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="name">Category name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter a name">
                </div>
                <div class="form-group">
                    <label for="name">Category description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter a description">
                </div>
                <button type="submit" class="btn btn-primary">Create category</button>
            </form>

        </main>
    </div>
@endsection