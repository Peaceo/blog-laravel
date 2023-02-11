<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">View All</a></li>
        <li class="breadcrumb-item"><a href="#">...</a></li>
      </ol>
  </nav>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="dashboard">
                    <div class="row">
                          <div class="col-2">
                          <ul class="list-group">
                            @can(['create-user', 'edit-user', 'delete-user', 'view-users', 'create-post', 'edit-post', 'delete-post'])
                              
                              <li class="list-group-item"><a href="{{ route('blog.user') }}">MANAGE USERS</a></li>
                              <form action="" method="post">                            
                              <li class="list-group-item"><a href="{{ route('posts.index')  }}">MANAGE POSTS</a></li>
                              </form>
                            @endcan         
                              <li class="list-group-item"><a href="/posts/create">CREATE POST</a></li>
                              <li class="list-group-item"><a href="posts/{$id}/edit">UPDATE POST</a></li>
                              <li class="list-group-item"><a href="{{route('posts.index')}}">VIEW POSTS</a></li>
                          </ul>
                          </div>	
                          <div class="col-10">
                          </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



