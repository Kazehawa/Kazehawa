<!doctype html>
<html lang="en">
  <head>
    <title>Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/messages.css">
    <link rel="stylesheet" href="css/payment.css">
  </head>
  <body>
    <div class="payment-card">
      <h2 class="payment-card-title">Subscribe to watch live games of Olympic held in Yokyo city at only $12/-</h2>
      <form action="{{ route('subscription') }}" method="POST">
        @csrf

        @if(session('success'))
          <div class="success-message">{{ session('success') }}</div>
        @endif

        <div class="form-group">
          <label for="card_number">Card Number</label>
          <input type="text" id="card_number" name="card_number" required>
          @error('card_number')
            <span class="error">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required>
          @error('name')
            <span class="error">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group form-group-half">
          <label for="expiry_date">Expiry Date</label>
          <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
          @error('expiry_date')
            <span class="error">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group form-group-half">
          <label for="cvc">CVC</label>
          <input type="text" id="cvc" name="cvc" required maxlength="3" pattern="\d{3}">
          @error('cvc')
            <span class="error">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group form-group-half">
          <label for="amount">Amount</label>
          <input type="number" id="amount" name="amount" value="12" min="12" max="12" required>
          @error('amount')
            <span class="error">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label>Total Amount: $12</label>
        </div>

        <div class="form-group">
          <label for="payment_method">Payment Method</label>
          <br>
          <input type="radio" id="payment_method1" name="payment_method" value="credit_card" checked>
          <label for="payment_method1">Credit Card</label>
          <br>
          <input type="radio" id="payment_method2" name="payment_method" value="paypal">
          <label for="payment_method2">PayPal</label>
        </div>

        <button type="submit" class="pay-button">Pay</button>
      </form>
    </div>

    <script>
      // JavaScript code to format card number as the user types
      document.getElementById('card_number').addEventListener('input', function (e) {
        var input = e.target.value;
        var formattedInput = input.replace(/[^\d]/g, '').replace(/(.{4})/g, '$1 ').trim();
        e.target.value = formattedInput;
      });
    </script>
  </body>
</html>
