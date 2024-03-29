<x-app-layout>

    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:grid-cols-12 lg:gap-8 lg:py-10 lg:pt-28 xl:gap-0">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight dark:text-white md:text-5xl xl:text-6xl">
                    Feel like you're going bananas?<br />Let us help you.</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg lg:mb-8 lg:text-xl">Lorem
                    ipsum dolor sit amet, nam ut enim definitiones. Id error option meliore mea, ex vis adolescens
                    mediocritatem. Has principes dignissim disputationi no, est ut soleat abhorreant, sit ei semper
                    hendrerit.</p>
                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    @auth
                        <button @click="showModal = true"
                            class="rounded-lg bg-yellow-400 px-4 py-2 text-sm font-semibold text-black hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 sm:mr-2 lg:mr-0 lg:px-5 lg:py-2.5">
                            Get Support
                        </button>
                    @endauth
                </div>
            </div>
            <div class="hidden lg:col-span-5 lg:mt-0 lg:flex">
                <img src="./images/monkey-working-laptop.png" alt="hero image">
            </div>
        </div>

    </section>

</x-app-layout>
