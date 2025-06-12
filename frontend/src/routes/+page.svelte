<!-- Imports -->
<script lang="ts">

    // Components
    import Header from "$lib/components/Header/Header.svelte";
    import MobileNavbarPopup from "$lib/components/MobileNavbarPopup/MobileNavbarPopup.svelte";
    import SlideshowHero from "$lib/components/SlideshowHero/SlideshowHero.svelte";
    import RecipesToInspire from "$lib/components/RecipesToInspire/RecipesToInspire.svelte";
    import FridgeIngredientsFeature from "$lib/components/FridgeIngredientsFeature/FridgeIngredientsFeature.svelte";
    import Footer from "$lib/components/Footer/Footer.svelte";

    // Variable to check if burger icon was clicked
    let burgerClicked = false;

    // Current page
    let currentPage = "Home";

</script>

<!-- Master Container -->
<div>
    {#if burgerClicked}
        <MobileNavbarPopup  bind:currentPage bind:burgerClicked></MobileNavbarPopup>

    {:else}
        <div></div>

    {/if}

    <div draggable="false" class="h-dvh max-h-dvh w-full max-w-dvw overflow-x-hidden overflow-y-auto p-4 pt-16 bg-[#e3f0eb] relative">

        <!-- Header -->
        <Header bind:currentPage bind:burgerClicked></Header>

        <!-- Main Contents Container -->
        <div draggable="false" class="h-full w-full max-w-full absolute left-0 pt-4 sm:pt-6 md:pt-6 lg:pt-6">

            <!-- Hero Image -->
            <div class="h-fit">
                <img src="/heroImage/heroSectionImage.svg" draggable="false" class="object-fit w-full select-none" alt="">
            </div>

            <!-- Bottom Container -->
            <div class="p-4 sm:p-6 md:p-8 lg:p-10">

                <div class="flex flex-col gap-4 h-fit">

                    <!-- Slideshow for Hero Section -->
                    <SlideshowHero></SlideshowHero>

                    <!-- Recipes to Inspire Component -->
                    <RecipesToInspire></RecipesToInspire>

                    <!-- What's In The Fridge Featire -->
                    <FridgeIngredientsFeature></FridgeIngredientsFeature>

                    <!-- Footer -->
                    <Footer></Footer>
                </div>
            </div>
        </div>
    </div>
</div>