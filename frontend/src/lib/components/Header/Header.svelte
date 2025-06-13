<!-- Imports, binds, and components -->
<script lang="ts">
	import { onMount } from "svelte";

    export let burgerClicked: Boolean;
    export let currentPage: string;

    console.log(currentPage);

    // Logic to check if burger icon was clicked
    function clickedIcon(){
        if(burgerClicked === true)
            burgerClicked = false;

        else    
            burgerClicked = true;
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

<!-- Header Component -->
<div class="select-none h-fit w-full flex flex-col fixed z-100 bg-[#e3f0eb] top-0 left-0 pt-2 pl-2 pr-2 box-border">

    <!-- Main Container -->
    <div class="h-full flex justify-between items-center px-2 md:px-6 lg:px-12">

        <!-- Logo -->
        <img src="/logo/logo.svg" draggable="false" class="h-14 sm:h-14 md:h-16 lg:h-18 landscape:h-12 sm:landscape:h-14 select-none" alt="">

        <!-- Burger Icon -->
        <button onclick={clickedIcon}><img src="/mobileImages/burgerIcon.svg" class="h-3 landscape:hidden md:hidden lg:hidden" alt="burger"/></button>

        <!-- Display when landscape or screen is large enough -->
        <div class="flex gap-6 portrait:hidden portrait:md:flex portrait:lg:flex md:gap-10 lg:gap-14">

            <button onclick={() => {changeSelectedOptionStyling("Home")}} id="homeOption" class="text-sm md:text-lg lg:text-xl text-[#1E3D30] cursor-pointer select-none"><a href="/">Home</a></button>
            <button onclick={() => {changeSelectedOptionStyling("Recipes")}} id="recipesOption" class="text-sm md:text-lg lg:text-xl text-[#1E3D30] cursor-pointer select-none"><a href="/recipes">Recipes</a></button>
            <button onclick={() => {changeSelectedOptionStyling("Diets")}} id="dietsOption" class="text-sm md:text-lg lg:text-xl text-[#1E3D30] cursor-pointer select-none"><a href="/diets">Diets</a></button>
            <button onclick={() => {changeSelectedOptionStyling("Articles")}} id="articlesOption" class="text-sm md:text-lg lg:text-xl text-[#1E3D30] cursor-pointer select-none"><a href="/articles">Articles</a></button>
            <button onclick={() => {changeSelectedOptionStyling("Login")}} id="loginOption" class="text-sm md:text-lg lg:text-xl text-[#1E3D30] cursor-pointer select-none"><a href="/login">Login</a></button>

        </div>
    </div>

    <!-- Divider Line -->
    <hr class="w-[98%] mx-auto">
</div>