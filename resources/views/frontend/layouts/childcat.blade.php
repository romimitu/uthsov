<ul class="list-unstyled">
@foreach($childs as $child)
	<li>
	    <a class="tree-action" href="{{ url('category-product', [$child->id, make_slug($child->name)] )}}">{{ $child->name }} </a>
		@if(count($child->childs))
            @include('frontend.layouts.childcat',['childs' => $child->childs])
        @endif
	</li>
@endforeach
</ul>