<div class="to-hover hover-bg">
  @if (!$item->exibir)
    <span class="badge text-warning"><i class="fas fa-eye-slash"></i></span>
  @endif

  @if ($item->url)
    <a href="{{ $item->url }}">{{ $item->nome }}</a>
  @else
    {{ $item->nome }}
  @endif

  @if ($item->descricao)
    <button class="btn px-1 py-0 toggleDescricao"><i class="fas fa-caret-down"></i></button>
  @endif

  @includeWhen(Gate::allows('gerente'), 'livewire.partials.item-gerente-menu')
  
  <div class="descricao ml-3">{{ $item->descricao }}</div>
</div>

@once

  @section('styles')
    @parent
    <style>
      .descricao {
        display: none;
      }

    </style>
  @endsection

  @section('javascripts_bottom')
    @parent
    <script>
      $(document).ready(function() {

        $('.toggleDescricao').on('click', function() {
          console.log('toggleDescricao')
          $(this).parent().find('.descricao').slideToggle()
        })

      })
    </script>
  @endsection

@endonce
