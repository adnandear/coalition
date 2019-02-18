@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script
	src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
	integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
	crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

            
            </div>
{!! Form::open(['action' => 'ProductController@store','id'=>'form1']) !!}
{{ csrf_field() }}
<div class="form-group">
    {!! Form::label('pname', 'Product Name') !!}
    {!! Form::text('productname', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('pqty', 'Product Qty') !!}
    {!! Form::text('productqty', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('pprice', 'Product Price') !!}
    {!! Form::text('productprice', null, ['class' => 'form-control']) !!}
</div>
{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}
<table class="table">
    <thead>
      <tr>
        <th>Product</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total</th>
        <th>Date Created</th>
      </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      @foreach($products as $product)
      <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->qty}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->price*$product->qty}}</td>
        <?php $total+=$product->price*$product->qty; ?>
<td>{{$product->created_at}}</td>
      </tr>
    @endforeach
    <tr>
      <td>Total</td>
      <td>{{$total}}</td>

    </tr>
    </tbody>
  </table>
        </div>
    </div>
</div>

<script>
jQuery( document ).ready( function(  ) {

  $('#form1d').on('submit', function(e) {
      e.preventDefault();
      var name = $('#productname').val();
      var pqty = $('#productqty').val();
      var pprice = $('#productprice').val();
      $.ajax({
          type: "POST",
          url: '{{route('products.store')}}',
          data: $(this).serialize(),
          success: function( msg ) {
              alert( msg );
          }
      });
  });
});
</script>
@endsection
