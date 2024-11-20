<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Concesionaria';
?>

<style>
/* CSS para el efecto brillante del botón */
.shine-button {
    transition: box-shadow 0.3s ease, transform 0.3s ease; /* Suaviza la transición */
}

.shine-button:hover {
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.8), 0 0 30px rgba(0, 123, 255, 0.8); /* Efecto de brillo */
    transform: scale(1.05); /* Aumenta ligeramente el tamaño del botón */
}
</style>

<div class="site-index">
    <div class="container my-5">
        <div class="row justify-content-center">
            <?php foreach($autos as $auto): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow border-light"> <!-- Sombra y borde ligero -->
                        <div class="d-flex justify-content-center">
                            <img src="<?= Yii::getAlias('@web' . '/portadas/' . $auto->portada) ?>" 
                                 class="card-img-top img-fluid" 
                                 alt="Imagen de <?= htmlspecialchars($auto->modelo) ?>" 
                                 style="height: 200px; object-fit: cover;"> <!-- Imagen responsiva con ajuste -->
                        </div>

                        <div class="card-body text-center"> <!-- Texto centrado -->
                            <h5 class="card-title"><?= htmlspecialchars($auto->modelo) ?></h5>
                            <p class="card-text text-success"><?= '$' . number_format($auto->precio, 2) ?></p>
                            <?= Html::a('Comprar', ['ventas/create', 'id_auto' => $auto->id_auto], [
                                'class' => 'btn btn-primary btn-lg btn-block shine-button', // Añadido una clase personalizada
                                'role' => 'button'
                            ]) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
