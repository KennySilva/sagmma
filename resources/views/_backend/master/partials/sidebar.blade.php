<aside class="main-sidebar">
    <section class="sidebar">

        @if(Auth::check())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/uploads/avatars/{!! Auth::user()->avatar !!}" class="img-circle" alt="Placeholder">
                </div>
                <div class="pull-left info">
                    <p style="color: #000;"  >{{ Auth::user()->name }}</p>
                    <a style="color: #000;"  href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Procurar..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>

        <ul class="sidebar-menu">
            <li style="color: #000;" class="header"><h4>Navegação</h4></li>
            <li><a href="{{ url('/home') }}"><i class='fa fa-home'></i> <span>HOME</span></a></li>
            @role(['super-admin', 'admin', 'dpel'])
            @permission(['manage-users', 'manage-admins'])
            <li class="treeview">
                <a href="#"><i class=' fa fa-cogs'></i><span>SISTEMA</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('user/users') }}"><i class='fa fa-users'></i> <span>Utilizadores</span></a></li>
                    <li><a href="{{ url('user/permissions') }}"><i class='fa fa-hand-stop-o'></i> <span>Permissões</span></a></li>
                    <li><a href="{{ url('user/roles') }}"><i class='fa fa-dot-circle-o'></i> <span>Papéis</span></a></li>
                </ul>
            </li>
            @endpermission
            @endrole
            {{-- ------------------------------------------------------------------------------------------------- --}}
            @role(['super-admin', 'admin', 'dpel', 'administrative-assistant', 'manager'])
            @permission(['backend-access'])
            <li class="treeview">
                <a href="#"><i class='fa fa-line-chart'></i> <span>SAGMMA</span> <i class="fa fa-angle-left pull-right"></i></a>
                {{-- -------------------------------------------------------------------------------------------------- --}}
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-bar-chart-o"></i><span>Gestão</span><i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            @permission(['manage-contracts'])
                            <li><a href="{{ url('sagmma/contracts') }}"><i class="fa fa-file-text-o"></i><span>Contratos</span></a></li>
                            @endpermission
                            <li><a href="{{ url('sagmma/controls') }}"><i class="fa fa-dot-circle-o"></i><span>Controlo dos Materiais</span></a></li>
                            <li><a href="{{ url('sagmma/taxations') }}"><i class="fa fa-usd"></i><span>Cobrança de Impostos</span></a></li>
                        </ul>
                    </li>
                    @permission(['manage-resources'])
                    <li><a href="{{ url('sagmma/markets') }}"><i class='fa fa-university'></i> <span>Mercados</span></a></li>
                    <li><a href="{{ url('sagmma/employees') }}"><i class='fa fa-address-card'></i> <span>Funcionários</span></a></li>
                    <li><a href="{{ url('sagmma/materials') }}"><i class='fa fa-briefcase'></i> <span>Materiais</span></a></li>
                    <li><a href="{{ url('sagmma/places') }}"><i class='fa fa-map-marker'></i> <span>Espaços</a></li>
                        <li><a href="{{ url('sagmma/traders') }}"><i class='fa fa-user'></i> <span>Comerciantes</a></li>
                            <li><a href="{{ url('sagmma/promotions') }}"><i class='fa fa-shopping-bag'></i> <span>Promoções</a></li>
                            </ul>
                        </li>
                        @endpermission
                        @endpermission
                        @endrole

                        @role(['super-admin', 'admin', 'dpel', 'articles-manager'])
                        @permission(['backend-access','manage-articles', 'create-post', 'edit-post', 'delete-post', 'view-post'])
                        <li class="treeview">
                            <a href="#"><i class='fa fa-desktop'></i> <span>APLICAÇÃO E CONTEÚDO</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="{{ url('web/categories') }}"><i class='fa fa-folder-open'></i> <span>Categorias</span></a></li>
                                <li><a href="{{ url('web/tags') }}"><i class='fa fa-tag'></i> <span>Marcadores</span></a></li>
                                <li><a href="{{ url('web/articles') }}"><i class='fa fa-file'></i> <span>Artigos</span></a></li>
                                <li><a href="{{ url('web/images') }}"><i class='fa fa-file-image-o'></i> <span>Imagens</span></a></li>
                            </ul>
                        </li>
                        @endpermission
                        @endrole
                    </ul>
                </section>
            </aside>
