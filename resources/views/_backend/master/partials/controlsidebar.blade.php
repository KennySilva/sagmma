<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Ultimas Atividades</h3>
            {{-- <ul class='control-sidebar-menu'>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
            </ul><!-- /.control-sidebar-menu --> --}}



        </div><!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">Configurações</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Gráficos Estatistico
                        <input type="checkbox" class="pull-right" checked />
                    </label>
                    <p class="text-help">
                        Gráficos para controlar as atividades da gestão e as atividades do sistema
                    </p>
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Calendário de Tarefas
                        <input type="checkbox" class="pull-right" checked />
                    </label>
                    <p class="text-help">
                        Controlar as minhas atividaes diárias com Calendário dinamico de atividades
                    </p>
                </div><!-- /.form-group -->
            </form>
        </div><!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar -->

<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>
