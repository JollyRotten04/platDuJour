<style>

</style>

<div class="landscape:bg-[#1E3D30] my-auto h-full w-full flex rounded-xl landscape:rounded-3xl landscape:md:rounded-4xl landscape:shadow-xl overflow-hidden">

    <!-- Left Container -->
    <div class="flex flex-1 portrait:hidden">
        <img src="/heroImage/heroSectionImage.svg" class="object-cover" alt="">
    </div>

    <!-- Right Container -->
    <div class="flex flex-col flex-1 w-full p-4 portrait:p-0 md:p-4 lg:p-4 landscape:md:p-6 landscape:lg:p-8">

        <p class="text-[#1E3D30] landscape:text-white font-semibold text-xl landscape:text-base landscape:md:text-lg landscape:lg:text-2xl portrait:md:text-3xl portrait:lg:text-4xl text-center w-full md:mt-4 lg:mt-8">Hello! Log into your account!</p>

        <form action="?" method="POST" class="flex flex-col flex-1 w-full justify-center" on:submit|preventDefault={handleLogin}>
            <!-- Bottom Container -->
            <div class="flex flex-col flex-1 gap-12 landscape:gap-6 justify-center">

                <!-- Desired Username Field Container -->
                <div class="flex flex-col gap-2 {isLogin ? "hidden" : ""}">

                    <p class="text-[#1E3D30] landscape:text-white font-light text-base portrait:md:text-3xl portrait:lg:text-4xl landscape:text-sm">Desired Username:</p>

                    <input name="username" type="text" placeholder="JohnDoe123" class="py-2 px-3 portrait:md:px-4 portrait:md:py-3 portrait:lg:px-6 portrait:lg:py-4 font-semibold text-base portrait:md:text-3xl portrait:lg:text-4xl landscape:text-sm bg-white rounded-lg md:rounded-2xl lg:rounded-3xl landscape:rounded-md landscape:md:rounded-lg shadow-base">
                </div>

                <!-- Email Field Container -->
                <div class="flex flex-col gap-2">

                    <p class="text-[#1E3D30] landscape:text-white font-light text-base portrait:md:text-3xl portrait:lg:text-4xl landscape:text-sm">Email:</p>

                    <input name="email" type="text" placeholder="exampleemail@example.com" class="py-2 px-3 portrait:md:px-4 portrait:md:py-3 portrait:lg:px-6 portrait:lg:py-4 font-semibold text-base portrait:md:text-3xl portrait:lg:text-4xl landscape:text-sm bg-white rounded-lg md:rounded-2xl lg:rounded-3xl landscape:rounded-md landscape:md:rounded-lg shadow-base">
                </div>

                <!-- Password Field Container -->
                <div class="flex flex-col gap-2">

                    <p class="text-[#1E3D30] landscape:text-white font-light text-base portrait:md:text-3xl portrait:lg:text-4xl landscape:text-sm">Password:</p>

                    <input name="password" type="password" placeholder="Your password here" class="py-2 px-3 portrait:md:px-4 portrait:md:py-3 portrait:lg:px-6 portrait:lg:py-4 font-semibold text-base portrait:md:text-3xl portrait:lg:text-4xl landscape:text-sm bg-white rounded-lg md:rounded-2xl lg:rounded-3xl landscape:rounded-md landscape:md:rounded-lg shadow-base">
                </div>

                 <!-- Desired Username Field Container -->
                <div class="flex flex-col gap-2 {isLogin ? "hidden" : ""}">

                    <p class="text-[#1E3D30] landscape:text-white font-light text-base portrait:md:text-3xl portrait:lg:text-4xl landscape:text-sm">Desired Username:</p>

                    <input name="retypePassword" type="password" placeholder="Confirm password" class="py-2 px-3 portrait:md:px-4 portrait:md:py-3 portrait:lg:px-6 portrait:lg:py-4 font-semibold text-base portrait:md:text-3xl portrait:lg:text-4xl landscape:text-sm bg-white rounded-lg md:rounded-2xl lg:rounded-3xl landscape:rounded-md landscape:md:rounded-lg shadow-base">
                </div>

                <!-- Or Login With Option -->
                <div class="flex flex-col gap-4 landscape:gap-2">
                    <p class="text-base font-semibold text-[#1E3D30] landscape:text-white text-center portrait:md:text-3xl portrait:lg:text-4xl">or login with:</p>

                    <!-- Options -->
                    <div class="flex gap-8 landscape:gap-4 justify-center">

                        <!-- Facebook -->
                        <div class="p-1.5 portrait:md:p-2 portrait:lg:p-3 bg-white rounded-full shadow-lg">
                            
                            <!-- Facebook Icon -->
                            <img src="/loginWithIcons/facebookIcon.svg" draggable="false" class="select-none h-8 landscape:h-6 portrait:md:h-10 md:h-8 portrait:lg:h-16 lg:h-12" alt="">
                        </div>

                        <!-- Google -->
                        <div class="p-1.5 portrait:md:p-2 portrait:lg:p-3 bg-white rounded-full shadow-lg">
                            
                            <!-- Google Icon -->
                            <img src="/loginWithIcons/googleIcon.svg" draggable="false" class="select-none h-8 landscape:h-6 portrait:md:h-10 md:h-8 portrait:lg:h-16 lg:h-12" alt="">
                        </div>
                    </div>
                </div>

                <!-- Change Login / Signup -->
                <button class="text-base font-semibold text-[#1E3D30] landscape:text-white text-center underline portrait:md:text-3xl portrait:lg:text-4xl" on:click={changeToRegister}>{isLogin ? "No account? Create one!" : "Already have an account? Login!"}</button>

                <!-- Captcha Check -->
                <div class="flex justify-center">
                    <div class="g-recaptcha" data-sitekey="6LdIbmArAAAAAEWnzFwufOgPA_tQR8VAOW6uO-Nq" bind:this={recaptchaContainer}></div>
                    <br/>
                    <input type="submit" value="Submit" class="w-0 h-0 opacity-0 pointer-events-none">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="select-none py-3 px-6 portrait:md:px-8 portrait:md:py-4 portrait:lg:px-10 portrait:lg:py-5 bg-[#1E3D30] landscape:bg-white text-white landscape:text-black font-semibold portrait:md:text-3xl portrait:lg:text-4xl rounded-lg md:rounded-2xl lg:rounded-3xl landscape:rounded-md landscape:md:rounded-lg shadow-lg">{isLogin ? "Login" : "Sign Up"}</button>
                </div>
            </div>
        </form>
    </div>

</div>

<!-- Imports and Binds -->
<script lang="ts">
 import { onMount } from 'svelte';

  let isLogin: boolean = true;

function changeToRegister(event: Event) {
    event.preventDefault(); // Prevent accidental form submission
    isLogin = !isLogin;
}

  let recaptchaContainer;

  // onMount(() => {
  //   window.onRecaptchaLoadCallback = () => {
  //     if (recaptchaContainer && window.grecaptcha) {
  //       window.grecaptcha.render(recaptchaContainer, {
  //         sitekey: '6LdIbmArAAAAAEWnzFwufOgPA_tQR8VAOW6uO-Nq'
  //       });
  //     }
  //   };

  //   if (window.grecaptcha && window.grecaptcha.render) {
  //     window.onRecaptchaLoadCallback();
  //   }
  // });
   function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    return null;
  }

async function handleLogin(event) {
  event.preventDefault();

  const formData = {
    email: 'admin@example.com',
    password: 'password',
  };

  try {
    // Step 1: Hit sanctum endpoint to get CSRF cookie
    await fetch('http://localhost:8000/sanctum/csrf-cookie', {
        credentials: 'include',
    });

    // Step 2: Get CSRF token from cookie
    const csrfToken = getCookie('XSRF-TOKEN');

    // Step 3: Make login request with CSRF token
    const loginRes = await fetch('http://localhost:8000/api/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-XSRF-TOKEN': csrfToken,
        Accept: 'application/json',
      },
      credentials: 'include',
      body: JSON.stringify(formData),
    });

    let data;
    const contentType = loginRes.headers.get("Content-Type");

    if (contentType && contentType.includes("application/json")) {
      data = await loginRes.json();
    } else {
      data = { message: 'No JSON returned' };
    }

    if (!loginRes.ok) {
      console.error('Login failed:', data);
    } else {
      console.log('Login successful:', data);
    }

  } catch (err) {
    console.error('Login failed:', err);
  }
}


</script>

