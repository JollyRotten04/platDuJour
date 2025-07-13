<!-- Recipes to Inspire Component -->
<div class="h-fit w-full flex flex-col gap-2 rounded-lg bg-[#f8f4eb] p-4" draggable="false">

                    <!-- Title Container -->
                    <div class="flex items-center">
                        <hr class="bg-black w-full">
                         
                        <p class="text-sm sm:text-lg md:text-2xl lg:text-3xl text-black select-none font-semibold whitespace-nowrap px-2 md:px-4 lg:px-8">Recipes to Inspire</p>

                        <hr class="bg-black w-full">
                    </div>

                    <!-- Scrollable Container -->
                    <div class="scrollbar-hide h-fit w-full overflow-x-auto">

                        <!-- Inner Flex Container (Expands beyond viewport if needed) -->
                        <div class="scrollbar-hide flex gap-6 w-max py-2">

                            {#each recipes as recipe}
                            
                                <!-- Dynamically Added Content -->
                                <button class="cursor-pointer h-86 w-42 sm:w-48 md:w-56 lg:w-72 shadow-md p-2 sm:p-4 md:p-4 box-border flex flex-col rounded-xl bg-white" on:click={() => viewContent(recipe)}>

                                    <!-- Image -->
                                    <img src={recipe.image_path} draggable="false" class="h-18 sm:h-24 md:h-30 lg:h-38 object-cover w-full select-none rounded-lg" alt="Recipes To Inspire" />

                                    <!-- Info Container -->
                                    <div class="flex flex-col pt-2 sm:gap-1 md:gap-1 lg:gap-2 my-auto">

                                        <p class="text-black font-semibold text-[0.6rem] sm:text-xs md:text-sm lg:text-base select-none text-left">{recipe.recipe_name}</p>

                                        <!-- Food Category and Caloric Content -->
                                        <div class="flex justify-between">

                                            <p class="text-black text-[0.55rem] sm:text-[0.65rem] md:text-xs lg:text-sm font-light select-none">{recipe.recipe_category.charAt(0).toUpperCase() + recipe.recipe_category.slice(1)}</p>

                                            <p class="text-black text-[0.55rem] sm:text-[0.65rem] md:text-xs lg:text-sm font-light select-none">{recipe.recipe_calories} kcals</p>
                                        </div>

                                        <!-- Brief Description Container -->
                                        <div>
                                            <p class="text-black text-[0.5rem] sm:text-[0.65rem] md:text-xs lg:text-sm opacity-60 font-light select-none">{recipe.recipe_description}</p>
                                        </div>

                                        <!-- Reviews and Rating -->
                                        <div class="flex justify-between items-center">

                                            <!-- Review Count -->
                                            <p class="text-black text-[0.55rem] sm:text-[0.65rem] md:text-xs lg:text-sm font-light select-none">4.5k reviews</p>

                                            <!-- Rating Container -->
                                            <div class="flex gap-0.5">

                                               {#if recipe.recipe_rating > 0}
                                                    {#each range(recipe.recipe_rating) as number}
                                                        <img src="/star/starFilled.svg" class="h-3 md:h-4 lg:h-5 select-none" draggable="false" alt="Star {number}">
                                                    {/each}
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            {/each} 
                        </div>
                    </div>
                </div>

<!-- TypeScript -->
<script lang="ts">
	import { goto } from "$app/navigation";
    import { sharedData } from "$lib/stores/store";
    import { pageCheck } from "$lib/stores/pageCheck";
    import { onMount } from "svelte";

    let recipes = [];

    // console.log(recipes);

    async function fetchRecipes() {
            try {
                const response = await fetch('http://localhost:8000/api/recipes');
                const json = await response.json();
                recipes = json.data;

            } catch (error) {
                console.error('Error fetching recipes:', error);
            }
        }

    onMount(() => {
        fetchRecipes();
    });

    function range(n: number) {
        return Array.from({ length: n }, (_, i) => i + 1);
    }

    function viewContent(value:string){

        pageCheck.set({data: true});
        sharedData.set({data: value});
        goto(`/view-content/${value.recipe_slug}`);
    }
</script>