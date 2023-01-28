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
                    <button @click="showModal = true"
                        class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-center text-gray-900 border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 sm:w-auto">
                        Login
                    </button>
                    <button @click="showModal = true"
                        class="inline-flex items-center justify-center w-full px-5 py-3 mb-2 mr-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                        Register
                    </button>
                </div>
            </div>
            <div class="hidden lg:col-span-5 lg:mt-0 lg:flex">
                <img src="./images/monkey-working-laptop.png" alt="hero image">
            </div>
        </div>

        <x-utility.modal :showModal title="Hello">
            <p class="text-gray-900 dark:text-gray-200">
                Hello world!
            </p>
        </x-utility.modal>

    </section>

</x-app-layout>
