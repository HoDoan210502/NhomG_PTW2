@extends('home')
@section('homecontent')
@foreach($detail as $key => $pro)
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Product main img -->
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					<div class="product-preview">
						<img src="{{URL::to('/public/uploads/product/'.$pro->product_image)}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{URL::to('/public/uploads/product/'.$pro->product_image)}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{URL::to('/public/uploads/product/'.$pro->product_image)}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{URL::to('/public/uploads/product/'.$pro->product_image)}}" alt="">
					</div>
				</div>
			</div>
			<!-- /Product main img -->

			<!-- Product thumb imgs -->
			<div class="col-md-2  col-md-pull-5">
				<div id="product-imgs">
					<div class="product-preview">
						<img src="{{URL::to('/public/uploads/product/'.$pro->product_image)}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{URL::to('/public/uploads/product/'.$pro->product_image)}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{URL::to('/public/uploads/product/'.$pro->product_image)}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{URL::to('/public/uploads/product/'.$pro->product_image)}}" alt="">
					</div>
				</div>
			</div>
			<!-- /Product thumb imgs -->

			<!-- Product details -->
			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name">{{$pro->product_name}}</h2>
					<div>
						<div class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<a class="review-link" href="#">10 Review(s) | Add your review</a>
					</div>
					<div>
						<h3 class="product-price">{{$pro->product_price}} VND</h3>
						<span class="product-available">In Stock</span>
					</div>
					<div>
						Brand: <span class="product-price">{{$pro->manu_name}}</span>
					</div>

					<form action="{{URL::to('/to-cart')}}" method="POST">
						{{ csrf_field() }}
						<div class="add-to-cart">
							<div class="qty-label">
								Qty
								<div class="input-number">
									<input type="number" value="1" min="1" name="qty">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
									<input type="hidden" value="{{$pro->product_id}}" name="product_id_hidden">
								</div>
							</div>
							<button type="submit "class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>
					</form>

				</div>
			</div>
			<!-- /Product details -->

			<!-- Product tab -->
			<div class="col-md-12">
				<div id="product-tab">
					<!-- product tab nav -->
					<ul class="tab-nav">
						<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
						<li><a data-toggle="tab" href="#tab2">Details</a></li>
					</ul>
					<!-- /product tab nav -->

					<!-- product tab content -->
					<div class="tab-content">
						<!-- tab1  -->
						<div id="tab1" class="tab-pane fade in active">
							<div class="row">
								<div class="col-md-12">
									<p>{{$pro->product_desc}}</p>
								</div>
							</div>
						</div>
						<!-- /tab1  -->

						<!-- tab2  -->
						<div id="tab2" class="tab-pane fade in">
							<div class="row">
								<div class="col-md-12">
									<p>
									<p>{{$pro->product_desc}}</p>
									</p>
								</div>
							</div>
						</div>
						<!-- /tab2  -->

						<!-- tab3  -->

						<!-- /tab3  -->
					</div>
					<!-- /product tab content  -->
				</div>
			</div>
			<!-- /product tab -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endforeach
@endsection