<footer class="py-6 text-white bg-[#023047]">
    <div class="container px-4 mx-auto">
        <div class="flex flex-col items-center space-y-4 md:flex-row md:justify-between md:space-y-0">
            <div class="text-center md:text-left">
                <p class="text-lg font-semibold">SendNotes</p>
                <p class="mt-2 text-sm">
                    &copy; {{ date('Y') }} SendNotes. All rights reserved.
                </p>
            </div>
            <div class="flex flex-col items-center space-y-2 md:flex-row md:space-y-0 md:space-x-6">
                <a href="{{ route('privacy-policy') }}" class="text-gray-400 hover:text-gray-300">Privacy Policy</a>
                <a href="{{ route('terms-of-service') }}" class="text-gray-400 hover:text-gray-300">Terms of Service</a>
                <a href="{{ route('contact') }}" class="text-gray-400 hover:text-gray-300">Contact Us</a>
            </div>
        </div>
    </div>
</footer>
