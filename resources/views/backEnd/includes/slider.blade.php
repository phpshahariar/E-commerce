<aside id="basicSidebar" class="pmd-sidebar  sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons" role="navigation">
    <ul class="nav pmd-sidebar-nav">

        <!-- User info -->
        <li class="dropdown pmd-dropdown pmd-user-info visible-xs visible-md visible-sm visible-lg">
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" aria-expandedhref="javascript:void(0);">
                <div class="media-left">
                    <img src="{{asset('backEnd/themes/')}}/images/user-icon.png" alt="New User">
                </div>
                <div class="media-body media-middle">{{Session::get('admin_name')}}</div>
                <div class="media-right media-middle"><i class="dic-more-vert dic"></i></div>
            </a>
            <ul class="dropdown-menu">
                <li><a onclick="return confirm('Are you Sure?? \n You Want To Logout From This Applicaion')" href="{{URL::to('/logout')}}">Logout</a></li>
            </ul>
        </li><!-- End user info -->

        <li>
            <a class="pmd-ripple-effect" href="{{route('/dash-board')}}">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                                                        xml:space="preserve">
<g>
    <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
</g>
</svg></i>
                <span class="media-body">Dashboard</span>
            </a>
        </li>
        @if(Session::get('admin_role') == 2)
        <li class="dropdown pmd-dropdown">
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="18px" height="18.001px" viewBox="0 0 18 18.001" enable-background="new 0 0 18 18.001" xml:space="preserve">
<path fill="#C9C8C8" d="M6.188,0.001C5.232,0.001,4.5,0.732,4.5,1.688c0,0.394,0.166,0.739,0.334,1.02L5.45,3.71
	c0.113,0.113,0.176,0.341,0.176,0.51v0.281c0,0.619-0.506,1.125-1.125,1.125H0.282c-0.169,0-0.281,0.112-0.281,0.281V17.72
	c0,0.168,0.112,0.281,0.281,0.281h4.219c0.619,0,1.125-0.506,1.125-1.125v-0.281c0-0.168-0.063-0.397-0.176-0.509
	c0,0-0.615-0.946-0.615-1.002C4.666,14.802,4.5,14.457,4.5,14.063c0-0.956,0.731-1.688,1.688-1.688s1.688,0.731,1.688,1.688
	c0,0.394-0.166,0.739-0.334,1.02l-0.616,1.002c-0.056,0.112-0.176,0.341-0.176,0.509v0.281c0,0.619,0.506,1.125,1.125,1.125h4.219
	c0.168,0,0.281-0.113,0.281-0.281V13.5c0-0.619,0.506-1.125,1.125-1.125h0.281c0.169,0,0.396,0.063,0.51,0.176
	c0,0,0.945,0.616,1.002,0.616c0.337,0.168,0.626,0.334,1.02,0.334c0.956,0,1.687-0.731,1.687-1.687c0-0.957-0.731-1.688-1.687-1.688
	c-0.394,0-0.738,0.166-1.02,0.334l-1.002,0.616c-0.113,0.056-0.341,0.176-0.51,0.176H13.5c-0.619,0-1.125-0.506-1.125-1.125V5.908
	c0-0.168-0.113-0.281-0.281-0.281H7.875c-0.619,0-1.125-0.506-1.125-1.125V4.221c0-0.168,0.063-0.397,0.176-0.51
	c0,0,0.616-0.945,0.616-1.001c0.168-0.281,0.334-0.626,0.334-1.02C7.875,0.733,7.144,0.002,6.188,0.001L6.188,0.001z"/>
</svg></i>
                <span class="media-body">Setting</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{URL::to('/slider')}}">Slider</a></li>
                <li><a href="{{URL::to('/logo')}}">Logo</a></li>
                <li><a href="{{URL::to('/info')}}">Info</a></li>
                <li><a href="{{URL::to('/dynamic-page')}}">Dynamic Pages</a></li>
                <li><a href="{{URL::to('/event-image')}}">Event Image</a></li>
                {{--<li><a href="{{URL::to('/district')}}">District</a></li>--}}
                {{--<li><a href="{{URL::to('/sub-district')}}">Sub District</a></li>--}}

            </ul>
        </li>
        @endif
        <li>
            <a class="pmd-ripple-effect" href="{{URL::to('/product')}}">
                <i class="media-left media-middle">
                    <svg version="1.1" id="Layer_1" x="0px" y="0px" width="15.3px" height="18px" viewBox="289.99 337.535 15.3 18" enable-background="new 289.99 337.535 15.3 18" xml:space="preserve">
					<g>
                        <g>
                            <path fill="#C9C8C8" d="M297.64,355.535c0.99,0,1.8-0.81,1.8-1.8h-3.6C295.84,354.725,296.65,355.535,297.64,355.535z
								 M303.49,350.135v-4.95c0-2.79-1.891-5.041-4.501-5.67v-0.63c0-0.72-0.63-1.35-1.35-1.35c-0.72,0-1.35,0.63-1.35,1.35v0.63
								c-2.61,0.629-4.5,2.88-4.5,5.67v4.95l-1.8,1.8v0.9h15.3v-0.9L303.49,350.135z"/>
                        </g>
                    </g>
				</svg></i>
                <span class="media-body">Product</span>
            </a>
        </li>
        <li class="dropdown pmd-dropdown">
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="18px" height="18.001px" viewBox="0 0 18 18.001" enable-background="new 0 0 18 18.001" xml:space="preserve">
<path fill="#C9C8C8" d="M6.188,0.001C5.232,0.001,4.5,0.732,4.5,1.688c0,0.394,0.166,0.739,0.334,1.02L5.45,3.71
	c0.113,0.113,0.176,0.341,0.176,0.51v0.281c0,0.619-0.506,1.125-1.125,1.125H0.282c-0.169,0-0.281,0.112-0.281,0.281V17.72
	c0,0.168,0.112,0.281,0.281,0.281h4.219c0.619,0,1.125-0.506,1.125-1.125v-0.281c0-0.168-0.063-0.397-0.176-0.509
	c0,0-0.615-0.946-0.615-1.002C4.666,14.802,4.5,14.457,4.5,14.063c0-0.956,0.731-1.688,1.688-1.688s1.688,0.731,1.688,1.688
	c0,0.394-0.166,0.739-0.334,1.02l-0.616,1.002c-0.056,0.112-0.176,0.341-0.176,0.509v0.281c0,0.619,0.506,1.125,1.125,1.125h4.219
	c0.168,0,0.281-0.113,0.281-0.281V13.5c0-0.619,0.506-1.125,1.125-1.125h0.281c0.169,0,0.396,0.063,0.51,0.176
	c0,0,0.945,0.616,1.002,0.616c0.337,0.168,0.626,0.334,1.02,0.334c0.956,0,1.687-0.731,1.687-1.687c0-0.957-0.731-1.688-1.687-1.688
	c-0.394,0-0.738,0.166-1.02,0.334l-1.002,0.616c-0.113,0.056-0.341,0.176-0.51,0.176H13.5c-0.619,0-1.125-0.506-1.125-1.125V5.908
	c0-0.168-0.113-0.281-0.281-0.281H7.875c-0.619,0-1.125-0.506-1.125-1.125V4.221c0-0.168,0.063-0.397,0.176-0.51
	c0,0,0.616-0.945,0.616-1.001c0.168-0.281,0.334-0.626,0.334-1.02C7.875,0.733,7.144,0.002,6.188,0.001L6.188,0.001z"/>
</svg></i>
                <span class="media-body">Order Info</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{URL::to('/order-list')}}">Order List</a></li>
                <li><a href="{{URL::to('/delevery-order')}}">Delivered List</a></li>
                @if(Session::get('admin_role') == 2)
                <li><a href="{{URL::to('/shopper-order-list')}}">Shopper Order List</a></li>
                <li><a href="{{URL::to('/shopper-delevered-list')}}">Shopper Delevered List</a></li>
                @endif
                {{--<li><a href="{{URL::to('/division')}}">Division</a></li>--}}
                {{--<li><a href="{{URL::to('/district')}}">District</a></li>--}}
                {{--<li><a href="{{URL::to('/sub-district')}}">Sub District</a></li>--}}

            </ul>
        </li>
        @if(Session::get('admin_role') == 2)
        <li>
            <a class="pmd-ripple-effect" href="{{URL::to('/customer-list')}}">
                <i class="media-left media-middle">
                    <svg version="1.1" id="Layer_1" x="0px" y="0px" width="15.3px" height="18px" viewBox="289.99 337.535 15.3 18" enable-background="new 289.99 337.535 15.3 18" xml:space="preserve">
					<g>
                        <g>
                            <path fill="#C9C8C8" d="M297.64,355.535c0.99,0,1.8-0.81,1.8-1.8h-3.6C295.84,354.725,296.65,355.535,297.64,355.535z
								 M303.49,350.135v-4.95c0-2.79-1.891-5.041-4.501-5.67v-0.63c0-0.72-0.63-1.35-1.35-1.35c-0.72,0-1.35,0.63-1.35,1.35v0.63
								c-2.61,0.629-4.5,2.88-4.5,5.67v4.95l-1.8,1.8v0.9h15.3v-0.9L303.49,350.135z"/>
                        </g>
                    </g>
				</svg></i>
                <span class="media-body">Customer List</span>
            </a>
        </li>

        <li>
            <a class="pmd-ripple-effect" href="{{URL::to('/register')}}">
                <i class="media-left media-middle">
                    <svg version="1.1" id="Layer_1" x="0px" y="0px" width="18px" height="18px" viewBox="288.64 337.535 18 18" enable-background="new 288.64 337.535 18 18" xml:space="preserve">
				<path fill="#C9C8C8" d="M295.39,337.535v2.25h9v13.5h-9v2.25h11.25v-18H295.39z M297.64,342.035v3.375h-9v2.25h9v3.375l3.375-3.375
					l1.125-1.125l-1.125-1.125L297.64,342.035z"/>
				</svg></i>
                <span class="media-body">Shopper Registration</span>
            </a>
        </li>

        <li class="dropdown pmd-dropdown">
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="18px" height="18.001px" viewBox="0 0 18 18.001" enable-background="new 0 0 18 18.001" xml:space="preserve">
<path fill="#C9C8C8" d="M6.188,0.001C5.232,0.001,4.5,0.732,4.5,1.688c0,0.394,0.166,0.739,0.334,1.02L5.45,3.71
	c0.113,0.113,0.176,0.341,0.176,0.51v0.281c0,0.619-0.506,1.125-1.125,1.125H0.282c-0.169,0-0.281,0.112-0.281,0.281V17.72
	c0,0.168,0.112,0.281,0.281,0.281h4.219c0.619,0,1.125-0.506,1.125-1.125v-0.281c0-0.168-0.063-0.397-0.176-0.509
	c0,0-0.615-0.946-0.615-1.002C4.666,14.802,4.5,14.457,4.5,14.063c0-0.956,0.731-1.688,1.688-1.688s1.688,0.731,1.688,1.688
	c0,0.394-0.166,0.739-0.334,1.02l-0.616,1.002c-0.056,0.112-0.176,0.341-0.176,0.509v0.281c0,0.619,0.506,1.125,1.125,1.125h4.219
	c0.168,0,0.281-0.113,0.281-0.281V13.5c0-0.619,0.506-1.125,1.125-1.125h0.281c0.169,0,0.396,0.063,0.51,0.176
	c0,0,0.945,0.616,1.002,0.616c0.337,0.168,0.626,0.334,1.02,0.334c0.956,0,1.687-0.731,1.687-1.687c0-0.957-0.731-1.688-1.687-1.688
	c-0.394,0-0.738,0.166-1.02,0.334l-1.002,0.616c-0.113,0.056-0.341,0.176-0.51,0.176H13.5c-0.619,0-1.125-0.506-1.125-1.125V5.908
	c0-0.168-0.113-0.281-0.281-0.281H7.875c-0.619,0-1.125-0.506-1.125-1.125V4.221c0-0.168,0.063-0.397,0.176-0.51
	c0,0,0.616-0.945,0.616-1.001c0.168-0.281,0.334-0.626,0.334-1.02C7.875,0.733,7.144,0.002,6.188,0.001L6.188,0.001z"/>
</svg></i>
                <span class="media-body">Categories</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{URL::to('/main-categories')}}">Main Categories</a></li>
                <li><a href="{{URL::to('/sub-categories')}}">Sub Categories</a></li>

            </ul>
        </li>
        <li>
            <a class="pmd-ripple-effect" href="{{URL::to('/show-brand')}}">
                <i class="media-left media-middle">
                    <svg version="1.1" x="0px" y="0px" width="18px" height="12.479px" viewBox="288.64 363.118 18 12.479" enable-background="new 288.64 363.118 18 12.479" xml:space="preserve">
					<g transform="translate(641.29613,1096.2351)">
                        <path fill="#C9C8C8" d="M-352.656-726.466v-5.828l4.484,4.484c2.467,2.466,4.499,4.484,4.516,4.484s2.049-2.018,4.516-4.484
							l4.484-4.484v5.828v5.828h-9h-9V-726.466z M-347.854-728.929l-4.188-4.188h8.385h8.386l-4.188,4.188
							c-2.304,2.303-4.192,4.188-4.198,4.188S-345.551-726.626-347.854-728.929z"/>
                    </g>
				</svg></i>
                <span class="media-body">Brand</span>
            </a>
        </li>
        <li class="dropdown pmd-dropdown">
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="18px" height="18.001px" viewBox="0 0 18 18.001" enable-background="new 0 0 18 18.001" xml:space="preserve">
<path fill="#C9C8C8" d="M6.188,0.001C5.232,0.001,4.5,0.732,4.5,1.688c0,0.394,0.166,0.739,0.334,1.02L5.45,3.71
	c0.113,0.113,0.176,0.341,0.176,0.51v0.281c0,0.619-0.506,1.125-1.125,1.125H0.282c-0.169,0-0.281,0.112-0.281,0.281V17.72
	c0,0.168,0.112,0.281,0.281,0.281h4.219c0.619,0,1.125-0.506,1.125-1.125v-0.281c0-0.168-0.063-0.397-0.176-0.509
	c0,0-0.615-0.946-0.615-1.002C4.666,14.802,4.5,14.457,4.5,14.063c0-0.956,0.731-1.688,1.688-1.688s1.688,0.731,1.688,1.688
	c0,0.394-0.166,0.739-0.334,1.02l-0.616,1.002c-0.056,0.112-0.176,0.341-0.176,0.509v0.281c0,0.619,0.506,1.125,1.125,1.125h4.219
	c0.168,0,0.281-0.113,0.281-0.281V13.5c0-0.619,0.506-1.125,1.125-1.125h0.281c0.169,0,0.396,0.063,0.51,0.176
	c0,0,0.945,0.616,1.002,0.616c0.337,0.168,0.626,0.334,1.02,0.334c0.956,0,1.687-0.731,1.687-1.687c0-0.957-0.731-1.688-1.687-1.688
	c-0.394,0-0.738,0.166-1.02,0.334l-1.002,0.616c-0.113,0.056-0.341,0.176-0.51,0.176H13.5c-0.619,0-1.125-0.506-1.125-1.125V5.908
	c0-0.168-0.113-0.281-0.281-0.281H7.875c-0.619,0-1.125-0.506-1.125-1.125V4.221c0-0.168,0.063-0.397,0.176-0.51
	c0,0,0.616-0.945,0.616-1.001c0.168-0.281,0.334-0.626,0.334-1.02C7.875,0.733,7.144,0.002,6.188,0.001L6.188,0.001z"/>
</svg></i>
                <span class="media-body">Location</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{URL::to('/country')}}">Country</a></li>
                <li><a href="{{URL::to('/division')}}">Division</a></li>
                {{--<li><a href="{{URL::to('/district')}}">District</a></li>--}}
                {{--<li><a href="{{URL::to('/sub-district')}}">Sub District</a></li>--}}
                {{--already program this comment rounte without search macanisom--}}

            </ul>
        </li>
            <li>
                <a class="pmd-ripple-effect" href="{{URL::to('/member-cart')}}">
                    <i class="media-left media-middle">
                        <svg version="1.1" id="Layer_1" x="0px" y="0px" width="15.3px" height="18px" viewBox="289.99 337.535 15.3 18" enable-background="new 289.99 337.535 15.3 18" xml:space="preserve">
					<g>
                        <g>
                            <path fill="#C9C8C8" d="M297.64,355.535c0.99,0,1.8-0.81,1.8-1.8h-3.6C295.84,354.725,296.65,355.535,297.64,355.535z
								 M303.49,350.135v-4.95c0-2.79-1.891-5.041-4.501-5.67v-0.63c0-0.72-0.63-1.35-1.35-1.35c-0.72,0-1.35,0.63-1.35,1.35v0.63
								c-2.61,0.629-4.5,2.88-4.5,5.67v4.95l-1.8,1.8v0.9h15.3v-0.9L303.49,350.135z"/>
                        </g>
                    </g>
				</svg></i>
                    <span class="media-body">Member Cart</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="{{URL::to('/extra-income')}}">
                    <i class="media-left media-middle">
                        <svg version="1.1" id="Layer_1" x="0px" y="0px" width="15.3px" height="18px" viewBox="289.99 337.535 15.3 18" enable-background="new 289.99 337.535 15.3 18" xml:space="preserve">
					<g>
                        <g>
                            <path fill="#C9C8C8" d="M297.64,355.535c0.99,0,1.8-0.81,1.8-1.8h-3.6C295.84,354.725,296.65,355.535,297.64,355.535z
								 M303.49,350.135v-4.95c0-2.79-1.891-5.041-4.501-5.67v-0.63c0-0.72-0.63-1.35-1.35-1.35c-0.72,0-1.35,0.63-1.35,1.35v0.63
								c-2.61,0.629-4.5,2.88-4.5,5.67v4.95l-1.8,1.8v0.9h15.3v-0.9L303.49,350.135z"/>
                        </g>
                    </g>
				</svg></i>
                    <span class="media-body">Extra Income</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="{{URL::to('/expense')}}">
                    <i class="media-left media-middle">
                        <svg version="1.1" id="Layer_1" x="0px" y="0px" width="15.3px" height="18px" viewBox="289.99 337.535 15.3 18" enable-background="new 289.99 337.535 15.3 18" xml:space="preserve">
					<g>
                        <g>
                            <path fill="#C9C8C8" d="M297.64,355.535c0.99,0,1.8-0.81,1.8-1.8h-3.6C295.84,354.725,296.65,355.535,297.64,355.535z
								 M303.49,350.135v-4.95c0-2.79-1.891-5.041-4.501-5.67v-0.63c0-0.72-0.63-1.35-1.35-1.35c-0.72,0-1.35,0.63-1.35,1.35v0.63
								c-2.61,0.629-4.5,2.88-4.5,5.67v4.95l-1.8,1.8v0.9h15.3v-0.9L303.49,350.135z"/>
                        </g>
                    </g>
				</svg></i>
                    <span class="media-body">Expenses</span>
                </a>
            </li>

        @endif



    </ul>
</aside>
