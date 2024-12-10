<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (isset($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>s
        <?php endif; ?>

        <form action="/login" method="POST">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="nama_pengguna">Nama Pengguna</label>
                <input type="text" id="nama_pengguna" name="nama_pengguna" value="<?= old('nama_pengguna') ?>" required>
            </div>
            <div class="form-group">
                <label for="kata_sandi">Kata Sandi</label>
                <input type="password" id="kata_sandi" name="kata_sandi" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>



