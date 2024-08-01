<header class="sticky top-0 z-10">
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-4 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="/" class="flex items-center">
                <img src="{{ asset('img/logo-color.png') }}" class="mr-3 h-8 sm:h-10 dark:hidden" alt="KangJual Logo" />
                <img src="{{ asset('img/logo-white.png') }}" class="dark:block hidden mr-3 h-8 sm:h-10" alt="KangJual Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Kang <span class="text-primary-500">Jual</span></span>
            </a>
            <div class="flex items-center lg:order-2">
                <button id="theme-toggle" type="button" class="mr-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-200 dark:focus:ring-gray-700 rounded-full text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </button>
                <a href="https://wa.me/6285158117703?text=Haloo+min+saya+butuh+bantuan" class="text-white bg-primary-500 hover:bg-primary-600 focus:ring focus:ring-primary-400 font-medium rounded-full text-sm px-5 lg:px-6 py-2 lg:py-2.5 mr-2 dark:bg-primary-500 dark:hover:bg-primary-600 focus:outline-none dark:focus:ring-primary-800">Ngobrol</a>
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="{{ route('home_view') }}" class="flex items-center font-normal py-2 pr-4 pl-3 text-gray-500 {{ $title == 'Belajar dari Source Code' ? 'text-primary-500 dark:text-primary-500 bg-primary-100 lg:bg-transparent hover:bg-primary-200 dark:bg-primary-900 lg:dark:bg-transparent' : '' }} rounded border-b border-gray-100 hover:bg-primary-100 dark:hover:bg-primary-900 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-500 lg:p-0 dark:text-gray-400 lg:dark:hover:bg-transparent dark:border-gray-700">                      
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('project_view') }}" class="flex items-center font-normal py-2 pr-4 pl-3 text-gray-500 {{ $title == 'Project' ? 'text-primary-500 dark:text-primary-500 bg-primary-100 lg:bg-transparent hover:bg-primary-200 dark:bg-primary-900 lg:dark:bg-transparent' : '' }} rounded border-b border-gray-100 hover:bg-primary-100 dark:hover:bg-primary-900 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-500 lg:p-0 dark:text-gray-400 lg:dark:hover:bg-transparent dark:border-gray-700">                                             
                            Project
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('template_view') }}" class="flex items-center font-normal py-2 pr-4 pl-3 text-gray-500 {{ $title == 'Template' ? 'text-primary-500 dark:text-primary-500 bg-primary-100 lg:bg-transparent hover:bg-primary-200 dark:bg-primary-900 lg:dark:bg-transparent' : '' }} rounded border-b border-gray-100 hover:bg-primary-100 dark:hover:bg-primary-900 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-500 lg:p-0 dark:text-gray-400 lg:dark:hover:bg-transparent dark:border-gray-700">                                                   
                            Template
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cek_invoice_view') }}" class="flex items-center font-normal py-2 pr-4 pl-3 text-gray-500 {{ $title == 'Cek Invoice' ? 'text-primary-500 dark:text-primary-500 bg-primary-100 lg:bg-transparent hover:bg-primary-200 dark:bg-primary-900 lg:dark:bg-transparent' : '' }} rounded border-b border-gray-100 hover:bg-primary-100 dark:hover:bg-primary-900 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-500 lg:p-0 dark:text-gray-400 lg:dark:hover:bg-transparent dark:border-gray-700">                                                   
                            Cek Invoice
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>