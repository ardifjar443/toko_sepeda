<div id="edit-popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white w-1/2  rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Edit Produk</h2>
        <form id="edit-form" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <input type="hidden" name="id" id="id">


            <div class="grid grid-cols-2 gap-5">
                <div class=" w-full ">
                    <div class="mb-4 ">
                        <label for="nama_sepeda" class="block text-gray-700">Nama Sepeda</label>
                        <input type="text" name="nama_sepeda" id="nama_sepeda" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="harga" class="block text-gray-700">Harga</label>
                        <input type="number" name="harga" id="harga" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="nama_sepeda" class="block text-gray-700">Warna</label>
                        <input type="text" name="warna" id="warna" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="nama_sepeda" class="block text-gray-700">Tipe Sepeda</label>
                        <select name="tipe" id="tipe" class="w-full mt-2 p-3 border border-gray-300 rounded-lg" required>

                        </select>
                    </div>
                </div>
                <div class=" w-full">
                    <div class="mb-4">
                        <label for="nama_sepeda" class="block text-gray-700">Ukuran</label>
                        <input type="text" name="ukuran" id="ukuran" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="nama_sepeda" class="block text-gray-700">Ukuran Ban</label>
                        <input type="text" name="ban" id="ban" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-gray-700">Groupset</label>
                        <textarea name="groupset" id="groupset" rows="4" class="w-full p-2 border border-gray-300 rounded"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="foto" class="block text-gray-700">Foto (Opsional)</label>
                        <input type="file" name="foto" id="foto" class="w-full p-2 border border-gray-300 rounded">
                    </div>
                    <div class="flex justify-end gap-4">
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600" onclick="hideEditPopup()">Batal</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
                    </div>
                </div>
            </div>



        </form>
    </div>
</div>