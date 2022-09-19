<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="{{ url('/' . $page='home') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}"   class="main-logo" width="500" height="200" alt="logo"></a>
				
			</div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
						<h4 class="font-weight-semibold mt-3 mb-0">{{Auth::user()->name}}</h4>
							<span class="mb-0 text-muted">{{Auth::user()->email}}</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">
					<li class="side-item side-item-category">Main</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/' . $page='home') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">Index</span><span class="badge badge-success side-badge">1</span></a>
					</li>
					@can('Invoices')
					<li class="side-item side-item-category">Invoices</li>
					
					<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3.31 11l2.2 8.01L18.5 19l2.2-8H3.31zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" opacity=".3"/><path d="M22 9h-4.79l-4.38-6.56c-.19-.28-.51-.42-.83-.42s-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1zM12 4.8L14.8 9H9.2L12 4.8zM18.5 19l-12.99.01L3.31 11H20.7l-2.2 8zM12 13c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg><span class="side-menu__label">Invoices</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
						@can('Invoice List')
							<li><a class="slide-item" href="{{ url('/' . $page='invoices') }}">Invoice List</a></li>
							@endcan
							@can('Invoice_Paid')
							<li><a class="slide-item" href="{{ url('/' . $page='Invoice_Paid') }}">Invoice_Paid</a></li>
							@endcan
							@can('Invoice_UnPaid')
							<li><a class="slide-item" href="{{ url('/' . $page='Invoice_UnPaid') }}">Invoice_UnPaid</a></li>
							@endcan
							@can('Invoice_Partial')
							<li><a class="slide-item" href="{{ url('/' . $page='Invoice_Partial') }}"> Invoice_Partial</a></li>
							@endcan
							@can('invoice archive')
							<li><a class="slide-item" href="{{ url('/' . $page='Archive') }}">Archive</a></li>
							@endcan
						</ul>
					</li>
				
					@endcan
					

				 @can('Quotation')

					<li class="side-item side-item-category">Quotation</li>
					@can('Quotation List')
					 <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg><span class="side-menu__label">Quotation</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ url('/' . $page='Quotation') }}">Quotation List</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='ArchiveQ') }}"> Archive</a></li>
							
							
						</ul>
					 </li>
					@endcan
				 @endcan
				 @can('Petty Cash')
					<li class="side-item side-item-category">Petty Cash</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z"/></svg><span class="side-menu__label">Petty Cash</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
						@can('Petty Cash list')
							<li><a class="slide-item" href="{{ url('/' . $page='PettyCash') }}"> Petty Cash list</a></li>
							@endcan
							@can('Petty Cash Archive')
							<li><a class="slide-item" href="{{ url('/' . $page='ArchiveP') }}"> Archive </a></li>
							@endcan
						</ul>
					</li>
				 @endcan
				 @can('Reports')
				    <li class="side-item side-item-category">Reports</li>
					<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/><path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/></svg><span class="side-menu__label">Reports</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
						@can('Invoice Reports')
							<li><a class="slide-item" href="{{ url('/' . $page='invoices_report') }}"> Invoice Reports</a></li>
							@endcan
							@can('Quotation Reports')
							<li><a class="slide-item" href="{{ url('/' . $page='qoutition_Report') }}">Quotation Reports</a></li>
							@endcan
							@can('Employees Reports')
							<li><a class="slide-item" href="{{ url('/' . $page='employee_Report') }}">Employees Reports</a></li>
							@endcan
							@can('pettycach Reports')
							<li><a class="slide-item" href="{{ url('/' . $page='pettycach_Report') }}">pettycach Reports</a></li>
							@endcan
							
						</ul>
					</li>
					
					
					</li>
					@endcan
					@can('Employees')
					<li class="side-item side-item-category">Employees</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
							<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"\\ viewBox="0 0 24 24" >
								<path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/>
								<path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/>
							</svg>
							
							<span class="side-menu__label">
									Employees</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
						@can('Employees list')
							<li><a class="slide-item" href="{{ url('/' . $page='employee') }}">Employees list</a></li>
							@endcan
							@can('Employees Attendance')
							<li><a class="slide-item" href="{{ url('/' . $page='Attendance') }}">Employees Attendance</a></li>
							@endcan
							@can('Employees Overtime')
							<li><a class="slide-item" href="{{ url('/' . $page='Overtime') }}">Employees Overtime</a></li>
							@endcan
							@can('Employees Payroll')
							<li><a class="slide-item" href="{{ url('/' . $page='Payroll') }}">Employees Payroll</a></li>
							@endcan
							
							
						</ul>
					</li>
				  @endcan
					@can('Customers')
					<li class="side-item side-item-category">Customers</li>
					<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0z" fill="none"/><path d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8c.28 0 .5-.22.5-.5 0-.16-.08-.28-.14-.35-.41-.46-.63-1.05-.63-1.65 0-1.38 1.12-2.5 2.5-2.5H16c2.21 0 4-1.79 4-4 0-3.86-3.59-7-8-7zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 10 6.5 10s1.5.67 1.5 1.5S7.33 13 6.5 13zm3-4C8.67 9 8 8.33 8 7.5S8.67 6 9.5 6s1.5.67 1.5 1.5S10.33 9 9.5 9zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 6 14.5 6s1.5.67 1.5 1.5S15.33 9 14.5 9zm4.5 2.5c0 .83-.67 1.5-1.5 1.5s-1.5-.67-1.5-1.5.67-1.5 1.5-1.5 1.5.67 1.5 1.5z" opacity=".3"/><path d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10c1.38 0 2.5-1.12 2.5-2.5 0-.61-.23-1.21-.64-1.67-.08-.09-.13-.21-.13-.33 0-.28.22-.5.5-.5H16c3.31 0 6-2.69 6-6 0-4.96-4.49-9-10-9zm4 13h-1.77c-1.38 0-2.5 1.12-2.5 2.5 0 .61.22 1.19.63 1.65.06.07.14.19.14.35 0 .28-.22.5-.5.5-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.14 8 7c0 2.21-1.79 4-4 4z"/><circle cx="6.5" cy="11.5" r="1.5"/><circle cx="9.5" cy="7.5" r="1.5"/><circle cx="14.5" cy="7.5" r="1.5"/><circle cx="17.5" cy="11.5" r="1.5"/></svg><span class="side-menu__label">Customers</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
						@can('Customers list')
							<li><a class="slide-item" href="{{ url('/' . $page='customer') }}">Customers list</a></li>

					    @endcan		
							
						</ul>
					 </li>
					@endcan

				@can('users')
                 <li class="side-item side-item-category">users</li>
                 <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                            <path
                                d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                        </svg><span class="side-menu__label">Users</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
					        @can('Users list')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'users')) }}">Users list </a></li>
							@endcan
							@can('Permission Users')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'roles')) }}">Permission Users</a></li>
							@endcan
                    </ul>
                 </li>
            
				@endcan
					
					
				 @can('products')
					<li class="side-item side-item-category">products</li>
					<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3.31 11l2.2 8.01L18.5 19l2.2-8H3.31zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" opacity=".3"/><path d="M22 9h-4.79l-4.38-6.56c-.19-.28-.51-.42-.83-.42s-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1zM12 4.8L14.8 9H9.2L12 4.8zM18.5 19l-12.99.01L3.31 11H20.7l-2.2 8zM12 13c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg><span class="side-menu__label">products</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
						@can('Category list')
							<li><a class="slide-item" href="{{ url('/' . $page='sections') }}">Category list </a></li>
						@endcan
						@can('products list')
							<li><a class="slide-item" href="{{ url('/' . $page='products') }}">products list </a></li>
						@endcan
							
						</ul>
					</li>
					@endcan
			     </ul>
				
					
			
			</div>
		</aside>
<!-- main-sidebar -->
