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
                        Weekly Progress
                    </h6>
                    <span class="text-xl font-semibold">55%</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                          +4.4%
                        </span>
                </div>
                <div>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2em" viewBox="0 0 512 512">
                              <path fill="#555" d="M463 20.3L315.6 75.65L368.5 109C274 228 137.3 301.3 21.8 329.2l32.72 59.6C184.3 346.5 321.7 270.2 410.2 135.4l40.3 25.4zm7.7 116.7l-4.8 54.8l-51.3-32.4c-1.8 2.7-3.7 5.3-5.6 8V487h78V137zM320.1 265c-12.7 11-25.8 21.4-39.1 31.2V487h78V265zm-123.7 84c-14.4 7.6-28.8 14.6-43.4 21.2V487h78V349zM25 393v94h78v-94h-5.68c-14.82 5.5-29.63 10.6-44.35 15.3l-7.06 2.2l-9.6-17.5z"/>
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
                        Members
                    </h6>
                    <span class="text-xl font-semibold">50</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                          +2.6%
                        </span>
                </div>
                <div>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2em" viewBox="0 0 20 20">
                              <path fill="#555" d="M15.989 19.129c0-2.246-2.187-3.389-4.317-4.307c-2.123-.914-2.801-1.684-2.801-3.334c0-.989.648-.667.932-2.481c.12-.752.692-.012.802-1.729c0-.684-.313-.854-.313-.854s.159-1.013.221-1.793c.064-.817-.398-2.56-2.301-3.095c-.332-.341-.557-.882.467-1.424c-2.24-.104-2.761 1.068-3.954 1.93c-1.015.756-1.289 1.953-1.24 2.59c.065.78.223 1.793.223 1.793s-.314.17-.314.854c.11 1.718.684.977.803 1.729c.284 1.814.933 1.492.933 2.481c0 1.65-.212 2.21-2.336 3.124C.663 15.53 0 17 .011 19.129C.014 19.766 0 20 0 20h16s-.011-.234-.011-.871m2.539-5.764c-1.135-.457-1.605-1.002-1.605-2.066c0-.641.418-.432.602-1.603c.077-.484.447-.008.518-1.115c0-.441-.202-.551-.202-.551s.103-.656.143-1.159c.05-.627-.364-2.247-2.268-2.247c-1.903 0-2.318 1.62-2.269 2.247c.042.502.144 1.159.144 1.159s-.202.109-.202.551c.071 1.107.441.631.518 1.115c.184 1.172.602.963.602 1.603c0 1.064-.438 1.562-1.809 2.152c-.069.029-.12.068-.183.102c1.64.712 4.226 1.941 4.838 4.447H20v-2.318c0-1-.273-1.834-1.472-2.317"/>
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
                        Calories Burn
                    </h6>
                    <span class="text-xl font-semibold">69 Cal</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                          +3.1%
                        </span>
                </div>
                <div>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2em" viewBox="0 0 512 512">
                              <path fill="#555" d="M235.094 17.844C60.934 66.176 249.458 163.35 184.72 198.22c-32.796 17.66-86.03 15.048-64.657-73.876c-106.688 86.723-75.665 284.316 48.093 349.5c-27.153-25.674-44.125-62.01-44.125-102.25c0-77.624 63.128-140.75 140.75-140.75c77.625 0 140.75 63.128 140.75 140.75c0 37.55-14.77 71.708-38.81 96.97c150.706-76.96 122.903-288.475 22.5-342.533c23.96 56.174 11.553 99.36-18.22 123.44C385.64 57.762 174.494 135.013 235.094 17.843zM264.78 249.53c-67.523 0-122.06 54.54-122.06 122.064s54.54 122.062 122.06 122.062c67.523 0 122.064-54.538 122.064-122.062c0-67.522-54.54-122.063-122.063-122.063zm0 53.782c46.983 0 85.283 38.3 85.283 85.282s-38.3 85.25-85.282 85.25c-46.98 0-85.25-38.268-85.25-85.25s38.27-85.28 85.25-85.28zm0 18.688c-36.88 0-66.56 29.712-66.56 66.594c0 36.88 29.68 66.562 66.56 66.562c36.882 0 66.595-29.68 66.595-66.562c0-36.88-29.712-66.594-66.594-66.594zm0 18.656c26.45 0 47.876 21.457 47.876 47.906c0 26.45-21.426 47.875-47.875 47.875c-26.447 0-47.905-21.425-47.905-47.875c0-8.41 2.19-16.315 6-23.187c1.84 12.334 12.466 21.813 25.313 21.813c14.14 0 25.593-11.486 25.593-25.625c0-8.62-4.25-16.236-10.78-20.875q.886-.032 1.78-.032z"/>
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
                        Diet Program
                    </h6>
                    <span class="text-xl font-semibold">5 Left</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                          +3.1%
                        </span>
                </div>
                <div>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2em" viewBox="0 0 16 16">
                              <path fill="none" stroke="#555" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.25 14.25h-4.5V1.75h10.5v7.5m-3.5 3.5l1.5 1.5l3-2.5m-8.5-4h4.5m-4.5 3h1.5m-1.5-6h4.5"/>
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



