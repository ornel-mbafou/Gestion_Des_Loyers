@extends('layouts.app')
@section('title', 'home')
@section('content')
<body class="bg-gray-100"> 
    <section class="relative h-screen w-full overflow-hidden">
    
    <div id="indicators-carousel" class="relative w-full h-full" data-carousel="slide">
        <div class="relative h-full overflow-hidden">
            
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1920&q=80" 
                     class="absolute block w-full h-full object-cover" alt="...">
                
                <div class="absolute inset-0 bg-black/40 z-10"></div>

                <div class="absolute inset-0 z-20 flex flex-col justify-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="bg-white w-fit px-4 py-2 text-sm font-bold mb-6">
                        <span class="text-gray-900">Toronto, </span><span class="text-orange-500">Canada</span>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-extrabold text-white uppercase leading-tight tracking-wide">
                        Hurry!<br>Get the best<br>villa for you
                    </h1>
                </div>
            </div>
            
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1920&q=80" 
                     class="absolute block w-full h-full object-cover" alt="...">
                
                <div class="absolute inset-0 bg-black/40 z-10"></div>

                <div class="absolute inset-0 z-20 flex flex-col justify-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="bg-white w-fit px-4 py-2 text-sm font-bold mb-6">
                        <span class="text-gray-900">Melbourne, </span><span class="text-orange-500">Australia</span>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-extrabold text-white uppercase leading-tight tracking-wide">
                        Be Quick!<br>Get the best<br>villa in town
                    </h1>
                </div>
            </div>
            
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1920&q=80" 
                     class="absolute block w-full h-full object-cover" alt="...">
                
                <div class="absolute inset-0 bg-black/40 z-10"></div>

                <div class="absolute inset-0 z-20 flex flex-col justify-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="bg-white w-fit px-4 py-2 text-sm font-bold mb-6">
                        <span class="text-gray-900">Miami, </span><span class="text-orange-500">South Florida</span>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-extrabold text-white uppercase leading-tight tracking-wide">
                        Act Now!<br>Get the highest level<br>penthouse
                    </h1>
                </div>
            </div>
        </div>

        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 bottom-10 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full bg-orange-500" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-orange-500" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-orange-500" data-carousel-slide-to="2"></button>
        </div>

        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white/20 group-hover:bg-white/40 backdrop-blur-sm">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="m15 19-7-7 7-7"/></svg>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white/20 group-hover:bg-white/40 backdrop-blur-sm">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="m9 5 7 7-7 7"/></svg>
            </span>
        </button>
    </div>

</section>


<section class="w-full py-24 bg-white flex justify-center overflow-hidden">
    <div class="w-full max-w-[1300px] px-4 md:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-stretch">

            <div class="lg:col-span-4 relative h-full min-h-[500px]">
                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                     class="w-full h-full object-cover" 
                     alt="Appartement">
                
                <div class="absolute -bottom-12 -left-12 bg-[#f35525] w-[110px] h-[110px] rounded-full flex items-center justify-center shadow-lg z-10">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                </div>
            </div>

            <div class="lg:col-span-5 flex flex-col justify-center py-4 lg:pl-6">
                <span class="text-[#f35525] font-bold text-[15px] tracking-wide mb-4 block">
                    | FEATURED
                </span>
                <h2 class="text-[44px] font-black text-gray-900 leading-[1.2] mb-10">
                    Best Appartment<br>& Sea View
                </h2>

                <div class="bg-[#fafafa] rounded shadow-sm border border-gray-100">
                    <div class="border-b border-gray-200 bg-[#fafafa]">
                        <h4 class="text-[#f35525] font-medium text-[17px] px-6 py-5">
                            Lorem ipsum dolor sit?
                        </h4>
                        <div class="px-6 pb-6 text-gray-700 text-[15px] leading-relaxed">
                            Lorem ipsum dolor sit amet, <strong class="text-black font-bold">consectetur adipiscing</strong> elit. TemplateMo provides you the <a href="#" class="text-blue-500 font-medium hover:underline">lorem ipsum dolor</a> sit amet. Please tell your friends about it.
                        </div>
                    </div>

                    <div class="border-b border-gray-200 bg-[#fafafa]">
                        <h4 class="text-gray-900 font-medium text-[17px] px-6 py-5 cursor-pointer hover:text-[#f35525] transition-colors">
                            Consectetur adipiscing elit?
                        </h4>
                    </div>

                    <div class="bg-[#fafafa] rounded-b">
                        <h4 class="text-gray-900 font-medium text-[17px] px-6 py-5 cursor-pointer hover:text-[#f35525] transition-colors">
                            Eiusmod tempor incididunt ut?
                        </h4>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3">
                <div class="bg-white rounded-xl shadow-[0px_0px_30px_rgba(0,0,0,0.07)] p-8 h-full flex flex-col justify-between">
                    
                    <div class="flex items-center gap-6 py-6 border-b border-gray-100">
                        <svg class="w-[42px] h-[42px] text-[#f35525]" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                        </svg>
                        <div>
                            <h4 class="text-[22px] font-bold text-gray-900 leading-none mb-1.5">250 m2</h4>
                            <span class="text-gray-400 text-[15px]">Lorem Ipsum Space</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-6 py-6 border-b border-gray-100">
                        <svg class="w-[42px] h-[42px] text-[#f35525]" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        <div>
                            <h4 class="text-[22px] font-bold text-gray-900 leading-none mb-1.5">Contract</h4>
                            <span class="text-gray-400 text-[15px]">Lorem Ipsum Ready</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-6 py-6 border-b border-gray-100">
                        <svg class="w-[42px] h-[42px] text-[#f35525]" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                        </svg>
                        <div>
                            <h4 class="text-[22px] font-bold text-gray-900 leading-none mb-1.5">Payment</h4>
                            <span class="text-gray-400 text-[15px]">Lorem Ipsum Process</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-6 py-6">
                        <svg class="w-[42px] h-[42px] text-[#f35525]" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                        <div>
                            <h4 class="text-[22px] font-bold text-gray-900 leading-none mb-1.5">Safety</h4>
                            <span class="text-gray-400 text-[15px]">Lorem Ipsum Control</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<div class="w-full font-sans overflow-x-hidden">

    <section class="relative w-full h-[500px] flex flex-col items-center justify-start pt-24 bg-cover bg-center" 
             style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');">
        
        <span class="text-[#f35525] font-bold text-[16px] uppercase tracking-wider mb-6">
            | Video View
        </span>
        
        <h2 class="text-white text-center text-[45px] font-black leading-tight max-w-[800px] px-4">
            Get Closer View &<br>Different Feeling
        </h2>
    </section>

    <div class="relative -mt-[200px] flex justify-center px-4 md:px-0">
        <div class="relative w-full max-w-[1050px] aspect-video rounded-[25px] overflow-hidden shadow-2xl">
            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                 class="w-full h-full object-cover" alt="Villa Interior">
            
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="bg-[#f35525]/50 p-4 rounded-full backdrop-blur-sm">
                    <button class="bg-white text-[#f35525] w-16 h-16 rounded-full flex items-center justify-center shadow-lg transition-transform hover:scale-110">
                        <svg class="w-10 h-10 fill-current ml-1" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-white pt-20 pb-24 px-4">
        <div class="max-w-[1200px] mx-auto flex flex-wrap justify-center gap-8 lg:gap-12">
            
            <div class="relative bg-[#ffeeea] rounded-[20px] py-10 px-10 flex items-center gap-6 min-w-[320px] shadow-sm">
                <span class="text-[40px] font-black text-[#f35525]">34</span>
                <p class="text-gray-900 font-extrabold text-[16px] leading-tight">
                    Lorem Ipsum<br>Finished Now
                </p>
                <div class="absolute -top-4 -right-4 w-14 h-14 bg-[#f35525] rounded-full border-[6px] border-white"></div>
            </div>

            <div class="relative bg-[#ffeeea] rounded-[20px] py-10 px-10 flex items-center gap-6 min-w-[320px] shadow-sm">
                <span class="text-[40px] font-black text-[#f35525]">12</span>
                <p class="text-gray-900 font-extrabold text-[16px] leading-tight">
                    Lorem Ipsum<br>Experience
                </p>
                <div class="absolute -top-4 -right-4 w-14 h-14 bg-[#f35525] rounded-full border-[6px] border-white"></div>
            </div>

            <div class="relative bg-[#ffeeea] rounded-[20px] py-10 px-10 flex items-center gap-6 min-w-[320px] shadow-sm">
                <span class="text-[40px] font-black text-[#f35525]">24</span>
                <p class="text-gray-900 font-extrabold text-[16px] leading-tight">
                    Lorem Ipsum<br>Won 2023
                </p>
                <div class="absolute -top-4 -right-4 w-14 h-14 bg-[#f35525] rounded-full border-[6px] border-white"></div>
            </div>

        </div>
    </section>


<section class="w-full py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end mb-10 gap-6">
            <div>
                <span class="text-orange-500 font-bold text-sm tracking-widest uppercase">| Best Deal</span>
                <h2 class="text-4xl font-extrabold mt-2 text-gray-900 leading-tight">
                    Find Your Best Deal<br>Right Now!
                </h2>
            </div>
            
            <div class="flex flex-wrap gap-3">
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-md font-semibold transition">Appartment</button>
                <button class="bg-gray-900 hover:bg-black text-white px-6 py-3 rounded-md font-semibold transition">Villa House</button>
                <button class="bg-gray-900 hover:bg-black text-white px-6 py-3 rounded-md font-semibold transition">Penthouse</button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <div class="lg:col-span-3 bg-white rounded-xl shadow-lg p-6 h-fit">
                <ul class="divide-y divide-gray-200">
                    <li class="py-4 flex justify-between items-center">
                        <span class="text-gray-500">Lorem Ipsum Space</span>
                        <span class="font-bold text-gray-900 text-lg">185 m2</span>
                    </li>
                    <li class="py-4 flex justify-between items-center">
                        <span class="text-gray-500">Lorem Ipsum num</span>
                        <span class="font-bold text-gray-900 text-lg">26th</span>
                    </li>
                    <li class="py-4 flex justify-between items-center">
                        <span class="text-gray-500">Lorem Ipsum rooms</span>
                        <span class="font-bold text-gray-900 text-lg">4</span>
                    </li>
                    <li class="py-4 flex justify-between items-center">
                        <span class="text-gray-500">Lorem Ipsum Available</span>
                        <span class="font-bold text-gray-900 text-lg">Yes</span>
                    </li>
                    <li class="py-4 flex justify-between items-center border-b-0">
                        <span class="text-gray-500">Lorem Ipsum Process</span>
                        <span class="font-bold text-gray-900 text-lg">Bank</span>
                    </li>
                </ul>
            </div>

            <div class="lg:col-span-6 h-64 lg:h-auto">
                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                     alt="Living Room" 
                     class="w-full h-full object-cover rounded-xl shadow-md">
            </div>

            <div class="lg:col-span-3 flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Lorem Ipsum Property</h3>
                    <p class="text-gray-500 text-sm mb-4 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse.
                    </p>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                    </p>
                </div>
                
                <button class="flex items-center bg-gray-900 hover:bg-black text-white rounded-full overflow-hidden w-fit shadow-lg transition">
                    <span class="bg-orange-500 p-3 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </span>
                    <span class="px-5 font-semibold text-sm">Schedule a visit</span>
                </button>
            </div>

        </div>
    </div>
</section>

<section class="w-full py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <span class="text-orange-500 font-bold text-sm tracking-widest uppercase">| Properties</span>
            <h2 class="text-4xl font-extrabold mt-2 text-gray-900 leading-tight">
                We Provide The Best<br>Property You Like
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="bg-gray-50 rounded-xl p-6 flex flex-col hover:shadow-lg transition-shadow duration-300">
                <img src="https://images.unsplash.com/photo-1613490908578-81c223145455?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Villa" class="w-full h-56 object-cover rounded-lg mb-5">
                <div class="flex justify-between items-center mb-4">
                    <span class="bg-orange-100 text-orange-600 text-sm font-semibold px-3 py-1 rounded">Luxury Villa</span>
                    <span class="text-orange-600 font-extrabold text-xl">$2.264.000</span>
                </div>
                <h3 class="font-bold text-lg text-gray-900 mb-4">18 New Street Miami, OR 97219</h3>
                
                <div class="flex flex-wrap text-sm text-gray-600 gap-x-4 gap-y-2 mb-6">
                    <div>Bedrooms: <span class="font-bold text-gray-900">8</span></div>
                    <div>Bathrooms: <span class="font-bold text-gray-900">8</span></div>
                    <div>Area: <span class="font-bold text-gray-900">545m2</span></div>
                    <div>Floor: <span class="font-bold text-gray-900">3</span></div>
                    <div>Parking: <span class="font-bold text-gray-900">6 spots</span></div>
                </div>
                
                <hr class="border-gray-200 mb-6 mt-auto">
                <div class="text-center">
                    <button class="bg-gray-900 hover:bg-black text-white rounded-full px-8 py-3 font-semibold text-sm transition">Schedule a visit</button>
                </div>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 flex flex-col hover:shadow-lg transition-shadow duration-300">
                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Villa" class="w-full h-56 object-cover rounded-lg mb-5">
                <div class="flex justify-between items-center mb-4">
                    <span class="bg-orange-100 text-orange-600 text-sm font-semibold px-3 py-1 rounded">Luxury Villa</span>
                    <span class="text-orange-600 font-extrabold text-xl">$1.180.000</span>
                </div>
                <h3 class="font-bold text-lg text-gray-900 mb-4">54 Mid Street Florida, OR 27001</h3>
                
                <div class="flex flex-wrap text-sm text-gray-600 gap-x-4 gap-y-2 mb-6">
                    <div>Bedrooms: <span class="font-bold text-gray-900">6</span></div>
                    <div>Bathrooms: <span class="font-bold text-gray-900">5</span></div>
                    <div>Area: <span class="font-bold text-gray-900">450m2</span></div>
                    <div>Floor: <span class="font-bold text-gray-900">3</span></div>
                    <div>Parking: <span class="font-bold text-gray-900">8 spots</span></div>
                </div>
                
                <hr class="border-gray-200 mb-6 mt-auto">
                <div class="text-center">
                    <button class="bg-gray-900 hover:bg-black text-white rounded-full px-8 py-3 font-semibold text-sm transition">Schedule a visit</button>
                </div>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 flex flex-col hover:shadow-lg transition-shadow duration-300">
                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Villa" class="w-full h-56 object-cover rounded-lg mb-5">
                <div class="flex justify-between items-center mb-4">
                    <span class="bg-orange-100 text-orange-600 text-sm font-semibold px-3 py-1 rounded">Luxury Villa</span>
                    <span class="text-orange-600 font-extrabold text-xl">$1.460.000</span>
                </div>
                <h3 class="font-bold text-lg text-gray-900 mb-4">26 Old Street Miami, OR 38540</h3>
                
                <div class="flex flex-wrap text-sm text-gray-600 gap-x-4 gap-y-2 mb-6">
                    <div>Bedrooms: <span class="font-bold text-gray-900">5</span></div>
                    <div>Bathrooms: <span class="font-bold text-gray-900">4</span></div>
                    <div>Area: <span class="font-bold text-gray-900">225m2</span></div>
                    <div>Floor: <span class="font-bold text-gray-900">3</span></div>
                    <div>Parking: <span class="font-bold text-gray-900">10 spots</span></div>
                </div>
                
                <hr class="border-gray-200 mb-6 mt-auto">
                <div class="text-center">
                    <button class="bg-gray-900 hover:bg-black text-white rounded-full px-8 py-3 font-semibold text-sm transition">Schedule a visit</button>
                </div>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 flex flex-col hover:shadow-lg transition-shadow duration-300">
                <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Apartment" class="w-full h-56 object-cover rounded-lg mb-5">
                <div class="flex justify-between items-center mb-4">
                    <span class="bg-orange-100 text-orange-600 text-sm font-semibold px-3 py-1 rounded">Apartment</span>
                    <span class="text-orange-600 font-extrabold text-xl">$584.500</span>
                </div>
                <h3 class="font-bold text-lg text-gray-900 mb-4">12 New Street Miami, OR 12650</h3>
                
                <div class="flex flex-wrap text-sm text-gray-600 gap-x-4 gap-y-2 mb-6">
                    <div>Bedrooms: <span class="font-bold text-gray-900">4</span></div>
                    <div>Bathrooms: <span class="font-bold text-gray-900">3</span></div>
                    <div>Area: <span class="font-bold text-gray-900">125m2</span></div>
                    <div>Floor: <span class="font-bold text-gray-900">25th</span></div>
                    <div>Parking: <span class="font-bold text-gray-900">2 cars</span></div>
                </div>
                
                <hr class="border-gray-200 mb-6 mt-auto">
                <div class="text-center">
                    <button class="bg-gray-900 hover:bg-black text-white rounded-full px-8 py-3 font-semibold text-sm transition">Schedule a visit</button>
                </div>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 flex flex-col hover:shadow-lg transition-shadow duration-300">
                <img src="https://images.unsplash.com/photo-1502672260266-1c1c2b441552?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Penthouse" class="w-full h-56 object-cover rounded-lg mb-5">
                <div class="flex justify-between items-center mb-4">
                    <span class="bg-orange-100 text-orange-600 text-sm font-semibold px-3 py-1 rounded">Penthouse</span>
                    <span class="text-orange-600 font-extrabold text-xl">$925.600</span>
                </div>
                <h3 class="font-bold text-lg text-gray-900 mb-4">34 Beach Street Miami, OR 42680</h3>
                
                <div class="flex flex-wrap text-sm text-gray-600 gap-x-4 gap-y-2 mb-6">
                    <div>Bedrooms: <span class="font-bold text-gray-900">4</span></div>
                    <div>Bathrooms: <span class="font-bold text-gray-900">4</span></div>
                    <div>Area: <span class="font-bold text-gray-900">180m2</span></div>
                    <div>Floor: <span class="font-bold text-gray-900">38th</span></div>
                    <div>Parking: <span class="font-bold text-gray-900">2 cars</span></div>
                </div>
                
                <hr class="border-gray-200 mb-6 mt-auto">
                <div class="text-center">
                    <button class="bg-gray-900 hover:bg-black text-white rounded-full px-8 py-3 font-semibold text-sm transition">Schedule a visit</button>
                </div>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 flex flex-col hover:shadow-lg transition-shadow duration-300">
                <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Modern Condo" class="w-full h-56 object-cover rounded-lg mb-5">
                <div class="flex justify-between items-center mb-4">
                    <span class="bg-orange-100 text-orange-600 text-sm font-semibold px-3 py-1 rounded">Modern Condo</span>
                    <span class="text-orange-600 font-extrabold text-xl">$450.000</span>
                </div>
                <h3 class="font-bold text-lg text-gray-900 mb-4">22 New Street Portland, OR 16540</h3>
                
                <div class="flex flex-wrap text-sm text-gray-600 gap-x-4 gap-y-2 mb-6">
                    <div>Bedrooms: <span class="font-bold text-gray-900">3</span></div>
                    <div>Bathrooms: <span class="font-bold text-gray-900">2</span></div>
                    <div>Area: <span class="font-bold text-gray-900">165m2</span></div>
                    <div>Floor: <span class="font-bold text-gray-900">26th</span></div>
                    <div>Parking: <span class="font-bold text-gray-900">3 cars</span></div>
                </div>
                
                <hr class="border-gray-200 mb-6 mt-auto">
                <div class="text-center">
                    <button class="bg-gray-900 hover:bg-black text-white rounded-full px-8 py-3 font-semibold text-sm transition">Schedule a visit</button>
                </div>
            </div>

        </div>
    </div>
</section>

</div>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.js"></script>
@endsection