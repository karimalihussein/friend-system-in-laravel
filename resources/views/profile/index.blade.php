<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            {{  $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @auth
                    

                    @if(auth()->user()->id !== $user->id)


                       @if(auth()->user()->isFriendsWith($user))


                        <div class="space-x-1">
                            
                            <span>You and {{ $user->name }} are Friends</span>

                            <form action="{{ route('friends.destroy', $user) }}"  method="post" class="inline">
                                @csrf
                                @method('DELETE')
    
                                <button class="text-indigo-600">Unfriend</button>
                            </form>

                        </div>

                       @elseif($user->hasPendingFriendRequestFor(auth()->user()))
                         
                        <div class="space-x-1">
                            <span>{{ $user->name  }} Has Sent  you a friend Request </span>


                            <form action="{{ route('friends.destroy', $user) }}"  method="post" class="inline">
                                @csrf
                                @method('DELETE')
    
                                <button class="text-indigo-600">Decline</button>
                            </form>

                            <form action="{{ route('friends.patch', $user) }}"  method="post" class="inline">
                                @csrf
                                @method('PATCH')
    
                                <button class="text-indigo-600">Accept</button>
                            </form>

                        </div>

                       @else

                                @if(auth()->user()->hasPendingFriendRequestFor($user))
                                    <div class="space-x-1">
                                        <span>Wating for {{ $user->name }} to accept your friend request.</span>

                                        <form action="{{ route('friends.destroy', $user) }}"  method="post" class="inline">
                                            @csrf
                                            @method('DELETE')
                
                                            <button class="text-indigo-600">Cancel</button>
                                        </form>
                                    </div>
                                @else
                                
                                <form action="{{ route('friends.store', $user) }}"  method="post">
                                        @csrf

                                        <button class="text-indigo-600">Add as friend</button>
                                    </form>
                                @endif
                        @endif


                        
                     @endif
                    @endauth
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
