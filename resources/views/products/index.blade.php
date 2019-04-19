@extends ('layouts.app')

@section('content')
    <h1 class="text-center">Products</h1>
    @if(count($products) > 0)
        <div class="container border">
            <div class="row">
                @foreach ($products as $product )
                    <div class="card col-md-4 p-2 card text-center">
                        <a href="/products/{{$product->id}}">
                        {{-- <img class="card-img-top" src="https://picsum.photos/200/150/?random"> --}}
                            <div class="card-block">
                                <h4 class="card-title"><h2>{{$product->name}}</h2></h4>
                                {{-- <div class="card-text">
                                    Tawshif is a web designer living in Bangladesh.
                                </div> --}}
                            </div>
                            <div class="card-footer">
                                {{$product->price}} kr
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>mindre</p>
    @endif
@endsection
