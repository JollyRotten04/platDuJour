<!-- Imports and Components -->
<script lang="ts">
     // Logic for carousel
    let messages = [
		"Explore hundreds of recipes from various categories. A myriad of flavors to satiate any craving",
		"Favorite recipe platform of users from all across the world, from various backgrounds. Anybody can find a recipe they’ll be sure to like",
		"Whether it be breakfast, lunch, dinner, dessert, or just a quick snack. You’ll surely find a recipe to get your taste buds excited",
	];

    let headings = [
        "Plat Du Jour, Today's Special!",
        "Trusted by countless food-goers!",
		"Endless options!."
    ];

    let imagePaths = [
        '/heroCarouselImages/carouselImage1.svg',
        '/heroCarouselImages/carouselImage2.svg',
        '/heroCarouselImages/carouselImage3.svg',
    ];

	let currentIndex = 0;
	let currentMessage = messages[currentIndex];
    let currentHeading = headings[currentIndex];
    let currentImage = imagePaths[currentIndex];

	// Change message every 3 seconds
	const interval = setInterval(() => {
		currentIndex = (currentIndex + 1) % messages.length;
		currentMessage = messages[currentIndex];
        currentHeading = headings[currentIndex];
        currentImage = imagePaths[currentIndex];
	}, 3000);

    // Cleanup when component is destroyed
	import { onDestroy } from "svelte";
	onDestroy(() => clearInterval(interval));
</script>

<!-- Slideshow Container -->
                    <div class="w-full h-full flex-col sm:flex-row md:flex-row lg:flex-row flex gap-2 sm:gap-4 md:gap-4 lg:gap-4 overflow-hidden rounded-lg bg-[#1E3D30] p-6 sm:p-8 md:p-8 lg:p-10">

                        <div class="w-full h-full flex flex-col gap-4 sm:gap-6 md:gap-6 lg:gap-6">

                            <p class="text-white text-base portrait:text-xl sm:text-xl md:text-2xl lg:text-3xl font-semibold select-none">Trusted by 10+ million users</p>

                            <!-- Dynamically replacing content -->
                            <div class="flex flex-col flex-1 sm:flex-row md:flex-row lg:flex-row gap-2">

                                <!-- Image Container -->
                                <div class="relative flex-1 sm:w-2/5 md:w-2/5 lg:w-2/5 flex flex-col">

                                    <!-- Image -->
                                    <img src={currentImage} draggable="false" class="relative z-10 bottom-3 right-3 w-full h-full object-fit" alt="Carousel Images" />

                                    <!-- Styling -->
                                    <div class="absolute h-full min-w-24 w-full bg-[#f8f4eb]"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4">

                                <!-- Quote Bottom -->
                                <img src="/quote/quote.svg" draggable="false" class="h-3 sm:h-5 md:h-6 lg:h-8 rotate-180 mt-auto mb-2 select-none" alt="">

                                <!-- Main Container -->
                                <div class="flex flex-col flex-1 box-border justify-center">

                                    <!-- Title -->
                                    <p class="text-lg sm:text-xl md:text-2xl lg:text-3xl text-white font-semibold select-none">{currentHeading}</p>

                                    <!-- Text -->
                                    <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-white font-normal select-none">{currentMessage}</p>
                                </div>

                                <!-- Quote Top -->
                                <img src="/quote/quote.svg" draggable="false" class="h-3 sm:h-5 md:h-6 lg:h-8 mt-4 select-none" alt="">
                            </div>
                    </div>