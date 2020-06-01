<script src="https://js.stripe.com/v3/"></script>



<script >
var stripe = Stripe('{{env("STRIPE_KEY")}}');
stripe.redirectToCheckout({
  sessionId: '{{$session}}'
}).then(function (result) {

});

</script>
