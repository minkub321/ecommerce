<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omise Payment</title>
    <script type="text/javascript" src="https://cdn.omise.co/omise.js"></script>
</head>
<body>
    <h1>Omise Payment</h1>

    <form id="checkout-form" action="<?php echo e(route('payment.process')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label>Amount (THB):</label>
        <input type="number" name="amount" id="amount" value="<?php echo e($cart_total ?? 50); ?>" required >

        <input type="hidden" name="omiseToken" id="omiseToken">

        <button type="button" id="pay-button">Pay with Omise</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // ตรวจสอบว่ามี OmiseCard หรือไม่
            if (typeof OmiseCard === "undefined") {
                alert("Omise.js ไม่ถูกโหลด กรุณาตรวจสอบการเชื่อมต่ออินเทอร์เน็ต");
                return;
            }

            // กำหนดค่าเริ่มต้นให้ Omise
            OmiseCard.configure({
                publicKey: "<?php echo e(config('services.omise.public_key')); ?>",
                image: "https://www.omise.co/assets/dashboard/images/omise-logo.png",
                frameLabel: "Your Shop",
                submitLabel: "Submit",
                currency: "THB"
            });

            // เมื่อคลิกปุ่ม Pay
            document.getElementById("pay-button").addEventListener("click", function (event) {
                event.preventDefault();

                OmiseCard.open({
                    amount: document.getElementById("amount").value * 100,
                    onCreateTokenSuccess: function (token) {
                        document.getElementById("omiseToken").value = token;
                        document.getElementById("checkout-form").submit();
                    },
                    onFormClosed: function () {
                        console.log("Omise Checkout closed.");
                    }
                });
            });
        });
    </script>

</body>
</html>
<?php /**PATH C:\Laravel\www\ecommerce\resources\views/payment/index.blade.php ENDPATH**/ ?>