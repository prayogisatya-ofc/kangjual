@extends('layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl xl:px-0 px-4 py-16 mx-auto">
        <div class="max-w-screen-md mb-8 lg:mb-16 mx-auto">
            <h2 class="mb-4 text-4xl text-center tracking-tight font-extrabold text-gray-900 dark:text-white">Pricay Policy</h2>
        </div>
        <div class="dark:text-white">
            <p class="text-sm mb-4">Effective Date: July 31, 2024</p>

            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">1. Information We Collect</h2>
                <p>We collect only the essential information needed to provide our services:</p>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    <li><strong>Name:</strong> To identify you and personalize your experience.</li>
                    <li><strong>Email Address:</strong> To communicate with you regarding your transactions and provide updates.</li>
                </ul>
            </section>

            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">2. How We Use Your Information</h2>
                <p>We use the information we collect for the following purposes:</p>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    <li><strong>To Process Transactions:</strong> Your name and email address are used to process payments and send you order confirmations.</li>
                    <li><strong>To Improve Our Services:</strong> We may use your contact information to send you updates about our services and improvements.</li>
                </ul>
            </section>

            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">3. Third-Party Services</h2>
                <p>We use Midtrans for payment processing. Midtrans may collect and process your payment information separately, and their own privacy policies will apply. We do not have access to or store your payment details.</p>
            </section>

            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">4. Cookies and Tracking</h2>
                <p>Our website does not use cookies or any tracking technologies. We do not collect or store any information related to your browsing habits or activities.</p>
            </section>

            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">5. Data Security</h2>
                <p>We implement appropriate security measures to protect your personal information from unauthorized access, alteration, or destruction. However, please be aware that no method of transmission over the internet or electronic storage is completely secure.</p>
            </section>

            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">6. Your Rights</h2>
                <p>You have the right to:</p>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    <li><strong>Access Your Data:</strong> Request a copy of the personal information we hold about you.</li>
                    <li><strong>Correct Your Data:</strong> Request corrections to any inaccurate or incomplete information.</li>
                    <li><strong>Delete Your Data:</strong> Request the deletion of your personal information, subject to legal or contractual obligations.</li>
                </ul>
                <p>To exercise these rights, please contact us using the information provided below.</p>
            </section>

            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">7. Changes to This Privacy Policy</h2>
                <p>We may update this Privacy Policy from time to time to reflect changes in our practices or legal requirements. Any updates will be posted on this page with the revised effective date.</p>
            </section>

            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">8. Contact Us</h2>
                <p>If you have any questions or concerns about this Privacy Policy or our data practices, please contact us at:</p>
                <ul class="list-none mt-2 space-y-1">
                    <li><strong>Email:</strong> kangjual@kangkoding.com</li>
                    <li><strong>WhatsApp:</strong> +6285158117703</li>
                </ul>
            </section>
        </div>
    </div>
</section>
@endsection