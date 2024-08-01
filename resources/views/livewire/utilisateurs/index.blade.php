<div>
    @if ($isBtnAaaClicked)
        @include("livewire.utilisateurs.create")
    @else
        @include("livewire.utilisateurs.list")
    @endif
</div>