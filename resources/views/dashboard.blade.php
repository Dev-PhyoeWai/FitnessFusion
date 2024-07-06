@extends('layouts.master')

@section('title','Dashboard')
@section('content')
    <!-- Content -->
    <div class="mt-2">
        <!-- State cards -->
        <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
            <!-- Value card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                        Value
                    </h6>
                    <span class="text-xl font-semibold">$3000</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                          +4.4%
                        </span>
                </div>
                <div>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="2.3em" viewBox="0 0 24 24">
                              <path fill="currentColor" fill-rule="evenodd" d="m16.137 4.728l1.83 1.83C20.656 9.248 22 10.592 22 12.262c0 1.671-1.344 3.015-4.033 5.704c-2.69 2.69-4.034 4.034-5.705 4.034c-1.67 0-3.015-1.344-5.704-4.033l-1.83-1.83c-1.545-1.546-2.318-2.318-2.605-3.321c-.288-1.003-.042-2.068.45-4.197l.283-1.228c.413-1.792.62-2.688 1.233-3.302c.614-.613 1.51-.82 3.302-1.233l1.228-.284c2.13-.491 3.194-.737 4.197-.45c1.003.288 1.775 1.061 3.32 2.606m-4.99 9.6c-.673-.672-.668-1.638-.265-2.403a.75.75 0 0 1 1.04-1.046c.34-.18.713-.276 1.085-.272a.75.75 0 0 1-.014 1.5a.88.88 0 0 0-.609.277c-.387.387-.286.775-.177.884c.11.109.497.21.884-.177c.784-.784 2.138-1.044 3.005-.177c.673.673.668 1.639.265 2.404a.75.75 0 0 1-1.04 1.045a2.201 2.201 0 0 1-1.472.232a.75.75 0 1 1 .302-1.47c.177.037.463-.021.708-.266c.387-.388.286-.775.177-.884c-.11-.109-.497-.21-.884.177c-.784.784-2.138 1.044-3.005.176m-1.126-4.035a2 2 0 1 0-2.829-2.828a2 2 0 0 0 2.829 2.828" clip-rule="evenodd"/>
                          </svg>
                        </span>
                </div>
            </div>

            <!-- Users card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                        Users
                    </h6>
                    <span class="text-xl font-semibold">50</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                          +2.6%
                        </span>
                </div>
                <div>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="1.5em" viewBox="0 0 1920 1792"><path fill="currentColor" d="M593 896q-162 5-265 128H194q-82 0-138-40.5T0 865q0-353 124-353q6 0 43.5 21t97.5 42.5T384 597q67 0 133-23q-5 37-5 66q0 139 81 256m1071 637q0 120-73 189.5t-194 69.5H523q-121 0-194-69.5T256 1533q0-53 3.5-103.5t14-109T300 1212t43-97.5t62-81t85.5-53.5T602 960q10 0 43 21.5t73 48t107 48t135 21.5t135-21.5t107-48t73-48t43-21.5q61 0 111.5 20t85.5 53.5t62 81t43 97.5t26.5 108.5t14 109t3.5 103.5M640 256q0 106-75 181t-181 75t-181-75t-75-181t75-181T384 0t181 75t75 181m704 384q0 159-112.5 271.5T960 1024T688.5 911.5T576 640t112.5-271.5T960 256t271.5 112.5T1344 640m576 225q0 78-56 118.5t-138 40.5h-134q-103-123-265-128q81-117 81-256q0-29-5-66q66 23 133 23q59 0 119-21.5t97.5-42.5t43.5-21q124 0 124 353m-128-609q0 106-75 181t-181 75t-181-75t-75-181t75-181t181-75t181 75t75 181"/>
                          </svg>
                        </span>
                </div>
            </div>

            <!-- Orders card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                        Orders
                    </h6>
                    <span class="text-xl font-semibold">230</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                          +3.1%
                        </span>
                </div>
                <div>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="2.5em" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M21.92 6.62a1 1 0 0 0-.54-.54A1 1 0 0 0 21 6h-5a1 1 0 0 0 0 2h2.59L13 13.59l-3.29-3.3a1 1 0 0 0-1.42 0l-6 6a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L9 12.41l3.29 3.3a1 1 0 0 0 1.42 0L20 9.41V12a1 1 0 0 0 2 0V7a1 1 0 0 0-.08-.38"/>
                          </svg>
                        </span>
                </div>
            </div>

            <!-- Tickets card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                        Tickets
                    </h6>
                    <span class="text-xl font-semibold">200</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                          +3.1%
                        </span>
                </div>
                <div>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="2.5em" viewBox="0 0 1024 1024">
                              <path fill="currentColor" d="M640 832H64V640a128 128 0 1 0 0-256V192h576v160h64V192h256v192a128 128 0 1 0 0 256v192H704V672h-64zm0-416v192h64V416z"/>
                          </svg>
                        </span>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
            <!-- Bar chart card -->
            <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                <!-- Card header -->
                <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Bar Chart</h4>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500 dark:text-light">Last year</span>
                        <button
                            class="relative focus:outline-none"
                            x-cloak
                            @click="isOn = !isOn; $parent.updateBarChart(isOn)"
                        >
                            <div
                                class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"
                            ></div>
                            <div
                                class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                                :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"
                            ></div>
                        </button>
                    </div>
                </div>
                <!-- Chart -->
                <div class="relative p-4 h-72">
                    <canvas id="barChart"></canvas>
                </div>
            </div>

            <!-- Doughnut chart card -->
            <div class="bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                <!-- Card header -->
                <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Doughnut Chart</h4>
                    <div class="flex items-center">
                        <button
                            class="relative focus:outline-none"
                            x-cloak
                            @click="isOn = !isOn; $parent.updateDoughnutChart(isOn)"
                        >
                            <div
                                class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"
                            ></div>
                            <div
                                class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                                :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"
                            ></div>
                        </button>
                    </div>
                </div>
                <!-- Chart -->
                <div class="relative p-4 h-72">
                    <canvas id="doughnutChart"></canvas>
                </div>
            </div>
        </div>

    </div>
@endsection()



