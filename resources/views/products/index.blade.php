@extends ('layouts.app')

@section('content')
    <h1 class="text-center">Products</h1>
    @if(count($products) > 0)
        <div class="container border">
            <div class="row">
                @foreach ($products as $product )
                    <div class="col-md-4 p-2 card text-center">
                        <a href="/products/{{$product->id}}">
                            <div class="card-title">
                            <h2>{{$product->name}}</h2>
                            </div>
                            <div class="card-body">
                            {{$product->price}} kr
                            </div>
                            {{$product->id}}
                        </a>    
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>mindre</p>
    @endif
@endsection