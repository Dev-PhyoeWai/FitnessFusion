<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('build/css/tailwind.css')}}" />
{{--    <link rel="stylesheet" href="{{asset('build/css/bootstrap.min.css')}}" />--}}
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
</head>
<body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}">
        <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <!-- Loading screen -->
            <div
                x-ref="loading"
                class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker"
            >
                Loading.....
            </div>

            <!-- Sidebar -->
            <aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
                <div class="flex flex-col h-full">
                    <!-- Sidebar links -->
                    <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
                        <!-- Dashboards links -->
                        <div x-data="{ isActive: true, open: true}">
                            <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                            <a
                                href="#"
                                @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
                                role="button"
                                aria-haspopup="true"
                                :aria-expanded="(open || isActive) ? 'true' : 'false'"
                            >
                      <span aria-hidden="true">
                        <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                          />
                        </svg>
                      </span>
                                <span class="ml-2 text-sm"> Dashboards </span>
                                <span class="ml-auto" aria-hidden="true">
                        <!-- active class 'rotate-180' -->
                        <svg
                            class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                            </a>
                            <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a
                                    href="index.html"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700"
                                >
                                    Default
                                </a>
                            </div>
                        </div>

                        <!-- Components links -->
                        <div x-data="{ isActive: false, open: false }">
                            <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                            <a
                                href="#"
                                @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
                                role="button"
                                aria-haspopup="true"
                                :aria-expanded="(open || isActive) ? 'true' : 'false'"
                            >
                      <span aria-hidden="true">
                        <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                          />
                        </svg>
                      </span>
                                <span class="ml-2 text-sm"> Categories </span>
                                <span aria-hidden="true" class="ml-auto">
                        <!-- active class 'rotate-180' -->
                        <svg
                            class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a
                                    href="#"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Category
                                </a>
                                <a
                                    href="#"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Sub Category
                                </a>
                            </div>
                        </div>

                        <!-- Brands links -->
                        <div x-data="{ isActive: false, open: false }">
                            <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                            <a
                                href="#"
                                @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
                                role="button"
                                aria-haspopup="true"
                                :aria-expanded="(open || isActive) ? 'true' : 'false'"
                            >
                      <span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 3l4 1.5v12l6-2.5l-2-1l-1-4l7 2.5V16L9 21l-4-2z"/>
                        </svg>
                      </span>
                                <span class="ml-2 text-sm"> Brands </span>
                                <span aria-hidden="true" class="ml-auto">
                        <!-- active class 'rotate-180' -->
                        <svg
                            class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a
                                    href="#"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Example 1
                                </a>
                                <a
                                    href="#"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Example 2
                                </a>
                            </div>
                        </div>

                        <!-- Products links -->
                        <div x-data="{ isActive: false, open: false }">
                            <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                            <a
                                href="#"
                                @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
                                role="button"
                                aria-haspopup="true"
                                :aria-expanded="(open || isActive) ? 'true' : 'false'"
                            >
                      <span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 1024 1024">
                            <path fill="currentColor" fill-rule="evenodd" d="M464 144c8.837 0 16 7.163 16 16v304c0 8.836-7.163 16-16 16H160c-8.837 0-16-7.164-16-16V160c0-8.837 7.163-16 16-16zm-52 68H212v200h200zm493.333 87.686c6.248 6.248 6.248 16.379 0 22.627l-181.02 181.02c-6.248 6.248-16.378 6.248-22.627 0l-181.019-181.02c-6.248-6.248-6.248-16.379 0-22.627l181.02-181.02c6.248-6.248 16.378-6.248 22.627 0zm-84.853 11.313L713 203.52L605.52 311L713 418.48zM464 544c8.837 0 16 7.164 16 16v304c0 8.837-7.163 16-16 16H160c-8.837 0-16-7.163-16-16V560c0-8.836 7.163-16 16-16zm-52 68H212v200h200zm452-68c8.837 0 16 7.164 16 16v304c0 8.837-7.163 16-16 16H560c-8.837 0-16-7.163-16-16V560c0-8.836 7.163-16 16-16zm-52 68H612v200h200z"/>
                        </svg>
                      </span>
                                <span class="ml-2 text-sm"> Products </span>
                                <span aria-hidden="true" class="ml-auto">
                        <!-- active class 'rotate-180' -->
                        <svg
                            class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a
                                    href="#"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Products 1
                                </a>
                                <a
                                    href="#"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Product 2
                                </a>
                            </div>
                        </div>

                        <!-- Shipping links -->
                        <div x-data="{ isActive: false, open: false }">
                            <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                            <a
                                href="#"
                                @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
                                role="button"
                                aria-haspopup="true"
                                :aria-expanded="(open || isActive) ? 'true' : 'false'"
                            >
                      <span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 17a2 2 0 1 0 4 0a2 2 0 1 0-4 0m10 0a2 2 0 1 0 4 0a2 2 0 1 0-4 0"/>
                        <path d="M5 17H3v-4M2 5h11v12m-4 0h6m4 0h2v-6h-8m0-5h5l3 5M3 9h4"/></g>
                       </svg>
                      </span>
                                <span class="ml-2 text-sm"> Shipping </span>
                                <span aria-hidden="true" class="ml-auto">
                        <!-- active class 'rotate-180' -->
                        <svg
                            class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a
                                    href="#"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Example 1
                                </a>
                                <a
                                    href="#"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Example 2
                                </a>
                            </div>
                        </div>

                        <!-- Order links -->
                        <div x-data="{ isActive: false, open: false }">
                            <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                            <a
                                href="#"
                                @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
                                role="button"
                                aria-haspopup="true"
                                :aria-expanded="(open || isActive) ? 'true' : 'false'"
                            >
                      <span aria-hidden="true">
                       <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                           <path fill="currentColor" d="m17.371 19.827l2.84-2.796l-.626-.627l-2.214 2.183l-.955-.975l-.627.632zM6.77 8.731h10.462v-1H6.769zM18 22.116q-1.671 0-2.835-1.165Q14 19.787 14 18.116t1.165-2.836T18 14.116t2.836 1.164T22 18.116q0 1.67-1.164 2.835Q19.67 22.116 18 22.116M4 20.769V5.616q0-.672.472-1.144T5.616 4h12.769q.67 0 1.143.472q.472.472.472 1.144v5.944q-.244-.09-.484-.154q-.241-.064-.516-.1v-5.69q0-.231-.192-.424T18.384 5H5.616q-.231 0-.424.192T5 5.616V19.05h6.344q.068.41.176.802q.109.392.303.748l-.034.034l-1.135-.826l-1.346.961l-1.346-.961l-1.346.961l-1.347-.961zm2.77-4.5h4.709q.056-.275.138-.515t.192-.485H6.77zm0-3.769h7.31q.49-.387 1.05-.645q.56-.259 1.197-.355H6.769zM5 19.05V5z"/>
                       </svg>
                      </span>
                                <span class="ml-2 text-sm"> Orders </span>
                                <span aria-hidden="true" class="ml-auto">
                        <!-- active class 'rotate-180' -->
                        <svg
                            class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a
                                    href="#"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Example 1
                                </a>
                                <a
                                    href="#"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Example 2
                                </a>
                            </div>
                        </div>

                        <!-- Discounts links -->
                        <div x-data="{ isActive: false, open: false }">
                            <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                            <a
                                href="#"
                                @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
                                role="button"
                                aria-haspopup="true"
                                :aria-expanded="(open || isActive) ? 'true' : 'false'"
                            >
                      <span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.3em" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M7 18c1.1 0 2 .9 2 2s-.9 2-2 2s-2-.9-2-2s.9-2 2-2m10 0c1.1 0 2 .9 2 2s-.9 2-2 2s-2-.9-2-2s.9-2 2-2m-9.8-3.2c0 .1.1.2.2.2H19v2H7c-1.1 0-2-.9-2-2c0-.4.1-.7.2-1l1.3-2.4L3 4H1V2h3.3l4.3 9h7l3.9-7l1.7 1l-3.9 7c-.3.6-1 1-1.7 1H8.1l-.9 1.6zM9.4 1c.8 0 1.4.6 1.4 1.4s-.6 1.4-1.4 1.4S8 3.2 8 2.4S8.7 1 9.4 1m5.2 8c-.8 0-1.4-.6-1.4-1.4s.6-1.4 1.4-1.4s1.4.6 1.4 1.4S15.3 9 14.6 9M9.2 9L8 7.8L14.8 1L16 2.2z"/>
                        </svg>
                      </span>
                                <span class="ml-2 text-sm"> Discount </span>
                                <span aria-hidden="true" class="ml-auto">
                        <!-- active class 'rotate-180' -->
                        <svg
                            class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a
                                    href="#"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Orders 1
                                </a>
                                <a
                                    href="#"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Order 2
                                </a>
                            </div>
                        </div>

                        <!-- Authentication links -->
                        <div x-data="{ isActive: false, open: false}">
                            <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                        <a
                                href="#"
                                @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
                                role="button"
                                aria-haspopup="true"
                                :aria-expanded="(open || isActive) ? 'true' : 'false'"
                            >
                      <span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.4em" viewBox="0 0 32 32">
                            <path fill="currentColor" d="M21.053 20.8c-1.132-.453-1.584-1.698-1.584-1.698s-.51.282-.51-.51s.51.51 1.02-2.548c0 0 1.413-.397 1.13-3.68h-.34s.85-3.51 0-4.7c-.85-1.188-1.188-1.98-3.057-2.547s-1.188-.454-2.547-.396c-1.36.058-2.492.793-2.492 1.19c0 0-.85.056-1.188.396c-.34.34-.906 1.924-.906 2.32s.283 3.06.566 3.625l-.337.114c-.284 3.283 1.13 3.68 1.13 3.68c.51 3.058 1.02 1.756 1.02 2.548s-.51.51-.51.51s-.452 1.245-1.584 1.698c-1.132.452-7.416 2.886-7.927 3.396c-.512.51-.454 2.888-.454 2.888H29.43s.06-2.377-.452-2.888c-.51-.51-6.795-2.944-7.927-3.396zm-12.47-.172c-.1-.18-.148-.31-.148-.31s-.432.24-.432-.432s.432.432.864-2.16c0 0 1.2-.335.96-3.118h-.29s.144-.59.238-1.334a10.01 10.01 0 0 1 .037-.996l.038-.426c-.02-.492-.107-.94-.312-1.226c-.72-1.007-1.008-1.68-2.59-2.16c-1.584-.48-1.01-.384-2.16-.335c-1.152.05-2.112.672-2.112 1.01c0 0-.72.047-1.008.335c-.27.27-.705 1.462-.757 1.885v.28c.048.654.26 2.45.47 2.873l-.286.096c-.24 2.782.96 3.118.96 3.118c.43 2.59.863 1.488.863 2.16s-.432.43-.432.43s-.383 1.058-1.343 1.44l-.232.092v5.234h.575c-.03-1.278.077-2.927.746-3.594c.357-.355 1.524-.94 6.353-2.862zm22.33-9.056c-.04-.378-.127-.715-.292-.946c-.718-1.008-1.007-1.68-2.59-2.16c-1.583-.48-1.007-.384-2.16-.335c-1.15.05-2.11.672-2.11 1.01c0 0-.72.047-1.008.335c-.27.272-.71 1.472-.758 1.89h.033l.08.914c.02.23.022.435.027.644c.09.666.21 1.35.33 1.59l-.286.095c-.24 2.782.96 3.118.96 3.118c.432 2.59.863 1.488.863 2.16s-.43.43-.43.43s-.054.143-.164.34c4.77 1.9 5.927 2.48 6.28 2.833c.67.668.774 2.316.745 3.595h.48V21.78l-.05-.022c-.96-.383-1.344-1.44-1.344-1.44s-.433.24-.433-.43s.433.43.864-2.16c0 0 .804-.23.963-1.84V14.66c0-.018 0-.033-.003-.05h-.29s.216-.89.293-1.862z"/>
                        </svg>
                      </span>
                                <span class="ml-2 text-sm">Role Management</span>
                                <span aria-hidden="true" class="ml-auto">
                        <!-- active class 'rotate-180' -->
                        <svg
                            class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                    </a>
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a
                                    href="auth/register.html"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                >
                                    User
                                </a>
                                <a
                                    href="{{route('roles.index')}}"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                >
                                    Role
                                </a>
                                <a
                                    href="{{route('permissions.index')}}"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                >
                                    Permission
                                </a>
                            </div>
                        </div>

                        <!-- Layouts links -->
                        <div x-data="{ isActive: false, open: false}">
                            <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                            <a
                                href="#"
                                @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
                                role="button"
                                aria-haspopup="true"
                                :aria-expanded="(open || isActive) ? 'true' : 'false'"
                            >
                      <span aria-hidden="true">
                        <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                          />
                        </svg>
                      </span>
                                <span class="ml-2 text-sm"> Layouts </span>
                                <span aria-hidden="true" class="ml-auto">
                        <!-- active class 'rotate-180' -->
                        <svg
                            class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Layouts">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a
                                    href="layouts/two-columns-sidebar.html"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Example
                                </a>
                            </div>
                        </div>

                        <!-- Pages links -->
                        <div x-data="{ isActive: false, open: false }">
                            <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                            <a
                                href="#"
                                @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
                                role="button"
                                aria-haspopup="true"
                                :aria-expanded="(open || isActive) ? 'true' : 'false'"
                            >
                      <span aria-hidden="true">
                        <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                          />
                        </svg>
                      </span>
                                <span class="ml-2 text-sm"> Pages </span>
                                <span aria-hidden="true" class="ml-auto">
                        <!-- active class 'rotate-180' -->
                        <svg
                            class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                      </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Pages">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a
                                    href="pages/blank.html"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Example
                                </a>
                            </div>
                        </div>
                    </nav>

                    <!-- Sidebar footer -->
                    <div class="flex-shrink-0 px-2 py-4 space-y-2">
                        <button
                            @click="openSettingsPanel"
                            type="button"
                            class="flex items-center justify-center w-full px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark"
                        >
                        <span aria-hidden="true">
                          <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="1.5em" viewBox="0 0 24 24">
                              <g fill="none" fill-rule="evenodd"><path d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="#ffff" d="M11.879 5.5c-.955.117-1.86.456-2.242.77c-2.228 1.842-3.486 4.277-4.139 6.4a13.8 13.8 0 0 0-.562 2.763c-.034.383-.065.784-.007 1.167c.383.434.925.749 1.428 1.019c1.051.565 2.63 1.151 4.753 1.387c1.202.134 2.72.21 4.12.098c1.453-.117 2.567-.422 3.145-.885c.974-.779 1.22-1.688 1.131-2.484c-.095-.856-.576-1.58-1.06-1.903c-.835-.556-1.775-.612-2.661-.38c-.912.24-1.661.76-2.015 1.186a1 1 0 0 1-1.477.069c-.55-.55-1.485-.71-2.738.125a1 1 0 0 1-1.536-.636c-.286-1.434-.137-2.958.127-4.215c.266-1.259.666-2.342.96-2.928a1 1 0 0 1 1.788 0c.203.404.574.766 1.006.918c.335-.211.626-.506.862-.821c.434-.578.579-1.125.386-1.608c-.392-.14-.867-.091-1.27-.042Zm1.483-1.964c.484.093 1.191.335 1.532 1.017c.747 1.494.13 2.914-.532 3.797c-.432.576-.988 1.118-1.635 1.45c-.135.07-.41.2-.727.2c-.591 0-1.17-.269-1.645-.605c-.09.306-.177.642-.252.998a10.6 10.6 0 0 0-.24 2.078c1.053-.34 2.13-.304 3.058.22a6.5 6.5 0 0 1 2.357-1.173c1.3-.341 2.86-.294 4.277.65c1.015.677 1.784 1.952 1.939 3.347c.162 1.454-.343 3.044-1.87 4.266c-1.078.862-2.721 1.195-4.233 1.316c-1.565.126-3.218.04-4.501-.103c-2.378-.264-4.204-.928-5.48-1.613c-.837-.45-1.982-1.072-2.345-2.025c-.245-.646-.181-1.43-.121-2.102c.08-.881.276-1.981.643-3.173c.732-2.379 2.165-5.194 4.776-7.352c.803-.664 2.147-1.076 3.272-1.214c.58-.071 1.19-.081 1.727.021"/>
                              </g>
                          </svg>
                    </span>
                            <span>TPP-PHP</span>
                        </button>
                    </div>
                </div>
            </aside>

            <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
                <!-- Navbar -->
                <header class="relative bg-white dark:bg-darker">
                    <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">
                        <!-- Mobile menu button -->
                        <button
                            @click="isMobileMainMenuOpen = !isMobileMainMenuOpen"
                            class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring"
                        >
                            <span class="sr-only">Open main manu</span>
                            <span aria-hidden="true">
                      <svg
                          class="w-8 h-8"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                      >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                      </svg>
                    </span>
                        </button>

                        <!-- Brand -->
                        <a
                            href="{{route('dashboard')}}"
                            class="inline-block text-2xl font-bold tracking-wider uppercase text-primary-dark dark:text-light"
                        >
                            <img style="width: 65px; height: 45px;" src="{{asset('build/images/Fitnessfu.png')}}" alt="logo" />
                        </a>

                        <!-- Mobile sub menu button -->
                        <button
                            @click="isMobileSubMenuOpen = !isMobileSubMenuOpen"
                            class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring"
                        >
                            <span class="sr-only">Open sub manu</span>
                            <span aria-hidden="true">
                      <svg
                          class="w-8 h-8"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                      >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                        />
                      </svg>
                    </span>
                        </button>

                        <!-- Desktop Right buttons -->
                        <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">
                            <!-- Toggle dark theme button -->
                            <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                                <div
                                    class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter"
                                ></div>
                                <div
                                    class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm"
                                    :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }"
                                >
                                    <svg
                                        x-show="!isDark"
                                        class="w-4 h-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                                        />
                                    </svg>
                                    <svg
                                        x-show="isDark"
                                        class="w-4 h-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                        />
                                    </svg>
                                </div>
                            </button>

                            <!-- Notification button -->
                            <button
                                @click="openNotificationsPanel"
                                class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                            >
                                <span class="sr-only">Open Notification panel</span>
                                <svg
                                    class="w-7 h-7"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                    />
                                </svg>
                            </button>

                            <!-- Search button -->
                            <button
                                @click="openSearchPanel"
                                class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                            >
                                <span class="sr-only">Open search panel</span>
                                <svg
                                    class="w-7 h-7"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                    />
                                </svg>
                            </button>

                            <!-- User avatar button -->
                            <div class="relative" x-data="{ open: false }">
                                <button
                                    @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })"
                                    type="button"
                                    aria-haspopup="true"
                                    :aria-expanded="open ? 'true' : 'false'"
                                    class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100"
                                >
                                    <div class="flex justify-center items-center">
                                        <div class="px-2">{{ Auth::user()->name }}</div>
                                        <img class="mt-1 w-10 h-10 rounded-full" src="{{asset('build/images/admin.png')}}" alt="login-user" />
                                    </div>

                                </button>

                                <!-- User dropdown menu -->
                                <div
                                    x-show="open"
                                    x-ref="userMenu"
                                    x-transition:enter="transition-all transform ease-out"
                                    x-transition:enter-start="translate-y-1/2 opacity-0"
                                    x-transition:enter-end="translate-y-0 opacity-100"
                                    x-transition:leave="transition-all transform ease-in"
                                    x-transition:leave-start="translate-y-0 opacity-100"
                                    x-transition:leave-end="translate-y-1/2 opacity-0"
                                    @click.away="open = false"
                                    @keydown.escape="open = false"
                                    class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                                    tabindex="-1"
                                    role="menu"
                                    aria-orientation="vertical"
                                    aria-label="User menu"
                                >
                                    <a
                                        href="{{route('profile.edit')}}"
                                        role="menuitem"
                                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                                    >
                                        Profile
                                    </a>
                                    <a
                                        href="#"
                                        role="menuitem"
                                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                                    >
                                        Settings
                                    </a>
                                    <!-- Logout -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </div>
                        </nav>

                        <!-- Mobile sub menu -->
                        <nav
                            x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
                            x-transition:enter-start="-translate-y-full opacity-0"
                            x-transition:enter-end="translate-y-0 opacity-100"
                            x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                            x-transition:leave-start="translate-y-0 opacity-100"
                            x-transition:leave-end="-translate-y-full opacity-0"
                            x-show="isMobileSubMenuOpen"
                            @click.away="isMobileSubMenuOpen = false"
                            class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden"
                            aria-label="Secondary"
                        >
                            <div class="space-x-2">
                                <!-- Toggle dark theme button -->
                                <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                                    <div
                                        class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter"
                                    ></div>
                                    <div
                                        class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 transform scale-110 rounded-full shadow-sm"
                                        :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }"
                                    >
                                        <svg
                                            x-show="!isDark"
                                            class="w-4 h-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                                            />
                                        </svg>
                                        <svg
                                            x-show="isDark"
                                            class="w-4 h-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                            />
                                        </svg>
                                    </div>
                                </button>

                                <!-- Notification button -->
                                <button
                                    @click="openNotificationsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })"
                                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                                >
                                    <span class="sr-only">Open notifications panel</span>
                                    <svg
                                        class="w-7 h-7"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                        />
                                    </svg>
                                </button>

                                <!-- Search button -->
                                <button
                                    @click="openSearchPanel(); $nextTick(() => { $refs.searchInput.focus(); setTimeout(() => {isMobileSubMenuOpen= false}, 100) })"
                                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                                >
                                    <span class="sr-only">Open search panel</span>
                                    <svg
                                        class="w-7 h-7"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                        />
                                    </svg>
                                </button>

                                <!-- Settings button -->
                                <button
                                    @click="openSettingsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })"
                                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                                >
                                    <span class="sr-only">Open settings panel</span>
                                    <svg
                                        class="w-7 h-7"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                    </svg>
                                </button>
                            </div>

                            <!-- User avatar button -->
                            <div class="relative ml-auto" x-data="{ open: false }">
                                <button
                                    @click="open = !open"
                                    type="button"
                                    aria-haspopup="true"
                                    :aria-expanded="open ? 'true' : 'false'"
                                    class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100"
                                >
                                    <span class="sr-only">User menu</span>
                                    <img class="w-10 h-10 rounded-full" src="{{asset('build/images/admin.png')}}" alt="Ahmed Kamel" />
                                </button>

                                <!-- User dropdown menu -->
                                <div
                                    x-show="open"
                                    x-transition:enter="transition-all transform ease-out"
                                    x-transition:enter-start="translate-y-1/2 opacity-0"
                                    x-transition:enter-end="translate-y-0 opacity-100"
                                    x-transition:leave="transition-all transform ease-in"
                                    x-transition:leave-start="translate-y-0 opacity-100"
                                    x-transition:leave-end="translate-y-1/2 opacity-0"
                                    @click.away="open = false"
                                    class="absolute right-0 w-48 py-1 origin-top-right bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark"
                                    role="menu"
                                    aria-orientation="vertical"
                                    aria-label="User menu"
                                >
                                    <a
                                        href="#"
                                        role="menuitem"
                                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                                    >
                                        Your Profile
                                    </a>
                                    <a
                                        href="#"
                                        role="menuitem"
                                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                                    >
                                        Settings
                                    </a>
                                    <a
                                        href="#"
                                        role="menuitem"
                                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                                    >
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile main manu -->
                    <div
                        class="border-b md:hidden dark:border-primary-darker"
                        x-show="isMobileMainMenuOpen"
                        @click.away="isMobileMainMenuOpen = false"
                    >
                        <nav aria-label="Main" class="px-2 py-4 space-y-2">
                            <!-- Dashboards links -->
                            <div x-data="{ isActive: true, open: true}">
                                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                <a
                                    href="#"
                                    @click="$event.preventDefault(); open = !open"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
                                    role="button"
                                    aria-haspopup="true"
                                    :aria-expanded="(open || isActive) ? 'true' : 'false'"
                                >
                        <span aria-hidden="true">
                          <svg
                              class="w-5 h-5"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                            />
                          </svg>
                        </span>
                        <span class="ml-2 text-sm"> Dashboards </span>
                           <span class="ml-auto" aria-hidden="true">
                          <!-- active class 'rotate-180' -->
                          <svg
                              class="w-4 h-4 transition-transform transform"
                              :class="{ 'rotate-180': open }"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg>
                        </span>

                            <!-- Components links -->
                            <div x-data="{ isActive: false, open: false }">
                                <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                                <a
                                    href="#"
                                    @click="$event.preventDefault(); open = !open"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
                                    role="button"
                                    aria-haspopup="true"
                                    :aria-expanded="(open || isActive) ? 'true' : 'false'"
                                >
                        <span aria-hidden="true">
                          <svg
                              class="w-5 h-5"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                            />
                          </svg>
                        </span>
                                    <span class="ml-2 text-sm"> Components </span>
                                    <span aria-hidden="true" class="ml-auto">
                          <!-- active class 'rotate-180' -->
                          <svg
                              class="w-4 h-4 transition-transform transform"
                              :class="{ 'rotate-180': open }"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg>
                        </span>
                                </a>
                                <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Categories">
                                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                    <a
                                        href="#"
                                        role="menuitem"
                                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                    >
                                        Category
                                    </a>
                                    <a
                                        href="#"
                                        role="menuitem"
                                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                    >
                                        Sub Category
                                    </a>
                                </div>
                            </div>

                            <!-- Pages links -->
                            <div x-data="{ isActive: false, open: false }">
                                <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                                <a
                                    href="#"
                                    @click="$event.preventDefault(); open = !open"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
                                    role="button"
                                    aria-haspopup="true"
                                    :aria-expanded="(open || isActive) ? 'true' : 'false'"
                                >
                        <span aria-hidden="true">
                          <svg
                              class="w-5 h-5"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                            />
                          </svg>
                        </span>
                                    <span class="ml-2 text-sm"> Pages </span>
                                    <span aria-hidden="true" class="ml-auto">
                          <!-- active class 'rotate-180' -->
                          <svg
                              class="w-4 h-4 transition-transform transform"
                              :class="{ 'rotate-180': open }"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg>
                        </span>
                                </a>
                                <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Pages">
                                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                    <a
                                        href="pages/blank.html"
                                        role="menuitem"
                                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                    >
                                        Blank
                                    </a>
                                </div>
                            </div>

                            <!-- Authentication links -->
                            <div x-data="{ isActive: false, open: false}">
                                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                <a
                                    href="#"
                                    @click="$event.preventDefault(); open = !open"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
                                    role="button"
                                    aria-haspopup="true"
                                    :aria-expanded="(open || isActive) ? 'true' : 'false'"
                                >
                        <span aria-hidden="true">
                          <svg
                              class="w-5 h-5"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            />
                          </svg>
                        </span>
                                    <span class="ml-2 text-sm"> Authentication </span>
                                    <span aria-hidden="true" class="ml-auto">
                          <!-- active class 'rotate-180' -->
                          <svg
                              class="w-4 h-4 transition-transform transform"
                              :class="{ 'rotate-180': open }"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg>
                        </span>
                                </a>
                                <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
                                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                    <a
                                        href="auth/register.html"
                                        role="menuitem"
                                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                    >
                                        Register
                                    </a>
                                    <a
                                        href="auth/login.html"
                                        role="menuitem"
                                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                    >
                                        Login
                                    </a>
                                    <a
                                        href="auth/forgot-password.html"
                                        role="menuitem"
                                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                    >
                                        Forgot Password
                                    </a>
                                    <a
                                        href="auth/reset-password.html"
                                        role="menuitem"
                                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                                    >
                                        Reset Password
                                    </a>
                                </div>
                            </div>

                            <!-- Layouts links -->
                            <div x-data="{ isActive: false, open: false}">
                                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                <a
                                    href="#"
                                    @click="$event.preventDefault(); open = !open"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
                                    role="button"
                                    aria-haspopup="true"
                                    :aria-expanded="(open || isActive) ? 'true' : 'false'"
                                >
                        <span aria-hidden="true">
                          <svg
                              class="w-5 h-5"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                            />
                          </svg>
                        </span>
                                    <span class="ml-2 text-sm"> Layouts </span>
                                    <span aria-hidden="true" class="ml-auto">
                          <!-- active class 'rotate-180' -->
                          <svg
                              class="w-4 h-4 transition-transform transform"
                              :class="{ 'rotate-180': open }"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg>
                        </span>
                                </a>
                                <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Layouts">
                                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                    <a
                                        href="layouts/two-columns-sidebar.html"
                                        role="menuitem"
                                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                    >
                                        Two Columns Sidebar
                                    </a>
                                    <a
                                        href="layouts/mini-plus-one-columns-sidebar.html"
                                        role="menuitem"
                                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                    >
                                        Mini + One Columns Sidebar
                                    </a>
                                    <a
                                        href="layouts/mini-column-sidebar.html"
                                        role="menuitem"
                                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                    >
                                        Mini Column Sidebar
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </header>

                <!-- Main content -->
                <main>
                    @yield('content')
                </main>

                <!-- Main footer -->
                <footer
                    class="flex items-center justify-between p-4 bg-white border-t dark:bg-darker dark:border-primary-darker"
                >
                    <div>LARAVEL-TEAM &copy; 2024</div>
                    <div>
                        Made by
                        <a href="{{route('dashboard')}}" target="_blank" class="text-blue-500 hover:underline"
                        >TPP-LARAVEL-TEAM</a
                        >
                    </div>
                </footer>
            </div>

            <!-- Panels -->

            <!-- Settings Panel -->
            <!-- Backdrop -->
            <div
                x-transition:enter="transition duration-300 ease-in-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition duration-300 ease-in-out"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                x-show="isSettingsPanelOpen"
                @click="isSettingsPanelOpen = false"
                class="fixed inset-0 z-10 bg-primary-darker"
                style="opacity: 0.5"
                aria-hidden="true"
            ></div>
            <!-- Panel -->
            <section
                x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                x-ref="settingsPanel"
                tabindex="-1"
                x-show="isSettingsPanelOpen"
                @keydown.escape="isSettingsPanelOpen = false"
                class="fixed inset-y-0 right-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
                aria-labelledby="settinsPanelLabel"
            >
                <div class="absolute left-0 p-2 transform -translate-x-full">
                    <!-- Close button -->
                    <button
                        @click="isSettingsPanelOpen = false"
                        class="p-2 text-white rounded-md focus:outline-none focus:ring"
                    >
                        <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!-- Panel content -->
                <div class="flex flex-col h-screen">
                    <!-- Panel header -->
                    <div
                        class="flex flex-col items-center justify-center flex-shrink-0 px-4 py-8 space-y-4 border-b dark:border-primary-dark"
                    >
                  <span aria-hidden="true" class="text-gray-500 dark:text-primary">
                    <svg
                        class="w-8 h-8"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                      />
                    </svg>
                  </span>
                        <h2 id="settinsPanelLabel" class="text-xl font-medium text-gray-500 dark:text-light">Settings</h2>
                    </div>
                    <!-- Content -->
                    <div class="flex-1 overflow-hidden hover:overflow-y-auto">
                        <!-- Theme -->
                        <div class="p-4 space-y-4 md:p-8">
                            <h6 class="text-lg font-medium text-gray-400 dark:text-light">Mode</h6>
                            <div class="flex items-center space-x-8">
                                <!-- Light button -->
                                <button
                                    @click="setLightTheme"
                                    class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-primary dark:hover:text-primary-100 dark:hover:border-primary-light focus:outline-none focus:ring focus:ring-primary-lighter focus:ring-offset-2 dark:focus:ring-offset-dark dark:focus:ring-primary-dark"
                                    :class="{ 'border-gray-900 text-gray-900 dark:border-primary-light dark:text-primary-100': !isDark, 'text-gray-500 dark:text-primary-light': isDark }"
                                >
                        <span>
                          <svg
                              class="w-6 h-6"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                            />
                          </svg>
                        </span>
                                    <span>Light</span>
                                </button>

                                <!-- Dark button -->
                                <button
                                    @click="setDarkTheme"
                                    class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-primary dark:hover:text-primary-100 dark:hover:border-primary-light focus:outline-none focus:ring focus:ring-primary-lighter focus:ring-offset-2 dark:focus:ring-offset-dark dark:focus:ring-primary-dark"
                                    :class="{ 'border-gray-900 text-gray-900 dark:border-primary-light dark:text-primary-100': isDark, 'text-gray-500 dark:text-primary-light': !isDark }"
                                >
                        <span>
                          <svg
                              class="w-6 h-6"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                            />
                          </svg>
                        </span>
                                    <span>Dark</span>
                                </button>
                            </div>
                        </div>

                        <!-- Colors -->
                        <div class="p-4 space-y-4 md:p-8">
                            <h6 class="text-lg font-medium text-gray-400 dark:text-light">Colors</h6>
                            <div>
                                <button
                                    @click="setColors('cyan')"
                                    class="w-10 h-10 rounded-full"
                                    style="background-color: var(--color-cyan)"
                                ></button>
                                <button
                                    @click="setColors('teal')"
                                    class="w-10 h-10 rounded-full"
                                    style="background-color: var(--color-teal)"
                                ></button>
                                <button
                                    @click="setColors('green')"
                                    class="w-10 h-10 rounded-full"
                                    style="background-color: var(--color-green)"
                                ></button>
                                <button
                                    @click="setColors('fuchsia')"
                                    class="w-10 h-10 rounded-full"
                                    style="background-color: var(--color-fuchsia)"
                                ></button>
                                <button
                                    @click="setColors('blue')"
                                    class="w-10 h-10 rounded-full"
                                    style="background-color: var(--color-blue)"
                                ></button>
                                <button
                                    @click="setColors('violet')"
                                    class="w-10 h-10 rounded-full"
                                    style="background-color: var(--color-violet)"
                                ></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Notification panel -->
            <!-- Backdrop -->
            <div
                x-transition:enter="transition duration-300 ease-in-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition duration-300 ease-in-out"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                x-show="isNotificationsPanelOpen"
                @click="isNotificationsPanelOpen = false"
                class="fixed inset-0 z-10 bg-primary-darker"
                style="opacity: 0.5"
                aria-hidden="true"
            ></div>
            <!-- Panel -->
            <section
                x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                x-ref="notificationsPanel"
                x-show="isNotificationsPanelOpen"
                @keydown.escape="isNotificationsPanelOpen = false"
                tabindex="-1"
                aria-labelledby="notificationPanelLabel"
                class="fixed inset-y-0 z-20 w-full max-w-xs bg-white dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
            >
                <div class="absolute right-0 p-2 transform translate-x-full">
                    <!-- Close button -->
                    <button
                        @click="isNotificationsPanelOpen = false"
                        class="p-2 text-white rounded-md focus:outline-none focus:ring"
                    >
                        <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col h-screen" x-data="{ activeTabe: 'action' }">
                    <!-- Panel header -->
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-between px-4 pt-4 border-b dark:border-primary-darker">
                            <h2 id="notificationPanelLabel" class="pb-4 font-semibold">Notifications</h2>
                            <div class="space-x-2">
                                <button
                                    @click.prevent="activeTabe = 'action'"
                                    class="px-px pb-4 transition-all duration-200 transform translate-y-px border-b focus:outline-none"
                                    :class="{'border-primary-dark dark:border-primary': activeTabe == 'action', 'border-transparent': activeTabe != 'action'}"
                                >
                                    Action
                                </button>
                                <button
                                    @click.prevent="activeTabe = 'user'"
                                    class="px-px pb-4 transition-all duration-200 transform translate-y-px border-b focus:outline-none"
                                    :class="{'border-primary-dark dark:border-primary': activeTabe == 'user', 'border-transparent': activeTabe != 'user'}"
                                >
                                    User
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Panel content (tabs) -->
                    <div class="flex-1 pt-4 overflow-y-hidden hover:overflow-y-auto">
                        <!-- Action tab -->
                        <div class="space-y-4" x-show.transition.in="activeTabe == 'action'">
                            <a href="#" class="block">
                                <div class="flex px-4 space-x-4">
                                    <div class="relative flex-shrink-0">
                          <span
                              class="z-10 inline-block p-2 overflow-visible rounded-full bg-primary-50 text-primary-light dark:bg-primary-darker"
                          >
                            <svg
                                class="w-7 h-7"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                              />
                            </svg>
                          </span>
                                        <div class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                                            New project created
                                        </h5>
                                        <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                            Looks like there might be a new theme soon
                                        </p>
                                        <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 9h ago </span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block">
                                <div class="flex px-4 space-x-4">
                                    <div class="relative flex-shrink-0">
                          <span
                              class="inline-block p-2 overflow-visible rounded-full bg-primary-50 text-primary-light dark:bg-primary-darker"
                          >
                            <svg
                                class="w-7 h-7"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                              />
                            </svg>
                          </span>
                                        <div class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                                             Example
                                        </h5>
                                        <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                            Successful new version was released
                                        </p>
                                        <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 2d ago </span>
                                    </div>
                                </div>
                            </a>
                            <template x-for="i in 20" x-key="i">
                                <a href="#" class="block">
                                    <div class="flex px-4 space-x-4">
                                        <div class="relative flex-shrink-0">
                            <span
                                class="inline-block p-2 overflow-visible rounded-full bg-primary-50 text-primary-light dark:bg-primary-darker"
                            >
                              <svg
                                  class="w-7 h-7"
                                  xmlns="http://www.w3.org/2000/svg"
                                  fill="none"
                                  viewBox="0 0 24 24"
                                  stroke="currentColor"
                              >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                />
                              </svg>
                            </span>
                                            <div
                                                class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"
                                            ></div>
                                        </div>
                                        <div class="flex-1 overflow-hidden">
                                            <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                                                New project created
                                            </h5>
                                            <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                                Looks like there might be a new theme soon
                                            </p>
                                            <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 9h ago </span>
                                        </div>
                                    </div>
                                </a>
                            </template>
                        </div>

                        <!-- User tab -->
                        <div class="space-y-4" x-show.transition.in="activeTabe == 'user'">
                            <a href="#" class="block">
                                <div class="flex px-4 space-x-4">
                                    <div class="relative flex-shrink-0">
                          <span class="relative z-10 inline-block overflow-visible rounded-ful">
                            <img
                                class="object-cover rounded-full w-9 h-9"
                                src="{{asset('build/images/admin.png')}}"
                                alt="admin"
                            />
                          </span>
                                        <div class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h5>
                                        <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                            Shared new project
                                        </p>
                                        <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 1d ago </span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block">
                                <div class="flex px-4 space-x-4">
                                    <div class="relative flex-shrink-0">
                          <span class="relative z-10 inline-block overflow-visible rounded-ful">
                            <img
                                class="object-cover rounded-full w-9 h-9"
                                src="{{asset('build/images/admin.png')}}"
                                alt="Ahmed kamel"
                            />
                          </span>
                                        <div class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h5>
                                        <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                            Shared new project
                                        </p>
                                        <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 1d ago </span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block">
                                <div class="flex px-4 space-x-4">
                                    <div class="relative flex-shrink-0">
                          <span class="relative z-10 inline-block overflow-visible rounded-ful">
                            <img
                                class="object-cover rounded-full w-9 h-9"
                                src="{{asset('build/images/admin.png')}}"
                                alt="Ahmed kamel"
                            />
                          </span>
                                        <div class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h5>
                                        <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                            Shared new project
                                        </p>
                                        <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 1d ago </span>
                                    </div>
                                </div>
                            </a>
                            <template x-for="i in 10" x-key="i">
                                <a href="#" class="block">
                                    <div class="flex px-4 space-x-4">
                                        <div class="relative flex-shrink-0">
                          <span class="relative z-10 inline-block overflow-visible rounded-ful">
                            <img
                                class="object-cover rounded-full w-9 h-9"
                                src="{{asset('build/images/admin.png')}}"
                                alt="Ahmed kamel"
                            />
                          </span>
                                            <div class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                                        </div>
                                        <div class="flex-1 overflow-hidden">
                                            <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h5>
                                            <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                                Shared new project
                                            </p>
                                            <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 1d ago </span>
                                        </div>
                                    </div>
                                </a>
                            </template>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Search panel -->
            <!-- Backdrop -->
            <div
                x-transition:enter="transition duration-300 ease-in-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition duration-300 ease-in-out"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                x-show="isSearchPanelOpen"
                @click="isSearchPanelOpen = false"
                class="fixed inset-0 z-10 bg-primary-darker"
                style="opacity: 0.5"
                aria-hidden="ture"
            ></div>
            <!-- Panel -->
            <section
                x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                x-show="isSearchPanelOpen"
                @keydown.escape="isSearchPanelOpen = false"
                class="fixed inset-y-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
            >
                <div class="absolute right-0 p-2 transform translate-x-full">
                    <!-- Close button -->
                    <button @click="isSearchPanelOpen = false" class="p-2 text-white rounded-md focus:outline-none focus:ring">
                        <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <h2 class="sr-only">Search panel</h2>
                <!-- Panel content -->
                <div class="flex flex-col h-screen">
                    <!-- Panel header (Search input) -->
                    <div
                        class="relative flex-shrink-0 px-4 py-8 text-gray-400 border-b dark:border-primary-darker dark:focus-within:text-light focus-within:text-gray-700"
                    >
                  <span class="absolute inset-y-0 inline-flex items-center px-4">
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                      />
                    </svg>
                  </span>
                        <input
                            x-ref="searchInput"
                            type="text"
                            class="w-full py-2 pl-10 pr-4 border rounded-full dark:bg-dark dark:border-transparent dark:text-light focus:outline-none focus:ring"
                            placeholder="Search..."
                        />
                    </div>

                    <!-- Panel content (Search result) -->
                    <div class="flex-1 px-4 pb-4 space-y-4 overflow-y-hidden h hover:overflow-y-auto">
                        <h3 class="py-2 text-sm font-semibold text-gray-600 dark:text-light">History</h3>
                        <a href="#" class="flex space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-lg" src="build/images/cover.jpg" alt="Post cover" />
                            </div>
                            <div class="flex-1 max-w-xs overflow-hidden">
                                <h4 class="text-sm font-semibold text-gray-600 dark:text-light">Header</h4>
                                <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                    Lorem ipsum dolor, sit amet consectetur.
                                </p>
                                <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> Post </span>
                            </div>
                        </a>
                        <a href="#" class="flex space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-lg" src="build/images/avatar.jpg" alt="Ahmed Kamel" />
                            </div>
                            <div class="flex-1 max-w-xs overflow-hidden">
                                <h4 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h4>
                                <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                    Last activity 3h ago.
                                </p>
                                <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> Offline </span>
                            </div>
                        </a>
                        <a href="#" class="flex space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-lg" src="build/images/cover-2.jpg" alt="K-WD Dashboard" />
                            </div>
                            <div class="flex-1 max-w-xs overflow-hidden">
                                <h4 class="text-sm font-semibold text-gray-600 dark:text-light">K-WD Dashboard</h4>
                                <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                </p>
                                <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> Updated 3h ago. </span>
                            </div>
                        </a>
                        <template x-for="i in 10" x-key="i">
                            <a href="#" class="flex space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="w-10 h-10 rounded-lg" src="build/images/cover-3.jpg" alt="K-WD Dashboard" />
                                </div>
                                <div class="flex-1 max-w-xs overflow-hidden">
                                    <h4 class="text-sm font-semibold text-gray-600 dark:text-light">K-WD Dashboard</h4>
                                    <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    </p>
                                    <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> Updated 3h ago. </span>
                                </div>
                            </a>
                        </template>
                    </div>
                </div>
            </section>
        </div>
    </div>

<!-- All javascript code in this project for now is just for demo DON'T RELY ON IT  -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
<script src="{{asset('build/js/script.js')}}"></script>
{{--<script src="{{asset('build/js/bootstrap.bundle.min.js')}}"></script>--}}
<script>
    const setup = () => {
        const getTheme = () => {
            if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'))
            }

            return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        const setTheme = (value) => {
            window.localStorage.setItem('dark', value)
        }

        const getColor = () => {
            if (window.localStorage.getItem('color')) {
                return window.localStorage.getItem('color')
            }
            return 'cyan'
        }

        const setColors = (color) => {
            const root = document.documentElement
            root.style.setProperty('--color-primary', `var(--color-${color})`)
            root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
            root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
            root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
            root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
            root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
            root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
            this.selectedColor = color
            window.localStorage.setItem('color', color)
            //
        }

        const updateBarChart = (on) => {
            const data = {
                data: randomData(),
                backgroundColor: '#F13223',
            }
            if (on) {
                barChart.data.datasets.push(data)
                barChart.update()
            } else {
                barChart.data.datasets.splice(1)
                barChart.update()
            }
        }

        const updateDoughnutChart = (on) => {
            const data = random()
            const color = '#F13223'
            if (on) {
                doughnutChart.data.labels.unshift('Seb')
                doughnutChart.data.datasets[0].data.unshift(data)
                doughnutChart.data.datasets[0].backgroundColor.unshift(color)
                doughnutChart.update()
            } else {
                doughnutChart.data.labels.splice(0, 1)
                doughnutChart.data.datasets[0].data.splice(0, 1)
                doughnutChart.data.datasets[0].backgroundColor.splice(0, 1)
                doughnutChart.update()
            }
        }

        const updateLineChart = () => {
            lineChart.data.datasets[0].data.reverse()
            lineChart.update()
        }

        return {
            loading: true,
            isDark: getTheme(),
            toggleTheme() {
                this.isDark = !this.isDark
                setTheme(this.isDark)
            },
            setLightTheme() {
                this.isDark = false
                setTheme(this.isDark)
            },
            setDarkTheme() {
                this.isDark = true
                setTheme(this.isDark)
            },
            color: getColor(),
            selectedColor: 'cyan',
            setColors,
            toggleSidbarMenu() {
                this.isSidebarOpen = !this.isSidebarOpen
            },
            isSettingsPanelOpen: false,
            openSettingsPanel() {
                this.isSettingsPanelOpen = true
                this.$nextTick(() => {
                    this.$refs.settingsPanel.focus()
                })
            },
            isNotificationsPanelOpen: false,
            openNotificationsPanel() {
                this.isNotificationsPanelOpen = true
                this.$nextTick(() => {
                    this.$refs.notificationsPanel.focus()
                })
            },
            isSearchPanelOpen: false,
            openSearchPanel() {
                this.isSearchPanelOpen = true
                this.$nextTick(() => {
                    this.$refs.searchInput.focus()
                })
            },
            isMobileSubMenuOpen: false,
            openMobileSubMenu() {
                this.isMobileSubMenuOpen = true
                this.$nextTick(() => {
                    this.$refs.mobileSubMenu.focus()
                })
            },
            isMobileMainMenuOpen: false,
            openMobileMainMenu() {
                this.isMobileMainMenuOpen = true
                this.$nextTick(() => {
                    this.$refs.mobileMainMenu.focus()
                })
            },
            updateBarChart,
            updateDoughnutChart,
            updateLineChart,
        }
    }
</script>
</body>
</html>
