@extends('admin.layouts.master')

@section('title')
    New Article
@endsection

@section('content')
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

            <h2>Current help articles</h2>
            <hr>
            <div class="row">
                @if(App\Category::all()->count() > 0)
                    <div class="col-md-4">
                        <!-- List group -->
                        <div class="list-group" id="myList" role="tablist">
                            @foreach(App\Category::all() as $category)
                                <a class="list-group-item list-group-item-action" data-toggle="list"
                                   href="#category{{ $category->id }}" role="tab">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-8">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            @foreach(App\Category::all() as $category)
                                <div class="tab-pane" id="category{{ $category->id }}" role="tabpanel">
                                    @if($category->articles()->count() > 0)
                                        @foreach($category->articles as $article)
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3>{{ $article->title }}</h3>
                                                    <a class="btn btn-outline-primary">Read</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="alert alert-info">
                                            This category has no articles
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                @else

                    <div class="alert alert-info">
                        There are no categories or articles.
                    </div>

                @endif

            </div>

        </main>
    </div>
@endsection