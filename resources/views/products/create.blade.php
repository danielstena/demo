@extends ('layouts.app')

@section('content')
    <form class="mt-5 mb-5" method="post" action="/products" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="titleid" class="col-sm-3 col-form-label">Productname</label>
            <div class="col-sm-9 pb-2">
                <input name="name" type="text" class="form-control" id="name" placeholder="Productname">
            </div>
            <label for="titleid" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9 pb-2">
                <input name="desc" type="text" class="form-control" id="desc" placeholder="Description">
            </div>
            <label for="titleid" class="col-sm-3 col-form-label">Price</label>
            <div class="col-sm-9 pb-2">
                <input name="price" type="number" class="form-control" id="price" placeholder="Price">
            </div>
             <label for="titleid" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-9">
                <input type="file" name="image" id="image">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Create product</button>
            </div>
        </div>
    </form>
    @if ($products)
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td> {{$product->desc}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                 <form action="{{action('ProductController@destroy', $product['id'])}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
@endsection
