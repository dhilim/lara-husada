<div>
    <div><input type="text" wire:keydown.enter="search" wire:model="name" /></div>
    <br>
    @foreach($users as $user)
    <div>- {{ $user->name }} ({{ $user->email }})</div>
    @endforeach
</div>