
	<div class="app-header__logo">
		<div class="logo-src"></div>
		<div class="header__pane ml-auto">
			<div>
				<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
	</div>
	<div class="app-header__mobile-menu">
		<div>
			<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
		</div>
	</div>
	<div class="app-header__menu">
		<span>
			<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
				<span class="btn-icon-wrapper">
					<i class="fa fa-ellipsis-v fa-w-6"></i>
				</span>
			</button>
		</span>
	</div>
	<div class="app-header__content">
		<div class="app-header-left">
			<ul class="header-menu body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
				<li class="nav-item">
					<a href="javascript:void(0);" class="nav-link show"><span><i class="nav-link-icon fa fa-database"> </i> Estatísticas</span></a>
				</li>
				<li class="nav-item">
					<a href="javascript:void(0);" class="nav-link show"><span><i class="nav-link-icon fa fa-cog"></i> Configurações</span></a>
				</li>
			</ul>
		</div>

		<div class="app-header-right">
			<div class="header-btn-lg pr-0">
				<div class="widget-content p-0">
					<div class="widget-content-wrapper">
						<div class="widget-content-left ml-3 mr-3 header-user-info">
							<div class="widget-heading">
								{!! Auth::user()->name !!}
							</div>
							<div class="widget-subheading">
								Administrador
							</div>
						</div>
						<div class="widget-content-right header-user-info ml-3">
							<button type="button" class="btn-shadow p-1 btn btn-danger btn-sm">
								<i class="fas fa-sign-out-alt text-white pr-2 pl-2"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
