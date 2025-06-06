@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Make a Payment</h2>
    <form action="{{ route('payment.process') }}" method="POST">
        @csrf
        <label>
            <input type="radio" name="payment_method" value="online_banking"> Online Banking
        </label>
        <label>
            <input type="radio" name="payment_method" value="e_wallet"> E-Wallet
        </label>
        <label>
            <input type="radio" name="payment_method" value="card"> Debit/Credit Card
        </label>

        <button type="submit" class="btn btn-primary">Proceed with Payment</button>
    </form>
</div>
@endsection
