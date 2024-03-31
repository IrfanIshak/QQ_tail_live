<!-- @datatableSort.blade.php -->
<div class="flex item-center">
    @if ( $sortCol !== $thName)
        <span class="dt-column-order"><x-heroicon-s-arrows-up-down class="w-4 h-4 mt-1"/></span>
    @elseif ( $sortDir === 'ASC')
        <span class="dt-column-order"><x-heroicon-s-arrow-small-down class="w-4 h-4 mt-1"/></span>
    @else
        <span class="dt-column-order"><x-heroicon-s-arrow-small-up class="w-4 h-4 mt-1"/></span>
    @endif
    <span class="capitalize ml-2" role="button">{{ $thName }}</span>
</div>