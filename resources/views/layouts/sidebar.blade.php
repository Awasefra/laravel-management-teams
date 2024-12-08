<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-navside border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-navside">
        <ul class="space-y-2 font-medium sidebar">
            <li>
                <a href="{{ route('home') }}"
                    class="flex items-center p-2 rounded-lg hover:bg-hover hover:text-slate-100 group {{ Request::is('home*') ? 'bg-active text-black' : 'text-gray-100' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="1em" viewBox="0 0 576 512">
                        <path
                            d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('roles.') }}"
                    class="flex items-center p-2 rounded-lg hover:bg-hover hover:text-slate-100 group {{ Request::is('roles*') ? 'bg-active text-black' : 'text-gray-100' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="1em" viewBox="0 0 576 512">
                        <path
                            d="M208 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304l0 128c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-223.1-28.6 47.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6l29.7 0c33.7 0 64.9 17.7 82.3 46.6l58.3 97c9.1 15.1 4.2 34.8-10.9 43.9s-34.8 4.2-43.9-10.9L328 256.9 328 480c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-128-16 0zM7 7C16.4-2.3 31.6-2.3 41 7l80 80c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 41C-2.3 31.6-2.3 16.4 7 7zM471 7c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9L471 7zM7 505c-9.4-9.4-9.4-24.6 0-33.9l80-80c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L41 505c-9.4 9.4-24.6 9.4-33.9 0zm464 0l-80-80c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0z" />
                    </svg>
                    <span class="ml-3">Role</span>
                </a>
            </li>
            <li>
                <a href="{{ route('personnels.') }}"
                class="flex items-center p-2 rounded-lg hover:bg-hover hover:text-slate-100 group {{ Request::is('personnels*') ? 'bg-active text-black' : 'text-gray-100' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="1em" viewBox="0 0 576 512">
                    <path
                        d="M208 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304l0 128c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-223.1-28.6 47.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6l29.7 0c33.7 0 64.9 17.7 82.3 46.6l58.3 97c9.1 15.1 4.2 34.8-10.9 43.9s-34.8 4.2-43.9-10.9L328 256.9 328 480c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-128-16 0zM7 7C16.4-2.3 31.6-2.3 41 7l80 80c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 41C-2.3 31.6-2.3 16.4 7 7zM471 7c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9L471 7zM7 505c-9.4-9.4-9.4-24.6 0-33.9l80-80c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L41 505c-9.4 9.4-24.6 9.4-33.9 0zm464 0l-80-80c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0z" />
                </svg>
                <span class="ml-3">PersonnEls</span>
            </a>
            </li>
            <li>
                <a href="{{ route('schedules.') }}"
                class="flex items-center p-2 rounded-lg hover:bg-hover hover:text-slate-100 group {{ Request::is('schedules*') ? 'bg-active text-black' : 'text-gray-100' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="1em" viewBox="0 0 576 512">
                    <path
                        d="M208 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304l0 128c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-223.1-28.6 47.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6l29.7 0c33.7 0 64.9 17.7 82.3 46.6l58.3 97c9.1 15.1 4.2 34.8-10.9 43.9s-34.8 4.2-43.9-10.9L328 256.9 328 480c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-128-16 0zM7 7C16.4-2.3 31.6-2.3 41 7l80 80c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 41C-2.3 31.6-2.3 16.4 7 7zM471 7c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9L471 7zM7 505c-9.4-9.4-9.4-24.6 0-33.9l80-80c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L41 505c-9.4 9.4-24.6 9.4-33.9 0zm464 0l-80-80c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0z" />
                </svg>
                <span class="ml-3">Schedule</span>
            </a>
            </li>
        </ul>
    </div>
</aside>