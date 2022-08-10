<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function __construct(){
        helper(['url', 'form']);
    }
    
    public function index()
    {
        return view('register');
    }

    public function save(){
        //validacion de campos de registro del usuario
        $validation = $this->validate([
            'name'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Nombre requerido'
                ]
                ],
            'email'=>[
                'rules'=>'required|valid_email|is_unique[t_usuarios.email]',
                'errors'=>[
                    'required'=>'Email requerido',
                    'valid_email'=>'El email es invalido',
                    'is_unique'=>'El email ya se encuentra registrado'
                ]
                ],
            'password'=>[
                'rules'=>'required|min_length[5]|max_length[12]',
                'errors'=>[
                    'required'=>'Ingrese una contraseña',
                    'min_length'=>'La contraseña debe tener minimo 5 caracteres',
                    'max_length'=>'La contraseña debe tener maximo 12 caracteres'
                ]
                ],
            'password2'=>[
                'rules'=>'required|min_length[5]|max_length[12]|matches[password]',
                'errors'=>[
                    'required'=>'Ingrese nuevamente la contraseña',
                    'min_length'=>'La contraseña debe tener minimo 5 caracteres',
                    'max_length'=>'La contraseña debe tener maximo 12 caracteres',
                    'matches'=>'Las contraseñas no coninciden'
                ]
            ]
        ]);
        //validacion y metodo guardar informacion de cuanta de usuario
        if(!$validation){
            return view('/register', ['validation'=>$this->validator]);
        } else {
            $name = $this->request->getPost('name');
            $correo = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $password2 = $this->request->getPost('password2');

            $values = [
                'usuario'=>$name,
                'email'=>$correo,
                'password'=>password_hash($password, PASSWORD_DEFAULT),
                'type'=>"usuario",
            ];

            $usersModel = new \App\Models\Usuarios();
            $query = $usersModel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail','Ha ocurrido un error');
                // return redirect()->to('/register')->with('fail','Ha ocurrido un error');
            } else {
                return redirect()->to('/register')->with('success','Te has registrado correctamente');
            }
        }
    }

}