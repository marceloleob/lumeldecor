
    <div class="settings_links_2 bg_white">
        {{-- <ul>
            <li><span>Gerenciar Imóveis</span></li>
            <li class="{!! (request()->is('admin/imoveis-pendentes')) ? 'active' : '' !!}"><a href="{!! route('properties-waiting') !!}"><i class="fas fa-house-damage"></i>Pendentes</a></li>
            <li class="{!! (request()->is('admin/imoveis-publicados')) ? 'active' : '' !!}"><a href="{!! route('properties-published') !!}"><i class="fas fa-home"></i>Publicados</a></li>
            <li class="{!! (request()->is('admin/imoveis-concluidos')) ? 'active' : '' !!}"><a href="{!! route('properties-done') !!}"><i class="fas fa-key"></i>Concluídos</a></li>
            <li class="{!! (request()->is('admin/anunciar-meu-imovel')) ? 'active' : '' !!}"><a href="{!! route('properties-advertise') !!}"><i class="fas fa-plus-circle"></i>Adicionar Imóvel</a></li>
        </ul>
        <ul>
            <li><span>Configurações dos Imóveis</span></li>
            <li class="{!! (request()->is('admin/caracteristicas')) ? 'active' : '' !!}"><a href="{!! route('properties-feature') !!}"><i class="far fa-building"></i>Características</a></li>
            <li class="{!! (request()->is('admin/tipos-imoveis/comercial')) ? 'active' : '' !!}"><a href="{!! route('properties-type', ['comercial']) !!}"><i class="fas fa-hotel"></i>Tipos Comerciais</a></li>
            <li class="{!! (request()->is('admin/tipos-imoveis/residencial')) ? 'active' : '' !!}"><a href="{!! route('properties-type', ['residencial']) !!}"><i class="fas fa-city"></i>Tipos Residenciais</a></li>
        </ul>
        <ul>
            <li><span>Gerenciar Usuários</span></li>
            <li class="{!! (request()->is('admin/')) ? 'active' : '' !!}"><a href="#"><i class="fas fa-users"></i>Todos</a></li>
            <li class="{!! (request()->is('admin/')) ? 'active' : '' !!}"><a href="#"><i class="fas fa-user-tag"></i>Anunciantes</a></li>
            <li class="{!! (request()->is('admin/')) ? 'active' : '' !!}"><a href="#"><i class="fas fa-user-tie"></i>Corretores</a></li>
        </ul>
        <ul>
            <li class="{!! (request()->is('admin/mensagens-recebidas')) ? 'active' : '' !!}">
                <a href="{!! route('contact-list') !!}"><i class="far fa-comments"></i>Mensagens recebidas
                    @if ($count_message > 0)
                        <sup><i class="fa fa-circle" aria-hidden="true"></i></sup> <span>( {!! $count_message !!} )</span>
                    @endif
                </a>
            </li>
        </ul>
        <ul>
            <li><span>Configurações</span></li>
            <li class="{!! (request()->is('admin/')) ? 'active' : '' !!}"><a href="#"><i class="fa fa-user-cog"></i>Meu perfil</a></li>
            <li class="{!! (request()->is('admin/')) ? 'active' : '' !!}"><a href="#"><i class="fa fa-unlock-alt"></i>Alterar minha senha</a></li>
        </ul> --}}
        <ul>
            <li class="{!! (request()->is('admin/')) ? 'active' : '' !!}"><a href="#"><i class="fa fa-sign-out-alt"></i>Sair</a></li>
        </ul>
    </div>
