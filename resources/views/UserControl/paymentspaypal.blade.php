<!DOCTYPE html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>
<body>
  <script
src="https://www.paypal.com/sdk/js?currency=USD&commit=true&client-id={{env("PAYPAL_KEY")}}">
  </script>
<!--Pay:AaERjGkghR-XC85zr2quuJ-xA6GmYsOwpadS7FqxuKMaQLVim_D1YUFZgNCTcFcxR11ww4tmQJK-fhFZ
  Chek :AWQ9grPQ5iGTkyaGZi4oBKwpw_XtmMT7_rxoNZucNslroqnKvjHxR0w2LVBWuTVhGPVt8B5fUlLYnsla
-->
<a id="goback" style="
font-size: 20px;
" href="/dashboard" >Super-bots.com</a><br><br>
  <div id="paypal-button-container"></div>

</body>
<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '{{$session->price/100}}'
          },custom_id :JSON.stringify( {iduser: {{Auth::id()}} ,uniqid: "{{$session->uniqid}}",serbernumber: "{{env('serbernumber')}}" } )
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {

        // Call your server to save the transaction
        return fetch('/successPaypal', {
          method: 'post',
          headers: {
            'content-type': 'application/json'
          },
          body: JSON.stringify({
            id: data.orderID,
            u:{{$session->idplayer}},
            hash:"{{$session->hash}}",
            number:"{{$session->uniqid}}"
          })
        }) .then((myJson) => {

           window.location.replace("/dashboard")
            });

      });
    }
  }).render('#paypal-button-container');
</script>
