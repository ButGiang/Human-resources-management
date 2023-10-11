<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
</head>

<body>
    <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                <a href="https://www.creative-tim.com/learning-lab/tailwind-starter-kit#/presentation"
                class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white">
                    Trang quản trị cho Admin
                </a>
                <button type="button" onclick="toggleNavbar('example-collapse-navbar')"
                class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none">
                    <i class="text-white fas fa-bars"></i>
                </button>
            </div>

            <div id="example-collapse-navbar"
                class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden">
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="#">
                            <i class="lg:text-gray-300 text-gray-500 fab fa-facebook text-lg leading-lg "></i>
                        </a>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="#">
                            <i class="lg:text-gray-300 text-gray-500 fab fa-twitter text-lg leading-lg "></i>
                        </a>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="https://github.com/ButGiang/Human-resources-management">
                            <i class="lg:text-gray-300 text-gray-500 fab fa-github text-lg leading-lg "></i>
                        </a>
                    </li>   
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="absolute w-full h-full">
            <div class="absolute top-0 w-full h-full bg-gray-900"
                style="background-image: url('{{ asset('assets/img/register_bg_2.png') }}'); background-size: 100%; background-repeat: no-repeat;">
            </div>
            <div class="container mx-auto px-4 h-full">
                <div class="flex content-center items-center justify-center h-full">
                    <div class="w-full lg:w-4/12 px-4">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0">
                            <div class="rounded-t mb-0 px-6 py-6">
                                <div class="container mx-auto flex justify-center items-center">
                                    <img src='{{ asset('assets/img/apple-icon.png') }}' alt="Logo">
                                </div>
                                <hr class="mt-6 border-b-1 border-gray-400" />
                            </div>

                            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                <div class="text-gray-500 text-center mb-3 font-bold">
                                    <small>Đăng nhập với tài khoản</small>
                                </div>
                                
                                @include('alert')

                                <form action="/login" method="post">
                                    @csrf
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                        for="grid-password">
                                            Email
                                        </label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                        placeholder="Email" style="transition: all 0.15s ease 0s;" />
                                    </div>
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                        for="grid-password">
                                            Mật khẩu
                                        </label>
                                        <input type="password" name="password" 
                                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                        placeholder="Password" style="transition: all 0.15s ease 0s;" />
                                    </div>
                                    <div>
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input
                                            id="customCheckLogin" type="checkbox"
                                            class="form-checkbox border-0 rounded text-gray-800 ml-1 w-5 h-5"
                                            style="transition: all 0.15s ease 0s;" />
                                            <span class="ml-2 text-sm font-semibold text-gray-700">
                                                Remember me
                                            </span>
                                        </label>
                                    </div>

                                    <div class="text-center mt-3">
                                        <button
                                            class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                                            type="submit" style="transition: all 0.15s ease 0s;">
                                            Sign In
                                        </button>
                                    </div>
                                    
                                    <a href="{{ route('register') }}" class="text-sm text-blue-400 float-right mt-1">Tạo tài khoản</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="absolute w-full bottom-0 bg-gray-900 pb-6">
                <div class="container mx-auto px-4">
                    <hr class="mb-6 border-b-1 border-gray-700" />
                    <div class="flex flex-wrap items-center md:justify-between justify-center">
                        <div class="w-full md:w-4/12 px-4">
                            <div class="text-sm text-white font-semibold py-1">
                                Copyright © 2023
                                <a href="https://www.creative-tim.com"
                                    class="text-white hover:text-gray-400 text-sm font-semibold py-1">by Bút Giang</a>
                            </div>
                        </div>
                        <div class="w-full md:w-8/12 px-4">
                            <ul class="flex flex-wrap list-none md:justify-end  justify-center">
                                <li>
                                    <a href="#"
                                        class="text-white hover:text-gray-400 text-sm font-semibold block py-1 px-3">
                                        ĐỒNG
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="text-white hover:text-gray-400 text-sm font-semibold block py-1 px-3">
                                        NGUYỄN
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="text-white hover:text-gray-400 text-sm font-semibold block py-1 px-3">
                                        BÚT
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="text-white hover:text-gray-400 text-sm font-semibold block py-1 px-3">
                                        GIANG
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
    </main>
</body>
</html>