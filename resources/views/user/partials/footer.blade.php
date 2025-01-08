<!-- Start Messenger Chat plugin Code -->

<!-- FACEBOOK CHAT WIDGET-->
<!-- See: https://www.labnol.org/software/facebook-messenger-chat-widget/9583/ -->
<style>.fb-livechat,.fb-widget{display:none}.ctrlq.fb-button,.ctrlq.fb-close{
    position:fixed;bottom: 75px !important;left:24px;cursor:pointer
}
.ctrlq.fb-button{z-index:1;background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;width:60px;height:60px;text-align:center;bottom:24px;border:0;outline:0;border-radius:60px;-webkit-border-radius:60px;-moz-border-radius:60px;-ms-border-radius:60px;-o-border-radius:60px;box-shadow:0 1px 6px rgba(0,0,0,.06),0 2px 32px rgba(0,0,0,.16);-webkit-transition:box-shadow .2s ease;background-size:80%;transition:all .2s ease-in-out}.ctrlq.fb-button:focus,.ctrlq.fb-button:hover{transform:scale(1.1);box-shadow:0 2px 8px rgba(0,0,0,.09),0 4px 40px rgba(0,0,0,.24)}.fb-widget{background:#fff;z-index:2;position:fixed;width:360px;height:435px;overflow:hidden;opacity:0;bottom:50px;left:24px;border-radius:6px;-o-border-radius:6px;-webkit-border-radius:6px;box-shadow:0 5px 40px rgba(0,0,0,.16);-webkit-box-shadow:0 5px 40px rgba(0,0,0,.16);-moz-box-shadow:0 5px 40px rgba(0,0,0,.16);-o-box-shadow:0 5px 40px rgba(0,0,0,.16)}.fb-credit{text-align:center;margin-top:8px}.fb-credit a{transition:none;color:#bec2c9;font-family:Helvetica,Arial,sans-serif;font-size:12px;text-decoration:none;border:0;font-weight:400}.ctrlq.fb-overlay{z-index:0;position:fixed;height:100vh;width:100vw;-webkit-transition:opacity .4s,visibility .4s;transition:opacity .4s,visibility .4s;top:0;left:0;background:rgba(0,0,0,.05);display:none}.ctrlq.fb-close{z-index:4;padding:0 6px;background:#365899;font-weight:700;font-size:11px;color:#fff;margin:8px;border-radius:3px}.ctrlq.fb-close::after{content:'x';font-family:sans-serif}</style>

<div class="fb-livechat">
  <a href="https://m.me/" target="_blank" title="Send us a message on Facebook" class="ctrlq fb-button"></a> 
</div>
	
<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$(document).ready(function(){var t={delay:125,overlay:$(".fb-overlay"),widget:$(".fb-widget"),button:$(".fb-button")};setTimeout(function(){
    $("div.fb-livechat").fadeIn()},8*t.delay),
    $(".ctrlqStop").on("click",function(e){
        e.preventDefault(),t.overlay.is(":visible")?(t.overlay.fadeOut(t.delay),t.widget.stop().animate({bottom:0,opacity:0},2*t.delay,function(){
            $(this).hide("slow"),t.button.show()})):t.button.fadeOut("medium",function(){t.widget.stop().show().animate({bottom:"50px",opacity:1},2*t.delay),t.overlay.fadeIn(t.delay)})}
            )});
</script>





<!-- Gitter Chat Link -->
<!-- <div class="fixed-action-btn"><a class="btn-floating btn-large red" href="https://gitter.im/Dogfalo/materialize" target="_blank"><i class="large material-icons">chat</i></a></div> -->

<!-- Visual Breakpoint Helper for Materialize - http://materializecss.com/ -->

<!-- End Messenger Chat plugin Code -->


<footer class="footer__section bg__logo">
    <div class="container-fluid">
        
        <div class="main__footer d-flex justify-content-between" style="padding-bottom: 5px !important;">
            {{-- Support --}}
            <div class="footer__widget footer__widget--width active">
                <h2 class="footer__widget--title text-ofwhite h3">{{ __('messages.Support') }}
                    <button class="footer__widget--button" aria-label="footer widget button">
                        <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                            <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                        </svg>
                    </button>
                </h2>
                
                <div class="footer__widget--inner" style="box-sizing: border-box; display: block;">
                    <div class="flex flex-col gap-4" style="align-items:flex-start;">
                        @for ($n=1; $n<=2; $n++)
                            <div class="duration-300 px-6 py-3 rounded-full border-white border-primary-hover flex items-center gap-4 capsul" style="">
                                <span class="" style="margin-left:30px;">
                                    @if ($n==1)
                                   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                    width="30" zoomAndPan="magnify" viewBox="0 0 30 30.000001" 
                                   height="30" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="f16614ee74"><path d="M 0.484375 3.265625 L 29.515625 3.265625 L 29.515625 14 L 0.484375 14 Z M 0.484375 3.265625 " clip-rule="nonzero"/></clipPath><clipPath id="3024ae948d"><path d="M 2 9 L 28 9 L 28 26.492188 L 2 26.492188 Z M 2 9 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#f16614ee74)"><path fill="#ffffff" d="M 12.335938 4.683594 C 12.339844 4.683594 12.347656 4.683594 12.351562 4.683594 L 17.660156 4.683594 C 17.667969 4.683594 17.667969 4.683594 17.675781 4.683594 C 20.265625 4.625 22.8125 4.847656 24.699219 5.707031 C 26.582031 6.5625 27.84375 7.949219 28.136719 10.570312 L 28.136719 11.683594 C 28.136719 11.804688 28.121094 11.820312 28.046875 11.894531 C 27.972656 11.964844 27.808594 12.058594 27.570312 12.125 C 27.089844 12.261719 26.367188 12.28125 25.777344 12.234375 C 25.757812 12.234375 25.742188 12.234375 25.722656 12.234375 C 24.328125 12.234375 23.851562 12.023438 23.613281 11.792969 C 23.375 11.566406 23.226562 11.082031 22.851562 10.328125 L 22.117188 8.867188 C 21.753906 8.136719 21.238281 7.625 20.660156 7.328125 C 20.082031 7.035156 19.46875 6.953125 18.886719 6.953125 L 11.125 6.953125 C 10.542969 6.953125 9.929688 7.035156 9.351562 7.328125 C 8.773438 7.625 8.261719 8.136719 7.894531 8.867188 L 7.160156 10.328125 C 6.78125 11.082031 6.636719 11.566406 6.398438 11.792969 C 6.160156 12.019531 5.683594 12.234375 4.289062 12.234375 C 4.273438 12.234375 4.253906 12.234375 4.234375 12.234375 C 3.644531 12.28125 2.921875 12.261719 2.445312 12.125 C 2.207031 12.058594 2.039062 11.964844 1.964844 11.894531 C 1.890625 11.820312 1.875 11.804688 1.875 11.679688 L 1.875 10.570312 C 2.167969 7.945312 3.429688 6.558594 5.3125 5.703125 C 7.199219 4.847656 9.746094 4.625 12.335938 4.683594 Z M 12.351562 3.316406 C 9.671875 3.253906 6.957031 3.453125 4.742188 4.457031 C 2.519531 5.46875 0.839844 7.390625 0.5 10.429688 C 0.5 10.453125 0.496094 10.480469 0.496094 10.503906 L 0.496094 11.683594 C 0.496094 12.152344 0.710938 12.601562 1.015625 12.890625 C 1.320312 13.179688 1.691406 13.335938 2.066406 13.441406 C 2.808594 13.652344 3.621094 13.652344 4.308594 13.601562 C 5.832031 13.597656 6.757812 13.355469 7.355469 12.785156 C 7.953125 12.210938 8.089844 11.554688 8.394531 10.945312 L 9.128906 9.476562 C 9.386719 8.960938 9.664062 8.707031 9.980469 8.546875 C 10.292969 8.386719 10.675781 8.324219 11.125 8.324219 L 18.886719 8.324219 C 19.339844 8.324219 19.71875 8.386719 20.035156 8.546875 C 20.347656 8.707031 20.625 8.960938 20.886719 9.476562 L 21.621094 10.945312 C 21.925781 11.554688 22.058594 12.210938 22.660156 12.785156 C 23.253906 13.355469 24.179688 13.597656 25.703125 13.601562 C 26.390625 13.652344 27.203125 13.652344 27.945312 13.441406 C 28.320312 13.335938 28.691406 13.179688 28.996094 12.890625 C 29.304688 12.601562 29.515625 12.152344 29.515625 11.683594 L 29.515625 10.503906 C 29.515625 10.480469 29.515625 10.453125 29.511719 10.429688 C 29.171875 7.390625 27.492188 5.46875 25.273438 4.457031 C 23.054688 3.453125 20.339844 3.253906 17.660156 3.316406 Z M 12.351562 3.316406 " fill-opacity="1" fill-rule="nonzero"/></g><g clip-path="url(#3024ae948d)"><path fill="#ffffff" d="M 2.871094 23.296875 C 2.863281 23.324219 2.863281 23.355469 2.859375 23.386719 Z M 11.195312 11.300781 L 12.621094 11.300781 C 13.144531 12.140625 13.988281 12.75 15.003906 12.75 C 16.027344 12.746094 16.863281 12.140625 17.390625 11.300781 L 18.820312 11.300781 C 19.066406 12.890625 19.734375 14.253906 21.292969 15.359375 C 22.023438 15.878906 22.75 16.351562 23.332031 16.824219 C 23.929688 17.304688 24.347656 17.75 24.496094 18.296875 C 24.5 18.308594 24.5 18.320312 24.503906 18.332031 L 25.78125 23.496094 C 25.78125 23.503906 25.785156 23.515625 25.785156 23.523438 C 25.84375 23.84375 25.695312 24.175781 25.472656 24.382812 C 25.222656 24.613281 24.90625 24.746094 24.554688 24.746094 L 5.460938 24.746094 C 5.105469 24.746094 4.789062 24.617188 4.542969 24.382812 C 4.320312 24.175781 4.167969 23.84375 4.230469 23.523438 L 5.511719 18.332031 C 5.511719 18.320312 5.515625 18.308594 5.515625 18.296875 C 5.664062 17.75 6.085938 17.304688 6.679688 16.824219 C 7.261719 16.351562 7.992188 15.882812 8.722656 15.359375 C 10.28125 14.253906 10.949219 12.890625 11.195312 11.300781 Z M 27.140625 23.277344 L 27.148438 23.386719 C 27.152344 23.351562 27.148438 23.3125 27.140625 23.277344 Z M 11.195312 9.929688 C 10.519531 9.929688 9.933594 10.429688 9.832031 11.09375 C 9.621094 12.46875 9.226562 13.316406 7.921875 14.242188 C 7.226562 14.738281 6.476562 15.21875 5.804688 15.761719 C 5.144531 16.296875 4.449219 16.957031 4.1875 17.941406 C 4.183594 17.941406 4.183594 17.945312 4.183594 17.945312 C 4.179688 17.960938 4.175781 17.984375 4.167969 18.003906 L 2.878906 23.230469 C 2.875 23.242188 2.875 23.261719 2.871094 23.277344 C 2.71875 24.125 3.074219 24.894531 3.597656 25.378906 C 4.089844 25.84375 4.753906 26.117188 5.460938 26.117188 L 24.550781 26.117188 C 25.257812 26.117188 25.921875 25.84375 26.414062 25.378906 C 26.9375 24.894531 27.296875 24.125 27.140625 23.277344 C 27.136719 23.261719 27.136719 23.242188 27.132812 23.230469 L 25.84375 18.003906 C 25.839844 17.984375 25.832031 17.960938 25.828125 17.945312 C 25.828125 17.945312 25.828125 17.941406 25.824219 17.941406 C 25.5625 16.957031 24.867188 16.296875 24.203125 15.761719 C 23.535156 15.21875 22.789062 14.738281 22.089844 14.242188 C 20.789062 13.316406 20.394531 12.46875 20.179688 11.09375 C 20.078125 10.429688 19.492188 9.929688 18.820312 9.929688 L 17.089844 9.929688 C 16.800781 9.929688 16.542969 10.109375 16.441406 10.378906 C 16.21875 10.980469 15.648438 11.378906 15.003906 11.378906 C 14.359375 11.378906 13.789062 10.984375 13.566406 10.378906 C 13.464844 10.109375 13.207031 9.929688 12.917969 9.929688 Z M 11.195312 9.929688 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#ffffff" d="M 15.003906 15.578125 C 16.648438 15.578125 17.964844 16.890625 17.964844 18.523438 C 17.964844 20.15625 16.648438 21.464844 15.003906 21.464844 C 13.363281 21.464844 12.050781 20.15625 12.050781 18.523438 C 12.050781 16.890625 13.363281 15.578125 15.003906 15.578125 Z M 15.003906 14.210938 C 12.621094 14.210938 10.671875 16.148438 10.671875 18.523438 C 10.671875 20.894531 12.621094 22.835938 15.003906 22.835938 C 17.394531 22.835938 19.34375 20.894531 19.34375 18.523438 C 19.34375 16.148438 17.394531 14.210938 15.003906 14.210938 Z M 15.003906 14.210938 " fill-opacity="1" fill-rule="nonzero"/></svg>
                                    @elseif($n==2)
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                     width="30" 
                                    height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin text-white text-2xl">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    @endif
                                </span>
                                    
                                <span class="bg-white h-full" style="width:1px;"></span>
                                <div class="flex flex-col w-full">
                                    @if ($n==1)
                                    <a class="text-2xl tracking-wider text-white border-primary-hover" href="tel:{{optional($business)->phone}}">
                                        {{ optional($business)->phone ? bnConv('bnNum',optional($business)->phone) : '' }}</a>
                                    @elseif($n==2)
                                    <a class="text-2xl tracking-wider text-white border-primary-hover" href="{{optional($business)->google_map_link}}" target="_blank">{{ __('messages.Find Our Store') }}</a>
                                    @endif
                                </div>
                                   
                                    
                            </div>
                        @endfor
                        </div>
                    <div class="footer__social" style="margin-left:15px; margin-top:20px;">
                        <ul class="social__shear d-flex">
                            @if (optional($business)->facebook)
                            <li class="social__shear--list">
                                <a class="social__shear--list__icon" target="_blank" href="{{optional($business)->facebook}}">
                                    <img src="{{ asset('frontend/assets/img/icon/Facebook.png') }}" alt="">
                                    <span class="visually-hidden">Facebook</span>
                                </a>
                            </li>
                            @endif
                            @if (optional($business)->instagram)
                            <li class="social__shear--list">
                                <a class="social__shear--list__icon" target="_blank" href="{{optional($business)->instagram}}">
                                    <img src="{{ asset('frontend/assets/img/icon/Instagram.png') }}" alt="">
                                    <span class="visually-hidden">Instagram</span>
                                </a>
                            </li>
                            @endif
                            @if (optional($business)->youtube)
                            <li class="social__shear--list">
                                <a class="social__shear--list__icon" target="_blank" href="{{optional($business)->youtube}}">
                                    <img src="{{ asset('frontend/assets/img/icon/Youtube.png') }}" alt="">
                                    <span class="visually-hidden">Youtube</span>
                                </a>
                            </li>
                            @endif
                            @if (optional($business)->twitter)
                            <li class="social__shear--list">
                                <a class="social__shear--list__icon" target="_blank" href="{{optional($business)->twitter}}">
                                    <img src="{{ asset('frontend/assets/img/icon/Twitter.png') }}" alt="">
                                    <span class="visually-hidden">Twitter</span>
                                </a>
                            </li>
                            @endif
                            @if (optional($business)->linkedin)
                            <li class="social__shear--list">
                                <a class="social__shear--list__icon" target="_blank" href="{{optional($business)->linkedin}}">
                                    <img height="50" width="50" src="{{ asset('frontend/assets/img/icon/Linkedin.png') }}" alt="">
                                    <span class="visually-hidden">linkedin</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            {{-- About Us --}}
            <div class="footer__widget--menu__wrapper d-flex footer__widget--width">
                <div class="footer__widget">
                    <h2 class="footer__widget--title text-ofwhite h3">{{ __('messages.About Us') }} 
                        <button class="footer__widget--button" aria-label="footer widget button">
                            <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                            </svg>
                        </button>
                    </h2>
                    <ul class="footer__widget--menu footer__widget--inner">
                        <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('about')}}">{{ __('messages.About Us') }}</a></li>
                        <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('login')}}">{{ __('messages.Login') }} </a></li>
                        <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('register')}}"> {{ __('messages.Register') }} </a></li>
                        <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('carts')}}"> {{ __('messages.Shopping Cart') }}</a></li>
                        <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('checkout')}}"> {{ __('messages.Checkout') }}</a></li>
                        @php    
                            $blogs = App\Models\Blog::count(); 
                        @endphp
                        @if($blogs)
                            <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('user.blog')}}">{{ __('messages.Latest News') }} </a></li>
                        @endif
                        <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ route('order.track') }}">{{ __('messages.Track order') }} </a></li>
                    </ul>
                </div>
                

            </div>
            {{-- Help --}}
            <div class="footer__widget--menu__wrapper d-flex footer__widget--width">
                <div class="footer__widget">
                    <h2 class="footer__widget--title text-ofwhite h3">{{ __('messages.Help') }}
                        <button class="footer__widget--button" aria-label="footer widget button">
                            <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                            </svg>
                        </button>
                    </h2>
                    <ul class="footer__widget--menu footer__widget--inner">
                        {{-- Wholesale --}}
                        <li class="footer__widget--menu__list d-none">
                            <a class="footer__widget--menu__text" href="{{route('wholesale.products')}}" style="color:;">
                                <b>{{ __('messages.Wholesale') }}</b>
                            </a>
                        </li>
                        <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('contact')}}">{{ __('messages.Contact Us') }}</a></li>
                        @foreach($pages as $page)
                        <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('other.page', ['id'=>$page->id, 'title'=>Str::slug($page->name)] )}}">
                            {{ __translate($page->name, $page->bn_name) }}
                        </a></li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
            <div class="footer__widget--menu__wrapper d-flex footer__widget--width">
                <div class="footer__widget">
                    <h2 class="footer__widget--title text-ofwhite h3">{{ __('messages.Stay Connected') }}
                        <button class="footer__widget--button" aria-label="footer widget button">
                            <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                            </svg>
                        </button>
                    </h2>
                    <ul class="footer__widget--menu footer__widget--inner">
                        <li class="footer__widget--menu__list">
                            <span class="footer-address-text">{{ __('messages.Address') }}: </span><a class="footer-address-text" href="{{optional($business)->google_map_link}}" target="_blank">
                                {{ __translate($business->address, $business->bn_address) }}
                            </a></li>                        
                        <li class="footer__widget--menu__list">
                            <br>
                            <span class="footer-address-text">{{ __('messages.E-mail') }}: </span> <a class="footer-address-text" href="mailto:{{optional($business)->email}}" style="color: ;">{{optional($business)->email}}</a></li>                        
                    </ul>
                </div>
            </div>
            
        </div>
        {{-- Bottom Footer --}}
        <div class="footer__bottom d-flex justify-content-between align-items-end row">
            <div class="col-md-4">
                <p class="copyright__content text-ofwhite m-0">
                    <a class="copyright__content--link text-white" style="text-decoration:none;"> &copy; 2024. {{env('APP_NAME')}}. All rights reserved.

                </a></p> 
            </div>
            <div class="col-md-8 text-center">
                <img class="display-block text-end" src="{{asset('images/payment-gateway.png')}}" alt="visa-card">
            </div>
        </div>
    </div>
</footer>
<!-- End footer section -->

{{-- WhatsApp Start --}}
@if (optional($business)->phone)
<div class="wh-api">
	<div class="wh-fixed whatsapp-pulse">
		<a href="https://api.whatsapp.com/send?phone={{optional($business)->phone}}&text=hello world">
			<button class="wh-ap-btn"></button>
		</a>
	</div>
</div>
@endif
{{-- WhatsApp End --}}
