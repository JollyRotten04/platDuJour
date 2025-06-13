<!-- Imports and Binds -->
<script>
    import Header from "$lib/components/Header/Header.svelte";
    import SelectionCarouselMain from "$lib/components/SelectionCarouselMain/SelectionCarouselMain.svelte";
    import RecipesToInspire from "$lib/components/RecipesToInspire/RecipesToInspire.svelte";
    import FridgeIngredientsFeature from "$lib/components/FridgeIngredientsFeature/FridgeIngredientsFeature.svelte";
    import Footer from "$lib/components/Footer/Footer.svelte";

    let currentPage = "Recipes";

    let burgerClicked = false;
</script>

<!-- Recipes Page -->
<div>


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

                <div class="flex flex-col gap-4 md:gap-6 lg:gap-8 h-fit">

                    <!-- Selection Carousel Main -->
                    <SelectionCarouselMain bind:currentPage></SelectionCarouselMain>

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