<footer class="p-4 bg-white md:p-8 lg:p-10 dark:bg-gray-800">
    <div class="mx-auto max-w-screen-xl text-center">
        <a href="#" class="flex justify-center items-center text-2xl font-semibold text-gray-900 dark:text-white">
            <img src="{{ asset('img/logo-color.png') }}" class="mr-3 h-10 sm:h-12 dark:hidden" alt="KangJual Logo" />
            <img src="{{ asset('img/logo-white.png') }}" class="dark:block hidden mr-3 h-10 sm:h-12" alt="KangJual Logo" />
            <span>Kang <span class="text-primary-500">Jual</span></span>    
        </a>
        <p class="my-6 text-gray-500 dark:text-gray-400 font-light">Tempat terbaik untuk mendapatkan source code aplikasi dan website berkualitas. Jelajahi koleksi kami dan temukan solusi yang tepat untuk proyek Anda.</p>
        <ul class="flex flex-wrap justify-center items-center mb-6 text-gray-900 dark:text-white">
            <li>
                <a href="{{ route('project_view') }}" class="mr-4 hover:underline md:mr-6">Project</a>
            </li>
            <li>
                <a href="{{ route('template_view') }}" class="mr-4 hover:underline md:mr-6 ">Template</a>
            </li>
            <li>
                <a href="{{ route('cek_invoice_view') }}" class="mr-4 hover:underline md:mr-6 ">Cek Invoice</a>
            </li>
            <li>
                <a href="{{ route('privacy_policy_views') }}" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
            </li>
            <li>
                <a href="{{ route('terms_views') }}" class="mr-4 hover:underline md:mr-6">Terms & Conditions</a>
            </li>
        </ul>
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ date('Y') }} <a href="https://kangkoding.com" class="hover:underline">Kang Koding</a>. All Rights Reserved.</span>
    </div>
</footer>