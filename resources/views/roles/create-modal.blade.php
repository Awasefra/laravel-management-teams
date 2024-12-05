<div id="create-role-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-sm max-h-full" id="canvas">
        <div class="relative bg-white rounded-lg shadow border border-white">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t-lg bg-navbar">
                <h3 class="text-xl font-semibold text-white">
                    <div class="flex mb-1 text-gray-800">
                        Create Role
                    </div>
                </h3>

                <button type="button" id="close-btn"
                    class="end-2.5 text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="create-role-modal"
                    onclick="resetFormAccount('createAccountForm', this.closest('form'))">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form method="POST" id="createAccountForm">
                @csrf
                <div class="p-4 md:p-5">
                    <div class="mb-20">
                        <div>
                            <div class="mb-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name
                                </label>
                                <input type="text" id="name" name="name" aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    autocomplete="off" required>

                                <div id="error_name" class="error text-xs text-red-600"></div>
                                <!-- div untuk menampilkan pesan kesalahan -->
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" 
                    class="absolute right-2 bottom-3 items-center w-24 mr-3 px-2 py-2 text-sm font-medium text-white bg-navside border rounded-md hover:bg-hover hover:border-hover ">
                    <p class="w-full items-center text-md">
                        Create</p>
                </button>
                <button type="submit" class="hidden" id="btnSubmitCreateAccount">
                </button>
            </form>
        </div>
    </div>
</div>