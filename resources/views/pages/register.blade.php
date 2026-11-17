@extends('../layout/' . $layout)

@section('head')
    <title>Register</title>
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Register Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Enigma" class="w-6" src="{{ asset('build/assets/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3">
                        Enigma
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Enigma" class="-intro-x w-1/2 -mt-16" src="{{ asset('build/assets/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">A few more clicks to <br> sign up to your account.</div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Manage all your e-commerce accounts in one place</div>
                </div>
            </div>
            <!-- END: Register Info -->
            <!-- BEGIN: Register Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Sign Up</h2>
                    <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">A few more clicks to sign up to your account.</div>

                    {{-- FORM STARTS HERE --}}
                    <form method="POST" action="{{ route('register.store') }}" class="intro-x mt-8">
                        @csrf

                        {{-- Name --}}
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="intro-x login__input form-control py-3 px-4 block @error('name') border-danger @enderror"
                            placeholder="Full Name"
                            required
                            autofocus
                        >
                        @error('name')
                            <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                        @enderror

                        {{-- Email --}}
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="intro-x login__input form-control py-3 px-4 block mt-4 @error('email') border-danger @enderror"
                            placeholder="Email"
                            required
                        >
                        @error('email')
                            <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                        @enderror

                        {{-- Password --}}
                        <input
                            type="password"
                            name="password"
                            class="intro-x login__input form-control py-3 px-4 block mt-4 @error('password') border-danger @enderror"
                            placeholder="Password"
                            required
                        >
                        @error('password')
                            <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                        @enderror

                        {{-- Static strength meter — cosmetic lang, tanggalin kung ayaw --}}
                        <div class="intro-x w-full grid grid-cols-12 gap-4 h-1 mt-3">
                            <div class="col-span-3 h-full rounded bg-success"></div>
                            <div class="col-span-3 h-full rounded bg-success"></div>
                            <div class="col-span-3 h-full rounded bg-success"></div>
                            <div class="col-span-3 h-full rounded bg-slate-100 dark:bg-darkmode-800"></div>
                        </div>

                        {{-- Password confirmation --}}
                        <input
                            type="password"
                            name="password_confirmation"
                            class="intro-x login__input form-control py-3 px-4 block mt-4"
                            placeholder="Password Confirmation"
                            required
                        >

                        {{-- Terms --}}
                        <div class="intro-x flex items-center text-slate-600 dark:text-slate-500 mt-4 text-xs sm:text-sm">
                            <input id="terms" type="checkbox" name="terms" class="form-check-input border mr-2" required>
                            <label class="cursor-pointer select-none" for="terms">I agree to the</label>
                            <a class="text-primary dark:text-slate-200 ml-1" href="#">Privacy Policy</a>.
                        </div>

                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Register</button>
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top inline-block text-center">Sign in</a>
                        </div>
                    </form>
                    {{-- FORM ENDS HERE --}}
                </div>
            </div>
            <!-- END: Register Form -->
        </div>
    </div>
@endsection