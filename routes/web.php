<?php
// VISTAS
// Usuarios (Administrativos)
Route::get("/", ControladorUsuarios::class);
Route::get("/usuarios/home", ControladorUsuarios::class."@home");
Route::get("/usuarios/form/crear", ControladorUsuarios::class."@formCrearUsuario");
Route::get("/usuarios/lista", ControladorUsuarios::class."@listaVista");
Route::get("/usuarios/listar", ControladorUsuarios::class."@listarUsuarios");

//PAGOS
Route::get("/pagos/form/pagos", ControladorPagos::class."@index");
Route::get("/pagos/listaPagos",ControladorPagos::class."@listarPagosVista");
Route::get("/pagos/editarPagos",ControladorPagos::class."@editarPagosVista");

//CALIFICACIONES
Route::get("calificaciones/form/registro",ControladorCalificaciones::class."@registroVista");
Route::get("calificaciones/form/editar",ControladorCalificaciones::class."@registroVista");
Route::get("calificaciones/form/eliminar",ControladorCalificaciones::class."@registroVista");

//ALUMNOS
Route::get("alumnos/registro",ControladorAlumnos::class."@registroVista");
Route::get("alumnos/login",ControladorAlumnos::class."@loginVista");
Route::get("alumnos/lista",ControladorAlumnos::class."@listaVista");
Route::get("alumnos/listarAlumnos",ControladorAlumnos::class."@listaAlumnos");


//RECURSOS Administrativo IGM
Route::post("/usuarios/form/crear", ControladorUsuarios::class."@insertarUsuario");
Route::post("/usuarios/login", ControladorUsuarios::class."@login");
Route::post("/pagos/registrarPagos",ControladorPagos::class."@insertarPago");
Route::post("/alumnos/buscar_alumnos",ControladorAlumnos::class."@buscarAlumnos");
Route::post("/usuarios/actualizarEstatus", ControladorUsuarios::class."@activarUsuario");
Route::post("/usuarios/eliminarUsuario", ControladorUsuarios::class."@eliminarusuario");

//ALUMNOS RECURSOS
Route::post("alumnos/formRegistrar",ControladorAlumnos::class."@registro");
Route::post("alumnos/formLogin",ControladorAlumnos::class."@login");
Route::post("alumnos/activar",ControladorAlumnos::class."@activarAlumno");
Route::post("alumnos/eliminar",ControladorAlumnos::class."@eliminarAlumno");

