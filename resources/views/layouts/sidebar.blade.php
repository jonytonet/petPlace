<nav id="full-screen-example"
    class="fixed left-0 top-0 z-[1035] h-screen w-[90px] -translate-x-full overflow-hidden bg-zinc-800 shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='false']:translate-x-0"
    data-te-sidenav-init data-te-sidenav-color="light" data-te-sidenav-backdrop="false" data-te-sidenav-slim="true"
    data-te-sidenav-expandable="false" data-te-sidenav-slim-collapsed="true" data-te-sidenav-slim-width="90"
    data-te-sidenav-content="#content">
    <div class="mt-6 text-center">
        <a class="relative inline-block overflow-hidden align-bottom rounded-full" data-te-ripple-init
            href="{{ route('dashboard') }}" data-te-ripple-color="light" href="#">
            <img src="{{ asset('assets/images/canva.png') }}" alt="Avatar" class="h-auto max-w-[60px] rounded-full" />
        </a>
    </div>

    <hr class="my-4 border-gray-700" />
    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
        <li class="relative my-4">
            <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-300 outline-none transition duration-300 ease-linear hover:bg-white/10 hover:outline-none focus:bg-white/10 focus:outline-none active:bg-white/10 active:outline-none data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref title="Clientes" data-te-toggle="tooltip" data-te-placement="right"
                data-te-ripple-init data-te-ripple-color="light" href="{{ route('customers.index') }}">
                <span
                    class="mx-auto motion-reduce:transition-none [&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-gray-300 [&>svg]:transition [&>svg]:duration-300 [&>svg]:ease-linear group-hover:[&>svg]:fill-white group-focus:[&>svg]:fill-white group-active:[&>svg]:fill-white group-data-[te-sidenav-state-focus]:[&>svg]:fill-white">
                    <i class="fa-solid fa-person-chalkboard fa-2xl"></i>
                </span>
            </a>
        </li>
        <li class="relative my-4">
            <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-300 outline-none transition duration-300 ease-linear hover:bg-white/10 hover:outline-none focus:bg-white/10 focus:outline-none active:bg-white/10 active:outline-none data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref title="Pets" data-te-toggle="tooltip" href="{{ route('pets.index') }}"
                data-te-placement="right" data-te-ripple-init data-te-ripple-color="light">
                <span
                    class="mx-auto motion-reduce:transition-none [&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-gray-300 [&>svg]:transition [&>svg]:duration-300 [&>svg]:ease-linear group-hover:[&>svg]:fill-white group-focus:[&>svg]:fill-white group-active:[&>svg]:fill-white group-data-[te-sidenav-state-focus]:[&>svg]:fill-white">
                    <i class="fa-solid fa-dog fa-2xl"></i>
                </span>
            </a>
        </li>
        <li class="relative my-4">
            <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-300 outline-none transition duration-300 ease-linear hover:bg-white/10 hover:outline-none focus:bg-white/10 focus:outline-none active:bg-white/10 active:outline-none data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref title="DayCare" data-te-toggle="tooltip" href="{{ route('daycare.index') }}"
                data-te-placement="right" data-te-ripple-init data-te-ripple-color="light">
                <span
                    class="mx-auto motion-reduce:transition-none [&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-gray-300 [&>svg]:transition [&>svg]:duration-300 [&>svg]:ease-linear group-hover:[&>svg]:fill-white group-focus:[&>svg]:fill-white group-active:[&>svg]:fill-white group-data-[te-sidenav-state-focus]:[&>svg]:fill-white">
                    <i class="fa-regular fa-sun fa-2xl"></i>
                </span>
            </a>
        </li>
        <li class="relative my-4">
            <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-300 outline-none transition duration-300 ease-linear hover:bg-white/10 hover:outline-none focus:bg-white/10 focus:outline-none active:bg-white/10 active:outline-none data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref title="Banho&Tosa" data-te-toggle="tooltip"
                href="{{ route('bathAndGrooming.index') }}" data-te-placement="right" data-te-ripple-init
                data-te-ripple-color="light">
                <span
                    class="mx-auto motion-reduce:transition-none [&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-gray-300 [&>svg]:transition [&>svg]:duration-300 [&>svg]:ease-linear group-hover:[&>svg]:fill-white group-focus:[&>svg]:fill-white group-active:[&>svg]:fill-white group-data-[te-sidenav-state-focus]:[&>svg]:fill-white">

                    <i class="fa-solid fa-bath fa-2xl"></i>
                </span>
            </a>
        </li>
        <li class="relative my-4">
            <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-300 outline-none transition duration-300 ease-linear hover:bg-white/10 hover:outline-none focus:bg-white/10 focus:outline-none active:bg-white/10 active:outline-none data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref title="Clínica" data-te-toggle="tooltip" href=""
                data-te-placement="right" data-te-ripple-init data-te-ripple-color="light">
                <span
                    class="mx-auto motion-reduce:transition-none [&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-gray-300 [&>svg]:transition [&>svg]:duration-300 [&>svg]:ease-linear group-hover:[&>svg]:fill-white group-focus:[&>svg]:fill-white group-active:[&>svg]:fill-white group-data-[te-sidenav-state-focus]:[&>svg]:fill-white">
                    <i class="fa-solid fa-stethoscope fa-2xl"></i>
                </span>
            </a>
        </li>
        <li class="relative my-4">
            <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-300 outline-none transition duration-300 ease-linear hover:bg-white/10 hover:outline-none focus:bg-white/10 focus:outline-none active:bg-white/10 active:outline-none data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref title="Financeiro" data-te-toggle="tooltip" data-te-placement="right"
                data-te-ripple-init data-te-ripple-color="light" href="{{ route('finance.index') }}">
                <span
                    class="mx-auto motion-reduce:transition-none [&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-gray-300 [&>svg]:transition [&>svg]:duration-300 [&>svg]:ease-linear group-hover:[&>svg]:fill-white group-focus:[&>svg]:fill-white group-active:[&>svg]:fill-white group-data-[te-sidenav-state-focus]:[&>svg]:fill-white">
                    <i class="fa-solid fa-cash-register fa-2xl"></i>
                </span>
            </a>
        </li>
        <li class="relative my-4">
            <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-300 outline-none transition duration-300 ease-linear hover:bg-white/10 hover:outline-none focus:bg-white/10 focus:outline-none active:bg-white/10 active:outline-none data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref title="Cadastros" data-te-toggle="tooltip" data-te-placement="right"
                data-te-ripple-init data-te-ripple-color="light" href="{{ route('miscellaneous-records.index') }}">
                <span
                    class="mx-auto motion-reduce:transition-none [&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-gray-300 [&>svg]:transition [&>svg]:duration-300 [&>svg]:ease-linear group-hover:[&>svg]:fill-white group-focus:[&>svg]:fill-white group-active:[&>svg]:fill-white group-data-[te-sidenav-state-focus]:[&>svg]:fill-white">
                    <i class="fa-solid fa-rectangle-list fa-2xl"></i>
                </span>
            </a>
        </li>


    </ul>
</nav>
