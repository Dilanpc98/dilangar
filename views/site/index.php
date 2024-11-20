<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Concesionaria';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?></title>
    
    <!-- Agregar Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <style>
    /* CSS para el efecto brillante del botón */
    .shine-button {
        transition: box-shadow 0.3s ease, transform 0.3s ease; /* Suaviza la transición */
        position: relative; /* Para posicionar el carrito */
    }

    .shine-button:hover {
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.8), 0 0 30px rgba(0, 123, 255, 0.8); /* Efecto de brillo */
        transform: scale(1.05); /* Aumenta ligeramente el tamaño del botón */
    }

    .cart-icon {
        position: absolute;
        top: -10px; /* Ajusta la posición vertical */
        right: -10px; /* Ajusta la posición horizontal */
        font-size: 24px; /* Tamaño del ícono */
        color: #28a745; /* Color del ícono */
        display: none; /* Oculto por defecto */
    }

    .shine-button:hover .cart-icon {
        display: block; /* Muestra el ícono al pasar el mouse */
    }

    .panzoom {
        width: 100%;
        height: auto;
        border: 1px solid #ccc;
        overflow: hidden;
        position: relative;
        perspective: 1000px; /* Perspectiva para el efecto 3D */
    }

    img {
        width: 100%;
        transition: transform 0.5s ease; /* Suaviza la rotación */
        transform-style: preserve-3d; /* Preserva el estilo 3D */
    }
    </style>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        let angle = 0; // Inicializa el ángulo de rotación
        const rotationInterval = 2000; // Intervalo de rotación en milisegundos (2 segundos)

        // Función para rotar la imagen
        function rotateImage() {
            angle += 90; // Incrementa el ángulo en 90 grados
            $(".panzoom img").css("transform", "rotateY(" + angle + "deg)"); // Aplica la rotación 3D a la imagen
        }

        // Inicia la rotación automática
        setInterval(rotateImage, rotationInterval);
    });
    </script>
</head>
<body>
    <div class="site-index">
        <div class="container my-5">
            <div class="row justify-content-center">
                <?php foreach($autos as $auto): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow border-light"> <!-- Sombra y borde ligero -->
                            <div class="d-flex justify-content-center panzoom"> <!-- Contenedor para rotación -->
                                <img src="<?= Yii::getAlias('@web' . '/portadas/' . $auto->portada) ?>" 
                                     alt="Imagen de <?= htmlspecialchars($auto->modelo) ?>" 
                                     style="height: 200px; object-fit: cover;"> <!-- Imagen responsiva con ajuste -->
                            </div>

                            <div class="card-body text-center"> <!-- Texto centrado -->
                                <h5 class="card-title"><?= htmlspecialchars($auto->modelo) ?></h5>
                                <p class="card-text text-success"><?= '$' . number_format($auto->precio, 2) ?></p>
                                <a href="<?= Url::to(['ventas/create', 'id_auto' => $auto->id_auto]) ?>"
                                   class="btn btn-primary btn-lg btn-block shine-button" role="button">
                                    Comprar
                                    <i class="fas fa-shopping-cart cart-icon"></i> <!-- Ícono del carrito -->
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>