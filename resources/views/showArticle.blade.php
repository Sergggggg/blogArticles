@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div> 
                    <a class="btn btn-primary" href="{{route('home')}}">{{ __('Back to home') }}</a>
                </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Article') }}</div>

                <div class="card-body">
                
                    <h3 class="title">{{$article['title']}}</h3>

                    <div class="full_text">{{$article['article']}}
                    
                    </div>  
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

