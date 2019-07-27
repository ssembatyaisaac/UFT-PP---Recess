@php($pageSlug='dashboard')
<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('UTF Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Funds Per Month') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                    <a href="{{ route('home1') }}">
                        <i class="tim-icons icon-chart-pie-36"></i>
                        <p>{{ _('Funds Per Period') }}</p>
                    </a>
                </li>

                    <li @if ($pageSlug == 'dashboard') class="active " @endif>
                            <a href="{{ route('home2') }}">
                                <i class="tim-icons icon-chart-pie-36"></i>
                                <p>{{ _('Change in Enrollment') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'dashboard') class="active " @endif>
                            <a href="{{ route('home3') }}">
                                <i class="tim-icons icon-chart-pie-36"></i>
                                <p>{{ _('Well Wishers') }}</p>
                            </a>
                        </li>

            <li @if ($pageSlug == 'agents') class="active " @endif>
                <a href="{{ route('agent.index') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Agent') }}</p>
                </a>
            </li>
            {{--  <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Laravel Examples') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('User Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>


            </li>  --}}
            {{--  created for agents  --}}

            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Districts Center') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == 'districts') class="active " @endif>
                                <a href="{{ route('district.index')  }}">
                                    <i class="tim-icons icon-align-center"></i>
                                    <p>{{ _('Registered Districts') }}</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'districts') class="active " @endif>
                                <a href="{{ route('district.create')  }}">
                                    <i class="tim-icons icon-bullet-list-67"></i>
                                    <p>{{ _('Register New') }}</p>
                                </a>
                            </li>
                        </ul>
                    </div>

            </li>

            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Agents Center   ') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == 'agents') class="active " @endif>
                                <a href="{{ route('agent.index')  }}">
                                    <i class="tim-icons icon-single-02"></i>
                                    <p>{{ _('Registered Agents') }}</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'agents') class="active " @endif>
                                <a href="/recommend">
                                    <i class="tim-icons icon-single-02"></i>
                                    <p>{{ _('Recommended Members') }}</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'agents') class="active " @endif>
                                <a href="{{ route('agent.create')  }}">
                                    <i class="tim-icons icon-bullet-list-67"></i>
                                    <p>{{ _('Register New') }}</p>
                                </a>
                            </li>
                        </ul>
                    </div>

            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Funds') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == 'districts') class="active " @endif>
                                <a href="{{ route('pay.index')  }}">
                                    <i class="tim-icons icon-align-center"></i>
                                    <p>{{ _('Funds and Donors') }}</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'districts') class="active " @endif>
                                <a href="{{ route('pay.create')  }}">
                                    <i class="tim-icons icon-bullet-list-67"></i>
                                    <p>{{ _('Register New') }}</p>
                                </a>
                            </li>
                        </ul>
                    </div>

            </li>

            {{--  <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ _('Icons') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ _('Maps') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ _('Notifications') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ _('Table List') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ _('Typography') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'rtl') class="active " @endif>
                <a href="{{ route('pages.rtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ _('RTL Support') }}</p>
                </a>
            </li>
            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }}">
                <a href="{{ route('pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ _('Upgrade to PRO') }}</p>
                </a>
            </li>  --}}
        </ul>
    </div>
</div>
