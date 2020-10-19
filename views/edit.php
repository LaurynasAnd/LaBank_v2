
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
            <a href="<?= URL . 'account/index'; ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
    </header>
    <main id="main_content" class="container">
        <div class="row">
            <div class="infoscreen col-12">
                <h1>Saskaitos likučio keitimas</h1>
                <p>Įrašykite norimą pridėti sumą, žemiau pateiktame laukelyje</p>
                <div class="account-info">
                    <div class="name"><div class="label">
                        Vardas: 
                    </div><?=$user['name']?></div>
                    <div class="surname"><div class="label">
                        Pavardė: 
                    </div><?=$user['surname']?></div>
                    <div class="iban"><div class="label">
                        Sąsk. numeris:
                    </div><?=$user['iban']?></div>
                    <div class="balance"><div class="label">
                        Likutis: 
                    </div><?=$user['balance']?></div>
                    <div class="currency"><div class="label">
                        Valiuta: 
                    </div>Eur</div>
                </div>
                <form action="<?= URL . 'account/update'; ?>" method="post">
                    <input type="text" name="amount" id="amount" placeholder="Įveskite sumą">
                    <div class="buttons">
                        <button id="submit" type="submit" value="add">Pridėti</button>
                        <button id="submit" type="submit" value="remove">Atimti</button>
                    </div>
                </form>
            </div>
        </div>
        <?php if(isset($answers['badInput'])) : ?>
            <div id="message"><div class="message"><?=$answers['badInput']?></div></div>
        <?php 
            unset($answers['badInput']);endif; 
        ?>
    </main>
</body>

</html>