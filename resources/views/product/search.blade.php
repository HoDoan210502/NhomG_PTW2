@extends('home')
@section('homecontent')
<div class="section">
	<!-- container -->
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container" id="catehere">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside Widget -->
					<div class="aside">
						<br>
						<h3 class="aside-title">Categories</h3>
						@foreach($category as $key => $pro)
						<div>
							<p></p>
							<a href="{{URL::to('/category-list/'.$pro->category_id)}}">
								<i class="fa fa-check" aria-hidden="true"></i>{{$pro->category_name}}
							</a>
						</div>
						@endforeach
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Brand</h3>
						<div class="checkbox-filter">
							@foreach($manu as $key => $pro2)
							<div>

								<p></p>
								<a href="{{URL::to('/manu-list/'.$pro2->manu_id)}}"><i class="fa fa-check" aria-hidden="true"></i>
									{{$pro2->manu_name}}
								</a>
							</div>
							@endforeach
						</div>
					</div>
					<!-- /aside Widget -->


				</div>
				<!-- /ASIDE -->

				<!-- STORE -->
				<div id="store" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="store-sort">
							<label>
								Sort By:
								<select class="input-select">
									<option value="0">Low to high price</option>
									<option value="1">High to low price</option>
								</select>
							</label>
						</div>
					</div>
					<!-- /store top filter -->

					<div class="row">
						@foreach($search as $key => $pro3)
						<!-- product -->
						<div class="col-md-4 col-xs-6">
							<div class="product">
								<div class="product-img">
									<img src="{{URL::to('public/uploads/product/'.$pro3->product_image)}}" alt="">
									<div class="product-label">
										<span class="sale">-30%</span>
										<span class="new">NEW</span>
									</div>
								</div>
								<div class="product-body">
									<h3 class="product-name"><a href="#">{{$pro3->product_name}}</a></h3>
									<h4 class="product-price">{{$pro3->product_price}} VND</h4>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<div class="product-btns">
										<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
										<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
										<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
									</div>
								</div>
								<div class="add-to-cart">
									<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="#"> add to cart</a></button>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /product -->
						<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>


						<!-- /product -->
					</div>
					<!-- /store products -->

					<!-- store bottom filter -->
					{{ $search->links('pagination::bootstrap-4', ['prev_text' => '', 'next_text' => '']) }}
					<!-- /store bottom filter -->

				</div>
				<!-- /STORE -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
	<!-- /container -->
</div>
@endsection