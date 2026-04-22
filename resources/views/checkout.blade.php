<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الدفع عبر Paymob</title>
    <!-- إضافة مكتبات Pixel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/paymob-pixel@latest/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/paymob-pixel@latest/main.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 1rem;
            border-radius: 24px;
        }

        #paymob-elements {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            border: 2px solid #6363631c;
        }

        .footer-note {
            text-align: center;
            color: #000000;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <section class="about-section">
        <!-- الخلفية المتحركة -->
        <div class="about-bg">
            <div class="about-grid-lines"></div>
            <div class="about-moving-dots">
                <div class="about-minimal-dot"></div>
                <div class="about-minimal-dot"></div>
                <div class="about-minimal-dot"></div>
                <div class="about-minimal-dot"></div>
            </div>
        </div>

        <div class="container">
            <div id="paymob-elements"></div>
            <div class="footer-note">بوابة دفع آمنة - تدعم جميع البطاقات</div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/paymob-pixel@latest/main.js" type="module"></script>
    <script>
        function initializePaymobPixel() {
            if (typeof Pixel !== 'undefined') {
                const pixelInstance = new Pixel({
                    publicKey: '{{ config('services.paymob.public_key') }}',
                    clientSecret: '{{ $clientSecret }}',
                    paymentMethods: ['card'],
                    elementId: 'paymob-elements',
                    disablePay: false,
                    showSaveCard: true,
                    forceSaveCard: true,

                    beforePaymentComplete: async (paymentMethod) => {
                        console.log('Before payment start');
                        return true;
                    },

                    afterPaymentComplete: async (response) => {
                        console.log('After payment', response);
                        // يمكنك إعادة التوجيه بعد الدفع
                        // window.location.href = '{{ route('payment.success') }}?order_id=' + response.order_id;
                    },
                    onPaymentCancel: () => {
                        console.log('Payment has been canceled');
                        alert('تم إلغاء الدفع');
                    },
                    cardValidationChanged: (isValid) => {
                        console.log("Is valid ? ", isValid);
                    },
                    customStyle: {
                        Font_Family: 'Tajawal, sans-serif',
                        Font_Size_Label: '16',
                        Font_Size_Input_Fields: '16',
                        Font_Size_Payment_Button: '14',
                        Font_Weight_Label: 400,
                        Font_Weight_Input_Fields: 200,
                        Font_Weight_Payment_Button: 600,
                        Color_Container: '#FFF',
                        Color_Border_Input_Fields: '#D0D5DD',
                        Color_Border_Payment_Button: '#ffdd00',
                        /* زر الدفع بإطار أصفر */
                        Radius_Border: '8',
                        Color_Disabled: '#A1B8FF',
                        Color_Error: '#CC1142',
                        Color_Primary: '#000000',
                        /* اللون الأساسي (الخلفية) أسود */
                        Color_Input_Fields: '#FFF',
                        Text_Color_For_Label: '#000000',
                        Text_Color_For_Payment_Button: '#000000',
                        /* نص الزر أسود */
                        Text_Color_For_Input_Fields: '#000',
                        Color_For_Text_Placeholder: '#667085',
                        Width_of_Container: '100%',
                        Vertical_Padding: '40',
                        Vertical_Spacing_between_components: '18',
                        Container_Padding: '0',
                        // إضافة بعض التخصيصات الإضافية
                        Color_Payment_Button: '#ffdd00' /* خلفية زر الدفع صفراء */
                    },
                });
                console.log("تم تهيئة Pixel بنجاح");
            } else {
                console.error("مكتبة Pixel لم يتم تحميلها بعد.");
            }
        }

        window.addEventListener('load', initializePaymobPixel);
    </script>
</body>

</html>
