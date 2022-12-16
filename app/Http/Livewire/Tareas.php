<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Tareas as TareasDB;


class Tareas extends Component
{
    public $tarea = '';
    public $tareas;


    public function mount()
    {
        $this->tareas= TareasDB::orderBy("created_at", "desc")->get();
    }

    public function render()
    {
        return view('livewire.tareas')
                                ->extends('layouts.main')
                                ->section('content');
    }

    public function addTarea()
    {
        if($this->tarea != null && $this->tarea != '')
        {
            TareasDB::Create([
                'nombre' => $this->tarea,
                'estado'
            ]);
        }


        $this->tareas= TareasDB::orderBy("created_at", "desc")->get();
        $this->tarea = '';
     }

 
     public function eliminar($id)
     {
         //ELiminar la tarea
         $tareaEliminar= TareasDB::find($id);
         $tareaEliminar->delete();
         //Cargar todos los cursos
 
         $this->tareas= TareasDB::orderBy("created_at", "desc")->get();
    }

    public function update($id)
    {
        $estados = $this->tarea = TareasDB::find($id);

        if($estados->estado == "porCumplir"){
            $estados->update([
                "estado" => "Cumplido",
            ]);
            $this->tareas= TareasDB::orderBy("created_at", "desc")->get();
        }

        elseif($estados->estado == "Cumplido"){
            $estados->update([
                "estado" => "porCumplir",
            ]);

        $this->tareas= TareasDB::orderBy("created_at", "desc")->get();
        }

        $this->tareas= TareasDB::orderBy("created_at", "desc")->get();
      }
      
    }
