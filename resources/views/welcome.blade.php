@extends('layouts.app')

@section('content')
    <div id="content" class="container mx-auto py-8 mt-48 mb-20 text-center">
        <h1 id="welcome-heading" data-text="FARDAN RASHIDI." class="text-9xl text-gray-800">FARDAN RASHIDI.</h1>
    </div>

    <div id="image-container" class="container mx-auto py-8">
        <div class="grid grid-cols-1 gap-4">
            @if(count($imageLists) > 0 && count($imageLists[0]) > 0)
                <div class="image-wrapper">
                    <img id="gallery-image" src="{{ $imageLists[0][0] }}" alt="Image">
                </div>
            @else
                <p>No images found.</p>
            @endif
        </div>
    </div>


    <div id="recent" class="container mx-auto py-8">
        <div class="w-full p-4">
            <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                <h1 class="text-3xl font-thin md:mt-36">Recent Works</h1>
                <p class="text-gray-500">Sales boosting, high-quality creative design</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                 <a href="{{ url('/pokemon') }}" target="_blank" rel="noopener noreferrer"><img src="https://clipground.com/images/pokemon-logo-png-5.png"  class="rounded-3xl border-gray-700 border-2"></a>
                 <a href="https://www.marvel.com/characters/ghost-spider-gwen-stacy" target="_blank" rel="noopener noreferrer"><img src="https://cdn0.vox-cdn.com/thumbor/Aut6dmnxhWXDzbBUXJ3GIhSUFp4=/0x68:1000x631/1600x900/cdn0.vox-cdn.com/uploads/chorus_image/image/30708815/last.fm_logo_red.0.jpg"  class="rounded-3xl border-gray-700 border-2"></a>
                 <a href="https://www.marvel.com/characters/ghost-spider-gwen-stacy" target="_blank" rel="noopener noreferrer"><img src="https://i.ytimg.com/vi/kafnx63GuYo/maxresdefault.jpg"  class="rounded-3xl border-gray-700 border-2"></a>
                 <a href="https://www.marvel.com/characters/ghost-spider-gwen-stacy" target="_blank" rel="noopener noreferrer"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/fs/0fa904172862121.6486f1397c89e.jpg"  class="rounded-3xl border-gray-700 border-2"></a>
            </div>
        </div>
    </div>


    <div class="flex container mx-auto py-8 mt-36">
        <div class="w-full md:w-1/2 p-4 flex flex-col justify-center items-start text-2xl">
            <div>
                <p class="leading-loose">Hi, I’m Fardan. A software developer;<br>
                I've always had a strong curiosity about how things work and how they're made. 
                It's been a lifelong passion of mine to understand the inner workings of objects
                and the processes behind their creation. Whether it's a mechanical device or a work of art,
                I'm fascinated by the underlying mechanisms and principles that bring them to life.
                Exploring and uncovering these secrets has become a driving force in my life.
                
                </p>
            </div>
        </div>
    </div>
    
    <div id="service" class="container mx-auto py-8">
        <h1 class="text-4xl font-bold text-gray-800 mt-36">Services</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-12 text-4xl">
            <div>
                <p>Python</p>
            </div>
            <div>
                <p>C++</p>
            </div>
            <div>
                <p>C#</p>
            </div>
            <div>
                <p>HTML / CSS / JS / PHP</p>
            </div>
            <div>
                <p>Kotlin</p>
            </div>
            <div>
                <p>Flutter / Dart</p>
            </div>
            <div>
                <p>Java</p>
            </div>
            <div>
                <p>Mobile Application Dev</p>
            </div>
            <div>
                <p>Web Application Dev</p>
            </div>
        </div>
        <div class="mt-28">
            <p class="text-gray-400 text-lg">Illustrator, XD, Microsoft Office</p>
        </div>
    </div>      

    <div class="flex container mx-auto py-8 mt-24">
        <div class="w-full md:w-1/2 p-4 flex flex-col justify-center items-start text-2xl">
            <div>
                <p class="leading-loose">Let’s see if we’re a good fit. I’ll give
                you a guided tour of how I work,
                ask how I can help, and answer any
                questions you might have</p>
            </div>

            <div class="self-start mt-10">
                    <a href="https://wa.link/1yl08x" class="border border-gray-300 inline-block px-4 py-2 rounded-full transition duration-300 text-black hover:text-white hover:bg-black">Book a call</a>
            </div>
        </div>
    </div>

    <div class="flex container mx-auto py-8 mt-10">
        <span class="text-sm">fardan.work24@gmail.com</span>
        <a href="https://my.linkedin.com/in/muhammad-fardan-3920a7203" class="text-sm ml-10">LinkedIn</a>
        <a href="https://github.com/FardanRashidi" class="text-sm ml-10">Github</a>
        <span class="text-sm ml-auto">and our adventure together is soon to begin!</span>
    </div>


    <script>
        var imageLists = json($imageLists);
        var currentImageIndex = 0;

        function changeImage(index) {
            var galleryImage = document.getElementById("gallery-image");
            
            if (index >= 0 && index < imageLists[0].length) {
                galleryImage.src = imageLists[0][index];
                currentImageIndex = index;
            }
        }

        // Automatically change image every 5 seconds
        setInterval(function() {
            currentImageIndex = (currentImageIndex + 1) % imageLists[0].length;
            changeImage(currentImageIndex);
        }, 5000); // 5000 milliseconds = 5 seconds
    </script>

@endsection
