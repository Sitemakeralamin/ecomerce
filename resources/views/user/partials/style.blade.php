<style>
    .team__items {
        width: 100% !important;
    }

    .cat-box {
        border: 1px solid rgb(234, 230, 230);
        border-radius: 14px !important;
    }

    .home1__slider--bg {
        height: 200px;
        background-repeat: no-repeat !important;
        background-attachment: scroll !important;
        background-position: center center !important;
        background-size: cover !important;
    }

    .hover-zoom:hover {
        -ms-transform: scale(.5);
        -webkit-transform: scale(.5);
        transition: transform 1.2s;
        transform: scale(1.1);
    }

    /* Custom Code var(--logo-color) */
   
    .cat-zoom {
        transition: transform 1.2s, border-color 1.2s, box-shadow 1.2s;
    }


    .cat-zoom:hover {
        -ms-transform: scale(.5);
        -webkit-transform: scale(.5);
        transition: transform 1.2s;
        transform: scale(1.1);
    }
    .cat-zoom:hover .cat-title {
        color: var(--secondary-color);
        transition: transform 1.2s;
        transform: scale(1.1);
    }
    .cat-zoom:hover img {
        filter: grayscale(0%);
        /* Remove grayscale on hover */
    }

    /* ./ Custome End */

    h4.product__items--content__title {
        min-height: 50px !important;
    }

    .product_col:hover {
        box-shadow: 0 0 11px rgba(33, 33, 33, .2);
        transition: .4s;
    }

    .toastify {
        /* border-radius: 30px !important; */
        padding: 6px 10px !important;
    }

    input.quantity__number {
        width: 5rem !important;
    }

    .side_cart_update_button {
        height: 25px !important;
        font-size: 10px;
    }

    .side_cart_qty {
        width: 60px !important;
        height: 25px !important;
    }

    @media only screen and (min-width: 768px) {
        .main__logo--img {
            max-width: 226px !important;
        }

        .big-screen-none {
            display: none !important;
        }



    }

    @media only screen and (max-width: 768px) {
        .header__sticky {
            border-bottom: 1px solid #e6e3e0 !important;
        }
    }

    .search_product_output {
        padding: 3px;
        list-style: none;
        text-align: left;
        position: absolute;
        z-index: 998;
        background-color: #fff;
        width: 95%;
        overflow: hidden;
    }


    a.whatsapp {
        color: #00A356 !important;
    }

    .custom_phone {
        font-size: 25px !important;
        padding: 1px !important;
        padding: 9px !important
    }

    #scroll__top {
        /* border-radius: 50px !important; */
        text-align: center !important;
        bottom: 75px !important;
    }

    iframe {
        bottom: 75px !important;
    }

    .header__topbar {
        padding: 5px !important;
        background-color: #2A3143 !important;
        border-bottom: 2px solid var(--secondary-color);
        /*  #179bf3 #FCDB56 var(--logo-color) */
    }

    .footer__section {
        border-top: 2px solid var(--secondary-color);
    }

    .header__menu--link:hover {
        color: var(--secondary-color) !important;
    }

    .offcanvas__stikcy--toolbar__icon {
        background-color: none !important;
        background: none !important;
        color: #2A3143 !important;
        height: 2.5rem !important;
    }

    .offcanvas__stikcy--toolbar__label {
        margin-top: 0px !important;
    }

    /* .items__count {
        background-color: none !important;
    } */

    .offcanvas__stikcy--toolbar {
        /* border-top: 1px solid #EE2761; */
    }

    .bottom_navigation_custom {
        text-align: center;
        padding: 5px;
        border-radius: 10px;
        border: 1.5px solid var(--logo-color);
        box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;
    }

    .minicart__quantity {
        margin-right: 5px !important;
    }

    /* .minicart__product {

    } */

    /* .bg__secondary {
        background: #F59C33 !important;
    }

    .items__count {
        background: #F59C33 !important;
    } */

    .shop_more_btn {
        font-size: 1.7rem !important;
        line-height: 4rem !important;
        height: 4rem !important;
        padding: 0px 15px !important;
    }

    .color-animation {
        animation: color-change-animation 2s infinite;
    }

    @keyframes color-change-animation {
        0% {
            color: var(--logo-color);
        }

        33% {
            color: var(--logo-color);
        }

        67% {
            color: var(--logo-color);
        }

        100% {
            color: var(--logo-color);
        }

    }
    .flex{display: flex}
    .flex-col{flex-direction: column}
    .h-full{height:100%;}
    .h-auto{height: auto}
    .w-full{width:100%;}
    .w-auto{width: auto}
    .items-center{align-items:center;}
    .gap-4{gap:1rem;}
    .duration-300{transition-duration: .3s;}
    .rounded-full{border-radius: 9999px;}
    .border-white {
        border-color: rgb(242, 240, 240);
    }
    .border-primary-hover:hover {
        border-color: var(--logo-color);
    }
    .text-xl {
    font-size: 1.25rem;
    }
    .tracking-wider {
    letter-spacing: .05em;
}
.text-2xl {font-size: 1.5rem;}
.text-3xl {font-size: 2rem;}
.w-1{width:1px;}
.w-14{width:3.5rem;}
.w-24{width:5.5rem;}
.h-5{height: 1.25rem;}
.block{display:block;}
.text-lg{font-size: 1.125rem;}
.product-details-tab-list{
    cursor:pointer;
    margin-right: 1.5rem;
    border: 1px solid #aba8a8;
    border-bottom:0px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 7px;
    padding-bottom: 7px;
    border-radius: 5px 5px 0px 0px;
    font-size: 1.8rem;
    font-weight: 500;
}
.single-product-bg-info{
    background-color: #F6F8FA;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 5px;
    padding-bottom: 5px;
}
.text-xs{ font-size: .813rem;}
.text-2xs{ font-size: .75rem;}
.bg-secondary{background-color: var(--secondary-color)}

/* WhatsApp Start */
@import url("https://fonts.googleapis.com/css?family=Roboto:400,400i,700");
* {
	font-family: "Roboto", sans-serif;
}
button.wh-ap-btn {
	outline: none;
	width: 60px;
	height: 60px;
	border: 0;
	background-color: #2ecc71;
	padding: 0;
	border-radius: 100%;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
	cursor: pointer;
	transition: opacity 0.3s, background 0.3s, box-shadow 0.3s;
}

button.wh-ap-btn::after {
	content: "";
	background-image: url("{{ asset('frontend/assets/img/icon/WhatsApp.png') }}");
	background-position: center center;
	background-repeat: no-repeat;
	background-size: 60%;
	width: 100%;
	height: 100%;
	display: block;
	opacity: 1;
}

button.wh-ap-btn:hover {
	opacity: 1;
	background-color: #20bf6b;
	box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}

.wh-api {
	position: fixed;
	bottom: 0;
	right: 0;
}

.wh-fixed {
	margin-right: 15px;
	margin-bottom: 65px;
}

.wh-fixed > a {
	display: block;
	text-decoration: none;
}

button.wh-ap-btn::before {
	content: "Chat with me";
	display: block;
	position: absolute;
	margin-left: -130px;
	margin-top: 16px;
	height: 25px;
	background: #49654e;
	color: #fff;
	font-weight: 400;
	font-size: 15px;
	border-radius: 3px;
	width: 0;
	opacity: 0;
	padding: 0;
	transition: opacity 0.4s, width 0.4s, padding 0.5s;
	padding-top: 7px;
	border-radius: 30px;
	box-shadow: 0 1px 15px rgba(32, 33, 36, 0.28);
}

/* .wh-fixed > a:hover button.wh-ap-btn::before {
	opacity: 1;
	width: auto;
	padding-top: 0px;
	padding-left: 10px;
	padding-right: 10px;
	width: 110px;
} */

/* animacion pulse */

.whatsapp-pulse {
	width: 60px;
	height: 60px;
	right: 10px;
	bottom: 10px;
	background: #10b418;
	position: fixed;
	text-align: center;
	color: #ffffff;
	cursor: pointer;
	border-radius: 50%;
	z-index: 99;
	display: inline-block;
	line-height: 65px;
}

.whatsapp-pulse:before {
	position: absolute;
	content: " ";
	z-index: -1;
	bottom: -15px;
	right: -15px;
	background-color: #10b418;
	width: 90px;
	height: 90px;
	border-radius: 100%;
	animation-fill-mode: both;
	-webkit-animation-fill-mode: both;
	opacity: 0.6;
	-webkit-animation: pulse 1s ease-out;
	animation: pulse 1.8s ease-out;
	-webkit-animation-iteration-count: infinite;
	animation-iteration-count: infinite;
}

@-webkit-keyframes pulse {
	0% {
		-webkit-transform: scale(0);
		opacity: 0;
	}
	25% {
		-webkit-transform: scale(0.3);
		opacity: 1;
	}
	50% {
		-webkit-transform: scale(0.6);
		opacity: 0.6;
	}
	75% {
		-webkit-transform: scale(0.9);
		opacity: 0.3;
	}
	100% {
		-webkit-transform: scale(1);
		opacity: 0;
	}
}

@keyframes pulse {
	0% {
		transform: scale(0);
		opacity: 0;
	}
	25% {
		transform: scale(0.3);
		opacity: 1;
	}
	50% {
		transform: scale(0.6);
		opacity: 0.6;
	}
	75% {
		transform: scale(0.9);
		opacity: 0.3;
	}
	100% {
		transform: scale(1);
		opacity: 0;
	}
}

/* WhatsApp End*/
</style>
