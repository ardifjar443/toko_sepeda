<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="px-40 pt-10 flex justify-center items-center flex-col gap-4 bg-white">
        <h1 class="text-blue-600 text-2xl font-semibold">
            Ardi Fajar Arifin
            <span class="bg-blue-600 text-white p-1 rounded-lg hover:bg-white hover:text-blue-600 transition duration-300 me-1 ">
                10122266
            </span>
            IF-7
        </h1>
        <span class="text-center">
            "Hidup ini seperti mengendarai sepeda, untuk menjaga keseimbangan, kita harus tetap mengayuh". - A. Einsten
        </span>
        <div class="flex py-5 pb-10 gap-5">

            <a
                class="flex gap-2 opacity-50 hover:opacity-100"
                href="https://medium.com/@ardifjar443"
                target="_blank">
                <span>Medium</span>
                <img src="<?= base_url('img/medium.png') ?>" alt="" class="w-[20px] h-[20px]" />
            </a>
            <a
                class="flex gap-2 opacity-50 hover:opacity-100"
                href="https://github.com/ardifjar443"
                target="_blank">
                <span>Github</span>
                <img src="<?= base_url('img/github.png') ?>" alt="" class="w-[20px] h-[20px]" />
            </a>
            <a
                class="flex gap-2 opacity-50 hover:opacity-100"
                href="https://www.linkedin.com/in/ardi-fajar-arifin/"
                target="_blank">
                <span>Linkedin</span>
                <img
                    src="<?= base_url('img/linkedin.png') ?>"
                    alt=""
                    class="w-[20px] h-[20px]" />
            </a>
        </div>
    </div>
</body>

</html>