<?php
/**
 * @var Human $me
 * @var Human $ennemy
 **/
?>
<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="text-center">
                <h1><?= $me->getNom() ?></h1>
                <div class="d-flex justify-content-around">
                    <h2><?= $me->getWeapon()->getNom() ?> <?= !is_null($me->getSecondaryWeapon()) ? $me->getSecondaryWeapon()->getNom() : '' ?></h2>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="text-center">
                <h1><?= $ennemy->getNom() ?></h1>
                <div class="d-flex justify-content-around">
                    <h2><?= $ennemy->getWeapon()->getNom() ?> <?= !is_null($me->getSecondaryWeapon()) ? $me->getSecondaryWeapon()->getNom() : '' ?></h2>
                </div>
            </div>
        </div>
        <div class="col-12">
            <hr>
            <h2 style="text-align:center;">FIGHT</h2>

            <?php
            /*END TOOLKIT */
            $fight = new Fight($me, $ennemy);
            while (!$fight->isSomeoneDead()) {
                $fight->newRound();
            }
            ?>
            <?php if ($me->isDead()): ?>
                <h3><?= $me->getNom() ?> is dead.</h3>
            <?php endif; ?>
            <?php if ($ennemy->isDead()): ?>
                <h3><?= $ennemy->getNom() ?> is dead.</h3>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
