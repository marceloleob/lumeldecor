
{{-- TOPO --}}
<div class="top-header middle-header dark_skin">
	<div class="container">
		<div class="nav_block">
			<a class="navbar-brand" href="{!! route('home') !!}">
				<img class="logo_light" src="{!! asset('images/logo_light.png') !!}" alt="logo" />
				<img class="logo_dark" src="{!! asset('images/logo_dark.png') !!}" alt="logo" />
			</a>
			<div class="contact_phone order-md-last">
				<i class="linearicons-phone-wave"></i>
				<span>31 99514-0615</span>
			</div>
			<div class="product_search_form radius_input">
				<form>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="custom_select">
								<select class="first_null">
									<option value="">Categorias</option>
									<option value="Dresses">Dresses</option>
									<option value="Shirt-Tops">Shirt & Tops</option>
									<option value="T-Shirt">T-Shirt</option>
									<option value="Pents">Pents</option>
									<option value="Jeans">Jeans</option>
								</select>
							</div>
						</div>
						<input class="form-control" placeholder="Procure.." required=""  type="text">
						<button type="submit" class="search_btn"><i class="linearicons-magnifier"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
{{-- TOPO FIM --}}
