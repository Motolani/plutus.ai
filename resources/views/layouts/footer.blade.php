        <footer class="footer bg-white mt-auto pt-4 ">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-sm">
                        <span class="footer-logo"><img src="{{asset('storage/images/plutus.png')}}" alt="logo"></span>
                    </div>
                    <div class="col-sm">
                        <p class="footer-text">Terms & Conditions  |  Privacy Policy <br>            
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Plutus AI. All Rights Reserved.</p>      
                    </div>
                </div>
            </div>

        </footer>
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            const stripe = Stripe('pk_test_51J0tovL3QWWj2S9pQ1B3AXCz2RkAu4D9BiTtJPVDZCOLZsqMomex9uboZnMNWS2QnLXtNVZhnujNS5hnbezzTBdN00FonMXDI1', { locale: 'en' }); // Create a Stripe client.
            const elements = stripe.elements(); // Create an instance of Elements.
            const cardElement = elements.create('card', { style: style, hidePostalCode: true }); // Create an instance of the card Element.
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;

            cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

            // Handle real-time validation errors from the card Element.
            cardElement.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe
                    .handleCardSetup(clientSecret, cardElement, {
                        payment_method_data: {
                            //billing_details: { name: cardHolderName.value }
                        }
                    })
                    .then(function(result) {
                        console.log(result);
                        if (result.error) {
                            // Inform the user if there was an error.
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
                            console.log(result);
                            // Send the token to your server.
                            stripeTokenHandler(result.setupIntent.payment_method);
                        }
                    });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(paymentMethod) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'paymentMethod');
                hiddenInput.setAttribute('value', paymentMethod);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>