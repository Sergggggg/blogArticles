@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Articles') }}</div>

                <div class="card-body">
                    @foreach($articles as $article)

                    <h3 class="title">{{$article->title}}</h3>

                    <div class="text">{{$article->article}}
                    
                    </div>  
                    <div class="button-link"> 
                        <a class="btn btn-primary" href="{{ route('articles.show', ['article' => $article->id]) }}">{{ __('Read more') }}</a>
                        <a class="btn btn-primary update" href="{{route('articles.edit', ['article' => $article->id])}}">{{ __('Update article') }}</a>

                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                         @csrf

                         @method('DELETE')
                         <input name="id" type="hidden" value="{{$article->id}}">
                         <input name="user_id" type="hidden" value="{{$article->user_id}}">
                          <button class="btn btn-primary delete" type="submit" onclick="return confirm('Are you sure delete this record?')" class="btn btn-danger">
                            <i class="fa fa-btn fa-trash"></i>{{ __('Delete article') }}
                        </button>
                        </form>
                    </div>
                    @endforeach
                </div>
                {!! $articles->links("pagination::bootstrap-4") !!}
            </div>
        </div>
    </div>
</div>
@endsection