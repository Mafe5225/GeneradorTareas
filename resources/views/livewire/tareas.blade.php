<div class="container">
    <div class="content">
        <h4>Mis tareas</h4>

        <form wire:submit.prevent="addTarea">
            <input type="text" wire:model='tarea' class="input" style="padding-left: 1rem" placeholder="Tarea">
            <button type="submit" class="btnTarea" value="Actualizar">Agregar tarea</button>
        </form>
        
        
        @if ($tareas != null)
            <table>
                <tbody>
                    @foreach ($tareas as $item )
                        @if ($item->estado == "porCumplir")
                            <tr>
                                <td class="nomPorCumplir" style="padding-left: 1rem" wire:click='update({{ $item->id}})'>{{ $item->nombre }}</td>
                                <td>
                                    <button class="btnPorCumplir"
                                        wire:click='eliminar({{ $item->id }})'>
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr> 
                        @endif
                    @endforeach
                    @foreach ($tareas as $item )
                        @if ($item->estado == "Cumplido")
                            <tr>
                                <td class="nomCumplido" style="padding-left: 1rem" wire:click='update({{ $item->id}})'>{{ $item->nombre }}</td>
                                <td>
                                    <button class="btnCumplido"
                                        wire:click='eliminar({{ $item->id }})'>
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

