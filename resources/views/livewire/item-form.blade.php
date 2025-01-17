<div>
  <form>
    <div class="d-flex">
      <x-wire-input-text model="item.nome" prepend="Nome" class="mr-auto" />
      <x-wire-select model="item.grupo_id" :options="$gruposSelect" prepend="Grupo"></x-wire-select>
      <x-wire-switch label="Exibir" model="item.exibir" />
    </div>
    <x-wire-input-text model="item.url" prepend="URL" class="mr-auto" />
    <x-wire-textarea label="Descrição" model="item.descricao" />
    <div class="d-flex flex-row">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      <button type="submit" class="btn btn-primary ml-2" wire:click.prevent="salvarItem">Salvar</button>
    </div>
  </form>
</div>
