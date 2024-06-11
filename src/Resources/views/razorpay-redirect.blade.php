<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Razorpay HDFC VAS Gateway</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            justify-content: flex-start;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            /* Adjust margin-top as needed */
            animation: slideIn 1s ease-out forwards;
            /* Animation */
        }

        @keyframes slideIn {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <form name='razorpayform' id="razorpayform" action="https://api.razorpay.com/v1/checkout/embedded" method="POST">
        <div class="message">
            <strong>Note: Don't close this window or refresh it. After processing the payment, wait for
                redirection...</strong>
        </div>
        <input type="hidden" name="key_id" value="{{ $data['key'] }}">
        <input type="hidden" name="order_id" value="{{ $data['order_id'] }}">
        <input type="hidden" name="amount" value="{{ $data['amount'] }}">
        <input type="hidden" name="name" value="{{ $data['name'] }}">
        <input type="hidden" name="description" value="{{ $data['description'] }}">
        <input type="hidden" name="prefill[email]" value="{{ $data['prefill']['email'] }}">
        <input type="hidden" name="prefill[contact]" value="{{ $data['prefill']['contact'] }}">
        <input type="hidden" name="notes[transaction_id]" value="{{ $data['order_id'] }}">
        <input type="hidden" name="callback_url" value="{{ route('razorpay.callback') }}">
    </form>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.razorpayform.submit();
    </script>
</body>
</html>