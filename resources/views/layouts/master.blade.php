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
    <link rel="stylesheet" href="{{asset('build/css/datatable.css')}}" />

    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

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
                                    href="{{route('dashboard')}}"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700"
                                >
                                    Default
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
                                    href="{{route('users.index')}}"
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#555" d="M6 19h5v4l-2.5-1.5L6 23zM20 1h-8v22l2.5-1.5L17 23v-2h3a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2m-6 4h2v2h-2Zm0 5h2v2h-2Zm0 5h2v2h-2ZM4 1a2.006 2.006 0 0 0-2 2v16a2.006 2.006 0 0 0 2 2V3h7V1Z"/>
                            <path fill="#555" d="M6 5h2v2H6zm0 5h2v2H6zm0 5h2v2H6z"/>
                        </svg>
                      </span>
                                <span class="ml-2 text-sm"> Subscription </span>
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
                                    href="{{route('subscription-types.index')}}"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Subscription Type
                                </a>
                                <a
                                    href="{{route('weight-types.index')}}"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Weight Type
                                </a>
                                <a
                                    href="{{route('sub-weights.index')}}"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Subscription Weight
                                </a>
                            </div>
                        </div>

                        <!-- Brands links -->
                        <div x-data="{ isActive: false, open: false }">
                            <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                            <a
                                href="{{route('meal_plans.index')}}"
                                @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
                                role="button"
                                aria-haspopup="true"
                                :aria-expanded="(open || isActive) ? 'true' : 'false'"
                            >
                              <span aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.7em" viewBox="0 0 24 24">
                                    <path fill="#555" d="m5.44 7.96l.52-.53c.58-.58 1.54-.58 2.14.04l.02.03c.49.5 1.14.74 1.85.81c.97.09 1.91.61 2.53 1.55c.68 1.08.67 2.52-.04 3.59a3.322 3.322 0 0 1-5.18.55c-.56-.55-.88-1.26-.96-2c-.08-.73-.37-1.42-.88-1.93c-.58-.57-.58-1.53 0-2.11M9.64 16c-1.17 0-2.26-.45-3.07-1.28c-.7-.72-1.14-1.62-1.25-2.6c-.03-.3-.12-.69-.36-1.05C4.36 11.9 4 12.9 4 14c0 1.64.8 3.09 2.03 4H19v-1c0-3.6-2.39-6.65-5.66-7.65c.89 1.4.87 3.27-.04 4.65c-.8 1.25-2.18 2-3.66 2m5.14-8.44h1.27c.87 0 1.63.61 1.63 1.7V10h1.25V9c0-1.5-1.33-2.64-2.88-2.64h-1.27c-.83 0-1.54-.82-1.54-1.66s.71-1.46 1.54-1.46V2C13.24 2 12 3.24 12 4.78s1.24 2.78 2.78 2.78M4.5 7.55c.06-.1.14-.2.23-.3l.52-.52c.09-.09.19-.16.29-.23L4.13 5.07c.14-.27.09-.62-.13-.85a.767.767 0 0 0-1.07 0c-.14.14-.21.31-.22.49c-.18.01-.35.08-.49.22c-.29.29-.29.77 0 1.07c.23.22.57.27.85.13zm13.89-3.16c.51-.51.83-1.2.83-1.97h-1.25c0 .83-.7 1.53-1.53 1.53v1.24c1.86 0 3.32 1.52 3.32 3.38V11H21V8.57a4.61 4.61 0 0 0-2.61-4.18M5 21h14c1.11 0 2-.89 2-2H3a2 2 0 0 0 2 2"/>
                                </svg>
                              </span>
                                 <span class="ml-2 text-sm">Meal Plan </span>
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
                                    href="{{route('meal_plans.index')}}"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Details
                                </a>
                        </span>
                      </a>
                        </div>

                        <!-- Products links -->
                        <div x-data="{ isActive: false, open: false }">
                            <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                            <a
                                href="{{route('workout_plans.index')}}"
                                @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
                                role="button"
                                aria-haspopup="true"
                                :aria-expanded="(open || isActive) ? 'true' : 'false'"
                            >
                      <span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.5em" viewBox="0 0 48 48"><g fill="none">
                                <path d="M0 0h48v48H0z"/><path fill="#555" fill-rule="evenodd" d="M9 6a3 3 0 0 0-3 3v30a3 3 0 0 0 3 3h30a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3zm23 10h-3v16h3zm2 3h3v4h1v2h-1v4h-3zM16 32h3V16h-3zm-2-3h-3v-4h-1v-2h1v-4h3zm7-4h6v-2h-6z" clip-rule="evenodd"/>
                            </g>
                        </svg>
                      </span>
                                <span class="ml-2 text-sm"> Workout </span>
                                <span aria-hidden="true" class="ml-auto">
                        <!-- active class 'rotate-180' -->
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
                                    href="{{route('workout_plans.index')}}"
                                    role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                                >
                                    Details
                                </a>
                      </span>
                            </a>
                        </div>
                        <!-- Discounts links -->

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
                          <svg xmlns="http://www.w3.org/2000/svg" width="1.8em" height="1.4em" viewBox="0 0 512 512">
                              <path fill="#ffff" d="M170.322 349.808c-2.4-15.66-9-28.38-25.02-34.531c-6.27-2.4-11.7-6.78-17.88-9.54c-7.02-3.15-14.16-6.15-21.57-8.1c-5.61-1.5-10.83 1.02-14.16 5.94c-3.15 4.62-.87 8.97 1.77 12.84c2.97 4.35 6.27 8.49 9.6 12.57c5.52 6.78 11.37 13.29 16.74 20.161c5.13 6.57 9.51 13.86 8.76 22.56c-1.65 19.08-10.29 34.891-24.21 47.76c-1.53 1.38-4.23 2.37-6.21 2.19c-8.88-.96-16.95-4.32-23.46-10.53c-7.47-7.11-6.33-15.48 2.61-20.67c2.13-1.23 4.35-2.37 6.3-3.87c5.46-4.11 7.29-11.13 4.32-17.22c-1.41-2.94-3-6.12-5.34-8.25c-11.43-10.41-22.651-21.151-34.891-30.63C18.01 307.447 2.771 276.968.43 240.067c-2.64-40.981 6.87-79.231 28.5-114.242c8.19-13.29 17.73-25.951 32.37-32.52c9.96-4.47 20.88-6.99 31.531-9.78c29.311-7.71 58.89-13.5 89.401-8.34c26.28 4.41 45.511 17.94 54.331 43.77c5.79 16.89 7.17 34.35 5.37 52.231c-3.54 35.131-29.49 66.541-63.331 75.841c-14.67 4.02-22.68 1.77-31.5-10.44c-6.33-8.79-11.58-18.36-17.25-27.631c-.84-1.38-1.44-2.97-2.16-4.44c-.69-1.47-1.44-2.88-2.16-4.35c2.13 15.24 5.67 29.911 13.98 42.99c4.5 7.11 10.5 12.36 19.29 13.14c32.34 2.91 59.641-7.71 79.021-33.721c21.69-29.101 26.461-62.581 20.19-97.831c-1.23-6.96-3.3-13.77-4.77-20.7c-.99-4.47.78-7.77 5.19-9.33c2.04-.69 4.14-1.26 6.18-1.68c26.461-5.7 53.221-7.59 80.191-4.86c30.601 3.06 59.551 11.46 85.441 28.471c40.531 26.67 65.641 64.621 79.291 110.522c1.98 6.66 2.28 13.95 2.46 20.971c.12 4.68-2.88 5.91-6.45 2.97c-3.93-3.21-7.53-6.87-10.92-10.65c-3.15-3.57-5.67-7.65-8.73-11.4c-2.37-2.94-4.44-2.49-5.58 1.17c-.72 2.22-1.35 4.41-1.98 6.63c-7.08 25.26-18.24 48.3-36.33 67.711c-2.52 2.73-4.77 6.78-5.07 10.38c-.78 9.96-1.35 20.13-.39 30.06c1.98 21.331 5.07 42.57 7.47 63.871c1.35 12.03-2.52 19.11-13.83 23.281c-7.95 2.91-16.47 5.04-24.87 5.64c-13.38.93-26.88.27-40.32.27c-.36-15 .93-29.731-13.17-37.771c2.73-11.13 5.88-21.69 7.77-32.49c1.56-8.97.24-17.79-6.06-25.14c-5.91-6.93-13.32-8.82-20.101-4.86c-20.43 11.91-41.671 11.97-63.301 4.17c-9.93-3.6-16.86-1.56-22.351 7.5c-5.91 9.75-8.4 20.7-7.74 31.771c.84 13.95 3.27 27.75 5.13 41.64c1.02 7.77.15 9.78-7.56 11.76c-17.13 4.35-34.56 4.83-52.081 3.42c-.93-.09-1.86-.48-2.46-.63c-.87-14.55.66-29.671-16.68-37.411c7.68-16.29 6.63-33.18 3.99-50.07l-.06-.15zm-103.561-57.09c2.55-2.4 4.59-6.15 5.31-9.6c1.8-8.64-4.68-20.22-12.18-23.43c-3.99-1.74-7.47-1.11-10.29 2.07c-6.87 7.77-13.65 15.63-20.401 23.521c-1.14 1.35-2.16 2.94-2.97 4.53c-2.7 5.19-1.11 8.97 4.65 10.38c3.48.87 7.08 1.05 10.65 1.56c9.3-.9 18.3-2.46 25.23-9zm.78-86.371c-.03-6.18-5.19-11.34-11.28-11.37c-6.27-.03-11.67 5.58-11.46 11.76c.27 6.21 5.43 11.19 11.61 11.07c6.24-.09 11.22-5.19 11.16-11.43z"/>
                          </svg>
                    </span>
                            <span>TPP-PHP</span>
                        </button>
                    </div>
                </div>
            </aside>

            <div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
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
{{--                            <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">--}}
{{--                                <div--}}
{{--                                    class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter"--}}
{{--                                ></div>--}}
{{--                                <div--}}
{{--                                    class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm"--}}
{{--                                    :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }"--}}
{{--                                >--}}
{{--                                    <svg--}}
{{--                                        x-show="!isDark"--}}
{{--                                        class="w-4 h-4"--}}
{{--                                        xmlns="http://www.w3.org/2000/svg"--}}
{{--                                        fill="none"--}}
{{--                                        viewBox="0 0 24 24"--}}
{{--                                        stroke="currentColor"--}}
{{--                                    >--}}
{{--                                        <path--}}
{{--                                            stroke-linecap="round"--}}
{{--                                            stroke-linejoin="round"--}}
{{--                                            stroke-width="2"--}}
{{--                                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"--}}
{{--                                        />--}}
{{--                                    </svg>--}}
{{--                                    <svg--}}
{{--                                        x-show="isDark"--}}
{{--                                        class="w-4 h-4"--}}
{{--                                        xmlns="http://www.w3.org/2000/svg"--}}
{{--                                        fill="none"--}}
{{--                                        viewBox="0 0 24 24"--}}
{{--                                        stroke="currentColor"--}}
{{--                                    >--}}
{{--                                        <path--}}
{{--                                            stroke-linecap="round"--}}
{{--                                            stroke-linejoin="round"--}}
{{--                                            stroke-width="2"--}}
{{--                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"--}}
{{--                                        />--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </button>--}}

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
                                        <img class="mt-1 w-10 h-10 rounded-full" src="{{asset('build/images/admin-1.jpg')}}" alt="login-user" />
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
{{--                                <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">--}}
{{--                                    <div--}}
{{--                                        class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter"--}}
{{--                                    ></div>--}}
{{--                                    <div--}}
{{--                                        class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 transform scale-110 rounded-full shadow-sm"--}}
{{--                                        :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }"--}}
{{--                                    >--}}
{{--                                        <svg--}}
{{--                                            x-show="!isDark"--}}
{{--                                            class="w-4 h-4"--}}
{{--                                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                                            fill="none"--}}
{{--                                            viewBox="0 0 24 24"--}}
{{--                                            stroke="currentColor"--}}
{{--                                        >--}}
{{--                                            <path--}}
{{--                                                stroke-linecap="round"--}}
{{--                                                stroke-linejoin="round"--}}
{{--                                                stroke-width="2"--}}
{{--                                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"--}}
{{--                                            />--}}
{{--                                        </svg>--}}
{{--                                        <svg--}}
{{--                                            x-show="isDark"--}}
{{--                                            class="w-4 h-4"--}}
{{--                                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                                            fill="none"--}}
{{--                                            viewBox="0 0 24 24"--}}
{{--                                            stroke="currentColor"--}}
{{--                                        >--}}
{{--                                            <path--}}
{{--                                                stroke-linecap="round"--}}
{{--                                                stroke-linejoin="round"--}}
{{--                                                stroke-width="2"--}}
{{--                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"--}}
{{--                                            />--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                </button>--}}

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
                    class="flex items-center justify-between p-4 bg-white border-t
                     dark:bg-darker dark:border-primary-darker">
                    <div>LARAVEL-TEAM &copy; 2024</div>
                    <div>
                        Made by
                        <a href="https://github.com/taylorotwell" target="_blank" class="hover:underline"
                        style="color: #0e7490">TPP-LARAVEL-TEAM</a
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
                backgroundColor: '#015e98',
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
            const color = '#015e98'
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
            // toggleTheme() {
            //     this.isDark = !this.isDark
            //     setTheme(this.isDark)
            // },
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
