<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu admin</title>
    <!-- Tambahkan Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100">
    <?php echo view("header") ?>

    <div class="container mx-auto mt-28 px-4 ">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 ">
            <?php foreach ($sepeda as $sepedah): ?>
                <div class="max-w-sm rounded-xl overflow-hidden shadow-lg bg-white">
                    <div class="p-2">

                        <img src="<?= base_url('uploads/' . $sepedah['foto']); ?>" alt="<?= $sepedah['nama_sepeda']; ?>" class="w-full h-56 object-cover rounded-lg ">
                    </div>
                    <div class="p-4">
                        <h5 class="text-sm  text-gray-800"><?= $sepedah['tipe']; ?></h5>
                        <h5 class="text-3xl font-bold text-gray-800"><?= $sepedah['nama_sepeda']; ?></h5>
                        <p class="text-gray-600 mt-2">Harga: Rp <?= number_format($sepedah['harga'], 0, ',', '.'); ?></p>
                        <a href="#" class="mt-4 inline-block bg-orange-500 text-white text-center py-2 px-4 rounded-lg hover:bg-orange-700 transition font-bold">Edit</a>
                        <button class="mt-4 inline-block bg-blue-600 text-white text-center py-2 px-4 rounded-lg hover:bg-blue-800 transition font-bold" onclick="showDetail(<?= htmlspecialchars(json_encode($sepedah), ENT_QUOTES, 'UTF-8'); ?>)">detail</button>
                        <a href="#" class="mt-4 inline-block bg-red-600 text-white text-center py-2 px-4 rounded-lg hover:bg-red-800 transition font-bold">Hapus</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



    <?php echo view("footer") ?>



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





    <?php if (session()->getFlashdata('error')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Akses Ditolak',
                text: '<?= session()->getFlashdata('error'); ?>',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    <?php endif; ?>

    <?php if (session()->get('logged_in')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Selamat datang <?= session()->get("nama") ?>',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    <?php endif; ?>



    <script>
        // Function untuk menampilkan modal
        function showDetail(product) {
            document.getElementById('modalTipe').innerText = product.tipe;
            document.getElementById('modalWarna').innerText = product.warna;
            document.getElementById('modalGroupset').innerText = product.groupset;
            document.getElementById('modalUkuranBan').innerText = product.ban;
            document.getElementById('modalTitle').innerText = product.nama_sepeda;
            document.getElementById('modalImage').src = "<?= base_url('uploads/'); ?>" + product.foto;
            document.getElementById('modalPrice').innerText = "Rp." + new Intl.NumberFormat('id-ID').format(product.harga);
            document.getElementById('modalUkuran').innerText = product.ukuran;


            // Tampilkan modal
            document.getElementById('productModal').classList.remove('hidden');
        }

        // Function untuk menutup modal
        function closeModalDetail() {
            document.getElementById('productModal').classList.add('hidden');
        }
    </script>
</body>

</html>