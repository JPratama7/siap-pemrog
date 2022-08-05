<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <title>REST APIKEY</title>
    <link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>

<style>
    body {
        font-family: sans-serif;
        background: #d5f0f3;
    }

    h1 {
        text-align: center;
        font-weight: 300;
    }

    .tulisan_login {
        text-align: center;
        text-transform: uppercase;
    }

    .kotak_login {
        width: 350px;
        background: white;
        margin: 80px auto;
        padding: 30px 20px;
    }

    label {
        font-size: 11pt;
    }

    .form_login {
        box-sizing: border-box;
        width: 100%;
        padding: 10px;
        font-size: 11pt;
        margin-bottom: 20px;
    }

    .tombol_login {
        background: #46de4b;
        color: white;
        font-size: 11pt;
        width: 100%;
        border: none;
        border-radius: 3px;
        padding: 10px 20px;
    }

    .link {
        color: #232323;
        text-decoration: none;
        font-size: 10pt;
    }
</style>

<body>

    <h1>GENERATE FOR APIKEY <br /></h1>

    <div class="kotak_login">
        <p class="tulisan_login">Silahkan Klik Generate</p>

        <form action="<?php echo base_url('auth/generate') ?>" method="POST">

            <label>Code Key Api</label>
            <input type="text" disabled name="keyapi" class="form_login" placeholder="Password .." value="<?= empty($key) ? '' : $key ?>">
            <input type="submit" class="tombol_login" value="Generate">
            <br />
            <br />
        </form>
        <a href="<?= base_url('auth/logout') ?>"><button class="tombol_login">Logout</button></a>

    </div>


</body>

</html>
