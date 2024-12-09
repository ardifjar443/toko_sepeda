<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <!-- Tambahkan Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar dengan tombol logout di kanan -->
    <div class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Etalase Produk</h1>
            <a href="/logout" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition">Logout</a>
        </div>
    </div>

    <div class="container mx-auto mt-10 px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php foreach ($sepeda as $sepedah): ?>
                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                    <img src="<?= base_url('foto/' . $sepedah['foto']); ?>" alt="<?= $sepedah['nama_sepeda']; ?>" class="w-full h-56 object-cover">
                    <div class="p-4">
                        <h5 class="text-xl font-semibold text-gray-800"><?= $sepedah['nama_sepeda']; ?></h5>
                        <p class="text-gray-600 mt-2">Harga: Rp <?= number_format($sepedah['harga'], 0, ',', '.'); ?></p>
                        <a href="#" class="mt-4 inline-block bg-blue-500 text-white text-center py-2 px-4 rounded-lg hover:bg-blue-600 transition">Beli Sekarang</a>
                    </div>
                </div>
            <?php endforeach; ?>
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
</body>

</html>