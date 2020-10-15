
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
            <a href="../login"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
    </header>
    <main id="main_content" class="container">
        <div class="row">
            <div class="infoscreen col-12">
                <h1>Pridėti lėšų</h1>
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
                <form action="" method="post">
                    <input type="text" name="amount" id="amount" placeholder="Įveskite sumą">
                    <button id="submit" type="submit">Pridėti</button>
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