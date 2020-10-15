<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaBank</title>
    <style>
    <?php require DIR . '/public/css/app.css'; ?>
    </style>
</head>

<body>
    <header id="header" class="container">
        <div class="row">
            <div class="logo col-11">LaBank</div>
            <a href="<?php URL . 'login' ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
    </header>
    <main id="main_content" class="container">
        <div class="row">
            <div class="infoscreen col-12">
                <h1>Sveiki atvykę į LaBank</h1>
                <p>Norėdami užsiregistruoti užpildykite žemiau esančius laukus. Visi laukai yra privalomi.</p>
                <p style="color:red;"><?=$answers['noSignup']?></p>
                <form action="" method="post" accept-charset="utf-8">
                    <h3 id="iban">Nauja sąskaita: <?='LT'.$iban['nextIBAN']?></h3>
                    <div style="color:red; font-size:14px;"><?= $answers['wrongName']?></div>
                    <input type="text" name="name" id="name" placeholder="Vardas (min: 3 simboliai)">
                    <div style="color:red; font-size:14px;"><?= $answers['wrongSurname']?></div>
                    <input type="text" name="surname" id="surname" placeholder="Pavardė (min: 3 simboliai)">
                    <div style="color:red; font-size:14px;"><?= $answers['badID']?></div>
                    <input type="text" name="idNumber" id="idNumber" placeholder="Asmens kodas">
                    <div style="color:red; font-size:14px;"><?= $answers['pswMissmatch']?></div>
                    <input type="password" name="psw" id="psw" placeholder="Slaptažodis (min: 8 simboliai)">
                    <input type="password" name="repeatPsw" id="repeatPsw" placeholder="Pakartokite slaptažodį">
                    <button id="submit" type="submit">Atidaryti sąskaitą</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>