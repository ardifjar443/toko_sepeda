<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Form registrasi -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Registrasi Akun</h2>

        <!-- Error Messages -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-200 text-red-600 p-3 rounded-lg mb-4">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('register') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-4">
                <label for="username" class="block text-sm font-semibold text-gray-700">Username</label>
                <input type="text" name="username" id="username" value="<?= old('username') ?>" class="w-full mt-2 p-3 border border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full mt-2 p-3 border border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= old('nama') ?>" class="w-full mt-2 p-3 border border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="role" class="block text-sm font-semibold text-gray-700">Role</label>
                <select name="role" id="role" class="w-full mt-2 p-3 border border-gray-300 rounded-lg" required>
                    <option value="admin" <?= old('role') == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="user" <?= old('role') == 'user' ? 'selected' : '' ?>>User</option>
                </select>
            </div>

            <button type="submit" class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Daftar
            </button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Sudah punya akun? <a href="<?= base_url('login') ?>" class="text-blue-500">Masuk di sini</a></p>
        </div>
    </div>


    <!-- SweetAlert2 Script -->
    <script>
        <?php if (session()->getFlashdata('pendaptaran_berhasil')): ?>
            Swal.fire({
                title: 'Pendaftaran Berhasil!',
                text: 'Akun Anda telah berhasil dibuat.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('login') ?>'; // Arahkan ke halaman login
                }
            });
        <?php endif; ?>
    </script>

</body>

</html>