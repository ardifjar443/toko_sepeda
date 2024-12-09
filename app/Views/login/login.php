<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Form Login -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login</h2>

        <!-- Menampilkan Error Validasi -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-200 text-red-600 p-3 rounded-lg mb-4">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Menampilkan Error Login -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-200 text-red-600 p-3 rounded-lg mb-4">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form action="<?= base_url('login') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-4">
                <label for="username" class="block text-sm font-semibold text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="w-full mt-2 p-3 border border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full mt-2 p-3 border border-gray-300 rounded-lg" required>
            </div>

            <button type="submit" class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Masuk
            </button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Belum punya akun? <a href="<?= base_url('register') ?>" class="text-blue-500">Daftar di sini</a></p>
        </div>
    </div>
    <script>
        <?php if (session()->getFlashdata('pendaftaran_berhasil')): ?>
            Swal.fire({
                title: 'Pendaftaran Berhasil!',
                text: 'Akun Anda telah berhasil dibuat.',
                icon: 'success',
                confirmButtonText: 'OK'
            })
        <?php endif; ?>
    </script>
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
</body>



</html>