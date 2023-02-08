<?php
//VISTAS
Route::get("/", ControladorUsuarios::class);

Route::get("/usuarios/lista", ControladorUsuarios::class."@lista");
Route::get("/listar_usuarios", ControladorUsuarios::class);

Route::get("/usuarios/form/crear", ControladorUsuarios::class."@formCrearUsuario");
Route::get("/usuarios/form/edicion/:id", ControladorUsuarios::class."@formEdicionUsuario");

//RECURSOS
Route::post("/usuarios/registrar", ControladorUsuarios::class."@insertarUsuario");
Route::post("/usuarios/login", ControladorUsuarios::class."@login");
