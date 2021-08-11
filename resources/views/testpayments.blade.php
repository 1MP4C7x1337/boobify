@foreach ($payments as $payment)
    {{ dump($payment->payload) }}
@endforeach

<div>
    <a class="buy-with-crypto"
       href="https://commerce.coinbase.com/checkout/89f3a0b7-8449-4e5e-b18e-97dac5a77ae3">
      Buy with Crypto
    </a>
    <script src="https://commerce.coinbase.com/v1/checkout.js?version=201807">
    </script>
  </div>