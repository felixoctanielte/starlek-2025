<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mini Gerda</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-cover bg-center bg-no-repeat text-white mb-8" style="background-image: url('{{ asset('images/bg.png') }}');">

@php
    // Desktop layout
    $groupsDesktop = [
        ['amarok.png', 'dwarves.png', 'eirlys.png'],
        ['fairy.png', 'griffin.png', 'heidrun.png', 'jotunn.png', 'lindworm.png'],
        ['odin.png', 'pegasus.png', 'raven.png', 'unicorn.png', 'valkyrie.png'],
    ];

    // Mobile layout
    $groupsMobile = [
        ['amarok.png', 'dwarves.png'],
        [
            'fairy.png', 'griffin.png', 'heidrun.png',
            'jotunn.png', 'lindworm.png', 'eirlys.png',
            'odin.png', 'pegasus.png', 'raven.png',
        ],
        ['unicorn.png', 'valkyrie.png'],
    ];

    // Profile
    $groupsProfile = [
        ['profile1.jpg', 'profile1.jpg', 'profile1.jpg'],
        ['profile1.jpg', 'profile1.jpg', 'profile1.jpg'],
        ['profile1.jpg', 'profile1.jpg', 'profile1.jpg'],
    ];

@endphp

<div>
    <h1 class="text-3xl font-bold text-center mt-16 mb-8">Nini Gerda</h1>
</div>
{{-- Desktop Layout --}}
<div class="hidden md:flex flex-col items-center justify-center h-screen space-y-4">
    @foreach ($groupsDesktop as $group)
        <div class="grid {{ count($group) === 3 ? 'grid-cols-3' : 'grid-cols-5' }} gap-4">
            @foreach ($group as $image)
                <img
                    class="cursor-pointer w-28 h-28 md:w-56 md:h-56 object-contain"
                    src="{{ asset('images/' . $image) }}"
                    alt="{{ pathinfo($image, PATHINFO_FILENAME) }}"
                    onclick="openModal('{{ asset('images/' . $image) }}', '{{ ucfirst(pathinfo($image, PATHINFO_FILENAME)) }} Division')"
                >
            @endforeach
        </div>
    @endforeach
</div>

{{-- Mobile Layout --}}
<div class="flex md:hidden flex-col items-center justify-center h-screen space-y-4">
    @foreach ($groupsMobile as $group)
        <div class="grid {{ count($group) <= 2 ? 'grid-cols-2' : 'grid-cols-3' }}">
            @foreach ($group as $image)
                <img
                    class="cursor-pointer w-32 h-32 md:w-56 md:h-56 object-contain"
                    src="{{ asset('images/' . $image) }}"
                    alt="{{ pathinfo($image, PATHINFO_FILENAME) }}"
                    onclick="openModal('{{ asset('images/' . $image) }}', '{{ ucfirst(pathinfo($image, PATHINFO_FILENAME)) }} Division')"
                >
            @endforeach
        </div>
    @endforeach
</div>

{{-- Modal --}}
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="p-6 text-center min-w-72 max-w-80 md:max-w-3xl " style="background-image: url('{{ asset('images/bg2.jpg') }}');">
        <img id="modalImage" src="" alt="modal image" class="w-36 h-36 -mt-24 object-contain mx-auto">
        <img id="modalTextImage" src="" class="w-28 h-28 -mt-14 object-contain mx-auto" alt="">
        <p class="text-sm font-[500] max-w-56 md:max-w-2xl mx-auto text-gray-700 mb-4 -mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, doloribus?</p>
        <button id="closeBtn" class="bg-gray-800 text-white mt-2 py-1 px-4 rounded-full cursor-pointer hover:bg-gray-300 transition-colors">Close</button>
    </div>
</div>

<script>
    const textImageMap = {
    amarok: "{{ asset('images/amarok_text.png') }}",
    dwarves: "{{ asset('images/dwarves_text.png') }}",
    eirlys: "{{ asset('images/eirlys_text.png') }}",
    fairy: "{{ asset('images/fairy_text.png') }}",
    griffin: "{{ asset('images/griffin_text.png') }}",
    heidrun: "{{ asset('images/heidrun_text.png') }}",
    jotunn: "{{ asset('images/jotunn_text.png') }}",
    lindworm: "{{ asset('images/lindworm_text.png') }}",
    odin: "{{ asset('images/odin_text.png') }}",
    pegasus: "{{ asset('images/pegasus_text.png') }}",
    raven: "{{ asset('images/raven_text.png') }}",
    unicorn: "{{ asset('images/unicorn_text.png') }}",
    valkyrie: "{{ asset('images/valkyrie_text.png') }}",
  };
  // Open the modal muahahaha
  function openModal(imageSrc, title) {
  document.getElementById("modalImage").src = imageSrc;

  // Extract filename without extension (e.g., 'amarok')
  const fileName = imageSrc.split('/').pop().split('.')[0];

  // Update text image based on the mapping
  const textImgSrc = textImageMap[fileName];
  document.getElementById("modalTextImage").src = textImgSrc || "";

  const modal = document.getElementById("modal");
  modal.classList.remove("opacity-0", "pointer-events-none");
  modal.classList.add("opacity-100", "pointer-events-auto");
}
  // Close the modal muahahaha
  document.getElementById("closeBtn").onclick = function() {
    const modal = document.getElementById("modal");
    modal.classList.remove("opacity-100", "pointer-events-auto");
    modal.classList.add("opacity-0", "pointer-events-none");
  }

  // Close the modal if clicking outside of the content area muahaha
  window.onclick = function(event) {
    if (event.target === document.getElementById("modal")) {
      const modal = document.getElementById("modal");
      modal.classList.remove("opacity-100", "pointer-events-auto");
      modal.classList.add("opacity-0", "pointer-events-none");
    }
  }
</script>

</body>
</html>
