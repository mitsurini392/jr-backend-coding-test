@extends('layouts.master')

@section('content')
@if($edit)
<h2>Edit Product</h2>
@else
<h2>Create Product</h2>
@endif

<form method="POST" action="{{ $edit ? route('products.update',$product->id) : route('products.store') }}">
  @if($edit)
  {{ method_field('PUT') }}
  @endif
  {{csrf_field()}}
  <div class="mb-3">
    @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
  </div>
  <div class="mb-3">
    <label for="productName" class="form-label">Name</label>
    <input type="text" class="form-control" @if(count($errors) > 0) value="{{ old('name') }}" @elseif($edit) value="{{ $product->name }}" @endif id="productName" name="name" required="required" />
  </div>
  <div class="mb-3">
    <label for="productDesc" class="form-label">Description</label>
    <input type="text" class="form-control" @if(count($errors) > 0) value="{{ old('desc') }}" @elseif($edit) value="{{ $product->description }}" @endif id="productDesc" name="desc" required="required" />
  </div>
  <div class="mb-3">
    <label for="productPrice" class="form-label">Price</label>
    <input type="text" class="form-control" @if(count($errors) > 0) value="{{ old('price') }}" @elseif($edit) value="{{ $product->price }}" @endif id="productPrice" name="price" required="required" />
  </div>
  <button type="submit" class="btn btn-primary text-end">@if($edit) Save @else Create @endif</button>
</form>
@endsection