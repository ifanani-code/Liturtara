@extends('layout.default')
@section('title', 'Homepage | Liturtara')

@include('layout.navbar')

@section('content')

{{-- HERO SECTION --}}
<section class="relative overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-green-50 -z-20"></div>

  <div class="container mx-auto flex flex-col md:flex-row items-center px-6 py-20 relative">
    <!-- Text Column -->
    <div class="w-full md:w-1/2 mb-10 md:mb-0 z-10">
      <h1 class="text-3xl md:text-4xl font-bold text-navy leading-tight mb-4">
        Get the literacy resources <br> that suit your needs
      </h1>
      <p class="text-gray-700 mb-6">
        We provide the literacy solutions you need — all in one platform.
      </p>
      <a href="#layanan"
         class="inline-flex items-center bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition">
        Explore Now
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
      </a>
    </div>
        <!-- Image Column -->
        <div class="w-full md:w-1/2 flex justify-center items-end relative mt-10 md:mt-0">
            <div class="relative w-full flex justify-center items-end">
                <img src="{{ asset('image/Group 555.png') }}"
                    alt="Liturtara main visual"
                    class="relative z-20 w-[100%] md:w-[115%] lg:w-[125%] max-w-none translate-y-16 md:translate-y-18" />
            </div>
        </div>
  </div>
</section>

{{-- OUR SOLUTIONS --}}
<section id="solusi" class="relative overflow-hidden bg-gray-100/60 pt-16 pb-20 -mt-2">
  <div class="absolute inset-0 bg-[url('{{ asset('image/Mask group.png') }}')] bg-cover bg-center opacity-10 -z-10"></div>

  <div class="container mx-auto px-6 text-center relative z-10">
    <h2 class="text-3xl md:text-4xl font-bold text-navy mb-12">Our Provided Solutions</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Business Solution -->
      <div class="bg-white rounded-2xl shadow-[0_8px_20px_rgba(0,0,0,0.08)] px-10 py-12 hover:shadow-[0_10px_25px_rgba(0,0,0,0.12)] transition">
        <img src="{{ asset('image/mdi_store-outline.png') }}" alt="Business Solution" class="mx-auto mb-4 w-16 h-16">
        <h3 class="text-xl md:text-2xl font-extrabold text-navy mb-3">Business Solutions</h3>
        <p class="text-gray-600 text-sm md:text-base">
          There is a significant gap between business consultants and business owners, often leading to miscommunication.
        </p>
      </div>

      <!-- Business Consultant -->
      <div class="bg-white rounded-2xl shadow-[0_8px_20px_rgba(0,0,0,0.08)] px-10 py-12 hover:shadow-[0_10px_25px_rgba(0,0,0,0.12)] transition">
        <img src="{{ asset('image/typcn_flow-switch.png') }}" alt="Business Consultant" class="mx-auto mb-4 w-16 h-16">
        <h3 class="text-xl md:text-2xl font-extrabold text-navy mb-3">Business Consultancy</h3>
        <p class="text-gray-600 text-sm md:text-base">
          Addressing business challenges from various aspects such as finance, market, legal, and operations.
        </p>
      </div>

      <!-- Research Center -->
      <div class="bg-white rounded-2xl shadow-[0_8px_20px_rgba(0,0,0,0.08)] px-10 py-12 hover:shadow-[0_10px_25px_rgba(0,0,0,0.12)] transition">
        <img src="{{ asset('image/wpf_statistics.png') }}" alt="Research Center" class="mx-auto mb-4 w-16 h-16">
        <h3 class="text-xl md:text-2xl font-extrabold text-navy mb-3">Research Center</h3>
        <p class="text-gray-600 text-sm md:text-base">
          Collaboration between researchers and business practitioners to generate relevant innovation and research.
        </p>
      </div>
    </div>
  </div>
</section>

{{-- HOW TO USE --}}
<section id="cara" class="relative py-20 bg-white">
  <div class="container mx-auto flex flex-col md:flex-row items-center gap-12 px-6 relative">
    
    <!-- Gambar -->
    <div class="w-full md:w-1/2 flex justify-center relative">
      <img src="{{ asset('image/Group 268.png') }}" alt="Liturtara usage illustration"
           class="w-[90%] md:w-[85%] lg:w-[75%] max-w-md relative z-10 drop-shadow-xl">
    </div>

    <!-- Accordion -->
    <div class="w-full md:w-1/2" x-data="{ open: 1 }">
      <h2 class="text-3xl md:text-4xl font-bold text-navy mb-8">
        How to Use Liturtara
      </h2>

      <div class="space-y-4">
        <!-- Step Template -->
        <template x-for="(step, index) in [
          {
            id: 1, 
            title: 'Upload Your Case', 
            desc: 'Case Owners upload business problems or case studies they want to analyze. Each case will be curated to match the areas of expertise available on the Liturtara platform.'
          },
          {
            id: 2, 
            title: 'Publish the Case', 
            desc: 'Once approved, the case will be published on the platform for Talent Researchers interested in providing research- and data-based solutions.'
          },
          {
            id: 3, 
            title: 'Problem Solving', 
            desc: 'Talent Researchers analyze and develop solution recommendations based on the case context. This process involves a scientific approach, literature review, and initial validation.'
          },
          {
            id: 4, 
            title: 'Verification Process', 
            desc: 'Reviewers verify Talent Researcher results for quality and relevance before publishing them to the Case Owner.'
          }
        ]" :key="step.id">
          <div 
            @click="open === step.id ? open = null : open = step.id"
            :class="open === step.id 
                     ? 'bg-green-100 border border-green-400' 
                     : 'bg-gray-100 hover:bg-gray-200 border border-gray-200'"
            class="rounded-lg p-4 text-left transition cursor-pointer">
            
            <div class="flex justify-between items-center font-semibold text-navy">
              <span x-text="`${step.id}. ${step.title}`"></span>
              <svg xmlns="http://www.w3.org/2000/svg"
                   :class="{'rotate-180': open === step.id}"
                   class="w-5 h-5 transform transition-transform duration-300"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7" />
              </svg>
            </div>

            <p x-show="open === step.id" x-transition class="mt-2 text-gray-700 text-sm" x-text="step.desc"></p>
          </div>
        </template>
      </div>
    </div>
  </div>
</section>

{{-- OUR SERVICES --}}
<section id="layanan" x-data="{ openModal: null }" class="bg-gray-50 py-20 -mt-4 relative">
  <div class="container mx-auto text-center px-6">
    <h2 class="text-3xl font-bold text-navy mb-12">Our Services</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      <!-- Case Owner -->
      <div class="bg-green-500 text-white rounded-2xl py-16 px-10 flex flex-col items-center justify-center shadow-md hover:shadow-xl transition transform hover:-translate-y-1">
        <img src="{{ asset('image/document.png') }}" alt="Case Owner Icon" class="w-24 h-24 mb-8">
        <h3 class="text-2xl font-semibold mb-6">Case Owner</h3>
        <button @click="openModal = 'caseOwner'" class="bg-white text-green-600 px-6 py-2.5 rounded-lg hover:bg-gray-100 transition flex items-center gap-1">
          Explore Now <span>↗</span>
        </button>
      </div>

      <!-- Talent Researcher -->
      <div class="bg-navy text-white rounded-2xl py-16 px-10 flex flex-col items-center justify-center shadow-md hover:shadow-xl transition transform hover:-translate-y-1">
        <img src="{{ asset('image/hat-graduation.png') }}" alt="Talent Researcher Icon" class="w-24 h-24 mb-8">
        <h3 class="text-2xl font-semibold mb-6">Talent Researcher</h3>
        <button @click="openModal = 'talent'" class="bg-white text-navy px-6 py-2.5 rounded-lg hover:bg-gray-100 transition flex items-center gap-1">
          Explore Now <span>↗</span>
        </button>
      </div>

      <!-- Reviewer -->
      <div class="bg-gray-800 text-white rounded-2xl py-16 px-10 flex flex-col items-center justify-center shadow-md hover:shadow-xl transition transform hover:-translate-y-1">
        <img src="{{ asset('image/reviewer.png') }}" alt="Reviewer Icon" class="w-24 h-24 mb-8">
        <h3 class="text-2xl font-semibold mb-6">Reviewer</h3>
        <button @click="openModal = 'reviewer'" class="bg-white text-gray-800 px-6 py-2.5 rounded-lg hover:bg-gray-100 transition flex items-center gap-1">
          Explore Now <span>↗</span>
        </button>
      </div>
    </div>
  </div>

  {{-- Overlay --}}
  <div x-show="openModal" x-transition.opacity class="fixed inset-0 bg-black/50 z-40" @click="openModal = null"></div>

  {{-- Case Owner Modal --}}
  <div x-show="openModal === 'caseOwner'" x-transition
       class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl p-8 max-w-3xl w-full shadow-lg relative flex flex-col md:flex-row items-center gap-6">
      <button @click="openModal = null" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">✕</button>
      
      <!-- Gambar kiri -->
      <div class="md:w-1/2 flex justify-center">
        <img src="{{ asset('image/CaseOwner.png') }}" alt="Case Owner" class="rounded-xl w-80 h-auto object-cover shadow-md">
      </div>
      
      <!-- Teks -->
      <div class="md:w-1/2 text-justify">
        <h3 class="text-2xl font-bold text-green-600 mb-4">Case Owner</h3>
        <p class="text-gray-700 mb-6 leading-relaxed">
          Case Owners are MSMEs, institutions, or individuals who face business challenges and require research-based solutions. 
          Through Liturtara, they can publish cases and gain strategic insights from the best Talent Researchers.
        </p>
        <a href="{{ route('caseowner.login') }}" class="bg-green-500 text-white px-6 py-2.5 rounded-lg hover:bg-green-600 transition">
          Login as Case Owner
        </a>
      </div>
    </div>
  </div>

  {{-- Talent Researcher Modal --}}
  <div x-show="openModal === 'talent'" x-transition
       class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl p-8 max-w-3xl w-full shadow-lg relative flex flex-col md:flex-row items-center gap-6">
      <button @click="openModal = null" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">✕</button>

      <!-- Gambar kiri -->
      <div class="md:w-1/2 flex justify-center">
        <img src="{{ asset('image/Talent.png') }}" alt="Talent Researcher" class="rounded-xl w-80 h-auto object-cover shadow-md">
      </div>
      
      <!-- Teks -->
      <div class="md:w-1/2 text-justify">
        <h3 class="text-2xl font-bold text-navy mb-4">Talent Researcher</h3>
        <p class="text-gray-700 mb-6 leading-relaxed">
          Talent Researchers are students, academics, and young professionals who develop solutions based on real research and analysis. 
          They can build their professional portfolios and earn <b>TARA</b> tokens as rewards.
        </p>
        <a href="{{ route('talent.login') }}" class="bg-navy text-white px-6 py-2.5 rounded-lg hover:bg-blue-900 transition">
          Login as Talent
        </a>
      </div>
    </div>
  </div>

  {{-- Reviewer Modal --}}
  <div x-show="openModal === 'reviewer'" x-transition
       class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl p-8 max-w-3xl w-full shadow-lg relative flex flex-col md:flex-row items-center gap-6">
      <button @click="openModal = null" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">✕</button>

      <!-- Gambar kiri -->
      <div class="md:w-1/2 flex justify-center">
        <img src="{{ asset('image/Reviewer(2).png') }}" alt="Reviewer" class="rounded-xl w-80 h-auto object-cover shadow-md">
      </div>
      
      <!-- Teks -->
      <div class="md:w-1/2 text-justify">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Reviewer</h3>
        <p class="text-gray-700 mb-6 leading-relaxed">
          Reviewers are lecturers, researchers, or industry practitioners who assess and verify the solutions proposed by Talent Researchers. 
          They play an important role in maintaining the quality of results and credibility of the Liturtara ecosystem.
        </p>
        <a href="{{ route('reviewer.login') }}" class="bg-gray-800 text-white px-6 py-2.5 rounded-lg hover:bg-gray-900 transition">
          Login as Reviewer
        </a>
      </div>
    </div>
  </div>
</section>


{{-- OUR PARTNERS --}}
<section id="mitra" class="py-24 bg-gray-100 relative overflow-hidden">
  <div class="text-center mb-16">
    <h2 class="text-3xl md:text-4xl font-bold text-navy">Our Partners</h2>
  </div>

  <div class="w-full flex justify-center">
    {{-- Baris pertama --}}
    <div class="max-w-[1200px] overflow-x-auto pb-3 scrollbar-hide" style="scrollbar-width: none;"> <!--max-w-[1200px] untuk maksimal container yang dimunculkan-->
      <div class="flex gap-6 flex-nowrap px-2">
        @foreach ([
          'image/telkom-university.jpg',
          'image/telkom-university.jpg',
          'image/telkom-university.jpg',
          'image/telkom-university.jpg',
          'image/telkom-university.jpg',
          'image/telkom-university.jpg',
          'image/telkom-university.jpg'
        ] as $partner)
          <div class="bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] flex items-center justify-center min-w-[22rem] h-40">
            <img src="{{ asset($partner) }}" alt="Partner Logo" class="object-contain max-h-28 max-w-full opacity-75 hover:opacity-100 transition">
          </div>
        @endforeach
      </div>
    </div>


    {{-- Baris kedua (selang-seling) --}}
    <!-- <div class="flex justify-center flex-wrap gap-6 mt-6 ml-28">
      @foreach ([
        'image/telkom-university.jpg',
        'image/telkom-university.jpg',
        'image/telkom-university.jpg',
        'image/telkom-university.jpg',
        'image/telkom-university.jpg',
      ] as $partner)
        <div class="bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] flex items-center justify-center w-56 h-28">
          <img src="{{ asset($partner) }}" alt="Partner Logo" class="object-contain max-h-20 max-w-full opacity-90 hover:opacity-100 transition">
        </div>
      @endforeach
    </div> -->
  </div>
</section>


{{-- TESTIMONIAL SECTION --}}
<section id="testimonial" class="py-20 bg-gray-50 relative">
  <div class="container mx-auto px-6 text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-navy mb-12">What They Say About Us</h2>

    <!-- SLIDER WRAPPER -->
    <div class="relative max-w-5xl mx-auto">
      <!-- SLIDER CONTENT -->
      <div id="testimonialSlider" class="flex transition-transform duration-500 ease-in-out">
        @foreach ([
          ['John Dee', 'Owner of Deeva Fashion', 'Universitas Sebelas Maret', 
            'I was impressed by the professionalism and attention to detail from Liturtara. They delivered exceptional service, from project briefing to execution, and exceeded my expectations.'],
          ['Jane Doe', 'Owner of GreenTech', 'Universitas Telkom', 
            'Working with Liturtara gave our business a new perspective. Their literacy-based approach helped us make smarter, data-driven decisions for our MSME.'],
          ['Michael Tan', 'Founder of Tan Bakery', 'Universitas Indonesia', 
            'The collaboration process was smooth and insightful. The research-backed recommendations from Liturtara have helped us grow sustainably.']
        ] as [$name, $role, $affil, $desc])
          <div class="w-full flex-shrink-0 px-4">
            <div class="bg-white rounded-2xl shadow-md p-8 mx-auto max-w-3xl">
              <div class="flex flex-col items-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                  <span class="material-icons text-blue-500 text-4xl">person</span>
                </div>
                <p class="text-gray-700 text-base italic mb-6">"{{ $desc }}"</p>
                <h3 class="font-semibold text-navy text-lg">{{ $name }}</h3>
                <p class="text-sm text-gray-500">{{ $role }}</p>
                <p class="text-sm text-gray-400">{{ $affil }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- NAVIGATION BUTTONS -->
      <div class="flex justify-center mt-8 space-x-3">
        <button id="prevTestimonial"
          class="w-10 h-10 flex items-center justify-center bg-white border rounded-full shadow hover:bg-gray-100">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            class="w-5 h-5 text-gray-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
          </svg>
        </button>

        <button id="nextTestimonial"
          class="w-10 h-10 flex items-center justify-center bg-white border rounded-full shadow hover:bg-gray-100">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            class="w-5 h-5 text-gray-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIAL SLIDER SCRIPT -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('testimonialSlider');
    const slides = slider.children.length;
    const prev = document.getElementById('prevTestimonial');
    const next = document.getElementById('nextTestimonial');
    let index = 0;

    function updateSlider() {
      slider.style.transform = `translateX(-${index * 100}%)`;
    }

    prev.addEventListener('click', () => {
      index = (index > 0) ? index - 1 : slides - 1;
      updateSlider();
    });

    next.addEventListener('click', () => {
      index = (index < slides - 1) ? index + 1 : 0;
      updateSlider();
    });

    // Auto slide every 6 seconds
    setInterval(() => {
      index = (index + 1) % slides;
      updateSlider();
    }, 6000);
  });
</script>


{{-- ✅ Section Berita --}}
<section id="berita" class="py-16 bg-white">
    <div class="container mx-auto px-6 flex flex-col lg:flex-row items-start justify-between">
        {{-- 📰 Left Content --}}
        <div class="lg:w-1/3 mb-10 lg:mb-0">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">NEWS</h2>
            <p class="text-gray-500 mb-6">Read more about Liturtara's activities</p>
            <div class="flex items-center space-x-3">
                <a href="{{ route('news.index') }}"
                   class="bg-navy text-white text-sm px-4 py-2 rounded-lg hover:bg-blue-900 transition">
                    Explore Now ↗
                </a>
            </div>
        </div>

        {{-- 🗞️ News Slider --}}
        <div class="lg:w-2/3 overflow-x-auto scrollbar-hide">
            <div id="newsContainer" class="flex space-x-6 min-w-max scroll-smooth">
                @forelse ($latestNews as $news)
                    <div class="min-w-[300px] max-w-[320px] bg-white rounded-2xl shadow-md hover:shadow-xl transition overflow-hidden">
                        <div class="relative">
                          @if ($news->image)
                              <img src="{{ asset('storage/' . $news->image) }}"
                                  alt="{{ $news->title }}"
                                  class="w-full h-48 object-cover rounded-t-2xl">
                          @endif
                            <span class="absolute top-2 right-2 bg-white/90 text-gray-700 text-xs px-2 py-1 rounded-md">
                                {{ \Carbon\Carbon::parse($news->date)->format('d F Y') }}
                            </span>
                        </div>
                          <div class="p-4">
                              <h3 class="font-semibold text-gray-800 text-base mb-1 line-clamp-2">
                                  {{ $news->title }}
                              </h3>
                              <p class="text-sm text-gray-500 mb-2 line-clamp-3">
                                  {{ $news->content }}
                              </p>
                              <a href="{{ route('news.news_details',['id' => $news->news_id]) }}"
                                class="text-navy font-medium text-sm hover:underline">
                                  Selengkapnya →
                              </a>
                          </div>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada berita.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

{{-- 🚀 Script untuk Scroll --}}
<script>
    const container = document.getElementById('newsContainer');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    let scrollPosition = 0;

    nextBtn.addEventListener('click', () => {
        scrollPosition += 350;
        container.scrollTo({ left: scrollPosition, behavior: 'smooth' });
    });

    prevBtn.addEventListener('click', () => {
        scrollPosition -= 350;
        if (scrollPosition < 0) scrollPosition = 0;
        container.scrollTo({ left: scrollPosition, behavior: 'smooth' });
    });
</script>

@include('layout.contact')
@include('layout.footer')
@endsection
