@props([
    'type' => 'render',
])

<div id="pickup-loader" class="render-bg d-none">
    <div class="render-load-area">
        <div class="mydiv">
            <p class="myh1"></p>
        </div>
        <div class="loader-render mt-3"></div>
    </div>
</div>
{{-- @dd($type) --}}
<style>
    .mydiv {
        position: relative;
        width: 83%;
        margin: 3% auto;
    }

    .myh1 {
        position: absolute;
        width: 100%;
        height: 50%;
        font-size: 15px;
    }

    .myh1:after {
        position: absolute;
        content: "";
        width: 100%;
        height: 100%;
        line-height: 48px;
        left: 30%;
        top: 50%;
        animation: abomination1 2s linear 2;
        /* animation: abomination1 4s linear infinite; */
        animation-fill-mode: forwards;
    }

    @keyframes abomination1 {
        0% {
            content: "P";
        }

        4% {
            content: "Pl";
        }

        8% {
            content: "Ple";
        }

        12% {
            content: "Pleas";
        }

        16% {
            content: "Please";
        }

        20% {
            content: "Please ";
        }

        24% {
            content: "Please W";
        }

        28% {
            content: "Please Wa";
        }

        32% {
            content: "Please Wai";
        }

        36% {
            content: "Please Wait";
        }

        40% {
            content: "Please Wait,";
        }

        44% {
            content: "Please Wait, C";
        }

        48% {
            content: "Please Wait, Cr";
        }

        52% {
            content: "Please Wait, Cre";
        }

        56% {
            content: "Please Wait, Crea";
        }

        60% {
            content: "Please Wait, Creat";
        }

        64% {
            content: "Please Wait, Creati";
        }

        68% {
            content: "Please Wait, Creating";
        }

        72% {
            content: "Please Wait, Creating R";
        }

        76% {
            content: "Please Wait, Creating Re";
        }

        80% {
            content: "Please Wait, Creating Ret";
        }

        84% {
            content: "Please Wait, Creating Return";
        }

        88% {
            content: "Please Wait, Creating Return Re";
        }

        92% {
            content: "Please Wait, Creating Return Requ";
        }

        96% {
            content: "Please Wait, Creating Return Reque";
        }

        98% {
            content: "Please Wait, Creating Return Request";
        }

        100% {
            content: "Please Wait, Creating Return Request...";
        }

    }


    .render-bg {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0.98;
        z-index: 999;
    }

    .render-load-area {
        position: absolute;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 40%;
        height: 30%;
        top: 45%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0.98;
        background-color: #fff;
        z-index: 9999;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .loader-render {
        height: 4px;
        width: 80%;
        --c: no-repeat linear-gradient(#6100ee 0 0);
        background: var(--c), var(--c), #d7b8fc;
        background-size: 60% 100%;
        animation: l16 3s infinite;
    }

    @keyframes l16 {
        0% {
            background-position: -150% 0, -150% 0
        }

        66% {
            background-position: 250% 0, -150% 0
        }

        100% {
            background-position: 250% 0, 250% 0
        }
    }
</style>
