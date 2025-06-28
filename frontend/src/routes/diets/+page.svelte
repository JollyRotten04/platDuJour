<!-- Diets Page -->
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
                    <SelectionCarouselMain finishedFetching={finishedFetching} selectCategory={selectedCategory} dietSelected={dietSelected} listOfDiets={listOfDiets} bind:currentPage></SelectionCarouselMain>

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

<!-- Imports and Binds -->
<script lang="ts">
    import { onMount } from "svelte";
    import Header from "$lib/components/Header/Header.svelte";
    import SelectionCarouselMain from "$lib/components/SelectionCarouselMain/SelectionCarouselMain.svelte";
    import RecipesToInspire from "$lib/components/RecipesToInspire/RecipesToInspire.svelte";
    import FridgeIngredientsFeature from "$lib/components/FridgeIngredientsFeature/FridgeIngredientsFeature.svelte";
    import Footer from "$lib/components/Footer/Footer.svelte";

    let currentPage = "Diets";
    let dietSelected = '';

     const dietMap = {
        "Paleo": "paleo",
        "Keto": "keto",
        "Carnivore": "carnivore",
        "Vegetarian": "vegetarian",
        "Kosher": 'kosher',
        "Mediterranean": 'mediterranean'
            // add more as needed
        };


    // Setter function for selecting diet category
    function selectDiet(value: string){
        selectedCategory(value);
    }

    
    function selectedCategory(value: string) {
        // console.log(value);
        dietSelected = dietMap[value] || value;

        // console.log(dietSelected);
        showRecipes(dietSelected);
        // typeSelected = '';
        // listOfChoices = [];

        // Immediately trigger fetching if category is relevant
        // if (categorySelected === 'Paleo') {
        //     // You could show default or first type
        //     if (listOfTypes.length > 0) {
        //         showRecipes(listOfTypes[0].name);
        //     }
        // }
    }

    let burgerClicked = false;
    let finishedFetching: Boolean;

    // Define the type for your choices
    type Choice = {
        name: string;
        imagePath: string;
    };

    let listOfDiets: Choice [] = [
        {'name': 'Paleo', 'imagePath': '/selectionCarouselImages/diets/paleo.svg'}, 
        {'name': 'Keto', 'imagePath': '/selectionCarouselImages/diets/keto.svg'}, 
        {'name': 'Carnivore', 'imagePath': '/selectionCarouselImages/diets/carnivore.svg'}, 
        {'name': 'Vegetarian', 'imagePath': '/selectionCarouselImages/diets/vegetarian.svg'}, 
        {'name': 'Kosher', 'imagePath': '/selectionCarouselImages/diets/kosher.svg'},
        {'name': 'Mediterranean', 'imagePath': '/selectionCarouselImages/diets/mediterranean.svg'}];

    function getCookie(name: string): string | null {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }


    async function showRecipes(typeValue: string) {
        finishedFetching = false;

        // console.log(chosenCategory);

        const formData = { diet: typeValue };

        try {
            // Step 1: Get CSRF token
            await fetch('http://localhost:8000/sanctum/csrf-cookie', {
                credentials: 'include',
            });

            const csrfToken = getCookie('XSRF-TOKEN');

            const response = await fetch('http://localhost:8000/api/recipes', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-XSRF-TOKEN': csrfToken,
                    Accept: 'application/json',
                },
                credentials: 'include',
                body: JSON.stringify(formData),
            });

            const contentType = response.headers.get("Content-Type");
            let data = contentType?.includes("application/json")
                ? await response.json()
                : { message: 'No JSON returned' };

            if (!response.ok) {
                console.error('Fetch failed:', data);
                return;
            }

            console.log('Recipes fetched successfully:', data);
            listOfDiets = data.data; // Update with fetched recipes
        } catch (err) {
            console.error('Fetch failed:', err);
        }
        finally{
            finishedFetching = true;
        }
    }

    //  onMount(async () => {
    //     await fetchRecipes();
    // });
</script>
