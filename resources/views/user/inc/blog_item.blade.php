@if(!empty($blog))
<div class="swiper-slide">
    <div class="blog__items">
        <div class="blog__thumbnail">
            <a class="blog__thumbnail--link" href="{{ route('user.blog.details', [$blog->id, Str::slug($blog->title)]) }}"><img class="blog__thumbnail--img" src="{{asset('images/blog/'.optional($blog)->image)}}" alt="{{optional($blog)->title}}"></a>
        </div>
        <div class="blog__content">
            <span class="blog__content--meta">
                {{date("M d, Y", strtotime(optional($blog)->created_at))}}
            </span>
            <h3 class="blog__content--title"><a href="{{ route('user.blog.details', [$blog->id, Str::slug($blog->title)]) }}">{{optional($blog)->title}}</a></h3>
            <a class="blog__content--btn primary__btn" 
            href="{{ route('user.blog.details', [$blog->id, Str::slug($blog->title)]) }}">
                Read more 
            </a>
        </div>
    </div>
</div>
@endif