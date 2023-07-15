@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
             <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
             </ul>
        </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new article') }}</div>

                <div class="card-body">
                         <form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control" placeholder="Name" name="title">
                        </div>
                    </div>

                    <input id="text" type="hidden" class="form-control" value="{{auth()->user()->id}}" name="user_id">

                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Text') }}</label>

                        <div class="col-md-6">
                            <!-- <input class="form-control " id="fr_email" type="text" placeholder="state number" name="number"> -->
                            <textarea class="form-control" name="article" rows="9" cols="39" resize: none placeholder="Add your text here...">

                            </textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Add new article') }}</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
