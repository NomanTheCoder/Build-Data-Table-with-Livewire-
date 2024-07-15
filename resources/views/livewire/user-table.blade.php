<div>
    <div class="container mx-auto">
    
        <div class="flex justify-between mb-4">
            <input wire:model.live='search' type="text" placeholder="Search" class="border rounded px-3 py-2 w-1/3" />
            <div>
                <label for="userType" class="mr-2">User Type:</label>
                <select wire:model.live='admin'
                 id="userType" class="border rounded px-3 py-2">
                    <option value="">All</option>
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                  
                </select>
            </div>
        </div>

    
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    @include('livewire.includes.table-sortable')
                     
                
                    <th class="px-4 py-2 border">Last Update</th>
                    <th class="px-4 py-2 border">Actions</th> 
                </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr wire:key='{{$user->id}}'>
                    <td class="px-4 py-2 border">{{$user->name}}</td>
                    <td class="px-4 py-2 border">{{$user->email}}</td>
                    <td class="px-4 py-2 {{$user->is_admin ? 'text-green-500':'text-blue-500'}} border ">{{$user->is_admin ? 'Admin':'Member'}}</td>
                    <td class="px-4 py-2 border">{{$user->created_at}}</td>
                    <td class="px-4 py-2 border">{{$user->updated_at}}</td>
                    <td class="px-4 py-2 border text-center">
                        <button onclick="confirm('Are you sure you want to delete {{$user->name}}?')||event.stopImmediatePropagation()" wire:click='delete({{$user->id}})' class="bg-red-500 text-white px-2 py-1 rounded-sm">X</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-between items-center mt-4">
            <div class="flex items-center">
                <label for="perPage" class="mr-2">Per Page:</label>
                <select wire:model.live='perPage' id="perPage" class="border rounded px-3 py-2">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div>
                <div>{{$users->links()}}</div>
            </div>
        </div>
    </div>
</div>
