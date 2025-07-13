<!-- View Content Page -->
<div>
    <div draggable="false" class="h-dvh max-h-dvh w-full max-w-dvw overflow-x-hidden overflow-y-auto p-4 pt-16 bg-[#e3f0eb] relative">

        <!-- Header -->
        <Header bind:currentPage bind:data bind:burgerClicked></Header>

        <!-- Main Contents Container -->
        <div draggable="false" class="h-full w-full max-w-full absolute left-0 pt-4 sm:pt-6 md:pt-6 lg:pt-6">

            <!-- Bottom Container -->
            <div class="p-4 sm:p-6 md:p-8 lg:p-10">

                <div class="flex flex-col gap-4 md:gap-6 lg:gap-8 h-fit">

                    <!-- Button Container -->
                    <div>
                        <!-- Button -->
                        <button class="bg-[#1E3D30] py-3 px-4 w-fit h-fit rounded-lg cursor-pointer select-none" on:click={goBack}>
                            <p class="text-white text font-extrabold">BACK</p>
                        </button>
                    </div>

                    <!-- Main Content -->
                    {#if data?.image_path}
                        <img src={data.image_path} alt="Cover">
                    {/if}

                    <div class="flex flex-col gap-4">
                        <div class="landscape:px-6 md:landscape:px-12 lg:landscape:px-24">
                            <div class="w-full relative h-full flex-col flex gap-2 sm:gap-4 md:gap-4 lg:gap-4 overflow-hidden rounded-lg bg-[#1E3D30] p-6 sm:p-8 md:p-8 lg:p-10">
                                <p class="font-bold text-white text-3xl">{data.article_title ? data.article_tile : data.recipe_name}</p>

                                <!-- Recipe Description Container -->
                                <div class="flex justify-between">

                                    <div>
                                        {#if datePublished}
                                            <div class="flex flex-col">
                                                <p class="text-white text-sm md:text-base lg:text-xl select-none">Date Published: <span class="font-bold">{datePublished}</span></p>
                                            </div>
                                        {/if}

                                        {#if data.recipe_category}
                                            <div class="flex flex-col">
                                                <p class="text-white text-sm md:text-base lg:text-xl select-none">Category: <span class="font-bold">{data.recipe_category.charAt(0).toUpperCase() + data.recipe_category.slice(1)}</span></p>
                                            </div>
                                        {/if}

                                        {#if data.recipe_cooktime && data.recipe_calories}
                                            <div class="flex gap-4">

                                                <!-- Caloric Content -->
                                                <div>
                                                    <p class="text-white text-sm md:text-base lg:text-xl select-none font-semibold">{data.recipe_calories} kcal</p>
                                                </div>

                                                <div class="flex items-center gap-2">

                                                    <img src="/viewContentIcons/cookingTime/cookingTime.svg" class="h-4 md:h-5 lg:h-6" alt="">

                                                    <p class="text-white text-sm md:text-base lg:text-xl select-none font-semibold">{data.recipe_cooktime}</p>
                                                </div>

                                            </div>
                                        {/if}
                                    </div>
                        

                                    <!-- Rating -->
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2">

                                            {#if count > 0}
                                                {#each range(count) as number}
                                                    <img src="/star/starFilled.svg" class="h-3 md:h-5 lg:h-7" alt="">
                                                {/each}
                                            {/if}
                                        </div>

                                        <p class="text-white text-sm md:text-lg lg:text-xl font-normal ml-auto">{data.article_review_count ? data.article_review_count : data.recipe_review_count} reviews</p>
                                    </div>
                                </div>

                                <!-- Options Container -->
                                <div class="flex justify-between">

                                    <!-- Profile Picture and Username -->
                                    <div class="flex gap-4 items-center">

                                        <div>
                                            <div class="h-4 md:h-10 lg:h-16 bg-stone-300 rounded-full aspect-square"></div>

                                            <!-- <img src="" alt=""> -->
                                        </div>

                                        <p class="text-white text-base md:text-lg lg:text-xl font-semibold">{data.article_author ? data.article_author : data.recipe_author}</p>
                                    </div>

                                    <!-- Options Container -->
                                    <div class="flex gap-4">
                                        
                                        <!-- Favourite Icon -->
                                        <button class="p-4 bg-white rounded-lg shadow-xl" on:click={loggedIn ? favourite : goToLogin}>

                                            {#if articleFavourited}
                                                <img draggable="false" src="/viewContentIcons/optionsIcons/filled-heart.svg" class="select-none cursor-pointer h-4 md:h-6 lg:h-8" alt="">
                                            {:else}
                                                <img draggable="false" src="/viewContentIcons/optionsIcons/unfilled-heart.svg" class="select-none cursor-pointer h-4 md:h-6 lg:h-8" alt="">
                                            {/if}
                                        </button>

                                        <!-- Bookmark Icon -->
                                        <button class="p-4 bg-white rounded-lg shadow-xl" on:click={loggedIn ? bookmark : goToLogin}>
                                            {#if articleBookmarked}
                                                <img draggable="false" src="/viewContentIcons/optionsIcons/filled-bookmark.svg" class="select-none cursor-pointer h-4 md:h-6 lg:h-8" alt="">
                                            {:else}
                                                <img draggable="false" src="/viewContentIcons/optionsIcons/unfilled-bookmark.svg" class="select-none cursor-pointer h-4 md:h-6 lg:h-8" alt="">
                                            {/if}
                                        </button>

                                        <!-- Report Button -->
                                        <button class="p-4 bg-white rounded-lg shadow-xl" on:click={report}>
                                            <img draggable="false" src="/viewContentIcons/optionsIcons/report.svg" class="select-none cursor-pointer h-4 md:h-6 lg:h-8" alt="">
                                        </button>
                                    </div>
                                </div>

                                <!-- Recipe Description Container -->
                                {#if data.recipe_description}
                                    <div class="flex flex-col flex-1">
                                        
                                        <p class="text-white text-sm md:text-lg lg:text-xl font-normal">Description: </p>   

                                        <p class="text-white text-sm md:text-lg lg:text-xl font-semibold"> {data.recipe_description} </p>
                                    </div>
                                {/if}

                            </div>

                            <div class="flex flex-col landscape:py-4 md:landscape:py-8 lg:landscape:py-12">
                                <!-- Article Text Content Container -->
                                <div class="flex flex-1 p-4 landscape:px-8 md:landscape:px-24 lg:landscape:px-36 justify-between">
    
                                    <p class="text-black text-xl leading-14 font-normal">{data.article_content ? data.article_content : data.recipe_ingredients}</p>

                                    <!-- Nutritional Value -->
                                    {#if data.nutritional_value}
                                        <div class="h-64 p-4 aspect-square bg-amber-400">
                                            <p class="text-black text-xl leading-14 font-normal">{data.nutritional_value}</p>
                                        </div>
                                    {/if}
                                </div>

                                {#if data.steps}
                                    <p class="text-black text-xl leading-14 font-normal">{data.steps}</p>
                                {/if}

                                <!-- Rate this Article option -->
                                <div class="flex flex-col flex-1 items-center py-6 md:py-12 lg:py-16">

                                    <p>Rate This Article:</p>

                                    <!-- Fillable Star Container -->
                                    <!-- Star container with reference -->
                                    <!-- svelte-ignore a11y_no_static_element_interactions -->
                                    <div
                                        class="flex gap-2"
                                        bind:this={starContainer}
                                        on:mouseleave={handleMouseLeave}
                                    >
                                        {#each Array(totalStars) as _, i}
                                        <!-- svelte-ignore a11y_click_events_have_key_events -->
                                        <!-- svelte-ignore a11y_no_noninteractive_element_interactions -->
                                        <!-- svelte-ignore a11y_missing_attribute -->
                                        <img
                                            src={i < selectedRating ? filledStar : unfilledStar}
                                            class="h-4 md:h-8 lg:h-12 select-none cursor-pointer"
                                            draggable="false"
                                            on:click={() => setRating(i + 1)}
                                        />
                                        {/each}
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Recipes to Inspire Component -->
                        <RecipesToInspire></RecipesToInspire>

                        <!-- Footer -->
                        <Footer></Footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Imports and Binds -->
<script lang="ts">
    import { goto } from '$app/navigation';
    import { sharedData } from '$lib/stores/store.js';
    import { loginCheck } from '$lib/stores/loginCheckStore.js';
    import { pageCheck } from '$lib/stores/pageCheck';
    import Header from "$lib/components/Header/Header.svelte";
    import RecipesToInspire from "$lib/components/RecipesToInspire/RecipesToInspire.svelte";
    import Footer from "$lib/components/Footer/Footer.svelte";

    let currentPage = "View-Content";
    let burgerClicked = false;
    let articleFavourited = false;
    let articleBookmarked = false;
    // let categorySelected: string = '';
    // let typeSelected:string = '';
    function range(n: number) {
        return Array.from({ length: n }, (_, i) => i + 1);
    }

    // export let data;
    $: data = $sharedData?.data;
    $: count = data?.article_rating ?? data?.recipe_rating ?? 0;
    $: loggedIn = Boolean($loginCheck?.data);

    // console.log('CurrentPage:', selectedRecipe);

    // $: console.log(count);
    $: datePublished = data?.published_at ? new Date(data.published_at).toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  }) : null;
    let starContainer: HTMLDivElement;
    const totalStars = 5;

    // $: console.log(data);

        const filledStar = '/viewContentIcons/rateIcons/filled-star.svg';
        const unfilledStar = '/viewContentIcons/rateIcons/unfilled-star.svg';

        let selectedRating = 0;

        // Set rating permanently on click
        function setRating(rating: number) {
            selectedRating = rating;
        }

        // Reset rating if mouse leaves while dragging
        function handleMouseLeave(event: MouseEvent) {
            if (event.buttons === 1) {
            // Only reset if the user is dragging (left mouse button pressed)
            selectedRating = 0;
            }
        }

    function goBack(){

        goto(`/articles`);
    }

    function favourite(){

        if(articleFavourited){
            articleFavourited = false;
        }

        else{
            articleFavourited = true;
        }
    }

    function bookmark(){

       if(articleBookmarked){
            articleBookmarked = false;
        }

        else{
            articleBookmarked = true;
        }
    }

    function report(){

       console.log('reported');
    }

    function goToLogin(){

        goto(`/login`);
    }

</script>