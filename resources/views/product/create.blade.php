@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<form action="/p" method="post">

			@csrf

  <div class="form-group">
    <label for="name">Proizvod</label>
    <input type="text" class="form-control" id="name" aria-describedby="" placeholder="" name="name">
  <div class="form-group">
    <label for="price">Cena</label>
    <input type="number" class="form-control" id="price" placeholder="" name="price">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
	</div>
</div>

@endsection