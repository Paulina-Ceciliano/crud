<?php

Route::get("/", function() {
    return "Hola mundo";
});

Route::get("/saludo", function() {
    return "Esta es otra ruta";
});
