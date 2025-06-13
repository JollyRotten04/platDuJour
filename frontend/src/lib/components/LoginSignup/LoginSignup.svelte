<style>

</style>

<div class="landscape:bg-[#1E3D30] flex h-full w-full rounded-xl landscape:shadow-xl">

    <!-- Left Container -->
    <div class="flex flex-1 portrait:hidden">
        <img src="/heroImage/heroSectionImage.svg" class="object-cover" alt="">
    </div>

    <!-- Right Container -->
    <div class="flex flex-col flex-1 p-4">

        <p class="text-[#1E3D30] landscape:text-white font-semibold text-xl text-center w-full">Hello! Log into your account!</p>

        <!-- Bottom Container -->
        <div class="flex flex-col flex-1 gap-12 justify-center">

            <!-- Email Field Container -->
            <div class="flex flex-col gap-2">

                <p class="text-[#1E3D30] landscape:text-white font-light text-base">Email:</p>

                <input type="text" placeholder="exampleemail@example.com" class="py-2 px-3 font-semibold text-base bg-white rounded-lg shadow-base">
            </div>

            <!-- Password Field Container -->
            <div class="flex flex-col gap-2">

                <p class="text-[#1E3D30] landscape:text-white font-light text-base">Password:</p>

                <input type="password" placeholder="Your password here" class="py-2 px-3 font-semibold text-base bg-white rounded-lg shadow-base">
            </div>

            <!-- Cloudflare Captcha Check -->
            <div>

            </div>

            <!-- Or Login With Option -->
            <div>

            </div>

            <!-- Submit Button -->
            <div>
                <button class="select-none py-3 px-6 bg-[#1E3D30] text-white font-semibold rounded-lg shadow-lg">{isLogin ? "Login" : "Sign Up"}</button>
            </div>
        </div>
    </div>

</div>

<!-- Imports and Binds -->
<script lang="ts">
    export let isLogin:Boolean;
</script>