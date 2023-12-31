<!--sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a style="display: flex;" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{asset('img/icon_main.png')}}" style="max-height: 55px !important" alt="logo">
                            <img class="logo-dark logo-img" src="{{asset('img/icon_main.png')}}" style="max-height: 55px !important" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="{{asset('img/icon_main.png')}}" style="max-height: 55px !important"  alt="logo-small">
                            <!-- <h4>Loan Panel</h4> -->
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                
                                <li class="nk-menu-heading">  
                                    <a href="javascript:void(0)" class="nk-menu-link"><span class="nk-menu-text"><h6 class="overline-title text-primary-alt">Dashboard</h6></span></a>
                                </li><!-- .nk-menu-heading -->
                                
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">User Management</span>
                                    </a>

                                    <ul class="nk-menu-sub">
                                        @if(Auth::user()->role_id==1)
                                        <li class="nk-menu-item">
                                            <a href="{{url('agents')}}" class="nk-menu-link"><span class="nk-menu-text">All Agents</span></a>
                                        </li>
                                        @endif
                                        
                                        <li class="nk-menu-item">
                                            <a href="{{url('customers')}}" class="nk-menu-link"><span class="nk-menu-text">All Customers</span></a>
                                        </li>
                                        
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                
                               <!--  <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file"></em></span>
                                        <span class="nk-menu-text">Import Files</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{url('loan-types')}}" class="nk-menu-link"><span class="nk-menu-text">Loan Types</span></a>
                                        </li>
                                        
                                        <li class="nk-menu-item">
                                            <a href="{{url('loan-documents')}}" class="nk-menu-link"><span class="nk-menu-text">Documents</span></a>
                                        </li>
                                        
                                    </ul>
                                </li> -->
                                
                                 <li class="nk-menu-item">
                                    <a href="{{url('import-excel')}}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file"></em></span>
                                        <span class="nk-menu-text">
                                        @if(Auth::user()->role_id==1)
                                        Import Excel
                                        @else
                                        Customer Report
                                        @endif
                                        </span>
                                    </a>
                                   
                                </li>
                                @if(Auth::user()->role_id==1)
                                <li class="nk-menu-item">
                                    <a href="{{url('notifications')}}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bell"></em></span>
                                        <span class="nk-menu-text">
                                        Notifications
                                        </span>
                                    </a>
                                   
                                </li>
                                @endif
                                <!-- .nk-menu-item -->
                                
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e