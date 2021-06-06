@extends('layouts.default')

@section('content')
<div>
    <x-formules path="/register/step3" type="buy" />
    <x-register-progress-bar items="2" itemsMax="4" />
</div>
@endsection