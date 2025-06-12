<!-- Imports and binds -->
<script lang="ts">
	import { onMount } from 'svelte';

    // Binds
    export let burgerClicked;
    export let currentPage: string;

    // Imported animations...
    import { fly } from 'svelte/transition';

    // Logic to check if burger icon was clicked
    function clickedIcon(){
        burgerClicked = false;
    }

    function changeSelectedOptionStyling(selected: string){

        // Updates the currentPage variable to reflect its new value on the parent component
        currentPage = selected;

        let home = document.getElementById('homeOption');;
        let recipes = document.getElementById('recipesOption');
        let diets = document.getElementById('dietsOption');
        let articles = document.getElementById('articlesOption');
        let login = document.getElementById('loginOption');

        switch(currentPage){

            case "Home":
                home?.classList.add('font-semibold', 'underline');
                recipes?.classList.remove('font-semibold', 'underline');
                diets?.classList.remove('font-semibold', 'underline');
                articles?.classList.remove('font-semibold', 'underline');
                login?.classList.remove('font-semibold', 'underline');
                break;

            case "Recipes":
                recipes?.classList.add('font-semibold', 'underline');
                home?.classList.remove('font-semibold', 'underline');
                diets?.classList.remove('font-semibold', 'underline');
                articles?.classList.remove('font-semibold', 'underline');
                login?.classList.remove('font-semibold', 'underline');
                break;

            case "Diets":
                diets?.classList.add('font-semibold', 'underline');
                recipes?.classList.remove('font-semibold', 'underline');
                home?.classList.remove('font-semibold', 'underline');
                articles?.classList.remove('font-semibold', 'underline');
                login?.classList.remove('font-semibold', 'underline');
                break;

            case "Articles":
                articles?.classList.add('font-semibold', 'underline');
                recipes?.classList.remove('font-semibold', 'underline');
                diets?.classList.remove('font-semibold', 'underline');
                home?.classList.remove('font-semibold', 'underline');
                login?.classList.remove('font-semibold', 'underline');
                break;

            case "Login":
                login?.classList.add('font-semibold', 'underline');
                recipes?.classList.remove('font-semibold', 'underline');
                diets?.classList.remove('font-semibold', 'underline');
                articles?.classList.remove('font-semibold', 'underline');
                home?.classList.remove('font-semibold', 'underline');
                break;
        }
    }

    onMount(() => {
        changeSelectedOptionStyling(currentPage);
    });
</script>

<!-- Mobile Navbar Popup -->
<div class="absolute top-0 left-0 z-200 h-full w-full">

    <!-- Overlay -->
    <!-- svelte-ignore a11y_consider_explicit_label -->
    <button class="h-full w-full" onclick={clickedIcon}><div class="h-full w-full bg-black opacity-40"></div></button>

    <!-- Navbar -->
    <div transition:fly="{{ x: 200, duration: 200 }}" class="fixed z-300 top-0 right-0 h-full w-42 sm:w-64 bg-[#e3f0eb] p-4 flex flex-col gap-4">

        <!-- Burger Icon -->
        <button onclick={clickedIcon}><img src="/mobileImages/burgerIcon.svg" class="h-3 ml-auto" alt="burger"/></button>

        <!-- Options Container -->
        <div class="flex flex-col flex-1 py-4 gap-8 sm:gap-12">

            <!-- Home -->
            <button id="homeOption" class="text-base sm:text-xl text-[#1E3D30] text-left cursor-pointer select-none" onclick={() => {changeSelectedOptionStyling("Home")}}>Home</button>

            <!-- Recipes -->
            <button id="recipesOption" class="text-base sm:text-xl text-[#1E3D30] font-normal text-left cursor-pointer select-none" onclick={() => {changeSelectedOptionStyling("Recipes")}}>Recipes</button>

            <!-- Diets -->
            <button id="dietsOption" class="text-base sm:text-xl text-[#1E3D30] font-normal text-left cursor-pointer select-none" onclick={() => {changeSelectedOptionStyling("Diets")}}>Diets</button>

            <!-- Articles -->
            <button id="articlesOption" class="text-base sm:text-xl text-[#1E3D30] font-normal text-left cursor-pointer select-none" onclick={() => {changeSelectedOptionStyling("Articles")}}>Articles</button>

            <!-- Login -->
            <button id="loginOption" class="text-base sm:text-xl text-[#1E3D30] font-normal text-left cursor-pointer select-none" onclick={() => {changeSelectedOptionStyling("Login")}}>Login</button>
        </div>
    </div>
</div>