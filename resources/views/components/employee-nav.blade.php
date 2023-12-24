<div class="flex flex-col items-center gap-y-5 -ml-px font-extrabold tracking-wide text-lg pt-1">
    <div class="w-max space-y-4 group-hover:w-full" title="Acceuil">
        <img src="{{ asset('images/logo.jpg') }}" class="h-12 w-12 rounded-full" title="Ministère de l'Education Nationale">
    </div>
    
    <div class="w-max space-y-4 group-hover:w-full" title="Acceuil">
        <a href="{{url('personnel/acceuil')}}" id="one" class="flex items-center active:ml-1 hover:text-indigo-500">
            <svg class="h-8 w-20" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M13.558 5.534a2.25 2.25 0 0 0-3.116 0l-4.626 4.44a.748.748 0 0 0-.218.405a27.344 27.344 0 0 0-.121 9.15l.112.721h2.977v-6.211a.75.75 0 0 1 .75-.75h5.368a.75.75 0 0 1 .75.75v6.211h2.977l.112-.72a27.34 27.34 0 0 0-.12-9.152a.748.748 0 0 0-.219-.404l-4.626-4.44ZM9.404 4.452a3.75 3.75 0 0 1 5.192 0l4.627 4.44c.34.326.57.752.655 1.216a28.86 28.86 0 0 1 .127 9.653l-.18 1.157a.983.983 0 0 1-.972.832h-4.169a.75.75 0 0 1-.75-.75v-6.211h-3.868V21a.75.75 0 0 1-.75.75H5.147a.983.983 0 0 1-.972-.832l-.18-1.157a28.86 28.86 0 0 1 .127-9.653c.085-.464.315-.89.655-1.217l4.627-4.44Z" clip-rule="evenodd"/></svg>
        </a>
    </div>

    <div class="w-max space-y-4 group-hover:w-full" title="Demander un congé">
        <a href="{{url('personnel/demande')}}" id="three" class="flex items-center active:ml-1 hover:text-indigo-500">
            <svg class="h-8 w-20 hover:stroke-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
            </svg>
        </a>
    </div>

    <div class="w-max space-y-4 group-hover:w-full" title="Déconnexion">
        <a href="{{ url('/logout') }}" class="flex items-center active:ml-1 hover:text-indigo-500">
            <svg class="h-8 w-20 hover:fill-indigo-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 2a.75.75 0 01.75.75v7.5a.75.75 0 01-1.5 0v-7.5A.75.75 0 0110 2zM5.404 4.343a.75.75 0 010 1.06 6.5 6.5 0 109.192 0 .75.75 0 111.06-1.06 8 8 0 11-11.313 0 .75.75 0 011.06 0z"></path>
            </svg>
        </a>
    </div>
</div>