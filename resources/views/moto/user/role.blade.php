@switch($item->role)
    @case('A')
        {{ 'DBA' }}
        @break
    @case('B')
        {{ 'Administrador' }}
        @break
    @case('C')
        {{ 'conductor' }}
        @break
    @default
        {{ 'Cliente' }}
@endswitch