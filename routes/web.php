<?php
// VISTAS
// Usuarios (Administrativos)
Route::get("/", ControladorUsuarios::class);
Route::get("/usuarios/home", ControladorUsuarios::class."@home");
Route::get("/usuarios/form/crear", ControladorUsuarios::class."@formCrearUsuario");
Route::get("/usuarios/lista", ControladorUsuarios::class."@listaVista");
Route::get("/usuarios/listar", ControladorUsuarios::class."@listarUsuarios");
Route::get("/usuarios/form/edicion/:id", ControladorUsuarios::class."@formEdicionUsuario");
//PAGOS
Route::get("/pagos/form/pagos", ControladorPagos::class."@index");
Route::get("/pagos/listaPagos",ControladorPagos::class."@listarPagosVista");
Route::get("/pagos/editarPagos",ControladorPagos::class."@editarPagosVista");
//CALIFICACIONES
Route::get("calificaciones/form/registro",ControladorCalificaciones::class."@registroVista");
Route::get("calificaciones/form/editar",ControladorCalificaciones::class."@registroVista");
Route::get("calificaciones/form/eliminar",ControladorCalificaciones::class."@registroVista");


//RECURSOS Usuarios (administrativos)
Route::post("/usuarios/form/crear", ControladorUsuarios::class."@insertarUsuario");
Route::post("/usuarios/login", ControladorUsuarios::class."@login");
Route::post("/pagos/registrarPagos",ControladorPagos::class."@insertarPago");
Route::post("/alumnos/buscar_alumnos",ControladorAlumnos::class."@buscarAlumnos");
Route::post("/usuarios/actualizarEstatus", ControladorUsuarios::class."@activarUsuario");
