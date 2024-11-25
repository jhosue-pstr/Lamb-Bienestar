<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\RoleForm;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use WireUi\Traits\WireUiActions;

class RoleMain extends Component{
    use WithPagination;
    use WireUiActions;

    public $isOpen=false;
    public $search,$active=true;
    public RoleForm $form;
    public ?Role $role;


    public function render(){
        $roles=Role::where('name','LIKE','%'.$this->search.'%')->paginate();
        return view('livewire.admin.role-main',compact('roles'));
    }

    public function confirmSimple($role): void{
        $this->dialog()->confirm([
            'title'=> '¿Seguro que deseas eliminar el registro?',
            'icon'=> 'error',
            'method'=> 'destroy',
            'params'=> $role
        ]);
    }

    public function create(){
        $this->isOpen=true;
        $this->form->reset();
        $this->reset(['group']);
        $this->resetValidation();
    }

    public function edit(Role $role){
        // dd($member);
        $this->role=$role;
        $this->form->fill($role);
        $this->isOpen=true;
        $this->resetValidation();
    }

    public function destroy(Role $role){
        //$member->delete();
        $role->update(['active'=>false]);
        //return redirect()->route('members');
        $this->notification()->send([
            'icon' => 'info',
            'title' => 'El miembro paso al grupo inactivos',
        ]);
    }

    public function store(){
        $this->validate();
        if(!isset($this->group->id)){
            Role::create($this->form->all());
            $this->notification()->send([
                'icon' => 'success',
                'title' => 'Registro creado...',
            ]);
        }else{
            $this->role->update($this->form->all());
            $this->notification()->send([
                'icon' => 'success',
                'title' => 'Registro actualizado...',
            ]);
        }
        $this->reset(['isOpen']);
    }


    public function renovate(Role $role){
        $role->update(['active'=>true]);
        $this->notification()->send([
            'icon' => 'success',
            'title' => 'Se restauró al miembro al grupo activos',
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }

}
