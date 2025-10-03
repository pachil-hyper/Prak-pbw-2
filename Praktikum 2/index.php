<?php
// =================================================================
// PRAKTIKUM 1: APLIKASI PENDAFTARAN EVENT
// =================================================================

// KONSEP: CONSTANT
define('NAMA_EVENT', 'Belajar PHP 2025');
define('FILE_PENDAFTARAN', 'pendaftar.txt');

// KONSEP: GLOBAL VARIABLE
$status_message = '';
$error_messages = [];

// KONSEP: FUNGSI & REGEX
function validateEmail($email) {
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($pattern, $email);
}

// 🔹 VALIDASI TANGGAL LAHIR MENGGUNAKAN DateTime
function validateDate($date) {
    $d = DateTime::createFromFormat('d-m-Y', $date);
    return $d && $d->format('d-m-Y') === $date;
}

// KONSEP: FORM (POST) HANDLING
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);

    if (empty($nama) || empty($email) || empty($tanggal_lahir)) {
        $error_messages[] = "Semua field wajib diisi.";
    }
    if (!validateEmail($email)) {
        $error_messages[] = "Format email tidak valid.";
    }
    if (!validateDate($tanggal_lahir)) {
        $error_messages[] = "Format tanggal lahir harus DD-MM-YYYY.";
    }

    if (empty($error_messages)) {
        $data_pendaftar = "{$nama};{$email};{$tanggal_lahir}\n";
        file_put_contents(FILE_PENDAFTARAN, $data_pendaftar, FILE_APPEND);
        $status_message = "Terima kasih, {$nama}! Pendaftaran Anda untuk event " . NAMA_EVENT . " berhasil.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Event Digital</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"] { width: 100%; padding: 8px; }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        .error { color: red; font-size: 0.9em; }
        .success { color: green; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <?php if (!empty($status_message)): ?>
    <p class="success"><?php echo $status_message; ?></p>
    <?php endif; ?>

    <?php if (!empty($error_messages)): ?>
    <div class="error">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            <?php foreach ($error_messages as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <h1>Form Pendaftaran Event "Belajar PHP 2025"</h1>
    <p>Silakan isi data diri Anda untuk mendaftar pada event kami.</p>

    <form action="index.php" method="POST">
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="email">Alamat Email:</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir (DD-MM-YYYY):</label>
            <input type="text" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>
        <button type="submit">Daftar Sekarang</button>
    </form>

    <hr>

    <h2><table>
    <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Tanggal Lahir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (file_exists(FILE_PENDAFTARAN)) {
            $pendaftar = file(FILE_PENDAFTARAN, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($pendaftar as $data) {
                list($nama, $email, $tanggal_lahir) = explode(';', $data);
                echo "<tr>";
                echo "<td>" . htmlspecialchars($nama) . "</td>";
                echo "<td>" . htmlspecialchars($email) . "</td>";
                echo "<td>" . htmlspecialchars($tanggal_lahir) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Belum ada pendaftar.</td></tr>";
        }
        ?>
    </tbody>
</table>
</h2>
</body>
</html>