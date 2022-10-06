@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6"><h2>Products</h2></div>
    <div class="col-md-6 text-right"><a href="{{ route('products.create') }}" class='btn btn-success'>Add Product</a></div>
</div>
<table class='table table-striped'>
<thead>
    <tr>
        <td>Name</td>
        <td>Description</td>
        <td>Price</td>
        <td>Created At</td>
        <td>Updated At</td>
        <td>Action</td>
    </tr>
</thead>
<tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['description'] }}</td>
            <td>{{ $product['price'] }}</td>
            <td>{{ $product['created_at'] }}</td>
            <td>{{ $product['updated_at'] }}</td>
            <td><a href="{{ route('products.edit',$product['id']) }}" class='btn btn-sm btn-warning text-light m-1'>Edit</a><a href='#' class='btn btn-sm btn-danger text-light m-1 delete' data-id="{{$product['id']}}">Delete</a></td>
        </tr>
    @endforeach
</tbody>
</table>
<span>{{ $products->links() }}</span>

<div id="deleteModal" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this product?</p>
      </div>
      <div class="modal-footer">
        <form action="#" id="deleteForm" method="POST">
        {{ method_field('DELETE') }}
        {{csrf_field()}}
            <input type="submit" class="btn btn-danger"/>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('td').on('click', '.delete', function (e) {
            $('#deleteForm')[0].action = '{{ route('products.delete', '__id') }}'.replace('__id', $(this).data('id'));
            $('#deleteModal').modal('show');
        });
    })
</script>
@endsection