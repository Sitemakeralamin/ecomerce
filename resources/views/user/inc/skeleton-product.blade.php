<style>
    .skeleton-product-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 10px;
    }
    .skeleton-product-card {  /* 0-480 */
        margin-top:10px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: calc(50% - 10px);
        position: relative;
    }
    @media only screen and (min-width:480px){ /* 480-576 */
        .skeleton-product-card { width: calc(50% - 20px);}    
    }
    @media only screen and (min-width:576px){ /* 576-768 */
        .skeleton-product-card { width: calc(25% - 20px);}
    }
    @media only screen and (min-width:768px){ /* 768-992 */
        .skeleton-product-card { width: calc(33.3333333333% - 20px);}
    }
    @media only screen and (min-width:992px){ /* 992-1200 */
        .skeleton-product-card { width: calc(25% - 20px);}
    }
    @media only screen and (min-width:1200px){
        //.skeleton-product-card { width: calc(16.666666666666667% - 20px);}
        .skeleton-product-card { width: calc(25% - 20px);}
    }
    .skeleton-product-image { 
        background-color: #e0e0e0;
        width: 100%;
        height: 162px;
    }

    .skeleton-product-details {
        padding: 15px;
        text-align: center;
    }

    .skeleton-product-text {
        background-color: #e0e0e0;
        border-radius: 4px;
        margin: 10px 0;
    }

    .skeleton-product-title {
        width: 100%;
        height: 20px;
        margin: 10px auto;
    }

    .skeleton-product-price {
        width: 80%;
        height: 20px;
        margin: 10px auto;
    }

    .skeleton-product-button {
        background-color: #e0e0e0;
        width: 50%;
        height: 20px;
        margin: 10px auto;
        border-radius: 4px;
    }
</style>
<div class="skeleton-product-container">
    @for ($i = 0; $i < $load; $i++)
        <div class="skeleton-product-card">
            <div class="skeleton-product-image"></div>
            <div class="skeleton-product-details">
                <div class="skeleton-product-text skeleton-product-title"></div>
                <div class="skeleton-product-text skeleton-product-price"></div>
                <div class="skeleton-product-button"></div>
            </div>
        </div>
    @endfor
</div>