@extends('master.layout')

@section('content')
<main class="main">

  <!-- Payment Section -->
  <section id="payment" class="payment section">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Payment</h2>
        <p>Complete your payment</p>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <div class="card payment-card">
            <div class="card-header">
              <h4>Payment Details</h4>
            </div>
            <div class="card-body">
              <form id="payment-form" method="POST" action="{{ route('payment.store') }}">
                @csrf
                <input type="hidden" name="total_amount" value="{{ $bookingDetails['total'] }}">
                <input type="hidden" name="has_booking" value="{{ $bookingDetails['has_booking'] ? 1 : 0 }}">
                <input type="hidden" name="first_name" value="{{ $bookingDetails['first_name'] ?? 'Guest' }}">

                @if(isset($bookingDetails['has_booking']) && $bookingDetails['has_booking'])
                    <input type="hidden" name="hotel_name" value="{{ $bookingDetails['hotel_name'] }}">
                    <input type="hidden" name="room_type" value="{{ $bookingDetails['room_type'] }}">
                @endif

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="card-name" class="form-label">Name on Card</label>
                    <input type="text" class="form-control" id="card-name" name="card_name" required>
                  </div>
                  <div class="col-md-6">
                    <label for="card-number" class="form-label">Card Number</label>
                    <input type="text" class="form-control" id="card-number" name="card_number" placeholder="1234 5678 9012 3456" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="expiry-month" class="form-label">Expiry Month</label>
                    <select class="form-select" id="expiry-month" name="expiry_month" required>
                      <option value="">Month</option>
                      @for($i = 1; $i <= 12; $i++)
                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                      @endfor
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="expiry-year" class="form-label">Expiry Year</label>
                    <select class="form-select" id="expiry-year" name="expiry_year" required>
                      <option value="">Year</option>
                      @for($i = date('Y'); $i <= date('Y') + 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                      @endfor
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" required>
                  </div>
                </div>

                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="save-card" name="save_card">
                  <label class="form-check-label" for="save-card">Save card details for future payments</label>
                </div>

                <button type="submit" class="btn btn-primary" id="pay-button">Pay Now</button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card booking-summary">
            <div class="card-header">
              <h4>Payment Summary</h4>
            </div>
            <div class="card-body">
              @if(isset($bookingDetails['has_booking']) && $bookingDetails['has_booking'])
                    <div class="hotel-info mb-4">
                    <h5>{{ $bookingDetails['hotel_name'] }}</h5>
                    <p class="text-muted">{{ $bookingDetails['room_type'] }}</p>
                    <p><i class="bi bi-calendar"></i> Check-in: {{ $bookingDetails['check_in'] }}</p>
                    <p><i class="bi bi-calendar"></i> Check-out: {{ $bookingDetails['check_out'] }}</p>
                    <p><i class="bi bi-people"></i> {{ $bookingDetails['guests'] }}</p>
                    </div>
                  <hr>
              @endif

              <div class="price-details">
                <div class="d-flex justify-content-between fw-bold">
                    <span>Amount to Pay</span>
                    <span>${{ number_format($bookingDetails['total'] ?? 0, 2) }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /Payment Section -->

  <!-- Success Modal -->
  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success" id="successModalLabel">Payment Successful!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
          <p class="mt-3">Your payment has been processed successfully.</p>
          <p>Transaction ID: <span id="transaction-id" class="fw-bold"></span></p>
          <div id="booking-info" class="mt-3">
            <!-- Dynamic content will be inserted here -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-bs-dismiss="modal">Continue</button>
        </div>
      </div>
    </div>
  </div>

</main>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#payment-form').on('submit', function(e) {
        e.preventDefault();

        // Show loading state
        $('#pay-button').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...').prop('disabled', true);

        // Submit form via AJAX
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Show success modal
                $('#transaction-id').text(response.payment_id);

                // Add booking info if exists
                if (response.has_booking) {
                    $('#booking-info').html(`
                        <div class="alert alert-info mt-3">
                            <p class="mb-1"><strong>Booking Details:</strong></p>
                            <p class="mb-1">Hotel: ${$(this).find('input[name="hotel_name"]').val()}</p>
                            <p class="mb-1">Room Type: ${$(this).find('input[name="room_type"]').val()}</p>
                        </div>
                    `);
                } else {
                    $('#booking-info').html(`
                        <div class="alert alert-info mt-3">
                            <p>No booking associated with this payment.</p>
                        </div>
                    `);
                }

                $('#successModal').modal('show');

                // Reset form and button
                $('#payment-form')[0].reset();
                $('#pay-button').html('Pay Now').prop('disabled', false);
            },
            error: function(xhr) {
                // Show error message
                alert('Payment failed: ' + (xhr.responseJSON?.message || 'Please check your details and try again.'));
                $('#pay-button').html('Pay Now').prop('disabled', false);
            }
        });
    });
});
</script>
@endpush
