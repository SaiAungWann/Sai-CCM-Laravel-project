<x-layout>

	@foreach ($categories as $category)
	<div class="col-md-4 col-xs-6">
		<div class="shop">
			<div class="shop-img">
				<img src="{{asset($category->image)}}" alt="">
			</div>

			<div class="shop-body">
				<h3>{{$category->name}}<br> Collection </h3>
				<a href="/categories/{{$category->name}}/show" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
	@endforeach

</x-layout>