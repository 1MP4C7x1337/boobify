@foreach ($payments as $payment)
    {{ dump($payment->payload) }}
@endforeach


<a href="https://commerce.coinbase.com/charges/WZE3C6P3">pay</a>
<div>
  <a class="buy-with-crypto"
     href="https://commerce.coinbase.com/checkout/6040b489-eefc-4818-8008-5e5ef90111ab">
    Buy with Crypto
  </a>
  <script src="https://commerce.coinbase.com/v1/checkout.js?version=201807">
  </script>
</div>