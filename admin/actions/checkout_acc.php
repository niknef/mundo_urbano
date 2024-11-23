<?php
require_once "../../functions/autoload.php";

$items = Carrito::get_carrito();
$userID = $_SESSION['loggedIn']['id'] ?? false;

try {
    if (!$userID) {
        // Si no hay usuario logueado
        Alerta::new_alert('warning', "Tu sesión ha expirado. Por favor, inicia sesión.");
        header('location: ../../index.php?link=login');
        exit;
    }

    if (empty($items)) {
        // Si el carrito está vacío
        Alerta::new_alert('danger', "Tu carrito está vacío. Por favor, agrega productos.");
        header('location: ../../index.php?link=carrito');
        exit;
    }

    // Preparar datos de la compra
    $datosCompra = [
        "id_usuario" => $userID,
        "fecha" => gmdate("Y-m-d H:i:s"),
        "importe" => Carrito::precio_total()
    ];

    $detalleCompra = [];
    foreach ($items as $key => $item) {
        $detalleCompra[$key] = [
            "cantidad" => $item['cantidad'],
            "precio_unitario" => $item['precio'],
            "talle_id" => $item['talle_id']
        ];
    }

    // Insertar datos de la compra y vaciar el carrito
    Checkout::insert_data_checkout($datosCompra, $detalleCompra);
    Carrito::vaciar_carrito();

    // Confirmar compra
    Alerta::new_alert('success', "Compra realizada con éxito. Recibirás tu comprobante por correo electrónico.");
    header('location: ../../index.php?link=usuario');
    exit;

} catch (Exception $e) {
    // Manejar errores
    Alerta::new_alert('danger', "No se pudo completar la compra. Error: " . $e->getMessage());
    header('location: ../../index.php?link=carrito');
    exit;
}
