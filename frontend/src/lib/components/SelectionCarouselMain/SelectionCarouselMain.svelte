<style>
    /* CSS Code */
    .swiper-wrapper {
        transition-timing-function: linear;
        -webkit-transition-timing-function: linear;
    }

</style>

<!-- Main Selection Carousel Component -->
<div class="w-full relative h-full flex-col flex gap-2 sm:gap-4 md:gap-4 lg:gap-4 overflow-hidden rounded-lg bg-[#1E3D30] p-6 sm:p-8 md:p-8 lg:p-10">

    <!-- Header -->
    <div class="flex flex-col">

        <p class="select-none text-white font-semibold text-lg md:text-xl lg:text-2xl">Plat Du Jour, Today's Special!</p>
        <p class="select-none text-white font-normal text-sm md:text-base lg:text-lg">Please select a category:</p>

        <!-- Search Bar -->
        <div class="flex gap-2 md:gap-4 lg:gap-4 mb-2 md:mb-4 lg:mb-4 justify-end {currentPage === "Diets" ? "hidden" : ""}">

            <input type="text" placeholder={currentPage === "Recipes" ? "Cordon Bleu" : "Article Name"} class="select-none bg-white portrait:w-2/3 landscape:w-1/2 rounded-lg text-base p-2">

            <button class="text-black p-2 px-3 shadow-lg font-semibold bg-stone-200 rounded-lg select-none cursor-pointer">Search</button>
        </div>

        <hr class="h-px text-white">
    </div>

    <div class="w-full relative">
        <div class="swiper vertical-slide-carousel swiper-container relative h-96 landscape:md:h-124 landscape:lg:h-148">
            <div class="swiper-wrapper gap-4">

            {#if currentPage == 'Recipes'}

                {#if categorySelected === ''}
                    {#each listOfChoices as choice}

                        <div class="swiper-slide">
                            <div class="cursor-pointer bg-indigo-50 rounded-2xl h-96 landscape:md:h-124 landscape:lg:h-148 flex justify-center items-center overflow-hidden relative">
                                <span class="cursor-pointer h-full w-full"><button class="h-full w-full cursor-pointer" onclick={() => chooseCategory(`${choice.name}`)}><img draggable="false" src={choice.imagePath} class="cursor-pointer select-none h-full w-full object-cover" alt=""></button></span>
                                <div class="absolute bottom-4 right-4 h-fit w-fit bg-stone-200 p-3 px-4 rounded-xl shadow-xl landscape:shadow-2xl"><p class="text-black text-base landscape:text-2xl landscape:md:text-3xl font-bold select-none">{choice.name}</p></div>
                            </div>
                        </div>

                        <div class="swiper-pagination absolute green-500"></div>
                    {/each}

                {:else if typeSelected === ''}
                    {#each listOfTypes as type}

                        <div class="swiper-slide">
                            <div class="cursor-pointer bg-indigo-50 rounded-2xl h-96 landscape:md:h-124 landscape:lg:h-148 flex justify-center items-center overflow-hidden relative">
                                <span class="cursor-pointer h-full w-full"><button class="h-full w-full cursor-pointer" onclick={() => selectChoice(`${type.name}`)}><img draggable="false" src={type.imagePath} class="cursor-pointer select-none h-full w-full object-cover" alt=""></button></span>
                                <div class="absolute bottom-4 right-4 h-fit w-fit bg-stone-200 p-3 px-4 rounded-xl shadow-xl landscape:shadow-2xl"><p class="text-black text-base landscape:text-2xl landscape:md:text-3xl font-bold select-none">{type.name}</p></div>
                            </div>
                        </div>

                        <div class="swiper-pagination absolute green-500"></div>
                    {/each}


                {:else}
                    {#each listOfChoices as choice}

                        <div class="swiper-slide">
                            <div class="cursor-pointer bg-indigo-50 rounded-2xl h-96 landscape:md:h-124 landscape:lg:h-148 flex justify-center items-center overflow-hidden relative">
                                <span class="cursor-pointer h-full w-full"><button class="h-full w-full cursor-pointer" onclick={() => selectChoice(`${choice.recipe_name}`)}><img draggable="false" src={choice.image_path} class="cursor-pointer select-none h-full w-full object-cover" alt=""></button></span>
                                <div class="absolute bottom-4 right-4 h-fit w-fit bg-stone-200 p-3 px-4 rounded-xl shadow-xl landscape:shadow-2xl"><p class="text-black text-base landscape:text-2xl landscape:md:text-3xl font-bold select-none">{choice.recipe_name}</p></div>
                            </div>
                        </div>

                        <div class="swiper-pagination absolute green-500"></div>
                    {/each}

                {/if}

            {:else if currentPage === 'Diets'}

                {#if dietSelected === ''}
                    {#each listOfDiets as diet}
                        <div class="swiper-slide">
                            <div class="cursor-pointer bg-indigo-50 rounded-2xl h-96 landscape:md:h-124 landscape:lg:h-148 flex justify-center items-center overflow-hidden relative">
                                <span class="cursor-pointer h-full w-full"><button class="h-full w-full cursor-pointer" onclick={() => selectCategory(`${diet.name}`)}><img draggable="false" src={diet.imagePath} class="cursor-pointer select-none h-full w-full object-cover" alt=""></button></span>
                                    <div class="absolute bottom-4 right-4 h-fit w-fit bg-stone-200 p-3 px-4 rounded-xl shadow-xl landscape:shadow-2xl"><p class="text-black text-base landscape:text-2xl landscape:md:text-3xl font-bold select-none">{diet.name}</p></div>
                            </div>
                        </div>

                        <div class="swiper-pagination absolute green-500"></div>
                    {/each}

                {:else}
                        {#each listOfDiets as diet}
                            <div class="swiper-slide">
                                <div class="cursor-pointer bg-indigo-50 rounded-2xl h-96 landscape:md:h-124 landscape:lg:h-148 flex justify-center items-center overflow-hidden relative">
                                    <span class="cursor-pointer h-full w-full"><button class="h-full w-full cursor-pointer" onclick={() => selectCategory(`${diet.recipe_name}`)}><img draggable="false" src={diet.image_path} class="cursor-pointer select-none h-full w-full object-cover" alt=""></button></span>
                                    <div class="absolute bottom-4 right-4 h-fit w-fit bg-stone-200 p-3 px-4 rounded-xl shadow-xl landscape:shadow-2xl"><p class="text-black text-base landscape:text-2xl landscape:md:text-3xl font-bold select-none">{diet.recipe_name}</p></div>
                                </div>
                            </div>

                            <div class="swiper-pagination absolute green-500"></div>
                        {/each}

                    {/if}

                    {:else if currentPage === 'Articles'}
                        {console.log('Rendering Articles, listOfArticles:', listOfArticles)}
                        {#each listOfArticles as article}
                            <div class="swiper-slide">
                                <div class="cursor-pointer bg-indigo-50 rounded-2xl h-96 landscape:md:h-124 landscape:lg:h-148 flex justify-center items-center overflow-hidden relative">
                                    <span class="cursor-pointer h-full w-full"><button class="h-full w-full cursor-pointer" onclick={() => selectCategory(`${article.article_title}`)}><img draggable="false" src={article.image_path} class="cursor-pointer select-none h-full w-full object-cover" alt=""></button></span>
                                        <div class="absolute bottom-4 right-4 h-fit w-fit bg-stone-200 p-3 px-4 rounded-xl shadow-xl landscape:shadow-2xl"><p class="text-black text-base landscape:text-2xl landscape:md:text-3xl font-bold select-none">{article.article_title}</p></div>
                                </div>
                            </div>

                        <div class="swiper-pagination absolute green-500"></div>
                    {/each}
                {/if}
            </div>
        </div>
    </div>
</div>

<!--JAVASCRIPT CODE-->
<script lang="ts">
    import { onMount } from 'svelte';
    import Swiper from 'swiper/bundle';
    import 'swiper/css/bundle';

    let swiperInstance;

    // For Recipes Section
    export let select;
    export let selectCategory;
    export let currentPage;
    export let listOfChoices = [];
    export let listOfTypes = [];

    // For Diets Section
    export let dietSelected: string = '';
    export let listOfDiets = [];
    export let finishedFetching = false;

    // For Articles Section
    export let listOfArticles: any[] = [];

    console.log(listOfArticles);


    function initSwiper(isLandscape: boolean) {
        if (swiperInstance) {
            swiperInstance.destroy(true, true);
        }

        swiperInstance = new Swiper('.swiper-container', isLandscape
            ? {
                  loop: false,
                  direction: 'horizontal',
                  centeredSlides: false,
                  slideToClickedSlide: true,
                  spaceBetween: 10,
                  pagination: {
                      el: '.swiper-pagination',
                      clickable: true
                  },
                  breakpoints: {
                      1920: {
                          slidesPerView: 4,
                          spaceBetween: 30
                      },
                      1028: {
                          slidesPerView: 2,
                          spaceBetween: 10
                      },
                      990: {
                          slidesPerView: 1,
                          spaceBetween: 0
                      }
                  }
              }
            : {
                  loop: false,
                  direction: 'vertical',
                  mousewheel: {
                      releaseOnEdges: true
                  },
                  spaceBetween: 30,
                  grabCursor: true,
                  pagination: {
                      el: '.swiper-pagination',
                      clickable: true
                  }
              });
    }

    // Setter function to change value in parent component
    function selectChoice(value: string){
        select(value);
    }

    // Setter function to change value in parent component
    function chooseCategory(value: string){
        selectCategory(value);
    }

    $: console.log('myVar changed:', finishedFetching);

    onMount(() => {
        const mql = window.matchMedia('(orientation: landscape)');

        initSwiper(mql.matches);

        mql.addEventListener('change', (e) => {
            initSwiper(e.matches);
        });

        // categorySelected = '';
        // typeSelected = '';
    });
</script>
