@extends('header')
<!-- Left sidebar & main wrapper -->
@section('section')
    <div class="w-full flex max-w-7xl mx-auto xl:px-0 lg:flex xl:border-l xl:border-r xl:border-gray-400 xl:border-opacity-40">

    <div class="flex-1 min-w-0 bg-grey-50 xl:flex pb-8">
        <!-- Projects List -->
        <div class="bg-grey-50 lg:min-w-0 lg:flex-1">
            <div class="pr-4 sm:pr-6 lg:pr-8 pt-4 pb-4 border-b border-gray-200 sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-6 xl:border-t-0">
                <div class="flex items-center">
                    <div class="flex-1">
                        <h3 class="text-xl leading-6 font-medium text-gray-900">
                            My Test Alert
                        </h3>
                        <p class="mt-1 max-w-2xl text-base text-gray-500">
                            This is an optional description
                        </p>
                    </div>
                    <div class="relative">
                        <button id="sort-menu" @click="open=!open" type="button" class="w-full text-indigo-500 border-2 border-indigo-500 rounded-md shadow-sm px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-haspopup="true" aria-expanded="false">

                            <svg class="mr-3 h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Alert
                        </button>
                    </div>
                </div>
            </div>

            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
                <h2 class="text-base leading-6 font-medium text-gray-900">Overview</h2>
                <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-1 lg:grid-cols-1" x-max="1">
                    <!-- Card -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="ml-0 w-0 flex-1">
                                    <figure class="highcharts-figure block">
                                        <div id="container"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- More cards... -->
                </div>
            </div>
            <div class="max-w-6xl mx-auto">
                <h2 class="max-w-6xl mx-auto mt-8 px-4 text-base leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">
                    Alert rules
                </h2>
                <!-- This example requires Tailwind CSS v2.0+ -->
                @if(isset($all_alerts))
                    @foreach($all_alerts as $alerts)
                        <div class="hidden sm:block">
                        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex flex-col mt-2">
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 sm:px-6">
                                        <dl class="">
                                            <div class="pt-2 flex items-center bg-white">
                                            <div class="relative pb-12">
                                                <span type="button" class="inline-flex bg-white z-10 relative justify-center px-4 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                    <img class="-ml-1 mr-2 w-8 text-gray-400" src="//cdn.shopify.com/s/files/1/0523/5667/7813/t/1/assets/shopify-logo-png-transparent_200x.png?v=1327965704237961015" />
                                                    <span class="leading-4 text-left pl-2">
                                                        Order created <br />
                                                        <small class="font-normal">When a new order is created</small>
                                                    </span>
                                                </span>
                                                <span class="absolute z-0 top-4 left-16 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                            </div>
                                            </div>
                                            <div class="bg-white relative border border-gray-200 rounded-md divide-y divide-gray-200">
                                                    @if(isset($alerts->blocks))
                                                    @foreach($alerts->blocks as $key=>$blocks)
                                                    <div class="pl-3 pr-4 py-3 flex items-center justify-between text-sm mt-2 grid grid-cols-2 gap-5 sm:grid-cols-2 lg:grid-cols-2">
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm text-gray-500">
                                                            <span type="button" class="align-middle inline-flex bg-white z-10 relative justify-center px-4 py-2 border border-gray-300 text-sm rounded-md text-gray-700 bg-white">
                                                                <span class="font-bold px-2 bg-yellow-100 align-middle">
                                                                @if($key == 0) IF @else ELSE IF @endif
                                                                </span>
                                                                <span class="pl-2 align-middle">Order matches <b>{{$blocks->choice_made}}</b> of</span>
                                                            </span>
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900">
                                                                <ul class="list-none md:list-disc list-inside">
                                                                    @if(isset($blocks->filters))
                                                                        @foreach($blocks->filters as $filters)
                                                                            <li class="pl-3 pr-4 pt-1 text-sm">
                                                                                <span>{{$filters->condition_1}}</span>
                                                                                <span>{{$filters->condition_2}}</span>
                                                                                <span>{{$filters->condition_3}}</span>
                                                                                <span>{{$filters->condition_4}}</span>
                                                                            </li>
                                                                        @endforeach
                                                                    @endif
                                                                </ul>
                                                            </dd>
                                                        </div>
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Actions </dt>
                                                            <dd class="mt-1 text-sm text-gray-900">
                                                                <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                                                    @if(isset($blocks->actions))
                                                                    @foreach($blocks->actions as $actions)
                                                                        <li class="px-4 py-3 items-center justify-between text-sm">
                                                                            <div class="block">
                                                                                Send an
                                                                                @if($actions->condition_1 == "summary")
                                                                                    <span><b class="text-uppercase">{{$actions->condition_1}}</b> EVERY </span>
                                                                                @elseif($actions->condition_1 == 'threshold')
                                                                                    <span><b class="text-uppercase">{{$actions->condition_1}}</b> </span>
                                                                                @else
                                                                                    <span><b>EMAIl</b>, If </span>
                                                                                @endif

                                                                                @if($actions->condition_2 == 'Day' || $actions->condition_2 == 'Hour')
                                                                                    <span>{{$actions->condition_2}}</span> At <span>{{$actions->date}}</span>
                                                                                @elseif($actions->condition_2 == 'Week')
                                                                                    @php($dow_numeric = str_replace('week_','',$actions->condition_3))
                                                                                    <span>{{$actions->condition_2}}</span> ON <span>{{date('D', strtotime("Sunday +{$dow_numeric} days"))}}</span> At <span>{{$actions->date}}</span>
                                                                                @elseif($actions->condition_2 == 'Month')
                                                                                    @php($month = str_replace('month_','',$actions->condition_3))
                                                                                    <span>{{$actions->condition_2}}</span> ON <span> {{ordinalSuffix($month)}}</span> At <span>{{$actions->date}}</span>
                                                                                @else
                                                                                    <span>{{$actions->condition_2}}</span> <span>{{$actions->condition_3}}</span> <span>{{$actions->condition_4}}</span>
                                                                                @endif
        {{--                                                                                    via <b>email</b> to <a class="text-purple-600 text-sm" href="">nick@boo.ly</a>, --}}
        {{--                                                                                    <a class="text-purple-600 text-sm" href="">hello@test.com</a>--}}
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                    @endif
                                                                </ul>
                                                            </dd>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Activity feed -->
    <div class="bg-gray-100 pr-4 sm:pr-6 lg:pr-8 lg:flex-shrink-0 xl:border-l xl:border-gray-400 xl:border-opacity-30 xl:pr-0">
        <!-- Activity feed -->

        <div class="px-6 lg:w-80">
            <div class="pt-6 pb-2">
                <h2 class="text-sm font-semibold">Activity</h2>
                <p class="mt-1 text-sm text-gray-600">
                    Search previous alerts
                </p>
                <form class="mt-6 flex space-x-4" action="#">
                    <div class="flex-1 min-w-0">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: mail -->
                                <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="search" name="search" id="search" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="Search">
                        </div>
                    </div>
                    <button type="submit" class="inline-flex justify-center px-3.5 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: filter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
            </div>


            <div>
                <ul class="divide-y divide-gray-200" x-max="1">
                    <li class="py-4">
                        <div class="flex space-x-3">
                            <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=256&amp;h=256&amp;q=80" alt="">
                            <div class="flex-1 space-y-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium">You</h3>
                                    <p class="text-sm text-gray-500">
                                        1h
                                    </p>
                                </div>
                                <p class="text-sm text-gray-500">
                                    Deployed Workcation (2d89f0c8 in master) to production
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-4">
                        <div class="flex space-x-3">
                            <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=256&amp;h=256&amp;q=80" alt="">
                            <div class="flex-1 space-y-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium">You</h3>
                                    <p class="text-sm text-gray-500">
                                        3h
                                    </p>
                                </div>
                                <p class="text-sm text-gray-500">
                                    Deployed KiteTail (249df660 in master) to staging
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-4">
                        <div class="flex space-x-3">
                            <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=256&amp;h=256&amp;q=80" alt="">
                            <div class="flex-1 space-y-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium">You</h3>
                                    <p class="text-sm text-gray-500">
                                        12h
                                    </p>
                                </div>
                                <p class="text-sm text-gray-500">
                                    Deployed Workcation (11464223 in master) to staging
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-4">
                        <div class="flex space-x-3">
                            <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=256&amp;h=256&amp;q=80" alt="">
                            <div class="flex-1 space-y-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium">You</h3>
                                    <p class="text-sm text-gray-500">
                                        2d
                                    </p>
                                </div>
                                <p class="text-sm text-gray-500">
                                    Deployed Easywire (dad28e95 in master) to production
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-4">
                        <div class="flex space-x-3">
                            <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=256&amp;h=256&amp;q=80" alt="">
                            <div class="flex-1 space-y-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium">You</h3>
                                    <p class="text-sm text-gray-500">
                                        5d
                                    </p>
                                </div>
                                <p class="text-sm text-gray-500">
                                    Deployed Easywire (624bc94c in master) to production
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-4">
                        <div class="flex space-x-3">
                            <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=256&amp;h=256&amp;q=80" alt="">
                            <div class="flex-1 space-y-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium">You</h3>
                                    <p class="text-sm text-gray-500">
                                        1w
                                    </p>
                                </div>
                                <p class="text-sm text-gray-500">
                                    Deployed Workcation (e111f80e in master) to production
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-4">
                        <div class="flex space-x-3">
                            <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=256&amp;h=256&amp;q=80" alt="">
                            <div class="flex-1 space-y-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium">You</h3>
                                    <p class="text-sm text-gray-500">
                                        1w
                                    </p>
                                </div>
                                <p class="text-sm text-gray-500">
                                    Deployed Resumaid (5e136005 in master) to staging
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-4">
                        <div class="flex space-x-3">
                            <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=256&amp;h=256&amp;q=80" alt="">
                            <div class="flex-1 space-y-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium">You</h3>
                                    <p class="text-sm text-gray-500">
                                        2w
                                    </p>
                                </div>
                                <p class="text-sm text-gray-500">
                                    Deployed KiteTail (5c1fd07f in master) to production
                                </p>
                            </div>
                        </div>
                    </li>
                    <!-- More items... -->
                </ul>
                <div class="py-4 text-sm border-t border-gray-200">
                    <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-900">View all activity <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>

    </div>
    </div>
    <?php
        function ordinalSuffix( $n )
        {
            return $n . date('S',mktime(1,1,1,1,( (($n>=10)+($n>=20)+($n==0))*10 + $n%10) ));
        }
    ?>
@endsection
