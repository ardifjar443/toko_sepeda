<div id="productModal" class=" hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
        <h2 id="modalTipe" class="text-sm mb-1"></h2>
        <h2 id="modalTitle" class="text-3xl font-bold mb-4"></h2>
        <img id="modalImage" src="" alt="" class="w-full h-48 object-cover rounded-md mb-4">
        <p class="text-gray-700 mb-4 text-xl font-bold">Deskripsi : </p>
        <table>
            <tr>
                <td>
                    <p class="text-gray-700 mb-4">Harga</p>
                </td>
                <td>
                    <p class="text-gray-700 mb-4 mx-1">:</p>
                </td>
                <td>
                    <p id="modalPrice" class="text-gray-700 mb-4"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="text-gray-700 mb-4">Warna</p>
                </td>
                <td>
                    <p class="text-gray-700 mb-4 mx-1">:</p>
                </td>
                <td>
                    <p id="modalWarna" class="text-gray-700 mb-4"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="text-gray-700 mb-4">Ukuran</p>
                </td>
                <td>
                    <p class="text-gray-700 mb-4 mx-1">:</p>
                </td>
                <td>
                    <p id="modalUkuran" class="text-gray-700 mb-4"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="text-gray-700 mb-4">Ukuran Ban</p>
                </td>
                <td>
                    <p class="text-gray-700 mb-4  mx-1">:</p>
                </td>
                <td>
                    <p id="modalUkuranBan" class="text-gray-700 mb-4"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="text-gray-700 mb-4">Groupset</p>
                </td>
                <td>
                    <p class="text-gray-700 mb-4 mx-1">:</p>
                </td>
                <td>
                    <p id="modalGroupset" class="text-gray-700 mb-4"></p>
                </td>
            </tr>


        </table>


        <button
            class="mt-4 w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition"
            onclick="closeModalDetail()">Tutup</button>
    </div>
</div>