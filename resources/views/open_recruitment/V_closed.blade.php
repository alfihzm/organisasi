<x-guest-layout title="Closed">
    <style>
        body {
            background: linear-gradient(135deg, #2A2C39, #3E4153);
            height: 100vh;
        }

        h1,
        h3 {
            font-family: "Lato", sans-serif;
        }

        h1 {
            font-weight: 900;
            font-size: 6.5vw;
            color: #FFF;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
            animation: fadeIn .5s ease-in-out;
        }

        h3 {
            font-weight: 300;
            color: #FFF;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
            animation: fadeIn .5s ease-in-out;
        }

        button {
            margin: 20px;
        }

        .custom-btn {
            width: 130px;
            height: 40px;
            color: #fff;
            border-radius: 5px;
            padding: 10px 25px;
            font-family: 'Lato', sans-serif;
            font-weight: 500;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            box-shadow: inset 2px 2px 2px 0px rgba(255, 118, 118, 0.5),
                7px 7px 20px 0px rgba(0, 0, 0, .1),
                4px 4px 5px 0px rgba(0, 0, 0, .1);
            outline: none;
        }

        .btn-3 {
            background: #FF4056;
            background: linear-gradient(0deg, #FF2A43 0%, #FF2A43 100%);
            width: 130px;
            height: 40px;
            line-height: 42px;
            padding: 0;
            border: none;
            animation: fadeIn .5s ease-in-out;
        }

        .btn-3 span {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
        }

        .btn-3:before,
        .btn-3:after {
            position: absolute;
            content: "";
            right: 0;
            top: 0;
            background: rgb(255, 255, 255);
            transition: all 0.3s ease;
        }

        .btn-3:before {
            height: 0%;
            width: 2px;
        }

        .btn-3:after {
            width: 0%;
            height: 2px;
        }

        .btn-3:hover {
            background: transparent;
            box-shadow: none;
        }

        .btn-3:hover:before {
            height: 100%;
        }

        .btn-3:hover:after {
            width: 100%;
        }

        .btn-3 span:hover {
            color: rgb(255, 255, 255);
        }

        .btn-3 span:before,
        .btn-3 span:after {
            position: absolute;
            content: "";
            left: 0;
            bottom: 0;
            background: rgb(255, 255, 255);
            transition: all 0.3s ease;
        }

        .btn-3 span:before {
            width: 2px;
            height: 0%;
        }

        .btn-3 span:after {
            width: 0%;
            height: 2px;
        }

        .btn-3 span:hover:before {
            height: 100%;
        }

        .btn-3 span:hover:after {
            width: 100%;
        }

        .title-heading {
            font-size: 5rem;
        }

        .subtitle-heading {
            font-size: 1.5rem;
        }

        @media (max-width: 1200px) {
            .title-heading {
                font-size: 3.5rem;
            }

            .subtitle-heading {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 768px) {
            .title-heading {
                font-size: 3rem;
            }

            .subtitle-heading {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .title-heading {
                font-size: 2.3rem;
            }

            .subtitle-heading {
                font-size: 1rem;
            }

            .btn-3 {
                width: 100px;
                height: 40px;
                font-size: .8rem;
                display: flex;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    @component('components.navbar')
        <div class="ms-auto">
            <a href="/auth/login" class="btn btn-warning btn-sm p-2">Login</a>
            <a href="/oprec/choose-member" class="btn btn-primary btn-sm p-2">Daftar</a>
        </div>
    @endcomponent

    <div class="d-flex justify-content-center align-items-center flex-column text-center" style="height: 86vh">
        <h1 class="title-heading">
            <span style="color: #FFF;"> Pendaftaran </span>
            <span class="typed-text text-danger"></span><span class="cursor">&nbsp;</span>
        </h1>

        <div>
            <h3 class="subtitle-heading" style="color: #FFF; font-weight: 400;"> Sampai Jumpa di <span
                    style="color: #4b7afc; font-weight: 600;"> OPREC HIMSI
                </span>
                <span style="color: #FF4056; font-weight: 400;"> Selanjutnya<span style="color: #FFF;">. </span> 👋🏻
                </span>
            </h3>
        </div>

        <a class="custom-btn btn-3 mt-3" href="/oprec" style="text-decoration: none;"><span> Kembali </span></a>
    </div>

    <script>
        const typedTextSpan = document.querySelector(".typed-text");
        const cursorSpan = document.querySelector(".cursor");

        const textArray = ["Ditutup."];
        const typingDelay = 150;
        const erasingDelay = 100;
        const newTextDelay = 2200;
        let textArrayIndex = 0;
        let charIndex = textArray[0].length;

        function erase() {
            if (charIndex > 0) {
                if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
                typedTextSpan.textContent = textArray[textArrayIndex].substring(0, charIndex - 1);
                charIndex--;
                setTimeout(erase, erasingDelay);
            } else {
                cursorSpan.classList.remove("typing");
                setTimeout(type, newTextDelay);
            }
        }

        function type() {
            if (charIndex < textArray[textArrayIndex].length) {
                if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
                typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
                charIndex++;
                setTimeout(type, typingDelay);
            } else {
                cursorSpan.classList.remove("typing");
                setTimeout(erase, newTextDelay);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            typedTextSpan.textContent = textArray[0];
            setTimeout(erase, newTextDelay);
        });
    </script>

</x-guest-layout>
