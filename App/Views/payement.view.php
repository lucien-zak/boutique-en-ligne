<body>
  <?php
  dump($params);
  ?>
  <div class="container">
    <h2 class="my-4 text-center">Intro To React Course [$50]</h2>
    <form action="/payement/charge" method="POST" id="payment-form">
      <div class="form-row">
        <div id="card-element" class="form-control">
          <!-- a Stripe Element will be inserted here. -->
        </div>
        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
      </div>
      <button>Submit Payment</button>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./assets/script/stripe2.js"></script>
</body>
