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

    <div class="container mx-auto mt-28 px-4 mb-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 ">
            <?php foreach ($sepeda as $sepedah): ?>
                <div class=" rounded-xl overflow-hidden shadow-lg bg-white">
                    <div class="p-2">

                        <img src="<?= base_url('uploads/' . $sepedah['foto']); ?>" alt="<?= $sepedah['nama_sepeda']; ?>" class="w-full h-56 object-cover rounded-lg ">
                    </div>
                    <div class="p-4">
                        <div class="grid grid-cols-2">
                            <div>
                                <h5 class="text-sm  text-gray-800"><?= $sepedah['tipe']; ?></h5>
                                <h5 class="text-4xl font-bold text-gray-800"><?= $sepedah['nama_sepeda']; ?></h5>
                            </div>
                            <div class="w-full">
                                <p class="text-gray-600 mt-2 text-end w-full font-semi-bold text-xl"> Rp <?= number_format($sepedah['harga'], 0, ',', '.'); ?></p>
                            </div>
                        </div>


                        <button href="#" class="mt-4 inline-block bg-orange-500 text-white text-center py-2 px-4 rounded-lg hover:bg-orange-700 transition font-bold" onclick="showEditPopup(<?= $sepedah['id_sepeda'] ?>)">Edit</button>
                        <button class="mt-4 inline-block bg-blue-600 text-white text-center py-2 px-4 rounded-lg hover:bg-blue-800 transition font-bold" onclick="showDetail(<?= htmlspecialchars(json_encode($sepedah), ENT_QUOTES, 'UTF-8'); ?>)">detail</button>
                        <a href="#" class="mt-4 inline-block bg-red-600 text-white text-center py-2 px-4 rounded-lg hover:bg-red-800 transition font-bold">Hapus</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



    <?php echo view("footer") ?>



    <?php echo view("menu_utama/popupdetail") ?>
    <?php echo view("menu_utama/popupedit") ?>




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

        function showEditPopup(id) {
            // Ambil data produk dari server
            fetch(`<?= base_url('sepeda') ?>/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('id').value = data.id;
                    document.getElementById('nama_sepeda').value = data.nama_sepeda;
                    document.getElementById('harga').value = data.harga;
                    document.getElementById('groupset').value = data.groupset;

                    const tipeDropdown = document.getElementById('tipe');
                    tipeDropdown.innerHTML = ''; // Hapus opsi sebelumnya
                    data.available_types.forEach(type => {
                        const option = document.createElement('option');
                        option.value = type;
                        option.textContent = type;
                        if (type === data.tipe) {
                            option.selected = true;
                        }
                        tipeDropdown.appendChild(option);
                    });

                    document.getElementById('ukuran').value = data.ukuran;
                    document.getElementById('warna').value = data.warna;
                    document.getElementById('ban').value = data.ban;
                    document.getElementById('edit-form').action = `<?= base_url('produk/update') ?>/${id}`;
                    document.getElementById('edit-popup').classList.remove('hidden');
                });
        }

        function hideEditPopup() {
            document.getElementById('edit-popup').classList.add('hidden');
        }
    </script>
</body>

</html>