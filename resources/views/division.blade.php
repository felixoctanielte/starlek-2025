<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Divisions</title>
  @vite('resources/css/app.css')
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-cover h-screen bg-center bg-no-repeat text-white" style="background-image: url('{{ asset('images/bg.png') }}');">

  @php
  $groups = [
    ['id' => 1, 'image' => 'amarok.png', 'description' => 'A mighty wolf with great power.'],
    ['id' => 2, 'image' => 'dwarves.png', 'description' => 'Skilled miners and craftsmen.'],
    ['id' => 3, 'image' => 'eirlys.png', 'description' => 'A magical being with ice powers.'],
    ['id' => 4, 'image' => 'fairy.png', 'description' => 'A mischievous forest dweller.'],
    ['id' => 5, 'image' => 'griffin.png', 'description' => 'A majestic creature with the body of a lion and wings of an eagle.'],
    ['id' => 6, 'image' => 'heidrun.png', 'description' => 'A divine goat that produces mead.'],
    ['id' => 7, 'image' => 'jotunn.png', 'description' => 'A giant from the cold mountains.'],
    ['id' => 8, 'image' => 'lindworm.png', 'description' => 'A serpentine creature with great speed.'],
    ['id' => 9, 'image' => 'odin.png', 'description' => 'The all-father, the ruler of Asgard.'],
    ['id' => 10, 'image' => 'pegasus.png', 'description' => 'A winged horse known for its grace and speed.'],
    ['id' => 11, 'image' => 'raven.png', 'description' => 'A symbol of knowledge and wisdom.'],
    ['id' => 12, 'image' => 'unicorn.png', 'description' => 'A legendary horse with a single, spiraling horn.'],
    ['id' => 13, 'image' => 'valkyrie.png', 'description' => 'A warrior maiden serving Odin.'],
  ];
  @endphp

  <!-- Carousel -->
  <div class="relative w-full h-full overflow-hidden">
  <div
  id="circleWrapper"
  class="absolute left-1/2 top -bottom-[46%] md:-bottom-[55%] -translate-x-1/2 -translate-y-0
         lg:-left-[40%] lg:top-1/2 lg:translate-x-0 lg:-translate-y-1/2
         w-[90vw] h-[90vw] max-w-[800px] max-h-[800px] flex items-center justify-center"
>
  <div id="center" class="relative w-full h-full transition-transform duration-500">
    @foreach($groups as $group)
    <div
      class="item absolute cursor-pointer transform-gpu transition-transform duration-300 ease-in-out"
      data-id="{{ $group['id'] }}"
      onclick="rotateTo({{ $group['id'] }}, '{{ $group['image'] }}', '{{ $group['description'] }}')"
      id="item-{{ $group['id'] }}"
      style="width: 120px; height: 120px;"  {{-- Smaller for mobile --}}
      lg:style="width: 280px; height: 280px;" {{-- Larger for desktop --}}
    >
      <img
        src="{{ asset('images/' . $group['image']) }}"
        alt="{{ $group['image'] }}"
        class="w-full h-full object-cover rounded-full"
      />
    </div>
    @endforeach
  </div>
</div>
</div>

  <!-- Image Display + Description -->
<div class="absolute top-[20%] left-1/2 -translate-x-1/2 lg:-translate-x-0 lg:top-28 lg:left-auto lg:right-[4%] z-50 mx-auto lg:mx-0">
  <div class="w-[50vh] lg:w-full max-w-[500px] lg:max-w-[700px] aspect-[7/5] bg-cover bg-center relative mx-auto flex flex-col items-center justify-center gap-4 p-4"
     style="background-image: url('{{ asset('images/bg1.jpg') }}');">
  <!-- Description -->
  <!-- Selected Image -->
  <img
  id="imageContainer"
  class="w-[350px] h-[200px] lg:w-[500px] lg:h-[300px] object-cover object-center rounded-lg shadow-lg border border-white "
  alt="Selected image"
  />
  <div id="imageDescription" class="text-white text-lg p-4 w-full">
    Description will appear here.
  </div>
</div>
  </div>

  <!-- Script -->
  <script>
  document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll(".item");
    const totalItems = items.length;
    const sectionDeg = 360 / totalItems;
    const radianSectionDeg = sectionDeg * Math.PI / 180;

    function getRadius() {
    if (window.innerWidth < 768) {
        // Mobile
        return 240;
    } else if (window.innerWidth < 1024) {
        // Tablet (md)
        return 420;
    } else {
        // Desktop (lg and up)
        return 520;
    }
    }
    function getItemSize() {
    if (window.innerWidth < 768) {
        return 100;
    } else if (window.innerWidth < 1024) {
        return 180;
    } else {
        return 280;
    }
    }
    function getSelectedAngleOffset() {
    // Desktop: right (0deg), Tablet: top (-90deg), Mobile: top (-90deg)
    return window.innerWidth < 1024 ? -Math.PI / 2 : 0;
    }

    let currentIndex = 8; // Odin as default

    function positionItems() {
  const radiusLength = getRadius();
  const itemSize = getItemSize();
  const angleOffset = getSelectedAngleOffset();
  items.forEach((item, i) => {
    const angle = radianSectionDeg * (i - currentIndex) + angleOffset;
    const x = radiusLength * Math.cos(angle);
    const y = radiusLength * Math.sin(angle);
    item.style.position = "absolute";
    item.style.left = "50%";
    item.style.top = "50%";
    item.style.width = `${itemSize}px`;
    item.style.height = `${itemSize}px`;
    item.style.transform = `translate(${x - itemSize / 2}px, ${y - itemSize / 2}px) scale(${i === currentIndex ? 1.5 : 1})`;
    item.style.zIndex = i === currentIndex ? 10 : 1;
  });
}

    window.turnLeft = () => {
      currentIndex = (currentIndex - 1 + totalItems) % totalItems;
      positionItems();
      autoUpdateSelected();
    };

    window.turnRight = () => {
      currentIndex = (currentIndex + 1) % totalItems;
      positionItems();
      autoUpdateSelected();
    };

    window.rotateTo = (targetId, image, description) => {
      const targetIndex = Array.from(items).findIndex(item => item.dataset.id == targetId);
      if (targetIndex !== -1) {
        currentIndex = targetIndex;
        positionItems();

        const imageContainer = document.getElementById('imageContainer');
        const imageDescription = document.getElementById('imageDescription');

        imageContainer.src = `{{ asset('images') }}/${image}`;
        imageContainer.alt = image;
        imageDescription.textContent = description;
      }
    };

    function autoUpdateSelected() {
      const selectedItem = items[currentIndex];
      const image = selectedItem.querySelector('img').src.split('/').pop();
      const description = selectedItem.getAttribute('onclick').match(/'(.*?)'$/)[1];
      document.getElementById('imageContainer').src = `{{ asset('images') }}/${image}`;
      document.getElementById('imageContainer').alt = image;
      document.getElementById('imageDescription').textContent = description;
    }

    // Initial positioning and selection
    positionItems();
    rotateTo(9, 'odin.png', 'The all-father, the ruler of Asgard.');

    // Reposition items on resize
    window.addEventListener('resize', () => {
      positionItems();
    });
  });
</script>


</body>
</html>
