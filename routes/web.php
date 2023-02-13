<?php
//VISTAS Gbobal
Route::get("/", ControladorUsuarios::class);
Route::get("/usuarios/form/crear", ControladorUsuarios::class."@formCrearUsuario");


// VISTAS Usuarios (Administrativos)
Route::get("/usuarios/lista", ControladorUsuarios::class."@lista");
Route::get("/listar_usuarios", ControladorUsuarios::class);
Route::get("/usuarios/form/edicion/:id", ControladorUsuarios::class."@formEdicionUsuario");
Route::get("/usuarios/home", ControladorUsuarios::class."@home");
Route::get("/usuarios/form/pagos", ControladorPagos::class."@index");

//RECURSOS Global
Route::post("/usuarios/registrar", ControladorUsuarios::class."@insertarUsuario");
Route::post("/usuarios/login", ControladorUsuarios::class."@login");

//RECURSOS Usuarios (administrativos)


