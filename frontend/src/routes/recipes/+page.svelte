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
                    <SelectionCarouselMain categorySelected={categorySelected} typeSelected={typeSelected} listOfChoices={listOfChoices} listOfTypes={listOfTypes} select={select} selectCategory={selectCategory} bind:currentPage></SelectionCarouselMain>

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

    let currentPage = "Recipes";
    let burgerClicked = false;
    let categorySelected: string = '';
    let typeSelected:string = '';

     // Define the type for your choices
    type Choice = {
        name: string;
        imagePath: string;
    };

    let listOfChoices: Choice [] = [
        {'name': 'Breakfast', 'imagePath': '/selectionCarouselImages/mealCategories/breakfast.svg'}, 
        {'name': 'Snack', 'imagePath': '/selectionCarouselImages/mealCategories/snacks.svg'}, 
        {'name': 'Lunch', 'imagePath': '/selectionCarouselImages/mealCategories/lunch.svg'}, 
        {'name': 'Dessert', 'imagePath': '/selectionCarouselImages/mealCategories/dessert.svg'}, 
        {'name': 'Dinner', 'imagePath': '/selectionCarouselImages/mealCategories/dinner.svg'}];

    
    let listOfTypes: Choice [] = [
        {'name': 'Meat-Based', 'imagePath': '/selectionCarouselImages/recipeTypes/meatBased.svg'}, 
        {'name': 'Vegetarian', 'imagePath': '/selectionCarouselImages/recipeTypes/vegetarian.svg'}, 
        {'name': 'Seafood', 'imagePath': '/selectionCarouselImages/recipeTypes/seafood.svg'}, 
        {'name': 'Dairy', 'imagePath': '/selectionCarouselImages/recipeTypes/dairy.svg'}, 
        {'name': 'Bread & Baked', 'imagePath': '/selectionCarouselImages/recipeTypes/bread.svg'}];


    let listOfRecipes = [];

    function select(value: string){
        showRecipes(value);
    }

    function selectCategory(value: string){
        selectedCategory(value);
    }

    function getCookie(name: string): string | null {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    async function showRecipes(typeValue: string) {

        const typeMap = {
            "Meat-Based": "meat",
            "Vegetarian": "vegetarian",
            "Diary": "diary",
            "Seafood": "seafood",
            "Bread & Baked": 'bread'
            // add more as needed
        };

        const categoryMap = {
            "Breakfast": "breakfast",
            "Snack": "snack",
            "Lunch": "lunch",
            "Dessert": "dessert",
            "Dinner": 'dinner'
            // add more as needed
        };


        typeSelected = typeMap[typeValue] || typeValue; 
        let chosenCategory = categoryMap[categorySelected] || categorySelected; 

        // console.log(chosenCategory);

        const formData = { type: typeSelected, category: chosenCategory };

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
            listOfChoices = data.data; // Update with fetched recipes

        } catch (err) {
            console.error('Fetch failed:', err);
        }
    }

    function selectedCategory(value: string) {
        console.log(value);
        categorySelected = value;
        typeSelected = '';
        listOfChoices = [];

        // Immediately trigger fetching if category is relevant
        if (categorySelected === 'Meat-Based') {
            // You could show default or first type
            if (listOfTypes.length > 0) {
                showRecipes(listOfTypes[0].name);
            }
        }
    }


    onMount(async () => {
        await fetchRecipes();
    });
    
    async function fetchRecipes() {
        try {
            const response = await fetch('http://localhost:8000/api/recipes');
            listOfRecipes = await response.json();

            console.log(listOfRecipes);
        } catch (error) {
            console.error('Error fetching recipes:', error);
        }
    }
</script>