<nav class="nav justify-center m-2 text-white">
    <h2>Filament-Rs</h2>
</nav>
<nav class="nav flex-column">
    {{-- collapse menu --}}
    @include('partial.sidebar_submenu_collapse')
    {{-- default menu --}}
    @include('partial.sidebar_submenu_nonCollapse')
</nav>

