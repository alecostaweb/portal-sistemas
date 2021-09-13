<div>

  @can('gerente')
    <button class="btn btn-primary mb-3" wire:click="$emit('criarGrupo')">Novo Grupo</button>
  @endcan

  <div class="row">
    @foreach (range(1, config('portal-sistemas.num_cols')) as $col)
      <div class="col-md-{{ config('portal-sistemas.col_width') }}">
        @include('livewire.partials.grupos-coluna')
      </div>
    @endforeach
  </div>

  {{-- Grupos sem colunas --}}
  <div class="row">
    @foreach (range(config('portal-sistemas.num_cols') + 1, 4) as $col)
      <div class="col-md-12">
        @include('livewire.partials.grupos-coluna')
      </div>
    @endforeach
  </div>

  @includeWhen(Gate::allows('gerente'), 'partials.sistemas-sem-grupo')

  <!-- Modal -->
  <div class="modal" tabindex="-1" id="modalGrupo">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ $modalTitle ?? ''}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @livewire('grupo-form')
        </div>
      </div>
    </div>
  </div>

  @section('javascripts_bottom')
    @parent
    <script>
      window.addEventListener('openGrupoModal', event => {
        $('#modalGrupo').modal('show')
      })

      window.addEventListener('closeGrupoModal', event => {
        $('#modalGrupo').modal('hide')
      })
    </script>
  @endsection

</div>