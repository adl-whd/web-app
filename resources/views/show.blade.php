@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Payment Details</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        <li><strong>ID:</strong> {{ $payment->id }}</li>
        <li><strong>Amount:</strong> ${{ $payment->amount }}</li>
        <li><strong>Method:</strong> {{ ucfirst($payment->method) }}</li>
        <li><strong>Status:</strong> {{ ucfirst($payment->status) }}</li>
    </ul>
</div>
@endsection
