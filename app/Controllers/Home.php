<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libros;
use App\Models\Reservas;
use App\Models\Usuarios;

class Home extends BaseController
{
    public function __construct(){
        helper(['url', 'form']);
    }
    
    public function index()
    {
        return view('login');
    }

    public function list(){
        $userModel = new \App\Models\Usuarios();
        
        $usuario=session('usuario');
        $datosUsuarios = $userModel->obtenerUsuario(['usuario'=>$usuario]);
        $email = $datosUsuarios[0]['email'];

        $reserva = new Reservas();
        $datos['reservas']=$reserva->orderBy('id_reserva','ASC')->where('email',$email)->findAll();

        $datos['cabecera']=view('template/cabecera');
        $datos['pie']=view('template/piePagina');
        
        //var_dump($email);
        return view('reservas', $datos);
    }

    public function into(){

        //recuperando los datos libros de la base de datos
        $libro = new Libros();
        $datos['libros']=$libro->orderBy('id_libro','ASC')->where('estado', "disponible")->findAll();

        $datos['cabecera']=view('template/cabecera');
        $datos['pie']=view('template/piePagina');

        return view('home', $datos);
    }

    //metodo vista de la reserva
    public function reservar($id=null){

        $userModel = new \App\Models\Usuarios();
        
        $usuario=session('usuario');
        $datosUsuarios = $userModel->obtenerUsuario(['usuario'=>$usuario]);
        $email = $datosUsuarios[0]['email'];

        $datos['email'] = $email;

        $libro = new Libros();
        $datos['libro']=$libro->where('id_libro',$id)->first();

        $datos['cabecera']=view('template/cabecera');
        $datos['pie']=view('template/piePagina');

        return view('reservar', $datos);
    }

    public function crear(){
        $datos['cabecera']=view('template/cabecera');
        $datos['pie']=view('template/piePagina');

        return view('crearLibro', $datos);
    }

    //guardar un libro
    public function save(){
        
        $libro = new Libros(); 

        $titulo=$this->request->getVar('titulo');
        
        if($imagen=$this->request->getFile('imagen')){
            $estado="disponible";
            $newName=$imagen->getRandomName();
            $imagen->move('public/Images/', $newName);
            $datos=[
                'titulo'=>$this->request->getVar('titulo'),
                'autor'=>$this->request->getVar('autor'),
                'descripcion'=>$this->request->getVar('descripcion'),
                'imagen'=>$newName,
                'estado'=>$estado
            ];

            $libro->insert($datos);
        }
        return redirect()->to('/home')->withInput();
    }

    public function saveReserva(){
        $reserva = new Reservas();
        $libro = new Libros();

            $estado="reservado";
            $datos=[
                'email'=>$this->request->getVar('email'),
                'titulo'=>$this->request->getVar('titulo'),
                'autor'=>$this->request->getVar('autor'),
                'descripcion'=>$this->request->getVar('descripcion'),
                'imagen'=>$this->request->getVar('imagen'),
                'estado'=>$estado,
                'id_libro'=>$this->request->getVar('id_libro'),
                'dias'=>$this->request->getVar('dias')
            ];
            $reserva->insert($datos);

            $datosL=[
                'estado'=>$estado,
            ];
            $id=$this->request->getVar('id_libro');
            $libro->update($id,$datosL);

        return redirect()->to('/home')->withInput();
    }

    public function borrar($id=null){

        $reserva = new Reservas();
        $libro = new Libros();

        $datosReservas=$reserva->where('id_reserva',$id)->first();


        $estado="disponible";
        $datosL=[
            'estado'=>$estado,
        ];
        $id_Libro=$this->request->getVar('id_libro');
        $libro->update($id_Libro,$datosL);

        $reserva->where('id_reserva',$id)->delete($id);

        return redirect()->to('/listReservas')->withInput();

    }

}
