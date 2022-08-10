<?php
    
namespace App\Controllers;
    use App\Models\Usuarios;
    use App\Libraries\Hash;

class Login extends BaseController
{

    public function __construct(){
        helper(['url', 'form']);
    }

    public function index()
    {
        $mensaje = session('mensaje');
        return view('login', ["mensaje" => $mensaje]);
    }

    //Logout del usuario
    public function salir() {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }

    public function check(){
        
        //validacion de campos para el ingreso de usuario
        $validation = $this->validate([
            'email'=>[
                'rules'=>'required|is_not_unique[t_usuarios.email]',
                'errors'=>[
                    'required'=>'Este campo es requeridio',
                    'is_not_unique'=>'Este email no se encuentra registrado'
                ]
                ],
            'password'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Este campo es requerido'
                ]
            ]
        ]);
        
        // validacion del ingreso de usuario
        if(!$validation){
            return view('/login', ['validation'=>$this->validator]);
        } else {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            $userModel = new \App\Models\Usuarios();
            $user_info = $userModel->where('email', $email)->first();
            $check_password = Hash::check($password, $user_info['password']);

            $datosUsuarios = $userModel->obtenerUsuario(['email'=>$email]);

            if(!$check_password){
                session()->setFlashdata('fail', 'Contraseña incorrecta');
                return redirect()->to('/login')->withInput();
            } else {
                $data = [
                    "usuario" => $datosUsuarios[0]['usuario'],
                    "id_usuario" => $datosUsuarios[0]['id_usuario'],
                    "email" => $datosUsuarios[0]['email']
                ];
                $session = session();
                $session->set($data);

                $user_id =$user_info['id_usuario'];
                //session()->set('loggedUser', $user_id);

                return redirect()->to('/home')->withInput();
            }
        }
    }
}