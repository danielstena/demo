

@extends ('layouts.app')

@section('content')
    <h1 class="text-center">{{$products->name}}</h1>
        <div class="container product-show">
            <div class="row">
                <div class="col-md-12 card p-5">
                  <img class="card-img-top show" src="{{ url('storage/'. $products->image) }}">
                    <div class="card-title">
                        <h3>{{$products->name}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <p class="card-text"> {{$products->desc}}</p>
                        </div>
                    </div>
                    <div class="card-price">
                    {{$products->price}} kr
                    </div>
                </div>
            </div>
        </div>

        <form method="post" action="/review" enctype="multipart/form-data">
       @if(session()->has('logged_in'))
            <div class="alert alert-success }}"> 
            {{ session('logged_in') }}
            </div>
        @elseif(session()->has('not_loggedin'))
            <div class="alert alert-danger }} text-center"> 
                {{ session('not_loggedin') }}
            </div>  
        @endif
        {{ csrf_field() }}
            <div class="form-group row mt-3">
                <label for="titleid" class="col-sm-3 col-form-label">Comment</label>
                <div class="col-sm-9">
                    <textarea name="comment" type="text-area" class="form-control" id="comment"></textarea>
                </div>
                <label for="titleid" class="col-sm-3 col-form-label">Score</label>
                <div class="col-sm-9 float-left" >
                    1 <input name="score" type="radio" value=1 placeholder="">
                    2 <input name="score" type="radio" value=2 placeholder="">
                    3 <input name="score" type="radio" value=3 placeholder="">
                    4 <input name="score" type="radio" value=4 placeholder="">
                    5 <input name="score" type="radio" value=5 placeholder="">
                </div>
                <input type="hidden" name="prod_id" id="hiddenField" value="{{$products->id}}" />
                <input type="hidden" name="prod_name" id="hiddenField" value="{{$products->name}}" />
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Submit review</button>
                </div>
            </div>
        </form>
        @if(count($reviews) > 0)
            <div class="reviews">
                <div class="container">
                    <div class="row">
                        @foreach ($reviews as $review )
                            @if($review->prod_id == $products->id)
                                <div class="col-md-6 offset-md-3 p-2 mb-5 card text-center">
                                        <div class="card-title">
                                            <h2>{{$products->name}}</h2>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                Score: {{$review->score}} 
                                            </div>
                                                <div>
                                                Comment: {{$review->comment}} 
                                            </div>
                                                <div>
                                                Commenter: {{$review->user_name}} 
                                            </div>
                                        </div>  
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <p class="text-center">There are no reviews for this product at the moment.</p>
        @endif
@endsection
