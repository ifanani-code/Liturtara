@extends('layout.default')
@section('title', 'Dashboard Case Owner')
@section('content')
@include('layout.navbar')
    <!-- Hero Section -->
  <section class="w-full mt-10">
    <div class="max-w-7xl mx-auto px-20">
      <div class="relative w-full rounded-2xl overflow-hidden shadow-lg">
        <!-- Gambar -->
        <img src="{{ asset('image/barista.png') }}"
          alt="gambar barista"
          class="w-full h-80 object-cover object-top"/>
        <!-- Teks di atas gradasi -->
        <div class="absolute bottom-20 left-10">
          <h1 class="text-3xl font-bold text-blue-900 mb-2">Case Owner Service</h1>
          <p class="text-sm text-gray-700 max-w-md">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Tabs -->
  <main class="bg-white relative z-10 -mt-10 pt-5 shadow-lg">
    <div class="border-b border-gray-200">
      <div class="max-w-6xl mx-auto px-6 md:px-10">
        <nav class="flex space-x-8 py-3">
          <a href="#" class="relative pb-2 text-sm font-semibold text-blue-900">
            Case Owner
            <span class="absolute left-0 -bottom-0.5 w-full h-1 bg-blue-900 rounded"></span>
          </a>
        </nav>
      </div>
    </div>
  </main>

  <!-- Upload Case Section Full Background -->
  <section class="relative py-20">
    <!-- Background full screen -->
    <div class="absolute inset-0 -z-10 overflow-hidden">
      <img src="{{ asset('image/Case Owner Back.png') }}" alt="gambar hiasan" class="w-full h-auto">
    </div>

    <!-- Konten dibatasi max-width -->
<div class="max-w-7xl mx-auto px-60">
  <div class="bg-green-400 rounded-xl p-8 flex flex-col md:flex-row items-center justify-between shadow-lg relative z-10">
    <div>
      <h3 class="text-2xl font-bold text-white">
        Upload your case problem,<br>we will provide a solution
      </h3>
      <div class="mt-6 flex gap-4">
        <button class="border border-white text-white px-4 py-2 rounded-md hover:bg-green-500 hover:text-white transition">
          Download Template
        </button>
        <button class="bg-blue-900 text-white px-4 py-2 rounded-md hover:bg-blue-800 transition">
          Upload Case
        </button>
      </div>
    </div>

    <div class="w-[150px] rounded-md">
      <img src="{{ asset('image/document.png') }}" alt="gambar" class="w-full h-auto">
    </div>
  </div>
</div>
</section>


      <!-- Case Section -->
 <section class="max-w-7xl mx-auto px-8 py-10 flex flex-col md:flex-row gap-8">
  <!-- Sidebar -->
  <div class="w-full md:w-1/4">
    <div class="bg-white shadow-md rounded-xl overflow-hidden font-semibold">
      <ul>
        <li class="group px-6 py-3 text-blue-900 hover:bg-blue-900 hover:text-white flex items-center gap-2 cursor-pointer transition-colors">
          <svg class="w-5 h-5 text-blue-900 group-hover:text-white transition" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linejoin="round" d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
           </svg>  
             Case Sent
        </li>
        <li class="group px-6 py-3 text-blue-900 hover:bg-blue-900 hover:text-white flex items-center gap-2 cursor-pointer transition-colors">
          <svg class="w-5 h-5 text-blue-900 group-hover:text-white transition" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linejoin="round" d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
           </svg>  
             Case Approved
        </li>
        <li class="group px-6 py-3 text-blue-900 hover:bg-blue-900 hover:text-white flex items-center gap-2 cursor-pointer transition-colors">
          <svg class="w-5 h-5 text-blue-900 group-hover:text-white transition" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linejoin="round" d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
           </svg>  
             Case In Progress
        </li>
        <li class="group px-6 py-3 text-blue-900 hover:bg-blue-900 hover:text-white flex items-center gap-2 cursor-pointer transition-colors">
          <svg class="w-5 h-5 text-blue-900 group-hover:text-white transition" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linejoin="round" d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
           </svg>  
             Case Review
        </li>
        <li class="group px-6 py-3 text-blue-900 hover:bg-blue-900 hover:text-white flex items-center gap-2 cursor-pointer transition-colors">
          <svg class="w-5 h-5 text-blue-900 group-hover:text-white transition" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linejoin="round" d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
           </svg>  
             Case Solved
        </li>
        <li class="group px-6 py-3 text-blue-900 hover:bg-blue-900 hover:text-white flex items-center gap-2 cursor-pointer transition-colors">
          <svg class="w-5 h-5 text-blue-900 group-hover:text-white transition" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linejoin="round" d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
           </svg>  
             Case Rejected
        </li>
      </ul>
    </div>
  </div>

  
    <!-- Empty State -->
    <div class="w-full md:w-3/4 flex flex-col items-center justify-center text-center">
      <div class="w-[80px] rounded-md">
          <img src="{{ asset('image/icon file.png') }}" alt="gambar file" class="w-full h-auto">
        </div>
      <p class="text-lg font-semibold text-blue-900 mb-6">
        You haven't uploaded any case,<br>upload your case now
      </p>
      <button class="bg-blue-900 text-white px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-blue-800 transition-colors">
       Upload Case
       <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2M12 4v12m0-12 4 4m-4-4L8 8"/>
  </svg>
</button>
    </div>
  </section>


@include('layout.contact')
@include('layout.footer')
@endsection
