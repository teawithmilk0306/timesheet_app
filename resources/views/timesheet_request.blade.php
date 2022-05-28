@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">{{ __('Request') }}</div>

<div class="card-body">
<label for="start">Select a calendar:</label>

<input type="date" id="start" name="trip-start"
value="2018-07-22"
</div>
<fieldset>
<legend>select your hope:</legend>
<div>
<input type="radio" id="huey" name="drone" value="huey"
checked>
<label for="huey">休み</label>
</div>

<div>
<input type="radio" id="dewey" name="drone" value="dewey">
<label for="dewey">早番</label>
</div>

<div>
<input type="radio" id="louie" name="drone" value="louie">
<label for="louie">遅番</label>
</div>
</div>
</fieldset>
<p class="text-center">
<button type="button" class="btn btn-outline-dark">Request</button></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

