@foreach ($payments as $payment)
    {{ dump($payment->payload) }}
@endforeach

<div>
    <a class="buy-with-crypto"
       href="https://commerce.coinbase.com/checkout/d62f8dc6-1294-4e20-a894-fc0bb8ea9f1c">
      Buy with Crypto
    </a>
    <script src="https://commerce.coinbase.com/v1/checkout.js?version=201807">
    </script>
  </div>