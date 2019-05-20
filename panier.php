<?php if(count($paniers) > 0): ?>
<div style="margin-top:87cm;"> 
<h1> Les produits qui sont dans le pannier </h1>
<table class="table">
    <tr>
        <th>id</th>
        <th>Reff</td>
        <th>qte</td>
        <th>prix</td>
        <th>total</td>
    </tr>
    <?php

    foreach ($paniers as $k => $p) : ?>
        <tr>
            <td><?= $k ?></td>
            <td><?= $p['reference'] ?></td>
            <td><?= $p['quantite'] ?></td>
            <td><?= $p['prixNormal'] ?></td>
            <td><?= $p['prixNormal'] * $p['quantite'] ?>.00</td>

        </tr>
    <?php endforeach; ?>

</table>
</div>
<div class="h3">
    <div class="float-right">
    <span>Total : </span>
    <span>
        <?= $total ?>
    </span>
    <span>
        $
    </span>
    </div>
</div>

<?php endif; ?>