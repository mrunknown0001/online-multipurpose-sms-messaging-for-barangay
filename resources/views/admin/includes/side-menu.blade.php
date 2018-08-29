<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
                <div class="logo">

                </div> <strong>Admin</strong> </div>
        </div>
        <nav class="menu">
            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                <li class="{{ route('admin.dashboard') == url()->current() ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                </li>
                <li class="{{ route('admin.sending.groups') == url()->current() ? 'active' : '' }}">
                    <a href="{{ route('admin.sending.groups') }}">
                        <i class="fa fa-users"></i> Sending Groups
                    </a>
                </li>
                <li class="{{ route('admin.contacts') == url()->current() ? 'active' : '' }}">
                    <a href="{{ route('admin.contacts') }}">
                        <i class="fa fa-address-book"></i> Contacts
                    </a>
                </li>
                <li class="{{ route('admin.messages') == url()->current() ? 'active' : '' }}">
                    <a href="{{ route('admin.messages') }}">
                        <i class="fa fa-envelope-o"></i> Messages
                    </a>
                </li>
                <li class="{{ route('admin.settings') == url()->current() ? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}">
                        <i class="fa fa-cog"></i> Settings
                    </a>
                </li>
                <li class="{{ route('admin.activity.logs') == url()->current() ? 'active' : '' }}">
                    <a href="{{ route('admin.activity.logs') }}">
                        <i class="fa fa-history"></i> Activity Logs
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <footer class="sidebar-footer">
        <ul class="sidebar-menu metismenu" id="customize-menu">
            <li>
                <ul>
                    <li class="customize">
                        <div class="customize-item">
                            <div class="row customize-header">
                                <div class="col-4"> </div>
                                <div class="col-4">
                                    <label class="title">fixed</label>
                                </div>
                                <div class="col-4">
                                    <label class="title">static</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Sidebar:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed" style="visibility: hidden;">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Header:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="headerPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Footer:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="footerPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="customize-item">

                        </div>
                    </li>
                </ul>
                <a href="">
                    <i class="fa fa-cog"></i> Customize </a>
            </li>
        </ul>
    </footer>
</aside>