<div id="userModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4  overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-4xl md:h-auto bg-gray-700">
        <!-- Modal content -->
        <div class="relative bg-slate-600 rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t ">
                <h2 class="text-xl font-semibold text-gray-900 ">
                    USER DETAILS
                </h2>
                <button id="close" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="staticModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div id="myTable" class="modal-body p-6 space-y-6">
                <table class="w-full text-sm  text-gray-500 text-center">
                    <thead class="text-xs text-black font-bold uppercase border-b border-gray-800 ">
                        <tr>
                            <th scope="col" class="py-3 px-6 bg-slate-300 ">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6 bg-slate-100">
                                CUSTOMER
                            </th>
                            <th scope="col" class="py-3 px-6 bg-slate-300">
                                ADDRESS
                            </th>
                            <th scope="col" class="py-3 px-6 bg-slate-100">
                                PHONE
                            </th>
                            <th scope="col" class="py-3 px-6 bg-slate-300">
                                EMAIL
                            </th>
                            <th scope="col" class="py-3 px-6 bg-slate-100">
                                CREATED DATE
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="border-b border-gray-400 ">
                            <td id="view_id" class=" py-4 px-6 bg-slate-300 ">
                            </td>
                            <td id="view_name" class=" py-4 px-6 bg-slate-100">
                            </td>
                            <td id="view_email" class="py-4 px-6 bg-slate-300 ">
                            </td>
                            <td id="view_phone" class="py-4 px-6 bg-slate-100">
                            </td>
                            <td id="view_address" class="py-4 px-6 bg-slate-300">
                            </td>
                            <td id="view_user-date" class="py-4 px-6 bg-slate-100">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Modal footer -->
            <div class="grid relative  p-6 space-x-2 border-t border-gray-200 rounded-b">
                <button data-modal-toggle="staticModal" value="<?php echo $id; ?>" type=" button" class="delUserBtn top-1 right-6 absolute  text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm px-8 py-2.5 text-center ">DELETE</button>
            </div>
        </div>
    </div>
</div>


