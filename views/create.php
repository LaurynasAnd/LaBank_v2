<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaBank</title>
    <link rel="stylesheet" href="<?=URL?>/css/app.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/9bc37f7865.js"></script>
</head>

<body>
    <header id="header" class="container">
        <div class="row">
            <div class="logo col-11">LaBank</div>
            <a href="<?= URL ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
    </header>
    <main id="main_content" class="container">
        <div class="row">
            <div class="infoscreen col-12">
                <h1>Sveiki atvykę į LaBank</h1>
                <p>Norėdami užsiregistruoti užpildykite žemiau esančius laukus. Visi laukai yra privalomi.</p>
                <form action="<?= URL . 'account/save' ?>" method="post" accept-charset="utf-8">
                    <h3 id="iban">Nauja sąskaita: <?='LT'.$iban?></h3>
                    <div style="color:red; font-size:14px;"><?= $this->answers['wrongName'] ?? ''; ?></div>
                    <input type="text" name="name" id="name" placeholder="Vardas (min: 3 simboliai)">
                    <div style="color:red; font-size:14px;"><?= $this->answers['wrongSurname'] ?? ''; ?></div>
                    <input type="text" name="surname" id="surname" placeholder="Pavardė (min: 3 simboliai)">
                    <div style="color:red; font-size:14px;"><?= $this->answers['badID'] ?? ''; ?></div>
                    <input type="text" name="idNumber" id="idNumber" placeholder="Asmens kodas">
                    <div style="color:red; font-size:14px;"><?= $this->answers['pswMissmatch'] ?? ''; ?></div>
                    <input type="password" name="psw" id="psw" placeholder="Slaptažodis (min: 8 simboliai)">
                    <input type="password" name="repeatPsw" id="repeatPsw" placeholder="Pakartokite slaptažodį">
                    <div class="buttons">
                    <button id="submit_new_acc" type="submit">Atidaryti sąskaitą</button>
                    </div>
                </form>
            </div>
        </div>
        <?php if(isset($this->answers['message'])) : ?>
            <div id="message"><div class="message"><?=$this->answers['message']?></div></div>
        <?php 
            unset($this->answers['message']);endif; 
        ?>
    </main>
</body>

</html>