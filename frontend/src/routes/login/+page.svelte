<!-- Imports and Binds -->
<script>
    import Header from "$lib/components/Header/Header.svelte";
    import LoginSignup from "$lib/components/LoginSignup/LoginSignup.svelte";

    let currentPage = "Login";

    let burgerClicked = false;
</script>

<!-- Recipes Page -->
<div>


    <div draggable="false" class="h-full w-full flex min-h-dvh min-w-dvw overflow-x-hidden overflow-y-auto p-4 pt-16 bg-[#e3f0eb] relative">

        <!-- Header -->
        <Header bind:currentPage bind:burgerClicked></Header>

        <!-- Main Contents Container -->
        <div draggable="false" class="flex flex-1 pt-4 md:p-6 lg:p-8 justify-center items-center">

            <LoginSignup></LoginSignup>

        </div>
    </div>
</div>