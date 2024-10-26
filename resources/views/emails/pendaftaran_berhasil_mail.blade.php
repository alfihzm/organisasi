<!DOCTYPE html>
<html>

<head>
    <title>Registrasi Berhasil</title>
</head>

<body>
    <h4>Dear, {{ $nama }}</h4>
    <p> Selamat Kak {{ $nama }}, anda berhasil mendaftar menjadi calon anggota HIMSI UBSI
        <b> (Himpunan Mahasiswa Sistem Informasi) </b>
        Universitas Bina Sarana Informatika 2024.
    </p>

    <p>
        Untuk selanjutnya, silahkan untuk melengkapi CV anda di website kami agar kami dapat melihat potensi anda,
        terimakasih 😊
    </p>

    <p>Berikut adalah informasi detailmu:</p>
    <p>
        NIM: {{ $nim }}
        <br>
        Password: {{ $password }}
    </p>

    <p>
        Silahkan login di website kami melalui: <br>
        Link: https://oprechimsi.com/auth
    </p>

    <p>
        Salam hangat dari kami,
        <br>
        <b> Pengurus HIMSI UBSI 2024 </b>
    </p>

</body>

</html>
