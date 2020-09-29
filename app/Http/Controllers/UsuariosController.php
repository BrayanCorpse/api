<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Usuarios;
use App\Marcas;
use App\Modelos;
use App\Relaciones;
use Illuminate\Support\Facades\DB;


class UsuariosController extends Controller
{
    public function show(){

        $usuarios = Usuarios::all();
        return response()->json($usuarios, 201);
        
    }

    public function showMarks(){

        $marcas = Marcas::all();
        return response()->json($marcas, 201);
        
    }

    public function showModels(){

        $modelos = Modelos::all();
        return response()->json($modelos, 201);
        
    }


    public function showRelations(){

        $usuarios = DB::select('SELECT us.`usuario_id` AS id,us.foto,us.`name`,us.`apellidop`,us.`genero`,
        us.`email`,mar.`marca_id`,mar.`name` AS marca,mol.`modelo_id`,mol.`año` AS año
        FROM usuarios AS us
        INNER JOIN marcas AS mar ON mar.`marca_id`=us.`marca_id`
        INNER JOIN modelos AS mol ON mol.`modelo_id`=us.`modelo_id`
        ORDER BY us.`name` ASC');
        
        return response()->json($usuarios, 201);
        
    }

    public function showPaginate(){

        $usuarios = Relaciones::paginate(2);
        return response()->json($usuarios, 201);
        
    }

    public function showById($usuario_id){

        $usuarios = DB::select('SELECT us.`usuario_id` AS id,us.foto,us.`name`,us.`apellidop`,us.`apellidom`,us.`genero`,us.`telefono`,us.`email`,us.`password`,us.`placa`,us.`comentario`,mar.`marca_id`,mar.`name` AS marca,mol.`modelo_id`,mol.`año` AS año
        FROM usuarios AS us
        INNER JOIN marcas AS mar ON mar.`marca_id`=us.`marca_id`
        INNER JOIN modelos AS mol ON mol.`modelo_id`=us.`modelo_id`
        WHERE us.`usuario_id`=?',[$usuario_id],
        'ORDER BY us.`name` ASC');
        
        return response()->json($usuarios[0], 201);
        
    }

    public function store(Request $request){

      $storeUser = new Usuarios;
      $storeUser->foto = $request->foto;
      $storeUser->name = $request->name;
      $storeUser->apellidop = $request->apellidop;
      $storeUser->apellidom = $request->apellidom;
      if($request->sexo == "otro")
      {
        $storeUser->genero = $request->genero;
      }
      else
      {
        $storeUser->genero = $request->sexo;
      }
      $storeUser->telefono = $request->telefono;
      $storeUser->email = $request->email;
      $storeUser->password = $request->password;
      $storeUser->placa = $request->placa;
      $storeUser->comentario = $request->comentario;
      $storeUser->marca_id = $request->marca_id;
      $storeUser->modelo_id = $request->modelo_id;
      $storeUser->save();

      return response()->json(["message" => "user record created"], 201);
        
    }

    public function storeShort(Request $request){

        $storeUser = Usuarios::create($request->all());
    
        return response()->json([$storeUser,"message" => "user record created"], 201);
          
      }

    public function update(Request $request, $usuario_id){

        $updateUser = Usuarios::find($usuario_id);
        $updateUser->foto = $request->foto;
        $updateUser->name = $request->name;
        $updateUser->apellidop = $request->apellidop;
        $updateUser->apellidom = $request->apellidom;
        $updateUser->genero = $request->genero;
        $updateUser->telefono = $request->telefono;
        $updateUser->email = $request->email;
        $updateUser->password = $request->password;
        $updateUser->placa = $request->placa;
        $updateUser->comentario = $request->comentario;
        $updateUser->marca_id = $request->marca_id;
        $updateUser->modelo_id = $request->modelo_id;
        $updateUser->save();

        return response()->json(["message" => "user updated successfully"], 200);
       
    }

    public function updateShort(Request $request){

        $updateUser = Usuarios::find($request->usuario_id);
        $updateUser->update($request->all());
  

        return response()->json([$updateUser,"message" => "user updated successfully"], 200);
       
    }

    public function delete($usuario_id){

        $deleteUser = Usuarios::find($usuario_id);
        $deleteUser->delete();

        return response()->json(["message" => "user deleted"], 201);
    }

    public function restore($usuario_id){

        $resUser = Usuarios::withTrashed()->find($usuario_id);
        $resUser->restore();

        return response()->json(["message" => "user restored successfully"], 201);
    }

    public function forceDelete($usuario_id){

        $deleteUser = Usuarios::find($usuario_id);
        $deleteUser->forceDelete();

        return response()->json(["message" => "physically removed"], 201);
    }
}
