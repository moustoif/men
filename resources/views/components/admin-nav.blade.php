<div class="flex flex-col items-center gap-y-5 -ml-px font-extrabold tracking-wide text-lg pt-1 fixed">
    <div class="w-max space-y-4 group-hover:w-full" title="Acceuil">
        <img src="{{ asset('images/logo.jpg') }}" class="h-12 w-12 rounded-full" title="Ministère de l'Education Nationale">
    </div>

    <div class="w-max space-y-4 group-hover:w-full" title="Acceuil">
        <a href="{{ url('admin/acceuil') }}"  class="flex items-center hover:text-indigo-500 nav__link">
            <svg class="h-8 w-20" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M13.558 5.534a2.25 2.25 0 0 0-3.116 0l-4.626 4.44a.748.748 0 0 0-.218.405a27.344 27.344 0 0 0-.121 9.15l.112.721h2.977v-6.211a.75.75 0 0 1 .75-.75h5.368a.75.75 0 0 1 .75.75v6.211h2.977l.112-.72a27.34 27.34 0 0 0-.12-9.152a.748.748 0 0 0-.219-.404l-4.626-4.44ZM9.404 4.452a3.75 3.75 0 0 1 5.192 0l4.627 4.44c.34.326.57.752.655 1.216a28.86 28.86 0 0 1 .127 9.653l-.18 1.157a.983.983 0 0 1-.972.832h-4.169a.75.75 0 0 1-.75-.75v-6.211h-3.868V21a.75.75 0 0 1-.75.75H5.147a.983.983 0 0 1-.972-.832l-.18-1.157a28.86 28.86 0 0 1 .127-9.653c.085-.464.315-.89.655-1.217l4.627-4.44Z" clip-rule="evenodd"/></svg>
        </a>
    </div>


    <div class="w-max space-y-4 group-hover:w-full" title="Mes informations">
        <a href="{{ url('admin/mes-informations') }}" id="three" class="flex items-center hover:text-indigo-500 nav__link">
            <svg class="h-8 w-20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
            </svg>                   
        </a>
    </div>


    <div class="w-max space-y-4 group-hover:w-full" title="Ajouter un personnel">
        <a href="{{ url('admin/plus-de-personnel') }}" id="three" class="flex items-center hover:text-indigo-500 nav__link">
            <svg class="h-8 w-20 hover:stroke-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
            </svg>                  
        </a>
    </div>

    <div class="w-max space-y-4 group-hover:w-full" title="Nouveau congé">
        <a href="{{ url('admin/mon-demande') }}" id="three" class="flex items-center hover:text-indigo-500 nav__link">
            <svg class="h-8 w-20 hover:stroke-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
            </svg>                
        </a>
    </div>


    <!--<div class="w-max space-y-4 group-hover:w-full" title="Séction email">
        <a href="{{-- url('admin/email') --}}" id="three" class="flex items-center hover:text-indigo-500 nav__link">
            <svg class="h-8 w-20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
            </svg>
                               
        </a>
    </div>-->


    <div class="w-max space-y-4 group-hover:w-full" title="Déconnexion">
        <a href="{{ url('/logout') }}" class="flex items-center  hover:text-indigo-500">
            <svg class="h-8 w-20" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2a9.985 9.985 0 0 1 8 4h-2.71a8 8 0 1 0 .001 12h2.71A9.985 9.985 0 0 1 12 22Zm7-6v-3h-8v-2h8V8l5 4l-5 4Z"/></svg>
        </a>
    </div>
</div>