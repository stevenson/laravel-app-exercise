@extends('layout')
@section('content') 
<h2>{{ $heading }}</h2>
<p>{{ $ledgerEntry['type'] }}</p>
<p>{{ $ledgerEntry['quantity'] }}</p>
<p>{{ $ledgerEntry['price'] }}</p>
<p>{{ $ledgerEntry['bought_at'] }}</p>
@endsection