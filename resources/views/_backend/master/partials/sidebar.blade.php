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
            <!---------------------------------------------------------------------------------------------------->

            {{-- <li class="treeview">
            <a href="#"><i class=' fa fa-cogs'></i> <span>SISTEMA</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            <li><a href="{{ url('user/users') }}"><i class='fa fa-users'></i> <span>Utilizadores</span></a></li>
            <li><a href="{{ url('sagmma/contracts') }}"><i class='fa fa-file-text'></i> <span>Contratos</span></a></li>
            <li><a href="{{ url('sagmma/taxations') }}"><i class='fa fa-usd'></i> <span>Cobranças</span></a></li>
            <li><a href="{{ url('sagmma/controls') }}"><i class='fa fa-users'></i> <span>Gerir Materiais</span></a></li>

            @role('owener')
            <li class="treeview">
            <a href="#"><i class="fa fa-users"></i><span>Role teste</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="{{ url('user/users') }}"><i class="fa-fw fa fa-list-alt"></i><span>Gerir Urilizadores</span></a></li>
        <li><a href="{{ url('user/users') }}"><i class="fa-fw fa fa-list-alt"></i><span>role permission1</span></a></li>

        @permission(['sagmma_bacdkend','redtit-user'])
        <li><a href="{{ url('user/users') }}"><i class="fa-fw fa fa-list-alt"></i><span>Role permission2</span></a></li>
        @endpermission
    </ul>
</li>
@endrole

@permission('rediyyt-user')
<li class="treeview">
<a href="#"><i class="fa fa-users"></i><span>Permission teste</span><i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="{{ url('user/users') }}"><i class="fa-fw fa fa-list-alt"></i><span>Gerir Urilizadores</span></a></li>
</ul>
</li>
@endpermission


@ability('soa', 'soa-la')
<li class="treeview">
<a href="#"><i class="fa fa-users"></i><span>Ability teste</span><i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="{{ url('user/users') }}"><i class="fa-fw fa fa-list-alt"></i><span>Gerir Urilizadores</span></a></li>
</ul>
</li>
@endability
</ul>
</li> --}}
{{-- @endif --}}




<!------------------------------------------------------------------------------------------------------------------------------------>
<li class="treeview">
    <a href="#"><i class='fa fa-line-chart'></i> <span>SAGMMA</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ url('sagmma/markets') }}"><i class='fa fa-university'></i> <span>Utilizadores</span></a></li>

        <li><a href="{{ url('sagmma/employees') }}"><i class='fa fa-address-card'></i> <span>Funcionários</span></a></li>
        <li><a href="{{ url('sagmma/materials') }}"><i class='fa fa-briefcase'></i> <span>Materiais</span></a></li>
        <li><a href="{{ url('sagmma/places') }}"><i class='fa fa-map-marker'></i> <span>Espaços</a></li>
            <li><a href="{{ url('sagmma/places') }}"><i class='fa fa-map-marker'></i> <span>Espaços</a></li>
                <li><a href="{{ url('sagmma/traders') }}"><i class='fa fa-user'></i> <span>Comerciantes</a></li>
                </ul>
            </li>


            {{-- <li class="treeview">
                <a href="#"><i class='fa fa-desktop'></i> <span>APLICAÇÃO E CONTEÚDO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                    <!--------------------------------------------------------->

                    <li class="treeview">
                        <a href="#"><i class="fa fa-folder-open"></i><span>Categorias</span><i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Link in level 3</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-eye"></i><span>Level 3</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="#">Link in level 4</a></li>

                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-------------------------------------------------------->
                    <li class="treeview">
                        <a href="#"><i class="fa fa-tag"></i><span>Etiquetas</span><i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Link in level 3</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-eye"></i><span>Level 3</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="#">Link in level 4</a></li>

                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-------------------------------------------------------->

                    <li class="treeview">
                        <a href="#"><i class="fa fa-tasks"></i><span>Tarefas</span><i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Link in level 3</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-eye"></i><span>Level 3</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="#">Link in level 4</a></li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!---------------------------------------------------------->
                    <li class="treeview">
                        <a href="#"><i class="fa fa-file"></i><span>Artigos</span><i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Link in level 3</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-eye"></i><span>Level 3</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="#">Link in level 4</a></li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li class="treeview">
                        <a href="#"><i class="fa fa-file-image-o"></i><span>Imagens</span><i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Link in level 3</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-eye"></i><span>Level 3</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="#">Link in level 4</a></li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!---------------------------------------------------------->
                    <li class="treeview">
                        <a href="#"><i class="fa fa-bars"></i><span>Menu</span><i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Link in level 3</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-eye"></i><span>Level 3</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="#">Link in level 4</a></li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> --}}

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
