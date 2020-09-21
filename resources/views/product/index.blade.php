@extends('layouts.app')

@section('content')

<?php if (session()->has('alert')): ?>
	<div class="row">
		<div class="alert alert-danger">
			<p><?php echo (session()->get('alert')) ?></p>
		</div>
	</div>
<?php endif ?>

<div class="container">
	<div class="row">
		<?php foreach ($products as$product): ?>
 
			<div class="col-3">
				<h1>{{$product->name}}</h1>

				<p>{{$product->price}}</p>

				<a href="add-to-cart/{{$product->id}}">Add-to-cart</a>
			</div>
			
		<?php endforeach ?>
		<div></div>
	</div>
</div>

@endsection