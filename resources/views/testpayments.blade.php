@foreach ($payments as $payment)
    {{ dump($payment->payload) }}
@endforeach

<div>
    <a class="buy-with-crypto"
       href="https://commerce.coinbase.com/checkout/d81f0efd-96dc-4cce-b30a-b90fa98ccd78">
      Buy with Crypto
    </a>
    <script src="https://commerce.coinbase.com/v1/checkout.js?version=201807">
    </script>
  </div>